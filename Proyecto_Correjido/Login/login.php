








<?php
session_start();
if (!empty($_SESSION['usuario'])) {
    header("Location: ../inicio.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="icon" type="acc-img" href="../LogoPagina.png">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">
</head>
<body class="bg-light">
<style>
    body {
        background-image: url('../Yael.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        min-height: 100vh;
    }

    .overlay {
        background-color: rgba(0, 0, 0, 0.55);
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .card {
        border-radius: 15px;
    }
</style>

<div class="overlay">
    <div class="container">
        <div class="card mx-auto shadow" style="max-width:400px;">
            <div class="card-body">

                <h4 class="text-center text-dark">Iniciar Sesión</h4>

                <form action="validar_login.php" method="POST">
                    <input type="email" name="email" class="form-control mb-2" placeholder="Correo" required>
                    <input type="password" name="password" class="form-control mb-2" placeholder="Contraseña" required>
                    <button class="btn btn-success w-100">Entrar</button>
                </form>

                <p class="text-center mt-2">
                    ¿No tienes cuenta? <a href="registro.php">Regístrate</a>
                </p>

            </div>
        </div>
    </div>
</div>


</body>
</html>
