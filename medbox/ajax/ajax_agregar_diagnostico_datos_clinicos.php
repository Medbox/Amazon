<?php

require_once("../clases/beans/beans_diagnostico.php");
$fic_id        = $_GET["fic_id"];
$diag          = strtoupper($_GET["diagnostico"]);


$obj_dia = new beans_diagnostico();

if (is_numeric($fic_id) && $diag != '') {
    $sql_dia = $obj_dia->agregarDiagnosticoFicha(null, $diag, $fic_id);
    
    if ($sql_dia['out_id'] > 0 && $sql_dia['out_id'] != null) {	
        
		$array_diagnostico	=	array(	"DFI_ID"                        =>	$sql_dia['out_id'],
                                                        "DFI_DENOMINACION"		=>	$diag,
                                                        "DFI_FIC_ID"                    =>	$fic_id,
                                                        "DFI_ACTIVO"                    =>	1,
                                                        "ERROR"                         =>      $sql_dia['out_msg'],
                                                        "ERROR_ID"                      =>      $sql_dia['out_cod']);
        
                       
	echo json_encode($array_diagnostico);
    } else {
         $array_diagnostico	=	array(	"DFI_ID"                        =>	"",
                                                "DFI_DENOMINACION"		=>	"",
                                                "DFI_FIC_ID"                    =>	"",
                                                "DFI_ACTIVO"                    =>	"",
                                                "ERROR"                         =>      $sql_dia['out_msg'],
                                                "ERROR_ID"                      =>      $sql_dia['out_cod']);
         echo json_encode($array_diagnostico);
    }
} else {
    $array_diagnostico	=	array(	"DFI_ID"                        =>	"",
                                        "DFI_DENOMINACION"		=>	"",
                                        "DFI_FIC_ID"                    =>	"",
                                        "DFI_ACTIVO"                    =>	"",
                                        "ERROR"                         =>      "ERROR|FALTAN DATOS",
                                        "ERROR_ID"                      =>      1);
    echo json_encode($array_diagnostico);
}
?>