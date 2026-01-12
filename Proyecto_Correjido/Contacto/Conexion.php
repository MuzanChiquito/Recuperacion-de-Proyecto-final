








<?php
$host = "localhost";
$usuario = "root";
$password = "";
$bd = "seguridad_vial";

$conexion = new mysqli($host, $usuario, $password, $bd);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>