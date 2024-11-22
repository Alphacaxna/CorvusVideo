
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corvusvideo - Contacto</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-color: #141414;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        header {
            background-color: #1f1f1f;
            padding: 1rem 0;
            text-align: center;
        }

        .menu {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 1rem;
        }

        .logo {
            font-size: 24px;
            text-decoration: none;
            color: white;
        }

        .menu-icono {
            width: 24px;
            height: 24px;
            cursor: pointer;
        }

        .header-content {
            text-align: center;
            padding: 2rem 0;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .contact-section {
            text-align: center;
            padding: 4rem 0;
        }

        .contact-title {
            font-size: 36px;
            margin-bottom: 1rem;
        }

        .contact-description {
            font-size: 18px;
            margin-bottom: 2rem;
        }

        .contact-form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .form-input {
            width: 100%;
            padding: 1rem;
            margin: 0.5rem 0;
            background-color: #252525;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
        }

        .form-input::placeholder {
            color: #888;
        }

        .form-input:focus {
            outline: none;
            border-color: #ffa600;
        }

        .form-submit {
            background-color: #ffa600;
            color: black;
            font-weight: bold;
            padding: 1rem 2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-submit:hover {
            background-color: #ff7b00;
        }

        .contact-footer {
            padding-top: 2rem;
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <div class="menu container">
        <a href="#" class="logo">CorvusVideo</a>
        <label for="menu">
            <img src="img/corvus.png" class="menu-icono" alt="menu">
        </label>
        <?php include 'inicio.php'; ?>
    </div>
    <div class="header-content container">
        <h1>Contacto</h1>
        <p>¿Tienes preguntas? ¡Contáctanos!</p>
    </div>
</header>

<main class="container">
    <div class="contact-section">
        <div class="contact-title">¡Ponte en contacto con nosotros!</div>
        <div class="contact-description">Estamos aquí para responder a todas tus preguntas.</div>
        <form class="contact-form" action="#" method="post">
            <input class="form-input" type="text" name="name" placeholder="Nombre" required>
            <input class="form-input" type="email" name="email" placeholder="Correo electrónico" required>
            <textarea class="form-input" name="message" placeholder="Escribe tu mensaje aquí" rows="5" required></textarea>
            <button class="form-submit" type="submit">Enviar mensaje</button>
        </form>
        <div class="contact-footer">
            <p>También puedes encontrarnos en redes sociales:</p>
            <a href="https://www.facebook.com/profile.php?id=100076435456455" class="social-link">Facebook</a>
            
            <a href="https://www.instagram.com/jr.ortega05/" class="social-link">Instagram</a>
        </div>
    </div>
</main>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Configuración para enviar el correo
    $to = "al222210681@gmail.com"; // Cambia esto a la dirección de correo deseada
    $subject = "Nuevo mensaje de contacto desde CorvusVideo";
    $headers = "From: $email";

    // Enviar el correo
    $mailSent = mail($to, $subject, $message, $headers);

    if ($mailSent) {
        echo "Mensaje enviado exitosamente. Gracias por contactarnos.";
    } else {
        echo "Hubo un error al enviar el mensaje. Por favor, inténtalo de nuevo más tarde.";
    }
}
?>


</body>
</html>
