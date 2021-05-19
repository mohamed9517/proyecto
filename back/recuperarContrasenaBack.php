<?php 
session_start();
include_once('../bd/conexion.php');
include_once('../bd/DAOUsuario.php');


if($_POST){

    $pass1= $_POST['pass1'];
    $pass2 = $_POST['pass2'];
    $usuario=$_POST['usuario'];
  
    $resultado = consultaLogin($conexion, $usuario);
    $num = $resultado->num_rows;
    if ($num == 1) {
        
        if ($pass1 == $pass2) {
            cambiarContrasena($conexion,$usuario,$pass1);
            $_SESSION['cont']="Has cambiado la contraseña";
            header('Location: ../front/login.php');

        } else {
           $_SESSION['error']="Las contraseñas no son iguales";
           
           header('Location: ../front/recuperarContrasena.php');
        }
    } else {

        $_SESSION['error']="El usuario no existe, Por favor, regístrate";
        header('Location: ../front/recuperarContrasena.php');
    }

}

?>