
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            editar historia
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 text-center">

                    <div class="w-1/2 bg-white rounded shadow-2xl p-8 m-4">
                        <h1 class="block w-full text-center text-gray-800 text-2xl font-bold mb-6">editar historia</h1>
                        <form action="{{url('/historia/edit/'.$historia->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="flex flex-col mb-4">
                                <label class="mb-2 font-bold text-lg text-gray-900" for="imagen">imagen</label>
                                {{$historia->imagen}}
                                <input class="border py-2 px-3 text-grey-800" type="file" name="imagen" id="imagen" value="">
                            </div>
                            <div class="flex flex-col mb-4">
                                <label class="mb-2 font-bold text-lg text-gray-900" for="descripcion">descripcion</label>
                                <textarea class="border py-2 px-3 text-grey-800" name="descripcion" id="descripcion">{{$historia->descripcion}}</textarea>
                            </div>
                            <div class="flex flex-col mb-4">
                                <label class="mb-2 font-bold text-lg text-gray-900" for="estado">estado</label>
                                <input class="border py-2 px-3 text-grey-800" type="text" name="estado" id="estado" value="{{$historia->estado}}">
                            </div>
                            <input type="submit" value="editar" class="bg-purple-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                            <x-button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-2 rounded">
                                        <a href="{{url('/historia')}}">volver</a>
                            </x-button>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>