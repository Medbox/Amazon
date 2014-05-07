<?php
require_once("../clases/beans/beans_funcionario.php");

$obj_fun	=	new beans_funcionario();
$arr_fun	=	$obj_fun->listar_funcionario(null);

echo "<pre>";
var_dump($arr_fun);
echo "</pre>";
?>