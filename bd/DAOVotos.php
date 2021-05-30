<?php 

// Mostrar los comentarios 
// function allVotos($conexion){
//     $resultado = $conexion->query(" select * from stars") or die($conexion->error);
//     return $resultado;

// }
function allVotos($conexion){
    $resultado = $conexion->query(" select stars.rateIndex, stars.id, stars.idp, producto.id_producto,
    producto.nombre_producto  from stars inner join producto
    on producto.id_producto=stars.idp
    ") or die($conexion->error);
    return $resultado;
}

function eliminarVotos($conexion, $id){

    $resu=$conexion->query("DELETE FROM stars WHERE id=$id");
    return $resu;

}

?>