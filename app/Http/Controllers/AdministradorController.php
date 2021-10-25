<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Administrador;
use App\Models\User;
use App\Models\Tecnico;
use App\Models\Diagnostico;
use App\Models\Equipo;
use App\Models\Beneficiario;
use App\Models\DetalleDonacion;
use App\Models\DetalleRecepcionTecnico;
use App\Models\Distribuidor;
use App\Models\DetalleEntregaDonacion;


class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function vista()
    {
        $entregas=DB::table('detalle_entrega_donacions')
        ->join('administradors','administradors.id','=','detalle_entrega_donacions.administrador_id')
        ->select('detalle_entrega_donacions.fecha_entrega as fecha','detalle_entrega_donacions.hora_entrega as hora',
        'detalle_entrega_donacions.estado_distribuidor as estadoDistribuidor','detalle_entrega_donacions.id as entregaId',
        'detalle_entrega_donacions.estado_tecnico as estadoTecnico','detalle_entrega_donacions.estado_beneficiario as estadoBeneficiario')
        ->where('administradors.user_id', '=', Auth::user()->id)
        ->get();

        $entregaConfirmada=array();
        $entregaPendiente=array();

        foreach ($entregas as $entrega){
            if($entrega->estadoDistribuidor == 'Aceptado' && $entrega->estadoTecnico == 'Aceptado'
            && $entrega->estadoBeneficiario == 'Aceptado'){
                $entregaConfirmada[]=$entrega;
            }else if($entrega->estadoDistribuidor == 'Rechazado' || $entrega->estadoTecnico == 'Rechazado'
            || $entrega->estadoBeneficiario == 'Rechazado' || $entrega->estadoDistribuidor == 'Pendiente' || $entrega->estadoTecnico == 'Pendiente'
            || $entrega->estadoBeneficiario == 'Pendiente'){
                $entregaPendiente[]=$entrega;
            }
        }
        return view('administrador.dashboard', compact('entregaConfirmada','entregaPendiente'));
    }

    public function index()
    {
        $beneficiarios=DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('users.nombre as userNombre','users.apellido as userApellido',
        'users.email as userEmail','beneficiarios.id as beneficiarioId','users.id as userId',
        'beneficiarios.prioridad as beneficiarioPrioridad')
        ->where('beneficiarios.estado', '=','Pendiente')
        ->get();

        $diagnosticos=DB::table('diagnosticos')
        ->join('detalle_recepcion_tecnicos','detalle_recepcion_tecnicos.id','=','diagnosticos.detalle_recepcion_id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('equipos','equipos.id','=','detalle_donacions.equipo_id')
        ->select('diagnosticos.detalle as diagnosticoDetalle','diagnosticos.id as diagnosticoId'
        ,'detalle_recepcion_tecnicos.id as recepcionId','detalle_donacions.id as donacionId',
        'equipos.id as equipoId')
        ->where('diagnosticos.estado','=','Diagnosticado')
        ->get();

        $distribuidors=DB::table('distribuidors')
        ->join('users','users.id','=','distribuidors.user_id')
        ->select('users.nombre as userNombre','users.apellido as userApellido',
        'users.email as userEmail','distribuidors.id as distribuidorId','users.id as userId')
        ->where('distribuidors.disponibilidad', '=','Activa')
        ->get();

        $administradors=DB::table('administradors')
        ->join('users', 'users.id','=','administradors.user_id')
        ->select('administradors.id as admistradorId')
        ->get();
        //dd($distribuidors);
        return view('administrador.create-entrega',compact('beneficiarios','diagnosticos','distribuidors','administradors'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Beneficiario-Pendiente a En espera, es para no volver a seleccionar al mismo beneficiario
        $beneficiario=Beneficiario::findOrFail($request->beneficiario_id);
        $beneficiario->estado= 'En espera';

        //Estado: Pre-entrega en diagnostico, detalle_recepcion, detalle_donacion, equipo
        $diagnostico=Diagnostico::findOrFail($request->diagnostico_id);
        $diagnostico->estado = 'Pre-entregado';

        $recepcion=DetalleRecepcionTecnico::findOrFail($diagnostico->detalle_recepcion_id);
        $recepcion->estado = 'Pre-entregado';


        $donacion=DetalleDonacion::findOrFail($recepcion->detalle_donacion_id);
        $donacion->estado = 'Pre-entregado';


        $equipo=Equipo::findOrFail($donacion->equipo_id);
        $equipo->estado = 'Pre-entregado';


        //Creación de detalle_entrega_donacions
        $entrega= new DetalleEntregaDonacion();
        $entrega->fecha_entrega=$request->fecha_entrega;
        $entrega->hora_entrega=$request->hora_entrega;
        $entrega->estado_distribuidor = 'Pendiente';
        $entrega->estado_beneficiario = 'Pendiente';
        $entrega->estado_tecnico = 'Pendiente';
        $entrega->administrador_id=$request->administrador_id;
        $entrega->beneficiario_id = $request->beneficiario_id;
        $entrega->distribuidor_id = $request->distribuidor_id;
        $entrega->diagnostico_id = $request->diagnostico_id;

        if($entrega->save()){
            $diagnostico->update();
            $recepcion->update();
            $donacion->update();
            $equipo->update();
            $beneficiario->update();
            return redirect('administrador/dashboard');
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
        $beneficiarios=DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('users.nombre as userNombre','users.apellido as userApellido',
        'users.email as userEmail','beneficiarios.id as beneficiarioId','users.id as userId',
        'beneficiarios.prioridad as beneficiarioPrioridad','beneficiarios.estado as beneficiarioEstado')
        ->where('beneficiarios.estado', '=','Pendiente')
        ->get();


        $beneficiarioElegido=DB::table('detalle_entrega_donacions')
        ->join('beneficiarios','beneficiarios.id','=','detalle_entrega_donacions.beneficiario_id')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->select('users.nombre as userNombre','users.apellido as userApellido',
        'users.email as userEmail','beneficiarios.id as beneficiarioId','users.id as userId',
        'beneficiarios.prioridad as beneficiarioPrioridad','beneficiarios.estado as beneficiarioEstado')
        ->where('beneficiarios.estado', '=','En espera')
        ->where('detalle_entrega_donacions.id', '=',$id)
        ->get();


        $beneficiarioAceptado=DB::table('beneficiarios')
        ->join('users','users.id','=','beneficiarios.user_id')
        ->join('detalle_entrega_donacions','detalle_entrega_donacions.beneficiario_id','=','beneficiarios.id')
        ->select('users.nombre as userNombre','users.apellido as userApellido',
        'users.email as userEmail','beneficiarios.id as beneficiarioId','users.id as userId',
        'beneficiarios.prioridad as beneficiarioPrioridad','beneficiarios.estado as beneficiarioEstado')
        ->where('detalle_entrega_donacions.estado_beneficiario', '=','Aceptado')
        ->where('detalle_entrega_donacions.id','=',$id)
        ->get();

        $entregas=DB::table('detalle_entrega_donacions')
        ->join('administradors','administradors.id','=','detalle_entrega_donacions.administrador_id')
        ->select('detalle_entrega_donacions.id as entregaId','detalle_entrega_donacions.fecha_entrega as entregaFecha','detalle_entrega_donacions.hora_entrega as entregaHora',
        'detalle_entrega_donacions.beneficiario_id as beneficiarioId','detalle_entrega_donacions.diagnostico_id as diagnosticoId',
        'detalle_entrega_donacions.distribuidor_id as distribuidorId','detalle_entrega_donacions.estado_beneficiario as beneficiarioEstado',
        'detalle_entrega_donacions.estado_distribuidor as distribuidorEstado','detalle_entrega_donacions.estado_tecnico as tecnicoEstado')
        ->where('detalle_entrega_donacions.id','=',$id)
        ->where('administradors.user_id','=',Auth::user()->id)
        ->get();

        $diagnosticos=DB::table('diagnosticos')
        ->join('detalle_recepcion_tecnicos','detalle_recepcion_tecnicos.id','=','diagnosticos.detalle_recepcion_id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('equipos','equipos.id','=','detalle_donacions.equipo_id')
        ->select('diagnosticos.detalle as diagnosticoDetalle','diagnosticos.id as diagnosticoId'
        ,'detalle_recepcion_tecnicos.id as recepcionId','detalle_donacions.id as donacionId',
        'equipos.id as equipoId')
        ->where('diagnosticos.estado','=','Diagnosticado')
        ->get();

        $diagnosticoElegido=DB::table('diagnosticos')
        ->join('detalle_entrega_donacions','detalle_entrega_donacions.diagnostico_id','=','diagnosticos.id')
        ->join('detalle_recepcion_tecnicos','detalle_recepcion_tecnicos.id','=','diagnosticos.detalle_recepcion_id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('equipos','equipos.id','=','detalle_donacions.equipo_id')
        ->select('diagnosticos.detalle as diagnosticoDetalle','diagnosticos.id as diagnosticoId','detalle_recepcion_tecnicos.id as recepcionId','detalle_donacions.id as donacionId',
        'equipos.id as equipoId')
        ->where('diagnosticos.estado','=','Pre-entregado')
        ->where('detalle_entrega_donacions.id','=',$id)
        ->get();

        $diagnosticoAceptado=DB::table('diagnosticos')
        ->join('detalle_entrega_donacions','detalle_entrega_donacions.diagnostico_id','=','diagnosticos.id')
        ->join('detalle_recepcion_tecnicos','detalle_recepcion_tecnicos.id','=','diagnosticos.detalle_recepcion_id')
        ->join('detalle_donacions','detalle_donacions.id','=','detalle_recepcion_tecnicos.detalle_donacion_id')
        ->join('equipos','equipos.id','=','detalle_donacions.equipo_id')
        ->select('diagnosticos.detalle as diagnosticoDetalle','diagnosticos.id as diagnosticoId'
        ,'detalle_recepcion_tecnicos.id as recepcionId','detalle_donacions.id as donacionId',
        'equipos.id as equipoId')
        ->where('detalle_entrega_donacions.estado_tecnico','=','Aceptado')
        ->where('detalle_entrega_donacions.id','=',$id)
        ->get();

        $distribuidors=DB::table('distribuidors')
        ->join('users','users.id','=','distribuidors.user_id')
        ->select('users.nombre as userNombre','users.apellido as userApellido',
        'users.email as userEmail','distribuidors.id as distribuidorId','users.id as userId')
        ->where('distribuidors.disponibilidad', '=','Activa')
        ->get();

        $distribuidorAceptado=DB::table('distribuidors')
        ->join('users','users.id','=','distribuidors.user_id')
        ->join('detalle_entrega_donacions','detalle_entrega_donacions.distribuidor_id','=','distribuidors.id')
        ->select('users.nombre as userNombre','users.apellido as userApellido',
        'users.email as userEmail','distribuidors.id as distribuidorId','users.id as userId')
        ->where('detalle_entrega_donacions.estado_distribuidor', '=','Aceptado')
        ->get();
       

        $distribuidorElegido=array();

        foreach ($entregas as $entrega){
            foreach ($distribuidors as $dist){
                if($entrega->distribuidorId == $dist->distribuidorId){
                    $distribuidorElegido[]=$dist;
                    //dd($distribuidorElegido);
                }
            }
        }


        //dd($beneficiarioElegido);
        return view('administrador.edit-entrega' ,
        compact('beneficiarios','diagnosticos','diagnosticoElegido',
        'entregas','distribuidors','distribuidorElegido','beneficiarioElegido',
        'beneficiarioAceptado','diagnosticoAceptado','distribuidorAceptado'));

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
        //Tener en cuenta el estado de detalle_entrega_donacions
        //beneficiario distinto se debe cambiar el estado
        $entrega=DetalleEntregaDonacion::findOrFail($id);
        $entrega->fecha_entrega = $request->fecha_entrega;
        $entrega->hora_entrega = $request->hora_entrega;

       
            if($entrega->beneficiario_id !== $request->beneficiario_id){
                $beneficiarioActual=Beneficiario::findOrFail($request->beneficiario_id);
                $beneficiarioAnterior=Beneficiario::findOrFail($entrega->beneficiario_id);

                $beneficiarioAnterior->estado='Pendiente';
                $beneficiarioActual->estado='En espera';
                $beneficiarioActual->update();
                $beneficiarioAnterior->update();
            }
           

            if($entrega->estado_tecnico == 'Rechazado' || $entrega->diagnostico_id == null){
                $diagnostico=Diagnostico::findOrFail($request->diagnostico_id);
                $recepcion=DetalleRecepcionTecnico::findOrFail($diagnostico->detalle_recepcion_id);
                $donacion=DetalleDonacion::findOrFail($recepcion->detalle_donacion_id);
                $equipo=Equipo::findOrFail($donacion->equipo_id);

                $diagnostico->estado = 'Pre-entregado';
                $diagnostico->update();
    
                $recepcion->estado = 'Pre-entregado';
                $recepcion->update();
    
                $donacion->estado = 'Pre-entregado';
                $donacion->update();
    
                $equipo->estado = 'Pre-entregado';
                $equipo->update();
    
                $entrega->estado_tecnico='Pendiente';
            }
            if($entrega->estado_distribuidor == 'Rechazado' || $entrega->distribuidor_id == null){
                $entrega->estado_distribuidor='Pendiente';
            }
        $entrega->diagnostico_id=$request->diagnostico_id;
        $entrega->beneficiario_id = $request->beneficiario_id;
        $entrega->distribuidor_id = $request->distribuidor_id;

        $entrega->update();
        return redirect('administrador/dashboard');
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $entrega=DetalleEntregaDonacion::findOrFail($id);
        //Beneficiario-Pendiente a En espera, es para no volver a seleccionar al mismo beneficiario
        $beneficiario=Beneficiario::findOrFail($entrega->beneficiario_id);
        $beneficiario->estado= 'Pendiente';

        //Estado: Pre-entrega en diagnostico, detalle_recepcion, detalle_donacion, equipo
        $diagnostico=Diagnostico::findOrFail($entrega->diagnostico_id);
        $diagnostico->estado = 'Diagnosticado';

        $recepcion=DetalleRecepcionTecnico::findOrFail($diagnostico->detalle_recepcion_id);
        $recepcion->estado = 'Diagnosticado';


        $donacion=DetalleDonacion::findOrFail($recepcion->detalle_donacion_id);
        $donacion->estado = 'Diagnosticado';


        $equipo=Equipo::findOrFail($donacion->equipo_id);
        $equipo->estado = 'Diagnosticado';

        if($entrega->estado_tecnico == 'Rechazado' && $entrega->estado_distribuidor == 'Rechazado'
        && $entrega->estado_beneficiario == 'Rechazado'){

            $diagnostico->update();
            $recepcion->update();
            $donacion->update();
            $equipo->update();
            $beneficiario->update();
            $entrega->delete();

            return redirect('administrador/dashboard');
        }else{
            return redirect('administrador/dashboard')->with('mensaje','Este registro será eliminado, cuando todos los estados sean rechazados');

        }



    }
}
