import React, { useState } from 'react';
import { RegistroForm } from './Components/Login/Registro/RegistroForm';

function App() {
  const [mostrarForm, setMostrarForm] = useState(false);

  return (
    <div className="app-container">
      <header>
        <h1>Mi Bullet Journal Digital</h1>
      </header>
      
      {!mostrarForm ? (
        <button onClick={() => setMostrarForm(true)}>Registrarse</button>
      ) : (
        <>
          <RegistroForm />
          {/* Mueve el botón "Volver" aquí, debajo del formulario */}
          <button onClick={() => setMostrarForm(false)}>Volver al Inicio</button>
        </>
      )}
      
      <footer>
        <p>&copy; {new Date().getFullYear()} Mi Bullet Journal Digital</p>
      </footer>
    </div>
  );
}

export default App;


