<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="author" content="InnerSync">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/estiloLogo.css?v=<?=date("YmdHis", time());?>">
    <link rel="shortcut icon" type="../image/png" href="../images/favicon.png">
    <link href="vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link class="main-css" href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="fix-wrapper">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6">
                    <div class="card mb-0 h-auto">
                        <div class="card-body">
                            <div id="logo" class="text-center mb-3">
                                <a href="index.php"><img class="logo-auth" src="images/logo2.png" alt="" style="border-radius:50%;"></a>
                            </div>
                            <h4 class="text-center mb-4">Inicia sesión en tu cuenta</h4>
                            <form id="login">
                                <div class="form-group mb-4">
                                    <label class="form-label" for="username">Nombre de usuario</label>
                                    <input type="text" name="usuario" class="form-control" placeholder="Introduce tu nombre de usuario" id="username">
                                </div>
                                <div class="mb-sm-4 mb-3 position-relative">
                                    <label class="form-label" for="dlab-password">Contraseña</label>
                                    <input type="password" name="password" id="dlab-password" placeholder="Introduce la contraseña" class="form-control" value="">
                                    <span class="show-pass eye">
                                        <i class="fa fa-eye-slash"></i>
                                        <i class="fa fa-eye"></i>
                                    </span>
                                </div>
                                <div class="text-center">
                                    <button type="submit" id="boton-login" class="btn btn-primary btn-block">Iniciar sesión</button>
                                </div>
                                <div class="text-center mt-3">
                                    <a href="index.php" class="btn btn-block" style="background-color: white; color: #FF4500; border: 1px solid #FF4500;">Volver al inicio</a>
                                </div>
                            </form>
                            <div class="new-account mt-3">
                                <p>¿No tienes una cuenta? <a class="text-primary" href="page-register.php">Regístrate</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/custom.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/customHook.js?<?=date("YmdHis");?>"></script>

</body>
</html>
