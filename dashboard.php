<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control - Fmuaje</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <header>
        <h1>Fmuaje - Panel de Control</h1>
    </header>

    <main>
        <div class="form-container">
            <h2>Bienvenido, <?php echo $_SESSION['nombre_usuario']; ?>!</h2>
            <p>Accede a nuestros servicios exclusivos.</p>
            <p><a href="logout.php">Cerrar sesión</a></p>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Fmuaje. Todos los derechos reservados.</p>
    </footer>
</body>
</html>
