








<?php
session_start();
include("Conexion.php");

$esAdmin = false;

if (isset($_SESSION['rol']) && $_SESSION['rol'] === 'admin') {
    $esAdmin = true;
}


if (isset($_POST['eliminar']) && $esAdmin) {

    $id = $_POST['id_casco'];

    $sqlImg = "SELECT imagen FROM tipos_casco WHERE id_casco = $id";
    $resultadoImg = $conexion->query($sqlImg);
    $fila = $resultadoImg->fetch_assoc();

    if (file_exists($fila['imagen'])) {
        unlink($fila['imagen']);
    }

    $sqlDelete = "DELETE FROM tipos_casco WHERE id_casco = $id";
    $conexion->query($sqlDelete);
}


if (isset($_POST['agregar']) && $esAdmin) {

    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];

    // Cris Esta es la carpeta donde se van a guarder las imagenes ACUERDATE!!
    $carpeta = "imagenes_cascos/";

    if (!is_dir($carpeta)) {
        mkdir($carpeta, 0777, true);
    }

    $imagenNombre = time() . "_" . $_FILES['imagen']['name'];
    $rutaImagen = $carpeta . $imagenNombre;

    if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImagen)) {

        $sqlInsert = "INSERT INTO tipos_casco (nombre, descripcion, imagen)
                      VALUES ('$nombre', '$descripcion', '$rutaImagen')";

        $conexion->query($sqlInsert);
    }
}


$sql = "SELECT * FROM tipos_casco";
$resultado = $conexion->query($sql);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos de Cascos para Motocicleta</title>
    <link rel="icon" type="acc-img" href="../LogoPagina.png">
    <link rel="stylesheet" href="../CSS/bootstrap.min.css">

    <style>
        :root {
            --vino: #7a0c25;
            --vino-oscuro: #5c081c;
            --gris-claro: #f8f8f8;
        }

        body {
            background-color: var(--gris-claro);
            padding-top: 110px;
        }

        h2 {
            color: var(--vino);
        }

        .titulo-barra h1 {
            color: rgb(0, 0, 0);
            margin: 0;
            font-weight: 700;
            text-align: center;
        }

        .card {
            border-left: 6px solid var(--vino);
            border-radius: 6px;
        }

        .list-group-item {
            border: none;
            border-bottom: 1px solid #eee;
        }

        .list-group-item:last-child {
            border-bottom: none;
        }

        #container {
            max-width: 800px;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
        } 

        nav .nav-link {
            position: relative;
            text-decoration: none;
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

        footer {
            background-color: #222;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
        }

        .btn-vino {
            background-color: var(--vino);
            border-color: var(--vino);
            color: #fff;
        }

        .btn-vino:hover {
            background-color: var(--vino-oscuro);
            border-color: var(--vino-oscuro);
            color: #fff;
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
                    <li class="nav-item"><a class="nav-link" href="practicasmanejo.html">Practicas Seguras</a></li>
                    <li class="nav-item"><a class="nav-link" href="http://localhost/ProyectoFinal/Proyecto_Correjido/Contacto/contacto.php">Contacto</a></li>
                    <li class="nav-item"><a class="nav-link" href="http://localhost/ProyectoFinal/Proyecto_Correjido/Accidentes/accidentes.php">Accidentes</a></li>

                </ul>
            </div>

        </div>
    </nav>
</head>

<body>

<div class="container py-4" id="container">
    <div class="titulo-barra">
        <h1 class="fw-bold text-purple">Tipos de Cascos para Motocicleta</h1>
    </div>

    

        <p class="text-muted header-text text-center mt-2">
            Guía básica para elegir el casco adecuado
        </p>

<?php if ($esAdmin) { ?>
<div class="card shadow-sm mb-4 mt-3">
    <div class="card-body">
        <h2 class="h4 mb-3">Agregar nuevo casco</h2>

        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label">Nombre del casco</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Descripción</label>
                <textarea name="descripcion" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Imagen</label>
                <input type="file" name="imagen" class="form-control" accept="image/*" required>
            </div>

            <button type="submit" name="agregar" class="btn btn-vino">
                Agregar casco
            </button>
        </form>
    </div>
</div>
<?php } ?>


        <div class="card shadow-sm mb-4 mt-3">
            <div class="card-body">
                <h2 class="h4 mb-3">Cascos Principales</h2>

                <ul class="list-group list-group-flush">

                    <div class="row g-3">

                        <div class="row g-3">

<?php while($casco = $resultado->fetch_assoc()) { ?>

    <div class="col-12 col-md-6 d-flex justify-content-center">
    <div class="card" style="width: 18rem;">
        <img src="<?php echo $casco['imagen']; ?>" class="card-img-top">

        <div class="card-body">
            <p>
                <strong><?php echo $casco['nombre']; ?></strong><br>
                <?php echo $casco['descripcion']; ?>
            </p>

    <?php if ($esAdmin) { ?>
        <form method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este casco?');">
                <input type="hidden" name="id_casco" value="<?php echo $casco['id_casco']; ?>">
            <button type="submit" name="eliminar" class="btn btn-danger btn-sm">Eliminar</button>
        </form>
    <?php } ?>

        </div>
    </div>
    </div>

<?php } ?>

</div>

                </ul>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="h4 mb-3">Recomendaciones al Elegir un Casco</h2>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Verificar certificaciones como DOT, ECE o Snell.</li>
                    <li class="list-group-item">Asegurar un ajuste firme y cómodo sin puntos de presión.</li>
                    <li class="list-group-item">Escoger materiales resistentes y visor anti-rayas o antiempañante.</li>
                    <li class="list-group-item">Reemplazar el casco en caso de golpes fuertes o cada 5 años.</li>
                </ul>
            </div>
        </div>

    </div>
    <footer>
        <p>Proyecto escolar - Seguridad Vial para Motociclistas | Equipo Base</p>
    </footer>

</body>
</html>
