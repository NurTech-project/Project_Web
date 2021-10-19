<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle pieza') }}
        </h2>
    </x-slot>

   
    <div class="py-12 px-60">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-16 bg-white border-b border-gray-200 text-center">
                    <h2 class=" mb-4 font-black text-3xl  text-center ">Detalle Pieza</h2>
                    @foreach ($piezaGet as $pieza)
                    <br><hr>
                    <div>
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Nombre')" />
                    <p class="px-8">{{$pieza->userNombre}}</p>
                    </div><br><hr>
                    <div>
                    <x-label class="text-xl font-semibold " for="nombre" :value="__('Apellido')" />
                    <p class="px-8">{{$pieza->userApellido}}</p>
                    </div><br><hr>
                    <div>
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Provincia')" />
                    <p class="px-8">{{$pieza->provinciaDescripcion}}</p>
                    </div><br><hr>
                    <div>
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Cantón')" />
                    <p class="px-8">{{$pieza->cantonDescripcion}}</p>
                    </div><br><hr>
                    <div>
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Dirección')" />
                    <p class="px-8">{{$pieza->userDireccion}}</p>
                    </div><br><hr>
                    <div>
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Fecha de entrega')" />
                    <p class="px-8">{{$pieza->donanteFecha}}</p>
                    </div><br><hr>
                    <div >
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Hora de entrega')" />
                    <p class="px-8">{{$pieza->donanteHora}}</p>
                    </div><br><hr>
                    <div>
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Detalle del pieza')" />
                    <p class="px-8">{{$pieza->piezaDetalle}}</p>
                    </div><br><hr>
                    @endforeach
                    <br><br>
                    <form action="{{ url('/distribuidor/create/pieza') }}" method="POST">
                    @csrf
                    @method('POST')
                    @foreach ($piezaGet as $pieza)
                    <input type="hidden" name="pieza_id" id="pieza_id" value="{{$pieza->piezaId}}"/>
                    @endforeach

                    @foreach($distribuidor as $distb)
                    @if(Auth::user()->id == $distb->user_id)
                    <input type="hidden" name="distribuidor_id" id="distribuidor_id" value="{{$distb->id}}"/>
                    @endif
                    @endforeach
                    
                    <input type="hidden" name="estado" value="Aceptado"/>

                    <center>
                        <x-button type="submit" class="bg-yellow-400 hover:bg-yellow-300 text-white font-bold py-2 px-2 rounded">Aceptar</x-button>
                            <x-button class="bg-purple-900 hover:bg-purple-600 text-white font-bold py-2 px-2 rounded">
                            <a href="{{ url('/distribuidor/dashboard') }}">Regresar</a>
                            </x-button>
                    </center>
                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
