<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['reg_username']);
    $password = $conn->real_escape_string($_POST['reg_password']);
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $fecha_nacimiento = $conn->real_escape_string($_POST['fecha_nacimiento']);
    $domicilio = $conn->real_escape_string($_POST['domicilio']);

    // Verifica si el usuario ya existe
    $sql = "SELECT id FROM usuarios WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result === false) {
        die("Error en la consulta SELECT: " . $conn->error);
    }

    if ($result->num_rows == 0) {
        // Si no existe, inserta el nuevo usuario
        $sql = "INSERT INTO usuarios (username, password, nombre, fecha_nacimiento, domicilio) 
                VALUES ('$username', '$password', '$nombre', '$fecha_nacimiento', '$domicilio')";

        if ($conn->query($sql) === TRUE) {
            echo "Registro exitoso.<br>";
            echo "Usuario almacenado en la base de datos.<br>";
            // Puedes redirigir a la página de login o a donde desees
            header("Location: login.html");
            exit();
        } else {
            die("Error al almacenar el usuario: " . $conn->error);
        }
    } else {
        echo "El nombre de usuario ya existe.<br>";
    }
}
?>






