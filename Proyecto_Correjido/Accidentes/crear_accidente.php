









<?php
session_start();
if ($_SESSION['rol'] !== 'admin') {
    header("Location: accidentes.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Accidente</title>
    <link rel="icon" type="acc-img" href="../LogoPagina.png">
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url(../istockphoto-1473215899-612x612.jpg);
            background-position: center;
        }
    </style>
</head>
<body class="bg-light">

<div class="container mt-5">
    <h3>Agregar Accidente</h3>

    <form action="guardar_accidente.php" method="POST" enctype="multipart/form-data">
        <input type="date" name="fecha" class="form-control mb-2" required>
        <input type="text" name="motociclista" class="form-control mb-2" placeholder="Motociclista" required>
        <textarea name="descripcion" class="form-control mb-2" placeholder="Descripción" required></textarea>

        <select name="gravedad" class="form-control mb-2" required>
            <option>Baja</option>
            <option>Media</option>
            <option>Alta</option>
        </select>

        <input type="file" name="imagen" class="form-control mb-3" required>

        <button class="btn btn-danger">Guardar</button>
        <a href="accidentes.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>
