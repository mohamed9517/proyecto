
<?php
require_once('../bd/conexion.php');
require_once('../bd/DAOComentario.php');
session_start();
$nombre = '';
$editar = false;
$id = 0;


if (isset($_GET['elimi'])) {
   $id = $_GET['elimi'];
   eliminarComentarios($conexion, $id);
   $_SESSION['mensaje'] = "Has eliminado el comentario";
   $_SESSION['tipo-mensaje'] = "danger";

   header('Location: ../front/adminComentarios.php');
}

if (isset($_GET['edit'])) {
   $id = $_GET['edit'];
   $editar = true;
   $result = consultaComentario($conexion, $id);
   if (mysqli_num_rows($result) == 1) {
      $row = $result->fetch_array();

      $nombre = $row['nombre'];
      
   }
}

if (isset($_POST['editar'])) {
   $id = $_POST['id'];
   $estado = $_POST['estado'];
   editarComentario($conexion,$estado,$id);
   $_SESSION['mensaje'] = 'Has realizado un modificacion';
   $_SESSION['tipo-mensaje'] = 'warning';

   header('Location: ../front/adminComentarios.php');
}

?>