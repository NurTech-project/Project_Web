<x-app-layout>
    <x-slot name="header">
        <h2 class="px-24 font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Perfil  |  ') }}  
            <x-button class="bg-purple-900 hover:bg-purple-600 ml-4">
                <a href="{{url('distribuidor/dashboard')}}">Dashboard</a>
            </x-button> 
        </h2>
    </x-slot>

    <div class="py-12 px-40">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-16 bg-white border-b border-gray-200"><br>
                    @foreach($perfilDistribuidor as $distribuidor)
                        <hr><p><b>Nombre y Apellidos: </b></p>
                        <p class="px-8">{{$distribuidor->nombre}} {{$distribuidor->apellido}}</p><br>
                        <hr><p><b>Celular: </b></p>
                        <p class="px-8">{{$distribuidor->celular}} </p><br>
                        <hr><p><b>Dirección: </b></p>
                        <p class="px-8">{{$distribuidor->direccion}} </p><br>
                        <hr><p><b>Correo Electrónico: </b></p>
                        <p class="px-8">{{$distribuidor->email}} </p><br>
                        
                    <form action="{{url('/distribuidor/perfil/'.$distribuidor->id.'/edit')}}" method="post"><hr>
                        @csrf
                        {{method_field('PATCH')}}
                        <b> <label for="descripcion">Agregar Descripción:</label> </b> <br/><br>
                        <textarea class="w-full" type="text" name="descripcion" id="descripcion" cols="70" rows="10">{{$distribuidor->descripcion}}</textarea>
                        <br/>
                    
                        <div class="text-center" id="contador">0</div><br>
                        <center>
                            <x-button class="bg-yellow-400 hover:bg-yellow-200 ml-4">
                                {{ __('Agregar Descripción') }}
                            </x-button> 
                        </center>
                    </form>
                    @endforeach
                    <script>
                        const descripcion = document.getElementById('descripcion');
                        const contador = document.getElementById('contador');
                        
                        descripcion.addEventListener('input', function(e){
                            const target = e.target;
                            const longitudAct = target.value.length;
                            contador.innerHTML = `${longitudAct}`;
                        })
                    </script>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>