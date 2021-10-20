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
                    <b> <h2 class="mb-4 text-lg text-center" style="font-size:150%;">Donaciones realizadas a Nur Tech</h2></b>
                    <!--Mensaje de confirmación-->
                    <b>
                        @if(Session::has('mensaje'))
                            {{ Session::get('mensaje') }}
                        @endif
                    </b>
                    <x-button class="ml-4 mb-8" class="bg-purple-900 hover:bg-purple-600">
                        <a href="{{url('donante/create')}}">
                            Donar a Nur Tech
                        </a>
                    </x-button> <br><br>

                    <b><h2 class="text-base font-semibold"> EQUIPOS </h2></b><br><hr>
                    <table class="w-full text-left border-separate">
                    <tr>
                        <th  class="px-4 py-2">Sistema operativo</th>
                        <th  class="px-4 py-2">Procesador</th>
                        <th  class="px-4 py-2">Ram</th>
                        <th  class="px-4 py-2">Almacenamiento</th>
                        <th  class="px-4 py-2">Detalle</th>
                        <th  class="px-4 py-2">Acción</th>
                    </tr>

                    @foreach($donante as $userDonante)
                        @if (Auth::user()->email == $userDonante->userEmail)
                            @foreach($equipos as $equipo)
                                @if( $equipo->donante_id == $userDonante->donanteId)                
                                
                                    <tr >
                                        <td>{{$equipo->sistema_operativo}}</td>
                                        <td>{{$equipo->procesador}}</td>
                                        <td>{{$equipo->ram}}</td>
                                        <td>{{$equipo->almacenamiento}}</td>
                                        <td>{{$equipo->detalle}}</td>
                                        <td>
                                            <form action="{{url('/donante/equipo/'.$equipo->id)}}" method="post">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <input type="submit" onclick="return confirm('¿Quieres eliminar el Equipo?')" 
                                                    value="Eliminar" class="cml-5 bg-transparent hover:bg-red-700 text-black py-2 px-4 border hover:text-white border-red-700 hover:border-transparent rounded">
                                            </form>
                                        </td>
                                    </tr>    
                                    <!--h2>No hay equipos donados</h2-->
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    </table> <br><br>
                    

                    <b> <h2 class="text-base font-semibold">PIEZAS</h2> </b> <br> <hr>

                    <table class="w-full text-left border-separate ">
                    <tr>
                        <th  class="px-4 py-2">Nombre de pieza</th>
                        <th  class="px-4 py-2">Detalle</th>
                        <th  class="px-4 py-2">Acción</th>
                    </tr>
                    @foreach($donante as $userDonante)
                        @if (Auth::user()->email ==  $userDonante->userEmail)
                            @foreach($piezas as $pieza)
                                @if($pieza->donante_id == $userDonante->donanteId)
                                
                                    <tr style="border: 1px solid black;">
                                        <td>{{$pieza->nombre}}</td>
                                        <td>{{$pieza->detalle}}</td>
                                        <td>
                                            <form action="{{url('/donante/pieza/'.$pieza->id)}}" method="post">
                                                @csrf
                                                {{method_field('DELETE')}}
                                                <input type="submit" onclick="return confirm('¿Quieres eliminar la pieza?')" 
                                                value="Eliminar" class="cml-5 bg-transparent hover:bg-red-700 text-black py-2 px-4 border hover:text-white border-red-700 hover:border-transparent rounded">
                                            </form>
                                        </td>
                                    </tr>
                                    <!--h2>No hay piezas donados</h2-->
                                @endif 
                            @endforeach
                        @endif
                    @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>