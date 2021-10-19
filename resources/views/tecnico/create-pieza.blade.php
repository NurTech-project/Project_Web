<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle pieza') }}
        </h2>
    </x-slot>

   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <h2 class="mb-4 text-xl text-center font-semibold">Detalle pieza</h2>
                    @foreach ($piezaGet as $pieza)
                    <div class="mt-4">
                <x-label for="nombre" :value="__('Nombre de la pieza')" />
                <p>{{$pieza->piezaNombre}}</p>
                    </div>
                    <div class="mt-4">
                    <x-label for="nombre" :value="__('Detalle de la pieza')" />
                    <p>{{$pieza->piezaDetalle}}</p>
                    </div>
                    <div class="mt-4">
                    <x-label for="nombre" :value="__('Fecha de entrega')" />
                    <p>{{$pieza->recepcionFecha}}</p>
                    </div>
                    <div class="mt-4">
                    <x-label for="nombre" :value="__('Hora de entrega')" />
                    <p>{{$pieza->recepcionHora}}</p>
                    </div>
                    <div class="mt-4">
                    <x-label for="nombre" :value="__('Distribuidor')" />
                    <p>Nombre/Apellido: {{$pieza->userNombre}} {{$pieza->userApellido}}</p>
                    <p>Email: {{$pieza->userEmail}}</p>
                    </div>
                    
                    <form action="{{ url('/tecnico/recibir/pieza/' . $pieza->recepcionId) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <input type="hidden" name="pieza_id" value="{{$pieza->piezaId}}"/>
                    <input type="hidden" name="detalle_donacion_id" value="{{$pieza->donacionId}}"/>
                    <input type="hidden" name="estado" value="Mantenimiento"/>

                    <x-button type="submit" 
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded">Aceptar</x-button>
                    
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
