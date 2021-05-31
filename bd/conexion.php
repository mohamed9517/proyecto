<?php 
$servidor="database-1.c6tass5d0xyd.eu-west-3.rds.amazonaws.com";
$usuario="moha";
$password="Mouhou95";
$nombre="tiendafunko";
$conexion= new mysqli($servidor,$usuario,$password,$nombre);
if ($conexion ->connect_error) {
	die("No se puede conectar");
}

?>