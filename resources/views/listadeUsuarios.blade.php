@extends ('paginaPrincipal')
@section ('contenido')
@Include('AgregarUser')
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Tipo de Documento</th>
            <th scope="col">N&uacute;mero Documento</th>
            <th scope="col">M&aacute;s Informaci&oacute;n</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($listaUsers as $LU)
        <tr>
            <td scope="row">{{$LU -> nombre}}</th>
            <td>{{$LU -> apellido}}</td>
            <td>{{$LU -> TDocumento}}</td>
            <td>{{$LU -> numero_documento}}</td>
            <td class="tdMas"><a href="{{route('MasInformacion', $LU -> id_usuario)}}"><img src="{{ asset('img/mas.png') }}" alt="Icono de mas" width="30"></a></td>
            <td>
                <a href="{{route('editar', $LU -> id_usuario)}}"><button class="boton btnEditar">Editar</button></a>
                <a href="{{route('eliminar', $LU -> id_usuario)}}"><button class="boton btnEliminar">Eliminar</button></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table><br>
<center>{{ $listaUsers->links() }}</center><br>
@endsection