<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            historias
        </h1>
    </x-slot>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">crear historia</button>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <table class="min-w-full border-collapse block md:table">
		<thead class="block md:table-header-group">
			<tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">imagen</th>
				<th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">descripcion</th>
				
			</tr>
		</thead>
        @foreach($historias as $historia)
		<tbody class="block md:table-row-group">
			<tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
           
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{ $historia->imagen }}</td>
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{ $historia->descripcion }}</td>
				<td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
           
					
					<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">editar</button>
					<button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">eliminar</button>
                   
                </td>
			</tr>
			
		</tbody>
        @endforeach
	</table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


