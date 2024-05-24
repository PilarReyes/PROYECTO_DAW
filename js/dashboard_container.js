document.addEventListener("DOMContentLoaded", function () {
    // Obtener referencia al contenedor del calendario
    var calendarContainer = document.querySelector('#calendar');

    // Obtener referencia a todos los enlaces del menú
    var menuLinks = document.querySelectorAll('#menu a');

    // Agregar evento clic a cada enlace del menú
    menuLinks.forEach(function (link) {
        link.addEventListener('click', function (event) {
            // Prevenir el comportamiento predeterminado del enlace
            event.preventDefault();

            // Obtener la URL del enlace
            var url = this.getAttribute('href');

            // Realizar una solicitud AJAX para cargar el contenido de la URL
            var xhr = new XMLHttpRequest();
            xhr.open('GET', url, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        // Colocar el contenido en el contenedor del calendario
                        calendarContainer.innerHTML = xhr.responseText;
                    } else {
                        // Manejar los errores, por ejemplo, mostrar un mensaje de error
                        calendarContainer.innerHTML = `<p>Error al cargar el contenido. Código de estado: ${xhr.status}</p>`;
                    }
                }
            };
            xhr.onerror = function () {
                // Manejar errores de red
                calendarContainer.innerHTML = '<p>Error de conexión o solicitud fallida.</p>';
            };
            xhr.send();
        });
    });
});
