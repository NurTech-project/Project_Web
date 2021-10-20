<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Equipo') }}
        </h2>
    </x-slot>

    <div class="py-12">
      <!--Formulario Equipo -->
         <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                <img src="/imagenes/NurLogo.png" alt="" class="w-20 h-20 fill-current text-gray-500" /> 
                 <!-- <x-application-logo  class="w-20 h-20 fill-current text-gray-500" /> --> 
                </a>
            </x-slot>
            <div class="card" style="width: 18em; height:40em">
                <div class="card-body">
                    <b>
                        @if(Session::has('mensaje'))
                            {{ Session::get('mensaje') }}
                        @endif
                    </b>
                    <form action="{{route('equipo.store')}}" method="POST">
                    @csrf
                        <div class="mb-8">
                           <b> <label  for="sistema_operativo"  class="form-label" >Sistema Operativo </label></b>
                                <input type="text" class="form-control"  id="sistema_operativo" name="sistema_operativo" placeholder="Sistema Operativos"  style=" width:25em">
                        </div>
                        <div class="mb-8">
                         <b> <label for="procesador">Procesador</label></b>
                            <input type="text" class="form-control" id="procesador" name="procesador" placeholder="Procesador" style=" width:25em" >
                        </div>
                        
                        <div class="mb-8">
                        <b> <label for="ram">RAM</label> <br></b>
                            <input type="text" class="form-control" id="ram" name="ram"  placeholder="RAM" style=" width:25em">
                        </div>
                        
                        <div class="mb-8">
                        <b> <label for="almacenamiento">Almacenamiento</label></b>
                            <input type="text" class="form-control" id="almacenamiento" name="almacenamiento"  placeholder="Almacenamiento" style=" width:25em">
                        </div>
                        
                        <div class="mb-8">
                        <b> <label for="detalle">Detalle</label><br></b>
                            <input type="text" class="form-control" id="detalle" name="detalle"  placeholder="Detalle" style=" width:25em; height:5em">
                        </div>
                        <x-button class="ml-20 cml-5 bg-purple-900 hover:bg-purple-600">
                            {{ __('Donar Equipo') }}
                        </x-button> 
                    </form>
                </div>
            </div>
         </x-auth-card>
    </div>
</x-app-layout>