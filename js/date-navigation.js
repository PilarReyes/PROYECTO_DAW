// Inicializa la fecha que se mostrará, por defecto es la fecha actual
let displayDate = new Date();

// Función para actualizar la visualización de la fecha en la página en español
function updateDateDisplay() {
    // Obtiene la fecha en formato largo en español
    const formattedDate = displayDate.toLocaleDateString('es-ES', {
        weekday: 'long', // día de la semana en formato largo
        day: 'numeric', // día del mes
        month: 'long', // mes en formato largo
        year: 'numeric' // año en formato numérico
    });

    // Actualiza el contenido del elemento con id 'current-date' con la fecha formateada
    document.getElementById('current-date').textContent = formattedDate.charAt(0).toUpperCase() + formattedDate.slice(1);
}

// Función para mover la fecha mostrada al día anterior
function previousDay() {
    displayDate.setDate(displayDate.getDate() - 1); // Resta un día a la fecha actual
    updateDateDisplay(); // Actualiza la visualización de la fecha
}

// Función para mover la fecha mostrada al día siguiente
function nextDay() {
    displayDate.setDate(displayDate.getDate() + 1); // Añade un día a la fecha actual
    updateDateDisplay(); // Actualiza la visualización de la fecha
}

// Añade un listener para cuando se carga el contenido del DOM
document.addEventListener('DOMContentLoaded', function() {
    updateDateDisplay(); // Llama a actualizar la visualización de la fecha cuando la página se carga
});
