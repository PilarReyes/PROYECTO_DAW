<?php
include '../models/core.php';
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil de Usuario</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilosPerfil.css?v=<?=date('YmdHis', time());?>">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="profile-back">
                    <img src="../images/Fondos/fondo13.png" alt="Fondo de perfil" class="background-image">
                </div>
                <div class="profile-pic d-flex">
                    <img src="../images/profile/perfil2.png" alt="Imagen de perfil" class="profile-image">
                    <div class="profile-info2">      
                        <span class="font-w400 d-block"><?= $_SESSION['nombre'] ?></span>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-xxl-8 col-md-6 mt-md-5 mt-0">
                <div class="row">
                    <div class="col-xl-8 col-xxl-7">
                        <div class="card">
                            <!-- Formulario para actualizar datos -->
                            <div class="profile-section">
                                <h4 class="mb-3">Información personal</h4>
                                <form id="formPerfil">
                                    <div class="form-group">
                                        <label for="firstName">Nombre</label>
                                        <input type="text" class="form-control" name="firstName" value="<?=$_SESSION['nombre']?>" placeholder="Ingrese su nombre" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName">Apellidos</label>
                                        <input type="text" class="form-control" name="lastName" value="<?=$_SESSION['apellidos']?>" placeholder="Ingrese sus apellidos" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" name="email" value="<?=$_SESSION['email']?>" placeholder="Ingrese su email" disabled>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-xl-8 col-xxl-7">
                        <div class="card">
                            <div class="profile-section">
                                <h4 class="mb-3">Cambiar Contraseña</h4>
                                <button class="btn btn-secondary" id="botonCambiarContrasena">Cambiar Contraseña</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-xl-8 col-xxl-7">
                        <div class="card">
                            <div class="profile-section">
                                <button class="btn btn-primary" onclick="window.location.href='../dashboard.php'">Volver al Dashboard</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para cambiar la contraseña -->
    <div class="modal fade" id="modalCambiarContrasena" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Cambiar Contraseña</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Cerrar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="formCambiarContrasena">
                        <div class="form-group">
                            <label for="currentPassword">Contraseña Actual</label>
                            <input type="password" class="form-control" name="currentPassword" placeholder="Ingrese su contraseña actual">
                        </div>
                        <div class="form-group">
                            <label for="newPassword">Nueva Contraseña</label>
                            <input type="password" class="form-control" name="newPassword" placeholder="Ingrese la nueva contraseña">
                        </div>
                        <div class="form-group">
                            <label for="confirmNewPassword">Confirmar Nueva Contraseña</label>
                            <input type="password" class="form-control" name="confirmNewPassword" placeholder="Confirme la nueva contraseña">
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="../js/customHook.js?<?=date("YmdHis");?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
