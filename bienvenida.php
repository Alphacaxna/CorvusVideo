<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Encabezado y estilos -->
</head>
<body>
    <h1>Bienvenido</h1>
    <?php if (!empty($welcomeMessage)) { ?>
        <p><?php echo $welcomeMessage; ?></p>
    <?php } else { ?>
        <p>Bienvenido, <?php echo $_SESSION['username']; ?>. Gracias por iniciar sesión.</p>
    <?php } ?>
    <!-- Contenido adicional de la página de bienvenida -->
    <a href="logout.php">Cerrar sesión</a>
    <!-- Agregar enlaces a scripts JavaScript aquí si es necesario -->
</body>
</html>
