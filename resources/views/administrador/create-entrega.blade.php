<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Entrega de donaciones') }}
        </h2>
    </x-slot>

    <div class="py-12 px-40">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-16 bg-white border-b border-gray-200">
                <h2 class="mb-4 font-black text-3xl  text-center">Entrega de donaciones</h2><br>
                <!-- Formulario de entrega de donaciones -->
                <form action="{{ url('/administrador/create/entregas') }}" method="POST">
                    @csrf
                    @method('POST')

                    <div>
                    <x-label for="fecha" :value="__('Fecha de entrega')" />
                    <x-input type="date" class="block mt-1 w-full mb-4" name="fecha_entrega" />
                    </div><br>

                    <div>
                    <x-label for="hora" :value="__('Hora de entrega')" />
                    <input type="time" class="block mt-1 w-full mb-4" name="hora_entrega"/>
                    </div><br>
                    
                    <div>
                    <x-label for="beneficiario_id" :value="__('Beneficiarios')" />
                    <select class="w-full" id="beneficiario_id" name="beneficiario_id" class="form-control mb-2">
                    <option>------Seleccionar------</option>
                    @foreach($beneficiarios as $beneficiario)
                    <option value="{{ $beneficiario->beneficiarioId }}" name="beneficiario_id">{{$beneficiario->userNombre}} {{$beneficiario->userApellido}} -- {{$beneficiario->userEmail}} -- Prioridad: {{$beneficiario->beneficiarioPrioridad}}</option>
                    @endforeach
                    </select>
                    </div>

                    <br>
                    <div>
                    <x-label for="diagnostico_id" :value="__('Equipo')" />
                    <select class="w-full" style="min-width: 200px;" id="diagnostico_id" name="diagnostico_id" class="form-control mb-2">
                    <option>------Seleccionar------</option>
                    @foreach($diagnosticos as $diagnostico)
                    <option value="{{ $diagnostico->diagnosticoId }}" name="diagnostico_id">{{$diagnostico->diagnosticoDetalle}}</option>
                    @endforeach
                    </select>
                    </div>

                    <br>
                    <div>
                    <x-label for="distribuidor_id" :value="__('Distribuidor')"/>
                    <select class="w-full" id="distribuidor_id" name="distribuidor_id" class="form-control mb-2">
                    <option>------Seleccionar------</option>
                    @foreach($distribuidors as $distribuidor)
                    <option value="{{ $distribuidor->distribuidorId }}" name="distribuidor_id">{{$distribuidor->userNombre}} {{$distribuidor->userApellido}} -- {{$distribuidor->userEmail}}</option>
                    @endforeach
                    </select>
                    </div>

                    @foreach($administradors as $detalle)
                    @if(Auth::user()->id == $detalle->admistradorId)
                    <div>
                    <input type="hidden" class="block mt-1 w-full" name="administrador_id" value="{{$detalle->admistradorId}}" />
                    </div>
                    @endif
                    @endforeach

                    <br><br>

                    <center>
                        <x-button type="submit" 
                    class="bg-yellow-400 hover:bg-yellow-300 text-white font-bold py-2 px-2 rounded">Crear</x-button>
                    <x-button class="bg-purple-900 hover:bg-purple-600 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ url('/administrador/dashboard') }}">Regresar</a>
                        </x-button>
                    </center>
                    </form>

                    <!-- Mostrar tabla de agendas -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
