<?php
$host = "127.0.0.1";
$user = "root";
$pass = "";
$dbname = "plataforma_emergencias";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
