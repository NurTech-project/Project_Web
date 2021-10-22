
<link rel="stylesheet" href="{{asset('css/app.css')}}">
<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 leading-tight px-16">
            Historias
        </h1>
    </x-slot>

    
<section class="container mx-auto px-20">
  <div class="w-full mb-8 overflow-hidden rounded-lg shadow-lg">
    <div class="w-full overflow-x-auto"><br>
    <x-button class="bg-purple-900 hover:bg-purple-600 w-64 px-16 text-white font-bold rounded">
        <a href="{{url('/historia/create')}}">Crear historia</a>
    </x-button>
    <br><br>
      <table class="w-full">
        <thead>
          <tr class="text-md font-semibold tracking-wide text-left text-gray-900 bg-gray-100 uppercase border-b border-gray-600">
            <th class="px-4 py-3">Imagen</th>
            <th class="px-4 py-3">Descripcion</th>
            <th class="px-4 py-3">Estado</th>
          </tr>
        </thead>
        @foreach($historias as $historia)
        <tbody class="bg-white">
          <tr class="text-gray-700">
            <td class="px-4 py-3 border">
              <div class="flex items-center text-sm">
                <div class="relative w-20 h-20 mr-3 square-full md:block">
                  <img class="object-cover w-full h-full square-full" src="{{asset ('storage').'/'.$historia->imagen }}" width="1"/>
                  <div class="absolute inset-0 square-full shadow-inner" aria-hidden="true">
                  </div>
                </div>
            </td>
            <td class="px-4 py-3  text-ms font-semibold border">{{ $historia->descripcion }}</td>
            <td class="px-4 py-3 text-xs border">
              <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-sm"> {{ $historia->estado }} </span>
            </td>
          <td class="space-y-2 text-center p-2 md:border md:border-grey-500 text-left block md:table-cell">

            <x-button class="bg-yellow-400 hover:bg-yellow-300 text-white font-bold py-2 px-6 rounded">
                <a href="{{url('/historia/edit/'.$historia->id)}}">Editar</a>
            </x-button>

            <form action="{{url('/historia/delete/'.$historia->id)}}" method="post">
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

