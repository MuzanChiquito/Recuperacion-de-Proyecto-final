







<?php
session_start();
include("Conexion.php");

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$sql = "SELECT * FROM usuarios WHERE email=? AND password=?";
$stmt = mysqli_prepare($conexion, $sql);
mysqli_stmt_bind_param($stmt, "ss", $email, $password);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['usuario'] = $row['email'];
    header("Location: ../inicio.php");
    exit();
} else {
    echo "<script>alert('Datos incorrectos');location.href='login.php';</script>";
}

