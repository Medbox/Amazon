<?php
require_once("../clases/beans/beans_total_horas.php");

$fun_id				=	$_GET["fun_id"];
$d_habiles			=	$_GET["d_habiles"];
$carga				=	$_GET["carga"] == "" ? NULL : $_GET["carga"];

$h_contratadas		=	$_GET["h_contratadas"];
$j_guardia			=	intval($_GET["j_guardia"]);
$administrativos	=	$_GET["administrativos"];
$curso				=	$_GET["curso"];
$f_anteriores		=	$_GET["f_anteriores"];
$f_legal			=	$_GET["f_legal"];
$descanso			=	$_GET["descanso"];
$dias_fuera			=	$_GET["dias_fuera"];

$obj_thr	=	new beans_total_horas();

if($fun_id && is_numeric($fun_id)){
	
	//echo "agregar_total_horas($fun_id,$d_habiles,$carga,$h_contratadas,$j_guardia,$administrativos,$curso,$f_anteriores,$f_legal,$descanso,$dias_fuera);";	
	$obj_thr	=	$obj_thr->agregar_total_horas($fun_id,$d_habiles,$carga,$h_contratadas,$j_guardia,$administrativos,$curso,$f_anteriores,$f_legal,$descanso,$dias_fuera);
	//var_dump($obj_thr);
	
	if($obj_thr == true){
		echo "OK";
		}
	else{
		var_dump($obj_thr);
		}
	}
else{
	echo "NO_DATA";
	}

?>