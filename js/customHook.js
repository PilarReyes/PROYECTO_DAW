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
            $("#boton-login").prop("disabled",true);
        },
        success: function(respuesta) {
            Swal.fire('¡Perfecto!', "Has iniciado sesión correctamente. Ahora te redirigiremos a la página principal", "success").then(
                function() {
                    location.href = "../InnerSync/dashboard.php";
                });
        },
        error : function(respuesta) {
            let tipo = "error";
            let desc = "";
            switch(respuesta.status) {
                case 400:
                    desc = "<p>Debes rellenar los campos obligatorios.</p>";
                    break;
                case 401:
                    desc = "<p>Usuario no encontrado.</p>";
                    break;
                case 403:
                    desc = "<p>Contraseña incorrecta.</p>";
                    break;
                default:
                    desc = "<p>Ocurrió un error desconocido.</p><p>Inténtalo de nuevo más tarde.</p>";
                    break;
            }
            Swal.fire('Error al iniciar sesión', desc, tipo);
        },
        complete : function() {
            $("#boton-login").prop("disabled",false);
        },
    });
});

$("#register").submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: "models/nuevo_usuario.php",
        type: "post",
        data : new FormData(this),
        contentType: false,
        cache: false,
        processData:false,
        beforeSend : function() {
            //$('#boton-registro').prop('disabled', true).text('Registrando...');
            $("#boton-login").prop("disabled",true);
        },
        success: function(respuesta) {
            Swal.fire('¡Perfecto!', 'Te has registrado correctamente. Ahora puedes iniciar sesión con tus datos.', 'success').then(
                function() {
                    location.href = "../InnerSync/page-login.php";
                });
        },
        error : function(respuesta) {
            let tipo = "error";
            let desc = "";
            switch(respuesta.status) {
                case 400:
                    desc = "Todos los campos son obligatorios.";
                    break;
                case 409: 
                    desc = "El nombre de usuario ya existe.";
                    break;
                default:
                    desc = "Ocurrió un error inesperado. Inténtalo de nuevo más tarde.";
                    break;
            }
            Swal.fire('Error en el registro', desc, tipo);
        },
        complete : function() {
            //$('#boton-registro').prop('disabled', false).html('Registrarse');
            $("#boton-login").prop("disabled",false);
        },
    });
});

//cambiar contraseña
document.addEventListener('DOMContentLoaded', function() {
    // Manejar clic en el botón para cambiar la contraseña usando jQuery 'on' para delegar el evento
    $(document).on('click', '#botonCambiarContrasena', function() {
        $('#modalCambiarContrasena').modal('show');
    });

    // Manejar el formulario de cambiar contraseña usando jQuery 'on' para delegar el evento
    $(document).on('submit', '#formCambiarContrasena', function(e) {
        e.preventDefault();
        $.ajax({
            url: 'models/modificarPerfil.php',
            type: 'post',
            data: $(this).serialize(),
            success: function(response) {
                $('#modalCambiarContrasena').modal('hide');
                Swal.fire('¡Perfecto!', response, 'success');
            },
            error: function(xhr) {
                let tipo = "error";
                let desc = "";
                switch(xhr.status) {
                    case 400:
                        desc = "Todos los campos son obligatorios.";
                        break;
                    case 401:
                        desc = "Contraseña actual incorrecta.";
                        break;
                    case 404:
                        desc = "Las nuevas contraseñas no coinciden.";
                        break;
                    case 500:
                    default:
                        desc = "Ocurrió un error desconocido. Inténtalo de nuevo más tarde.";
                        break;
                }
                Swal.fire('Error', desc, tipo);
            }
        });
    });
});



//crear tarea
$(document).ready(function() {
    //console.log("Documento listo");

    // Verificar si jQuery está funcionando
    /*if (typeof jQuery !== 'undefined') {
        console.log("jQuery está cargado");
    } else {
        console.log("jQuery no está cargado");
    }*/

    // Delegación de eventos para el botón Crear
    $(document).on("click", "#botonCrear", function() {
        console.log("Botón Crear clickeado");
    });

    // Delegación de eventos para el formulario Crear Tarea
    $(document).on("submit", "#crearTarea", function(e) {
        e.preventDefault();
        console.log("Formulario de crear enviado");

        var formData = new FormData(this);
        formData.forEach(function(value, key) {
            console.log(key + ": " + value);
        });

        $.ajax({
            url: "views/crearTarea.php",
            type: "post",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                console.log("Antes de enviar la solicitud AJAX");
                $("#botonCrear").prop("disabled", true);
            },
            success: function(respuesta) {
                console.log("Respuesta del servidor:", respuesta);
                Swal.fire('¡Perfecto!', 'La tarea se ha creado correctamente.', 'success').then(
                    function() {
                        location.reload(); // Recargar la página después de cerrar el modal
                    });
            },
            error: function(xhr, status, error) {
                console.log("Error en la solicitud AJAX:", status, error);
                console.log("Response text:", xhr.responseText);
                let tipo = "error";
                let desc = "";
                switch(xhr.status) {
                    case 400:
                        desc = "Rellena los campos obligatorios.";
                        break;
                    case 500:
                        desc = "Ocurrió un error interno en el servidor. Inténtalo de nuevo más tarde.";
                        break;
                    default:
                        desc = "Ocurrió un error inesperado. Inténtalo de nuevo más tarde.";
                        break;
                }
                Swal.fire('Error al crear la tarea', desc, tipo);
            },
            complete: function() {
                console.log("Solicitud AJAX completada");
                $("#botonCrear").prop("disabled", false);
            },
        });
    });
});



