<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Provincia;
use App\Models\Canton;
use App\Models\Distribuidor;
use App\Models\Tecnico;
use App\Models\Beneficiario;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{ 
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles=DB::table('roles')->where([
            ['descripcion', '<>', 'Administrador'],
        ])->get();
        $provincias=DB::table('provincias')->get();

        $cantones = DB::table('provincias')
            ->join('cantons', 'provincias.id', '=', 'cantons.provincia_id')
            ->select('provincias.descripcion as provinciaDescripcion',
            'cantons.descripcion as cantonDescripcion', 'provincias.id as provinciaId',
            'cantons.id as cantonId')
             ->get();
        //dd($roles);
        return view('auth.register',compact('roles', 'provincias','cantones'));
    }


     #Metodo para traer los cantones, condicionadas
     public function cantones(Request $request){
        #condicionamos 
        if (isset($request->texto)) {
            # code...
            $cantones=Canton::whereProvincia_id($request->texto)->get();
            return response()->json(
                #$data, 200, $headers
                [
                    'lista'=>$cantones,
                    'success'=>true,
                ]
            );
        } else {
            # code...
            return response()->json(
                #$data, 200, $headers
                [
                    'success'=>false,
                ]
            );
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'role_id' => ['required'],
            'canton_id' =>['required'],
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'celular' => ['required', 'string', 'max:10'],
            'direccion' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = new User();
        $user->role_id = $request->role_id;
        $user->canton_id = $request->canton_id;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->celular = $request->celular;
        $user->direccion = $request->direccion;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        
        $roles= DB::table('roles')->get();

        //dd($roles);
        
        Auth::login($user);
        if($user->save()){
            
            foreach ($roles as $role){
                if($user->role_id == $role->id && $role->descripcion == 'Distribuidor'){
                    $distribuidor= new Distribuidor();
                    $distribuidor->user_id =$user->id;
                    $distribuidor->disponibilidad='Activa';
                    $distribuidor->save();
                }else if($user->role_id == $role->id && $role->descripcion == 'Técnico'){
                    $tecnico=new Tecnico();
                    $tecnico->user_id=$user->id;
                    $tecnico->disponibilidad='Activa';
                    $tecnico->save();
                }else if($user->role_id == $role->id && $role->descripcion == 'Beneficiario'){
                    $beneficiario=new Beneficiario();
                    $beneficiario->user_id =$user->id;
                    $beneficiario->save();
                }
            }
            //colocar lo de beneficiario de ser el caso
            return redirect(RouteServiceProvider::LOGIN);
            
        }


        
    }
}
