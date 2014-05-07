<?php
require_once("../clases/beans/beans_bloque.php");


$dia_semana		=	$_GET["dia_semana"];
$h_inicio		=	$_GET["h_inicio"];
$h_fin			=	$_GET["h_fin"];
$rpl_id			=	$_GET["rpl_id"] == "" ? NULL : $_GET["rpl_id"];
$rts_id			=	NULL;//$_GET["rts_id"];//REUNIONES
$fun_id			=	$_GET["fun_id"];
$eqx_id			=	NULL;//$_GET["eqx_id"];
$prg_id			=	NULL;//$_GET["prg_id"];
$pro_id			=	NULL;//$_GET["pro_id"];
$rendimiento	=	$_GET["rendimiento"] == "" ? NULL : $_GET["rendimiento"];
$rsr_id			=	$_GET["rsr_id"];
$tpr_id			=	NULL;// : $_GET["tpr_id"];
$pre_id			=	2;//2 camas



if(is_numeric($dia_semana) && ($h_inicio != "") && ($h_fin != "") && is_numeric($fun_id) && is_numeric($rsr_id)){
	
	$obj_blq	=	new beans_bloque();
	$sql_con	=	$obj_blq->agregarBloque($dia_semana,$h_inicio,$h_fin,$rpl_id,$rts_id,$fun_id,$eqx_id,$prg_id,$pro_id,$rendimiento,$rsr_id,$pre_id,$tpr_id);
	
	if(is_numeric($sql_con['out_id'])){
		echo "OK -> ".$sql_con['out_id'];
		}
	else{
		var_dump($sql_con);
		}
	
	}
else{
	echo "NO_DATA";
	}

?>