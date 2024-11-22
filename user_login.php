<!-- user_login.php -->
<?php
// Inicia una nueva sesión o reanuda la actual
session_start();

$error = "";

if (isset($_POST['email']) && isset($_POST['password'])) {
    // Incluir conexión a la base de datos
    include 'db_connection.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Consulta para verificar las credenciales del usuario
    $query = "SELECT * FROM usuarios WHERE correo = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verifica la contraseña (idealmente, deberías usar hashing aquí)
        if ($password === $user['contraseña']) {
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            $_SESSION['username'] = $user['nom_usuario'];
            $_SESSION['id_usuario'] = $user['id_usuario'];
            $_SESSION['correo'] = $row['correo'];

            header("Location: user_dashboard.php");
            exit;
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Correo no registrado";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, #f6d365, #fda085);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background-color: #ffffff;
            padding: 20px 25px;
            border-radius: 5px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 300px;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            background-color: #f4f4f4;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #fda085;
            border: none;
            border-radius: 5px;
            color: #ffffff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #f6d365;
        }

        p {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <form action="user_login.php" method="post">
        <label for="email">Correo:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Iniciar Sesión</button>
    </form>
    
    <?php
    if (!empty($error)) {
        echo "<p>$error</p>";
    }
    ?>
</body>
</html>
