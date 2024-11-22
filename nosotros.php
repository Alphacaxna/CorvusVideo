<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nosotros - CorvusVideo</title>
    <link rel="stylesheet" href="css/style.css">
   
    <!-- Agrega tus estilos personalizados aquí si es necesario -->
    <style>
        body {
            background-color: black;
            color: white;
        }

        .about-us {
            text-align: center;
            padding: 50px 0;
        }

        .about-us h2 {
            font-size: 36px;
        }

        .about-us p {
            font-size: 18px;
            margin: 20px 0;
        }

        .team {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            padding: 50px 0;
        }

        .team-member {
            width: 300px;
            margin: 20px;
            text-align: center;
        }

        .team-member img {
            max-width: 100%;
            border-radius: 50%;
        }

        .team-member h3 {
            font-size: 24px;
            margin: 10px 0;
        }

        .team-member p {
            font-size: 16px;
        }

        /* Agrega más estilos si es necesario */

    </style>
</head>
<body>
    <header class="header">
    <?php include 'inicio.php';?>
        <!-- Tu encabezado aquí -->
    </header>

    <main class="container">
        <section class="about-us">
            <h2>Sobre Nosotros</h2>
            <p>¡Bienvenidos a CorvusVideo! Somos un equipo apasionado por el cine y las series. Nuestro objetivo es brindarte un lugar donde puedas disfrutar de tus películas y programas favoritos de manera conveniente y emocionante.</p>
            <p>Nos esforzamos por ofrecer una amplia variedad de contenido para satisfacer todos los gustos y preferencias. Ya sea que te gusten los thrillers emocionantes, las comedias divertidas o los dramas conmovedores, ¡tenemos algo para ti!</p>
        </section>

        <section class="team">
            <div class="team-member">
                <img src="img/edmon.jpg" alt="Juan Pérez">
                <h3>Edmon Rojas </h3>
                <p>CEO y Fundador</p>
            </div>
            <div class="team-member">
                <img src="img/chilis.jpg" alt="María Rodríguez">
                <h3>Jose Raurl Flores</h3>
                <p>Diseñadora de Experiencia de Usuario</p>
            </div>
            <div class="team-member">
                <img src="img/yony.jpg" alt="Carlos Gómez">
                <h3>Ricardo Caxnajoy</h3>
                <p>Desarrollador Frontend</p>
            </div>
           
            <!-- Agrega más miembros del equipo si es necesario -->
        </section>

        <!-- Puedes agregar más secciones según tus necesidades -->

    </main>

    <footer class="footer">
        <!-- Tu pie de página aquí -->
    </footer>

    <!-- Agrega tus enlaces a scripts JavaScript aquí si es necesario -->

</body>
</html>
