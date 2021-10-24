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
                    <h2 class=" mb-4 font-black text-3xl  text-center ">Editar diagnóstico para pieza</h2>
                    @foreach ($recepciones as $pieza)
                    <br><hr>
                    <div class="mt-4">
                <x-label class="text-xl font-semibold" for="nombre" :value="__('Nombre de la pieza')" />
                <p>{{$pieza->piezaNombre}}</p>
                    </div><br><hr>
                    <div class="mt-4">
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Detalle de la pieza')" />
                    <p>{{$pieza->piezaDetalle}}</p>
                    </div><br><hr>
                   
                    <form action="{{ url('/tecnico/edit/pieza/diagnostico/'. $pieza->diagnosticoId) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mt-4">
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Detalle del diagnóstico')" />
                    <br>
                    <textarea type="text" name="detalle" id="detalle" cols="70" rows="10">{{$pieza->diagnosticoDetalle}}</textarea>
                    </div><br><hr>
                    <input type="hidden" name="estado" value="Diagnosticado"/>
                    <br><br>

                    <x-button type="submit" 
                    class="bg-yellow-400 hover:bg-yellow-300 text-white font-bold py-2 px-2 rounded">Aceptar</x-button>
                    <x-button class="bg-purple-900 hover:bg-purple-600 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ url('/tecnico/dashboard') }}">Regresar</a>
                        </x-button>
                        <br><br>
                    
                    </form>

                    @endforeach

                    
                   

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
