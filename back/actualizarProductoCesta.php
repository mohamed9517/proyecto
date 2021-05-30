<?php 
session_start();
$arr=$_SESSION['cesta'];

for($i=0; $i<count($arr); $i++){
    if($arr[$i]['Id'] == $_POST['id']){
        $arr[$i]['Cantidad']=$_POST['cantidad'];
        $_SESSION['cesta']=$arr;
        break;
    }


}
?>