<?php
include('../bd/conexion.php');
include('../bd/DAOUsuario.php');
session_start();

if($_POST){

    $password = $_POST['password'];
    $usuario = $_POST['usuario'];
  
    $resultado = consultaLogin($conexion, $usuario);
    $num = $resultado->num_rows;
    if ($num == 1) {
        $row = $resultado->fetch_assoc();
        $pass = $row['password'];
        if ($pass == $password) {
            crearsession($row);
            header('Location: ../index.php');

        } else {
           $_SESSION['error']="La contraseña esta mal escrita";
           header('Location: ../front/login.php');
        }
    } else {

        $_SESSION['error']="El usuario o la contraseña estan mal escritos";
        header('Location: ../front/login.php');
    }

}
?>