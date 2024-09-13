<?php
$servidor = "localhost";
$usuario_db = "root";
$password_db = "";
$nombre_db = "empresa_db";

$conn = new mysqli($servidor, $usuario_db, $password_db, $nombre_db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre_usuario = $_POST['nombre_usuario'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $sql = "INSERT INTO usuarios (nombre_usuario, correo, password_hash) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nombre_usuario, $correo, $password);

    if ($stmt->execute()) {
        echo "¡Registro exitoso! <a href='login.html'>Inicia sesión aquí</a>";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>
