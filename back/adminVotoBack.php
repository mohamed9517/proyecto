<?php

require_once('../bd/conexion.php');
require_once('../bd/DAOVotos.php');
session_start();

if (isset($_GET['elimi'])) {
   $id = $_GET['elimi'];
   eliminarVotos($conexion, $id);
   $_SESSION['mensaje'] = "Has eliminado el voto";
   $_SESSION['tipo-mensaje'] = "danger";

   header('Location: ../front/adminVotos.php');
}

?>