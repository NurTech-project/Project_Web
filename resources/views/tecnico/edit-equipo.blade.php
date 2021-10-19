<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rechazar equipo') }}
        </h2>
    </x-slot>

   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <h2 class="mb-4 text-xl text-center font-semibold">Rechazar equipo</h2>
                    @foreach ($equipoGet as $equipo)
                    <div class="mt-4">
                <x-label for="nombre" :value="__('Sistema operativo')" />
                <p>{{$equipo->equipoSistema}}</p>
                    </div>
                    <div class="mt-4">
                    <x-label for="nombre" :value="__('Procesador')" />
                    <p>{{$equipo->equipoProcesador}}</p>
                    </div>
                    <div class="mt-4">
                    <x-label for="nombre" :value="__('Ram')" />
                    <p>{{$equipo->equipoRam}}</p>
                    </div>
                    <div class="mt-4">
                    <x-label for="nombre" :value="__('Almacenamiento')" />
                    <p>{{$equipo->equipoAlmacenamiento}}</p>
                    </div>
                    <div class="mt-4">
                    <x-label for="nombre" :value="__('Detalle del equipo')" />
                    <p>{{$equipo->equipoDetalle}}</p>
                    </div>
                    <div class="mt-4">
                    <x-label for="nombre" :value="__('Fecha de recepción')" />
                    <p>{{$equipo->recepcionFecha}}</p>
                    </div>
                    <div class="mt-4">
                    <x-label for="nombre" :value="__('Hora de recepción')" />
                    <p>{{$equipo->recepcionHora}}</p>
                    </div>
                    <div class="mt-4 mb-4">
                    <x-label for="nombre" :value="__('Distribuidor')" />
                    <p>Nombre/Apellido: {{$equipo->userNombre}} {{$equipo->userApellido}}</p>
                    <p>Email: {{$equipo->userEmail}}</p>
                    </div>

                    <form action="{{ url('/tecnico/edit/equipo/' . $equipo->recepcionId) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <input type="hidden" name="equipo_id" value="{{$equipo->equipoId}}"/>
                    <input type="hidden" name="detalle_donacion_id" value="{{$equipo->donacionId}}"/>
                    <input type="hidden" name="estado" value="Agendado"/>

                    <x-button type="submit" 
                    class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded">Rechazar</x-button>
                    </form>

                    @endforeach
                    
                   
                    <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ url('/tecnico/dashboard') }}">Regresar</a>
                        </x-button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
