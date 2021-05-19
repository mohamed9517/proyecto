<?php 

include_once('../bd/conexion.php');
include_once('../bd/DAOUsuario.php');
$usuario=$_POST['usuario'];
$password=$_POST['password'];
$nombre=$_POST['nombre'];
$apellido1=$_POST['apellido1'];
$apellido2=$_POST['apellido2'];

$email=$_POST['email'];

inseratUsuario($conexion,$usuario, $password, $nombre, $apellido1,$apellido2,$email);
header('Location: ../front/login.php');

?> 