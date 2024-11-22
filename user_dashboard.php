<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: user_login.php");
    exit;
}

include 'db_connection.php';

$userId = $_SESSION['id_usuario'];
$query = "SELECT * FROM documentos WHERE id_usuario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $userId);
$stmt->execute();
$documentos = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(120deg, #f6d365, #fda085);
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        h1 {
            color: white;
            margin-top: 30px;
        }

        .dashboard-container {
            background-color: #ffffff;
            padding: 20px 25px;
            border-radius: 5px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 80%;
            max-width: 600px;
            margin-top: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #f4f4f4;
        }

        th {
            background-color: #f6d365;
            color: white;
        }

        tr:hover {
            background-color: #f4f4f4;
        }

        a.edit, a.delete {
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 3px;
        }

        a.edit {
            background-color: #4CAF50;
            color: white;
        }

        a.delete {
            background-color: #f44336;
            color: white;
        }

        a.edit:hover {
            background-color: #45a049;
        }

        a.delete:hover {
            background-color: #da190b;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            background-color: #3498DB;
            color: #ffffff;
            text-decoration: none;
            font-weight: bold;
            margin: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #2980B9;
        }

        .btn-group {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Bienvenido, <?php echo $_SESSION['username']; ?></h1>

    <div class="dashboard-container">
        <h2>Tus documentos</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre del Archivo</th>
                    <th>Fecha de Carga</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($documento = $documentos->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $documento['nombre_archivo'] . "</td>";
                    echo "<td>" . $documento['fecha_carga'] . "</td>";
                    echo "<td>";
                    echo "<a href='editar_documento.php?id=" . $documento['id_archivo'] . "' class='edit'>Editar</a> ";
                    echo "<a href='eliminar_documento.php?id=" . $documento['id_archivo'] . "' class='delete' onclick=\"return confirm('¿Estás seguro de que quieres eliminar este documento?')\">Eliminar</a>";
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="btn-group">
            <a class="btn" href="index.php">Inicio</a>
            <a class="btn" href="modificar_perfil.php">Modificar Correo/Nombre</a>
        </div>

        <a href="logout.php" style="display:block; margin-top: 20px; text-align:center; background-color:#f44336; padding: 10px 15px; color:white; text-decoration:none; border-radius: 4px;">Cerrar Sesión</a>
    </div>
</body>
</html>
