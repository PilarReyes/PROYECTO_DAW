// Crear tarea
$("#crearTarea").submit(function(e) {
    e.preventDefault();
    console.log("Formulario de crear enviado");
    $.ajax({
        url: "crearTarea.php",
        type: "post",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            // Código para realizar alguna acción antes de enviar la solicitud
        },
        success: function(respuesta) {
            console.log("Respuesta exitosa:", respuesta); // Agregar este console.log
            Swal.fire('¡Perfecto!', 'La tarea se ha creado correctamente.', 'success').then(
                function() {
                    location.reload(); // Recargar la página después de crear la tarea
                });
        },
        error: function(respuesta) {
            let tipo = "error";
            let desc = "";
            switch(respuesta.status) {
                case 400:
                    desc = "Todos los campos son obligatorios.";
                    break;
                case 500:
                    desc = "Ocurrió un error interno en el servidor. Inténtalo de nuevo más tarde.";
                    break;
                default:
                    desc = "Ocurrió un error inesperado. Inténtalo de nuevo más tarde.";
                    break;
            }
            Swal.fire('Error', desc, tipo);
        },
        complete: function() {
            // Código para realizar alguna acción después de completar la solicitud
        },
    });
});

// Modificar tarea
$("#modificarTarea").submit(function(e) {
    e.preventDefault();
    console.log("Formulario de modificación enviado");
    $.ajax({
        url: "modificarTarea.php",
        type: "post",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            // Código para realizar alguna acción antes de enviar la solicitud
        },
        success: function(respuesta) {
            Swal.fire('¡Perfecto!', 'La tarea se ha modificado correctamente.', 'success').then(
                function() {
                    location.reload(); // Recargar la página después de modificar la tarea
                });
        },
        error: function(xhr, status, error) {
            let tipo = "error";
            let desc = "";
            switch(xhr.status) {
                case 400:
                    desc = "Todos los campos son obligatorios.";
                    break;
                case 500:
                    desc = "Ocurrió un error interno en el servidor. Inténtalo de nuevo más tarde.";
                    break;
                default:
                    desc = "Ocurrió un error inesperado. Inténtalo de nuevo más tarde.";
                    break;
            }
            Swal.fire('Error', desc, tipo);
        },
        complete: function() {
            // Código para realizar alguna acción después de completar la solicitud
        },
    });
});

// Eliminar tarea
$("#eliminarTarea").submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: "eliminarTarea.php",
        type: "post",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            // Código para realizar alguna acción antes de enviar la solicitud
        },
        success: function(respuesta) {
            Swal.fire('¡Perfecto!', 'La tarea se ha eliminado correctamente.', 'success').then(
                function() {
                    location.reload(); // Recargar la página después de eliminar la tarea
                });
        },
        error: function(xhr, status, error) {
            let tipo = "error";
            let desc = "";
            switch(xhr.status) {
                case 400:
                    desc = "Error al procesar la solicitud.";
                    break;
                case 500:
                    desc = "Ocurrió un error interno en el servidor. Inténtalo de nuevo más tarde.";
                    break;
                default:
                    desc = "Ocurrió un error inesperado. Inténtalo de nuevo más tarde.";
                    break;
            }
            Swal.fire('Error', desc, tipo);
        },
        complete: function() {
            // Código para realizar alguna acción después de completar la solicitud
        },
    });
});
