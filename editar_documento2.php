<!-- editar_documento.php -->
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

// Procesar el formulario si se envió
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nuevo_nombre = $_POST['nuevo_nombre'];

    // Consulta para actualizar el nombre del documento
    $query = "UPDATE documentos SET nombre_archivo = ? WHERE id_archivo = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("si", $nuevo_nombre, $id_documento);
    
    if ($stmt->execute()) {
        echo "El nombre del documento ha sido modificado correctamente.";
    } else {
        echo "Error al modificar el nombre del documento: " . $conn->error;
    }

    $stmt->close();
    
    // Redireccionar al panel de administrador
    header("Location: admin.php");
}
?>

<!-- Formulario para modificar el nombre del documento -->
<form action="editar_documento2.php?id=<?php echo $id_documento; ?>" method="post">
    <label for="nuevo_nombre">Nuevo nombre del archivo:</label>
    <input type="text" id="nuevo_nombre" name="nuevo_nombre" required>
    <button type="submit">Modificar</button>
</form>

<?php
$conn->close();
?>
