<x-app-layout>
    <x-slot name="header">
        <h2 class="px-20 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard  |  ') }}
            @foreach($perfilDistribuidors as $distribuidor)
                <x-button class="bg-purple-900 hover:bg-purple-600 ml-4">
                    <a  href="{{url('distribuidor/perfil/'.$distribuidor->id)}}">
                        Perfil
                    </a>                    
                </x-button>     
            @endforeach
        </h2>
    </x-slot>

   
    <div class="py-12 px-20">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-16 bg-white border-b border-gray-200">
                                    
                    <div class="text-center text-3xl font-semibold">
                        @foreach($perfilDistribuidors as $distribuidor)
                        
                        Bienvenido {{$distribuidor->nombre}} {{$distribuidor->apellido}} <br/><hr>
                        @if(Session::has('mensaje'))
                        {{ Session::get('mensaje') }}
                        @endif
                        @if ($distribuidor->descripcion == null)
                            <p class="text-left text-xl" ><br>
                                Agrega una descripción a tu perfil. 
                                <br><br>
                                <button class="text-sm  bg-yellow-300 hover:bg-yellow-200 border hover:text-white text-white  py-2 px-2 rounded">
                                    <a  href="{{url('distribuidor/edit/perfil/'.$distribuidor->id)}}" > 
                                        CLIC AQUI PARA AGREGAR 
                                    </a>
                                </button>
                            </p>
                        @else
                            <h4>Tu disponibilidad es <b>{{$distribuidor->disponibilidad}}</b></h4><br>
                        @endif
                    @endforeach
                    </div>
                    <br><br>
                    <br>
                    <br><br>
                    <h2 class="mb-4 text-4xl font-black text-center ">Entregas por recoger</h2>
                    <h2 class="text-3xl font-semibold">Equipos</h2><hr><br>
                    @if (count($equiposDonados) > 0)
                        <table class="w-full text-left border-separate " >
                        <tr >
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Apellido</th>
                            <th class="px-4 py-2">Provincia</th>
                            <th class="px-4 py-2">Dirección</th>
                            <th class="px-4 py-2">Detalle</th>
                            <th class="px-4 py-2">Estado</th>
                        </tr>
                        
                            @foreach($equiposDonados as $equipo)
                        <tr>
                        <td>{{$equipo->userNombre}}</td>
                        <td>{{$equipo->userApellido}}</td>
                        <td>{{$equipo->provinciaDescripcion}}</td>
                        <td>{{$equipo->cantonDescripcion}}</td>
                        <td>{{$equipo->userDireccion}}</td>
                        <td>{{$equipo->equipoDetalle}}</td>
                        
                        <td>
                        <x-button class="bg-purple-900 hover:bg-purple-600  border hover:text-white  font-bold py-2 px-2 rounded">
                        <a href="{{ route('distribuidor_equipo_create', $equipo->equipoId ) }}">Detalles</a>
                        </x-button>
                        </td>
                    
                        </tr>
                           
                            
                            @endforeach
                        </table>
                        @else
                            <h2 class="mb-4 text-xl font-medium text-center ">No hay equipos por recoger</h2>
                        @endif
                        
                        <br><br>
                        <h2 class="text-3xl font-semibold">Piezas</h2>
                        
                        <hr>
                        <br>                        
                        @if (count($piezasDonadas) > 0)
                        <table class="w-full text-left border-separate " >                            <tr>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Apellido</th>
                            <th class="px-4 py-2">Provincia</th>
                            <th class="px-4 py-2">Cantón</th>
                            <th class="px-4 py-2">Dirección</th>
                            <th class="px-4 py-2">Nombre de pieza</th>
                            <th class="px-4 py-2">Detalle</th>
                            <th class="px-4 py-2">Estado</th>
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
                        <x-button class="bg-purple-900 hover:bg-purple-600  border hover:text-white  font-bold py-2 px-2 rounded">
                        <a href="{{ route('distribuidor_pieza_create', $pieza->piezaId ) }}">Detalles</a>
                        </x-button>
                        </td>
                        </tr>
                            @endforeach
                        
                        </table>
                        <hr>
                        @else
                            <h2 class="mb-4 text-xl font-medium text-center  ">No hay piezas por recoger</h2>
                        @endif

                        <br><br>
                        <!-- Entregas aceptadas -->
                        <h2 class="mb-4 text-4xl font-black text-center ">Entregas aceptadas</h2>
                        <br><br>
                        <h2 class="text-3xl font-semibold">Equipos</h2>
                        <hr>
                        <br>
                    @if (count($equiposAceptados) > 0)
                    <table class="w-full text-left border-separate " >
                        <tr>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Apellido</th>
                            <th class="px-4 py-2">Provincia</th>
                            <th class="px-4 py-2">Cantón</th>
                            <th class="px-4 py-2">Dirección</th>
                            <th class="px-4 py-2">Detalle</th>
                            <th class="px-4 py-2">Estado</th>
                        </tr>
                        
                            @foreach($equiposAceptados as $equipo)
                        <tr>
                            <td class="px-4 py-2">{{$equipo->userNombre}}</td>
                            <td class="px-4 py-2">{{$equipo->userApellido}}</td>
                            <td class="px-4 py-2">{{$equipo->provinciaDescripcion}}</td>
                            <td class="px-4 py-2">{{$equipo->cantonDescripcion}}</td>
                            <td class="px-4 py-2">{{$equipo->userDireccion}}</td>
                            <td class="px-4 py-2">{{$equipo->equipoDetalle}}</td>
                            
                            <td>
                            <x-button class="bg-yellow-400 hover:bg-yellow-200 text-white font-bold py-2 px-2 rounded">
                            <a href="{{ route('distribuidor_equipo_show', $equipo->equipoId ) }}">Rechazar</a>
                            </x-button>
                            </td>
                    
                        </tr>
                           
                            
                            @endforeach
                        </table>
                        @else
                            <h2 class="mb-4 text-xl font-medium text-center ">No hay equipos aceptados</h2>
                        @endif
                        <br><br>
                        <h2 class="text-3xl font-semibold">Piezas</h2>
                        <hr>
                        <br>
                        @if (count($piezasAceptadas) > 0)
                        <table class="w-full text-left border-separate " >
                            <tr>
                            <th class="px-4 py-2">Nombre</th>
                            <th class="px-4 py-2">Apellido</th>
                            <th class="px-4 py-2">Provincia</th>
                            <th class="px-4 py-2">Cantón</th>
                            <th class="px-4 py-2">Dirección</th>
                            <th class="px-4 py-2">Nombre de pieza</th>
                            <th class="px-4 py-2">Detalle</th>
                            <th class="px-4 py-2">Estado</th>
                        </tr>
                        
                            @foreach($piezasAceptadas as $pieza)
                        <tr>
                        <td class="px-4 py-2">{{$pieza->userNombre}}</td>
                        <td class="px-4 py-2">{{$pieza->userApellido}}</td>
                        <td class="px-4 py-2">{{$pieza->provinciaDescripcion}}</td>
                        <td class="px-4 py-2">{{$pieza->cantonDescripcion}}</td>
                        <td class="px-4 py-2">{{$pieza->userDireccion}}</td>
                        <td class="px-4 py-2">{{$pieza->piezaNombre}}</td>
                        <td class="px-4 py-2">{{$pieza->piezaDetalle}}</td>

                        <td>
                        <x-button class="bg-yellow-400 hover:bg-yellow-200 text-white font-bold py-2 px-2 rounded">
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
