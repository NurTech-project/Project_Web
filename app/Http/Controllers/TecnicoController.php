<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Donante;
use App\Models\Pieza;
use App\Models\Equipo;
use App\Models\Tecnico;
use App\Models\DetalleDonacion;
use App\Models\DetalleRecepcionTecnico;
use App\Models\Diagnostico;
use App\Models\Distribuidor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TecnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function vista()
    {
        
        $donancionEquipo=DB::table('detalle_recepcion_tecnicos')
        ->join('distribuidors', 'distribuidors.id', '=', 'detalle_recepcion_tecnicos.distribuidor_id')
        ->join('users', 'distribuidors.user_id', '=', 'users.id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('equipos','detalle_donacions.equipo_id','=','equipos.id')
        ->select('distribuidors.id as distribuidorId','users.id as userId',
        'equipos.id as equipoId','detalle_recepcion_tecnicos.id as recepcionId',
        'users.nombre as userNombre','users.apellido as userApellido',
        'users.email as userEmail','equipos.sistema_operativo as equipoSistema',
        'equipos.procesador as equipoProcesador','equipos.ram as equipoRam','equipos.almacenamiento as equipoAlmacenamiento',
        'equipos.detalle as equipoDetalle','equipos.estado as equipoEstado')
        ->get();
        $perfilTecnico = DB::table('tecnicos')
        ->join('users','users.id','=','tecnicos.user_id')
        ->select('tecnicos.descripcion', 'tecnicos.id', 'tecnicos.disponibilidad', 
                    'users.nombre', 'users.apellido'
                )
        ->where('user_id', '=', Auth::user()->id)
        ->get();
        
    

        $tecnicos=DB::table('tecnicos')
        ->join('users', 'users.id','=','tecnicos.user_id')
        ->get();

        $equiposAceptados=array();
        $equiposAgendados=array();
        foreach ($donancionEquipo as $equipos){
           foreach ($tecnicos as $tecnico){
            if($equipos->equipoEstado == 'Agendado' && $tecnico->user_id == Auth::user()->id){
                $equiposAgendados[]=$equipos;
                //dd($equiposAgendados);
            }elseif($equipos->equipoEstado == 'Mantenimiento' && $tecnico->user_id == Auth::user()->id){
                $equiposAceptados[]=$equipos;
                //dd($equiposAceptados);
            }
           }
        }

        $donancionPieza=DB::table('detalle_recepcion_tecnicos')
        ->join('distribuidors', 'distribuidors.id', '=', 'detalle_recepcion_tecnicos.distribuidor_id')
        ->join('users', 'distribuidors.user_id', '=', 'users.id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('piezas','detalle_donacions.pieza_id','=','piezas.id')
        ->select('distribuidors.id as distribuidorId','users.id as userId',
        'piezas.id as piezaId','detalle_recepcion_tecnicos.id as recepcionId',
        'users.nombre as userNombre','users.apellido as userApellido',
        'users.email as userEmail','piezas.nombre as piezaNombre',
        'piezas.detalle as piezaDetalle','piezas.estado as piezaEstado')
        ->get();
        

        $piezasAgendadas=array();
        $piezasAceptadas=array();

        foreach ($donancionPieza as $piezas){
            foreach ($tecnicos as $tecnico){
             if($piezas->piezaEstado == 'Agendado' && $tecnico->user_id == Auth::user()->id){
                $piezasAgendadas[]=$piezas;
                //dd($piezasAgendadas);
            }elseif($piezas->piezaEstado == 'Mantenimiento' && $tecnico->user_id == Auth::user()->id){
                $piezasAceptadas[]=$piezas;
            }
            }
         }
        
        return view('tecnico.dashboard',
        compact('equiposAgendados','equiposAceptados','piezasAgendadas','piezasAceptadas','perfilTecnico'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function equipoCreate($id)
    {
        $equipoGet=DB::table('detalle_recepcion_tecnicos')
        ->join('distribuidors', 'distribuidors.id', '=', 'detalle_recepcion_tecnicos.distribuidor_id')
        ->join('users', 'distribuidors.user_id', '=', 'users.id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('equipos','detalle_donacions.equipo_id','=','equipos.id')
        ->select('distribuidors.id as distribuidorId','users.id as userId',
        'detalle_donacions.id as donacionId',
        'equipos.id as equipoId','detalle_recepcion_tecnicos.id as recepcionId',
        'detalle_recepcion_tecnicos.fecha as recepcionFecha','detalle_recepcion_tecnicos.hora as recepcionHora',
        'users.nombre as userNombre','users.apellido as userApellido',
        'users.email as userEmail','equipos.sistema_operativo as equipoSistema',
        'equipos.procesador as equipoProcesador','equipos.ram as equipoRam','equipos.almacenamiento as equipoAlmacenamiento',
        'equipos.detalle as equipoDetalle','equipos.estado as equipoEstado')
        ->where('detalle_recepcion_tecnicos.id','=',$id)
        ->get();

        
        return view('tecnico.create-equipo',compact('equipoGet'));
    }

    public function piezaCreate( $id)
    {
        $piezaGet=DB::table('detalle_recepcion_tecnicos')
        ->join('distribuidors', 'distribuidors.id', '=', 'detalle_recepcion_tecnicos.distribuidor_id')
        ->join('users', 'distribuidors.user_id', '=', 'users.id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('piezas','detalle_donacions.pieza_id','=','piezas.id')
        ->select('distribuidors.id as distribuidorId','users.id as userId',
        'detalle_donacions.id as donacionId',
        'piezas.id as piezaId','detalle_recepcion_tecnicos.id as recepcionId',
        'detalle_recepcion_tecnicos.fecha as recepcionFecha','detalle_recepcion_tecnicos.hora as recepcionHora',
        'users.nombre as userNombre','users.apellido as userApellido',
        'users.email as userEmail','piezas.nombre as piezaNombre',
        'piezas.detalle as piezaDetalle','piezas.estado as piezaEstado')
        ->where('detalle_recepcion_tecnicos.id','=',$id)
        ->get();

        

         //dd($pieza);
        return view('tecnico.create-pieza',compact('piezaGet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function equipoStore(Request $request, $id)
    {
        $detalle_recepcion=DetalleRecepcionTecnico::findOrFail($id);
        $detalle_donacion=DetalleDonacion::findOrFail($request->detalle_donacion_id);
        $equipo=Equipo::findOrFail($request->equipo_id);
        $equipo->estado=$request->estado;
        $detalle_donacion->estado=$request->estado;
        $detalle_recepcion->estado=$request->estado;
        $detalle_recepcion->save();
        $detalle_donacion->save();
        $equipo->save();


        //dd($detalle_donacion);
        return redirect('tecnico/dashboard');
    }

    public function piezaStore(Request $request, $id)
    {
        $detalle_recepcion=DetalleRecepcionTecnico::findOrFail($id);
        $detalle_donacion=DetalleDonacion::findOrFail($request->detalle_donacion_id);
        $pieza=Pieza::findOrFail($request->pieza_id);
        $pieza->estado=$request->estado;
        $detalle_donacion->estado=$request->estado;
        $detalle_recepcion->estado=$request->estado;
        $detalle_recepcion->save();
        $detalle_donacion->save();
        $pieza->save();


        //dd($detalle_donacion);
        return redirect('tecnico/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function equipoShow($id)
    {
        $equipoGet=DB::table('detalle_recepcion_tecnicos')
        ->join('distribuidors', 'distribuidors.id', '=', 'detalle_recepcion_tecnicos.distribuidor_id')
        ->join('users', 'distribuidors.user_id', '=', 'users.id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('equipos','detalle_donacions.equipo_id','=','equipos.id')
        ->select('distribuidors.id as distribuidorId','users.id as userId',
        'detalle_donacions.id as donacionId',
        'equipos.id as equipoId','detalle_recepcion_tecnicos.id as recepcionId',
        'detalle_recepcion_tecnicos.fecha as recepcionFecha','detalle_recepcion_tecnicos.hora as recepcionHora',
        'users.nombre as userNombre','users.apellido as userApellido',
        'users.email as userEmail','equipos.sistema_operativo as equipoSistema',
        'equipos.procesador as equipoProcesador','equipos.ram as equipoRam','equipos.almacenamiento as equipoAlmacenamiento',
        'equipos.detalle as equipoDetalle','equipos.estado as equipoEstado')
        ->where('detalle_recepcion_tecnicos.id','=',$id)
        ->get();
        
        return view('tecnico.edit-equipo',compact('equipoGet'));
    }

    public function piezaShow($id)
    {
        $piezaGet=DB::table('detalle_recepcion_tecnicos')
        ->join('distribuidors', 'distribuidors.id', '=', 'detalle_recepcion_tecnicos.distribuidor_id')
        ->join('users', 'distribuidors.user_id', '=', 'users.id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('piezas','detalle_donacions.pieza_id','=','piezas.id')
        ->select('distribuidors.id as distribuidorId','users.id as userId',
        'detalle_donacions.id as donacionId',
        'piezas.id as piezaId','detalle_recepcion_tecnicos.id as recepcionId',
        'detalle_recepcion_tecnicos.fecha as recepcionFecha','detalle_recepcion_tecnicos.hora as recepcionHora',
        'users.nombre as userNombre','users.apellido as userApellido',
        'users.email as userEmail','piezas.nombre as piezaNombre',
        'piezas.detalle as piezaDetalle','piezas.estado as piezaEstado')
        ->where('detalle_recepcion_tecnicos.id','=',$id)
        ->get();
        
        return view('tecnico.edit-pieza',compact('piezaGet'));
        //
    }
        
        public function show($id)
    {
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
    public function equipoEdit(Request $request, $id)
    {
        $detalle_recepcion=DetalleRecepcionTecnico::findOrFail($id);
        $detalle_donacion=DetalleDonacion::findOrFail($request->detalle_donacion_id);
        $equipo=Equipo::findOrFail($request->equipo_id);
        $equipo->estado=$request->estado;
        $detalle_donacion->estado=$request->estado;
        $detalle_recepcion->estado=$request->estado;
        $detalle_recepcion->save();
        $detalle_donacion->save();
        $equipo->save();

         //dd($equipo);
         return redirect('tecnico/dashboard');
    }

    public function piezaEdit(Request $request, $id)
    {
        $detalle_recepcion=DetalleRecepcionTecnico::findOrFail($id);
        $detalle_donacion=DetalleDonacion::findOrFail($request->detalle_donacion_id);
        $pieza=Pieza::findOrFail($request->pieza_id);
        $pieza->estado=$request->estado;
        $detalle_donacion->estado=$request->estado;
        $detalle_recepcion->estado=$request->estado;
        $detalle_recepcion->save();
        $detalle_donacion->save();
        $pieza->save();

         //dd($detalle);
         return redirect('tecnico/dashboard');
        //
    }
    public function edit( $id)
        {
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
    public function diagnostico()
    {
        
        //detalleRecepcion los campos
        $detalleRecepcionEquipos=DB::table('detalle_recepcion_tecnicos')
        ->join('tecnicos','tecnicos.id','=','detalle_recepcion_tecnicos.tecnico_id')
        ->join('users','users.id','=','tecnicos.user_id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('equipos','equipos.id','=','detalle_donacions.equipo_id')
        ->select('equipos.id as equipoId','detalle_recepcion_tecnicos.id as recepcionId',
        'equipos.sistema_operativo as equipoSistema',
        'equipos.procesador as equipoProcesador','equipos.ram as equipoRam','equipos.almacenamiento as equipoAlmacenamiento',
        'equipos.detalle as equipoDetalle','detalle_recepcion_tecnicos.estado as recepcionEstado')
        ->where('detalle_recepcion_tecnicos.estado','=','Mantenimiento')
        ->where('tecnicos.user_id','=',Auth::user()->id)
        ->get();
        //dd($detalleRecepcionEquipos);

        $detalleDiagnosticadoEquipos=DB::table('diagnosticos')
        ->join('detalle_recepcion_tecnicos','detalle_recepcion_tecnicos.id','=','diagnosticos.detalle_recepcion_id')
        ->join('tecnicos','tecnicos.id','=','detalle_recepcion_tecnicos.tecnico_id')
        ->join('users','users.id','=','tecnicos.user_id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('equipos','equipos.id','=','detalle_donacions.equipo_id')
        ->select('detalle_recepcion_tecnicos.id as recepcionId','diagnosticos.id as diagnosticoId',
        'equipos.id as equipoId','equipos.sistema_operativo as equipoSistema',
        'equipos.procesador as equipoProcesador','equipos.ram as equipoRam','equipos.almacenamiento as equipoAlmacenamiento',
        'equipos.detalle as equipoDetalle','diagnosticos.detalle as diagnosticoDetalle','diagnosticos.estado as diagnosticoEstado')
        ->where('diagnosticos.estado','=','Diagnosticado')
        ->where('tecnicos.user_id','=',Auth::user()->id)
        ->get();

        //detalleRecepcion los campos
        $detalleRecepcionPiezas=DB::table('detalle_recepcion_tecnicos')
        ->join('tecnicos','tecnicos.id','=','detalle_recepcion_tecnicos.tecnico_id')
        ->join('users','users.id','=','tecnicos.user_id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('piezas','piezas.id','=','detalle_donacions.pieza_id')
        ->select('piezas.id as piezaId','detalle_recepcion_tecnicos.id as recepcionId',
        'piezas.nombre as piezaNombre',
        'piezas.detalle as piezaDetalle','detalle_recepcion_tecnicos.estado as recepcionEstado')
        ->where('detalle_recepcion_tecnicos.estado','=','Mantenimiento')
        ->where('tecnicos.user_id','=',Auth::user()->id)
        ->get();

        $detalleDiagnosticadoPiezas=DB::table('diagnosticos')
        ->join('detalle_recepcion_tecnicos','detalle_recepcion_tecnicos.id','=','diagnosticos.detalle_recepcion_id')
        ->join('tecnicos','tecnicos.id','=','detalle_recepcion_tecnicos.tecnico_id')
        ->join('users','users.id','=','tecnicos.user_id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('piezas','piezas.id','=','detalle_donacions.pieza_id')
        ->select('piezas.id as piezaId','detalle_recepcion_tecnicos.id as recepcionId',
        'diagnosticos.id as diagnosticoId','piezas.nombre as piezaNombre',
        'piezas.detalle as piezaDetalle','diagnosticos.detalle as diagnosticoDetalle','diagnosticos.estado as diagnosticoEstado')
        ->where('diagnosticos.estado','=','Diagnosticado')
        ->where('tecnicos.user_id','=',Auth::user()->id)
        ->get();
    

        return view('tecnico.dashboard-diagnostico',
         compact('detalleRecepcionEquipos','detalleRecepcionPiezas','detalleDiagnosticadoEquipos','detalleDiagnosticadoPiezas'));
    }
    public function diagnosticoEquipoCreate($id)
    {
        $detallesRepcion=DB::table('detalle_recepcion_tecnicos')
        ->join('tecnicos','tecnicos.id','=','detalle_recepcion_tecnicos.tecnico_id')
        ->join('users','users.id','=','tecnicos.user_id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('equipos','equipos.id','=','detalle_donacions.equipo_id')
        ->select('equipos.id as equipoId','detalle_recepcion_tecnicos.id as recepcionId',
        'equipos.sistema_operativo as equipoSistema','tecnicos.id as tecnicoId',
        'equipos.procesador as equipoProcesador','equipos.ram as equipoRam','equipos.almacenamiento as equipoAlmacenamiento',
        'equipos.detalle as equipoDetalle','detalle_recepcion_tecnicos.estado as recepcionEstado',
        'detalle_donacions.id as donacionId')
        ->where('detalle_recepcion_tecnicos.id','=',$id)
        ->where('tecnicos.user_id','=',Auth::user()->id)
        ->get();

        //dd($detallesRepcion);
        
        return view('tecnico.create-diagnostico-equipo',compact('detallesRepcion'));
    }
    public function diagnosticoPiezaCreate($id)
    {
        $detallesRepcion=DB::table('detalle_recepcion_tecnicos')
        ->join('tecnicos','tecnicos.id','=','detalle_recepcion_tecnicos.tecnico_id')
        ->join('users','users.id','=','tecnicos.user_id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('piezas','piezas.id','=','detalle_donacions.pieza_id')
        ->select('piezas.id as piezaId','detalle_recepcion_tecnicos.id as recepcionId',
        'piezas.nombre as piezaNombre','tecnicos.id as tecnicoId',
        'piezas.detalle as piezaDetalle','detalle_recepcion_tecnicos.estado as recepcionEstado',
        'detalle_donacions.id as donacionId')
        ->where('detalle_recepcion_tecnicos.id','=',$id)
        ->where('tecnicos.user_id','=',Auth::user()->id)
        ->get();

        return view('tecnico.create-diagnostico-pieza',compact('detallesRepcion'));
    }


    public function diagnosticoEquipoStore(Request $request)
    {
        //Equipo:estado:Diagnosticado
        //DetalleDonacion: estado Diagnosticado
        //Crear detalle recepcion Diagnosticado
        $diagnostico= new Diagnostico();

        $equipo=Equipo::findOrFail($request->equipo_id);
        $equipo->estado=$request->estado;

        $detalleDonacion=DetalleDonacion::findOrFail($request->detalle_donacion_id);
        $detalleDonacion->estado=$request->estado;

        $detallerRecepcion=DetalleRecepcionTecnico::findOrFail($request->detalle_recepcion_id);
        $detallerRecepcion->estado=$request->estado;

        $diagnostico->tecnico_id=$request->tecnico_id;
        $diagnostico->detalle_recepcion_id=$request->detalle_recepcion_id;
        $diagnostico->detalle=$request->detalle;
        $diagnostico->estado=$request->estado;

        
        $equipo->save();
        $detalleDonacion->save();
        $detallerRecepcion->save();
        $diagnostico->save();

        //dd($recepcion);
        return redirect('tecnico/diagnostico');
        

    }
    public function diagnosticoPiezaStore(Request $request)
    {
        $diagnostico= new Diagnostico();

        $pieza=Pieza::findOrFail($request->pieza_id);
        $pieza->estado=$request->estado;

        $detalleDonacion=DetalleDonacion::findOrFail($request->detalle_donacion_id);
        $detalleDonacion->estado=$request->estado;

        $detallerRecepcion=DetalleRecepcionTecnico::findOrFail($request->detalle_recepcion_id);
        $detallerRecepcion->estado=$request->estado;

        $diagnostico->tecnico_id=$request->tecnico_id;
        $diagnostico->detalle_recepcion_id=$request->detalle_recepcion_id;
        $diagnostico->detalle=$request->detalle;
        $diagnostico->estado=$request->estado;

        $pieza->save();
        $detalleDonacion->save();
        $detallerRecepcion->save();
        $diagnostico->save();
        //dd($recepcion);
        return redirect('tecnico/diagnostico');
    }

    public function diagnosticoEquipoShow($id){
        $recepciones=DB::table('diagnosticos')
        ->join('detalle_recepcion_tecnicos','detalle_recepcion_tecnicos.id','=','diagnosticos.detalle_recepcion_id')
        ->join('tecnicos','tecnicos.id','=','detalle_recepcion_tecnicos.tecnico_id')
        ->join('users','users.id','=','tecnicos.user_id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('equipos','equipos.id','=','detalle_donacions.equipo_id')
        ->select('detalle_recepcion_tecnicos.id as recepcionId','diagnosticos.id as diagnosticoId',
        'equipos.id as equipoId','equipos.sistema_operativo as equipoSistema',
        'equipos.procesador as equipoProcesador','equipos.ram as equipoRam','equipos.almacenamiento as equipoAlmacenamiento',
        'equipos.detalle as equipoDetalle','diagnosticos.detalle as diagnosticoDetalle','diagnosticos.estado as diagnosticoEstado')
        ->where('diagnosticos.estado','=','Diagnosticado')
        ->where('tecnicos.user_id','=',Auth::user()->id)
        ->get();

        return view('tecnico.edit-diagnostico-equipo',compact('recepciones'));
    }

    public function diagnosticoPiezaShow($id){
        $recepciones=DB::table('diagnosticos')
        ->join('detalle_recepcion_tecnicos','detalle_recepcion_tecnicos.id','=','diagnosticos.detalle_recepcion_id')
        ->join('tecnicos','tecnicos.id','=','detalle_recepcion_tecnicos.tecnico_id')
        ->join('users','users.id','=','tecnicos.user_id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('piezas','piezas.id','=','detalle_donacions.pieza_id')
        ->select('piezas.id as piezaId','detalle_recepcion_tecnicos.id as recepcionId',
        'diagnosticos.id as diagnosticoId','piezas.nombre as piezaNombre',
        'piezas.detalle as piezaDetalle','diagnosticos.detalle as diagnosticoDetalle','diagnosticos.estado as diagnosticoEstado')
        ->where('diagnosticos.estado','=','Diagnosticado')
        ->where('tecnicos.user_id','=',Auth::user()->id)
        ->get();

        return view('tecnico.edit-diagnostico-pieza',compact('recepciones'));
    }

    public function diagnosticoEquipoEdit(Request $request, $id){
        $diagnostico=Diagnostico::findOrFail($id);
        $diagnostico->detalle=$request->detalle;
        $diagnostico->estado=$request->estado;
        $diagnostico->save();

        return redirect('tecnico/diagnostico');
    }

    public function diagnosticoPiezaEdit(Request $request, $id){
        $diagnostico=Diagnostico::findOrFail($id);
        $diagnostico->detalle=$request->detalle;
        $diagnostico->estado=$request->estado;
        $diagnostico->save();

        return redirect('tecnico/diagnostico');
    }

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
    public function diagnosticoEquipoDestroy($id)
    {
        //Cambiar el estado a Aceptado en equipo, detalledonacion y eliminar detalle recepcion
        $diagnostico=Diagnostico::findOrFail($id);
        $detalle_recepcion=DetalleRecepcionTecnico::findOrFail($diagnostico->detalle_recepcion_id);
        $detalle_donacion=DetalleDonacion::findOrFail($detalle_recepcion->detalle_donacion_id);
        $equipo=Equipo::findOrFail($detalle_donacion->equipo_id);
        $detalle_recepcion->estado='Mantenimiento';
        $detalle_donacion->estado='Mantenimiento';
        $equipo->estado='Mantenimiento';
        $diagnostico->delete();
        $detalle_donacion->save();
        $detalle_recepcion->save();
        $equipo->save();
        return redirect('tecnico/diagnostico');

    }

    public function diagnosticoPiezaDestroy($id)
    {
        //Cambiar el estado a Aceptado en pieza, detalledonacion y eliminar detalle recepcion
        $diagnostico=Diagnostico::findOrFail($id);
        $detalle_recepcion=DetalleRecepcionTecnico::findOrFail($diagnostico->detalle_recepcion_id);
        $detalle_donacion=DetalleDonacion::findOrFail($detalle_recepcion->detalle_donacion_id);
        $pieza=Pieza::findOrFail($detalle_donacion->pieza_id);
        $detalle_recepcion->estado='Mantenimiento';
        $detalle_donacion->estado='Mantenimiento';
        $pieza->estado='Mantenimiento';
        $diagnostico->delete();
        $detalle_recepcion->save();
        $detalle_donacion->save();
        $pieza->save();
        return redirect('tecnico/diagnostico');
    }
}