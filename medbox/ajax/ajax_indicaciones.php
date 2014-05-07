<?php

require_once("../clases/beans/beans_indicaciones.php");


$cie_id = $_GET["cie_id"];

$obj_ind = new beans_indicaciones();

if (is_numeric($cie_id)) {

    $sql_ind = $obj_ind->listar_indicaciones_cie($cie_id);
    
    if (isset($sql_ind) && is_array($sql_ind) && count($sql_ind) > 0) {	
        $array_indicaciones = "";
        foreach($sql_ind as $val){
            $array_indicaciones .= "<tr id='".$val['ind_id']."'><td style='width: 100%'>".$val['ind_denominacion']."</td><td><span class='del_diag' id='".$val['ind_id']."' style='height: 0px;line-height: 0px;'>DEL<span></td></tr>";
        }
	echo $array_indicaciones;
    } else {
            $array_indicaciones = "<tr id=''><td style='width: 600px'>FICHA SIN INDICACIONES</td></tr>";     
	echo $array_indicaciones;
    }
} else {
    $array_indicaciones = "<tr id=''><td style='width: 600px'>ERROR-FICHA INCORRECTA</td></tr>";
    echo $array_indicaciones;
}
?>