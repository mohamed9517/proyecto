<?php 

// Mostrar los comentarios 
function allComentario($conexion){
    $resultado = $conexion->query(" select * from comentarios") or die($conexion->error);
    return $resultado;

}

function eliminarComentarios($conexion, $id){

    $resu=$conexion->query("DELETE FROM comentarios WHERE id_comentarios=$id");
    return $resu;

}
function consultaComentario($conexion,$id){
    $result=$conexion->query("SELECT * FROM comentarios WHERE id_comentarios=$id");
    return $result;

}
function editarComentario($conexion,$estado,$id){
    $result=$conexion->query("UPDATE comentarios SET estado='$estado' WHERE id_comentarios=$id");
    return $result;

}
?>