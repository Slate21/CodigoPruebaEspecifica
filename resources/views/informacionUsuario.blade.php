@extends ('paginaPrincipal')
@section ('contenido')
    <section class="secIU">
        <div class="divCabeza">
            <img src="{{asset('img/perfil.png')}}" alt="Imagen usuario"  width="100">
            <h2>Informaci&oacute;n de {{$MI -> nombre.' '.$MI -> apellido}}</h2>
        </div><hr>
        <div class="divCInfo">
            <b>Tipo de Documento:</b> {{$MI -> TDocumento}} <br>
            <b>Documento:</b> {{$MI -> numero_documento}}
        </div>
        <div class="divlocalizacion">
            <h4>Localizacion del usuario:</h4>
            <input type="text" value="{{$MI -> latitud}}" id="Latitud" style="display: none">
            <input type="text" value="{{$MI -> longitud}}" id="longitud" style="display: none">
            <div id="Mapa"></div>
        </div><br>
        <center><a href="{{ route('ListaUsuarios') }}"><button class="boton btnRegresar">Regresar</button></a></center>
    </section>
    <script src="{{asset('js/localizacion.js')}}" defer></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCdYfpY02e8rj1gILiSqrGEUsdAnnjgOJ0&callback=iniciarMap"></script>
@endsection