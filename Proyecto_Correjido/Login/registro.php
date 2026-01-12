<?php
session_start();

if (isset($_SESSION['usuario'])) {
    header("Location: ../inicio.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
    <link rel="icon" type="acc-img" href="../LogoPagina.png">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card mx-auto" style="max-width:400px;">
        <div class="card-body">
            <h4 class="text-center">Registro</h4>

            <form action="guardar_usuario.php" method="POST">
                <input type="text" name="nombre" class="form-control mb-2" placeholder="Nombre" required>
                <input type="email" name="email" class="form-control mb-2" placeholder="Correo" required>
                <input type="password" name="password" class="form-control mb-2" placeholder="Contraseña" required>
                <button class="btn btn-primary w-100">Registrarse</button>
            </form>

            <p class="text-center mt-2">
                ¿Ya tienes cuenta? <a href="login.php">Inicia sesión</a>
            </p>
        </div>
    </div>
</div>

</body>
</html>
