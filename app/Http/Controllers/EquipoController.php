<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Donante;
use Illuminate\Support\Facades\Auth;


class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        return view('donante.equipo');
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
        //recuperamos el ultimo id creado. 
        $id_Donante = Donante::latest('id')->first()->id;
        $datosEquipo = new Equipo();
        $datosEquipo->donante_id = $id_Donante;
        $datosEquipo->sistema_operativo = $request->sistema_operativo;
        $datosEquipo->procesador = $request->procesador;
        $datosEquipo->ram = $request->ram;
        $datosEquipo->almacenamiento = $request->almacenamiento;
        $datosEquipo->detalle = $request->detalle;
        $datosEquipo->estado = $request->estado;

        $datosEquipo->save();
        return redirect('donante/dashboard');

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