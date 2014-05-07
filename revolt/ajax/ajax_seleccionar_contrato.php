<?php
session_start();
require_once("../class/Class.Funcionario.php");

$fun_id		=	$_SESSION['fun_id'];
$con_id		=	$_GET['con_id'];

$obj_fun	=	new Funcionario();
$arr_con	=	$obj_fun->selecciona_contrato($con_id,$fun_id);

if(isset($arr_con) && is_array($arr_con)){
	
	if(is_numeric($arr_con['out_id']) && $arr_con['out_id'] > 0){
			echo "OK|".$arr_con['out_id'];		
			}
	else{	echo "ERROR|".$arr_con['out_cod']." - ".$arr_con['out_msg'];
			}
	}
else{
	echo "ERROR|".$arr_con['out_cod']." - ".$arr_con['out_msg'];
	}

?>