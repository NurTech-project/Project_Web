<?php

namespace App\Http\Controllers;
use App\Models\Historia;
use App\Models\Administrador;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class HistoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function verHistoriaAdministrador(){
        $historias = DB::table('historias')
        ->select('*')
        ->get();
       // $url = asset('storage/uploads/'.$historias->historiaImagen);
        //dd($historias);
        return view('historias.index',compact('historias'));
    }
    public function verHistoriaVisitante(){
        $historias = Historia::where("estado","=","activo")
        ->select('*')
        ->get();
       // $url = asset('storage/uploads/'.$historias->historiaImagen);
        //dd($historias);
        return view('home.historias',compact('historias'));
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
        return view('historias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_administrador = Administrador::latest('id')->first()->id;
        $datosHistoria = new Historia();

        if($request->hasFile('imagen')){
            $datosHistoria['imagen']= $request->file('imagen')->store('uploads','public');
        }
        
        $datosHistoria->administrador_id = $id_administrador;
        $datosHistoria->descripcion = $request->descripcion;
        $datosHistoria->estado = $request->estado;
        

        $datosHistoria->save();
        return redirect('/historia')->with('mensaje','historia agregado con éxito');;

    
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
        $historia = Historia::findOrFail($id);
        return view('historias.edit', compact('historia'));
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
       
        $historia = Historia::findOrFail($id);
        if($request->hasFile('imagen')){
           
            Storage::delete('public/'.$historia->imagen);
            $historia['imagen']= $request->file('imagen')->store('uploads','public');
        }

        $historia->descripcion = $request->descripcion;
        $historia->estado = $request->estado;
        $historia->update();
        return redirect('/historia')->with('mensaje','historia editada con éxito');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminarHistoria = Historia::findOrFail($id);
        $eliminarHistoria->delete();
        return redirect('/historia');
        
    }
}
