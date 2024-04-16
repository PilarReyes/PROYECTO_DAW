<?php

    $error=isset($_GET['error']) ? $_GET['error'] :'';
    echo "$error";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <table>
  <form action="nuevo_usuario.php" method='post'>
    <tr>
    <td><label>Nombre:</label></td>
    <td><input type="text" name="nombre"></td>
</tr>
<tr>
    <td><label>Usuario:</label></td>
    <td><input type="text" name="usuario"></td>
</tr>
<tr>
    <td><label>Contraseña:</label></td>
    <td><input type="password" name="contrasenya"></td>
</tr>
<tr>
    <td><label>Email</label></td>
    <td><input type="email" name='email'></td> 
</tr>
</table>
<input type="submit" name='registro' value='Registrar'><br><br>
  </form>
</body>
</html>

<a href="index.php">Volver</a>




