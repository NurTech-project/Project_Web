<x-app-layout>
    <x-slot name="header">
        <h2 class="px-24 font-semibold text-xl text-gray-800 leading-tight">
        @foreach($perfilDistribuidor as $distribuidor)
            {{ __('Perfil de ') }} {{$distribuidor->nombre}} {{$distribuidor->apellido}}
            <x-button  class="bg-purple-900 hover:bg-purple-600 ml-4">
                <a href="{{url('distribuidor/edit/perfil/'.$distribuidor->id)}}">Editar Descripción</a>
            </x-button> 
        @endforeach
        </h2>
        
    </x-slot>

    <div class="py-12 px-40">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @foreach($perfilDistribuidor as $distribuidor)
                    <p><b>Celular: </b><br> {{$distribuidor->celular}} </p><br>
                    <p><b>Dirección: </b><br> {{$distribuidor->direccion}} </p><br>
                    <p><b>Correo Electrónico: </b><br> {{$distribuidor->email}} </p><br>
                    <p><b>Disponibilidad: </b><br> {{$distribuidor->disponibilidad}} </p><br>
                    <p><b>Descripcion: </b><br> {{$distribuidor->descripcion}} </p><br>
                    @endforeach
                    <x-button  class="bg-yellow-400 hover:bg-yellow-200 ml-4">
                        <br><a href="{{url('/distribuidor/dashboard')}}"><b>Regresar</b></a>
                    </x-button> 
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>