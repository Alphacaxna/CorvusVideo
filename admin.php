
<!-- admin.php -->
<?php
// Inicia una nueva sesión o reanuda la actual
session_start();

// Verifica si el usuario está logueado
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: login.php");
    exit;
}

// Aquí va el contenido de tu página de administración
echo "Bienvenido a la página de administración";
?>

<!-- Botón para cerrar sesión -->
<form action="logout.php" method="post">
    <button type="submit">Cerrar Sesión</button>
</form>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administrador</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        /* Aquí puedes agregar más estilos CSS si los necesitas */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            width: 80%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }
        .logout {
            text-align: right;
        }
    </style>
</head>
<body>
   
        <h1>Panel de Administrador</h1>
        <div class="btn-group">
        <a class="btn" href="index.php">Regresar al inicio</a>
        </div>
        <h2>Usuarios</h2>
        <ul class="user-list">
            <?php
            include 'consultas.php';
            ?>
        </ul>
        
        <h2>Documentos</h2>
        <section class="documentos">
            <?php
            include 'consulta_documentos2.php';
            ?>
        </section>
        
        <h2>Subir Documento</h2>
        <form action="procesar_subida.php" method="post" enctype="multipart/form-data">
            <label for="nombre_archivo">Nombre del archivo:</label>
            <input type="text" id="nombre_archivo" name="nombre_archivo" required>
            <label for="archivo">Selecciona un archivo:</label>
            <input type="file" id="archivo" name="archivo" accept=".pdf" required>
            <button type="submit">Subir</button>
        </form>
    </div>
</body>
</html>

