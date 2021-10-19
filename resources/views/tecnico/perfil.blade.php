<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @foreach($perfilTecnico as $tecnico)
            {{ __('Perfil de ') }} {{$tecnico->nombre}} {{$tecnico->apellido}}
            <x-button class="ml-4">
                <a href="{{url('tecnico/'.$tecnico->id.'/edit')}}">Editar Descripción</a>
            </x-button> 
        @endforeach
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @foreach($perfilTecnico as $tecnico)
                    <p><b>Celular: </b> {{$tecnico->celular}} </p>
                    <p><b>Dirección: </b> {{$tecnico->direccion}} </p>
                    <p><b>Correo Electrónico: </b> {{$tecnico->email}} </p>
                    <p><b>Disponibilidad: </b> {{$tecnico->disponibilidad}} </p>
                    <p><b>Descripcion: </b> {{$tecnico->descripcion}} </p>
                    @endforeach
                    <a href="{{url('tecnico/dashboard')}}"><b>Regresar</b></a>
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>