
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight px-16">
          Charlas
        </h1>
    </x-slot>

  <br>
<section class="container mx-auto px-32">
  <x-button class="bg-purple-900 hover:bg-purple-600 w-64 px-16 text-white font-bold rounded">
    <a href="{{url('/charla/create')}}">Crear Charla</a>
  </x-button><br>
  <br><hr>
  <div class="bg-white w-full mb-8 overflow-hidden rounded-lg shadow-lg px-10">
    <div class="w-full overflow-x-auto">
      <table class="w-full">
        <thead>
          <tr class="text-md font-bold tracking-wide text-left text-gray-900 bg-white uppercase border-b border-gray-600">
            <th class="px-4 py-3">Link del video</th>
            <th class="px-4 py-3">Descripcion</th>
            <th class="px-4 py-3">Estado</th>
            <th></th>
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

            <td class="space-y-2 text-center p-2 md:border md:border-grey-500  block md:table-cell">
              <br>
            <x-button class="bg-yellow-400 hover:bg-yellow-300 text-white font-bold py-2 px-6 rounded">
              <a href="{{url('/charla/edit/'.$charla->id)}}">Editar</a>
            </x-button>
            <form action="{{url('/charla/delete/'.$charla->id)}}" method="post">
            @csrf
            @method('DELETE')
                        
            <x-button type="submit" onclick=" return confirm('quieres borrar?')" class="bg-purple-900 hover:bg-purple-600 text-white font-bold py-2  rounded">
               Eliminar
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