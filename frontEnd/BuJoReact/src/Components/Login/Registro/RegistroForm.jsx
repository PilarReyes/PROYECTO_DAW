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

  const handleNameChange = (e) => {
    setFormData({ ...formData, nombre: e.target.value });
  };

  return (
    <>
      <h2>Registro de Usuario</h2>
      <form onSubmit={handleFormSubmit}>
        <input 
          type="text" 
          id="nombre" 
          name="nombre" 
          value={formData.nombre} 
          onChange={handleNameChange} 
          placeholder="Ingrese su nombre" 
        /><br />

        <input 
          type="text" 
          id="usuario" 
          name="usuario" 
          value={formData.usuario} 
          onChange={(e) => handleChange(e, formData, setFormData)} 
          placeholder="Ingrese su usuario" 
        /><br />

        <input 
          type="password" 
          id="password" 
          name="password" 
          value={formData.password} 
          onChange={(e) => handleChange(e, formData, setFormData)} 
          placeholder="Ingrese su contraseña" 
        /><br />

        <input 
          type="email" 
          id="email" 
          name="email" 
          value={formData.email} 
          onChange={(e) => handleChange(e, formData, setFormData)} 
          placeholder="Ingrese su email" 
        /><br />

        <button type="submit">Registrar</button>
      </form>
    </>
  );
};

