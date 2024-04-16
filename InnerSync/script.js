function showContent(contentId) {
    // Oculta todos los contenidos
    var contents = document.getElementsByClassName('content');
    for (var i = 0; i < contents.length; i++) {
        contents[i].style.display = 'none';
    }
    
    // Muestra el contenido correspondiente al ID pasado
    document.getElementById(contentId).style.display = 'block';
}
