<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Perfil') }}  
            <x-button class="ml-4">
                <a href="{{url('beneficiario/dashboard')}}">Dashboard</a>
            </x-button> 
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($beneficiario as $beneficiario)
                        <p><b>Nombre y Apellidos: </b> {{$beneficiario->nombre}} {{$beneficiario->apellido}}</p>
                        <p><b>Celular: </b> {{$beneficiario->celular}} </p>
                        <p><b>Dirección: </b> {{$beneficiario->direccion}} </p>
                        <p><b>Correo Electrónico: </b> {{$beneficiario->email}} </p>
                    @endforeach
                    <hr/>
                    <form action="{{url('/beneficiario/'.$beneficiario->id)}}" method="post">
                        @csrf
                        {{method_field('PATCH')}}
                        <label for="descripcion">Agregar Descripción</label> <br/>
                        <textarea type="text" name="descripcion" id="descripcion" cols="70" rows="10" value="{{$beneficiario->descripcion}}"> </textarea>
                        <div id="contador" name="contador">0</div> <br/><br/>
                        <x-button class="ml-4">
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
