<?php
require_once '../bd/conexion.php';

    if($_POST['act'] == 'rate'){
    	$ip = $_SERVER["REMOTE_ADDR"];
    	$therate = $_POST['rate'];
    	$thepost = $_POST['post_id'];
        $resultado = $conexion->query("SELECT * FROM star where ip= '$ip'  ") or die($conexion->error);
    	
    	while($data = mysqli_fetch_assoc($resultado)){
    		$rate_db[] = $data;
    	}

    	if(@count($rate_db) == 0 ){
    		$conexion->query("INSERT INTO star (id_post, ip, rate)VALUES('$thepost', '$ip', '$therate')");
    	}else{
    		$conexion->query("UPDATE star SET rate= '$therate' WHERE ip = '$ip'");
    	}
    } 
?>