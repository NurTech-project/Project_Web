<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rechazar equipo') }}
        </h2>
    </x-slot>

   
    <div class="py-12 px-32">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-16 bg-white border-b border-gray-200">
                    <h2 class=" mb-4 font-black text-3xl  text-center ">Rechazar equipo</h2><br>
                    @foreach ($equipoGet as $equipo)
                    <hr>
                    <ul class="flex">
                        <li>
                            <div>
                                <x-label class="text-xl font-semibold" for="nombre" :value="__('Nombre')" />
                                <p class="px-8">{{$equipo->userNombre}}</p>
                            </div><br><hr>
                        </li>
                        <li>
                            <div class="px-96">
                                <x-label class="text-xl font-semibold" for="nombre" :value="__('Apellido')" />
                                <p>{{$equipo->userApellido}}</p>
                                </div>
                        </li>
                    </ul>
                    <hr>
                    <ul class="flex">
                        <li>
                            <div>
                                <x-label class="text-xl font-semibold" for="nombre" :value="__('Provincia')" />
                                <p class="px-8">{{$equipo->provinciaDescripcion}}</p>
                                </div>
                        </li>
                        <li>
                            <div class="px-80">
                                <x-label class="text-xl font-semibold" for="nombre" :value="__('Cantón')" />
                                <p>{{$equipo->cantonDescripcion}}</p>
                                </div>
                        </li>
                    </ul>
                    <br>
                    <hr>
                    <div>
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Dirección')" />
                    <p class="px-8">{{$equipo->userDireccion}}</p>
                    </div><br><hr>
                    <div>
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Fecha de entrega')" />
                    <p class="px-8">{{$equipo->donanteFecha}}</p>
                    </div><br><hr>
                    <div>
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Hora de entrega')" />
                    <p class="px-8">{{$equipo->donanteHora}}</p>
                    </div><br><hr>
                    <div>
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Detalle del equipo')" />
                    <p class="px-8">{{$equipo->equipoDetalle}}</p>
                    </div><br><hr>
                    <br><br>
                    <form action="{{ url('/distribuidor/edit/equipo/' . $equipo->equipoId) }}" method="POST">
                    @csrf
                    @method('PUT')

                    @foreach ($detalleD as $detalle)
                    <input type="hidden" name="detalle_id" value="{{$detalle->detalleId}}"/>
                    @endforeach
                    <input type="hidden" name="estado" value=""/>

                    <center>
                        <x-button type="submit" 
                    class="bg-yellow-400 hover:bg-yellow-300 text-white font-bold py-2 px-2 rounded">Rechazar</x-button>
                    <x-button class="bg-purple-900 hover:bg-purple-600 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ url('/distribuidor/dashboard') }}">Regresar</a>
                        </x-button>
                    </center>
                    </form>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
