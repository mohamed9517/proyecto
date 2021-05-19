<?php

// Realizar la consulta al usuario para mostrar todos los usuarios que existen
function consultaUsuario($conexion){
    $resultado = $conexion->query("SELECT * FROM usuario");
    return $resultado;
}

// insertar el usuario en la base de datos 
function insertarUsuario($conexion,$usuario, $password, $nombre, $apellido1, $apellido2, $email,$rol){
    $resultado=$conexion->query("INSERT INTO usuario (usuario, password,nombre,apellido1,apellido2,email,rol)
    values ('$usuario', '$password','$nombre',' $apellido1','$apellido2',' $email','$rol')");
    return $resultado;
}
function eliminarUsuario($conexion,$id){
    $resu=$conexion->query("DELETE FROM usuario WHERE id_usuario=$id");
    return $resu;

}
// Mostrar el usuario segun la id
function MostrarU($conexion, $id){
    $result = $conexion->query("SELECT * FROM usuario WHERE id_usuario=$id");
    return $result;
}
//modificar usuario
function modificarUsuario($conexion,$usuario,$password,$nombre,$apellido1,$apellido2,$email,$rol,$id){
    $result = $conexion->query("UPDATE usuario SET usuario='$usuario', password='$password', nombre='$nombre', apellido1='$apellido1', apellido2='$apellido2', email='$email', rol='$rol'  WHERE id_usuario=$id");
    return $result;

}
// Consulta para saber la existencia del usuario
function  consultaLogin($conexion, $usuario){
    $resultado = $conexion->query("select * from usuario where usuario='$usuario'");
    return $resultado;
}

// Creao la session para el usuario
function crearsession($row){
    session_id($row['usuario']);
    session_start();
    $_SESSION['id_usuario']=$row['id_usuario'];
    $_SESSION['usuario']=$row['usuario'];
    $_SESSION['password']=$row['password'];
    $_SESSION['nombre']=$row['nombre'];
    $_SESSION['apellido1']=$row['apellido1'];
    $_SESSION['apellido2']=$row['apellido2'];
    $_SESSION['email']=$row['email'];
    $_SESSION['rol']=$row['rol'];

}
//Funcion para cambiar la contraseña
function cambiarContrasena($conexion,$usua,$pass1){
    $resultado = $conexion->query("update usuario set Password ='$pass1' where usuario='$usua'") or die($conexion->error);
    return $resultado;
}
//Inserat usuario
function inseratUsuario($conexion,$usuario, $password, $nombre, $apellido1,$apellido2,$email){
    $resultado = $conexion->query(" INSERT INTO usuario (usuario, password, nombre, apellido1, apellido2, email)
VALUES ('$usuario', '$password', '$nombre', '$apellido1','$apellido2','$email')");

return $resultado;
}

function modificarCliente($conexion,$usuario,$nombre,$apellido1,$apellido2, $email,$id){
    $result = $conexion->query("UPDATE usuario SET usuario='$usuario', nombre='$nombre', apellido1='$apellido1', apellido2='$apellido2', email='$email' WHERE id_usuario=$id");
    return $result;

}


?>