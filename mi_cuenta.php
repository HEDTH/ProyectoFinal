<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    $sql = "SELECT id, nombre, fecha_nacimiento, domicilio FROM usuarios WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $username;
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['fecha_nacimiento'] = $row['fecha_nacimiento'];
        $_SESSION['domicilio'] = $row['domicilio'];

        // Redirecciona a mi_cuenta.php
        header("Location: mi_cuenta.php");
        exit();
    } else {
        // Si las credenciales no son correctas, muestra un mensaje o redirige
        echo "Usuario o contraseña incorrectos.";
    }
}
?>