//abrir modal modificar tarea
$(document).on('click', '.editar-tarea', function() {
    var button = $(this);
    var tareaId = button.data('id');
    console.log("ID de la tarea a modificar:", tareaId);

    console.log("Enviando solicitud AJAX a models/modificarTarea.php con ID:", tareaId);
    $.ajax({
        url: "views/modificarTarea.php",
        type: "POST",
        data: { id: tareaId },
        success: function(data) {
            console.log("Datos recibidos del servidor:", data);
            $('#modificarTareaModal .modal-content').html(data);
            $('#modificarTareaModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error("Error en solicitud AJAX:", status, error);
        }
    });
});

//modificar tarea
// Asegúrate de que el evento de envío del formulario se registra correctamente
$(document).on('submit', '#modificarTarea', function(e) {
    e.preventDefault();
    console.log("Formulario de modificación de tarea enviado.");

    var formData = new FormData(this);
    var tareaId = formData.get("id");
    console.log("ID de la tarea a modificar: " + tareaId);

    $.ajax({
        url: "models/modificarTareaForm.php",
        type: "POST",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $("#botonActualizar").prop("disabled", true);
        },
        success: function(respuesta) {
            console.log("Respuesta del servidor:", respuesta);
            Swal.fire('¡Tarea Actualizada!', "La tarea ha sido actualizada correctamente.", "success").then(
                function() {
                    location.reload();
                }
            );
        },
        error: function(xhr) {
            let tipo = "error";
            let desc = "";
            switch(xhr.status) {
                case 400:
                    desc = "<p>Por favor, completa los campos requeridos.</p>";
                    break;
                case 404:
                    desc = "<p>La tarea no se encontró en la base de datos.</p>";
                    break;
                default:
                    desc = "<p>Ocurrió un error desconocido.</p><p>Inténtalo de nuevo más tarde.</p>";
                    break;
            }
            Swal.fire('Error al actualizar la tarea', desc, tipo);
        },
        complete: function() {
            $("#botonActualizar").prop("disabled", false);
        },
    });
});



//eliminar Tarea
$(document).on('click', '.eliminar-tarea', function() {
    var idTarea = $(this).closest('form').find('input[name="id"]').val();
    console.log("ID de la tarea a eliminar (almacenado en el modal):", idTarea);
    // Guarda el ID en un lugar que puedas acceder cuando confirmes la eliminación
    $('#delete').data('id', idTarea);
});

$(document).ready(function() {
    // Captura el clic en el botón de eliminación y abre el modal
    $(document).on('click', '.eliminar-tarea', function() {
        var idTarea = $(this).closest('form').find('input[name="id"]').val();
        console.log("ID de la tarea a eliminar (almacenado en el modal):", idTarea);
        // Almacena el ID de la tarea en el modal
        $('#delete').data('id', idTarea);
        // Abre el modal de confirmación de eliminación
        $('#delete').modal('show');
    });

    // Captura el clic en el botón de confirmación de eliminación
    $(document).on("click", ".eliminar-confirmar", function() {
        console.log("Botón de confirmación de eliminación clickeado.");

        var idTarea = $('#delete').data('id');
        console.log("ID de la tarea a eliminar (enviado por AJAX):", idTarea);

        $.ajax({
            url: "models/eliminarTarea.php",
            type: "POST",
            data: { id: idTarea },
            beforeSend: function() {
                console.log("Enviando solicitud AJAX para eliminar la tarea...");
                console.log("Datos enviados:", { id: idTarea });
            },
            success: function(respuesta) {
                console.log("Respuesta del servidor:", respuesta);
                Swal.fire({
                    title: '¡Perfecto!',
                    text: 'La tarea se ha eliminado correctamente.',
                    icon: 'success'
                }).then(function() {
                    location.reload();
                });
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX:", status, error);
                console.log("Response text: ", xhr.responseText);
                Swal.fire('Error', 'Ocurrió un error inesperado. Inténtalo de nuevo más tarde.', 'error');
            },
            complete: function() {
                console.log("Solicitud AJAX completada.");
                // Habilita nuevamente los botones de eliminar
                $(".eliminar-tarea").prop("disabled", false);
            },
        });

        // Cierra el modal de confirmación de eliminación
        $('#delete').modal('hide');
    });

    // Captura el clic en el botón "No"
    $(document).on("click", ".btn-default", function() {
        console.log("Botón 'No' clickeado, cerrando el modal.");
        $('#delete').modal('hide');
    });
});



