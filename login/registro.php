<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "base_paginaweb2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST["fullname"];
    $paternal = $_POST["paternal"];
    $maternal = $_POST["maternal"];
    $studentId = $_POST["studentId"];
    $email = $_POST["registerEmail"];
    $password = $_POST["registerPassword"];
    $sex = $_POST["sex"];

    $insertQuery = "INSERT INTO usuario (nom_usuario, ap_paterno, ap_materno, matricula, correo, contraseña, sexo) 
                    VALUES ('$fullname', '$paternal', '$maternal', '$studentId', '$email', '$password', '$sex')";

    if ($conn->query($insertQuery) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}

$conn->close();
?>
