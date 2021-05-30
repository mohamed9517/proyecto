<?php
session_start();
include '../bd/conexion.php';
if (!isset($_SESSION['cesta']) && !isset($_SESSION['usuario'])) {
    header('Location: ../index.php');
};
$arr = $_SESSION['cesta'];

$dni = $_POST['dni'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$cp = $_POST['cp'];
$provincia = $_POST['provincia'];
$comunidadAutonoma = $_POST['comunidadAutonoma'];
$idUsuario = $_SESSION['id_usuario'];

$conexion->query("INSERT INTO  pedido (direccion,cp,telefono,provincia,comunidadA,id_usuario) 
values ('$direccion','$cp','$telefono','$provincia','$comunidadAutonoma','$idUsuario')");



$id_pedido=$conexion->insert_id;

for($i=0; $i<count($arr); $i++){
$conexion -> query(" INSERT INTO cesta (id_producto, precio, nombre, cantidad, id_pedido) 
VALUES ('".$arr[$i]['Id']."','".$arr[$i]['Precio']."','".$arr[$i]['Nombre']."','".$arr[$i]['Cantidad']."','$id_pedido')")or die($conexion->error);
}


unset($_SESSION['cesta']);
header("Location: ../front/finalizarCompra.php");

?>
