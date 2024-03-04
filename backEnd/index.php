<?php
session_start(); 
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Bullet Journal Digital</title>
</head>
<body>
    <header>
        <h1>Bienvenido a Mi Bullet Journal Digital</h1>
        <?php if (isset($_SESSION['usuario'])): ?>
            <p>Hola, <?php echo htmlspecialchars($_SESSION['nombre']); ?> | <a href="logout.php">Cerrar sesión</a></p>
        <?php else: ?>
            <nav>
                <ul>
                    <li><a href="login.php">Iniciar sesión</a></li>
                    <li><a href="registro.php">Registrarse</a></li>
                </ul>
            </nav>
        <?php endif; ?>
    </header>
    
    <main>
        <section>
            <h2>Frases Motivadoras</h2>
            <div id="fraseMotivadora">Cargando frase...</div>
        </section>
    </main>
    
    <footer>
        <p>&copy; 2024 Mi Bullet Journal Digital</p>
    </footer>

 

</body>
</html>

<a href="login.php">Volver</a>