// Crear evento
$(document).ready(function() {
    //console.log("Documento listo");

    // Verificar si jQuery está funcionando
    /*if (typeof jQuery !== 'undefined') {
        console.log("jQuery está cargado");
    } else {
        console.log("jQuery no está cargado");
    }*/

    // Delegación de eventos para el botón Crear
    $(document).on("click", "#botonCrear", function() {
        console.log("Botón Crear clickeado");
    });

    // Delegación de eventos para el formulario Crear Tarea
    $(document).on("submit", "#crearEvento", function(e) {
        e.preventDefault();
        console.log("Formulario de crear enviado");

        var formData = new FormData(this);
        formData.forEach(function(value, key) {
            console.log(key + ": " + value);
        });

        $.ajax({
            url: "views/crearEvento.php",
            type: "post",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                console.log("Antes de enviar la solicitud AJAX");
                $("#botonCrear").prop("disabled", true);
            },
            success: function(respuesta) {
                console.log("Respuesta del servidor:", respuesta);
                Swal.fire('¡Perfecto!', 'El evento se ha creado correctamente.', 'success').then(
                    function() {
                        location.reload(); // Recargar la página después de cerrar el modal
                    });
            },
            error: function(xhr, status, error) {
                console.log("Error en la solicitud AJAX:", status, error);
                console.log("Response text:", xhr.responseText);
                let tipo = "error";
                let desc = "";
                switch(xhr.status) {
                    case 400:
                        desc = "Rellena los campos obligatorios.";
                        break;
                    case 500:
                        desc = "Ocurrió un error interno en el servidor. Inténtalo de nuevo más tarde.";
                        break;
                    default:
                        desc = "Ocurrió un error inesperado. Inténtalo de nuevo más tarde.";
                        break;
                }
                Swal.fire('Error al crear el evento', desc, tipo);
            },
            complete: function() {
                console.log("Solicitud AJAX completada");
                $("#botonCrear").prop("disabled", false);
            },
        });
    });
});

// Abrir modal para modificar evento
$(document).on('click', '.editar-evento', function() {
    var button = $(this);
    var eventoId = button.data('id');
    //var form = $(this);
    //var eventoId = form.find('input[name="id"]').val();
    console.log("ID del evento a modificar:", eventoId);
//modificar evento
    console.log("Enviando solicitud AJAX a modificarEvento.php con ID:", eventoId);
    $.ajax({
        url: "views/modificarEvento.php",
        type: "POST",
        data: { id: eventoId },
        success: function(data) {
            console.log("Datos recibidos del servidor:", data);
            $('#modificarEventoModal .modal-content').html(data);
            $('#modificarEventoModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error("Error en solicitud AJAX:", status, error);
        }
    });
});

// Modificar evento
$(document).on('submit', '#modificarEvento', function(e) {
        e.preventDefault();
        console.log("Formulario de modificación de evento enviado.");
        var formData = new FormData(this);
        var eventoId = formData.get("id");
        console.log("ID del evento a modificar: " + eventoId);

        $.ajax({
            url: "models/modificarEventoForm.php",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $("#botonActualizar").prop("disabled", true);
            },
            success: function(respuesta) {
                console.log("Respuesta del servidor:", respuesta);
                Swal.fire('¡Evento Actualizado!', "El evento ha sido actualizado correctamente.", "success").then(
                    function() {
                        location.reload();
                    });
            },
            error: function(xhr) {
                let tipo = "error";
                let desc = "";
                switch(xhr.status) {
                    case 400:
                        desc = "<p>Por favor, completa los campos requeridos.</p>";
                        break;
                    case 404:
                        desc = "<p>El evento no se encontró en la base de datos.</p>";
                        break;
                    case 500:
                        desc = "<p>Error interno del servidor.</p>";
                        break;
                    default:
                        desc = "<p>Ocurrió un error desconocido.</p><p>Inténtalo de nuevo más tarde.</p>";
                        break;
                }
                Swal.fire('Error al actualizar el evento', desc, tipo);
            },
            complete: function() {
                $("#botonActualizar").prop("disabled", false);
            },
        });
    });



//eliminar evento

$(document).ready(function() {
    // Capturar clic en cualquier botón de eliminar evento y abrir el modal
    $(document).on('click', '.eliminar-evento', function() {
        var idEvento = $(this).closest('form').find('input[name="id"]').val();
        console.log("ID del evento a eliminar (almacenado en el modal):", idEvento);
        // Almacena el ID del evento en el modal
        $('#deleteEvento').data('id', idEvento);
        // Abre el modal de confirmación de eliminación
        $('#deleteEvento').modal('show');
    });

    // Manejar confirmación de eliminación en el modal
    $(document).on('click', '.eliminar-confirmar-evento', function() {
        var idEvento = $('#deleteEvento').data('id');
        console.log("ID del evento a eliminar:", idEvento); // Esto debería mostrar el ID correcto

        $.ajax({
            url: "models/eliminarEvento.php",
            type: "post",
            data: { id: idEvento }, // Asegurarse de enviar solo el ID
            beforeSend: function() {
                $(".eliminar-confirmar-evento").prop("disabled", true);
            },
            success: function(respuesta) {
                Swal.fire('¡Perfecto!', 'El evento se ha eliminado correctamente.', 'success').then(function() {
                    location.reload();
                });
            },
            error: function() {
                Swal.fire('Error', 'Ocurrió un error inesperado. Inténtalo de nuevo más tarde.', 'error');
            },
            complete: function() {
                $(".eliminar-confirmar-evento").prop("disabled", false);
            }
        });

        // Cierra el modal de confirmación de eliminación de eventos
        $('#deleteEvento').modal('hide');
    });

    // Manejar clic en el botón "No" para cerrar el modal
    $(document).on("click", ".btn-default", function() {
        console.log("Botón 'No' clickeado, cerrando el modal.");
        $('#deleteEvento').modal('hide');
    });
});


