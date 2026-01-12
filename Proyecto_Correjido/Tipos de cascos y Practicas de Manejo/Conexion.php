











<?php
$conexion = new mysqli(
    "localhost",
    "root",
    "",
    "cascos_motocicleta"
);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
