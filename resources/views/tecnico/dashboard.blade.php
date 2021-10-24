<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard  | ') }}
            @foreach($perfilTecnico as $tecnico)
                <x-button class="ml-4">
                    <a href="{{url('tecnico/'.$tecnico->id)}}">
                        Perfil
                    </a>
                </x-button>     
            @endforeach
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                @if(Session::has('mensaje'))
                        {{ Session::get('mensaje') }}
                    @endif

                    @foreach($perfilTecnico as $tecnicop)
                        
                        Bienvenido {{$tecnicop->nombre}} {{$tecnicop->apellido}}
                        @if ($tecnicop->descripcion == null)
                            <p>
                                Agrega una descripción a tu perfil. 
                                <a class="text-blue-400 border-b border-blue-400" href="{{url('tecnico/'.$tecnicop->id.'/edit')}}" > 
                                    Click Aquí para agregar 
                                </a>
                            </p>
                        @else
                            <h4>Tu disponibilidad es <b>{{$tecnicop->disponibilidad}}</b></h4>
                        @endif
                    @endforeach
                    <br><br>
                    <h2 class="mb-4 text-xl font-medium text-center ">Donaciones por recibir para mantenimiento</h2>
                    <h2 class="text-base font-semibold">Equipos</h2>
                    @if (count($equiposAgendados) > 0)
                    <br>
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th class="px-4 py-2">Sistema operativo</th>
                            <th class="px-4 py-2">Procesador</th>
                            <th class="px-4 py-2">Ram</th>
                            <th class="px-4 py-2">Distribuidor</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Estado</th>
                        </tr>
                        
                            @foreach($equiposAgendados as $equipo)
                        <tr style="border: 1px solid black;">
                        <td class="px-4 py-2">{{$equipo->equipoSistema}}</td>
                        <td class="px-4 py-2">{{$equipo->equipoProcesador}}</td>
                        <td class="px-4 py-2">{{$equipo->equipoRam}}</td>
                        <td class="px-4 py-2">{{$equipo->userNombre}} {{$equipo->userApellido}}</td>
                        <td class="px-4 py-2">{{$equipo->userEmail}}</td>
                        
                        <td>
                        <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('tecnico_equipo_create', $equipo->recepcionId ) }}">Ver detalle</a>
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
                        @if (count($piezasAgendadas) > 0)
                        <br>
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th class="px-4 py-2">Nombre de la pieza</th>
                            <th class="px-4 py-2">Detalle</th>
                            <th class="px-4 py-2">Distribuidor</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Estado</th>
                        </tr>
                        
                            @foreach($piezasAgendadas as $pieza)
                        <tr style="border: 1px solid black;">
                        <td class="px-4 py-2">{{$pieza->piezaNombre}}</td>
                        <td class="px-4 py-2">{{$pieza->piezaDetalle}}</td>
                        <td class="px-4 py-2">{{$pieza->userNombre}} {{$pieza->userApellido}}</td>
                        <td class="px-4 py-2">{{$pieza->userEmail}}</td>

                        <td>
                        <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('tecnico_pieza_create', $pieza->recepcionId ) }}">Ver detalle</a>
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

                        <h2 class="mb-4 text-xl font-medium text-center">Donaciones aceptadas para mantenimiento</h2>
                        <h2 class="text-base font-semibold">Equipos</h2>
                    @if (count($equiposAceptados) > 0)
                    <br>
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th class="px-4 py-2">Sistema operativo</th>
                            <th class="px-4 py-2">Procesador</th>
                            <th class="px-4 py-2">Ram</th>
                            <th class="px-4 py-2">Distribuidor</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Estado</th>
                        </tr>
                        
                            @foreach($equiposAceptados as $equipo)
                        <tr style="border: 1px solid black;">
                        <td class="px-4 py-2">{{$equipo->equipoSistema}}</td>
                        <td class="px-4 py-2">{{$equipo->equipoProcesador}}</td>
                        <td class="px-4 py-2">{{$equipo->equipoRam}}</td>
                        <td class="px-4 py-2">{{$equipo->userNombre}} {{$equipo->userApellido}}</td>
                        <td class="px-4 py-2">{{$equipo->userEmail}}</td>
                        
                        <td>
                        <x-button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('tecnico_equipo_show', $equipo->recepcionId ) }}">Rechazar</a>
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
                        <br>
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th class="px-4 py-2">Nombre de la pieza</th>
                            <th class="px-4 py-2">Detalle</th>
                            <th class="px-4 py-2">Distribuidor</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Estado</th>
                        </tr>
                        
                            @foreach($piezasAceptadas as $pieza)
                        <tr style="border: 1px solid black;">
                        <td class="px-4 py-2">{{$pieza->piezaNombre}}</td>
                        <td class="px-4 py-2">{{$pieza->piezaDetalle}}</td>
                        <td class="px-4 py-2">{{$pieza->userNombre}} {{$pieza->userApellido}}</td>
                        <td class="px-4 py-2">{{$pieza->userEmail}}</td>

                        <td>
                        <x-button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('tecnico_pieza_show', $pieza->recepcionId ) }}">Rechazar</a>
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
