<?php
include 'db.php';
session_start();

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM emergencias WHERE id=$id");
$data = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];
    $descripcion = $_POST['descripcion'];
    $ubicacion = $_POST['ubicacion'];
    $nivel_peligro = $_POST['nivel_peligro'];

    $sql = "UPDATE emergencias SET tipo='$tipo', descripcion='$descripcion', ubicacion='$ubicacion',
            nivel_peligro='$nivel_peligro' WHERE id=$id";
    $conn->query($sql);
    header("Location: dashboard.php");
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Editar Emergencia</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <h2>Editar Emergencia</h2>
    <form method="POST">
        <input type="text" name="tipo" value="<?= $data['tipo'] ?>" required>
        <textarea name="descripcion" required><?= $data['descripcion'] ?></textarea>
        <input type="text" name="ubicacion" value="<?= $data['ubicacion'] ?>">
        <select name="nivel_peligro" required>
            <option <?= $data['nivel_peligro']=='Bajo'?'selected':'' ?>>Bajo</option>
            <option <?= $data['nivel_peligro']=='Medio'?'selected':'' ?>>Medio</option>
            <option <?= $data['nivel_peligro']=='Alto'?'selected':'' ?>>Alto</option>
        </select>
        <button type="submit">Actualizar</button>
    </form>
</div>
</body>
</html>
