<?php

namespace App\Http\Controllers;

use App\Models\TipoDonacion;
use Illuminate\Http\Request;

class TipoDonacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dates["tipoDonaciones"]=TipoDonacion::paginate(10);
        return view('tipoDonacion.index', $dates);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tipoDonacion.create');
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
        $datosTipoDonaciones = $request()-> $except('_token');
        TipoDonacion::insert($datosTipoDonaciones);
        //return response()->json($datosTipoDonaciones);
        return redirect('empleado')->with('mensaje','Tipo de Donación agregada con exito');
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
        $tipoDonacion = TipoDonacion::findOrFail($id);
        return view('tipoDonacion.edit', compact('tipoDonacion'));
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
        $datosTipoDonaciones = $request()-> $except('_token', '_method');
        TipoDonacion::where('id','=',$id)->update($datosTipoDonaciones);

        $tipoDonacion = TipoDonacion::findOrFail($id);
        return view('tipoDonacion.edit', compact('tipoDonacion'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        TipoDonacion::destroy($id);
        return redirect('typeDonation')->with('mensaje','Tipo de Donacion eliminada con exito');
    }
}
