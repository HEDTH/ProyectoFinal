<?php
$servername = "localhost:3306";
$username = "root";
$password = "12345";
$dbname = "tiendam";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} else {
    echo "Conexión a la base de datos exitosa.<br>";
}

$sql = "INSERT INTO usuarios (username, password, nombre, fecha_nacimiento, domicilio) VALUES ('testuser', 'testpass', 'Test Nombre', '2000-01-01', 'Test Domicilio')";
if ($conn->query($sql) === TRUE) {
    echo "Inserción exitosa.<br>";
} else {
    echo "Error en la inserción: " . $conn->error;
}
$conn->close();
?>



