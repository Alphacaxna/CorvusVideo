<!-- logout.php -->
<?php
// Inicia una nueva sesión o reanuda la actual
session_start();

// Destruye todas las variables de sesión
$_SESSION = array();

// Destruye la sesión
session_destroy();

// Redirecciona al usuario a la página de inicio de sesión
header("Location: index.php");
exit;
?>
