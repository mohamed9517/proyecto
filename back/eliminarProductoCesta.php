<?php


session_start();
$arr = $_SESSION['cesta'];
for($i=0; $i<count($arr); $i++){
    if($arr[$i]['Id'] != $_POST['id']){
        $arrNuevo[]= array(

            'Id'=>$arr[$i]['Id'],
            'Nombre'=>$arr[$i]['Nombre'],
            'Precio'=>$arr[$i]['Precio'],
            'Imagen'=>$arr[$i]['Imagen'],
            'Cantidad'=>$arr[$i]['Cantidad']

        );

    
    }
}
if(isset($arrNuevo)){
    $_SESSION['cesta']=$arrNuevo;
}else{
    unset($_SESSION['cesta']);
}
echo "listo";

?>