









<?php
include("conexion.php");

$fecha = $_POST['fecha'];
$motociclista = $_POST['motociclista'];
$descripcion = $_POST['descripcion'];
$gravedad = $_POST['gravedad'];

$imagen = $_FILES['imagen']['name'];
$ruta = "uploads/" . $imagen;
move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

$sql = "INSERT INTO accidentes (fecha, motociclista, descripcion, gravedad, imagen)
        VALUES (?,?,?,?,?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("sssss", $fecha, $motociclista, $descripcion, $gravedad, $ruta);
$stmt->execute();

header("Location: accidentes.php");
