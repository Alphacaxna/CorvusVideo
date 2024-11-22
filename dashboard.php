<!-- dashboard.php -->
<?php
session_start();

if (!isset($_SESSION['user_logged_in'])) {
    header("Location: user_login.php");
    exit;
}

include 'db_connection.php';

$id_usuario = $_SESSION['id_usuario'];

$query = "SELECT * FROM documentos_usuario WHERE id_usuario = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $id_usuario);
$stmt->execute();
$documentos = $stmt->get_result();
?>

<h1>Tus Documentos</h1>
<ul>
    <?php while ($documento = $documentos->fetch_assoc()) { ?>
        <li>
            <?php echo $documento['nombre_archivo']; ?>
            <a href="modificar_documento.php?id_archivo=<?php echo $documento['id_documento']; ?>">Modificar</a>
        </li>
    <?php } ?>
</ul>

