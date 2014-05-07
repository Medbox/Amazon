<?php

require_once("../clases/beans/beans_diagnostico.php");
$cie_id        = $_GET["cie_id"];
$diag          = strtoupper($_GET["diagnostico"]);


$obj_dia = new beans_diagnostico();

if (is_numeric($cie_id) && $diag != '') {
    $sql_dia = $obj_dia->agregarDiagnosticoCierre(null, $diag, $cie_id);
    
    if ($sql_dia['out_id'] > 0 && $sql_dia['out_id'] != null) {	
        
		$array_diagnostico	=	array(	"DCI_ID"                        =>	$sql_dia['out_id'],
                                                        "DCI_DENOMINACION"		=>	$diag,
                                                        "DCI_ATN_ID"                    =>	$cie_id,
                                                        "DCI_ACTIVO"                    =>	1,
                                                        "ERROR"                         =>      $sql_dia['out_msg'],
                                                        "ERROR_ID"                      =>      $sql_dia['out_cod']);
        
                       
	echo json_encode($array_diagnostico);
    } else {
         $array_diagnostico	=	array(	"DCI_ID"                        =>	"",
                                                "DCI_DENOMINACION"		=>	"",
                                                "DCI_ATN_ID"                    =>	"",
                                                "DCI_ACTIVO"                    =>	"",
                                                "ERROR"                         =>      $sql_dia['out_msg'],
                                                "ERROR_ID"                      =>      $sql_dia['out_cod']);
         echo json_encode($array_diagnostico);
    }
} else {
    $array_diagnostico	=	array(	"DCI_ID"                        =>	"",
                                        "DCI_DENOMINACION"		=>	"",
                                        "DCI_ATN_ID"                    =>	"",
                                        "DCI_ACTIVO"                    =>	"",
                                        "ERROR"                         =>      "ERROR|FALTAN DATOS",
                                        "ERROR_ID"                      =>      1);
    echo json_encode($array_diagnostico);
}
?>