<?php

require_once('../bd/conexion.php');
require_once('../bd/DAOCategoria.php');
session_start();
$nombre = '';
$imagen = '';
$descripcion = '';
$editar = false;
$id = 0;

if (isset($_POST['save'])) {

   $nombre_cat = $_POST['nombre'];
   $descripcion_cat = $_POST['descripcion'];
   $imgane_cat = $_POST['imagen'];

   insertarCategoria($conexion, $nombre_cat, $descripcion_cat, $imgane_cat);
   $_SESSION['mensaje'] = "Has creado un categoria";
   $_SESSION['tipo-mensaje'] = "success";

   header('Location: ../front/adminCategoria.php');
}
if (isset($_GET['elimi'])) {
   $id = $_GET['elimi'];
   eliminarCategoria($conexion, $id);
   $_SESSION['mensaje'] = "Has eliminado la categoria";
   $_SESSION['tipo-mensaje'] = "danger";

   header('Location: ../front/adminCategoria.php');
}

if (isset($_GET['edit'])) {
   $id = $_GET['edit'];
   $editar = true;
   $result = consultaCategoria($conexion, $id);
   if (mysqli_num_rows($result) == 1) {
      $row = $result->fetch_array();

      $nombre = $row['nombre_cat'];
      $descripcion = $row['descripcion_cat'];
      $imagen = $row['imgane_cat'];
   }
}

if (isset($_POST['editar'])) {
   $id = $_POST['id'];
   $nombre_cat = $_POST['nombre'];
   $descripcion_cat = $_POST['descripcion'];
   $imagen_ca = $_POST['imagen'];


   editarCategoria($conexion, $nombre_cat, $descripcion_cat, $imagen_ca, $id);
   $_SESSION['mensaje'] = 'Has modificado una categoria';
   $_SESSION['tipo-mensaje'] = 'warning';

   header('Location: ../front/adminCategoria.php');
}