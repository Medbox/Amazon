<?php
require_once("../clases/beans/beans_centro_responsabilidad.php");

$obj_crp	=	new beans_centro_responsabilidad();
$arr_crp	=	$obj_crp->listar_centro_esb(null);

echo "<pre>";
var_dump($arr_crp);
echo "</pre>";
?>