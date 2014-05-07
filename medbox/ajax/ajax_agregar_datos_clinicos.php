<?php

require_once("../clases/beans/beans_ficha.php");

$cct_nro = $_GET["cct_nro"];
$antecedentes = strtoupper($_GET["antecedentes"]);
$motivo_consulta = strtoupper($_GET["motivo_consulta"]);
$pac_id = $_GET["pac_id"];


$obj_fic = new beans_ficha();
$obj_fic_set = new beans_ficha();
$obj_fic_lis = new beans_ficha();

$arr = $obj_fic_lis->listar_ficha_cct_nro($cct_nro);

if (is_numeric($cct_nro)) {
    if (count($arr) < 1) {
        $sql_fic = $obj_fic->agregarFicha(null, $antecedentes, $motivo_consulta, null, $cct_nro, null, $pac_id, 1);

        if ($sql_fic['out_id'] > 0 && $sql_fic['out_id'] != null) {

            $obj_fic_set->setFicha($sql_fic['out_id']);

            $array_diagnostico = array("FIC_ID" => $obj_fic_set->getFic_id(),
                "FIC_MOTIVO_CONSULTA" => $obj_fic_set->getFic_motivo_consulta(),
                "FIC_ANTECEDENTES" => $obj_fic_set->getFic_antecedentes(),
                "FIC_FECHA_INICIO" => $obj_fic_set->getFic_fecha_in(),
                "FIC_FECHA_FIN" => $obj_fic_set->getFic_fecha_out(),
                "FIC_TFI_ID" => $obj_fic_set->getFic_tfi_id(),
                "ERROR" => $sql_fic['out_msg'],
                "ERROR_ID" => $sql_fic['out_cod']);


            echo json_encode($array_diagnostico);
        } else {
            $array_diagnostico = array("FIC_ID" => "",
                "FIC_MOTIVO_CONSULTA" => "",
                "FIC_ANTECEDENTES" => "",
                "FIC_FECHA_INICIO" => "",
                "FIC_FECHA_FIN" => "",
                "FIC_TFI_ID" => "",
                "ERROR" => $sql_fic['out_msg'],
                "ERROR_ID" => $sql_fic['out_cod']);
            echo json_encode($array_diagnostico);
        }
    } else {

        $sql_fic = $obj_fic->agregarFicha($arr[0]['fic_id'], $antecedentes, $motivo_consulta, null, $cct_nro, null, $pac_id, 1);

        if ($sql_fic['out_id'] > 0 && $sql_fic['out_id'] != null) {

            $obj_fic_set->setFicha($sql_fic['out_id']);

            $array_diagnostico = array("FIC_ID" => $obj_fic_set->getFic_id(),
                "FIC_MOTIVO_CONSULTA" => $obj_fic_set->getFic_motivo_consulta(),
                "FIC_ANTECEDENTES" => $obj_fic_set->getFic_antecedentes(),
                "FIC_FECHA_INICIO" => $obj_fic_set->getFic_fecha_in(),
                "FIC_FECHA_FIN" => $obj_fic_set->getFic_fecha_out(),
                "FIC_TFI_ID" => $obj_fic_set->getFic_tfi_id(),
                "ERROR" => $sql_fic['out_msg'],
                "ERROR_ID" => $sql_fic['out_cod']);


            echo json_encode($array_diagnostico);
        } else {
            $array_diagnostico = array("FIC_ID" => "",
                "FIC_MOTIVO_CONSULTA" => "",
                "FIC_ANTECEDENTES" => "",
                "FIC_FECHA_INICIO" => "",
                "FIC_FECHA_FIN" => "",
                "FIC_TFI_ID" => "",
                "ERROR" => $sql_fic['out_msg'],
                "ERROR_ID" => $sql_fic['out_cod']);
            echo json_encode($array_diagnostico);
        }
    }
} else {
    $array_diagnostico = array("FIC_ID" => "",
        "FIC_MOTIVO_CONSULTA" => "",
        "FIC_ANTECEDENTES" => "",
        "FIC_FECHA_INICIO" => "",
        "FIC_FECHA_FIN" => "",
        "FIC_TFI_ID" => "",
        "ERROR" => "ERROR|CCT NO NUMERICO",
        "ERROR_ID" => 1);
    echo json_encode($array_diagnostico);
}
?>