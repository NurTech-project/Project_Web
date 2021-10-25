<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        //En esta parte de aqui puedo configurar el estado de tecnico, distribuidor, beneficiario para que ingrese.
        if((DB::table('users')
        ->join('roles', 'users.role_id','=','roles.id')
        ->where('email', $request->email)->value('roles.descripcion') === 'Donante')){
        $confirmed=DB::table('users')->where('email','=',$request->email)->get(); 
        foreach($confirmed as $user){
            if($user->confirmed == 1){
                return redirect()->intended(RouteServiceProvider::DONANTE);

            }
        }
        }

        if((DB::table('users')
        ->join('roles', 'users.role_id','=','roles.id')
        ->where('email', $request->email)->value('roles.descripcion') === 'Beneficiario')){
            $confirmed=DB::table('users')->where('email','=',$request->email)->get(); 
        foreach($confirmed as $user){
            if($user->confirmed == 1){
                return redirect()->intended(RouteServiceProvider::BENEFICIARIO);
            } 
        }
        
        
        }

        if((DB::table('users')
        ->join('roles', 'users.role_id','=','roles.id')
        ->where('email', $request->email)->value('roles.descripcion') === 'Distribuidor')){
        $confirmed=DB::table('users')->where('email','=',$request->email)->get(); 
        foreach($confirmed as $user){
            if($user->confirmed == 1){
                return redirect()->intended(RouteServiceProvider::DISTRIBUIDOR);

            } 
        }
        
        }

        if((DB::table('users')
        ->join('roles', 'users.role_id','=','roles.id')
        ->where('email', $request->email)->value('roles.descripcion') === 'Técnico')){
            $confirmed=DB::table('users')->where('email','=',$request->email)->get(); 
            foreach($confirmed as $user){
                if($user->confirmed == 1){
                    return redirect()->intended(RouteServiceProvider::TECNICO);
             } 
            }
        }
        

        if((DB::table('users')
        ->join('roles', 'users.role_id','=','roles.id')
        ->where('email', $request->email)->value('roles.descripcion') === 'Administrador')){
            $confirmed=DB::table('users')->where('email','=',$request->email)->get(); 
            foreach($confirmed as $user){
                if($user->confirmed == 1){
                    return redirect()->intended(RouteServiceProvider::ADMINISTRADOR);
             } 
            }
        
        
        }
        
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
