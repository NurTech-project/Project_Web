<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard  |  ') }} 
            @foreach($perfilBeneficiario as $beneficiario)
                <x-button class="ml-4 bg-yellow-400 hover:bg-gray-800 duration-700 ease-in-out">
                    <a href="{{url('beneficiario/'.$beneficiario->id)}}">
                        Perfil
                    </a>
                </x-button> 
            @endforeach
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($perfilBeneficiario as $beneficiario)
                        
                        <a class="text-xl font-semibold">Bienvenido {{$beneficiario->nombre}} {{$beneficiario->apellido}}</a>
                        @if ($beneficiario->descripcion == null)
                        <p>
                                Para entrar en el proceso de selección, debes agregar una descripción 
                                a tu perfil. 
                                <a class="text-blue-400 hover:text-blue-800 duration-700 easy-in-out" href="{{url('beneficiario/'.$beneficiario->id.'/edit')}}" > 
                                    Click Aquí para agregar descripción
                                </a>
                        </p>
                            <div class="border-b-4 border-purple-800"></div>
                        @else
                            <h4>Tu estado del proceso es <b>{{$beneficiario->estado}}</b></h4>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
