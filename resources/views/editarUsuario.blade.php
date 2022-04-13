@extends ('paginaPrincipal')
@section ('contenido')
<section>
    <div>
        <h1> <img src="{{asset('img/perfil.png')}}" alt="Imagen usuario" width="100">
            Editar Informacion de {{$info -> nombre. ' ' . $info -> apellido}}</h1>
        <hr>
        <form action="{{route('editarCRUD')}}" id="FormularioEditar">
            <input type="text" value="{{$info -> id_Usuario}}" name="id" style="display:none">
            <div class="contenNA">
                <h3 for=""><b>Nombre y Apellido:</b></h3>
                <div>
                    <input type="text" value="{{$info -> nombre}}" name="nombre" class="inpText">
                    <input type="text" value="{{$info -> apellido}}" name="apellido" class="inpText">
                </div>
            </div><br>
            <h3><b>Tipo de Documento:</b></h3>
            <select name="TDocumento" id="TDocumento" class="form-control">
                @foreach($TDocumento as $TD)
                @if($TD -> id_tipoDocumento == $info -> tipo_documento)
                <option value="{{$TD -> id_tipoDocumento}}" selected>{{$TD -> TDocumento}}</option>
                @else
                <option value="{{$TD -> id_tipoDocumento}}">{{$TD -> TDocumento}}</option>
                @endif
                @endforeach
            </select><br><br>
            <h3 for="numeroD"><b>Numero Documento:</b></h3>
            <input type="number" name="NDocumento" value="{{$info -> numero_documento}}" class="form-control"><br><br>
            <input type="submit" value="Actualizar" class="boton btn-success">
            <input type="submit" value="Regresar" class="boton btnRegresar">
    </div>
</section>
<script>
    // Validar en editar
    $(document).ready(function() {
        $('#FormularioEditar').validate({
            rules: {
                nombre: {
                    required: true,
                    maxlength: 20
                },
                apellido: {
                    required: true,
                    maxlength: 20
                },
                NDocumento: {
                    required: true,
                    maxlength: 12
                }
            },
            messages: {
                nombre: {
                    required: "Por favor, introduzca el nombre del usuario",
                    maxlength: "El nombre no puede pasar los 10 caracteres",
                },
                apellido: {
                    required: "Por favor, introduzca el apellido del usuario",
                    maxlength: "El apellido no puede pasar los 10 caracteres"
                },
                NDocumento: {
                    required: "Por favor, introduzca el documento",
                    maxlength: "El apellido no puede pasar los 12 caracteres"
                }
            },
            submitHandler: function(form) {
                form.submit();
            }
        })
    })
</script>
@endsection