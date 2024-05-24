$(document).ready(function() {
    console.log("Documento listo y cargando...");

    // Inicializa los campos de fecha con el `datepicker`
    // Asegúrate de inicializar de nuevo si cargas dinámicamente
    $(document).on('focus', "#fechaInicio, #fechaFin", function() {
        $(this).datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true
        });
    });

    console.log("Calendarios inicializados...");

    // Controlar intervalos predefinidos usando delegación de eventos
    $(document).on('change', "#intervalos", function() {
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
        $("#fechaInicio").val($.datepicker.formatDate('yy-mm-dd', inicio));
        $("#fechaFin").val($.datepicker.formatDate('yy-mm-dd', hoy));
    });
});
