<x-app-layout>
    <x-slot name="header">
        <h2 class="px-4 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}

            <x-button class="ml-4">
            <a href="{{url('/administrador/create/entrega')}}">Crear entrega</a>
            </x-button> 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="mb-4 text-4xl font-black text-center ">Entregas pendientes</h2>
                <hr><br>
              
                    @if (count($entregaPendiente) > 0)
                    @if(Session::has('mensaje'))
                            {{ Session::get('mensaje') }}
                        @endif
                        <table class="w-full text-left border-separate " >
                        <tr >
                            <th class="px-4 py-2">Fecha de entrega</th>
                            <th class="px-4 py-2">Hora de entrega</th>
                            <th class="px-4 py-2">Estado de beneficiario</th>
                            <th class="px-4 py-2">Estado de técnico</th>
                            <th class="px-4 py-2">Estado distribuidor</th>
                            <th class="px-4 py-2">Acción</th>
                        </tr>
                        
                            @foreach($entregaPendiente as $equipo)
                        <tr>
                        <td class="px-4 py-2">{{$equipo->fecha}}</td>
                        <td class="px-4 py-2">{{$equipo->hora}}</td>
                        <td class="px-4 py-2">{{$equipo->estadoBeneficiario}}</td>
                        <td class="px-4 py-2">{{$equipo->estadoTecnico}}</td>
                        <td class="px-4 py-2">{{$equipo->estadoDistribuidor}}</td>
                        
                        <td>
                        <x-button class="bg-yellow-300 hover:bg-yellow-600 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('administrador_entrega_show', $equipo->entregaId ) }}">Editar</a>
                        </x-button>
                        </td>
                        <td>
                        <form action="{{ route('administrador_entrega_destroy', $equipo->entregaId ) }}" method="POST">
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
                        @else
                            <h2 class="mb-4 text-xl font-medium text-center ">No hay entregas pendientes</h2>
                        @endif
                        

                        <br><br>
                        <!-- Entregas aceptadas -->
                        <h2 class="mb-4 text-4xl font-black text-center ">Entregas confirmadas</h2>
                        <hr>
                        <br>
                        
                    @if (count($entregaConfirmada) > 0)
                    <table class="w-full text-left border-separate " >
                        <tr>
                            <th class="px-4 py-2">Fecha de entrega</th>
                            <th class="px-4 py-2">Hora de entrega</th>
                            <th class="px-4 py-2">Estado distribuidor</th>
                            <th class="px-4 py-2">Estado de técnico</th>
                            <th class="px-4 py-2">Estado de beneficiario</th>
                            <th class="px-4 py-2">Acción</th>
                        </tr>
                        
                            @foreach($entregaConfirmada as $equipo)
                        <tr>
                            <td class="px-4 py-2">{{$equipo->fecha}}</td>
                            <td class="px-4 py-2">{{$equipo->hora}}</td>
                            <td class="px-4 py-2">{{$equipo->estadoDistribuidor}}</td>
                            <td class="px-4 py-2">{{$equipo->estadoTecnico}}</td>
                            <td class="px-4 py-2">{{$equipo->estadoBeneficiario}}</td>
                            
                            <td>
                            <x-button class="bg-yellow-400 hover:bg-yellow-200 text-white font-bold py-2 px-2 rounded">
                            <a href="{{ route('distribuidor_equipo_show', $equipo->entregaId ) }}">Ver detalle</a>
                            </x-button>
                            </td>
                    
                        </tr>
                           
                            
                            @endforeach
                        </table>
                        @else
                            <h2 class="mb-4 text-xl font-medium text-center ">No hay entregas confirmadas</h2>
                        @endif
                       
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
