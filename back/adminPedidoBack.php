<?php

require_once('../bd/conexion.php');
require_once('../bd/DAOPedidos.php');
session_start();
$direccion = '';
$cp = '';
$telefono = '';
$provincia ='';
$comunidadA = '';
$editar = false;
$id = 0;


if (isset($_GET['elimi'])) {
   $id = $_GET['elimi'];
   eliminarPedido($conexion, $id);
   $_SESSION['mensaje'] = "Has eliminado un pedido";
   $_SESSION['tipo-mensaje'] = "danger";

   header('Location: ../front/adminPedidos.php');
}

if (isset($_GET['edit'])) {
   $id = $_GET['edit'];
   $editar = true;
   $result = consultaPedido($conexion, $id);
   if (mysqli_num_rows($result) == 1) {
      $row = $result->fetch_array();

      $direccion = $row['direccion'];
      $cp = $row['cp'];
      $telefono = $row['telefono'];
      $provincia = $row['provincia'];
      $comunidadA = $row['comunidadA'];
      
   }
}

if (isset($_POST['editar'])) {
   $id = $_POST['id'];
   $direccion = $_POST['direccion'];
   $cp = $_POST['cp'];
   $telefono=$_POST['telefono'];
   $provincia = $_POST['provincia'];
   $comunidadA=$_POST['comunidadA'];


   editarPedido($conexion,$direccion,$cp,$telefono,$provincia,$comunidadA,$id);
   $_SESSION['mensaje'] = 'Has modificado un pedido';
   $_SESSION['tipo-mensaje'] = 'warning';

   header('Location: ../front/adminPedidos.php');
}