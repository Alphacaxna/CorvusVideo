<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Corvusvideo</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/formulario.css">
    <form class="contact-form" action="contacto.php" method="post">
    <!-- ... tus campos de formulario ... -->
    <!-- <button class="form-submit" type="submit">Enviar mensaje</button> -->
</form>
</head>
<body>
    

<header class="header">
        <div class="menu container">
            <a href="#" class="logo">CorvusVideo</a>
 
            <label for="menu">
                <img src="img/corvus.png" class="menu-icono" alt="menu">
            </label>
            
            <?php include 'inicio.php'; ?>
            
            
            <!-- <button class="btn-1" id="showRegisterForm1">Registro</button> -->
        </div>

        <div class="header-content container">
            <h1>Bienvenido a CorvusVideo</h1>
            <p>Disfruta de nuestro contenido exclusivo de películas y series.</p>
        </div>
    </header> <main class="container">
        
    
        
        <h2>ESTRENOS EN NUESTRA PAGINA </h2>
            
        <?php include 'estrenos.php';?>
    
</body>
</html>