<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar entrega de donación') }}
        </h2>
    </x-slot>

    <div class="py-12 px-40">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-16 bg-white border-b border-gray-200">
                <h2 class="mb-4 font-black text-3xl  text-center">Editar entrega de donación</h2>
                <!-- Formulario de agendar a técnico -->
                @foreach($entregas as $entrega)
                <form action="{{ url('/administrador/edit/entrega/' .$entrega->entregaId) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                    <x-label for="fecha" :value="__('Fecha de entrega')" />
                    <x-input type="date" class="block mt-1 w-full mb-4" name="fecha_entrega" value="{{$entrega->entregaFecha}}"/>
                    </div><br>

                    <div>
                    <x-label for="hora" :value="__('Hora de entrega')" />
                    <input type="time" class="block mt-1 w-full mb-4" name="hora_entrega" value="{{$entrega->entregaHora}}"/>
                    </div><br>
                    
                    <!-- Inicio-Diagnostico -->
                    <div>
                    <x-label for="diagnostico_id" :value="__('Equipo')" />
                    @if($entrega->tecnicoEstado == 'Rechazado' || $entrega->diagnosticoId == null)

                    <select class="w-full" style="min-width: 200px;" id="diagnostico_id" name="diagnostico_id" class="form-control mb-2">
                    <option>------Seleccionar------</option>
                    @foreach($diagnosticos as $diagnostico)
                    <option value="{{ $diagnostico->diagnosticoId }}" name="diagnostico_id">{{$diagnostico->diagnosticoDetalle}}</option>
                    @endforeach
                    </select>

                    @endif

                    @if($entrega->tecnicoEstado == 'Aceptado')

                    @foreach($diagnosticoAceptado as $elegido)
                    <p class="block mt-1 w-full mb-4">{{$elegido->diagnosticoDetalle}}</p>
                    <input type="hidden" value="{{ $elegido->diagnosticoId }}" name="diagnostico_id" readonly>
                    @endforeach
                    <h4>El técnico ya ha aceptado la entrega del equipo</h4>

                    @endif

                    @if($entrega->tecnicoEstado == 'Pendiente')

                    @foreach($diagnosticoElegido as $elegido)
                    <p class="block mt-1 w-full mb-4">{{$elegido->diagnosticoDetalle}}</p>
                    <input type="hidden" value="{{ $elegido->diagnosticoId }}" name="diagnostico_id" readonly>
                    @endforeach

                    @endif
                    </div>
                    <!-- Fin-Diagnostico -->

                    <!-- Inicio-Beneficiario -->
                    <div>
                    <x-label for="beneficiario_id" :value="__('Beneficiarios')" />
                    @if($entrega->beneficiarioEstado == 'Rechazado' || $entrega->beneficiarioId == null)

                    <select class="w-full" id="beneficiario_id" name="beneficiario_id" class="form-control mb-2">
                    <option>------Seleccionar------</option>
                    @foreach($beneficiarios as $beneficiario)
                    <option value="{{ $beneficiario->beneficiarioId }}" name="beneficiario_id">{{$beneficiario->userNombre}} {{$beneficiario->userApellido}} -- {{$beneficiario->userEmail}} -- Prioridad: {{$beneficiario->beneficiarioPrioridad}}</option>
                    @endforeach
                    </select>

                    @endif 

                    @if($entrega->beneficiarioEstado == 'Aceptado')

                    @foreach($beneficiarioAceptado as $elegido)
                    <input type="hidden" value="{{ $elegido->beneficiarioId }}" name="beneficiario_id" readonly>
                    <h4>{{$elegido->userNombre}} {{$elegido->userApellido}} -- {{$elegido->userEmail}} -- Prioridad: {{$elegido->beneficiarioPrioridad}}</h4>
                    @endforeach
                    <h4>El beneficiario ya ha aceptado la entrega del equipo</h4>

                    @endif

                    @if($entrega->beneficiarioEstado == 'Pendiente')

                    <select class="w-full" id="beneficiario_id" name="beneficiario_id" class="form-control mb-2">
                    @foreach($beneficiarioElegido as $elegido)
                    <option value="{{ $elegido->beneficiarioId }}" name="beneficiario_id">{{$elegido->userNombre}} {{$elegido->userApellido}} -- {{$elegido->userEmail}} -- Prioridad: {{$elegido->beneficiarioPrioridad}}</option>
                    @endforeach
                    @foreach($beneficiarios as $beneficiario)
                    <option value="{{ $beneficiario->beneficiarioId }}" name="beneficiario_id">{{$beneficiario->userNombre}} {{$beneficiario->userApellido}} -- {{$beneficiario->userEmail}} -- Prioridad: {{$beneficiario->beneficiarioPrioridad}}</option>
                    @endforeach
                    </select>
                  
                    @endif
                    </div>
                    <!-- Fin-Beneficiario -->

                    <!-- Inicio-Distribuidor -->
                    <br>
                    <div>
                    <x-label for="distribuidor_id" :value="__('Distribuidor')"/>
                    @if($entrega->distribuidorEstado == 'Rechazado' || $entrega->distribuidorId == null)

                    <select class="w-full" id="distribuidor_id" name="distribuidor_id" class="form-control mb-2">
                    <option>------Seleccionar------</option>
                    @foreach($distribuidors as $distribuidor)
                    <option value="{{ $distribuidor->distribuidorId }}" name="distribuidor_id">{{$distribuidor->userNombre}} {{$distribuidor->userApellido}} -- {{$distribuidor->userEmail}}</option>
                    @endforeach
                    </select>

                    @endif

                    @if($entrega->distribuidorEstado == 'Aceptado')

                    @foreach($distribuidorAceptado as $distribuidor)
                    <input type="hidden" value="{{ $distribuidor->distribuidorId }}" name="distribuidor_id" readonly>
                    <h4>{{$distribuidor->userNombre}} {{$distribuidor->userApellido}} -- {{$distribuidor->userEmail}}</h4>
                    @endforeach
                    <h4>El distribuidor ya ha aceptado la entrega del equipo</h4>

                    @endif

                    @if($entrega->distribuidorEstado == 'Pendiente')


                    <select class="w-full" id="distribuidor_id" name="distribuidor_id" class="form-control mb-2">
                    @foreach($distribuidorElegido as $elegido)
                    <option value="{{ $elegido->distribuidorId }}" name="distribuidor_id">{{$elegido->userNombre}} {{$elegido->userApellido}} -- {{$elegido->userEmail}}</option>
                    @endforeach
                    @foreach($distribuidors as $distribuidor)
                    <option value="{{ $distribuidor->distribuidorId }}" name="distribuidor_id">{{$distribuidor->userNombre}} {{$distribuidor->userApellido}} -- {{$distribuidor->userEmail}}</option>
                    @endforeach
                    </select>

                    @endif
                    </div>
                    <!-- Fin-Distribuidor -->

                   <br>
                    <br>
                    <center>
                        <x-button type="submit" 
                    class="bg-yellow-400 hover:bg-yellow-300 text-white font-bold py-2 px-2 rounded">Guardar</x-button>
                    <x-button class="bg-purple-900 hover:bg-purple-600 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ url('/administrador/dashboard') }}">Regresar</a>
                        </x-button>
                    </center>
                    </form>

                   @endforeach

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
