<?php
include_once('../bd/conexion.php');
include_once('../bd/DAOUsuario.php');
session_start();



if (isset($_POST['editar'])) {
    $id = $_POST['id'];
    $usuario = $_POST['usua'];
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $email = $_POST['email'];
    modificarCliente($conexion,$usuario,$nombre,$apellido1,$apellido2, $email,$id);
    header('Location: ../front/myCuenta.php');
}

?>
