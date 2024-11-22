<?php
session_start();

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio de Sesión Requerido</title>
        <style>
            body {
                font-family: 'Arial', sans-serif;
                background-color: #f5f5f5;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
            }

            .notification {
                padding: 20px 25px;
                background-color: #ffffff;
                box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
                border-radius: 5px;
                font-size: 18px;
                text-align: center;
                color: #555;
            }
        </style>
    </head>
    <body>
        <div class="notification">
            Por favor, inicia sesión para subir un archivo.
        </div>
    </body>
    </html>
    <?php
    exit; 
}

// Conexión a la base de datos (reemplaza con tus propias credenciales)
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'base_paginaweb2';
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

$nombre_archivo = $_POST['nombre_archivo'];
$ruta_archivo = 'C:/xampp/htdocs/corvusvideo/documentos/' . $_FILES['archivo']['name'];
$fecha_carga = date('Y-m-d H:i:s');
$id_usuario = $_SESSION['id_usuario'];

if (move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta_archivo)) {
    // Insertar información en la base de datos usando una sentencia preparada
    $query = "INSERT INTO documentos (nombre_archivo, ruta_archivo, fecha_carga, id_usuario)
              VALUES (?, ?, ?, ?)";
    
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssi', $nombre_archivo, $ruta_archivo, $fecha_carga, $id_usuario);
    
    if ($stmt->execute()) {
        header("Location: documentos.php"); // Redirigir a la página de documentos
        exit();
    } else {
        echo "Error al subir el archivo: " . $conn->error;
    }
    $stmt->close();
} else {
    echo "Error al subir el archivo.";
}

$conn->close();
?>
