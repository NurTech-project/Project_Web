<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pieza') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Formulario Pieza> -->
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                <img src="/imagenes/NurLogo.png" alt="" class="w-20 h-20 fill-current text-gray-500" />
                  <!--  <x-application-logo class="w-20 h-20 fill-current text-gray-500" /> -->
                </a>
            </x-slot>
            <div class="card" style="width: 18rem; height:18rem;">
                <div class="card-body">
                    <b>
                        @if(Session::has('mensaje'))
                            {{ Session::get('mensaje') }}
                        @endif
                    </b>
                    <form action="{{route('pieza.store')}}" method="POST">
                    @csrf
                        <div class="mb-3">
                           <b> <label  for="nombre"  class="form-label">Nombre</label></b>
                                <input type="text" class="form-control"  id="nombre" name="nombre" placeholder="Nombre Pieza" style=" width:25em">
                        </div>     

                        <div class="mb-3"> <br>
                        <b><label for="detalle">Detalle</label><br></b> 
                            <input type="text" class="form-control" id="detalle" name="detalle"  placeholder="Detalle" style=" width:25em">
                        </div> <br>
                        
                        <x-button class="ml-20 cml-5 bg-purple-900 hover:bg-purple-600">
                            {{ __('Donar Pieza') }}
                        </x-button>
                        
                    </form>
                </div>
            </div>
         </x-auth-card>
    </div>
</x-app-layout>
