import { useState } from "react";
import { handleChange } from "../../../Helpers/handleChange";
import { handleSubmit } from "../../../Helpers/handleSubmit";

export const RegistroForm = () => {
  const [formData, setFormData] = useState({
    nombre: '',
    usuario: '',
    password: '', 
    email: '', 
  });

  const onSuccess = (data) => {
    console.log("Registro exitoso:", data);
   
  };

  const onError = (error) => {
    console.error("Error al registrar:", error);

  };
  
  const handleFormSubmit = (e) => {
    e.preventDefault(); 
    handleSubmit(formData, onSuccess, onError); 
  };

  return (
    <>
      <h2>Registro de Usuario</h2>
      <form onSubmit={handleFormSubmit}>
        <label>Nombre:</label>
        <input type="text" name="nombre" value={formData.nombre} onChange={(e) => handleChange(e, formData, setFormData)} /><br />

        <label>Usuario:</label>
        <input type="text" name="usuario" value={formData.usuario} onChange={(e) => handleChange(e, formData, setFormData)} /><br />

        <label>Contraseña:</label>
        <input type="password" name="password" value={formData.password} onChange={(e) => handleChange(e, formData, setFormData)} /><br />

        <label>Email:</label>
        <input type="email" name="email" value={formData.email} onChange={(e) => handleChange(e, formData, setFormData)} /><br />

        <button type="submit">Registrar</button>
      </form>
    </>
  );
};
