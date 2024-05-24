// weather.js
document.addEventListener('DOMContentLoaded', () => {
    fetch('https://api.openweathermap.org/data/2.5/weather?q=Torrevieja&appid=e004fd2662250e38146f5373296fa949')
      .then(response => response.json())
      .then(data => {
        // Aquí procesas y muestras los datos del clima
        console.log(data);
        // Por ejemplo, mostrar la temperatura:
        const temperature = data.main.temp;
        // Convierte la temperatura de Kelvin a Celsius (la API devuelve la temperatura en Kelvin por defecto)
        const temperatureCelsius = temperature - 273.15;
        // Ahora podrías, por ejemplo, añadir esta temperatura a tu HTML:
        document.getElementById('weather-container').innerText = `Temperatura en Torrevieja: ${temperatureCelsius.toFixed(2)}°C`;
      })
      .catch(error => console.error('Error:', error));
  });
  