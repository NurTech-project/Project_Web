<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar diagnóstico para pieza') }}
        </h2>
    </x-slot>

   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <h2 class="mb-4 text-xl text-center font-semibold">Editar diagnóstico para pieza</h2>
                    @foreach ($recepciones as $pieza)
                    <div class="mt-4">
                <x-label for="nombre" :value="__('Nombre de la pieza')" />
                <p>{{$pieza->piezaNombre}}</p>
                    </div>
                    <div class="mt-4">
                    <x-label for="nombre" :value="__('Detalle de la pieza')" />
                    <p>{{$pieza->piezaDetalle}}</p>
                    </div>
                   
                    <form action="{{ url('/tecnico/edit/pieza/diagnostico/'. $pieza->diagnosticoId) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mt-4">
                    <x-label for="nombre" :value="__('Detalle del diagnóstico')" />
                    <textarea type="text" name="detalle" id="detalle" cols="70" rows="10">{{$pieza->diagnosticoDetalle}}</textarea>
                    </div>
                    <input type="hidden" name="estado" value="Diagnosticado"/>

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
