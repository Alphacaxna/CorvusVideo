
   

<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
        display: flex;
        min-height: 100vh;
        align-items: center;
        justify-content: center;
    }

    form {
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
        width: 100%;
        max-width: 400px;
    }

    label {
        font-weight: bold;
        display: block;
        margin-bottom: 8px;
    }

    input {
        width: 100%;
        padding: 8px;
        margin-bottom: 20px;
        border-radius: 4px;
        border: 1px solid #ccc;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    p {
        color: red;
        font-weight: bold;
    }
    
    .back-btn {
    display: inline-block;
    background-color: #555;
    color: white;
    padding: 10px 20px;
    border-radius: 4px;
    text-align: center;
    text-decoration: none;
    margin-top: 10px;
}

.back-btn:hover {
    background-color: #333;
}

</style>

<!-- login.php -->
<?php


// Inicia una nueva sesión o reanuda la actual
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    // Incluir conexión a la base de datos
    include 'db_connection.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta para verificar las credenciales del usuario
    $query = "SELECT * FROM administradores WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        // Verifica la contraseña
        if ($password === $admin['password']) {
            $_SESSION['admin_logged_in'] = true;
            header("Location: admin.php");
            exit;
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Usuario no existe";
    }
}
?>

<!-- Formulario de inicio de sesión -->
<form action="login.php" method="post">
    <label for="username">Nombre de Usuario:</label>
    <input type="text" id="username" name="username" required>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Iniciar Sesión</button>
    <a href="index.php" class="back-btn">Volver al Inicio</a>


</form>

<?php
if (isset($error)) {
    echo "<p>Error: $error</p>";
}
?>