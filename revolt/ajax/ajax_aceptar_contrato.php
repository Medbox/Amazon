<?php
session_start();
require_once("../class/Class.Funcionario.php");

$fun_id		=	$_SESSION['fun_id'];
$con_id		=	$_GET['con_id'];

$obj_fun	=	new Funcionario();
$arr_fun	=	$obj_fun->cambiar_estado($fun_id,2,$con_id);//2 estado aceptado

if(isset($arr_fun) && is_array($arr_fun)){
	
	if(is_numeric($arr_fun['out_id']) && $arr_fun['out_id'] > 0){
			echo "OK|".$arr_fun['out_id'];		
			}
	else{	echo "ERROR|".$arr_fun['out_cod']." - ".$arr_fun['out_msg'];
			}
	}
else{
	echo "ERROR|".$arr_fun['out_cod']." - ".$arr_fun['out_msg'];
	}

?>