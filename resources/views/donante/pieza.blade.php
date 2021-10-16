<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pieza') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <!-- Formulario Pieza> -->
        <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <form action="{{route('pieza.store')}}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label  for="nombre"  class="form-label">Nombre</label>
                                <input type="text" class="form-control"  id="nombre" name="nombre" placeholder="Nombre Pieza">
                        </div>                      
                        <div class="mb-3">
                        <label for="detalle">Detalle</label><br>
                            <input type="text" class="form-control" id="detalle" name="detalle"  placeholder="Detalle">
                        </div>
                        
                        <x-button class="ml-4">
                            {{ __('Donar Pieza') }}
                        </x-button>
                        
                    </form>
                </div>
            </div>
         </x-auth-card>
    </div>
</x-app-layout>
