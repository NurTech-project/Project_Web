<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donante;
use App\Models\Pieza;

class PiezaController extends Controller
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
        return view('donante.pieza');
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
        $id_Donante = Donante::latest('id')->first()->id;
        $datosPieza = new Pieza();
        $datosPieza->donante_id = $id_Donante;
        $datosPieza->nombre = $request->nombre;
        $datosPieza->detalle = $request->detalle;
        $datosPieza->estado = $request->estado;

        $datosPieza->save();
        return redirect('donante/dashboard')->with('mensaje','Pieza agregada con éxito');;
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
        $piezaDestroy = Pieza::findOrFail($id);
        #condicionamos
        if($piezaDestroy->estado != null){
            return redirect('donante/dashboard')->with('mensaje','La pieza ha sido procesado, no se puede eliminar');
        }else{
            $piezaDestroy->delete();
            return redirect('donante/dashboard')->with('mensaje','Pieza eliminada con éxito');
        }

    }
}
