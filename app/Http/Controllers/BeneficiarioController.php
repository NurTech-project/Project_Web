<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Beneficiario;

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
        }if ($request->contador >=2000) {
            $datosBeneficiario->prioridad = 'Media';
        }else{
            $datosBeneficiario->prioridad = 'Baja';
        };
        #Guardado de los cambios
        $datosBeneficiario->save();
        #Redireccionamiento hacia el dashboard
        return redirect('beneficiario/dashboard');
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
