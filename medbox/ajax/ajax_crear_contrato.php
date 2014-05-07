<?php

require_once("../clases/beans/beans_contrato.php");


$med_id		=	$_GET["med_id"];
$ctr_id		=	$_GET["ctr_id"];
$esb_id		=	$_GET["esb_id"];
$con_id		=	$_GET["con_id"];

$obj_con	=	new beans_contrato();

if(is_numeric($med_id) && is_numeric($con_id) && is_numeric($esb_id) && is_numeric($ctr_id)){
	
	$sql_con	=	$obj_con->agregar_contrato($med_id,$con_id,$esb_id,$ctr_id);
	
	if(isset($sql_con) && is_array($sql_con)){
		
		if(is_numeric($sql_con['out_id']) && $sql_con['out_id'] > 0){
				echo "OK|".$sql_con['out_id'];		
				}
		else{	echo "ERROR|".$sql_con['out_cod']."&".$sql_con['out_msg'];
				}
		}
	else{
		echo "ERROR|".var_dump($sql_con);
		}
	
	}
else{
	echo "ERROR|NO_DATA";
	}





?>