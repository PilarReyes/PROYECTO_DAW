$("#login").submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: "models/login.php",
        type: "post",
        data : new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        beforeSend : function() {
            //$("#boton-login").prop("disabled",true);
            //$("#boton-login").html('<i class="fas fa-spinner fa-pulse"></i> Espera por favor...');
        },
        success: function(respuesta) {
            Swal.fire('¡Perfecto!', "Has iniciado sesión correctamente. Ahora te redirigiremos a la página principal", "success").then(
                function() {
                    location.href = "../index.php";
                });
        },
        error : function(respuesta) {
            let tipo = "error";
            let desc = "";
            switch(respuesta.status) {
                case 400:
                    desc = "<p>Debes introducir un usuario y una contraseña.</p>";
                    break;
                case 401:
                    desc = "<p>Usuario y/o contraseña incorrectos.</p>";
                    break;
                case 403:
                    desc = "<p>Has excedido el número máximo de intentos de inicio de sesión fallidos.</p><p>Vuelve a iniciar sesión más tarde.</p>";
                    break;
                default:
                    desc = "<p>Ocurrió un error desconocido.</p><p>Inténtalo de nuevo más tarde.</p>";
                    break;
            }
            Swal.fire('Error al iniciar sesión', desc, tipo);
        },
        complete : function() {
           // $("#boton-login").html(tagBoton);
            // $("#boton-login").prop("disabled",false);
        },
    });
});