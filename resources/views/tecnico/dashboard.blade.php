<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard  | ') }}
            @foreach($perfilTecnico as $tecnico)
                <x-button class="ml-4">
                    <a href="{{url('tecnico/'.$tecnico->id)}}">
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
                    @if(Session::has('mensaje'))
                        {{ Session::get('mensaje') }}
                    @endif

                    @foreach($perfilTecnico as $tecnicop)
                        
                        Bienvenido {{$tecnicop->nombre}} {{$tecnicop->apellido}}
                        @if ($tecnicop->descripcion == null)
                            <p>
                                Agrega una descripción a tu perfil. 
                                <a href="{{url('tecnico/'.$tecnicop->id.'/edit')}}" > 
                                    Click Aquí para agregar 
                                </a>
                            </p>
                        @else
                            <h4>Tu del disponibilidas es <b>{{$tecnicop->disponibilidad}}</b></h4>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>