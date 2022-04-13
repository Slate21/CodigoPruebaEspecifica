//Validar el formulario
$(document).ready(function validar() {
    $('#agregarForm').validate({
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
            },
            TYC: {
                required: true,
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
            },
            TYC: {
                required: "Debe aceptar los terminos y condiciones"
            }
        },
        submitHandler: function (form) {
            //Validar si el captcha se lleno
            var verified = grecaptcha.getResponse();
            if (verified.length === 0) {
                swal({
                    title: "Por favor, realiza  el  captcha",
                    icon: "error",
                    button: "Ok",
                });
                return false;
            } else {
                if(validar){
                    form.submit();
                }
            }
        }
    })
})

//Estilos Pop up
window.onload = iniciar;

function iniciar() {
    var fondoAdd = document.getElementById("fondoAdd");
    var popUpAdd = document.getElementById("popUpAdd");
    var btnRegresar = document.getElementById("regresar");
    var AgregarUF = document.getElementById("AgregarUserForm");

    fondoAdd.addEventListener("click", quitarBackground, false);
    btnRegresar.addEventListener("click", quitarBackground, false);
    popUpAdd.addEventListener("click", mostrarPopUp, false);

    function quitarBackground() {
        fondoAdd.style.display = "none";
        AgregarUF.style.display = "none";
    }

    function mostrarPopUp() {
        var AgregarUF = document.getElementById("AgregarUserForm");
        //Obtener Geolocalizacion cuando se muestre el formulario
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            alert("Este navegador no soporta Geolocalizacion");
        }
        //Sobreescribir inputs
        function showPosition(position) {
            document.getElementById("longitud").value = position.coords.latitude;
            document.getElementById("latitud").value = position.coords.longitude;
        }

        fondoAdd.style.display = "block";
        AgregarUF.style.display = "flex";
    }
}



