<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Donante;
use App\Models\Pieza;
use App\Models\Equipo;
use App\Models\DetalleDonacion;
use App\Models\DetalleRecepcionTecnico;
use App\Models\Distribuidor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DistribuidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vista()
    {
        
        $donantesEquipo=DB::table('users')
        ->join('donantes', 'donantes.user_id', '=', 'users.id')
        ->join('cantons','users.canton_id','=','cantons.id')
        ->join('provincias','cantons.provincia_id','=','provincias.id')
        ->join('equipos','donantes.id','=','equipos.donante_id')
        ->select('donantes.id as donanteId','users.id as userId',
        'equipos.id as equipoId',
        'users.nombre as userNombre','users.apellido as userApellido',
        'provincias.descripcion as provinciaDescripcion',
        'cantons.descripcion as cantonDescripcion','users.direccion as userDireccion',
        'equipos.detalle as equipoDetalle','equipos.estado as equipoEstado')
        ->get();

        $equiposDonados=array();
        $equiposAceptados=array();
        foreach ($donantesEquipo as $equipos){
            if($equipos->equipoEstado == null){
                $equiposDonados[]=$equipos;
            }elseif($equipos->equipoEstado == 'Aceptado'){
                $equiposAceptados[]=$equipos;
            }
        }

        $donantesPieza=DB::table('users')
        ->join('donantes', 'donantes.user_id', '=', 'users.id')
        ->join('cantons','users.canton_id','=','cantons.id')
        ->join('provincias','cantons.provincia_id','=','provincias.id')
        ->join('piezas','donantes.id','=','piezas.donante_id')
        ->select('donantes.id as donanteId','users.id as userId',
        'piezas.id as piezaId',
        'users.nombre as userNombre','users.apellido as userApellido',
        'provincias.descripcion as provinciaDescripcion',
        'cantons.descripcion as cantonDescripcion','users.direccion as userDireccion',
        'piezas.nombre as piezaNombre','piezas.detalle as piezaDetalle','piezas.estado as piezaEstado')
        ->get();
        //dd($donantesPieza);

        $piezasDonadas=array();
        $piezasAceptadas=array();

        foreach ($donantesPieza as $piezas){
            if($piezas->piezaEstado == null){
                $piezasDonadas[]=$piezas;
            }elseif($piezas->piezaEstado == 'Aceptado'){
                $piezasAceptadas[]=$piezas;
            }
        }
        
        return view('distribuidor.dashboard',compact('equiposDonados','equiposAceptados','piezasDonadas','piezasAceptadas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function equipoCreate($id)
    {
        $equipoGet = DB::table('users')
        ->join('donantes', 'donantes.user_id', '=', 'users.id')
        ->join('cantons','users.canton_id','=','cantons.id')
        ->join('provincias','cantons.provincia_id','=','provincias.id')
        ->join('equipos','donantes.id','=','equipos.donante_id')
        ->select('donantes.id as donanteId','users.id as userId',
        'equipos.id as equipoId','donantes.user_id as donanteUserId',
        'users.nombre as userNombre','users.apellido as userApellido',
        'provincias.descripcion as provinciaDescripcion',
        'cantons.descripcion as cantonDescripcion','users.direccion as userDireccion',
        'donantes.fecha_entrega as donanteFecha','donantes.hora_entrega as donanteHora',
        'equipos.detalle as equipoDetalle','equipos.estado as equipoEstado')
        ->where('equipos.id','=',$id)
        ->get();

        $distribuidor= DB::table('distribuidors')->get();
        
        return view('distribuidor.create-equipo',compact('equipoGet','distribuidor'));
    }

    public function piezaCreate( $id)
    {
        $piezaGet = DB::table('users')
        ->join('donantes', 'donantes.user_id', '=', 'users.id')
        ->join('cantons','users.canton_id','=','cantons.id')
        ->join('provincias','cantons.provincia_id','=','provincias.id')
        ->join('piezas','donantes.id','=','piezas.donante_id')
        ->select('donantes.id as donanteId','users.id as userId',
        'piezas.id as piezaId',
        'users.nombre as userNombre','users.apellido as userApellido',
        'provincias.descripcion as provinciaDescripcion',
        'cantons.descripcion as cantonDescripcion','users.direccion as userDireccion',
        'donantes.fecha_entrega as donanteFecha','donantes.hora_entrega as donanteHora',
        'piezas.nombre as piezaNombre','piezas.detalle as piezaDetalle','piezas.estado as piezaEstado')
        ->where('piezas.id','=',$id)
        ->get();

        $distribuidor= DB::table('distribuidors')->get();

         //dd($pieza);
        return view('distribuidor.create-pieza',compact('piezaGet','distribuidor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function equipoStore(Request $request)
    {
        $detalle_donacion=new DetalleDonacion();
        $equipo=Equipo::findOrFail($request->equipo_id);
        $equipo->estado=$request->estado;
        $detalle_donacion->equipo_id= $request->equipo_id;
        $detalle_donacion->pieza_id=null;
        $detalle_donacion->distribuidor_id=$request->distribuidor_id;
        $detalle_donacion->estado=$request->estado;
        $detalle_donacion->save();
        $equipo->save();


        //dd($detalle_donacion);
        return redirect('distribuidor/dashboard');
    }

    public function piezaStore(Request $request)
    {
        $detalle_donacion=new DetalleDonacion();
        $pieza=Pieza::findOrFail($request->pieza_id);
        $pieza->estado=$request->estado;
        $detalle_donacion->pieza_id= $request->pieza_id;
        $detalle_donacion->equipo_id=null;
        $detalle_donacion->distribuidor_id=$request->distribuidor_id;
        $detalle_donacion->estado=$request->estado;
        $detalle_donacion->save();
        $pieza->save();


        //dd($detalle_donacion);
        return redirect('distribuidor/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function equipoShow($id)
    {
        $equipoGet = DB::table('users')
        ->join('donantes', 'donantes.user_id', '=', 'users.id')
        ->join('cantons','users.canton_id','=','cantons.id')
        ->join('provincias','cantons.provincia_id','=','provincias.id')
        ->join('equipos','donantes.id','=','equipos.donante_id')
        ->select('donantes.id as donanteId','users.id as userId',
        'equipos.id as equipoId','donantes.user_id as donanteUserId',
        'users.nombre as userNombre','users.apellido as userApellido',
        'provincias.descripcion as provinciaDescripcion',
        'cantons.descripcion as cantonDescripcion','users.direccion as userDireccion',
        'donantes.fecha_entrega as donanteFecha','donantes.hora_entrega as donanteHora',
        'equipos.detalle as equipoDetalle','equipos.estado as equipoEstado')
        ->where('equipos.id','=',$id)
        ->get();

        $detalle_donacion= DB::table('detalle_donacions')
        ->join('distribuidors','distribuidors.id','=','detalle_donacions.distribuidor_id')
        ->join('users','users.id','=','distribuidors.user_id')
        ->select('detalle_donacions.id as detalleId',
        'detalle_donacions.equipo_id as detalleEquipoId',
        'detalle_donacions.distribuidor_id as detalleDistribuidorId','distribuidors.user_id as distribuidorUserId')
        ->get();
        
        $detalleD=array();
        
            foreach($detalle_donacion as $detalle){
                if($detalle->detalleEquipoId == $id && $detalle->distribuidorUserId == Auth::user()->id){
                    $detalleD[]=$detalle;
                    //dd($detalleD);
                }
            }
        
        return view('distribuidor.edit-equipo',compact('equipoGet','detalleD'));
    }

    public function piezaShow($id)
    {
        $piezaGet = DB::table('users')
        ->join('donantes', 'donantes.user_id', '=', 'users.id')
        ->join('cantons','users.canton_id','=','cantons.id')
        ->join('provincias','cantons.provincia_id','=','provincias.id')
        ->join('piezas','donantes.id','=','piezas.donante_id')
        ->select('donantes.id as donanteId','users.id as userId',
        'piezas.id as piezaId',
        'users.nombre as userNombre','users.apellido as userApellido',
        'provincias.descripcion as provinciaDescripcion',
        'cantons.descripcion as cantonDescripcion','users.direccion as userDireccion',
        'donantes.fecha_entrega as donanteFecha','donantes.hora_entrega as donanteHora',
        'piezas.nombre as piezaNombre','piezas.detalle as piezaDetalle','piezas.estado as piezaEstado')
        ->where('piezas.id','=',$id)
        ->get();
        
        $detalle_donacion= DB::table('detalle_donacions')
        ->join('distribuidors','distribuidors.id','=','detalle_donacions.distribuidor_id')
        ->join('users','users.id','=','distribuidors.user_id')
        ->select('detalle_donacions.id as detalleId',
        'detalle_donacions.pieza_id as detallePiezaId',
        'detalle_donacions.distribuidor_id as detalleDistribuidorId','distribuidors.user_id as distribuidorUserId')
        ->get();
        
        $detalleD=array();
        
            foreach($detalle_donacion as $detalle){
                if($detalle->detallePiezaId == $id && $detalle->distribuidorUserId == Auth::user()->id){
                    $detalleD[]=$detalle;
                    //dd($detalleD);
                }
            }
        
        return view('distribuidor.edit-pieza',compact('piezaGet','detalleD'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function equipoEdit(Request $request, $id)
    {
        $equipo=Equipo::findOrFail($id);
        $equipo->estado=$request->estado;
        $detalle=DetalleDonacion::findOrFail($request->detalle_id);
        $detalle->delete();
        $equipo->save();

         //dd($equipo);
         return redirect('distribuidor/dashboard');
    }

    public function piezaEdit(Request $request, $id)
    {
        $pieza=Pieza::findOrFail($id);
        $pieza->estado=$request->estado;
        $detalle=DetalleDonacion::findOrFail($request->detalle_id);
        $detalle->delete();
        $pieza->save();

         //dd($detalle);
         return redirect('distribuidor/dashboard');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function agenda()
    {
        $detalle_donacion_equipos=DB::table('detalle_donacions')
        ->join('equipos','equipos.id','=','detalle_donacions.equipo_id')
        ->select('equipos.id as equipoId','detalle_donacions.id as detalleId',
        'equipos.estado as equipoEstado','detalle_donacions.estado as detalleEstado',
        'equipos.detalle as equipoDetalle','equipos.sistema_operativo as equipoSistema',
        'equipos.almacenamiento as equipoAlmacenamiento')
        ->where('detalle_donacions.estado','=','Aceptado')
        ->get();
        //detalleRecepcion los campos
        $detalleRecepcionEquipos=DB::table('detalle_recepcion_tecnicos')
        ->join('tecnicos','tecnicos.id','=','detalle_recepcion_tecnicos.tecnico_id')
        ->join('users','users.id','=','tecnicos.user_id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('equipos','equipos.id','=','detalle_donacions.equipo_id')
        ->select('detalle_recepcion_tecnicos.fecha as recepcionFecha','detalle_recepcion_tecnicos.hora as recepcionHora',
        'users.nombre as tecnicoNombre','users.apellido as tecnicoApellido','equipos.detalle as equipoDetalle',
        'detalle_recepcion_tecnicos.estado as detalleEstado','detalle_recepcion_tecnicos.id as recepcionId')
        ->get();

        $detallePendienteEquipos=array();
        foreach($detalleRecepcionEquipos as $detalleEquipo){
            if($detalleEquipo->detalleEstado == 'Agendado'){
                $detallePendienteEquipos[]=$detalleEquipo;
            }
        }

        $detalle_donacion_piezas=DB::table('detalle_donacions')
        ->join('piezas','piezas.id','=','detalle_donacions.pieza_id')
        ->select('piezas.id as piezaId','detalle_donacions.id as detalleId',
        'piezas.estado as piezaEstado','detalle_donacions.estado as detalleEstado',
        'piezas.detalle as piezaDetalle','piezas.nombre as piezaNombre')
        ->where('detalle_donacions.estado','=','Aceptado')
        ->get();
        //detalleRecepcion los campos
        $detalleRecepcionPiezas=DB::table('detalle_recepcion_tecnicos')
        ->join('tecnicos','tecnicos.id','=','detalle_recepcion_tecnicos.tecnico_id')
        ->join('users','users.id','=','tecnicos.user_id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('piezas','piezas.id','=','detalle_donacions.pieza_id')
        ->select('detalle_recepcion_tecnicos.fecha as recepcionFecha','detalle_recepcion_tecnicos.hora as recepcionHora',
        'users.nombre as tecnicoNombre','users.apellido as tecnicoApellido','piezas.detalle as piezaDetalle',
        'detalle_recepcion_tecnicos.estado as detalleEstado','detalle_recepcion_tecnicos.id as recepcionId')
        ->get();

        $detallePendientePiezas=array();
        foreach($detalleRecepcionPiezas as $detallePieza){
            if($detallePieza->detalleEstado == 'Agendado'){
                $detallePendientePiezas[]=$detallePieza;
            }
        }

        return view('distribuidor.dashboard-agenda',
        compact('detalle_donacion_equipos','detallePendienteEquipos','detalle_donacion_piezas','detallePendientePiezas'));
    }
    public function agendaEquipoCreate($id)
    {
        $detallesD=DB::table('detalle_donacions')
        ->join('distribuidors','distribuidors.id','=','detalle_donacions.distribuidor_id')
        ->join('equipos','equipos.id','=','detalle_donacions.equipo_id')
        ->select('detalle_donacions.id as detalleId','distribuidors.id as distribuidorId',
        'equipos.id as equipoId','equipos.detalle as equipoDetalle','distribuidors.user_id as distribuidorUser')
        ->get();
        $detallesDonacion=array();

        foreach ($detallesD as $detalle){
            if($detalle->equipoId == $id && Auth::user()->id == $detalle->distribuidorUser){
                $detallesDonacion[]=$detalle;
                //dd($detallesDonacion);
            }
        }
        
            
        $tecnicos=DB::table('tecnicos')
        ->join('users','users.id','=','tecnicos.user_id')
        ->select('users.email as userEmail','tecnicos.id as tecnicoId',
        'users.nombre as userNombre','users.apellido as userApellido')
        ->where('tecnicos.disponibilidad','=','Activa')
        ->get();
        //dd($tecnicos);
        return view('distribuidor.create-agenda-equipo',compact('detallesDonacion','tecnicos'));
    }
    public function agendaPiezaCreate($id)
    {
        $detallesD=DB::table('detalle_donacions')
        ->join('distribuidors','distribuidors.id','=','detalle_donacions.distribuidor_id')
        ->join('piezas','piezas.id','=','detalle_donacions.pieza_id')
        ->select('detalle_donacions.id as detalleId','distribuidors.id as distribuidorId',
        'piezas.id as piezaId','piezas.detalle as piezaDetalle','distribuidors.user_id as distribuidorUser')
        ->get();

        $detallesDonacion=array();

        foreach ($detallesD as $detalle){
            if($detalle->piezaId == $id && Auth::user()->id == $detalle->distribuidorUser){
                $detallesDonacion[]=$detalle;
                //dd($detallesDonacion);
            }
        }
            //dd($detalle);

            $tecnicos=DB::table('tecnicos')
            ->join('users','users.id','=','tecnicos.user_id')
            ->select('users.email as userEmail','tecnicos.id as tecnicoId',
            'users.nombre as userNombre','users.apellido as userApellido')
            ->where('tecnicos.disponibilidad','=','Activa')
            ->get();

        return view('distribuidor.create-agenda-pieza',compact('detallesDonacion','tecnicos'));
    }


    public function agendaEquipoStore(Request $request)
    {
        //Equipo:estado:Agendado
        //DetalleDonacion: estado Agendado
        //Crear detalle recepcion Agendado
        $recepcion= new DetalleRecepcionTecnico();

        $equipo=Equipo::findOrFail($request->equipo_id);
        $equipo->estado=$request->estado;

        $detalleDonacion=DetalleDonacion::findOrFail($request->detalle_donacion_id);
        $detalleDonacion->estado=$request->estado;

        $recepcion->tecnico_id=$request->tecnico_id;
        $recepcion->distribuidor_id=$request->distribuidor_id;
        $recepcion->detalle_donacion_id=$request->detalle_donacion_id;
        $recepcion->fecha=$request->fecha;
        $recepcion->hora=$request->hora;
        $recepcion->estado=$request->estado;

        
        $equipo->save();
        $detalleDonacion->save();
        $recepcion->save();

        //dd($recepcion);
        return redirect('distribuidor/agenda');
        

    }
    public function agendaPiezaStore(Request $request)
    {
        $recepcion= new DetalleRecepcionTecnico();

        $pieza=Pieza::findOrFail($request->pieza_id);
        $pieza->estado=$request->estado;

        $detalleDonacion=DetalleDonacion::findOrFail($request->detalle_donacion_id);
        $detalleDonacion->estado=$request->estado;

        $recepcion->tecnico_id=$request->tecnico_id;
        $recepcion->distribuidor_id=$request->distribuidor_id;
        $recepcion->detalle_donacion_id=$request->detalle_donacion_id;
        $recepcion->fecha=$request->fecha;
        $recepcion->hora=$request->hora;
        $recepcion->estado=$request->estado;

        
        $pieza->save();
        $detalleDonacion->save();
        $recepcion->save();

        //dd($recepcion);
        return redirect('distribuidor/agenda');
    }

    public function agendaEquipoShow($id){
        $recepciones=DB::table('detalle_recepcion_tecnicos')
        ->join('tecnicos','tecnicos.id','=','detalle_recepcion_tecnicos.tecnico_id')
        ->join('users','users.id','=','tecnicos.user_id')
        ->select('detalle_recepcion_tecnicos.id as recepcionId','detalle_recepcion_tecnicos.fecha as recepcionFecha',
        'detalle_recepcion_tecnicos.hora as recepcionHora','detalle_recepcion_tecnicos.tecnico_id as recepcionTecnicoId',
        'users.nombre as userNombre','users.apellido as userApellido','users.email as userEmail')
        ->where('detalle_recepcion_tecnicos.id','=',$id)
        ->get();

        $tecnicos=DB::table('tecnicos')
        ->join('users','users.id','=','tecnicos.user_id')
        ->select('users.email as userEmail','tecnicos.id as tecnicoId',
        'users.nombre as userNombre','users.apellido as userApellido')
        ->where('tecnicos.disponibilidad','=','Activa')
        ->get();

        return view('distribuidor.edit-agenda-equipo',compact('recepciones','tecnicos'));
    }

    public function agendaPiezaShow($id){
        $recepciones=DB::table('detalle_recepcion_tecnicos')
        ->join('tecnicos','tecnicos.id','=','detalle_recepcion_tecnicos.tecnico_id')
        ->join('users','users.id','=','tecnicos.user_id')
        ->select('detalle_recepcion_tecnicos.id as recepcionId','detalle_recepcion_tecnicos.fecha as recepcionFecha',
        'detalle_recepcion_tecnicos.hora as recepcionHora','detalle_recepcion_tecnicos.tecnico_id as recepcionTecnicoId',
        'users.nombre as userNombre','users.apellido as userApellido','users.email as userEmail')
        ->where('detalle_recepcion_tecnicos.id','=',$id)
        ->get();

        $tecnicos=DB::table('tecnicos')
        ->join('users','users.id','=','tecnicos.user_id')
        ->select('users.email as userEmail','tecnicos.id as tecnicoId',
        'users.nombre as userNombre','users.apellido as userApellido')
        ->where('tecnicos.disponibilidad','=','Activa')
        ->get();

        return view('distribuidor.edit-agenda-pieza',compact('recepciones','tecnicos'));
    }

    public function agendaEquipoEdit(Request $request, $id){
        $detalle_recepcion=DetalleRecepcionTecnico::findOrFail($id);
        $detalle_recepcion->fecha=$request->fecha;
        $detalle_recepcion->hora=$request->hora;
        $detalle_recepcion->tecnico_id=$request->tecnico_id;
        $detalle_recepcion->estado=$request->estado;
        $detalle_recepcion->save();

        return redirect('distribuidor/agenda');
    }

    public function agendaPiezaEdit(Request $request, $id){
        $detalle_recepcion=DetalleRecepcionTecnico::findOrFail($id);
        $detalle_recepcion->fecha=$request->fecha;
        $detalle_recepcion->hora=$request->hora;
        $detalle_recepcion->tecnico_id=$request->tecnico_id;
        $detalle_recepcion->estado=$request->estado;
        $detalle_recepcion->save();

        return redirect('distribuidor/agenda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function agendaEquipoDestroy($id)
    {
        //Cambiar el estado a Aceptado en equipo, detalledonacion y eliminar detalle recepcion
        $detalle_recepcion=DetalleRecepcionTecnico::findOrFail($id);
        $detalle_donacion=DetalleDonacion::findOrFail($detalle_recepcion->detalle_donacion_id);
        $equipo=Equipo::findOrFail($detalle_donacion->equipo_id);
        $detalle_donacion->estado='Aceptado';
        $equipo->estado='Aceptado';
        $detalle_recepcion->delete();
        $detalle_donacion->save();
        $equipo->save();
        return redirect('distribuidor/agenda');

    }

    public function agendaPiezaDestroy($id)
    {
        //Cambiar el estado a Aceptado en pieza, detalledonacion y eliminar detalle recepcion
        $detalle_recepcion=DetalleRecepcionTecnico::findOrFail($id);
        $detalle_donacion=DetalleDonacion::findOrFail($detalle_recepcion->detalle_donacion_id);
        $pieza=Pieza::findOrFail($detalle_donacion->pieza_id);
        $detalle_donacion->estado='Aceptado';
        $pieza->estado='Aceptado';
        $detalle_recepcion->delete();
        $detalle_donacion->save();
        $pieza->save();
        return redirect('distribuidor/agenda');
    }
}
