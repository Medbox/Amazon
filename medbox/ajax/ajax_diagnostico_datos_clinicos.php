<?php

require_once("../clases/beans/beans_diagnostico.php");


$fic_id = $_GET["fic_id"];

$obj_dia = new beans_diagnostico();

if (is_numeric($fic_id)) {

    $sql_dia = $obj_dia->listar_diagnostico_fic($fic_id);
    
    if (isset($sql_dia) && is_array($sql_dia) && count($sql_dia) > 0) {	
        $array_diagnostico = "";
        foreach($sql_dia as $val){
            $array_diagnostico .= "<tr id='".$val['dfi_id']."'><td style='width: 100%'>".$val['dfi_denominacion']."</td><td><span class='del_diag' id='".$val['dfi_id']."' style='height: 0px;line-height: 0px;'>DEL<span></td></tr>";
        }
	echo $array_diagnostico;
    } else {
            $array_diagnostico = "<tr id=''><td style='width: 600px'>FICHA SIN DIAGNOSTICO</td></tr>";     
	echo $array_diagnostico;
    }
} else {
    $array_diagnostico = "<tr id=''><td style='width: 600px'>ERROR-FICHA INCORRECTA</td></tr>";
    echo $array_diagnostico;
}
?>