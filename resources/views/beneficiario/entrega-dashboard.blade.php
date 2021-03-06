<x-app-layout>
    <x-slot name="header">
        <h2 class="px-4 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aceptación de equipo') }}

        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if (count($entregaPendiente) > 0)
                    <h2 class="mb-4 text-4xl font-black text-center ">Aceptación de equipo donado por Nur Tech</h2>
                    <p>Nota: Tenga en cuenta que al momento de rechazar la donación, su proceso para obtener otro equipo sería aún más largo</p>
                
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
                        <a href="{{ route('beneficiario_entrega_edit', $equipo->entregaId ) }}">Aceptar</a>
                        </x-button>
                        </td>
                        <td>
                        <form action="{{ route('beneficiario_entrega_destroy', $equipo->entregaId ) }}" method="POST">
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
                        @else
                            <h2 class="mb-4 text-xl font-medium text-center ">Se encuentra en espera de donación</h2>
                        @endif
                        <br> <br>
                        <!-- Detalle de la donación -->
                        @if (count($entregaAceptada) > 0)
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


                       
                        @endif
                        
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
