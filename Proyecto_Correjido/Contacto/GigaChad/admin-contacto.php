







<?php
session_start();

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] !== 'admin') {
    header("Location: ../../inicio.php");
    exit();
}


include("../conexion.php");

$sql = "SELECT * FROM contacto_reportes ORDER BY fecha DESC";
$resultado = $conexion->query($sql);

// Estadísticas.
$total = $conexion->query("SELECT COUNT(*) total FROM contacto_reportes")->fetch_assoc()['total'];
$consultas = $conexion->query("SELECT COUNT(*) total FROM contacto_reportes WHERE motivo='Consulta sobre cascos'")->fetch_assoc()['total'];
$reportes = $conexion->query("SELECT COUNT(*) total FROM contacto_reportes WHERE motivo='Reporte de zona peligrosa'")->fetch_assoc()['total'];
$sugerencias = $conexion->query("SELECT COUNT(*) total FROM contacto_reportes WHERE motivo='Sugerencia de mejora'")->fetch_assoc()['total'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin - Reportes</title>
    <link rel="icon" type="acc-img" href="../../LogoPagina.png">
    <link rel="stylesheet" href="../../CSS/bootstrap.min.css">
    <link rel="stylesheet" href="cssMensajes_Reportes.css">
</head>
<style>
    body {
        font-family: 'Segoe UI', sans-serif;
        background-image: url(../../istockphoto-1473215899-612x612.jpg);
        background-position: center;
    }
</style>
<body>
    <nav class="admin-navbar py-3 px-4 mb-4 shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <span class="navbar-brand mb-0 h1">
            <h4>🛡 Panel Admin para GigaChads</h4>
        </span>
        <div class="d-flex gap-2">
            <a href="../../inicio.php" class="btn btn-outline-light btn-sm">Volver al inicio</a>
            <a href="../../Login/cerrar_sesion.php" class="btn btn-outline-light btn-sm">Cerrar sesión</a>
        </div>
    </div>
</nav>

<div class="container py-4">
    <h2 class="text-center mb-4 panel-title">Mensajes y Reportes</h2>


    <!--ESTADÍSTICAS DE CUANTOS SE AN PEGADO CONTRA UN POSTE XD-->
    <div class="row mb-4 justify-content-center">
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card stat-card shadow-sm border-0">
                    <div class="card-body text-center">
                    <h5>Total</h5>
                    <strong><?php echo $total; ?></strong>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5>Consultas</h5>
                    <strong><?php echo $consultas; ?></strong>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5>Reportes</h5>
                    <strong><?php echo $reportes; ?></strong>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 mb-3">
            <div class="card stat-card shadow-sm border-0">
                <div class="card-body text-center">
                    <h5>Sugerencias</h5>
                    <strong><?php echo $sugerencias; ?></strong>
                </div>
            </div>
        </div>
    </div>

    <!--MENSAJES ACA BIEN LOCOS-->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Motivo</th>
                        <th>Mensaje</th>
                        <th>Fecha</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($fila = $resultado->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $fila['nombre']; ?></td>
                        <td><?php echo $fila['email']; ?></td>
                        <td><?php echo $fila['motivo']; ?></td>
                        <td><?php echo $fila['mensaje']; ?></td>
                        <td><?php echo $fila['fecha']; ?></td>
                        <td>
                            <form action="Eliminar-Reporte.php" method="POST" onsubmit="return confirm('¿Eliminar este reporte?');">
                                <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                                <button class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>