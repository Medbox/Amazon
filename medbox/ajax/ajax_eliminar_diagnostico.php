<?php

require_once("../clases/beans/beans_diagnostico.php");


$id = $_GET["id"];
$origen = $_GET["origen"];

$obj_dia = new beans_diagnostico();

if (is_numeric($id)) {
    $obj_dia->eliminarDiagnostico($id,$origen);
    echo "OK";
} else {
    echo "ERROR";
}
?>