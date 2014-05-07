<?php

require_once("../clases/beans/beans_contrato.php");

$rcf_id		=	$_GET["rcf_id"];
$obj_con	=	new beans_contrato();

if(is_numeric($rcf_id)){
	
	$sql_con	=	$obj_con->elimina_contrato($rcf_id);
	
	if(isset($sql_con) && is_array($sql_con)){
		
		if(is_numeric($sql_con['out_cod']) && $sql_con['out_cod'] == 0){
				echo "OK|".$sql_con['out_cod'];		
				}
		else{	echo "ERROR|".$sql_con['out_cod']."&".$sql_con['out_msg'];
				}
		}
	else{
		echo "ERROR|".var_dump($sql_con);
		}
	
	}
else{
	echo "ERROR";
	}

?>