// Crear fecha especial
$(document).ready(function() {
   // console.log("Documento listo");

    // Verificar si jQuery está funcionando
   /* if (typeof jQuery !== 'undefined') {
        console.log("jQuery está cargado");
    } else {
        console.log("jQuery no está cargado");
    }*/

    // Delegación de eventos para el botón Crear
    $(document).on("click", "#botonCrear", function() {
        console.log("Botón Crear clickeado");
    });

    // Delegación de eventos para el formulario Crear Tarea
    $(document).on("submit", "#crearFechaEspecial", function(e) {
        e.preventDefault();
        console.log("Formulario de crear enviado");

        var formData = new FormData(this);
        formData.forEach(function(value, key) {
            console.log(key + ": " + value);
        });

        $.ajax({
            url: "views/crearFechaEspecial.php",
            type: "post",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                console.log("Antes de enviar la solicitud AJAX");
                $("#botonCrear").prop("disabled", true);
            },
            success: function(respuesta) {
                console.log("Respuesta del servidor:", respuesta);
                Swal.fire('¡Perfecto!', 'La fecha Especial se ha creado correctamente.', 'success').then(
                    function() {
                        location.reload(); 
                    });
            },
            error: function(xhr, status, error) {
                console.log("Error en la solicitud AJAX:", status, error);
                console.log("Response text:", xhr.responseText);
                let tipo = "error";
                let desc = "";
                switch(xhr.status) {
                    case 400:
                        desc = "Rellena los campos obligatorios.";
                        break;
                    case 500:
                        desc = "Ocurrió un error interno en el servidor. Inténtalo de nuevo más tarde.";
                        break;
                    default:
                        desc = "Ocurrió un error inesperado. Inténtalo de nuevo más tarde.";
                        break;
                }
                Swal.fire('Error al crear la Fecha Especial', desc, tipo);
            },
            complete: function() {
                console.log("Solicitud AJAX completada");
                $("#botonCrear").prop("disabled", false);
            },
        });
    });
});

// Abrir modal para modificar fecha especial
$(document).on('click', '.editar-fecha-especial', function() {
    var button = $(this);
    var fechaEspecialId = button.data('id');
    console.log("ID de la fecha especial a modificar:", fechaEspecialId);

    $.ajax({
        url: "views/modificarFechaEspecial.php",
        type: "POST",
        data: { id: fechaEspecialId },
        success: function(data) {
            $('#modificarFechaEspecialModal .modal-content').html(data);
            $('#modificarFechaEspecialModal').modal('show');
        },
        error: function(xhr, status, error) {
            console.error("Error en solicitud AJAX:", status, error);
        }
    });
});

// Modificar fecha especial
$(document).on('submit', '#modificarFechaEspecial', function(e) {
  
        e.preventDefault();
        console.log("Formulario de modificación de fecha especial enviado.");
        var formData = new FormData(this);

        $.ajax({
            url: "models/modificarFechaEspecialForm.php",
            type: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $("#botonActualizar").prop("disabled", true);
            },
            success: function(respuesta) {
                console.log("Respuesta del servidor:", respuesta);
                Swal.fire('¡Fecha Especial Actualizada!', "La fecha especial ha sido actualizada correctamente.", "success").then(
                    function() {
                        location.reload();
                    });
            },
            error: function(xhr) {
                let tipo = "error";
                let desc = "";
                switch(xhr.status) {
                    case 400:
                        desc = "<p>Por favor, completa los campos requeridos.</p>";
                        break;
                    case 404:
                        desc = "<p>La fecha especial no se encontró en la base de datos.</p>";
                        break;
                    case 500:
                        desc = "<p>Error interno del servidor.</p>";
                        break;
                    default:
                        desc = "<p>Ocurrió un error desconocido.</p><p>Inténtalo de nuevo más tarde.</p>";
                        break;
                }
                Swal.fire('Error al actualizar la fecha especial', desc, tipo);
            },
            complete: function() {
                $("#botonActualizar").prop("disabled", false);
            },
        });
    });


// Eliminar fecha especial

