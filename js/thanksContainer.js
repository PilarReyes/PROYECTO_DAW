function addNewItem(containerId, placeholderText) {
    console.log("Función invocada con containerId:", containerId); // Esto mostrará el ID utilizado.
    var container = document.getElementById(containerId);
    console.log("Container:", container); // Esto debe mostrar el elemento del DOM, no null.
    
    if(container.getElementsByTagName('input').length === 0) {
        var newItemInput = document.createElement('input');
        newItemInput.type = 'text';
        newItemInput.placeholder = placeholderText;
        newItemInput.className = 'new-item-input';
        container.appendChild(newItemInput);
        newItemInput.focus(); // Pone el foco en el nuevo elemento input.
    } else {
        console.log("Ya existe un input en este contenedor."); // Esto indicará si ya hay un input.
    }
}
