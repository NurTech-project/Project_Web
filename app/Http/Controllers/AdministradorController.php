<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrador;
use App\Models\User;
use App\Models\Tecnico;
use App\Models\Diagnostico;
use App\Models\Equipo;
use App\Models\DetalleDonacion;
use App\Models\DetalleRecepcionTecnico;
use App\Models\Distribuidor;
use App\Models\DetalleEntregaDonacion;


class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vista()
    {
        $entregas=DB::table('detalle_entrega_donacions')
        ->join('administradors','administradors.id','=','detalle_entrega_donacions.administrador_id')
        ->select('detalle_entrega_donacions.fecha_entrega as fecha','detalle_entrega_donacions.hora_entrega as hora',
        'detalle_entrega_donacions.estado_distribuidor as estadoDistribuidor','detalle_entrega_donacions.id as entregaId',
        'detalle_entrega_donacions.estado_tecnico as estadoTecnico','detalle_entrega_donacions.estado_beneficiario as estadoBeneficiario')
        ->where('administradors.user_id', '=', Auth::user()->id)
        ->get();

        $entregaConfirmada=array();
        $entregaPendiente=array();

        foreach ($entregas as $entrega){
            if($entrega->estadoDistribuidor == 'Aceptado' && $entrega->estadoTecnico == 'Aceptado' 
            && $entrega->estadoBeneficiario == 'Aceptado'){
                $entregaConfirmada[]=$entrega;
            }else {
                $entregaPendiente[]=$entrega;
            }
        }
        return view('administrador.dashboard', compact('entregaConfirmada','entregaPendiente'));
    }

    public function index()
    {
        $beneficiarios=DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('users.nombre as userNombre','users.apellido as userApellido',
        'users.email as userEmail','beneficiarios.id as beneficiarioId','users.id as userId',
        'beneficiarios.prioridad as beneficiarioPrioridad')
        ->where('beneficiarios.estado', '=','Pendiente')
        ->get();

        $diagnosticos=DB::table('diagnosticos')
        ->join('tecnicos', 'tecnicos.id','=','diagnosticos.tecnico_id')
        ->join('detalle_recepcion_tecnicos','detalle_recepcion_tecnicos.id','=','diagnosticos.detalle_recepcion_id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('equipos','equipos.id','=','detalle_donacions.equipo_id')
        ->join('users','users.id','=','tecnicos.user_id')
        ->select('diagnosticos.detalle as diagnosticoDetalle','diagnosticos.id as diagnosticoId',
        'tecnicos.id as tecnicosId','detalle_recepcion_tecnicos.id as recepcionId','detalle_donacions.id as donacionId',
        'equipos.id as equipoId')
        ->where('diagnosticos.estado','=','Diagnosticado')
        ->get();

        $distribuidors=DB::table('distribuidors')
        ->join('users','users.id','=','distribuidors.user_id')
        ->select('users.nombre as userNombre','users.apellido as userApellido',
        'users.email as userEmail','distribuidors.id as distribuidorId','users.id as userId')
        ->where('distribuidors.disponibilidad', '=','Activa')
        ->get();

        $administradors=DB::table('administradors')
        ->join('users', 'users.id','=','administradors.user_id')
        ->select('administradors.id as admistradorId')
        ->get();
        
        return view('administrador.create-entrega',compact('beneficiarios','diagnosticos','distribuidors','administradors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Estado: Pre-entrega en diagnostico, detalle_recepcion, detalle_donacion, equipo
        $diagnostico=Diagnostico::findOrFail($request->diagnostico_id);
        $diagnostico->estado = 'Pre-entregado';

        $recepcion=DetalleRecepcionTecnico::findOrFail($diagnostico->detalle_recepcion_id);
        $recepcion->estado = 'Pre-entregado';


        $donacion=DetalleDonacion::findOrFail($recepcion->detalle_donacion_id);
        $donacion->estado = 'Pre-entregado';


        $equipo=Equipo::findOrFail($donacion->equipo_id);
        $equipo->estado = 'Pre-entregado';


        //Creación de detalle_entrega_donacions
        $entrega= new DetalleEntregaDonacion();
        $entrega->fecha_entrega=$request->fecha_entrega;
        $entrega->hora_entrega=$request->hora_entrega;
        $entrega->estado_distribuidor = 'Pendiente';
        $entrega->estado_beneficiario = 'Pendiente';
        $entrega->estado_tecnico = 'Pendiente';
        $entrega->administrador_id=$request->administrador_id;
        $entrega->beneficiario_id = $request->beneficiario_id;
        $entrega->distribuidor_id = $request->distribuidor_id;
        $entrega->diagnostico_id = $request->diagnostico_id;

        if($entrega->save()){
            $diagnostico->save();
            $recepcion->save();
            $donacion->save();
            $equipo->save();

            return redirect('/admininistrador/dashboard');

        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