$(document).ready(function() {
    // Capturar clic en cualquier botón de eliminar evento y abrir el modal
    $(document).on('click', '.eliminarFechaEspecial', function() {
        var idFechaE = $(this).closest('form').find('input[name="id"]').val();
        console.log("ID del evento a eliminar (almacenado en el modal):", idFechaE);
        // Almacena el ID del evento en el modal
        $('#deleteFechaEspecial').data('id', idFechaE);
        // Abre el modal de confirmación de eliminación
        $('#deleteFechaEspecial').modal('show');
    });

    // Manejar confirmación de eliminación en el modal
    $(document).on('click', '.eliminar-confirmar-fecha-especial', function() {
        var idFechaE = $('#deleteFechaEspecial').data('id');
        console.log("ID del evento a eliminar:", idFechaE); // Esto debería mostrar el ID correcto

        $.ajax({
            url: "models/eliminarFechaEspecial.php",
            type: "post",
            data: { id: idFechaE }, // Asegurarse de enviar solo el ID
            beforeSend: function() {
                $(".eliminar-confirmar-evento").prop("disabled", true);
            },
            success: function(respuesta) {
                Swal.fire('¡Perfecto!', 'La Fecha Especial se ha eliminado correctamente.', 'success').then(function() {
                    location.reload();
                });
            },
            error: function() {
                Swal.fire('Error', 'Ocurrió un error inesperado. Inténtalo de nuevo más tarde.', 'error');
            },
            complete: function() {
                $(".eliminar-confirmar-fecha-especial").prop("disabled", false);
            }
        });

        // Cierra el modal de confirmación de eliminación de eventos
        $('#deleteFechaEspecial').modal('hide');
    });

    // Manejar clic en el botón "No" para cerrar el modal
    $(document).on("click", ".btn-default", function() {
        console.log("Botón 'No' clickeado, cerrando el modal.");
        $('#deleteFechaEspecial').modal('hide');
    });
});

// Crear habito
$(document).ready(function() {
    //console.log("Documento listo");

    // Verificar si jQuery está funcionando
    /*if (typeof jQuery !== 'undefined') {
        console.log("jQuery está cargado");
    } else {
        console.log("jQuery no está cargado");
    }*/

    // Delegación de eventos para el botón Crear
    $(document).on("click", "#botonCrear", function() {
        console.log("Botón Crear clickeado");
    });

    // Delegación de eventos para el formulario Crear Tarea
    $(document).on("submit", "#crearHabito", function(e) {
        e.preventDefault();
        console.log("Formulario de crear enviado");

        var formData = new FormData(this);
        formData.forEach(function(value, key) {
            console.log(key + ": " + value);
        });

        $.ajax({
            url: "views/crearHabito.php",
            type: "post",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                console.log("Antes de enviar la solicitud AJAX");
                $("#botonCrear").prop("disabled", true);
            },
            success: function(respuesta) {
                console.log("Respuesta del servidor:", respuesta);
                Swal.fire('¡Perfecto!', 'El hábito se ha creado correctamente.', 'success').then(
                    function() {
                        location.reload(); 
                    });
            },
            error: function(xhr, status, error) {
                console.log("Error en la solicitud AJAX:", status, error);
                console.log("Response text:", xhr.responseText);
                let tipo = "error";
                let desc = "";
                switch(xhr.status) {
                    case 400:
                        desc = "Rellena los campos obligatorios.";
                        break;
                    case 500:
                        desc = "Ocurrió un error interno en el servidor. Inténtalo de nuevo más tarde.";
                        break;
                    default:
                        desc = "Ocurrió un error inesperado. Inténtalo de nuevo más tarde.";
                        break;
                }
                Swal.fire('Error al crear el evento', desc, tipo);
            },
            complete: function() {
                console.log("Solicitud AJAX completada");
                $("#botonCrear").prop("disabled", false);
            },
        });
    });
});

//guardar Habitos de la seleccion
$(document).on("submit", "#form-habitos", function(e) {
    e.preventDefault();
    console.log("Formulario de hábitos enviado");

    var formData = new FormData(this);
    var hasHabitos = false;
    formData.forEach(function(value, key) {
        console.log(key + ": " + value);
        if (key === 'habitos_seleccionados[]') {
            hasHabitos = true;
        }
    });

    if (!hasHabitos) {
        console.log("No se han seleccionado hábitos.");
    }

    $.ajax({
        url: "models/procesarSeleccionHabitos.php",
        type: "post",
        data: formData,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            console.log("Antes de enviar la solicitud AJAX");
            $("#btnGuardar").prop("disabled", true);
        },
        success: function(respuesta) {
            console.log("Respuesta del servidor: ", respuesta);
            Swal.fire('¡Perfecto!', 'Los hábitos se han guardado correctamente.', 'success').then(function() {
                location.reload();
            });
        },
        error: function(xhr, status, error) {
            console.log("Error en la solicitud AJAX");
            console.log("Estado: ", status);
            console.log("Error: ", error);
            Swal.fire('Error', 'Error al guardar los hábitos.', 'error');
        },
        complete: function() {
            console.log("Solicitud AJAX completada");
            $("#btnGuardar").prop("disabled", false);
        },
    });
});


