<?php
include_once('../bd/conexion.php');
include_once('../bd/DAOCategoria.php');
include_once('../bd/DAOProducto.php');
session_start();

$nombre='';
$descripcion='';
$precio='';
$imagen1='';
$stock='';
$editar=false;
$id=0;



 if(isset($_POST['save'])){
     
   $nombre=$_POST['nombre'];
   $descripcion=$_POST['descripcion'];
   $precio=$_POST['precio'];
   $imagen1=$_POST['imagen1'];
   $stock=$_POST['stock'];
   $categoria=$_POST['categoria'];
  
   insertarProducto($conexion,$categoria, $nombre,$descripcion,$precio,$imagen1,$stock);
   

   $_SESSION['mensaje']="Has creado un producto";
   $_SESSION['tipo-mensaje']="success";

   header('Location: ../front/adminProducto.php');

 }

 if (isset($_GET['elimi'])) {
  $id = $_GET['elimi'];
  eliminarProducto($conexion, $id);
  $_SESSION['mensaje'] = "Has eliminado un producto";
  $_SESSION['tipo-mensaje'] = "danger";

  header('Location: ../front/adminProducto.php');
}
 if(isset($_GET['edit'])){
   $id = $_GET['edit'];
   $editar=true;
    
 
   $result=consultaProducto($conexion,$id);
   
      if(mysqli_num_rows($result)==1){
      $row=$result->fetch_array();

      $nombre=$row['nombre_producto'];
      $descripcion=$row['descripcion_producto'];
      $precio=$row['precio_producto'];
      $imagen1=$row['imagen1_producto'];
      $stock=$row['stock_producto'];

      }

 }

if(isset($_POST['editar'])){
   $id=$_POST['id'];
   $nombre=$_POST['nombre'];
   $descripcion=$_POST['descripcion'];
   $precio=$_POST['precio'];
   $imagen1=$_POST['imagen1'];
   $stock=$_POST['stock'];
   $categoria=$_POST['categoria'];

   editarProducto($conexion,$nombre,$descripcion,$precio,$imagen1,$stock, $categoria ,$id);

   $_SESSION['mensaje']='Has modificado un campo';
   $_SESSION['tipo-mensaje']='warning';
   header('Location: ../front/adminProducto.php');



}
?>