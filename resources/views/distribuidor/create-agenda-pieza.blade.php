<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agendar técnico') }}
        </h2>
    </x-slot>

    <div class="py-12 px-40">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-16 bg-white border-b border-gray-200">
                <h2 class="mb-4 font-black text-3xl  text-center">Agendar entrega a técnico</h2><br>
                <!-- Formulario de agendar a técnico -->
                <form action="{{ url('/distribuidor/create/pieza/agenda') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div>
                    <x-label for="fecha" :value="__('Fecha de entrega')" />
                    <x-input type="date" class="block mt-1 w-full mb-4" name="fecha" />
                    </div><br>

                    <div>
                    <x-label for="hora" :value="__('Hora de entrega')" />
                    <input type="time" class="block mt-1 w-full mb-4" name="hora"/>
                    </div><br>
                    
                    <div>
                    <x-label for="tecnico_id" :value="__('Técnicos')" />
                    <select class="w-full" id="tecnico_id" name="tecnico_id" class="form-control mb-2">
                    <option>------Seleccionar------</option>
                    @foreach($tecnicos as $tecnico)
                    <option value="{{ $tecnico->tecnicoId }}" name="tecnico_id">{{$tecnico->userNombre}} {{$tecnico->userApellido}} -- {{$tecnico->userEmail}}</option>
                    @endforeach
                    </select>
                    </div><br>
                    <br>
                    @foreach($detallesDonacion as $detalle)
                    @if(Auth::user()->id == $detalle->distribuidorUser)
                    <div>
                    <input type="hidden" class="block mt-1 w-full" name="distribuidor_id" value="{{$detalle->distribuidorId}}" />
                    </div>
                    <div>
                    <input type="hidden" class="block mt-1 w-full" name="pieza_id" value="{{$detalle->piezaId}}" />
                    </div>
                    <div>
                    <input type="hidden" class="block mt-1 w-full" name="detalle_donacion_id" value="{{$detalle->detalleId}}"/>
                    </div>
                    @endif
                    @endforeach

                    <div>
                    <input type="text" class="block mt-1 w-full mb-4" name="estado" value="Agendado" readonly/>
                    </div>
                    <br><br>
                    <center>
                        <x-button type="submit" 
                    class="bg-yellow-400 hover:bg-yellow-300 text-white font-bold py-2 px-2 rounded">Crear</x-button>
                    <x-button class="bg-purple-900 hover:bg-purple-600 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ url('/distribuidor/agenda') }}">Regresar</a>
                        </x-button>
                    </center>
                    </form>

                    <!-- Mostrar tabla de agendas -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
