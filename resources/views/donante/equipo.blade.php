<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Equipo') }}
        </h2>
    </x-slot>

    <div class="py-12">
      <!--Formulario Equipo -->
         <x-auth-card>
            <x-slot name="logo">
                <a href="/">
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </a>
            </x-slot>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <form action="{{route('equipo.store')}}" method="POST">
                    @csrf
                        <div class="mb-3">
                            <label  for="sistema_operativo"  class="form-label">Sistema Operativo </label>
                                <input type="text" class="form-control"  id="sistema_operativo" name="sistema_operativo" placeholder="Sistema Operativos">
                        </div>
                        <div class="mb-3">
                        <label for="procesador">Procesador</label>
                            <input type="text" class="form-control" id="procesador" name="procesador" placeholder=Procesador">
                        </div>
                        
                        <div class="mb-3">
                        <label for="ram">RAM</label> <br>
                            <input type="text" class="form-control" id="ram" name="ram"  placeholder="RAM">
                        </div>
                        
                        <div class="mb-3">
                        <label for="almacenamiento">Almacenamiento</label>
                            <input type="text" class="form-control" id="almacenamiento" name="almacenamiento"  placeholder="Almacenamiento">
                        </div>
                        
                        <div class="mb-3">
                        <label for="detalle">Detalle</label><br>
                            <input type="text" class="form-control" id="detalle" name="detalle"  placeholder="Detalle">
                        </div>
                        <x-button class="ml-4">
                            {{ __('Donar Equipo') }}
                        </x-button> 
                    </form>
                </div>
            </div>
         </x-auth-card>
    </div>
</x-app-layout>
