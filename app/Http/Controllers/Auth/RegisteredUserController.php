<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\Provincia;
use App\Models\Canton;
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
        
        
        Auth::login($user);
        if($user->save()){
            return redirect(RouteServiceProvider::LOGIN);
        }


        
    }
     public function canton(){
        $q       = trim(\request('q'));
        $results = Cantons::where('nombre', 'LIKE', '%' . $q . '%')->take(15)->get();
    
        return Response::json($results);
    }

    
     }

