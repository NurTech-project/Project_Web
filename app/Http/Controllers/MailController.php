<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestMail;
class MailController extends Controller
{
    public function sendEmail(){
        $details=[
            'title'=> 'Correo de NUR TECH',
            'body'=> 'Ejemplo de correos',
            'body'=> '
            ████████████████████████████████████████
            ████████████████████████████████████████
            ██████▀░░░░░░░░▀████████▀▀░░░░░░░▀██████
            ████▀░░░░░░░░░░░░▀████▀░░░░░░░░░░░░▀████
            ██▀░░░░░░░░░░░░░░░░▀▀░░░░░░░░░░░░░░░░▀██
            ██░░░░░░░░░░░░░░░░░░░▄▄░░░░░░░░░░░░░░░██
            ██░░░░░░░░░░░░░░░░░░█░█░░░░░░░░░░░░░░░██
            ██░░░░░░░░░░░░░░░░░▄▀░█░░░░░░░░░░░░░░░██
            ██░░░░░░░░░░████▄▄▄▀░░▀▀▀▀▄░░░░░░░░░░░██
            ██▄░░░░░░░░░████░░░░░░░░░░█░░░░░░░░░░▄██
            ████▄░░░░░░░████░░░░░░░░░░█░░░░░░░░▄████
            ██████▄░░░░░████▄▄▄░░░░░░░█░░░░░░▄██████
            ████████▄░░░▀▀▀▀░░░▀▀▀▀▀▀▀░░░░░▄████████
            ██████████▄░░░░░░░░░░░░░░░░░░▄██████████
            ████████████▄░░░░░░░░░░░░░░▄████████████
            ██████████████▄░░░░░░░░░░▄██████████████
            ████████████████▄░░░░░░▄████████████████
            ██████████████████▄▄▄▄██████████████████
            ████████████████████████████████████████
            ████████████████████████████████████████
             '
            /*
            ███╗░░██╗██╗░░░██╗██████╗░  ████████╗███████╗░█████╗░██╗░░██╗
            ████╗░██║██║░░░██║██╔══██╗  ╚══██╔══╝██╔════╝██╔══██╗██║░░██║
            ██╔██╗██║██║░░░██║██████╔╝  ░░░██║░░░█████╗░░██║░░╚═╝███████║
            ██║╚████║██║░░░██║██╔══██╗  ░░░██║░░░██╔══╝░░██║░░██╗██╔══██║
            ██║░╚███║╚██████╔╝██║░░██║  ░░░██║░░░███████╗╚█████╔╝██║░░██║
            ╚═╝░░╚══╝░╚═════╝░╚═╝░░╚═╝  ░░░╚═╝░░░╚══════╝░╚════╝░╚═╝░░╚═╝'*/


        ];
        Mail::to("dv013250@gmail.com")->send(new TestMail($details));
        return "Correo Electronico Enviado";

    }
}
