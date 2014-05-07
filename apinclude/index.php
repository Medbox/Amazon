<?php
session_start();
session_cache_limiter('nocache');
session_cache_expire(0);
if($_SESSION['rut'] != NULL){
    include 'vistas/inicio.php';
}else{
    session_destroy();
    header("Location:login.php");
}
?>
