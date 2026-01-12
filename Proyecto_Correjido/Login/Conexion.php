









<?php
$conexion = new mysqli(
    "localhost",
    "root",
    "",
    "usuarios_login"
);

if ($conexion->connect_error) {
    die("Error de conexión");
}
?>
