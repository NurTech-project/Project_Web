<?php

namespace App\Http\Controllers;

use App\Models\Charla;
use App\Models\Administrador;
use Illuminate\Support\Facades\DB;



use Illuminate\Http\Request;

class CharlaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function verCharlaAdministrador(){
        $charlas = DB::table('charlas')
        ->select('*')
        ->get();
       // $url = asset('storage/uploads/'.$historias->historiaImagen);
        //dd($historias);
        return view('charlas.index',compact('charlas'));
    }
    public function verCharlaVisitante(){
        $charlas = Charla::where("estado","=","activo")
        ->select('*')
        ->get();
       // $url = asset('storage/uploads/'.$historias->historiaImagen);
        //dd($historias);
        return view('home.charlas',compact('charlas'));
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
        return view('charlas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('imagen')){
            $datosHistoria['imagen']= $request->file('imagen')->store('uploads','public');
        }
        $id_administrador = Administrador::latest('id')->first()->id;
        $datosCharla = new Charla();
        $datosCharla->administrador_id = $id_administrador;
        $datosCharla->link_video = $request->link_video;
        $datosCharla->descripcion = $request->descripcion;
        $datosCharla->estado = $request->estado;
        

        $datosCharla->save();
        return redirect('/charla')->with('mensaje','charla agregada con éxito');;
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
        $charla = Charla::findOrFail($id);
        return view('charlas.edit', compact('charla'));
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
        $charla = Charla::findOrFail($id);
        $charla->link_video = $request->link_video;
        $charla->descripcion = $request->descripcion;
        $charla->estado = $request->estado;
        $charla->update();
        return redirect('/charla')->with('mensaje','charla editada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminarCharla = Charla::findOrFail($id);
        $eliminarCharla->delete();
        return redirect('/charla');
    }
}
