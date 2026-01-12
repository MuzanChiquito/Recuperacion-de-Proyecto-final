







<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../../inicio.php");
    exit();
}


include("../Conexion.php");

$id = $_POST['id'];

$sql = "DELETE FROM contacto_reportes WHERE id = $id";
$conexion->query($sql);

header("Location: admin-contacto.php");
exit();