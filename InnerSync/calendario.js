document.addEventListener('DOMContentLoaded', function () {
    const btnMensual = document.getElementById('btnMensual');
    const btnSemanal = document.getElementById('btnSemanal');
    const btnAnterior = document.getElementById('btnAnterior');
    const btnSiguiente = document.getElementById('btnSiguiente');
    const calendario = document.getElementById('calendario');
    let fechaActual = new Date();

    mostrarVistaMensual();

    // Eventos de clic para cambiar entre vistas
    btnMensual.addEventListener('click', mostrarVistaMensual);
    btnSemanal.addEventListener('click', mostrarVistaSemanal);
    btnAnterior.addEventListener('click', mostrarMesAnterior);
    btnSiguiente.addEventListener('click', mostrarMesSiguiente);

    function mostrarVistaMensual() {
        let mes = fechaActual.getMonth();
        let año = fechaActual.getFullYear();

        mostrarCalendarioMensual(mes, año);
    }

    function mostrarVistaSemanal() {
        let diaSemanaActual = fechaActual.getDay();
        let primerDiaSemana = new Date(fechaActual);
        primerDiaSemana.setDate(primerDiaSemana.getDate() - diaSemanaActual + 1);
        let ultimoDiaSemana = new Date(fechaActual);
        ultimoDiaSemana.setDate(ultimoDiaSemana.getDate() + (7 - diaSemanaActual));

        let htmlCalendario = '<table>';
        htmlCalendario += '<caption>Semana del ' + primerDiaSemana.getDate() + ' al ' + ultimoDiaSemana.getDate() + '</caption>';
        htmlCalendario += '<tr><th>Domingo</th><th>Lunes</th><th>Martes</th><th>Miércoles</th><th>Jueves</th><th>Viernes</th><th>Sábado</th></tr>';
        htmlCalendario += '<tr>';

        let dia = new Date(primerDiaSemana);
        for (let i = 0; i < 7; i++) {
            htmlCalendario += '<td>' + dia.getDate() + '</td>';
            dia.setDate(dia.getDate() + 1);
        }

        htmlCalendario += '</tr>';
        htmlCalendario += '</table>';

        calendario.innerHTML = htmlCalendario;
    }

    function mostrarMesAnterior() {
        fechaActual.setMonth(fechaActual.getMonth() - 1);
        mostrarVistaMensual();
    }

    function mostrarMesSiguiente() {
        fechaActual.setMonth(fechaActual.getMonth() + 1);
        mostrarVistaMensual();
    }

    function mostrarCalendarioMensual(mes, año) {
        let primerDia = new Date(año, mes, 1);
        let ultimoDia = new Date(año, mes + 1, 0);
        let numDiasMes = ultimoDia.getDate();
        let primerDiaSemana = primerDia.getDay();

        let htmlCalendario = '<table>';
        htmlCalendario += '<caption>' + obtenerNombreMes(mes) + ' ' + año + '</caption>';
        htmlCalendario += '<tr><th>Domingo</th><th>Lunes</th><th>Martes</th><th>Miércoles</th><th>Jueves</th><th>Viernes</th><th>Sábado</th></tr>';

        let dia = 1;
        for (let i = 0; i < 6; i++) {
            htmlCalendario += '<tr>';
            for (let j = 0; j < 7; j++) {
                if ((i === 0 && j < primerDiaSemana) || dia > numDiasMes) {
                    htmlCalendario += '<td></td>';
                } else {
                    htmlCalendario += '<td>' + dia + '</td>';
                    dia++;
                }
            }
            htmlCalendario += '</tr>';
            if (dia > numDiasMes) {
                break;
            }
        }

        htmlCalendario += '</table>';
        calendario.innerHTML = htmlCalendario;
    }

    function obtenerNombreMes(mes) {
        let nombresMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        return nombresMeses[mes];
    }
});
