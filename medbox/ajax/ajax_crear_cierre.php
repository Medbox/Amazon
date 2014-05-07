<?php

require_once("../clases/beans/beans_cierre.php");
session_start();
$fic_id        = $_GET["fic_id"];
$cie_ip        = $_SERVER['REMOTE_ADDR'];
$cie_usu       = $_SESSION['usu_id']; 


$obj_cie = new beans_cierre();
$obj_cie_set = new beans_cierre();
$obj_cie_lis = new beans_cierre();

$arr = $obj_cie_lis->listar_cierre_fic($fic_id);

if (is_numeric($fic_id)) {
    if (count($arr)< 1){
        $sql_fic = $obj_cie->agregarCierre(null, $fic_id, null, $cie_usu, $cie_ip);
    
        if ($sql_fic['out_id'] > 0 && $sql_fic['out_id'] != null) {	

                    $obj_cie_set->setCierre($sql_fic['out_id']);

                    $array_cierre = array("CIE_ID"              => $obj_cie_set->getCie_id(),
                                          "CIE_RESUMEN"         => $obj_cie_set->getCie_resumen(),
                                          "CIE_FIC_ID"          => $obj_cie_set->getCie_fic_id(),
                                          "CIE_FECHA_INICIO"    => $obj_cie_set->getCie_fecha_in(),
                                          "ERROR"               => $sql_fic['out_msg'],
                                          "ERROR_ID"            => $sql_fic['out_cod']);


                    echo json_encode($array_cierre);
        } else {
             $array_cierre = array("CIE_ID"              => "",
                                  "CIE_RESUMEN"         => "",
                                  "CIE_FIC_ID"          => "",
                                  "CIE_FECHA_INICIO"    => "",
                                  "ERROR"               => $sql_fic['out_msg'],
                                  "ERROR_ID"            => $sql_fic['out_cod']);
            
            echo json_encode($array_cierre);
        }
    }else{
        $obj_cie_set->setCierre($arr[0]['cie_id']);
        
        
        $array_cierre = array("CIE_ID"              => $obj_cie_set->getCie_id(),
                              "CIE_RESUMEN"         => $obj_cie_set->getCie_resumen(),
                              "CIE_FIC_ID"          => $obj_cie_set->getCie_fic_id(),
                              "CIE_FECHA_INICIO"    => $obj_cie_set->getCie_fecha_in(),
                              "ERROR"               => "CIERRE YA EXISTE",
                              "ERROR_ID"            => 0);
        echo json_encode($array_cierre);
    }
    
} else {
    $array_cierre = array("CIE_ID"              => "",
                          "CIE_RESUMEN"         => "",
                          "CIE_FIC_ID"          => "",
                          "CIE_FECHA_INICIO"    => "",
                          "ERROR"               => "ERROR|FIC NO NUMERICO",
                          "ERROR_ID"            => 1);
    echo json_encode($array_cierre);
}
?>