//Guardar habitos
$(document).ready(function() {
    /*console.log("Documento listo");

    // Verificar si jQuery está funcionando
    if (typeof jQuery !== 'undefined') {
        console.log("jQuery está cargado");
    } else {
        console.log("jQuery no está cargado");
    }*/

    // Delegación de eventos para el botón Guardar
    $(document).on("click", "#guardar_historial", function() {
        console.log("Botón Guardar clickeado");
    });

    // Delegación de eventos para el formulario Historial de Hábitos
    $(document).on("submit", "#historial-habitos", function(e) {
        e.preventDefault();
        console.log("Formulario de historial enviado");

        var formData = $(this).serializeArray();
        formData.forEach(function(item) {
            console.log(item.name + ": " + item.value);
        });

        $.ajax({
            url: "models/historialHabitos.php",
            type: "POST",
            data: formData,
            beforeSend: function() {
                console.log("Antes de enviar la solicitud AJAX");
                $("#guardar_historial").prop("disabled", true);
            },
            success: function(respuesta) {
                console.log("Respuesta del servidor:", respuesta);
                Swal.fire('¡Perfecto!', 'El historial de hábitos se ha guardado correctamente.', 'success').then(function() {
                    location.reload();
                });
            },
            error: function(xhr, status, error) {
                console.log("Error en la solicitud AJAX:", status, error);
                console.log("Response text:", xhr.responseText);
                Swal.fire('Error', 'Hubo un problema al guardar el historial de hábitos.', 'error');
            },
            complete: function() {
                console.log("Solicitud AJAX completada");
                $("#guardar_historial").prop("disabled", false);
            }
        });
    });
});

 //Eliminar habito
 $(document).ready(function() {
    //console.log("Documento listo");

    // Capturar clic en cualquier botón de eliminar hábito y abrir el modal
    $(document).on('click', '.eliminar-habito', function() {
        var habitoId = $(this).closest('form').find('input[name="id"]').val();
        console.log("ID del hábito a eliminar (almacenado en el modal):", habitoId);
        $('#deleteHabitoModal').data('id', habitoId);
        $('#deleteHabitoModal').modal('show');
    });

    // Manejar confirmación de eliminación en el modal
    $(document).on('click', '.eliminar-confirmar-habito', function() {
        var habitoId = $('#deleteHabitoModal').data('id');
        console.log("ID del hábito a eliminar:", habitoId);

        $.ajax({
            url: "models/eliminarHabito.php",
            type: "POST",
            data: { id: habitoId },
            beforeSend: function() {
                $(".eliminar-confirmar-habito").prop("disabled", true);
            },
            success: function(respuesta) {
                console.log("Respuesta del servidor:", respuesta); // Añadir mensaje de depuración
                if (respuesta.includes("Hábito marcado como inactivo correctamente")) {
                    Swal.fire('¡Perfecto!', 'El hábito se ha eliminado correctamente.', 'success').then(function() {
                        $("#fila_" + habitoId).remove();
                    });
                } else {
                    Swal.fire('Error', 'Hubo un problema al eliminar el hábito.', 'error');
                }
            },
            error: function(xhr, status, error) {
                console.log("Error en la solicitud AJAX:", status, error); // Añadir mensaje de depuración
                Swal.fire('Error', 'Ocurrió un error inesperado. Inténtalo de nuevo más tarde.', 'error');
            },
            complete: function() {
                $(".eliminar-confirmar-habito").prop("disabled", false);
            }
        });

        $('#deleteHabitoModal').modal('hide');
    });

    // Manejar clic en el botón "No" para cerrar el modal
    $(document).on("click", ".btn-default", function() {
        console.log("Botón 'No' clickeado, cerrando el modal.");
        $('#deleteHabitoModal').modal('hide');
    });
});

//habitos Tracker
$(document).ready(function() {
    //console.log("Documento listo y cargando...");

    // Inicializa los campos de fecha con el `datepicker`
    $(document).on('focus', "#fechaInicioHabito, #fechaFinHabito", function() {
        console.log("Inicializando datepicker en", this.id);
        $(this).datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
        });
    });

    //console.log("Calendarios inicializados...");

    // Controlar intervalos predefinidos usando delegación de eventos
    $(document).on('change', "#intervalosHabito", function() {
       // console.log("Cambiando intervalo...");
        var intervalo = $(this).val();
        var hoy = new Date();
        var inicio = new Date();

        switch(intervalo) {
            case "ultima_semana":
                inicio.setDate(hoy.getDate() - 7);
                break;
            case "ultimo_mes":
                inicio.setMonth(hoy.getMonth() - 1);
                break;
            case "ultimo_anio":
                inicio.setFullYear(hoy.getFullYear() - 1);
                break;
        }

        console.log("Estableciendo fechas: Inicio -> " + $.datepicker.formatDate('yy-mm-dd', inicio) + " | Fin -> " + $.datepicker.formatDate('yy-mm-dd', hoy));
        $("#fechaInicioHabito").val($.datepicker.formatDate('yy-mm-dd', inicio));
        $("#fechaFinHabito").val($.datepicker.formatDate('yy-mm-dd', hoy));
    });

    //console.log("Evento de cambio de intervalo configurado...");

    // Manejar el envío del formulario
    $(document).on('submit', "#form-intervalo-habito", function(e) {
        console.log("Evento submit capturado...");
        e.preventDefault(); // Evitar el envío normal del formulario

        console.log("Formulario enviado, manejando con AJAX...");

        var fechaInicio = $("#fechaInicioHabito").val();
        var fechaFin = $("#fechaFinHabito").val();

        console.log("Enviando solicitud AJAX...");
        console.log("Fecha Inicio: ", fechaInicio);
        console.log("Fecha Fin: ", fechaFin);

        $.ajax({
            url: 'models/procesarHabitosTracker.php',
            type: 'POST',
            data: {
                fechaInicio: fechaInicio,
                fechaFin: fechaFin
            },
            success: function(response) {
                console.log("Respuesta del servidor: ", response);

                // Inserta el contenido en el div
                $("#bloqueIntervalo").addClass("d-none");
                $("#historialHabitos").html(response);
                
                // Agrega un mensaje de depuración para verificar la inserción
                console.log("Contenido insertado en #historialHabitos");
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX: ", status, error);
                $("#historialHabitos").html("<p class='error'>Hubo un problema al obtener los datos. Por favor, inténtalo de nuevo.</p>");
            }
        });

        console.log("Solicitud AJAX enviada...");
    });

    //console.log("Manejo de envío de formulario configurado...");
});



