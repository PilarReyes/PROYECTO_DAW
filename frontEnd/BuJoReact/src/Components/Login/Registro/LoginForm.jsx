
import axios from 'axios';
import { handleChange} from '../../../Helpers/handleChange';
import { handleSubmit } from '../../../Helpers/handleSubmit';

const Login = () => {

    const [formData, setFormData] = useState({
        usuario: '',
        contrasenya: '',
      });

  return (
    <div>
      <h2>Iniciar sesión</h2>
      <form onSubmit={(e) => handleSubmit(e, formData)}>
        <input
          type="text"
          name="usuario"
          placeholder="Usuario"
          value={formData.usuario}
          onChange={(e) => handleChange(e, formData, setFormData)}
        />
        <input
          type="password"
          name="contrasenya"
          placeholder="Contraseña"
          value={formData.contrasenya}
          onChange={(e) => handleChange(e, formData, setFormData)}
        />
        <button type="submit">Iniciar sesión</button>
      </form>
    </div>
  );
};

export default Login;
