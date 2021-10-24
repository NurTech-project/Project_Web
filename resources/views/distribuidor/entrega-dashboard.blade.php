<x-app-layout>
    <x-slot name="header">
        <h2 class="px-4 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Entrega de donación') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if (count($entregaPendiente) > 0)
                    <h2 class="mb-4 text-4xl font-black text-center ">Entrega de equipos diagnosticados a beneficiarios</h2>
                    <p>Nota: Tenga en cuenta que al momento de rechazar la entrega, el proceso para entregar donación sería aún más largo</p>
                
                    <hr><br>
                        <table class="w-full text-left border-separate " >
                        <tr >
                            <th class="px-4 py-2">Fecha de entrega</th>
                            <th class="px-4 py-2">Detalle del equipo</th>
                            <th class="px-4 py-2">Estado de beneficiario</th>
                            <th class="px-4 py-2">Acción</th>
                        </tr>
                        
                            @foreach($entregaPendiente as $equipo)
                        <tr>
                        <td class="px-4 py-2">{{$equipo->fecha}}</td>
                        <td class="px-4 py-2">{{$equipo->detalle}}</td>
                        <td class="px-4 py-2">{{$equipo->estado}}</td>
                        
                        <td>
                        <x-button class="bg-yellow-300 hover:bg-yellow-600 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('distribuidor_entrega_show', $equipo->entregaId ) }}">Ver detalles</a>
                        </x-button>
                        </td>
                        <td>
                        <form action="{{ route('distribuidor_entrega_destroy', $equipo->entregaId ) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button type="submit" class="bg-yellow-300 hover:bg-yellow-600 text-white font-bold py-2 px-2 rounded">
                        Rechazar
                        </x-button>
                        </form>
                        </td>
                    
                        </tr>
                           
                            @endforeach
                        </table>


                        <!-- Detalle de la donación -->
                        @elseif (count($entregaAceptada) > 0)
                        <h2 class="mb-4 text-4xl font-black text-center ">Equipo aceptado</h2>
                    <hr><br>
                        <table class="w-full text-left border-separate " >
                        <tr >
                            <th class="px-4 py-2">Fecha de entrega</th>
                            <th class="px-4 py-2">Detalle del equipo</th>
                            <th class="px-4 py-2">Estado de beneficiario</th>
                        </tr>
                        
                            @foreach($entregaAceptada as $equipo)
                        <tr>
                        <td class="px-4 py-2">{{$equipo->fecha}}</td>
                        <td class="px-4 py-2">{{$equipo->detalle}}</td>
                        <td class="px-4 py-2">{{$equipo->estado}}</td>
                        
                        </tr>
                           
                            @endforeach
                        </table>


                        @else
                            <h2 class="mb-4 text-xl font-medium text-center ">Se encuentra en espera para entregar donaciones</h2>
                        @endif
                        
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
