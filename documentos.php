<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corvusvideo - Documentos</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-color: black;
            color: white;
        }
        .documentos {
            padding: 20px;
        }
        .documentos h2 {
            font-size: 24px;
            margin-bottom: 10px;
        }
        .document-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }
        .document-list li {
            margin-bottom: 10px;
        }
        .document-link {
            color: #3498db;
            text-decoration: none;
        }
        .document-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<header class="header">
    <div class="menu container">
        <a href="#" class="logo">CorvusVideo</a>
 
        <label for="menu">
            <img src="img/corvus.png" class="menu-icono" alt="menu">
        </label>
        
        <?php include 'inicio.php'; ?>
    </div>

    <div class="header-content container">
        <h1>Documentos</h1>
    </div>
</header>

<main class="container">
    <!-- Agrega aquí el contenido de los documentos -->
    <section class="documentos">
        <h2>Documentos Disponibles</h2>
        <ul class="document-list">
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
                    echo '<li>';
                    echo '<a class="document-link" href="' . $row['ruta_archivo'] . '" target="_blank">' . $row['nombre_archivo'] . '</a> | ';
                    echo '<a class="document-link" href="' . $row['ruta_archivo'] . '" download>Descargar</a>';
                    echo '</li>';
                }
            } else {
                echo '<li>No hay documentos disponibles.</li>';
            }

            $conn->close();
            ?>
        </ul>
        
        <h2>Subir Documento</h2>
        <form action="procesar_subida.php" method="post" enctype="multipart/form-data">
            <label for="nombre_archivo">Nombre del archivo:</label>
            <input type="text" id="nombre_archivo" name="nombre_archivo" required>
            <label for="archivo">Selecciona un archivo:</label>
            <input type="file" id="archivo" name="archivo" accept=".pdf" required>
            <button type="submit">Subir</button>
        </form>
    </section>
    </section>
</main>

</body>
</html>
