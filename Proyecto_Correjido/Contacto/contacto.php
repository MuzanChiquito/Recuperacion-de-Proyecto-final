








<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $motivo = $_POST['motivo'];
    $mensaje = $_POST['mensaje'];

    $sql = "INSERT INTO contacto_reportes (nombre, email, motivo, mensaje)
            VALUES ('$nombre', '$email', '$motivo', '$mensaje')";

    if ($conexion->query($sql)) {
        $enviado = true;
    }
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="icon" type="acc-img" href="../LogoPagina.png">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding-top: 110px;
        }

        nav .nav-link {
            position: relative;
            text-transform: uppercase;
        }

        nav .nav-link::after {
            content: "";
            position: absolute;
            left: 50%;
            bottom: 6px;
            width: 0;
            height: 2px;
            background-color: rgb(255, 255, 255);
            transition: all 0.3s ease;
            transform: translateX(-50%);
        }
        
        nav .nav-link:hover::after {
            width: 60%;
        }

        .contenedor {
            padding: 20px;
            background-color: white;
            margin: 20px auto;
            width: 90%;
            max-width: 900px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px #aaa;
        }

        footer {
            background-color: #222;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }

        .contenedor {
            padding: 20px;
            background-color: white;
            margin: 20px auto;
            width: 50%;
            max-width: 900px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px #aaa;
            font-size: large;
            font-family: Arial, Helvetica, sans-serif;
            text-align: center;
        }

        .btn-vino {
            background-color: #7a0c25;
            border-color: #7a0c25;
            color: white;
        }

        .btn-vino:hover {
            background-color: #5c081c;
            border-color: #5c081c;
        }

        .navbar-flotante {
            background-color: rgba(102, 37, 50, 0.95);
            backdrop-filter: blur(6px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.4);
            padding: 10px 0;
            z-index: 1000;
        }

    </style>
</head>

<body>
   
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top navbar-flotante" style="background-color:#662532;">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <img src="../LogoPagina.png" height="80" width="80">
            <img src="../logo.png" height="80px" width="210">
            <div class="collapse navbar-collapse" id="menu">
                
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="http://localhost/ProyectoFinal/Proyecto_Correjido/inicio.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Tipos de cascos y Practicas de Manejo/practicasmanejo.html">Prácticas Seguras</a></li>
                    <li class="nav-item"><a class="nav-link" href="http://localhost/ProyectoFinal/Proyecto_Correjido/Tipos%20de%20cascos%20y%20Practicas%20de%20Manejo/Tipos%20de%20casco.php">Tipos de Cascos</a></li>
                    <li class="nav-item"><a class="nav-link" href="http://localhost/ProyectoFinal/Proyecto_Correjido/Accidentes/accidentes.php">Accidentes</a></li>

                </ul>
            </div>

        </div>
    </nav>


    <div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 700px; border-left:6px solid #7a0c25;">
        <div class="card-body">
            <h2 class="text-center mb-3" style="color:#7a0c25;">Contacto y Reportes</h2>

            <?php if (isset($enviado)): ?>
                <div class="alert alert-success text-center">
                    Gracias por tu mensaje, nos ayudará a mejorar la seguridad vial.
                </div>
            <?php endif; ?>

            <p class="text-muted text-center mb-4">
                ¿Tienes una duda, sugerencia o quieres reportar una zona peligrosa?
            </p>

            <form method="POST" action="">
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" name="email" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Motivo</label>
                    <select class="form-select" name="motivo" required>
                        <option value="">Selecciona una opción</option>
                        <option>Consulta sobre cascos</option>
                        <option>Reporte de zona peligrosa</option>
                        <option>Otro</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mensaje</label>
                    <textarea class="form-control" name="mensaje" rows="4" required></textarea>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-vino">
                        Enviar mensaje
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>


    
<script src="../JS/bootstrap.bundle.min.js"></script>
</body>
<footer>
    <p>Proyecto escolar - Seguridad Vial para Motociclistas | Equipo Base</p>
</footer>
