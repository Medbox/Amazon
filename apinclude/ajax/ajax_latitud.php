<?php
include_once '../clases/beans/beans_apiario.php';
$obj_api = new beans_apiario();
$apiarios = $obj_api->ListarApiarios();
$a = '';
$cant = count($apiarios);
foreach ($apiarios as $var => $val) {
    if($cant > ($var+1)){
        $a .=  $val['API_LATITUD']."|".$val['API_LONGITUD']."|".$val['API_NOMBRE']."|".$val['API_ID']."&";
    }else{
        $a .=  $val['API_LATITUD']."|".$val['API_LONGITUD']."|".$val['API_NOMBRE']."|".$val['API_ID'];
    }
}

echo $a;
?>
