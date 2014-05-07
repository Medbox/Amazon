<?php

require_once("../clases/beans/beans_paciente.php");


$rut = $_GET["rut"];

$obj_pac = new beans_paciente();

if (is_numeric($rut)) {

    $sql_dia = $obj_pac->listar_paciente_rut($rut);
    
    if (isset($sql_dia) && is_array($sql_dia) && count($sql_dia) > 0) {	
		$array_diagnostico	=	array(	"PAC_ID"			=>	$sql_dia[0]['pac_id'],
                                                "PAC_RUT"			=>	$sql_dia[0]['rut'],
                                                "PAC_NOMBRES"                   =>	$sql_dia[0]['pac_nombres'],
                                                "PAC_APE_PAT"                   =>	$sql_dia[0]['pac_ape_pat'],
                                                "PAC_APE_MAT"                   =>	$sql_dia[0]['pac_ape_mat'],
                                                "PAC_FECHA_NAC"                 =>	$sql_dia[0]['pac_fecha_nac'],
                                                "PAC_SEX_ID"                    =>	$sql_dia[0]['pac_sex_id'],
                                                "SEX_DENOMINACION"              =>	$sql_dia[0]['sex_denominacion'],
                                                "PAC_DIRECCION"                 =>	$sql_dia[0]['pac_direccion'],
                                                "PAC_TELEFONO"                  =>	$sql_dia[0]['pac_telefono'],
                                                "ERROR"                         =>      0);
                
	echo json_encode($array_diagnostico);
    } else {
         $array_diagnostico	=	array(	"PAC_ID"                        =>	"",
                                                "PAC_RUT"			=>	"",
                                                "PAC_NOMBRES"                   =>	"",
                                                "PAC_APE_PAT"                   =>	"",
                                                "PAC_APE_MAT"                   =>	"",
                                                "PAC_FECHA_NAC"                 =>	"",
                                                "PAC_SEX_ID"                    =>	"",
                                                "SEX_DENOMINACION"              =>	"",
                                                "PAC_DIRECCION"                 =>	"",
                                                "PAC_TELEFONO"                  =>	"",
                                                "ERROR"  => "ERROR|NO_DATA|");
         echo json_encode($array_diagnostico);
    }
} else {
    $array_diagnostico	=	array(	"PAC_ID"                        =>	"",
                                        "PAC_RUT"			=>	"",
                                        "PAC_NOMBRES"                   =>	"",
                                        "PAC_APE_PAT"                   =>	"",
                                        "PAC_APE_MAT"                   =>	"",
                                        "PAC_FECHA_NAC"                 =>	"",
                                        "PAC_SEX_ID"                    =>	"",
                                        "SEX_DENOMINACION"              =>	"",
                                        "PAC_DIRECCION"                 =>	"",
                                        "PAC_TELEFONO"                  =>	"",
                                        "ERROR"  => "ERROR|NO_DATA|1");
    echo json_encode($array_diagnostico);
}
?>