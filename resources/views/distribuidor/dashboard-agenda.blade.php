<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agenda') }}
        </h2>
    </x-slot>

   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-4 text-xl font-medium text-center ">Agenda de distribuidor</h2>
                    <h2 class="text-base font-semibold">Equipos</h2>
                    @if (count($detalle_donacion_equipos) > 0)
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th>Sistema operativo</th>
                            <th>Almacenamiento</th>
                            <th>Detalle</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                        
                            @foreach($detalle_donacion_equipos as $equipo)
                        <tr style="border: 1px solid black;">
                        <td>{{$equipo->equipoSistema}}</td>
                        <td>{{$equipo->equipoAlmacenamiento}}</td>
                        <td>{{$equipo->equipoDetalle}}</td>
                        <td>{{$equipo->detalleEstado}}</td>
                        <td>
                        <x-button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('distribuidor_agenda_create_equipo', $equipo->equipoId ) }}">Agendar</a>
                        </x-button>
                        </td>
                    
                        </tr>
                           
                            
                            @endforeach
                        </table>
                        @else
                            <h2 class="mb-4 text-xl font-medium text-center ">No hay equipos para agendar</h2>
                        @endif
                        <br>
                        <h2 class="text-base font-semibold">Piezas</h2>
                        @if (count($detalle_donacion_piezas) > 0)
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th>Nombre</th>
                            <th>Detalle</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                        
                            @foreach($detalle_donacion_piezas as $pieza)
                        <tr style="border: 1px solid black;">
                        <td>{{$pieza->piezaNombre}}</td>
                        <td>{{$pieza->piezaDetalle}}</td>
                        <td>{{$pieza->detalleEstado}}</td>

                        <td>
                        <x-button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('distribuidor_agenda_create_pieza', $pieza->piezaId ) }}">Agendar</a>
                        </x-button>
                        </td>
                        </tr>
                            @endforeach
                        
                        </table>
                        @else
                            <h2 class="mb-4 text-xl font-medium text-center ">No hay piezas para agendar</h2>
                        @endif

                        <br><br>

                        <!-- Entregas pendientes -->

                        <h2 class="mb-4 text-xl font-medium text-center">Entregas pendientes</h2>
                        <h2 class="text-base font-semibold">Equipos</h2>
                    @if (count($detallePendienteEquipos) > 0)
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th>Fecha entrega</th>
                            <th>Hora entrega</th>
                            <th>Técnico</th>
                            <th>Equipo detalle</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                        
                            @foreach($detallePendienteEquipos as $equipo)
                        <tr style="border: 1px solid black;">
                        <td>{{$equipo->recepcionFecha}}</td>
                        <td>{{$equipo->recepcionHora}}</td>
                        <td>{{$equipo->tecnicoNombre}} {{$equipo->tecnicoApellido}}</td>
                        <td>{{$equipo->equipoDetalle}}</td>
                        <td>{{$equipo->detalleEstado}}</td>
                        <td>
                        <x-button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('distribuidor_agenda_show_equipo', $equipo->recepcionId ) }}">Editar</a>
                        </x-button>
                        </td>
                        <td>
                        <form action="{{ route('distribuidor_agenda_destroy_equipo', $equipo->recepcionId ) }}" method="POST">
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
                        @if (count($detallePendientePiezas) > 0)
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th>Fecha entrega</th>
                            <th>Hora entrega</th>
                            <th>Técnico</th>
                            <th>Pieza detalle</th>
                            <th>Estado</th>
                            <th>Acción</th>
                        </tr>
                        
                            @foreach($detallePendientePiezas as $pieza)
                        <tr style="border: 1px solid black;">
                        <td>{{$pieza->recepcionFecha}}</td>
                        <td>{{$pieza->recepcionHora}}</td>
                        <td>{{$pieza->tecnicoNombre}} {{$pieza->tecnicoApellido}}</td>
                        <td>{{$pieza->piezaDetalle}}</td>
                        <td>{{$pieza->detalleEstado}}</td>
                        <td>
                        <x-button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('distribuidor_agenda_show_pieza', $pieza->recepcionId ) }}">Editar</a>
                        </x-button>
                        </td>
                        <td>
                        <form action="{{ route('distribuidor_agenda_destroy_pieza', $pieza->recepcionId )  }}" method="POST">
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
