<?php
include 'db.php';
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
}

$usuario_id = $_SESSION['usuario_id'];
$result = $conn->query("SELECT * FROM emergencias WHERE usuario_id=$usuario_id");
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Panel de Control</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Bienvenido, <?php echo $_SESSION['nombre']; ?> 👋</h1>
<a href="logout.php" class="logout">Cerrar sesión</a>
<a href="add_emergency.php" class="btn">Reportar Emergencia</a>

<table>
<tr>
    <th>ID</th>
    <th>Tipo</th>
    <th>Descripción</th>
    <th>Ubicación</th>
    <th>Nivel</th>
    <th>Fecha</th>
    <th>Acciones</th>
</tr>

<?php while ($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['tipo'] ?></td>
    <td><?= $row['descripcion'] ?></td>
    <td><?= $row['ubicacion'] ?></td>
    <td><?= $row['nivel_peligro'] ?></td>
    <td><?= $row['fecha'] ?></td>
    <td>
        <a href="edit_emergency.php?id=<?= $row['id'] ?>">✏️</a> |
        <a href="delete_emergency.php?id=<?= $row['id'] ?>">🗑️</a>
    </td>
</tr>
<?php endwhile; ?>
</table>
</body>
</html>
