<?php
// Obtener el correo electrónico de la consulta GET
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $servername = "localhost";
    $username = "root";
    $password_db = ""; // Cambia esto según tu configuración
    $dbname = "base_paginaweb2";

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Corrige el nombre de la columna en la consulta SQL
    $sql = "SELECT nom_usuario FROM usuario WHERE correo = '$email'";

    try {
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $username = $row['nom_usuario'];

            // Devolver el nombre de usuario como respuesta JSON
            echo json_encode(['username' => $username]);
        } else {
            echo json_encode(['error' => 'Usuario no encontrado']);
        }
    } catch (Exception $e) {
        echo json_encode(['error' => 'Error en la consulta']);
    }

    $conn->close();
} else {
    echo json_encode(['error' => 'No se proporcionó el correo electrónico']);
}
?>
