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
                                <a href="{{url('tecnico/'.$tecnicop->id.'/edit')}}" > 
                                    Click Aquí para agregar 
                                </a>
                            </p>
                        @else
                            <h4>Tu del disponibilidas es <b>{{$tecnicop->disponibilidad}}</b></h4>
                        @endif
                    @endforeach
                    <h2 class="mb-4 text-xl font-medium text-center ">Donaciones por recibir para mantenimiento</h2>
                    <h2 class="text-base font-semibold">Equipos</h2>
                    @if (count($equiposAgendados) > 0)
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th>Sistema operativo</th>
                            <th>Procesador</th>
                            <th>Ram</th>
                            <th>Distribuidor</th>
                            <th>Email</th>
                            <th>Estado</th>
                        </tr>
                        
                            @foreach($equiposAgendados as $equipo)
                        <tr style="border: 1px solid black;">
                        <td>{{$equipo->equipoSistema}}</td>
                        <td>{{$equipo->equipoProcesador}}</td>
                        <td>{{$equipo->equipoRam}}</td>
                        <td>{{$equipo->userNombre}} {{$equipo->userApellido}}</td>
                        <td>{{$equipo->userEmail}}</td>
                        
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
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th>Nombre de la pieza</th>
                            <th>Detalle</th>
                            <th>Distribuidor</th>
                            <th>Email</th>
                            <th>Estado</th>
                        </tr>
                        
                            @foreach($piezasAgendadas as $pieza)
                        <tr style="border: 1px solid black;">
                        <td>{{$pieza->piezaNombre}}</td>
                        <td>{{$pieza->piezaDetalle}}</td>
                        <td>{{$pieza->userNombre}} {{$pieza->userApellido}}</td>
                        <td>{{$pieza->userEmail}}</td>

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
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th>Sistema operativo</th>
                            <th>Procesador</th>
                            <th>Ram</th>
                            <th>Distribuidor</th>
                            <th>Email</th>
                            <th>Estado</th>
                        </tr>
                        
                            @foreach($equiposAceptados as $equipo)
                        <tr style="border: 1px solid black;">
                        <td>{{$equipo->equipoSistema}}</td>
                        <td>{{$equipo->equipoProcesador}}</td>
                        <td>{{$equipo->equipoRam}}</td>
                        <td>{{$equipo->userNombre}} {{$equipo->userApellido}}</td>
                        <td>{{$equipo->userEmail}}</td>
                        
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
                        <table style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th>Nombre de la pieza</th>
                            <th>Detalle</th>
                            <th>Distribuidor</th>
                            <th>Email</th>
                            <th>Estado</th>
                        </tr>
                        
                            @foreach($piezasAceptadas as $pieza)
                        <tr style="border: 1px solid black;">
                        <td>{{$pieza->piezaNombre}}</td>
                        <td>{{$pieza->piezaDetalle}}</td>
                        <td>{{$pieza->userNombre}} {{$pieza->userApellido}}</td>
                        <td>{{$pieza->userEmail}}</td>

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
