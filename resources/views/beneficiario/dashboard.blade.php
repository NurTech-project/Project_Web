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
                        
                        Bienvenido {{$beneficiario->nombre}} {{$beneficiario->apellido}}
                        @if ($beneficiario->descripcion == null)
                            <p>
                                Para entrar en el proceso de selección, debes agregar una descripción 
                                a tu perfil. 
                                <a href="{{url('beneficiario/'.$beneficiario->id.'/edit')}}" > 
                                    Click Aquí para agregar descripción
                                </a>
                            </p>
                        @else
                            <h4 class="border-b-4 border-purple-800">Tu estado del proceso esta <b>{{$beneficiario->estado}}</b></h4>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
