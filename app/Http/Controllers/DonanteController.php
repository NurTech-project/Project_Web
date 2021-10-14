<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Donante;
use Illuminate\Support\Facades\Auth;

class DonanteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function vista()
    {
        $donante=DB::table('donantes')
        ->join('users', 'users.id', '=', 'donantes.user_id')
        ->select('donantes.id as donanteId','users.email as userEmail','users.id as userId')
        ->get();
        $equipos=DB::table('equipos')->get();
        $piezas=DB::table('piezas')->get();
        return view('donante.dashboard', compact('equipos','piezas','donante'));
        
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
        //tipo de donaciones
        $tipo_donaciones = DB::table('tipo_donacions')->get();
        return view('donante.formulario', compact('tipo_donaciones'));
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
        $datosDonante = new Donante();
        $datosDonante->user_id = Auth::user()->id;
        $datosDonante->tipo_donacion_id = $request->tipo_donacion_id;
        $datosDonante->fecha_entrega = $request->fecha_entrega;
        $datosDonante->hora_entrega = $request->hora_entrega;
        $datosDonante->save();

        //Traemos el tipo de donación que se va a realizar
        $tipoDonaciones = DB::table('donantes')
            ->where('hora_entrega', '=',$datosDonante->hora_entrega)
            ->join('tipo_donacions', 'tipo_donacions.id','=', 'tipo_donacion_id')
            ->select('tipo_donacions.descripcion')
            ->get();
        
        //dd($tipoDonacion);
        foreach ($tipoDonaciones as $tipoDonacion ) {
            if ($tipoDonacion->descripcion == "Pieza") {
                return redirect('donante/pieza/create')->with('mensaje','Horario Agendado con Exito, Continue con el Paso 2');
            }else{
                return redirect('donante/equipo/create')->with('mensaje','Horario Agendado con Exito, Continue con el Paso 2');
            }
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
