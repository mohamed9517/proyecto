<?php
include_once('../bd/DAOCategoria.php');
include_once('../bd/conexion.php');
include_once('../bd/DAOProducto.php');
session_start();
if (isset($_POST['save']) && isset($_POST['id'])) {
    $uID = $conexion->real_escape_string($_POST['uID']);
    $ratedIndex = $conexion->real_escape_string($_POST['ratedIndex']);
    $id = $conexion->real_escape_string($_POST['id']);
    $ratedIndex++;

    if (!$uID) {
        $conexion->query("INSERT INTO stars (rateIndex, idp) VALUES ('$ratedIndex','$id')");
        $sql = $conexion->query("SELECT id FROM stars ORDER BY id DESC LIMIT 1 WHERE idp=$id");
        $uData = $sql->fetch_assoc();
        $uID = $uData['id'];
    } else
        $conexion->query("UPDATE stars SET rateIndex='$ratedIndex' WHERE id='$uID' and idp=$id");

    exit(json_encode(array('id' => $uID)));
}

$id = $_POST['id'];
$sql = $conexion->query("SELECT id FROM stars ");
$numR = $sql->num_rows;

$sql = $conexion->query("SELECT SUM(rateIndex) AS total FROM stars");
$rData = $sql->fetch_array();
$total = $rData['total'];

$avg = $total / $numR;
?>