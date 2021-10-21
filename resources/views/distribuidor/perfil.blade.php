<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @foreach($perfilDistribuidor as $distribuidor)
            {{ __('Perfil de ') }} {{$distribuidor->nombre}} {{$distribuidor->apellido}}
            <x-button class="ml-4">
                <a href="{{url('distribuidor/edit/perfil/'.$distribuidor->id)}}">Editar Descripción</a>
            </x-button> 
        @endforeach
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @foreach($perfilDistribuidor as $distribuidor)
                    <p><b>Celular: </b> {{$distribuidor->celular}} </p>
                    <p><b>Dirección: </b> {{$distribuidor->direccion}} </p>
                    <p><b>Correo Electrónico: </b> {{$distribuidor->email}} </p>
                    <p><b>Disponibilidad: </b> {{$distribuidor->disponibilidad}} </p>
                    <p><b>Descripcion: </b>  </p>
                    <p>{{$distribuidor->descripcion}}</p>
                    @endforeach
                    <a href="{{url('/distribuidor/dashboard')}}"><b>Regresar</b></a>
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>