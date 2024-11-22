<!-- eliminar_documento.php -->
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

// Obtener el ID del documento
$id_documento = $_GET['id'];

// Consulta para eliminar el documento
$query = "DELETE FROM documentos WHERE id_archivo = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $id_documento);

if ($stmt->execute()) {
    echo "El documento ha sido eliminado correctamente.";
} else {
    echo "Error al eliminar el documento: " . $conn->error;
}

$stmt->close();
$conn->close();

// Redireccionar al panel de administrador
header("Location: user_dashboard.php");
?>
