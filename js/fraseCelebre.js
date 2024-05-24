// Llamada a la API de la Frase del Día
fetch('https://frasedeldia.azurewebsites.net/api/phrase')
.then(response => {
    if (response.ok) {
        return response.json();
    } else {
        throw new Error('No fue posible obtener la frase del día');
    }
})
.then(data => {
    // Mostrar la frase y el autor en el elemento HTML
    const quoteElement = document.getElementById('inspirational-quote');
    quoteElement.textContent = `"${data.phrase}" — ${data.author}`;
})
.catch(error => {
    console.error('Error al obtener la frase del día:', error);
    document.getElementById('inspirational-quote').textContent = "Frase del día no disponible";
});

