








<?php
include("conexion.php");
$id = $_GET['id'];
$conexion->query("DELETE FROM accidentes WHERE id=$id");
header("Location: accidentes.php");
