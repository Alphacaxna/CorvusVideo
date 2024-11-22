<?php
session_start();

// Asegúrate de que el usuario haya iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: user_login.php");
    exit;
}

include 'db_connection.php';
$error = "";

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_usuario = $_SESSION['id_usuario'];
    $nom_usuario = $_POST['nom_usuario'];
    $correo = $_POST['correo'];

    // Preparar la actualización en la base de datos
    $stmt = $conn->prepare("UPDATE usuarios SET nom_usuario=?, correo=? WHERE id_usuario=?");
    $stmt->bind_param("ssi", $nom_usuario, $correo, $id_usuario);

    if ($stmt->execute()) {
        $error = "Perfil actualizado exitosamente!";
    } else {
        $error = "Error al actualizar el perfil: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Perfil</title>
    <style>
        /* Aquí debes agregar el CSS elegante que desees para el diseño */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, #f6d365, #fda085);
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        form {
            width: 80%;
            max-width: 500px;
            background-color: white;
            padding: 20px;
            border-radius: 7px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
        }

        label, input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        input[type="submit"] {
            background-color: #f6d365;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #fda085;
        }

        .error {
            color: red;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <h2>Modificar Perfil</h2>
        <div class="error"><?php echo $error; ?></div>
        <label for="nom_usuario">Nombre:</label>
        <input type="text" name="nom_usuario" required value="<?php echo $_SESSION['nom_usuario']; ?>">

        <label for="correo">Correo:</label>
        <input type="email" name="correo" required value="<?php echo $_SESSION['correo']; ?>">

        <input type="submit" value="Actualizar">
    </form>
    <div class="btn-group">
            <a class="btn" href="index.php">Inicio</a>
    </div>
</body>
</html>
