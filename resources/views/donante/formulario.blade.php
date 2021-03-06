<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Formulario de donación') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <x-auth-card>
                <x-slot name="logo">
                    <a href="/">
                    
                    <img src="../imagenes/NurLogo.png" alt="" class="w-50 h-40 fill-current text-gray-500" >
                        <!-- <x-application-logo class="w-20 h-20 fill-current text-gray-500" />-->
                    </a>
                </x-slot>

            <!-- Formulario -->
            <form action="{{route('donante.store')}}" method="POST">
                @csrf
                <div>
                    <x-label for="tipo_donacion_id" :value="__('Tipo de donación')" />
                    <select id="tipo_donacion_id" name="tipo_donacion_id" class ="box-border h-10 w-80 p-2 border-2" >
                        <option>-----Seleccionar------</option>
                        @foreach ($tipo_donaciones as $tipo_donacion)
                        <option value="{{$tipo_donacion->id}}"> {{$tipo_donacion->descripcion}} </option>
                        @endforeach
                    </select>
                </div>
                <br> <br> <br> <br>

                
                <div>
                    <x-label for="fecha_entrega" :value="__('Fecha de Entrega')" />
                    <x-input id="fecha_entrega" class="block mt-1 w-full" type="date" name="fecha_entrega" :value="old('fecha_entrega')" required autofocus />
                </div>
                <br> <br>
            
                <div>
                    <x-label for="hora_entrega" :value="__('Hora de Entrega')" />
                    <x-input id="hora_entrega" class="block mt-1 w-full" type="time" name="hora_entrega" :value="old('hora_entrega')" required autofocus />
                </div>
                <br>

                
                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-5 bg-yellow-400 hover:bg-yellow-300">
                        <a href="{{url('donante/dashboard')}}">
                            Cancelar
                        </a>
                    </x-button>
                    <x-button class="ml-4 bg-yellow-400 hover:bg-yellow-300">
                        {{ __('Agendar Donación') }}
                    </x-button> 
                   
                </div>
            </form>
        </x-auth-card>
    </div>
      
</x-app-layout>
