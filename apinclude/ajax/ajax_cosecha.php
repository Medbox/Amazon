<?php

include_once '../clases/beans/beans_cosecha.php';
$obj_cos    =   new beans_cosecha();
$case       =   $_GET["case"];
$colors     = array(0=>'aed741',
                    1=>'bedd17',
                    2=>'c3e171',
                    3=>'85b501');
switch ($case) {
    case "agregar_cosecha" :
        $fecha                  =   $_GET["fecha"];
        $kilos                  =   $_GET["kilos"];
        $n_certificado          =   $_GET["n_certificado"];
        $apiario                =   $_GET["apiario"];
        $t_floracion            =   $_GET["t_floracion"];
        $estado                 =   $_GET["estado"];
        $floracion              =   $_GET["floracion"];
        $usu_id                 =   1;
        $ip                     =   $_SERVER['REMOTE_ADDR'];
        
        if($n_certificado == ''){
            $n_certificado = NULL;
        }else{
            $n_certificado = $n_certificado;
        }
        
        if($floracion == ''){
            $floracion = NULL;
        }else{
            $floracion = $floracion;
        }
        
        $res = $obj_cos->AgregarCosecha($fecha, $kilos, $n_certificado, $apiario, $t_floracion, $estado,$floracion,$usu_id,$ip);
        $cos_id     =   $res['out_id'];
        $cos_cod    =   $res['out_cod'];
        $cos_msg    =   $res['out_msg'];
        echo "$cos_id,$cos_cod,$cos_msg";
        break;
    case "listar_cosechas" :
        $res = $obj_cos->listar_cosecha();
        $salida = '';
        foreach ($res as $val) {
            if($val["COS_ESTADO"] == 1){
                $estado = "FINALIZADA";
            }else{
                $estado = "PROCESO";
            }
            $salida .= "<tr>
                            <td>".$val["COS_FECHA"]."</td>
                            <td>".$val["API_NOMBRE"]."</td>
                            <td>".$val["COS_KILOS"]."</td>
                            <td>".$val["COS_CERTIFICADO"]."</td>
                            <td>".$val["COS_DENOMINACION_FLORACION"]."</td>
                            <td>".$estado."</td>
                        </tr>";
        }
        echo $salida;
        break;
    case "lista_apiario_kilos" :
        $res = $obj_cos->listarApiariosKilos();
        $salida =  '<table class="chart-pie" id="tabla_api_kilos" style=\"width : 100%;\">';
        $salida .= '<thead>';
        $salida .= '<tr>';
        $salida .= '<th></th>';
        $i = 0;
        foreach($res as $val){
            $salida .= "<th style=\"color : ".$colors[$i].";\">".$val["API_NOMBRE"]."</th>";
            $i++;
        }
        $salida .= '</tr>';
        $salida .= '</thead>';
        $salida .= '<tbody>';
        $salida .= '<tr>';
        $salida .= '<th></th>';
        foreach($res as $val){
            $salida .= "<th>".$val["COS_KILOS"]."</th>";
        }
        $salida .= '</tr>';
        $salida .= '</tbody>';
        $salida .= '</table>';
        $salida .= '<div class="chart-pie-shadow"></div>';
        echo $salida;
        break;
    case "lista_kilos_anos" :
        $res = $obj_cos->listaKilosAnos();
        $salida =  '<table class="chart-pie" id="tabla" style="width : 100%;">';
        $salida .= '<thead>';
        $salida .= '<tr>';
        $salida .= '<th></th>';
        $i = 0;
        foreach($res as $val){
            $salida .= "<th style=\"color : ".$colors[$i].";\">".$val["date_part"]."</th>";
            $i++;
        }
        $salida .= '</tr>';
        $salida .= '</thead>';
        $salida .= '<tbody>';
        $salida .= '<tr>';
        $salida .= '<th></th>';
        foreach($res as $val){
            $salida .= "<th>".$val["COS_KILOS"]."</th>";
        }
        $salida .= '</tr>';
        $salida .= '</tbody>';
        $salida .= '</table>';
        $salida .= '<div class="chart-pie-shadow"></div>';
        echo $salida;
        break;
    default :
        break;
}
?>