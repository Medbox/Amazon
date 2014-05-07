<?php
require_once("../clases/beans/beans_bloque.php");

$med_id		=	$_GET['med_id'];

$obj_blq	=	new beans_bloque();
$arr_blq	=	$obj_blq->listarBloque($med_id);
$arr_dias	=	array(1 => "LUNES", 2 => "MARTES", 3 => "MIÉRCOLES", 4 => "JUEVES", 5 => "VIERNES");

if(is_array($arr_blq)){
	foreach($arr_blq as $blq){
		
		$dia				=	$blq['BLH_DIA'];
		$BLOQUES[$dia][]	=	array(	"BLQ_ID" => $blq['BLH_ID'],
										"BLQ_DIA" => $arr_dias[$dia],
										"BLQ_FECHA_INI" => $blq['BLH_H_INI'],//"08:00"
										"BLQ_FECHA_FIN" => $blq['BLH_H_FIN'],//"09:15"
										"BLQ_PRE_ID" => $blq['BLH_PRE_ID'],//int(1)
										"BLQ_PRE_DENOMINACION" => $blq['PRE_DENOMINACION'],
										"BLQ_ESTABLECIMIENTO" => $blq['ESB_DENOMINACION'],//"HOSPITAL HERNAN HENRIQUEZ ARAVENA"
										"BLQ_CENTRO_RESPONSABILIDAD" => $blq['CRE_DENOMINACION'],//"CARDIOVASCULAR"
										"BLQ_PRE_ID" => $blq['BLH_PRE_ID'],//int(1)
										"BLQ_LUG_DENOMINACION" => $blq['LUG_DENOMINACION'],//"PABELLON CENTRAL"
										"BLQ_EQX_DENOMINACION" => $blq['EQU_DENOMINACION'],//int(1)
										"BLQ_PRE_ID" => $blq['BLH_PRE_ID']);
		
		
	}
}

echo "<pre>";
echo var_dump($BLOQUES);
echo "</pre>";

/*
array(26) {
    
    ["BLH_PRG_ID"]=>NULL
    ["PRG_DENOMINACION"]=>NULL
    ["BLH_FUN_ID"]=>int(3)
    ["fun_funcionario"]=>string(30) "CLAUDIO ANDRES HERMOSILLA DIAZ"
    ["BLH_PRO_ID"]=>NULL
    ["PRO_DENOMINACION"]=>NULL
    ["BLH_EQU_ID"]=>int(59)
    ["BLH_REN"]=>NULL
    ["BLH_RPL_ID"]=>int(2)
    ["BLH_RSR_ID"]=>int(7)
    ["BLH_RTS_ID"]=>NULL
    ["TRE_DENOMINACION"]=>NULL
    ["STR_DENOMINACION"]=>NULL
    ["BLH_ACTIVO"]=>int(1)

  }
*/

?>