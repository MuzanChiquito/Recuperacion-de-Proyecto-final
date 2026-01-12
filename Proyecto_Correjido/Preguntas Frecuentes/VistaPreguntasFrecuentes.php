










<?php
session_start();
include("Conexion.php");

// ELIMINAR (solo admin)
if (isset($_POST['eliminar']) && isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {
    $id = $_POST['id'];
    $conexion->query("DELETE FROM preguntas_frecuentes WHERE id = $id");
}

// AGREGAR (solo admin)
if (isset($_POST['agregar']) && isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {
    $pregunta = $_POST['pregunta'];
    $respuesta = $_POST['respuesta'];

    $sql = "INSERT INTO preguntas_frecuentes (pregunta, respuesta)
            VALUES ('$pregunta', '$respuesta')";
    $conexion->query($sql);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Preguntas Frecuentes</title>
    <link rel="icon" type="acc-img" href="../LogoPagina.png">
    <link rel="stylesheet" href="VistaPreguntasFrecuentes.css">
</head>
<body>

<header>
    <h1>Preguntas Frecuentes sobre Motocicletas</h1>
</header>

<a href="../inicio.php" class="btn-volver">⬅ Volver al inicio</a>

<section class="faq">

<?php
$resultado = $conexion->query("SELECT * FROM preguntas_frecuentes");

while ($fila = $resultado->fetch_assoc()) {
    echo "
    <div class='pregunta'>
        <h2>{$fila['pregunta']}</h2>
        <p>{$fila['respuesta']}</p>
    ";

    if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {
        echo "
        <form method='POST' onsubmit=\"return confirm('¿Eliminar esta pregunta?');\">
            <input type='hidden' name='id' value='{$fila['id']}'>
            <button type='submit' name='eliminar' class='btn-eliminar'>
                Eliminar
            </button>
        </form>
        ";
    }

    echo "</div>";
}
?>

</section>

<?php if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') { ?>
<section class="admin-faq">
    <h2>Agregar nueva pregunta</h2>

    <form method="POST">
        <input type="text" name="pregunta" placeholder="Pregunta" required>
        <textarea name="respuesta" placeholder="Respuesta" required></textarea>
        <button type="submit" name="agregar">Agregar</button>
    </form>
</section>
<?php } ?>

</body>
<style>
    /* Panel admin FAQ */
.admin-faq {
    max-width: 900px;
    margin: 40px auto;
    background-color: rgba(255,255,255,0.95);
    border-radius: 12px;
    padding: 25px 30px;
    box-shadow: 0 8px 22px rgba(0,0,0,0.3);
}

.admin-faq h2 {
    margin-top: 0;
    margin-bottom: 15px;
    color: #7a0c25;
    text-align: center;
}

/* Inputs admin */
.admin-faq input,
.admin-faq textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 15px;
    border-radius: 8px;
    border: 1px solid #ccc;
    font-size: 15px;
    resize: none;
}

.admin-faq input:focus,
.admin-faq textarea:focus {
    outline: none;
    border-color: #7a0c25;
}

/* Botón agregar */
.admin-faq button {
    width: 100%;
    padding: 12px;
    background-color: #7a0c25;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.admin-faq button:hover {
    background-color: #5c081c;
}

</style>
</html>

