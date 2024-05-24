<?php

$error=isset($_GET['error']) ? $_GET['error'] :'';
echo "$error";

?>

<form action="comprueba_login.php" method='post'>
<fieldset>
<legend>Login</legend>

<table>
<tr>
    <td><Label>Usuario:</Label></td>
    <td><input type='text' name='usuario'/></td>
</tr>
<tr>
    <td><label for='contrasenya'>Contraseña:</label></td>
    <td><input type='password' name='contrasenya'/></td>
</tr>
<tr>
    <td><input type='submit' name='enviar' value='Enviar' /></td>
</tr>

</table>
</fieldset>
</form>

<a href="index.php">Volver</a>



