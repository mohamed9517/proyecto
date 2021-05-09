<?php 
$servidor="localhost";
$usuario="root";
$password="Alumn@2020";
$nombre="tiendafunko";
$conexion= new mysqli($servidor,$usuario,$password,$nombre);
if ($conexion ->connect_error) {
	die("No se puede conectar");
}

?>