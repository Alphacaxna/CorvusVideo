<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta y CRUD de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .user-list {
            list-style: none;
            padding: 0;
        }

        .user-item {
            border: 1px solid #ccc;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #fff;
        }

        .user-item h3 {
            margin: 0;
        }

        .user-item p {
            margin: 5px 0;
        }

        .user-item a {
            color: #007bff;
            text-decoration: none;
            margin-right: 10px;
        }

        .user-item a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
      
        <ul class="user-list">
            <?php
            // Configuración de la conexión a la base de datos
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "base_paginaweb2";

            // Crear la conexión
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verificar la conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Consulta SQL para seleccionar nombre, correo e ID de usuarios
            $sql = "SELECT id_usuario, nom_usuario, correo FROM usuarios";

            // Ejecutar la consulta
            $result = $conn->query($sql);

            // Mostrar resultados y enlaces CRUD
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<li class="user-item">';
                    echo '<h3>ID: ' . $row["id_usuario"] . '</h3>';
                    echo '<p>Nombre: ' . $row["nom_usuario"] . '</p>';
                    echo '<p>Correo: ' . $row["correo"] . '</p>';
                    echo '<a href="editar_usuario.php?id=' . $row["id_usuario"] . '">Editar</a> | ';
                    echo '<a href="eliminar_usuario.php?id=' . $row["id_usuario"] . '">Eliminar</a>';
                    echo '</li>';
                }
            } else {
                echo '<p>No se encontraron resultados.</p>';
            }

            // Cerrar la conexión
            $conn->close();
            ?>
        </ul>
    </div>
</body>
</html>
