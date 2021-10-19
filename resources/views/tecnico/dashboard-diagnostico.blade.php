<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Diagnósticos de donaciones') }}
        </h2>
    </x-slot>

   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-4 text-xl font-medium text-center ">Donaciones por diagnosticar</h2>
                    <h2 class="text-base font-semibold">Equipos</h2>
                    @if (count($detalleRecepcionEquipos) > 0)
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th>Sistema operativo</th>
                            <th>Procesador</th>
                            <th>Ram</th>
                            <th>Almacenamiento</th>
                            <th>Detalle</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                        
                            @foreach($detalleRecepcionEquipos as $equipo)
                        <tr style="border: 1px solid black;">
                        <td>{{$equipo->equipoSistema}}</td>
                        <td>{{$equipo->equipoProcesador}}</td>
                        <td>{{$equipo->equipoRam}}</td>
                        <td>{{$equipo->equipoAlmacenamiento}}</td>
                        <td>{{$equipo->equipoDetalle}}</td>
                        <td>{{$equipo->recepcionEstado}}</td>
                        <td>
                        <x-button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('tecnico_diagnostico_create_equipo', $equipo->recepcionId ) }}">Diagnosticar</a>
                        </x-button>
                        </td>
                    
                        </tr>
                           
                            
                            @endforeach
                        </table>
                        @else
                            <h2 class="mb-4 text-xl font-medium text-center ">No hay equipos por diagnosticar</h2>
                        @endif
                        <br>
                        <h2 class="text-base font-semibold">Piezas</h2>
                        @if (count($detalleRecepcionPiezas) > 0)
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th>Nombre</th>
                            <th>Detalle</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                        
                            @foreach($detalleRecepcionPiezas as $pieza)
                        <tr style="border: 1px solid black;">
                        <td>{{$pieza->piezaNombre}}</td>
                        <td>{{$pieza->piezaDetalle}}</td>
                        <td>{{$pieza->recepcionEstado}}</td>

                        <td>
                        <x-button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('tecnico_diagnostico_create_pieza', $pieza->recepcionId ) }}">Diagnosticar</a>
                        </x-button>
                        </td>
                        </tr>
                            @endforeach
                        
                        </table>
                        @else
                            <h2 class="mb-4 text-xl font-medium text-center ">No hay piezas por diagnosticar</h2>
                        @endif

                        <br><br>

                        <!-- Entregas pendientes -->

                        <h2 class="mb-4 text-xl font-medium text-center">Actualizar las donaciones diagnosticadas</h2>
                        <h2 class="text-base font-semibold">Equipos</h2>
                    @if (count($detalleDiagnosticadoEquipos) > 0)
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th>Sistema operativo</th>
                            <th>Procesador</th>
                            <th>Ram</th>
                            <th>Almacenamiento</th>
                            <th>Detalle</th>
                            <th>Detalle de disgnóstico</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                        
                            @foreach($detalleDiagnosticadoEquipos as $equipo)
                        <tr style="border: 1px solid black;">
                        <td>{{$equipo->equipoSistema}}</td>
                        <td>{{$equipo->equipoProcesador}}</td>
                        <td>{{$equipo->equipoRam}}</td>
                        <td>{{$equipo->equipoAlmacenamiento}}</td>
                        <td>{{$equipo->equipoDetalle}}</td>
                        <td>{{$equipo->diagnosticoDetalle}}</td>
                        <td>{{$equipo->diagnosticoEstado}}</td>
                        <td>
                        <x-button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('tecnico_diagnostico_show_equipo', $equipo->diagnosticoId ) }}">Editar</a>
                        </x-button>
                        </td>
                        <td>
                        <form action="{{ route('tecnico_diagnostico_destroy_equipo', $equipo->diagnosticoId ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded">
                        Eliminar
                        </x-button>
                    </form>
                        </td>
                    
                        </tr>
                           
                            
                            @endforeach
                        </table>
                        @else
                            <h2 class="mb-4 text-xl font-medium text-center ">No hay equipos pendientes</h2>
                        @endif
                        <br>
                        <h2 class="text-base font-semibold">Piezas</h2>
                        @if (count($detalleDiagnosticadoPiezas) > 0)
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th>Nombre de la pieza</th>
                            <th>Detalle</th>
                            <th>Detalle de disgnóstico</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                        
                            @foreach($detalleDiagnosticadoPiezas as $pieza)
                        <tr style="border: 1px solid black;">
                        <td>{{$pieza->piezaNombre}}</td>
                        <td>{{$pieza->piezaDetalle}}</td>
                        <td>{{$pieza->diagnosticoDetalle}}</td>
                        <td>{{$pieza->diagnosticoEstado}}</td>
                        <td>
                        <x-button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('tecnico_diagnostico_show_pieza', $pieza->diagnosticoId ) }}">Editar</a>
                        </x-button>
                        </td>
                        <td>
                        <form action="{{ route('tecnico_diagnostico_destroy_pieza', $pieza->diagnosticoId )  }}" method="POST">
                        @csrf
                        @method('DELETE')
        
                        <x-button type="submit"  class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded">
                        Eliminar
                        </x-button>
                    </form>
                        </td>
                        </tr>
                            @endforeach
                        
                        </table>
                        @else
                            <h2 class="mb-4 text-xl font-medium text-center ">No hay piezas pendientes</h2>
                        @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
