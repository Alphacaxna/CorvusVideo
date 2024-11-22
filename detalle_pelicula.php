<?php
header('Content-Type: application/json');

// Conexión a la base de datos
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'base_paginaweb2';
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

$id = $_GET['id'];

// Consultar detalles de la película por ID
$sql = "SELECT * FROM peliculas WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $pelicula = $result->fetch_assoc();
    echo json_encode($pelicula);
} else {
    echo json_encode(['error' => 'Película no encontrada']);
}

$conn->close();
?>
