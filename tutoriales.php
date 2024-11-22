<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corvusvideo - Tutoriales</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-color: black;
            color: white;
        }
        .tutorial {
            margin-bottom: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #333;
        }
        .tutorial h2 {
            margin-top: 0;
        }
        .tutorial p {
            margin-bottom: 0;
        }
        .tutorial iframe {
            width: 100%;
            height: 400px;
        }
    </style>
</head>
<body>

<header class="header">
    <div class="menu container">
        <a href="#" class="logo">CorvusVideo</a>
 
        <label for="menu">
            <img src="img/corvus.png" class="menu-icono" alt="menu">
        </label>
        
        <?php include 'inicio.php'; ?>
    </div>

    <div class="header-content container">
        <h1>Tutoriales</h1>
        <p>Aprende con nuestros tutoriales.</p>
    </div>
</header>

<main class="container">
    <div class="tutorial">
        <h2>Creacion de pagina web con php y mysql</h2>
        <p>En este tutorial aprenderás los conceptos básicos de php y mysql.</p>
        <iframe width="853" height="480" src="https://www.youtube.com/embed/IZHBMwGIAoI" title="Sitio WEB con php y mysql" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>    </div>

    <div class="tutorial">
        <h2>TComo conectarse a una base de datos de MySQL en PHP</h2>
        <p>Descubre cómo realizar base de datos en xampp la conexion de php a la base de datos.</p>
        <iframe width="853" height="480" src="https://www.youtube.com/embed/44ahkqRZwLw" title="Como conectarse a una base de datos de MySQL en PHP" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>    </div>

    <!-- Agrega más tutoriales aquí -->

</main>

</body>
</html>
