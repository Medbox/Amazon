<?php
require_once("../clases/beans/beans_centro_responsabilidad.php");

$esb_id		=	$_GET['esb_id'];
$obj_crp	=	new beans_centro_responsabilidad();
$arr_cre	=	$obj_crp->listar_centro_esb($esb_id);

//var_dump($arr_cre);

if(isset($arr_cre) && is_array($arr_cre) && (count($arr_cre)>0) ){
	foreach($arr_cre as $cre){	
		$array_centros[]	=	array(	"RCE_ID"				=>	$cre['RCE_ID'],
										"RCE_CRE_ID"			=>	$cre['RCE_CRE_ID'],
										"RCE_CRE_DENOMINACION"	=>	$cre['CRE_DENOMINACION']);
		}	
	echo json_encode($array_centros);
	}
else{
	echo "NOT";
	}

?>