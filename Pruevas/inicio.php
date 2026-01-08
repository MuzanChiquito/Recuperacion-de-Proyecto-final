












<?php
session_start();

if (empty($_SESSION['usuario'])) {
    header("Location: Login/login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seguridad Vial para Motociclistas</title>
    <link rel="icon" type="acc-img" href="LogoPagina.png">
    <link href="CSS/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: url('accidentes-de-motos-mas-comunes.jpg') no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, Helvetica, sans-serif;
        }

        .overlay {
            background-color: rgba(0,0,0,0.55);
            min-height: 100vh;
            padding-bottom: 40px;
        }

        header {
            background-color: rgba(148, 29, 29, 0.9);
            color: white;
            padding: 25px 0;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.4);
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
            background-color: rgba(255,255,255,0.92);
            margin-top: 30px;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.35);
        }

        footer {
            background-color: rgba(0,0,0,0.85);
            color: white;
            padding: 15px;
            text-align: center;
            margin-top: 40px;
        }
    </style>
</head>

<body>
<div class="overlay">

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#662532;">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <img src="LogoPagina.png" height="80" width="80">
            <img src="logo.png" height="80px" width="210">
            <div class="collapse navbar-collapse" id="menu">
                
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="Tipos de cascos y Practicas de Manejo/practicasmanejo.html">Prácticas Seguras</a></li>
                    <li class="nav-item"><a class="nav-link" href="http://localhost/ProyectoFinal/Pruevas/Tipos%20de%20cascos%20y%20Practicas%20de%20Manejo/Tipos%20de%20casco.php">Tipos de Cascos</a></li>
                    <li class="nav-item"><a class="nav-link" href="Contacto/contacto.html">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="http://localhost/ProyectoFinal/Pruevas/Accidentes/accidentes.php">Accidentes</a></li>
                    <li class="nav-item"><a class="nav-link" href="Login/cerrar_sesion.php">Cerrar sesión</a></li>
                </ul>
            </div>

        </div>
    </nav>

    <main class="container my-5">
        <div class="row align-items-center bg-white rounded-4 shadow-lg p-4 p-md-5">
    
            <div class="col-md-6">
                <span class="text-uppercase fw-bold" style="color:#941d1d; letter-spacing:2px;">
                    Seguridad Vial
                </span>
    
                <h2 class="fw-bold mt-2 mb-3">
                    Bienvenidos
                </h2>
    
                <p>
                    Este sitio web ha sido desarrollado por estudiantes del <strong>CBTIS217</strong> de la especialidad de programación con el objetivo de promover 
                    la <strong>seguridad vial para motociclistas</strong>, brindando información clara, accesible y útil para prevenir accidentes y mantener una seguridad alta para los estudiantes.
                </p>
    
                <h5 class="fw-bold mt-4">Objetivo del Proyecto</h5>
    
                <p>
                    Compartir conocimientos esenciales sobre la conducción segura, normativa vial, uso correcto
                    del casco y otros elementos fundamentales para proteger la vida de los motociclistas y en este caso, la de los estudiantes.
                </p>
    
                <div class="mt-4">
                    <a href="Tipos de cascos y Practicas de Manejo/practicasmanejo.html" 
                       class="btn btn-danger btn-lg me-3">
                        Prácticas Seguras
                    </a>
    
                    <a href="http://localhost/ProyectoFinal/Pruevas/Preguntas%20Frecuentes/VistaPreguntasFrecuentes.php"
                       class="btn btn-outline-danger btn-lg">
                        Más Información
                    </a>
                </div>
            </div>
    
            <div class="col-md-6 text-center mt-4 mt-md-0">
                <img src="Seguro-de-moto.jpg" 
                     class="img-fluid rounded-4 shadow"
                     alt="Motociclista responsable">
            </div>
    
        </div>
    </main>

    <section class="container my-5" id="Normas_Viales">
        <div class="bg-white rounded-4 shadow-lg p-4 p-md-5">
    
            <div class="text-center mb-5">
                <span class="text-uppercase fw-bold" style="color:#941d1d; letter-spacing:2px;">
                    Información Importante
                </span>
                <h2 class="fw-bold mt-2">Normativas Viales para Motociclistas</h2>
                <p class="text-muted mt-3">
                    Conocer y respetar las normas viales es fundamental para reducir accidentes y proteger la vida
                    de todos los usuarios de la vía pública.
                </p>
            </div>
    
            <div class="row g-4">
    
                <div class="col-md-4">
                    <div class="h-100 border rounded-4 p-4 shadow-sm">
                        <h5 class="fw-bold" style="color:#941d1d;">Uso obligatorio del casco</h5>
                        <p>
                            Todo motociclista debe portar casco de seguridad certificado y correctamente abrochado,
                            ya que es el principal elemento de protección ante accidentes.
                        </p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="h-100 border rounded-4 p-4 shadow-sm">
                        <h5 class="fw-bold" style="color:#941d1d;">Respeto a los límites de velocidad</h5>
                        <p>
                            Circular dentro de los límites establecidos permite una mejor reacción ante imprevistos
                            y reduce considerablemente la gravedad de los accidentes.
                        </p>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="h-100 border rounded-4 p-4 shadow-sm">
                        <h5 class="fw-bold" style="color:#941d1d;">Señalamientos y semáforos</h5>
                        <p>
                            Respetar señales de tránsito y semáforos garantiza un flujo vial seguro y evita colisiones
                            con peatones y otros vehículos.
                        </p>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="h-100 border rounded-4 p-4 shadow-sm">
                        <h5 class="fw-bold" style="color:#941d1d;">Documentación en regla</h5>
                        <p>
                            Es obligatorio portar licencia de conducir vigente, tarjeta de circulación y seguro
                            para poder transitar legalmente.
                        </p>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="h-100 border rounded-4 p-4 shadow-sm">
                        <h5 class="fw-bold" style="color:#941d1d;">No usar el celular al conducir</h5>
                        <p>
                            El uso del teléfono móvil mientras se conduce aumenta el riesgo de accidentes y está
                            prohibido por la normativa vial.
                        </p>
                    </div>
                </div>
    
                <div class="col-md-4">
                    <div class="h-100 border rounded-4 p-4 shadow-sm">
                        <h5 class="fw-bold" style="color:#941d1d;">Respeto a peatones y ciclistas</h5>
                        <p>
                            Los motociclistas deben ceder el paso cuando corresponda y mantener una conducción
                            responsable y preventiva.
                        </p>
                    </div>
                </div>
    
            </div>
        </div>
        <p class="text-center mt-5 fw-bold" style="font-size:32px; color:#ffffff;">
            “Tu vida es lo más importante. Maneja con responsabilidad y protege tu integridad.”
        </p>
    </section>

    <footer>
        <p>Proyecto escolar - Seguridad Vial para Motociclistas | Equipo Base</p>
    </footer>

</div>

<script src="JS/bootstrap.bundle.min.js"></script>

</body>
</html>

