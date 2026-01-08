<?php
include("conexion.php");
$resultado = $conexion->query("SELECT * FROM accidentes ORDER BY fecha DESC");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Accidentes de Motocicleta</title>
    <link rel="icon" type="acc-img" href="../LogoPagina.png">
    <link href="../CSS/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f4f4f4;
        }
        h1 {
            text-align: center;
            color: #8B0000;
            margin: 30px 0;
            text-shadow: 2px 2px 4px #c7a297;
        }
        .card {
            border-left: 6px solid #8b1313;
            box-shadow: 0 4px 15px rgba(139, 0, 0, 0.15);
            transition: transform .3s;
        }
        .card:hover {
            transform: scale(1.02);
        }
        .label {
            font-weight: bold;
            color: #8b1313;
        }
        .acc-img {
            height: 180px;
            object-fit: cover;
        }
        footer {
            background-color: #222;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 30px;
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
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:#662532;">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <img src="../LogoPagina.png" height="80" width="80">
            <img src="../logo.png" height="80px" width="210">
            <div class="collapse navbar-collapse" id="menu">
                
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="http://localhost/ProyectoFinal/Pruevas/inicio.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Tipos de cascos y Practicas de Manejo/practicasmanejo.html">Prácticas Seguras</a></li>
                    <li class="nav-item"><a class="nav-link" href="http://localhost/ProyectoFinal/Pruevas/Tipos%20de%20cascos%20y%20Practicas%20de%20Manejo/Tipos%20de%20casco.php">Tipos de Cascos</a></li>
                    <li class="nav-item"><a class="nav-link" href="../Contacto/contacto.html">Contacto</a></li>
                </ul>
            </div>

        </div>
    </nav>

<h1>Accidentes de Motocicleta</h1>

<div class="container">

<?php while($row = $resultado->fetch_assoc()) { ?>
    <div class="card mb-4">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="<?php echo $row['imagen']; ?>" class="img-fluid acc-img rounded-start">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <p><span class="label">ID:</span> <?php echo $row['id']; ?></p>
                    <p><span class="label">Fecha:</span> <?php echo $row['fecha']; ?></p>
                    <p><span class="label">Motociclista:</span> <?php echo $row['motociclista']; ?></p>
                    <p><span class="label">Descripción:</span> <?php echo $row['descripcion']; ?></p>
                    <p><span class="label">Gravedad:</span> <?php echo $row['gravedad']; ?></p>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

</div>

<footer>
    <p>Proyecto escolar - Seguridad Vial para Motociclistas | Equipo Base</p>
</footer>

<script src="../JS/bootstrap.bundle.min.js"></script>
</body>
</html>