//Cuando esté cargando la pagina ejecute la función iniciar
window.onload = iniciar;

function iniciar() {
    //Obtenemos los valores longitud y latitud de los input en el html
    longitud = document.getElementById("longitud").value;
    latitud = document.getElementById("Latitud").value;
    //Validacion por si estos valores se encuentran vacios
    if (longitud == "0" || latitud == "0") {
        longitud = "4.8157897";
        latitud = "-74.0417513";
    }
    //Llamamos a la funcion iniciar map enviandole los dos valores
    iniciarMap(longitud, latitud);
    console.log(longitud + ' ' + latitud);
}

function iniciarMap(longitud, latitud) {
    //Los valores llegan en tipo string, los convertimos a float
    longitud = parseFloat(longitud);
    latitud = parseFloat(latitud);
    // creando la variable con las coordenadas
    var coord = { lat: longitud, lng: latitud };
    //Imprimimos el mapa con las coordenadas
    var map = new google.maps.Map(document.getElementById('Mapa'), {
        zoom: 15,
        center: coord
    });
    var marker = new google.maps.Marker({
        position: coord,
        map: map
    });
}