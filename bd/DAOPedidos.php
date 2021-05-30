<?php 
// Mostrar todas las pedidos
function allPedidos($conexion){
    $resultado = $conexion->query(" select * from pedido") or die($conexion->error);
    return $resultado;

}
// Realizar la consulta segun un id especifico del pedido
function consultaPedido($conexion,$id){
    $result=$conexion->query("SELECT * FROM pedido WHERE id_pedido=$id");
    return $result;

}
function editarPedido($conexion,$direccion,$cp,$telefono,$provincia,$comunidadA,$id){
    $result=$conexion->query("UPDATE pedido SET direccion='$direccion', cp='$cp', telefono='$telefono', provincia='$provincia', comunidadA='$comunidadA' WHERE id_pedido=$id");
    return $result;

}
function eliminarPedido($conexion,$id){
    $resu=$conexion->query("DELETE FROM pedido WHERE id_pedido=$id");
    return $resu;

}
?> 