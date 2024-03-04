import axios from 'axios';

export const handleSubmit = async (formData, onSuccess, onError) => {
  try {
    const response = await axios.post('http://localhost/DWES/backEnd/nuevo_usuario.php', formData);
    console.log(response.data);
    if (onSuccess && typeof onSuccess === 'function') {
      onSuccess(response.data); 
    }
    alert('El formulario se ha enviado con éxito');

  } catch (error) {
    console.error('Error al enviar el formulario:', error);
    if (onError && typeof onError === 'function') {
      onError(error); 
    }
  }
};
