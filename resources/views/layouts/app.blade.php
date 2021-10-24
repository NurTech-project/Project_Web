<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Nur Tech</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
           
            @if(Auth::check())
                @if (\Auth::user()->isBeneficiario())
                    @include('layouts.beneficiario')  
                @elseif(\Auth::user()->isTecnico())
                    @include('layouts.tecnico')
                @elseif(\Auth::user()->isDonante())
                     @include('layouts.donante')
                @elseif(\Auth::user()->isDistribuidor())
                     @include('layouts.distribuidor')
                @elseif(\Auth::user()->isAdministrador())
                     @include('layouts.administrador')
                @endif 
            @endif
            
            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
