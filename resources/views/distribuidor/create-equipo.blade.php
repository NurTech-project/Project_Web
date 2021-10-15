<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle equipo') }}
        </h2>
    </x-slot>

   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <h2 class="mb-4 text-xl text-center font-semibold">Detalle equipo</h2>
                    @foreach ($equipoGet as $equipo)
                    <div class="mt-4">
                <x-label for="nombre" :value="__('Nombre')" />
                <p>{{$equipo->userNombre}}</p>
                    </div>
                    <div class="mt-4">
                    <x-label for="nombre" :value="__('Apellido')" />
                    <p>{{$equipo->userApellido}}</p>
                    </div>
                    <div class="mt-4">
                    <x-label for="nombre" :value="__('Provincia')" />
                    <p>{{$equipo->provinciaDescripcion}}</p>
                    </div>
                    <div class="mt-4">
                    <x-label for="nombre" :value="__('Cantón')" />
                    <p>{{$equipo->cantonDescripcion}}</p>
                    </div>
                    <div class="mt-4">
                    <x-label for="nombre" :value="__('Dirección')" />
                    <p>{{$equipo->userDireccion}}</p>
                    </div>
                    <div class="mt-4">
                    <x-label for="nombre" :value="__('Fecha de entrega')" />
                    <p>{{$equipo->donanteFecha}}</p>
                    </div>
                    <div class="mt-4">
                    <x-label for="nombre" :value="__('Hora de entrega')" />
                    <p>{{$equipo->donanteHora}}</p>
                    </div>
                    <div class="mt-4 mb-4">
                    <x-label for="nombre" :value="__('Detalle del equipo')" />
                    <p>{{$equipo->equipoDetalle}}</p>
                    </div>
                    @endforeach
                    
                    <form action="{{ url('/distribuidor/create/equipo') }}" method="POST">
                    @csrf
                    @method('POST')
                    @foreach ($equipoGet as $equipo)
                    <input type="hidden" name="equipo_id" id="equipo_id" value="{{$equipo->equipoId}}"/>
                    @endforeach

                    @foreach($distribuidor as $distb)
                    @if(Auth::user()->id == $distb->user_id)
                    <input type="hidden" name="distribuidor_id" id="distribuidor_id" value="{{$distb->id}}"/>
                    @endif
                    @endforeach
                    
                    <input type="hidden" name="estado" value="Aceptado"/>

                    <x-button type="submit" 
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded">Aceptar</x-button>
                    <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ url('/distribuidor/dashboard') }}">Regresar</a>
                        </x-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
