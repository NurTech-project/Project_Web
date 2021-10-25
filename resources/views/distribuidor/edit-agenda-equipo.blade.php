<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar agenda') }}
        </h2>
    </x-slot>

    <div class="py-12 px-40">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-16 bg-white border-b border-gray-200">
                <h2 class="mb-4 font-black text-3xl  text-center">Editar el Agendamiento del Técnico</h2>
                <!-- Formulario de agendar a técnico -->
                @foreach($recepciones as $recepcion)
                <form action="{{ url('/distribuidor/edit/equipo/agenda/' .$recepcion->recepcionId) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div>
                    <x-label for="fecha" :value="__('Fecha de entrega')" />
                    <x-input type="date" class="block mt-1 w-full" name="fecha" value="{{$recepcion->recepcionFecha}}" />
                    </div><br>

                    <div>
                    <x-label for="hora" :value="__('Hora de entrega')" />
                    <input type="time" class="block mt-1 w-full" name="hora" value="{{$recepcion->recepcionHora}}"/>
                    </div><br>
                    
                    <div>
                    <x-label for="tecnico_id" :value="__('Técnicos')" />
                    <select class="w-full" id="tecnico_id" name="tecnico_id" class="form-control mb-2">
                    <option value="{{ $recepcion->recepcionTecnicoId }}" name="tecnico_id">{{$recepcion->userNombre}} {{$recepcion->userApellido}} -- {{$recepcion->userEmail}}</option>
                    @foreach($tecnicos as $tecnico)
                    <option value="{{ $tecnico->tecnicoId }}" name="tecnico_id">{{$tecnico->userNombre}} {{$tecnico->userApellido}} -- {{$tecnico->userEmail}}</option>
                    @endforeach
                    </select>
                    </div><br>
                    <br>
                    <div>
                    <input type="text" class="block mt-1 w-full mb-4" name="estado" value="Agendado"  readonly/>
                    </div>
                    <br><br>
                    <center>
                        <x-button type="submit" 
                    class="bg-yellow-400 hover:bg-yellow-300 text-white font-bold py-2 px-2 rounded">Guardar</x-button>
                    <x-button class="bg-purple-900 hover:bg-purple-600 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ url('/distribuidor/agenda') }}">Regresar</a>
                        </x-button>
                    </center>
                    </form>

                   @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
