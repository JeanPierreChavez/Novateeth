<?php
    require_once ("c://xampp/htdocs/Login/controller/homeController.php");
    $obj = new homeController();
    $correo = $_POST ['correo'];
    $contraseña = $_POST ['contraseña'];
    $confirmarContraseña = $_POST ['confirmarContraseña'];
    $error = "";
    if(empty($correo) || empty($contraseña) || empty($confirmarContraseña)){
        $error .= "<li> Complete los campos </li>";
        header ("Location: signup.php?error=".$error."&&correo=".$correo."&&contraseña="
        .$contraseña."&&confirmarContraseña".$confirmarContraseña);
        
    }else if($correo && $contraseña && $confirmarContraseña){
        if($contraseña == $confirmarContraseña){
            if($obj->guardarUsuario($correo, $contraseña) == false){
                $error .="<li> El correo ya existe inicia sesion </li>";
                header ("Location: signup.php?error=".$error."&&correo=".$correo."&&contraseña="
                .$contraseña."&&confirmarContraseña".$confirmarContraseña);
            }else{
                header("Location: login.php");
            }

        }else{
            $error .= "<li> Los contraseñas son diferentes </li>";
            header ("Location: signup.php?error=".$error."&&correo=".$correo."&&contraseña="
         .$contraseña."&&confirmarContraseña".$confirmarContraseña);
        }
    }

?>
