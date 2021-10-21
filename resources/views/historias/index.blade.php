





<link rel="stylesheet" href="{{asset('css/app.css')}}">
<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            historias
        </h1>
    </x-slot>

    
<section class="container mx-auto p-6 font-mono">
  <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">
    <x-button class="bg-purple-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
        <a href="{{url('/historia/create')}}">crear historia</a>
    </x-button>
      <table class="w-full">
        <thead>
          <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
            <th class="px-4 py-3">imagen</th>
            <th class="px-4 py-3">descripcion</th>
            <th class="px-4 py-3">estado</th>
          </tr>
        </thead>
        @foreach($historias as $historia)
        <tbody class="bg-white">
          <tr class="text-gray-700">
            <td class="px-4 py-3 border">
            <div class="flex items-center text-sm">
                <div class="relative w-20 h-20 mr-3 square-full md:block">
                  <img class="object-cover w-full h-full square-full" src="{{asset ('storage').'/'.$historia->imagen }}" width="1"/>
                  <div class="absolute inset-0 square-full shadow-inner" aria-hidden="true"></div>
                </div>
                </td>
            <td class="px-4 py-3 text-ms font-semibold border">{{ $historia->descripcion }}</td>
            <td class="px-4 py-3 text-xs border">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> {{ $historia->estado }} </span>
            </td>
            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">

                                    <x-button class="bg-yellow-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                                        <a href="{{url('/historia/edit/'.$historia->id)}}">editar</a>
                                    </x-button>

                                    <form action="{{url('/historia/delete/'.$historia->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                        
                                    <x-button type="submit" onclick=" return confirm('quieres borrar?')" class="bg-purple-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                                       eliminar
                                    </x-button>
                                    </form>
                                </td>
          </tr>
         
          
        </tbody>
        @endforeach
      </table>
    </div>
  </div>
</section>
</x-app-layout>