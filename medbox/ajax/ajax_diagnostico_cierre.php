<?php

require_once("../clases/beans/beans_diagnostico.php");


$cie_id = $_GET["cie_id"];

$obj_dia = new beans_diagnostico();

if (is_numeric($cie_id)) {

    $sql_dia = $obj_dia->listar_diagnostico_cie($cie_id);
    
    if (isset($sql_dia) && is_array($sql_dia) && count($sql_dia) > 0) {	
        $array_diagnostico = "";
        foreach($sql_dia as $val){
            $array_diagnostico .= "<tr id='".$val['dci_id']."'><td style='width: 100%'>".$val['dci_denominacion']."</td><td><span class='del_diag' id='".$val['dci_id']."' style='height: 0px;line-height: 0px;'>DEL<span></td></tr>";
        }
	echo $array_diagnostico;
    } else {
            $array_diagnostico = "<tr id=''><td style='width: 600px'>CIERRE SIN DIAGNOSTICO</td></tr>";     
	echo $array_diagnostico;
    }
} else {
    $array_diagnostico = "<tr id=''><td style='width: 600px'>ERROR-CIERRE INCORRECTA</td></tr>";
    echo $array_diagnostico;
}
?>