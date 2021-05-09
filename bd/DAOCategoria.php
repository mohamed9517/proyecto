<?php 
// Funcion para añadir un producto
function insertarCategoria($conexion,$nombre,$descripcion,$imagen){
    $resultado=$conexion->query("INSERT INTO categoria (nombre_cat,descripcion_cat, imgane_cat) values ('$nombre', '$descripcion','$imagen')");
    return $resultado;
}
// Mostrar todas las categorias 
function allCategorias($conexion){
    $resultado = $conexion->query(" select * from categoria") or die($conexion->error);
    return $resultado;

}
//Eliminar la categoria
function eliminarCategoria($conexion,$id){
    $resu=$conexion->query("DELETE FROM categoria WHERE id_categoria=$id");
    return $resu;

}
// Consulta la categoria segun un id determinado
function consultaCategoria($conexion,$id){
    $result=$conexion->query("SELECT * FROM categoria WHERE id_categoria=$id");
    return $result;

}

// Editar la categoria
function editarCategoria($conexion,$nombre,$descripcion,$imagen,$id){
    $result=$conexion->query("UPDATE categoria SET nombre_cat='$nombre', descripcion_cat='$descripcion', imgane_cat='$imagen' WHERE id_categoria=$id");
    return $result;

}

?>