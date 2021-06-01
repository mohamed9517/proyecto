<?php 

function allCesta($conexion){
    $resultado = $conexion->query(" select * from cesta") or die($conexion->error);
    return $resultado;

}


?>