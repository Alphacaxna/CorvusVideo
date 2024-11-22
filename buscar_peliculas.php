<?php
// Conexión a la base de datos
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'base_paginaweb2';
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Recuperar la consulta de búsqueda del usuario
$consulta = $_GET['consulta'];

// Crear la consulta SQL para buscar películas
$sql = "SELECT * FROM peliculas WHERE titulo LIKE '%$consulta%'";

// Ejecutar la consulta SQL
$result = $conn->query($sql);

// Mostrar los resultados
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h2>" . $row['titulo'] . "</h2>";
        echo "<p>" . $row['descripcion'] . "</p>";
        echo "<hr>";
    }
} else {
    echo "No se encontraron películas que coincidan con tu búsqueda.";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
