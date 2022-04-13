<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usarios</title>
    <link rel="shortcut icon" href="{{asset('img/grupo.png')}}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" defer></script>
    <script src="{{asset('js/ValidarForm.js')}}"></script>
</head>

<body>
    <div class="fondoAdd" id="fondoAdd"></div>
    <section class="contenedor">
        <header class="item1 encabezado">
            <h1><b>Listado de usuarios</b></h1>
            <hr>
        </header>
        <nav class="item2 menu">
            <ul class="list-group ulresponsive">
                <li class="list-group-item">
                <h2><img src="{{asset('img/lista.png')}}" alt="Agregar" width="30"> <span class="responsive">Men&uacute;</span></h2>
                </li>
                    <li class="list-group-item liOpciones" id="popUpAdd">
                        <img src="{{asset('img/agregar-usuario.png')}}" alt="Agregar" width="25"> <span class="responsive">Agregar Usuarios</span> 
                    </li>
                <a href="{{ route('ListaUsuarios') }}">
                    <li class="list-group-item liOpciones">
                    <img src="{{asset('img/gente.png')}}" alt="Agregar" width="25"> <span class="responsive">Lista de Usuarios</span> 
                    </li>
                </a>
            </ul>
        </nav>
        <div class="item3 main">
            @yield('contenido')
        </div>
    </section>

</body>

</html>