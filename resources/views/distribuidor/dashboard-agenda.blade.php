<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agenda') }}
        </h2>
    </x-slot>

   
    <div class=" py-12 px-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-16 bg-white border-b border-gray-200"><br>
                    <h2 class="mb-4 font-black text-4xl  text-center">Agenda de distribuidor</h2><br>
                    <h2 class="text-3xl font-semibold">Equipos</h2>
                    <hr>
                    <br>
                    @if (count($detalle_donacion_equipos) > 0)
                    <table class="w-full text-left border-separate " >
                        <tr>
                            <th class="px-4 py-2">Sistema operativo</th>
                            <th class="px-4 py-2">Almacenamiento</th>
                            <th class="px-4 py-2">Detalle</th>
                            <th class="px-4 py-2">Estado</th>
                            <th class="px-4 py-2">Acción</th>
                        </tr>
                        
                            @foreach($detalle_donacion_equipos as $equipo)
                        <tr>
                        <td>{{$equipo->equipoSistema}}</td>
                        <td>{{$equipo->equipoAlmacenamiento}}</td>
                        <td>{{$equipo->equipoDetalle}}</td>
                        <td>{{$equipo->detalleEstado}}</td>
                        <td>
                            <x-button class="bg-purple-900 hover:bg-purple-600  border hover:text-white  font-bold py-2 px-2 rounded">
                                <a href="{{ route('distribuidor_agenda_create_equipo', $equipo->equipoId ) }}">Agendar</a>
                        </x-button>
                        </td>
                    
                        </tr>
                           
                            
                            @endforeach
                        </table>
                        <br><br>
                        @else
                            <h2 class="mb-4 text-xl font-medium text-center ">No hay equipos para agendar</h2>
                        @endif
                        <br>
                        <h2 class="text-3xl font-semibold">Piezas</h2>
                        <hr><br>
                        @if (count($detalle_donacion_piezas) > 0)
                        <table class="w-full text-left border-separate " >
                            <tr>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Detalle</th>
                            <th class="px-4 py-2">Estado</th>
                            <th class="px-4 py-2">Acción</th>
                        </tr>
                        
                            @foreach($detalle_donacion_piezas as $pieza)
                        <tr>
                        <td>{{$pieza->piezaNombre}}</td>
                        <td>{{$pieza->piezaDetalle}}</td>
                        <td>{{$pieza->detalleEstado}}</td>

                        <td>
                            <x-button class="bg-purple-900 hover:bg-purple-600  border hover:text-white  font-bold py-2 px-2 rounded">
                                <a href="{{ route('distribuidor_agenda_create_pieza', $pieza->piezaId ) }}">Agendar</a>
                        </x-button>
                        </td>
                        </tr>
                            @endforeach
                        
                        </table>

                        <br><br>
                        @else
                            <h2 class="mb-4 text-xl font-medium text-center ">No hay piezas para agendar</h2>
                        @endif

                        <br><br>

                        <!-- Entregas pendientes -->

                        <h2 class="mb-4 text-4xl font-black text-center underline">Entregas pendientes</h2>
                        <br>
                        <h2 class="text-3xl font-semibold">Equipos</h2>
                        <hr>
                        <br>
                    @if (count($detallePendienteEquipos) > 0)
                    <table class="w-full text-left border-separate " >
                        <tr>
                            <th class="px-4 py-2">Fecha entrega</th>
                            <th class="px-4 py-2">Hora entrega</th>
                            <th class="px-4 py-2">Técnico</th>
                            <th class="px-4 py-2">Equipo detalle</th>
                            <th class="px-4 py-2">Estado</th>
                            <th class="px-4 py-2">Acción</th>
                        </tr>
                        
                            @foreach($detallePendienteEquipos as $equipo)
                        <tr>
                        <td class="px-4 py-2">{{$equipo->recepcionFecha}}</td>
                        <td class="px-4 py-2">{{$equipo->recepcionHora}}</td>
                        <td class="px-4 py-2">{{$equipo->tecnicoNombre}} {{$equipo->tecnicoApellido}}</td>
                        <td class="px-4 py-2">{{$equipo->equipoDetalle}}</td>
                        <td class="px-4 py-2">{{$equipo->detalleEstado}}</td>
                        <td>
                        <x-button class="bg-yellow-300 hover:bg-yellow-600 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('distribuidor_agenda_show_equipo', $equipo->recepcionId ) }}">Editar</a>
                        </x-button>
                        </td>
                        <td>
                        <form action="{{ route('distribuidor_agenda_destroy_equipo', $equipo->recepcionId ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button type="submit" class="bg-yellow-300 hover:bg-yellow-600 text-white font-bold py-2 px-2 rounded">
                        Eliminar
                        </x-button>
                    </form>
                        </td>
                    
                        </tr>
                           
                            
                            @endforeach
                        </table>

                        <br><br>
                        @else
                            <h2 class="mb-4 text-xl font-medium text-center ">No hay equipos pendientes</h2>
                        @endif
                        <br>
                        <h2 class="text-3xl font-semibold">Piezas</h2>
                        <hr><br>
                        @if (count($detallePendientePiezas) > 0)
                        <table class="w-full text-left border-separate " >
                        <tr>
                            <th class="px-4 py-2">Fecha entrega</th>
                            <th class="px-4 py-2">Hora entrega</th>
                            <th class="px-4 py-2">Técnico</th>
                            <th class="px-4 py-2">Pieza detalle</th>
                            <th class="px-4 py-2">Estado</th>
                            <th class="px-4 py-2">Acción</th>
                        </tr>
                        
                            @foreach($detallePendientePiezas as $pieza)
                        <tr>
                        <td class="px-4 py-2">{{$pieza->recepcionFecha}}</td>
                        <td class="px-4 py-2">{{$pieza->recepcionHora}}</td>
                        <td class="px-4 py-2">{{$pieza->tecnicoNombre}} {{$pieza->tecnicoApellido}}</td>
                        <td class="px-4 py-2">{{$pieza->piezaDetalle}}</td>
                        <td class="px-4 py-2">{{$pieza->detalleEstado}}</td>
                        <td>
                        <x-button class="bg-yellow-300 hover:bg-yellow-600 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('distribuidor_agenda_show_pieza', $pieza->recepcionId ) }}">Editar</a>
                        </x-button>
                        </td>
                        <td>
                        <form action="{{ route('distribuidor_agenda_destroy_pieza', $pieza->recepcionId )  }}" method="POST">
                        @csrf
                        @method('DELETE')
        
                        <x-button type="submit"  class="bg-yellow-300 hover:bg-yellow-600 text-white font-bold py-2 px-2 rounded">
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
