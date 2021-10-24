<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Diagnóstico para equipo') }}
        </h2>
    </x-slot>

   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">
                    <h2 class=" mb-4 font-black text-3xl  text-center ">Diagnóstico para equipo</h2>
                    <br><hr>
                    @foreach ($detallesRepcion as $equipo)
                    <div class="mt-4">
                <x-label class="text-xl font-semibold" for="nombre" :value="__('Sistema operativo')" />
                <p>{{$equipo->equipoSistema}}</p>
                    </div><br><hr>
                    <div class="mt-4">
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Procesador')" />
                    <p>{{$equipo->equipoProcesador}}</p>
                    </div><br><hr>
                    <div class="mt-4">
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Ram')" />
                    <p>{{$equipo->equipoRam}}</p>
                    </div><br><hr>
                    <div class="mt-4">
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Almacenamiento')" />
                    <p>{{$equipo->equipoAlmacenamiento}}</p>
                    </div><br><hr>
                    <div class="mt-4">
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Detalle del equipo')" />
                    <p>{{$equipo->equipoDetalle}}</p>
                    </div><br><hr>
                   
                    <form action="{{ url('/tecnico/create/equipo/diagnostico') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="mt-4">
                        <p>Detallar: Sistema operativo, ram, almacenamiento, procesador de equipo</p>
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Detalle del diagnóstico')" />
                    <br>
                    <textarea type="text" name="detalle" id="detalle" cols="70" rows="10"></textarea>
                    </div>
                    <input type="hidden" name="equipo_id" value="{{$equipo->equipoId}}"/>
                    <input type="hidden" name="tecnico_id" value="{{$equipo->tecnicoId}}"/>
                    <input type="hidden" name="detalle_donacion_id" value="{{$equipo->donacionId}}"/>
                    <input type="hidden" name="detalle_recepcion_id" value="{{$equipo->recepcionId}}"/>
                    <input type="hidden" name="estado" value="Diagnosticado"/>
                    <br><hr>
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
