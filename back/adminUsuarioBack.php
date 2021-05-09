<?php
include_once('../bd/conexion.php');
include_once('../bd/DAOUsuario.php');
session_start();

$usua='';
$pass='';
$nombre = '';
$apellido1 = '';
$apellido2 = '';
$email = '';
$editar =false;
$rol="";
$id = 0;


if (isset($_POST['save'])) {

    $usuario = $_POST['usua'];
    $password = $_POST['pass'];
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
    insertarUsuario($conexion,$usuario,$password,$nombre,$apellido1,$apellido2,$email,$rol);
    $_SESSION['mensaje'] = "El usuario ha sido guardado";
    $_SESSION['tipo-mensaje'] = "success";
    header('Location: ../front/adminUsuario.php');
}


if (isset($_GET['elimi'])) {
    $id = $_GET['elimi'];

    eliminarUsuario($conexion,$id);

    $_SESSION['mensaje'] = "El usuario ha sido eliminado";
    $_SESSION['tipo-mensaje'] = "danger";
    header('Location: ../front/adminUsuario.php');
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $editar = true;
    $result = MostrarU($conexion,$id);
    if (mysqli_num_rows($result) == 1) {
        $row = $result->fetch_array();

    $usua =$row['usuario'];
    $pass =$row['password'];
    $nombre = $row['nombre'];
    $apellido1 =$row['apellido1'];
    $apellido2 =$row['apellido2'];
    $email =$row['email'];
    $rol = $row['rol'];
    
    }
}

if (isset($_POST['editar'])) {
    $id = $_POST['id'];
    $usuario = $_POST['usua'];
    $password = $_POST['pass'];
    $nombre = $_POST['nombre'];
    $apellido1 = $_POST['apellido1'];
    $apellido2 = $_POST['apellido2'];
    $email = $_POST['email'];
    $rol = $_POST['rol'];
 
    
    modificarUsuario($conexion,$usuario,$password,$nombre,$apellido1,$apellido2,$email,$rol,$id);
    

    $_SESSION['mensaje'] = 'Has modificado un campo';
    $_SESSION['tipo-mensaje'] = 'warning';
    header('Location: ../front/adminUsuario.php');
}

?>
