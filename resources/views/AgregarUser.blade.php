<section class="secAgregar" id="AgregarUserForm">
    <div class="divFormAgregar form-group">
        <center><h4><b>Agregar Usuario</b></h4></center>
        <hr>
        <form action="{{route('registrarUsuario')}}" id="agregarForm">
            @CSRF
            <input type="text" id="latitud" name="longitud" value="0" style="display: none;">
            <input type="text" id="longitud" name="latitud" value="0" style="display: none;">
            <label for="Nombre"><b>Nombre:</b></label> <input type="text" name="nombre" id="Nombre" class="form-control form-control-sm"><br>
            <label for="apellido"><b>Apellido:</b></label> <input type="text" name="apellido" id="apellido" class="form-control form-control-sm"><br>
            <label for="TipoDocumento"><b>Tipo de Documento:</b></label>
            <select name="type_document" class="form-control form-control-sm" id="TipoDocumento">
                @foreach($TipoD as $TI)
                <option value="{{$TI -> id_tipoDocumento}}">{{$TI -> TDocumento}}</option>
                @endforeach
            </select><br>
            <label for="NDocumento"><b>Numero de Documento:</b></label> <input type="number" name="NDocumento" id="NDocumento" class="form-control form-control-sm"><br>
            <input type="checkbox" name="TYC" id="TYC" style="margin: 4px;">
            <label for="TYC"><b>Marque para aceptar los <a href="#">Terminos y condiciones</a></b></label>
            <div class="g-recaptcha" data-sitekey="6LdEI18fAAAAAEmaw87HQDiLi0-emwG7yGnkU8oh"></div><br>
            <center>
                <input type="button" value="Regresar" class="boton btnRegresar" id="regresar">
                <input type="submit" value="Guardar" class="boton btn-success">
            </center>
        </form>
    </div>
</section>
