<?php
include_once '../clases/beans/beans_usuarios.php';
$obj_usu = new beans_usuarios();
$usu_rut = $_GET["rut"];
$clave =  $_GET["clave"];
$res = $obj_usu->login($usu_rut,$clave);
if($res[0]['compara_usuario'] != 0){
    session_start();
    session_cache_limiter('nocache');
    session_cache_expire(0);
    $_SESSION['rut'] = $usu_rut;
    $_SESSION['clave'] = $clave;
    echo '1';
}else{
    echo '2';
}
?>
