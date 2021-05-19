<?php 

// Mostrar los comentarios 
function allComentario($conexion){
    $resultado = $conexion->query(" select * from comentarios") or die($conexion->error);
    return $resultado;

}


?>