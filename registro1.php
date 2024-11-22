<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "base_paginaweb2";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    $registroExitoso = false;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullname = $_POST["fullname"];
        $paternal = $_POST["paternal"];
        $maternal = $_POST["maternal"];
        $studentId = $_POST["studentId"];
        $email = $_POST["registerEmail"];
        $password = $_POST["registerPassword"];
        $sex = $_POST["sex"];

        $insertQuery = "INSERT INTO usuarios (nom_usuario, ap_paterno, ap_materno, matricula, correo, contraseña, sexo) 
                        VALUES ('$fullname', '$paternal', '$maternal', '$studentId', '$email', '$password', '$sex')";

        if ($conn->query($insertQuery) === TRUE) {
            $registroExitoso = true;
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }

    $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
    <?php include 'index.php';?>
</head>
<body>
    <!-- Resto de tu contenido HTML -->

    <!-- Ventana emergente de agradecimiento -->
    <?php if ($registroExitoso): ?>
        <div class="modal" id="agradecimientoModal">
            <div class="modal-content">
                <h2>Gracias por registrarte en CorvusVideo</h2>
                <p>Disfruta todo nuestro contenido</p>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", () => {
                const agradecimientoModal = document.getElementById('agradecimientoModal');

                // Función para mostrar la ventana emergente de agradecimiento
                function showAgradecimientoModal() {
                    agradecimientoModal.style.display = 'block';
                    setTimeout(() => {
                        window.location.href = 'index.php'; // Cambia esto a la URL de tu página principal
                    }, 2000); // 2000 milisegundos (2 segundos)
                }

                // Mostrar la ventana emergente de agradecimiento
                showAgradecimientoModal();
            });
        </script>
    <?php endif; ?>
</body>
</html>
