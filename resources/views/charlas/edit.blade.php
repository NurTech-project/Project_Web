<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight px-16">
            Editar Charla
        </h2>
    </x-slot>


    <div class="py-12 px-44">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">

                    <div class=" px-20 w-full bg-white rounded shadow-2xl m-4">
                        <br>
                        <h1 class="block w-full text-center text-gray-800 text-3xl font-bold mb-6">Editar Charla:</h1>
                        <form action="{{url('/charla/edit/'.$charla->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <hr>
                            <div class="flex flex-col mb-4">
                            <label class="mb-2 font-bold text-lg text-left text-gray-900" for="imagen">Link del Video:</label>
                                <input class="border py-2 px-3 text-grey-800" type="text" name="link_video" id="link_video"  value="{{$charla->link_video}}">
                            </div>
                            <br><br><hr>
                            <div class="flex flex-col mb-4">
                                <label class="mb-2 font-bold text-lg text-left text-gray-900" for="descripcion">Descripcion:</label>
                                <textarea cols="70" rows="10" name="descripcion" id="descripcion">{{$charla->descripcion}}</textarea>
                            </div>
                            <br><br><hr>
                            <div class="flex flex-col mb-4">
                                <label class="mb-2 font-bold text-lg text-left text-gray-900" for="estado">Estado</label>
                                <select name="estado" id="estado" class="form-control mb-2">
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                            </div>
                            <input type="submit" value="editar" class="uppercase bg-yellow-400 hover:bg-yellow-300 text-white font-bold py-1 px-4 rounded">
                            <x-button class="bg-purple-900 hover:bg-purple-600 text-white font-bold py-1 rounded">
                                        <a href="{{url('/charla')}}">Volver</a>
                            </x-button>
                            <br><br>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>