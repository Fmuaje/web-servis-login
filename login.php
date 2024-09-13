<?php
session_start();

$servidor = "localhost";
$usuario_db = "root";
$password_db = "";
$nombre_db = "empresa_db";

$conn = new mysqli($servidor, $usuario_db, $password_db, $nombre_db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    $sql = "SELECT id, nombre_usuario, password_hash FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $stmt->store_result();
    
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nombre_usuario, $password_hash);
        $stmt->fetch();

        if ($password == $password_hash) {
            $_SESSION['user_id'] = $id;
            $_SESSION['nombre_usuario'] = $nombre_usuario;
            header("Location: dashboard.php");
            exit();
        } else {
            echo "¡Credenciales incorrectas!";
        }
    } else {
        echo "¡Usuario no encontrado!";
    }
    $stmt->close();
}
$conn->close();
?>
