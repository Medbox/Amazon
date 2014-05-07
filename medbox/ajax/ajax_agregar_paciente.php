<?php

require_once("../clases/beans/beans_paciente.php");
session_start();
$pac_id        = $_GET["pac_id"];
$rut           = $_GET["rut"];
$dv            = $_GET["dv"];
$pac_nombre    = strtoupper($_GET["pac_nombre"]);
$pac_ape_pat   = strtoupper($_GET["pac_ape_pat"]);
$pac_ape_mat   = strtoupper($_GET["pac_ape_mat"]);
$pac_f_nac     = $_GET["pac_f_nac"];
$pac_sex_id    = $_GET["pac_sex_id"];
$pac_direccion = strtoupper($_GET["pac_direccion"]);
$pac_telefono  = $_GET["pac_telefono"];
$pac_ip        = $_SERVER['REMOTE_ADDR'];
$pac_usu       = $_SESSION['usu_id']; 


$obj_pac = new beans_paciente();
$obj_pac_set = new beans_paciente();

if (is_numeric($rut) && is_numeric($dv)) {
    $sql_dia = $obj_pac->agregarPaciente(null, $rut, $dv, $pac_nombre, $pac_ape_pat, $pac_ape_mat, $pac_direccion, $pac_f_nac, $pac_sex_id, $pac_telefono, $pac_ip, $pac_usu);
    
    if ($sql_dia['out_id'] > 0 && $sql_dia['out_id'] != null) {	
        
                $obj_pac_set->setPaciente($sql_dia['out_id']);
        
		$array_diagnostico	=	array(	"PAC_ID"                        =>	$obj_pac_set->getPac_id(),
                                                "PAC_RUT"			=>	$obj_pac_set->getPac_rut(),
                                                "PAC_NOMBRES"                   =>	$obj_pac_set->getPac_nombres(),
                                                "PAC_APE_PAT"                   =>	$obj_pac_set->getPac_ape_pat(),
                                                "PAC_APE_MAT"                   =>	$obj_pac_set->getPac_ape_mat(),
                                                "PAC_FECHA_NAC"                 =>	$obj_pac_set->getPac_fecha_nac(),
                                                "PAC_SEX_ID"                    =>	$obj_pac_set->getPac_sex_id(),
                                                "PAC_DIRECCION"                 =>	$obj_pac_set->getPac_direccion(),
                                                "PAC_TELEFONO"                  =>	$obj_pac_set->getPac_telefono(),
                                                "ERROR"                         =>      $sql_dia['out_msg'],
                                                "ERROR_ID"                      =>      $sql_dia['out_cod']);
        
                       
	echo json_encode($array_diagnostico);
    } else {
         $array_diagnostico	=	array(	"PAC_ID"                        =>	"",
                                                "PAC_RUT"			=>	"",
                                                "PAC_NOMBRES"                   =>	"",
                                                "PAC_APE_PAT"                   =>	"",
                                                "PAC_APE_MAT"                   =>	"",
                                                "PAC_FECHA_NAC"                 =>	"",
                                                "PAC_SEX_ID"                    =>	"",
                                                "PAC_DIRECCION"                 =>	"",
                                                "PAC_TELEFONO"                  =>	"",
                                                "ERROR"                         =>      $sql_dia['out_msg'],
                                                "ERROR_ID"                      =>      $sql_dia['out_cod']);
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
                                        "PAC_DIRECCION"                 =>	"",
                                        "PAC_TELEFONO"                  =>	"",
                                        "ERROR"                         =>      "ERROR|RUT NO INGRESADO",
                                        "ERROR_ID"                      =>      1);
    echo json_encode($array_diagnostico);
}
?>