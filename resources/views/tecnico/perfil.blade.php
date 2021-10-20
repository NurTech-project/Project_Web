<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        @foreach($perfilTecnico as $tecnico)
            {{ __('Perfil de  ') }} {{$tecnico->nombre}} {{$tecnico->apellido}} |
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
                    <br>
                    <p><b>Dirección: </b> {{$tecnico->direccion}} </p>
                    <br>
                    <p><b>Correo Electrónico: </b> {{$tecnico->email}} </p>
                    <br>
                    <p><b>Disponibilidad: </b> {{$tecnico->disponibilidad}} </p>
                    <br>
                    <p><b>Descripcion: </b> {{$tecnico->descripcion}} </p>
                    <br>
                    @endforeach
                    <a class="bg-yellow-300 p-2 lg:px-4 md:mx-2 text-black-600 rounded hover:bg-purple-400 hover:text-white transition-colors duration-300" href="{{url('tecnico/dashboard')}}"><b>Regresar</b></a>
                </div>
            </div>
        </div>
    </div>
    

</x-app-layout>