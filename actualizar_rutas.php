<?php

// Conexión a la base de datos (reemplaza con tus propias credenciales)
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'base_paginaweb2';
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Consulta para obtener los documentos
$query = "SELECT * FROM documentos";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Convertir la ruta absoluta a una ruta relativa
        $rutaRelativa = str_replace('C:/xampp/htdocs/corvusvideo/', '', $row['ruta_archivo']);
        
        // Actualizar la ruta en la base de datos
        $updateQuery = "UPDATE documentos SET ruta_archivo = '$rutaRelativa' WHERE id_archivo = " . $row['id_archivo'];
        $conn->query($updateQuery);
    }
}

$conn->close();

echo "Rutas de archivos actualizadas exitosamente.";

?>
