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
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;

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
        $characters = '0123456789';
        $randomCode = substr(str_shuffle($characters), 0, 6);
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
        $user->confirmation_code= $randomCode;
        $user->password = Hash::make($request->password);
        
        $roles= DB::table('roles')->get();

    /**
         * Send mail for verified
         */
        $details = [
            'title' => 'Código de verificación',
            'body' => $user->confirmation_code
        ];
        Mail::to($user->email)->send(new TestMail($details));

        
        

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
            return redirect('/register/verify');
            
        }    
    }
public function accountVerification (Request $request) 
    {
        /**
         * Verified the existence of an account
         */
        if ($user = DB::table('users')->where('email', $request->email)->first()) 
        {
            /**
             * Code validation
             */
            if ($user->confirmation_code == $request->confirmation_code) {
                /**
                 * StatusEmailVerified update
                 */
                DB::table('users')->where('email', $user->email)
                    ->update(['confirmed' => '1']);
                    return redirect('/login');
            }
            /*return response()->json([
                'error' => [
                    'message' => 'error in code verification'
                ]
            ]);*/
        }
    }
    public function vista(){

        return view('emails.confirmation_code');
    
    }
     
    }


