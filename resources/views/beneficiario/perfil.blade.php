<x-app-layout>
    @foreach($perfilBeneficiario as $beneficiario)
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfil de ') }} {{$beneficiario->nombre}} {{$beneficiario->apellido}}
            <x-button class="ml-4">
                <a href="{{url('beneficiario/'.$beneficiario->id.'/edit')}}">Editar Descripción</a>
            </x-button> 
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <p><b>Celular: </b> {{$beneficiario->celular}} </p>
                    <p><b>Dirección: </b> {{$beneficiario->direccion}} </p>
                    <p><b>Correo Electrónico: </b> {{$beneficiario->email}} </p>
                    <p><b>Estado: </b> {{$beneficiario->estado}} </p>
                    <p><b>Descripcion: </b> {{$beneficiario->descripcion}} </p>
                    <a href="{{url('beneficiario/dashboard')}}"><b>Regresar</b></a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</x-app-layout>
