<?php 
include_once('../bd/conexion.php');

$name = $_POST['name'];
$email =$_POST['email'];
$comment = $_POST['comment'];
$comment_date = date('Y-m-d H:i:s');
$id=$_POST['id'];


$query = "INSERT INTO comentarios (nombre,email,comentario,fecha_comentario,id_prod) VALUES('$name','$email','$comment','$comment_date',$id)";
mysqli_query($conexion,$query);

?>