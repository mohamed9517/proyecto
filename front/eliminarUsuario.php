<?php 
require_once('../bd/DAOUsuario.php');
require_once('../bd/conexion.php');
if(!isset($_GET['id'])){
    header('Location: ../index.php');
    
    }
$id=$_GET['id'];
eliminarUsuario($conexion,$id);
session_start();
session_destroy();

header('Location: ../index.php');





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>V</p>
</body>
</html>