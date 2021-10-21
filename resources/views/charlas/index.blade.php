





<link rel="stylesheet" href="{{asset('css/app.css')}}">
<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight">
            charlas
        </h1>
    </x-slot>

   
<section class="container mx-auto p-6 font-mono">
<x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
        <a href="{{url('/charla/create')}}">crear charla</a>
    </x-button>
  <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto">
      <table class="w-full">
        <thead>
          <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
            <th class="px-4 py-3">link del video</th>
            <th class="px-4 py-3">descripcion</th>
            <th class="px-4 py-3">estado</th>
          </tr>
        </thead>
        @foreach($charlas as $charla)
        <tbody class="bg-white">
          <tr class="text-gray-700">
            
            <td class="px-4 py-3 text-ms font-semibold border">{{ $charla->link_video }}</td>
                
            <td class="px-4 py-3 text-ms font-semibold border">{{ $charla->descripcion }}</td>
            <td class="px-4 py-3 text-xs border">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> {{ $charla->estado }} </span>
            </td>
            <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">

                                    <x-button class="bg-yellow-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                                        <a href="{{url('/charla/edit/'.$charla->id)}}">editar</a>
                                    </x-button>

                                    <form action="{{url('/charla/delete/'.$charla->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                        
                                    <x-button type="submit" onclick=" return confirm('quieres borrar?')" class="bg-red-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
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