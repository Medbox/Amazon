<?php

require_once("../clases/beans/beans_indicaciones.php");
$cie_id        = $_GET["cie_id"];
$indicacion    = strtoupper($_GET["indicacion"]);


$obj_ind = new beans_indicaciones();

if (is_numeric($cie_id) && $indicacion != '') {
    $sql_ind = $obj_ind->agregarIndicaciones(null,$cie_id,$indicacion);
    
    if ($sql_ind['out_id'] > 0 && $sql_ind['out_id'] != null) {	
        
		$array_indicaciones	=	array(	"IND_ID"                        =>	$sql_ind['out_id'],
                                                        "IND_DENOMINACION"		=>	$indicacion,
                                                        "IND_CIE_ID"                    =>	$cie_id,
                                                        "IND_ACTIVO"                    =>	1,
                                                        "ERROR"                         =>      $sql_ind['out_msg'],
                                                        "ERROR_ID"                      =>      $sql_ind['out_cod']);
        
                       
	echo json_encode($array_indicaciones);
    } else {
         $array_indicaciones	=	array(	"IND_ID"                        =>	"",
                                                "IND_DENOMINACION"		=>	"",
                                                "IND_CIE_ID"                    =>	"",
                                                "IND_ACTIVO"                    =>	"",
                                                "ERROR"                         =>      $sql_ind['out_msg'],
                                                "ERROR_ID"                      =>      $sql_ind['out_cod']);
         echo json_encode($array_indicaciones);
    }
} else {
    $array_indicaciones	=	array(	"IND_ID"                        =>	"",
                                        "IND_DENOMINACION"		=>	"",
                                        "IND_CIE_ID"                    =>	"",
                                        "IND_ACTIVO"                    =>	"",
                                        "ERROR"                         =>      "ERROR|FALTAN DATOS",
                                        "ERROR_ID"                      =>      1);
    echo json_encode($array_indicaciones);
}
?>