<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agendar técnico') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <h2 class="mb-4 text-xl text-center font-semibold">Agendar entrega a técnico</h2>
                <!-- Formulario de agendar a técnico -->
                <form action="{{ url('/distribuidor/create/agenda') }}" method="POST">
                    @csrf
                    @method('POST')

                    <input type="hidden" name="detalle_id" value=""/>
                    
                    <input type="hidden" name="estado" value=""/>

                    <x-button type="submit" 
                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-2 rounded">Crear</x-button>
                    
                    </form>

                    <!-- Mostrar tabla de agendas -->

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
