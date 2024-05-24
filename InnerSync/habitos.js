document.addEventListener('DOMContentLoaded', function() {
    let checkboxes = document.querySelectorAll('input[type="checkbox"]');
    
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener('change', function() {
            // Obtener el ID del hábito y el día desde el nombre del checkbox
            let parts = this.name.split('_');
            let habito_id = parts[1];
            let dia = parts[3];

            // Obtener todos los checkboxes para el mismo día y hábito
            let checkboxes_habito_dia = document.querySelectorAll('input[type="checkbox"][name="habito_' + habito_id + '_dia_' + dia + '"]');

            // Marcar o desmarcar todos los checkboxes del mismo día y hábito
            checkboxes_habito_dia.forEach(function(checkbox_habito_dia) {
                checkbox_habito_dia.checked = checkbox.checked;
            });
        });
    });
});
