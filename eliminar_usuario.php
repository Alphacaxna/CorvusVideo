<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $id_usuario = $_GET["id"];

    // Realizar la eliminación en la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "base_paginaweb2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "DELETE FROM usuario WHERE id_usuario = $id_usuario";

    if ($conn->query($sql) === TRUE) {
        echo "Usuario eliminado exitosamente.";
    } else {
        echo "Error al eliminar el usuario: " . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Encabezado y estilos aquí -->
</head>
<body>
    <div class="container">
        <h1>Eliminar Usuario</h1>
        <?php
        $id_usuario = $_GET["id"];
        // Obtener datos del usuario de la base de datos
        // ...

        // Mostrar confirmación de eliminación
        echo '<p>¿Estás seguro de que deseas eliminar el usuario ' . $nombre_usuario . '?</p>';
        echo '<a href="eliminar_usuario.php?id=' . $id_usuario . '">Sí, Eliminar</a>';
        echo ' | <a href="consulta_usuarios.php">Cancelar</a>';
        ?>
    </div>
</body>
</html>
