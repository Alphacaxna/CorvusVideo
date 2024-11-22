<?php
// Configuración de la conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "base_paginaweb2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];

$sql = "INSERT INTO usuario (nom_usuario, correo) VALUES ('$nombre', '$correo')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo usuario creado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

header("Location: admin.php");
?>