// guardar estado de animo
$(document).ready(function(){
    //console.log("Document de mood cargado");

    $(document).on('submit', '#moodTracker', function(e) {
        console.log("Formulario moodTracker submit");

        e.preventDefault();
        // Obtiene los datos del formulario
        var formData = $(this).serialize();
        console.log("Datos del formulario:", formData);
        $.ajax({
            type: 'POST',
            url: 'models/procesarMood.php', 
            data: formData, 
            success: function(response){
                console.log(response);
                Swal.fire('¡Perfecto!', 'Tu estado de ánimo se ha guardado correctamente.', 'success').then(function() {
                    console.log("Recargando la página");
                    location.reload();
                });
            },
            error: function(xhr, status, error){
                console.error("Error en la solicitud AJAX:", error);
                Swal.fire('Error', 'Ocurrió un error inesperado. Inténtalo de nuevo más tarde.', 'error');
            }
            // No es necesario completar ninguna acción específica aquí
        });
    });
});


//Mood Tracker
/*$(document).ready(function() {
    console.log("Documento listo y cargando...");

    // Verificar IDs de elementos HTML
    console.log("Verificando IDs de elementos HTML...");
    console.log("Intervalo de fechas:", $("#bloqueIntervaloMood").attr("id"));
    console.log("Selector de intervalos:", $("#intervalosMood").attr("id"));
    console.log("Fecha de inicio:", $("#fechaInicioMood").attr("id"));
    console.log("Fecha de fin:", $("#fechaFinMood").attr("id"));
    console.log("Contenedor de historial:", $("#historialMood").attr("id"));

    // Inicializa los campos de fecha con el `datepicker`
    $(document).on('focus', "#fechaInicioMood, #fechaFinMood", function() {
        console.log("Inicializando datepicker en", this.id);
        $(this).datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
        });
    });

    // Controlar intervalos predefinidos usando delegación de eventos
    $(document).on('change', "#intervalosMood", function() {
        console.log("Cambiando intervalo...");
        var intervalo = $(this).val();
        var hoy = new Date();
        var inicio = new Date();

        switch(intervalo) {
            case "ultima_semana":
                inicio.setDate(hoy.getDate() - 7);
                break;
            case "ultimo_mes":
                inicio.setMonth(hoy.getMonth() - 1);
                break;
            case "ultimo_anio":
                inicio.setFullYear(hoy.getFullYear() - 1);
                break;
        }

        console.log("Estableciendo fechas: Inicio -> " + $.datepicker.formatDate('yy-mm-dd', inicio) + " | Fin -> " + $.datepicker.formatDate('yy-mm-dd', hoy));
        $("#fechaInicioMood").val($.datepicker.formatDate('yy-mm-dd', inicio));
        $("#fechaFinMood").val($.datepicker.formatDate('yy-mm-dd', hoy));
    });

    // Manejar el envío del formulario
    $(document).on('submit', "#form-intervalo-mood", function(e) {
        console.log("Evento submit capturado...");
        e.preventDefault(); // Evitar el envío normal del formulario

        console.log("Formulario enviado, manejando con AJAX...");

        var fechaInicio = $("#fechaInicioMood").val();
        var fechaFin = $("#fechaFinMood").val();

        console.log("Enviando solicitud AJAX...");
        console.log("Fecha Inicio: ", fechaInicio);
        console.log("Fecha Fin: ", fechaFin);

        $.ajax({
            url: 'models/procesarHistoricoMood.php',
            type: 'POST',
            data: {
                fechaInicio: fechaInicio,
                fechaFin: fechaFin
            },
            success: function(response) {
                console.log("Respuesta del servidor: ", response);

                // Verificar si el contenido se está insertando correctamente
                if (response.trim() === "") {
                    console.error("La respuesta del servidor está vacía.");
                } else {
                    console.log("Contenido recibido, insertando en #historialMood.");
                    $("#bloqueIntervaloMood").addClass("d-none");
                    $("#historialMood").html(response);

                    // Esperar un poco para asegurar que el DOM se actualiza
                    setTimeout(function() {
                        console.log("Contenido después de la inserción:", $("#historialMood").html());
                        $("#historialMood").removeClass("d-none"); // Asegurarse de que el div sea visible
                    }, 1000);

                    console.log("Contenido insertado en #historialMood.");
                }
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX: ", status, error);
                $("#historialMood").html("<p class='error'>Hubo un problema al obtener los datos. Por favor, inténtalo de nuevo.</p>");
            }
        });

        console.log("Solicitud AJAX enviada...");
    });
});*/


