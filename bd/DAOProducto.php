<?php 

// Mostrar todos los productos 
function allProductos($conexion){
    $resultado = $conexion->query("SELECT * FROM producto");
    return $resultado;
}



// Funcion para añadir un producto
function insertarProducto($conexion,$categoria, $nombre, $descripcion, $precio, $imagen1, $stock){
    $resultado=$conexion->query("INSERT INTO producto (id_categoria, nombre_producto,descripcion_producto,precio_producto,imagen1_producto,stock_producto)
    values ('$categoria', '$nombre','$descripcion','$precio','$imagen1','$stock')");
    return $resultado;
}
// Funcion para eliminar un producto

function eliminarProducto($conexion,$id){
    $resu=$conexion->query("DELETE FROM producto WHERE id_producto=$id");
    return $resu;

}
// Consulta producto segun un determinado id

// Consulta la categoria segun un id determinado
function consultaProducto($conexion,$id){
    $result=$conexion->query("SELECT * FROM producto WHERE id_producto=$id");
    return $result;

}
// Funcion para editar videojuego

function editarProducto($conexion,$nombre,$descripcion,$precio,$imagen1,$stock, $categoria ,$id){
    $result=$conexion->query("UPDATE producto SET id_categoria='$categoria', nombre_producto='$nombre', descripcion_producto='$descripcion', precio_producto='$precio',imagen1_producto='$imagen1',stock_producto='$stock' WHERE id_producto=$id");
    return $result;

}
function consultaProductoCategoria($conexion,$id){
    $result=$conexion->query("SELECT * FROM producto WHERE id_categoria=$id");
    return $result;

}
function allProductosLimit($conexion){
    $result=$conexion->query("SELECT * FROM producto  limit 4");
    return $result;

}

?>