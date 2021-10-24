<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalle de la entrega del equipo') }}
        </h2>
    </x-slot>

   
    <div class="py-12 px-60">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-16 bg-white border-b border-gray-200 text-center">
                    @foreach ($infoTecnico as $equipo)
                    
                    <h2 class=" mb-4 font-black text-3xl  text-center  ">Información del tecnico</h2><br>
                    <hr>
                    <div>
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Nombre-Apellido')" />
                    <p class="px-8">{{$equipo->nombre}} {{$equipo->apellido}}</p>
                    </div><br><hr>
                    <div>
                    <x-label class="text-xl font-semibold " for="nombre" :value="__('Contacto')" />
                    <p class="px-8">Email: {{$equipo->email}}</p>
                    <p class="px-8">Celular: {{$equipo->celular}} </p>
                    </div><br><hr>
                    <div>
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Ubicación')" />
                    <p class="px-8">Provincia: {{$equipo->provincia}}</p>
                    <p class="px-8">Cantón: {{$equipo->canton}}</p>
                    <p class="px-8">Dirección: {{$equipo->direccion}} </p>
                    </div><br>
                    @endforeach

                    @foreach($infoBeneficiario as $equipo)
                    <h2 class=" mb-4 font-black text-3xl  text-center  ">Información del beneficiario</h2><br>
                    <hr>
                    <div>
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Nombre-Apellido')" />
                    <p class="px-8">{{$equipo->nombre}} {{$equipo->apellido}}</p>
                    </div><br><hr>
                    <div>
                    <x-label class="text-xl font-semibold " for="nombre" :value="__('Contacto')" />
                    <p class="px-8">Email: {{$equipo->email}}</p>
                    <p class="px-8">Celular: {{$equipo->celular}} </p>
                    </div><br><hr>
                    <div>
                    <x-label class="text-xl font-semibold" for="nombre" :value="__('Ubicación')" />
                    <p class="px-8">Provincia: {{$equipo->provincia}}</p>
                    <p class="px-8">Cantón: {{$equipo->canton}}</p>
                    <p class="px-8">Dirección: {{$equipo->direccion}} </p>
                    </div><br><hr>
                    <hr>
                    @endforeach
                    <br><br>
                    
                    <center>
                        @foreach($entregaPendiente as $equipo)
                        <x-button class="bg-yellow-400 hover:bg-yellow-300 text-white font-bold py-2 px-2 rounded">
                        <a href="{{ route('distribuidor_entrega_edit', $equipo->entregaId ) }}">Aceptar</a>
                        </x-button>
                        @endforeach
                        <x-button class="bg-purple-900 hover:bg-purple-600 text-white font-bold py-2 px-2 rounded">
                            <a href="{{ url('/distribuidor/vista/entrega') }}">Regresar</a>
                            </x-button>
                    </center>   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
