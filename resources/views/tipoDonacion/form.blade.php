<h1> {{ $mode }} Tipo de Donación </h1>

<label for="description"> Descripción  </label>
<input type="text" name="descripción" value="{{isset($tipoDonacion->descripcion)?$tipoDonacion->descripcion:''}}" id="descripción" >
<br>
<input type="submit" value="{{ $mode }} Registro">
<a href="{{url('typeDonation')}}">
    Regresar
</a>