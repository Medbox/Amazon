<?php
require_once("../clases/beans/beans_servicio.php");

$cre_id		=	$_GET['cre_id'];
$obj_ser	=	new beans_servicio();
$arr_ser	=	$obj_ser->listarServicioCentroResponsabilidad($cre_id);

if(isset($arr_ser) && is_array($arr_ser) && (count($arr_ser)>0) ){
	foreach($arr_ser as $ser){	
		$array_servicios[]	=	array(	"SER_ID"			=>	$ser['SER_ID'],
										"RSR_ID"			=>	$ser['RSR_ID'],
										"SER_DENOMINACION"	=>	$ser['SER_DENOMINACION']);
		}	
	echo json_encode($array_servicios);
	}
else{
	echo "NOT";
	}

?>