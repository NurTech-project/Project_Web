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
                    <h2 class="mb-4 text-lg text-center">Donaciones realizadas a Nur Tech</h2>
                    <x-button class="ml-4">
                        <a href="{{url('donante/create')}}">
                            Donar a Nur Tech
                        </a>
                    </x-button>
                    <h2 class="text-base font-semibold">Equipos</h2>
                   
                    <table style="border: 1px solid black;">
                    <tr style="border: 1px solid black;">
                        <th>Sistema operativo</th>
                        <th>Procesador</th>
                        <th>Ram</th>
                        <th>Almacenamiento</th>
                        <th>Detalle</th>
                    </tr>
                    @foreach($donante as $userDonante)
                        @if (Auth::user()->email == $userDonante->userEmail)
                            @foreach($equipos as $equipo)
                                @if( $equipo->donante_id == $userDonante->donanteId)                
                                
                                    <tr style="border: 1px solid black;">
                                        <td>{{$equipo->sistema_operativo}}</td>
                                        <td>{{$equipo->procesador}}</td>
                                        <td>{{$equipo->ram}}</td>
                                        <td>{{$equipo->almacenamiento}}</td>
                                        <td>{{$equipo->detalle}}</td>
                                    </tr>    
                                    <!--h2>No hay equipos donados</h2-->
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    </table>
                    

                    <h2 class="text-base font-semibold">Piezas</h2>
                  
                    <table style="border: 1px solid black;">
                    <tr style="border: 1px solid black;">
                        <th>Nombre de pieza</th>
                        <th>Detalle</th>
                    </tr>
                    @foreach($donante as $userDonante)
                        @if (Auth::user()->email ==  $userDonante->userEmail)
                            @foreach($piezas as $pieza)
                                @if($pieza->donante_id == $userDonante->donanteId)
                                
                                    <tr style="border: 1px solid black;">
                                        <td>{{$pieza->nombre}}</td>
                                        <td>{{$pieza->detalle}}</td>
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
