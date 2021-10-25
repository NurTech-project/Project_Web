<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Beneficiario;
use App\Models\DetalleEntregaDonacion;

class BeneficiarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vista()
    {
        $perfilBeneficiario = DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('beneficiarios.descripcion', 'beneficiarios.id', 'beneficiarios.prioridad', 
                    'beneficiarios.estado', 'users.nombre', 'users.apellido'
                )
        ->where('user_id', '=', Auth::user()->id)
        ->get();
        return view('beneficiario.dashboard', compact('perfilBeneficiario'));
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $perfilBeneficiario = DB::table('beneficiarios')
        ->join('users', 'users.id', '=', 'beneficiarios.user_id')
        ->select('beneficiarios.descripcion','beneficiarios.prioridad','beneficiarios.estado','beneficiarios.id',
                    'users.nombre', 'users.apellido', 'users.celular','users.direccion','users.email'
                )
        ->where('beneficiarios.id','=',$id)
        ->get();
        return view('beneficiario.perfil', compact('perfilBeneficiario'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $beneficiario = DB::table('beneficiarios')
        ->join('users', 'users.id', '=', 'beneficiarios.user_id')
        ->select('beneficiarios.descripcion','beneficiarios.prioridad','beneficiarios.estado','beneficiarios.id',
                    'users.nombre', 'users.apellido', 'users.celular','users.direccion','users.email'
                )
        ->where('beneficiarios.id','=',$id)
        ->get();
        //dd($beneficiario);
        return view('beneficiario.editar' , compact('beneficiario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //Traemos el estado de beneficiario por si el estado ha cambiado
        $estadoBeneficiario = DB::table('beneficiarios')
        ->select('estado')
        ->where('beneficiarios.id','=',$id)
        ->get();

        #Recuperación de datos, y busqueda en la base de datos
        $datosBeneficiario = Beneficiario::findOrFail($id);
        $datosBeneficiario->descripcion = $request->descripcion;

        #Validación del estado del beneficiario
        foreach ($estadoBeneficiario as $beneficiario) {
            # code...
            if ($beneficiario->estado == null) {
                $datosBeneficiario->estado = 'Pendiente';
            }else{
                $datosBeneficiario->estado = $beneficiario->estado;
            };
        }
        
        #Validación de los caracteres ingresados en la descripción
        if ($request->contador >= 5000) {
            $datosBeneficiario->prioridad = 'Alta';
        }if ($request->contador >=1000) {
            $datosBeneficiario->prioridad = 'Media';
        }else{
            $datosBeneficiario->prioridad = 'Baja';
        };
        #Guardado de los cambios
        $datosBeneficiario->update();
        #Redireccionamiento hacia el dashboard
        return redirect('beneficiario/dashboard')->with('mensaje','Descripción editada con exito');
        #dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function vistaEntrega()
    {
         $entregaPendiente=DB::table('detalle_entrega_donacions')
         ->join('beneficiarios','beneficiarios.id','=','detalle_entrega_donacions.beneficiario_id')
         ->join('diagnosticos','diagnosticos.id','=','detalle_entrega_donacions.diagnostico_id')
         ->select('detalle_entrega_donacions.fecha_entrega as fecha','diagnosticos.detalle as detalle',
         'detalle_entrega_donacions.estado_beneficiario as estado','detalle_entrega_donacions.id as entregaId')
         ->where('beneficiarios.user_id','=',Auth::user()->id)
         ->where('detalle_entrega_donacions.estado_beneficiario','=','Pendiente')
         ->get();

         $entregaAceptada=DB::table('detalle_entrega_donacions')
         ->join('beneficiarios','beneficiarios.id','=','detalle_entrega_donacions.beneficiario_id')
         ->join('diagnosticos','diagnosticos.id','=','detalle_entrega_donacions.diagnostico_id')
         ->select('detalle_entrega_donacions.fecha_entrega as fecha','diagnosticos.detalle as detalle',
         'detalle_entrega_donacions.estado_beneficiario as estado')
         ->where('beneficiarios.user_id','=',Auth::user()->id)
         ->where('detalle_entrega_donacions.estado_beneficiario','=','Aceptado')
         ->get();
        //dd($entregaPendiente);
          return view('beneficiario.entrega-dashboard', compact('entregaPendiente','entregaAceptada'));
    }

    public function aceptarEntrega($id)
    {
        $entrega=DetalleEntregaDonacion::findOrFail($id);
        $beneficiario=Beneficiario::findOrFail($entrega->beneficiario_id);
        $beneficiario->estado='Aceptado';
        $entrega->estado_beneficiario='Aceptado';
        $entrega->save();
        $beneficiario->save();
        return redirect('beneficiario/vista/entrega');
    }

    public function rechazarEntrega($id)
    {
        $entrega=DetalleEntregaDonacion::findOrFail($id);
        $beneficiario=Beneficiario::findOrFail($entrega->beneficiario_id);
        $beneficiario->estado='Pendiente';
        $entrega->estado_beneficiario='Rechazado';
        //$entrega->beneficiario_id=null;
        $entrega->save();
        $beneficiario->save();
        return redirect('beneficiario/vista/entrega');
    }
}
