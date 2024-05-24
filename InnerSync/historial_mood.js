// Define la función para mostrar datos por semana
function mostrarSemana() {
    mostrarDatos('semana');
}

// Define la función para mostrar datos por mes
function mostrarMes() {
    mostrarDatos('mes');
}

function mostrarDatos(intervalo) {
    // Crear un objeto XMLHttpRequest
    let xhttp = new XMLHttpRequest();
    
    // Definir la función de devolución de llamada
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            // Convertir la respuesta JSON en un objeto JavaScript
            let datos = JSON.parse(this.responseText);
            
            // Construir la tabla HTML con los datos obtenidos
            let tablaHTML = "<table>";
            tablaHTML += "<thead><tr><th>Fecha</th><th>Estado de Ánimo</th></tr></thead>";
            tablaHTML += "<tbody>";
            datos.forEach(function(dato) {
                tablaHTML += "<tr>";
                tablaHTML += "<td>" + dato.fecha + "</td>";
                tablaHTML += "<td>" + dato.estado_animo + "</td>";
                tablaHTML += "</tr>";
            });
            tablaHTML += "</tbody>";
            tablaHTML += "</table>";
            
            // Mostrar la tabla en el elemento con el ID "tabla"
            document.getElementById("tabla").innerHTML = tablaHTML;
        }
    };
    
    // Abrir una solicitud GET al servidor para obtener los datos
    xhttp.open("GET", "obtener_datos.php?intervalo=" + intervalo, true);
    xhttp.send();
}
