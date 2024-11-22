<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_POST["id_usuario"];
    $nuevo_nombre = $_POST["nuevo_nombre"];
    $nuevo_correo = $_POST["nuevo_correo"];

    // Realizar la actualización en la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "base_paginaweb2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $sql = "UPDATE usuarios SET nom_usuario = '$nuevo_nombre', correo = '$nuevo_correo' WHERE id_usuario = $id_usuario";

    if ($conn->query($sql) === TRUE) {
        header("Location: admin.php");
        exit();
    } else {
        $error = "Error al actualizar el usuario: " . $conn->error;
    }

    $conn->close();
}

// Obtener el ID del usuario de la URL
$id_usuario = $_GET["id"];

// Consultar la base de datos para obtener los datos del usuario
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "base_paginaweb2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT nom_usuario, correo FROM usuarios WHERE id_usuario = $id_usuario";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $nombre_usuario = $row["nom_usuario"];
    $correo_usuario = $row["correo"];
} else {
    $error = "No se encontró el usuario.";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        p.error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Editar Usuario</h1>
        <?php
        if (isset($error)) {
            echo '<p class="error">' . $error . '</p>';
        } else {
            ?>
            <form method="post" action="editar_usuario.php">
                <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                Nuevo Nombre: <input type="text" name="nuevo_nombre" value="<?php echo $nombre_usuario; ?>"><br>
                Nuevo Correo: <input type="text" name="nuevo_correo" value="<?php echo $correo_usuario; ?>"><br>
                <input type="submit" value="Guardar Cambios">
            </form>
        <?php } ?>
    </div>
</body>
</html>
