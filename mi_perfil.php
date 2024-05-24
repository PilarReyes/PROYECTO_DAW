<?php

include 'models/core.php';
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Perfil de Usuario</title>
<link rel="stylesheet" href="estilosPerfil.css?v=<?=date('YmdHis', time());?>">

</head>
<body>

<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12">
            <div class="profile-back">
                <img src="images/Fondos/fondo2.jpg" alt="Fondo de perfil" class="background-image">
            </div>
            <div class="profile-pic d-flex">
                <img src="images/profile/avatar.png" alt="Imagen de perfil" class="profile-image">
                <div class="profile-info2">      
                        <span class="font-w400 d-block"><?= $_SESSION['usuario'] ?></span>
                </div>
            </div>

        </div>
        <div class="col-xl-9 col-xxl-8 col-md-6 mt-md-5 mt-0">
            <div class="row">
                <div class="col-xl-8 col-xxl-7">
                    <div class="card">
                       
                        <!-- Formulario para actualizar datos -->
                        <div class="profile-section">
                            <h4 class="mb-3">Editar Información</h4>
                            <form id="formPerfil">
                                <div class="form-group">
                                    <label for="firstName">Nombre</label>
                                    <input type="text" class="form-control" name="firstName" value="<?=$_SESSION['usuario']?>" placeholder="Ingrese su nombre">
                                </div>
                                <div class="form-group">
                                    <label for="lastName">Apellidos</label>
                                    <input type="text" class="form-control" name="lastName" value="<?=$_SESSION['apellidos']?>" placeholder="Ingrese sus apellidos">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" name="email" value="<?=$_SESSION['email']?>" placeholder="Ingrese su email" disabled>
                                </div>
                               <div class="form-group">
                                    <label for="currentPassword">Contraseña Actual</label>
                                    <input type="password" class="form-control" name="currentPassword" name="currentPassword" placeholder="Ingrese su contraseña actual" >
                                </div>
                                <div class="form-group">
                                    <label for="newPassword">Nueva Contraseña</label>
                                    <input type="password" class="form-control" name="newPassword" name="newPassword" placeholder="Ingrese la nueva contraseña">
                                </div>
                                <div class="form-group">
                                    <label for="confirmNewPassword">Confirmar Nueva Contraseña</label>
                                    <input type="password" class="form-control" name="confirmNewPassword" name="confirmNewPassword" placeholder="Confirme la nueva contraseña">
                                </div>
                                <button type="submit" class="btn btn-primary" id="botonActualizar">Actualizar Datos</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div
?>
<a href="dashboard.php">Volver</a>