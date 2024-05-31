//console.log('Archivo calendar.js cargado'); // Confirmar carga

document.addEventListener('DOMContentLoaded', function() {
    //console.log('DOM completamente cargado y parseado');

    var calendarEl = document.getElementById('calendar');
    if (!calendarEl) {
        console.error('Elemento #calendar no encontrado');
        return;
    }

    //console.log('Elemento #calendar encontrado');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        events: function(fetchInfo, successCallback, failureCallback) {
            //console.log('Llamando a fetch para obtener los eventos');
            fetch('models/datos.php')
                .then(response => {
                    console.log('Respuesta de fetch recibida');
                    if (!response.ok) {
                        console.error('Network response was not ok:', response.statusText);
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    //console.log('Datos recibidos:', data);
                    // Mapeamos los datos para que FullCalendar pueda interpretarlos correctamente
                    const eventos = data.map(evento => {
                        return {
                            id: evento.id,
                            title: evento.nombre || evento.titulo,
                            start: evento.fecha_inicio || evento.fecha,
                            end: evento.fecha_fin && evento.fecha_fin !== '0000-00-00 00:00:00' ? evento.fecha_fin : null,
                            description: evento.descripcion || '',
                            location: evento.ubicacion || ''
                        };
                    });
                    //console.log('Eventos mapeados:', eventos); // Verificar los eventos mapeados
                    successCallback(eventos);
                })
                .catch(error => {
                    console.error('Error al obtener los datos:', error);
                    failureCallback(error);
                });
        },
        editable: true,
        selectable: true,
        eventDidMount: function(info) {
            //console.log('Evento añadido al calendario:', info.event);
        }
    });

    calendar.render();
    //console.log('Calendario renderizado');
});

