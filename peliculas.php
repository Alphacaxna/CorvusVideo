<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corvusvideo</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-color: black;
            color: white;
        }
        .movie-container {
            display: flex;
            gap: 5px;
        }
        .movie {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            flex: 1;
        }
        .movie img {
            max-width: 100%;
        }
        .movie-title {
            margin-top: 10px;
        }
        .watch-link {
            margin-top: 20px;
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
        <h1>Peliculas</h1>
        <p>Disfruta de nuestro contenido exclusivo de películas.</p>
    </div>
</header>

<?php
// Conexión y consulta a la base de datos
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';
$dbName = 'base_paginaweb2';
$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

$sql = "SELECT * FROM peliculas";
$result = $conn->query($sql);

$peliculas = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $peliculas[] = $row;
    }
}

$conn->close();
?>

<main class="container">
    <div class="movie-container">
        <?php foreach ($peliculas as $pelicula): ?>
            <div class="movie">
                <a href="#" onclick="mostrar(<?php echo $pelicula['id']; ?>)">
                    <img src="img/<?php echo $pelicula['imagen']; ?>" alt="<?php echo $pelicula['titulo']; ?>">
                </a>
                <a class="watch-link" href="#" onclick="mostrar(<?php echo $pelicula['id']; ?>)">
                    <p class="movie-title"><?php echo $pelicula['titulo']; ?></p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>
    <script src="jss/jspeli.js"></script>
   function mostrar(idPelicula) {
        // Aquí podrías hacer una llamada AJAX para cargar los detalles de la película
        // basado en el id de la película que proporcioné como "idPelicula".
    }
</script>
</body>
</html>
