<?php include("Conexion.php"); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Preguntas Frecuentes</title>
    <link rel="stylesheet" href="VistaPreguntasFrecuentes.css">
    <link rel="icon" type="acc-img" href="../LogoPagina.png">
</head>
<body>

<header>
    <h1>Preguntas Frecuentes sobre Motocicletas</h1>
</header>
<a href="../inicio.php" class="btn-volver">
    ⬅ Volver al inicio
</a>
<section class="faq">

<?php
$resultado = $conexion->query("SELECT * FROM preguntas_frecuentes");

while ($fila = $resultado->fetch_assoc()) {
    echo "
    <div class='pregunta'>
        <h2>{$fila['pregunta']}</h2>
        <p>{$fila['respuesta']}</p>
    </div>
    ";
}
?>

</section>

</body>
</html>
