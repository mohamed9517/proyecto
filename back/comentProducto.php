<?php
include_once('../bd/conexion.php');
$name = $_POST['name'];
$email =$_POST['email'];
$comment = $_POST['comment'];
$comment_date = date('Y-m-d H:i:s');
$id=$_POST['id'];

$resultado = $conexion->query(" select * from comentarios where id_prod=$id") or die($conexion->error);
$out = '';
if (mysqli_num_rows($resultado) > 0) {
    while ($row = mysqli_fetch_object($resultado)) {
        $out .= '

        <div class="card" >
            <div class="card-header" style="text-transform: uppercase;">' . $row->nombre . ' </div>
            <div class="card-body">' . $row->comentario . '</div>
            
        </div>
  
  <div class="clearfix"></div>
  <p>&nbsp;</p>
  ';
    }
} else {

    $out = '<h3>No hay comentario</h3>';
}
echo $out;
