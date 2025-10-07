<?php
include 'db.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipo = $_POST['tipo'];
    $descripcion = $_POST['descripcion'];
    $ubicacion = $_POST['ubicacion'];
    $nivel_peligro = $_POST['nivel_peligro'];
    $usuario_id = $_SESSION['usuario_id'];

    $sql = "INSERT INTO emergencias (tipo, descripcion, ubicacion, nivel_peligro, usuario_id)
            VALUES ('$tipo', '$descripcion', '$ubicacion', '$nivel_peligro', $usuario_id)";
    $conn->query($sql);
    header("Location: dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Reportar Emergencia</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="form-container">
    <h2>Reportar Emergencia</h2>
    <form method="POST">
        <input type="text" name="tipo" placeholder="Tipo de emergencia" required>
        <textarea name="descripcion" placeholder="Descripción" required></textarea>
        <input type="text" name="ubicacion" placeholder="Ubicación">
        <select name="nivel_peligro" required>
            <option value="Bajo">Bajo</option>
            <option value="Medio">Medio</option>
            <option value="Alto">Alto</option>
        </select>
        <button type="submit">Guardar</button>
    </form>
</div>
</body>
</html>
