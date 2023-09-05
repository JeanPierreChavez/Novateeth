<?php
session_start();
require_once("c://xampp/htdocs/Login/controller/homeController.php");

$obj = new homeController();
$correo = $obj->limpiarcorreo($_POST['correo']);
$contraseña = $obj->limpiarcadena($_POST['contraseña']);

// Verifica si el correo es el del administrador
if ($correo === 'karlamariscal@novateeth.com' && $contraseña === 'karlamariscal123') {
    // Redirige al administrador a una página específica
    header("Location: admin.php");
    exit();
}

$bandera = $obj->verificarusuario($correo, $contraseña);

if ($bandera) {
    // Usuario válido, establece la sesión
    $_SESSION['usuario'] = $correo;
    // Redirige al usuario a una página específica para usuarios registrados
    header("Location: panel_control.php");
    exit();
} else {
    $error = "<li> La clave es incorrecta </li>";
    // Redirige al usuario de vuelta al formulario de inicio de sesión con un mensaje de error
    header("Location: login.php?error=" . $error);
    exit();
}
?>
