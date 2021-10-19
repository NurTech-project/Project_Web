<x-app-layout>
    <x-slot name="header">
    <img src="../../imagenes/logo.jpg" alt="" width="70" class="-mt-20 ml-6"></a>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Perfil') }}  
            <x-button class="ml-4 bg-yellow-400 hover:bg-gray-800 duration-700 ease-in-out">
                <a href="{{url('beneficiario/dashboard')}}">Dashboard</a>
            </x-button> 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white">
                    @foreach($beneficiario as $beneficiario)
                        <p><b>Nombre y Apellidos: </b> {{$beneficiario->nombre}} {{$beneficiario->apellido}}</p>
                        <p><b>Celular: </b> {{$beneficiario->celular}} </p>
                        <p><b>Dirección: </b> {{$beneficiario->direccion}} </p>
                        <p class="border-b-4 border-purple-800"><b>Correo Electrónico: </b> {{$beneficiario->email}} </p><br>

                    @endforeach
                    <hr/>
                    <form action="{{url('/beneficiario/'.$beneficiario->id)}}" method="post">
                        @csrf
                        {{method_field('PATCH')}}
                        <p><b>Agregar Descripción </b></p>
                        <textarea type="text" name="descripcion" id="descripcion" cols="70" rows="10">{{$beneficiario->descripcion}}</textarea>
                        <br/>
                        <p><b>Longitud </b></p>
                        <textarea id="contador" name="contador" cols="6" rows="1" readonly="True">0</textarea> <br/><br/>
                        <x-button class="bg-yellow-400 hover:bg-gray-800 duration-700 easy-in-out">
                        {{ __('Agregar Descripción') }}
                        </x-button> 
                    </form>
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
