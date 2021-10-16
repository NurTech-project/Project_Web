<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

   
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="mb-4 text-xl font-medium text-center ">Entregas por recoger</h2>
                    <h2 class="text-base font-semibold">Equipos</h2>
                    @if (count($equiposDonados) > 0)
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Provincia</th>
                            <th>Cantón</th>
                            <th>Dirección</th>
                            <th>Detalle</th>
                            <th>Estado</th>
                        </tr>
                        
                            @foreach($equiposDonados as $equipo)
                        <tr style="border: 1px solid black;">
                        <td>{{$equipo->userNombre}}</td>
                        <td>{{$equipo->userApellido}}</td>
                        <td>{{$equipo->provinciaDescripcion}}</td>
                        <td>{{$equipo->cantonDescripcion}}</td>
                        <td>{{$equipo->userDireccion}}</td>
                        <td>{{$equipo->equipoDetalle}}</td>
                        
                        <td>
                        <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('distribuidor_equipo_create', $equipo->equipoId ) }}">Ver detalle</a>
                        </x-button>
                        </td>
                    
                        </tr>
                           
                            
                            @endforeach
                        </table>
                        @else
                            <h2 class="mb-4 text-xl font-medium text-center ">No hay equipos por recoger</h2>
                        @endif
                        <br>
                        <h2 class="text-base font-semibold">Piezas</h2>
                        @if (count($piezasDonadas) > 0)
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Provincia</th>
                            <th>Cantón</th>
                            <th>Dirección</th>
                            <th>Nombre de pieza</th>
                            <th>Detalle</th>
                            <th>Estado</th>
                        </tr>
                        
                            @foreach($piezasDonadas as $pieza)
                        <tr style="border: 1px solid black;">
                        <td>{{$pieza->userNombre}}</td>
                        <td>{{$pieza->userApellido}}</td>
                        <td>{{$pieza->provinciaDescripcion}}</td>
                        <td>{{$pieza->cantonDescripcion}}</td>
                        <td>{{$pieza->userDireccion}}</td>
                        <td>{{$pieza->piezaNombre}}</td>
                        <td>{{$pieza->piezaDetalle}}</td>

                        <td>
                        <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('distribuidor_pieza_create', $pieza->piezaId ) }}">Ver detalle</a>
                        </x-button>
                        </td>
                        </tr>
                            @endforeach
                        
                        </table>
                        @else
                            <h2 class="mb-4 text-xl font-medium text-center ">No hay piezas por recoger</h2>
                        @endif

                        <br><br>

                        <!-- Entregas aceptadas -->

                        <h2 class="mb-4 text-xl font-medium text-center">Entregas aceptadas</h2>
                        <h2 class="text-base font-semibold">Equipos</h2>
                    @if (count($equiposAceptados) > 0)
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Provincia</th>
                            <th>Cantón</th>
                            <th>Dirección</th>
                            <th>Detalle</th>
                            <th>Estado</th>
                        </tr>
                        
                            @foreach($equiposAceptados as $equipo)
                        <tr style="border: 1px solid black;">
                        <td>{{$equipo->userNombre}}</td>
                        <td>{{$equipo->userApellido}}</td>
                        <td>{{$equipo->provinciaDescripcion}}</td>
                        <td>{{$equipo->cantonDescripcion}}</td>
                        <td>{{$equipo->userDireccion}}</td>
                        <td>{{$equipo->equipoDetalle}}</td>
                        
                        <td>
                        <x-button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('distribuidor_equipo_show', $equipo->equipoId ) }}">Rechazar</a>
                        </x-button>
                        </td>
                    
                        </tr>
                           
                            
                            @endforeach
                        </table>
                        @else
                            <h2 class="mb-4 text-xl font-medium text-center ">No hay equipos aceptados</h2>
                        @endif
                        <br>
                        <h2 class="text-base font-semibold">Piezas</h2>
                        @if (count($piezasAceptadas) > 0)
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Provincia</th>
                            <th>Cantón</th>
                            <th>Dirección</th>
                            <th>Nombre de pieza</th>
                            <th>Detalle</th>
                            <th>Estado</th>
                        </tr>
                        
                            @foreach($piezasAceptadas as $pieza)
                        <tr style="border: 1px solid black;">
                        <td>{{$pieza->userNombre}}</td>
                        <td>{{$pieza->userApellido}}</td>
                        <td>{{$pieza->provinciaDescripcion}}</td>
                        <td>{{$pieza->cantonDescripcion}}</td>
                        <td>{{$pieza->userDireccion}}</td>
                        <td>{{$pieza->piezaNombre}}</td>
                        <td>{{$pieza->piezaDetalle}}</td>

                        <td>
                        <x-button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('distribuidor_pieza_show', $pieza->piezaId ) }}">Rechazar</a>
                        </x-button>
                        </td>
                        </tr>
                            @endforeach
                        
                        </table>
                        @else
                            <h2 class="mb-4 text-xl font-medium text-center ">No hay piezas aceptadas</h2>
                        @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
