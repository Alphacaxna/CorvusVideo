<!-- consulta_documentos.php -->
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
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documentos Disponibles</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
        }

        h2 {
            color: #2C3E50;
            border-bottom: 2px solid #2C3E50;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .document-list {
            list-style-type: none;
            padding: 0;
        }

        .document-list li {
            background-color: #ffffff;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .document-link {
            color: #3498DB;
            text-decoration: none;
            margin-right: 10px;
        }

        .document-link:hover {
            text-decoration: underline;
        }

        a {
            margin-right: 5px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #3498DB;
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
            margin: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #2980B9;
        }

        .btn-group {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Documentos Disponibles</h2>
    <ul class="document-list">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<li>';
                echo '<a class="document-link" href="' . $row['ruta_archivo'] . '" target="_blank">' . $row['nombre_archivo'] . '</a> | ';
                echo '<a class="document-link" href="' . $row['ruta_archivo'] . '" download>Descargar</a> | ';
                echo '<a href="editar_documento.php?id=' . $row['id_archivo'] . '">Modificar Nombre</a> | ';
                echo '<a href="eliminar_documento.php?id=' . $row['id_archivo'] . '" onclick="return confirm(\'¿Está seguro de que desea eliminar este documento?\');">Eliminar</a>';
                echo '</li>';
            }
        } else {
            echo '<li>No hay documentos disponibles.</li>';
        }
        ?>
    </ul>
    <div class="btn-group">
        <a class="btn" href="index.php">Regresar al inicio</a>
        <a class="btn" href="cerrar_sesion.php">Cerrar sesión</a>
    </div>
</body>
</html>
