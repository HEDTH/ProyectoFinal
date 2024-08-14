<?php
session_start();
require 'db.php'; // Asegúrate de que este archivo contiene la conexión a la base de datos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtén los datos del formulario
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Consulta para verificar si el usuario existe y si la contraseña es correcta
    $sql = "SELECT * FROM usuarios WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Si el usuario existe, obtener sus datos
        $user = $result->fetch_assoc();

        // Verificar la contraseña
        if ($password === $user['password']) { // Puedes usar password_verify() si usas hash para las contraseñas
            // Iniciar la sesión del usuario
            $_SESSION['username'] = $user['username'];
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['fecha_nacimiento'] = $user['fecha_nacimiento'];
            $_SESSION['domicilio'] = $user['domicilio'];

            // Redirigir a la página de 'Mi Cuenta'
            header("Location: mi_cuenta.php");
            exit();
        } else {
            // Contraseña incorrecta
            echo "La contraseña es incorrecta.";
        }
    } else {
        // Usuario no encontrado
        echo "El usuario no existe.";
    }
} else {
    echo "Método de solicitud no válido.";
}
?>









