<?php
session_start();
$username = "";

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
?>
    <link rel="stylesheet" href="css/formulario.css">

    
</head>
<body>

<nav class="navbar">
        <ul>
        
            <li><a href="index.php">Inicio</a></li>
            <li><a href="peliculas.php">Películas</a></li>
            <li><a href="tutoriales.php">Tutoriales</a></li>
            <li><a href="series.php">Series</a></li>
            <li><a href="documentos.php">Documentos</a></li>
            <li><a href="nosotros.php">Nosotros</a></li>
            <li><a href="contacto.php">Contacto</a></li>
        </ul>
    </nav>
 
   
    <style>
    .user-info {
        display: flex;
        align-items: center;
        background-color: #f5f5f5;
        padding: 5px 10px;
        border-radius: 15px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .user-info img {
        width: 30px;
        height: 30px;
        border-radius: 50%;  /* Esto hará que la imagen sea circular */
        margin-right: 5px;
    }

    .user-info span {
        color: #000;  /* Color negro para el texto de "Invitado" */
        font-size: 0.9em;
    }

    .user-info span a {
        text-decoration: none;
        color: #333;
        font-weight: bold;
        transition: color 0.2s;
    }

    .user-info span a:hover {
        color: #555;
    }
</style>


<div class="user-info">
    <img src="img/perfil.png" alt="Usuario">
    <span>
        <?php
            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                echo '<a href="user_dashboard.php">' . $_SESSION['username'] . '</a>';
            } else {
                echo 'Invitado';
            }
        ?>
    </span>
</div>


<style>
    body {
        background-color: black;
        color: white;
    }
    .user-info {
        display: flex;
        align-items: center;
    }
    .user-info img {
        width: 50px;
        height: 50px;
        margin-right: 10px;
    }
</style>


<form action="buscar_peliculas.php" method="get">
    <input type="text" name="consulta" placeholder="Buscar películas...">
    <button type="submit">Buscar</button>
</form>
<style>
    /* Estilo base para ambos botones */
    .btn-1, .logout-button {
        padding: 5px 10px; /* padding reducido */
        border: none;
        border-radius: 15px; /* radio de la esquina reducido */
        font-size: 0.8em; /* tamaño de fuente reducido */
        cursor: pointer;
        transition: background-color 0.3s, color 0.3s;
        text-decoration: none;
    }

    /* Diseño para el botón de inicio de sesión */
    .btn-1 {
        background-color: #3498DB;  /* Azul */
        color: #FFF;
    }

    .btn-1:hover {
        background-color: #2980B9;  /* Azul más oscuro */
    }

    /* Diseño para el botón de cerrar sesión */
    .logout-button {
        background-color: #E74C3C;  /* Rojo */
        color: #FFF;
    }

    .logout-button:hover {
        background-color: #C0392B;  /* Rojo más oscuro */
    }
</style>


       <!-- Botón que abre el modal de inicio de sesión -->
       <?php if (isset($_SESSION['username']) && $_SESSION['username'] != ""): ?>
        <a href="logout.php" class="logout-button">Cerrar Sesión</a>
<?php else: ?>
    <button class="btn-1" id="loginBtn">Iniciar sesión</button>
<?php endif; ?>

<div class="modal" id="loginModal">
    <div class="modal-content">
        <span class="close-modal" id="closeLoginModal">×</span>
        <h2>Iniciar sesión</h2>
       <form action="user_login.php" method="post">
    <label for="email">Correo Electrónico:</label>
    <input type="email" id="email" name="email" required>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password" required>
    <button type="submit">Iniciar Sesión</button>
</form>

        <p>¿No tienes una cuenta? <a href="#" id="showRegisterForm1">Registrarse</a></p>
        <li><a href="login.php">Admin</a></li>
    </div>
</div>



    
    <!-- Ventana emergente de registro -->
    <div class="modal" id="registerModal">
        <div class="modal-content">
            <span class="close-modal" id="closeRegisterModal">×</span>
            <h2>Registrarse</h2>
            <form id="registerForm" action="registro1.php" method="post">
                <label for="fullname">Nombre completo:</label>
                <input type="text" id="fullname" name="fullname" required>
                <label for="paternal">Apellido paterno:</label>
                <input type="text" id="paternal" name="paternal" required>
                <label for="maternal">Apellido materno:</label>
                <input type="text" id="maternal" name="maternal" required>
                <label for="studentId">Número de matrícula:</label>
                <input type="text" id="studentId" name="studentId" required>
                <label for="registerEmail">Correo electrónico:</label>
                <input type="email" id="registerEmail" name="registerEmail" required>
                <label for="registerPassword">Contraseña:</label>
                <input type="password" id="registerPassword" name="registerPassword" required>
                <label for="sex">Sexo:</label>
                <select id="sex" name="sex">
                    <option value="male">Hombre</option>
                    <option value="female">Mujer</option>
                </select>
                <button type="submit">Registrarse</button>
            </form>
        </div>
    </div>
    <div class="modal" id="agradecimientoModal">
    <div class="modal-content">
        <span class="close-modal" id="closeAgradecimientoModal">×</span>
        <h2>Gracias por registrarte en CorvusVideo</h2>
        <p> Disfruta todo nuestro contenido</p>

    <!-- Agrega tus enlaces a scripts JavaScript aquí -->
    <script src="jss/script.js"></script>
    <script>
    var errorMessage = "<?php echo addslashes($errorMessage); ?>";
    var welcomeMessage = "<?php echo addslashes($welcomeMessage); ?>";

    if (welcomeMessage !== "Bienvenido a Corvusvideo") {
        var loginModal = document.getElementById("loginModal");
        loginModal.style.display = "block";
    }
</script>
</body>
</html>

