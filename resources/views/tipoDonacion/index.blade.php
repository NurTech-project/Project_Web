Mostrar la lista de Tipo de donaciones

@if(Session::has('mensaje'))
{{ Session::get('mensaje') }}
@endif


<a href="{{url('typeDonation/create')}}">
    Crear Nuevo tipo de donación
</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Descripcion</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $tipoDonaciones as $tipoDonacion )
        <tr>
            <td> {{$tipoDonacion->id}} </td>
            <td> {{$tipoDonacion->descripcion}} </td>
            <td>
                <a href="{{url('/typeDonation/'.$tipoDonacion->id.'/edit')}}">
                    Editar
                </a>
                 
                | 
                <form action="{{url('/typeDoonation/'.$tipoDonacion->id)}}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit" onclick="return confirm('¿Quieres eliminar el registro?')" 
                    value="Borrar" >
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>