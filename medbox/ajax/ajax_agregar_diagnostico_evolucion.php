<?php

require_once("../clases/beans/beans_diagnostico.php");
$atn_id        = $_GET["atn_id"];
$diag          = strtoupper($_GET["diagnostico"]);


$obj_dia = new beans_diagnostico();

if (is_numeric($atn_id) && $diag != '') {
    $sql_dia = $obj_dia->agregarDiagnosticoAtencion(null, $diag, $atn_id);
    
    if ($sql_dia['out_id'] > 0 && $sql_dia['out_id'] != null) {	
        
		$array_diagnostico	=	array(	"DAT_ID"                        =>	$sql_dia['out_id'],
                                                        "DAT_DENOMINACION"		=>	$diag,
                                                        "DAT_ATN_ID"                    =>	$atn_id,
                                                        "DAT_ACTIVO"                    =>	1,
                                                        "ERROR"                         =>      $sql_dia['out_msg'],
                                                        "ERROR_ID"                      =>      $sql_dia['out_cod']);
        
                       
	echo json_encode($array_diagnostico);
    } else {
         $array_diagnostico	=	array(	"DAT_ID"                        =>	"",
                                                "DAT_DENOMINACION"		=>	"",
                                                "DAT_ATN_ID"                    =>	"",
                                                "DAT_ACTIVO"                    =>	"",
                                                "ERROR"                         =>      $sql_dia['out_msg'],
                                                "ERROR_ID"                      =>      $sql_dia['out_cod']);
         echo json_encode($array_diagnostico);
    }
} else {
    $array_diagnostico	=	array(	"DAT_ID"                        =>	"",
                                        "DAT_DENOMINACION"		=>	"",
                                        "DAT_ATN_ID"                    =>	"",
                                        "DAT_ACTIVO"                    =>	"",
                                        "ERROR"                         =>      "ERROR|FALTAN DATOS",
                                        "ERROR_ID"                      =>      1);
    echo json_encode($array_diagnostico);
}
?>