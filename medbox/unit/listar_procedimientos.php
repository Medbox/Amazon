<?php
require_once("../clases/beans/beans_tipo_procedimiento.php");

$obj_tpr	=	new beans_tipo_procedimiento();
$arr_tpr	=	$obj_tpr->listar_tipo_prestacion(null);

echo "<pre>";
var_dump($arr_tpr);
echo "</pre>";
?>