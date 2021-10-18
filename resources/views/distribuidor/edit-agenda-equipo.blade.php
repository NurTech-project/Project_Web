<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar agenda') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="mb-4 text-xl text-center font-semibold">Editar el agendamiento del técnico</h2>
                <!-- Formulario de agendar a técnico -->
                @foreach($recepciones as $recepcion)
                <form action="{{ url('/distribuidor/edit/equipo/agenda/' .$recepcion->recepcionId) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div>
                    <x-label for="fecha" :value="__('Fecha de entrega')" />
                    <x-input type="date" class="block mt-1 w-full" name="fecha" value="{{$recepcion->recepcionFecha}}" />
                    </div>

                    <div>
                    <x-label for="hora" :value="__('Hora de entrega')" />
                    <input type="time" class="block mt-1 w-full" name="hora" value="{{$recepcion->recepcionHora}}"/>
                    </div>
                    
                    <div>
                    <x-label for="tecnico_id" :value="__('Técnicos')" />
                    <select id="tecnico_id" name="tecnico_id" class="form-control mb-2">
                    <option value="{{ $recepcion->recepcionTecnicoId }}" name="tecnico_id">{{$recepcion->userNombre}} {{$recepcion->userApellido}} -- {{$recepcion->userEmail}}</option>
                    @foreach($tecnicos as $tecnico)
                    <option value="{{ $tecnico->tecnicoId }}" name="tecnico_id">{{$tecnico->userNombre}} {{$tecnico->userApellido}} -- {{$tecnico->userEmail}}</option>
                    @endforeach
                    </select>
                    </div>

                    <div>
                    <input type="text" class="block mt-1 w-full mb-4" name="estado" value="Agendado"  readonly/>
                    </div>

                    <x-button type="submit" 
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded">Guardar</x-button>
                    <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ url('/distribuidor/agenda') }}">Regresar</a>
                        </x-button>
                    </form>

                   @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
