<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Meta -->
	<meta charset="utf-8">
	<meta name="author" content="InerSync">

	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<!-- PAGE TITLE HERE -->
	<title></title>
	
	<!-- Favicon icon -->
	<link rel="shortcut icon" type="image/png" href="images/favicon.png">
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
                            <div class="text-center mb-3">
                                <a href="index.php"><img class="logo-auth" src="images/logo.png" alt=""></a>
                            </div>
                            <h4 class="text-center mb-4">Registra tu cuenta</h4>
                            <form action="guardar_empresa.php" method="POST">
                                <div class="form-group mb-4">
                                    <label class="form-label" for="nombre">Nombre:</label>
                                    <input type="text" class="form-control" placeholder="Introduce el nombre" id="nombre" name="nombre">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label" for="usuario">Usuario:</label>
                                    <input type="text" class="form-control" placeholder="Introduce el usuario" id="usuario" name="usuario">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label" for="contrasenya">Contraseña:</label>
                                    <input type="password" class="form-control" placeholder="Introduce la contraseña" id="contrasenya" name="contrasenya">
                                </div>
                                <div class="form-group mb-4">
                                    <label class="form-label" for="email">Email:</label>
                                    <input type="email" class="form-control" placeholder="Introduce el correo electrónico" id="email" name="email">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
                                </div>
                            </form>
                            <div class="new-account mt-3">
                            <p>¿Ya tienes una cuenta? <a class="text-primary" href="page-login.php">Iniciar sesión</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
    <script src="vendor/global/global.min.js"></script>
    <script src="vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script src="js/dlabnav-init.js"></script>
    <script src="js/custom.min.js"></script>
    
    

</body>
</html>