$(document).ready(function() {
    //console.log("Documento listo y cargando...");

    // Verificar IDs de elementos HTML
    /*console.log("Verificando IDs de elementos HTML...");
    console.log("Intervalo de fechas:", $("#bloqueIntervaloMood").attr("id"));
    console.log("Selector de intervalos:", $("#intervalosMood").attr("id"));
    console.log("Fecha de inicio:", $("#fechaInicioMood").attr("id"));
    console.log("Fecha de fin:", $("#fechaFinMood").attr("id"));
    console.log("Contenedor de historial:", $("#historialMood").attr("id"));*/

    // Inicializa los campos de fecha con el `datepicker`
    $(document).on('focus', "#fechaInicioMood, #fechaFinMood", function() {
        //console.log("Inicializando datepicker en", this.id);
        $(this).datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
        });
    });

    // Controlar intervalos predefinidos usando delegación de eventos
    $(document).on('change', "#intervalosMood", function() {
        console.log("Cambiando intervalo...");
        var intervalo = $(this).val();
        var hoy = new Date();
        var inicio = new Date();

        switch(intervalo) {
            case "ultima_semana":
                inicio.setDate(hoy.getDate() - 7);
                break;
            case "ultimo_mes":
                inicio.setMonth(hoy.getMonth() - 1);
                break;
            case "ultimo_anio":
                inicio.setFullYear(hoy.getFullYear() - 1);
                break;
        }

        //console.log("Estableciendo fechas: Inicio -> " + $.datepicker.formatDate('yy-mm-dd', inicio) + " | Fin -> " + $.datepicker.formatDate('yy-mm-dd', hoy));
        $("#fechaInicioMood").val($.datepicker.formatDate('yy-mm-dd', inicio));
        $("#fechaFinMood").val($.datepicker.formatDate('yy-mm-dd', hoy));
    });

    // Manejar el envío del formulario
    $(document).on('submit', "#form-intervalo-mood", function(e) {
        //console.log("Evento submit capturado...");
        e.preventDefault(); // Evitar el envío normal del formulario

        //console.log("Formulario enviado, manejando con AJAX...");

        var fechaInicio = $("#fechaInicioMood").val();
        var fechaFin = $("#fechaFinMood").val();

        //console.log("Enviando solicitud AJAX...");
        //console.log("Fecha Inicio: ", fechaInicio);
        //console.log("Fecha Fin: ", fechaFin);

        $.ajax({
            url: 'models/procesarHistoricoMood.php',
            type: 'POST',
            data: {
                fechaInicio: fechaInicio,
                fechaFin: fechaFin
            },
            success: function(response) {
                console.log("Respuesta del servidor: ", response);

                // Verificar si el contenido se está insertando correctamente
                if (response.trim() === "") {
                    console.error("La respuesta del servidor está vacía.");
                } else {
                    console.log("Contenido recibido, insertando en #historialMood.");
                    $("#bloqueIntervaloMood").addClass("d-none");
                    $("#historialMood").html(response);

                    // Esperar un poco para asegurar que el DOM se actualiza
                    setTimeout(function() {
                       // console.log("Contenido después de la inserción:", $("#historialMood").html());
                        $("#historialMood").removeClass("d-none"); // Asegurarse de que el div sea visible

                        // Ejecutar el script de la gráfica después de la inserción
                        if (document.getElementById('moodChart')) {
                            inicializarGrafica();
                        } else {
                            console.error("Elemento moodChart no encontrado en el DOM.");
                        }
                    }, 500); // Ajusta este tiempo según sea necesario

                    console.log("Contenido insertado en #historialMood.");
                }
            },
            error: function(xhr, status, error) {
                console.error("Error en la solicitud AJAX: ", status, error);
                $("#historialMood").html("<p class='error'>Hubo un problema al obtener los datos. Por favor, inténtalo de nuevo.</p>");
            }
        });

        //console.log("Solicitud AJAX enviada...");
    });

    function inicializarGrafica() {
        // Verificar si el elemento moodChart está disponible en el DOM
        var ctx = document.getElementById('moodChart').getContext('2d');
        var moodChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Feliz','Entusiasta','Estresado','Agradecido','Motivado'],
                datasets: [{
                    data: [3,2,1,1,2],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.label || '';
                                if (label) {
                                    label += ': ';
                                }
                                label += context.raw;
                                return label;
                            }
                        }
                    }
                },
                animation: {
                    animateScale: true,
                    animateRotate: true
                }
            }
        });
    }
});

//formulario de contacto
$(document).ready(function() {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault(); // Previene el envío normal del formulario

        $.ajax({
            type: 'POST',
            url: 'models/contact.php',
            data: $(this).serialize(),
            beforeSend: function() {
                $('button[type="submit"]').prop('disabled', true);
            },
            success: function(response) {
                Swal.fire('¡Perfecto!','Tu mensaje se ha enviado correctamente.', response, 'success').then(function() {
                    $('#contactModal').modal('hide');
                    $('#contactForm')[0].reset(); // Resetea el formulario
                });
            },
            error: function() {
                Swal.fire('Error', 'Ocurrió un error inesperado. Inténtalo de nuevo más tarde.', 'error');
            },
            complete: function() {
                $('button[type="submit"]').prop('disabled', false);
            }
        });
    });
});