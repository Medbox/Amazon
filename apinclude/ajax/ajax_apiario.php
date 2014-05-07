<?php

include_once '../clases/beans/beans_apiario.php';
$obj_api    =   new beans_apiario();
$case       =   $_GET["case"];

switch ($case) {
    case "agregar_apiario" :
        $nombre     =   $_GET["nombre"];
        $direccion  =   $_GET["direccion"];
        $latitud    =   $_GET["latitud"];
        $longitud   =   $_GET["longitud"];
        $estado     =   $_GET["estado"];
        $res = $obj_api->AgregarApiario($nombre, $direccion, $latitud, $longitud, $estado);
        $api_id     =   $res['out_id'];
        $api_cod    =   $res['out_cod'];
        $api_msg    =   $res['out_msg'];
        echo "$api_id,$api_cod,$api_msg";
        break;
    case "lista_apiarios" :
        $res = $obj_api->ListarApiarios();
        $salida = '';
        foreach ($res as $val) {
            if($val["API_ESTADO"] == 1){
                $estado = "ACTIVA";
            }else{
                $estado = "DESACTIVA";
            }
            $fecha = explode('.', $val["API_FECHA_INGRESO"]);
            $salida .= "<a href=\"#\" id=".$val["API_ID"]." rel=".$val["API_NOMBRE"].">
                            <div class=\"sb_link_foto\"><div><img src=\"./images/cajon.png\" width=\"50\" height=\"50\"></div></div>
                            <div class=\"sb_link\" >
                                <span class=\"spn_text1\">".$val["API_NOMBRE"]."</span>
                                <span class=\"spn_text1\">".$fecha[0]."</span>
                                <span class=\"spn_text2\">".$estado."</span>
                            </div>
                        </a>";
        }
        echo $salida;
        break;
    case "select_apiario" :
        $res = $obj_api->ListarApiarios();
        $salida = '';
        foreach ($res as $val) {
            $salida .= "<option value=" . $val["API_ID"] .">" . $val["API_NOMBRE"] . "</option>";;
        }
        echo $salida;
        break;
    default :
        break;;
}
?>