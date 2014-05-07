<?php
require_once("../clases/beans/beans_equipo.php");

$obj_eqx	=	new beans_equipo();
$arr_eqx	=	$obj_eqx->listar_equipo();

echo "<select>";

foreach($arr_eqx as $eqx){

		$EQU_ID				=	$eqx["EQU_ID"];//=>int(43);
		$EQU_DENOMINACION	=	$eqx["EQU_DENOMINACION"];//=>int(43);
		
		echo "<option value='".$EQU_ID."'>".$EQU_ID."|".$EQU_DENOMINACION."</option>";	
		  /*["EQU_ID"]=>int(43)
		  ["EQU_DENOMINACION"]=>string(9) "ANESTESIA"
		  ["EQU_DESCRIPCION"]=>string(9) "ANESTESIA"
		  ["ESP_ID"]=>int(2)
		  ["ESP_DENOMINACION"]=>string(21) "ANATOMÃA PATOLÃ“GICA"*/

	}

echo "</select>";

echo "<pre>";
var_dump($arr_eqx);
echo "</pre>";

?>