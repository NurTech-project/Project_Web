formulario que tendra datos en comun con create y edit 


<div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-gray-900" for="imagen">Imagen</label>
                <input class="border py-2 px-3 text-grey-800" type="file" name="imagen" id="imagen" value="{{$editarHistoria->imagen}}">
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-gray-900" for="descripcion">Descripcion</label>
                <textarea class="border py-2 px-3 text-grey-800" name="descripcion" id="descripcion" value="{{$editarHistoria->descripcion}}"></textarea>
            </div>
            <div class="flex flex-col mb-4">
                <label class="mb-2 font-bold text-lg text-gray-900" for="estado">Estado</label>
                <input class="border py-2 px-3 text-grey-800" type="text" name="estado" id="estado">
            </div>
<input  type="submit"  value="crear">
           