<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Tecnico;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vista()
    {
        $perfilTecnico = DB::table('tecnicos')
        ->join('users','users.id','=','tecnicos.user_id')
        ->select('tecnicos.descripcion', 'tecnicos.id', 'tecnicos.disponibilidad', 
                    'users.nombre', 'users.apellido'
                )
        ->where('user_id', '=', Auth::user()->id)
        ->get();
        return view('tecnico.dashboard', compact('perfilTecnico'));
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
        $perfilTecnico = DB::table('tecnicos')
        ->join('users', 'users.id', '=', 'tecnicos.user_id')
        ->select('tecnicos.descripcion','tecnicos.disponibilidad','tecnicos.id',
                    'users.nombre', 'users.apellido', 'users.celular','users.direccion','users.email'
                )
        ->where('tecnicos.id','=',$id)
        ->get();
        return view('tecnico.perfil', compact('perfilTecnico'));
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
        $tecnico = DB::table('tecnicos')
        ->join('users','users.id','=','tecnicos.user_id')
        ->select('users.nombre', 'users.apellido', 'users.celular','users.direccion','users.email',
                    'tecnicos.descripcion', 'tecnicos.disponibilidad','tecnicos.id')
        ->where('tecnicos.id','=',$id)
        ->get();
        return view('tecnico.edit', compact('tecnico'));
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
        $tecnico = Tecnico::findOrFail($id);
        $tecnico->descripcion = $request->descripcion;
        $tecnico->update();
        return redirect('/tecnico/dashboard')->with('mensaje','Descripcion editada con éxito');
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