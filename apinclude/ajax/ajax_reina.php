<?php

include_once '../clases/beans/beans_reina.php';
$obj_rei    =   new beans_reina();
$case       =   $_GET["case"];
switch ($case) {
    case "agregar_reina" :
            $nombre     =   $_GET["nombre"];
            $fecha      =   $_GET["fecha"];
            $obtencion  =   $_GET["obtencion"];
            $orden      =   $_GET["orden"];
            $colmena    =   $_GET["colmena"];
            $fecundada  =   $_GET["fecundada"];
            $estado     =   $_GET["estado"];
            $usu_crea   =   1;
            $ip         =   $_SERVER['REMOTE_ADDR'];
            if($orden != ''){
              $res = $obj_rei->AgregarReina($nombre,$fecha,$obtencion,$orden,null,$fecundada,$estado,$usu_crea,$ip);
            }else if($colmena != ''){
                $res = $obj_rei->AgregarReina($nombre,$fecha,$obtencion,null,$colmena,$fecundada,$estado,$usu_crea,$ip);  
            }else{
                $res = $obj_rei->AgregarReina($nombre,$fecha,$obtencion,null,null,$fecundada,$estado,$usu_crea,$ip);  
            }
            $rei_id     =   $res['out_id'];
            $rei_cod    =   $res['out_cod'];
            $rei_msg    =   $res['out_msg'];
            echo "$rei_id,$rei_cod,$rei_msg";
        break;
    case "listar_reinas_busqueda" :
        $res = $obj_rei->listar_reinas();
        $salida = '';
        foreach ($res as $val) {
            if($val["REI_FECUNDADA"] == 1){
                $fecundada = "FECUNDADA";
            }else{
                $fecundada = "NO FECUNDADA";
            }
            if($val["REI_ESTADO"] == 1){
                $estado = "ACTIVA";
            }else{
                $estado = "DESACTIVA";
            }
            $salida .= "<div class=\"slp_box_container\">
                            <a href=\"#\" id=".$val["REI_ID"].">
                                <div class=\"avatar_lista\"><img src=\"./images/abeja.png\" width=\"60\" height=\"60\"></div>
                                <div class=\"slp_data\">
                                    <span class=\"slp_data_spn1\">".$val["REI_NOMBRE"]."</span>
                                    <span class=\"slp_data_spn2\">".$fecundada."</span><br>
                                    <span class=\"slp_data_spn2\">".$estado."</span>
                                </div>            
                            </a>
                        </div>";
        }
        echo $salida;
        break;
    case "lista_reina_vista" :
        $res = $obj_rei->listar_reinas();
        $salida = '';
        foreach ($res as $val) {
            if($val["REI_FECUNDADA"] == 1){
                $fecundada = "FECUNDADA";
            }else{
                $fecundada = "NO FECUNDADA";
            }
            if($val["REI_ESTADO"] == 1){
                $estado = "ACTIVA";
            }else{
                $estado = "DESACTIVA";
            }
            
            $salida .= "<a href=\"#\" id=".$val["REI_ID"]." rel=".$val["REI_NOMBRE"].">
                            <div class=\"sb_link_foto\"><div><img src=\"./images/abeja.png\" width=\"50\" height=\"50\"></div></div>
                            <div class=\"sb_link\" >
                                <span class=\"spn_text1\">".$val["REI_NOMBRE"]."</span>
                                <span class=\"spn_text1\">".$fecundada."</span>
                                <span class=\"spn_text2\">".$estado."</span>
                            </div>
                        </a>";
        }
        echo $salida;
        break;
    case "lista_reina" :
            $id_reina   =   $_GET["id_reina"];
            $res = $obj_rei->listar_reinas($id_reina);
            if (is_array($res)) {
                $rei_id          = $res[0]['REI_ID'];
                $rei_nombre      = $res[0]['REI_NOMBRE'];
                $rei_fecha       = $res[0]['REI_FECHA_INGRESO'];
                $rei_obtencion   = $res[0]['REI_OBT_ID'];
                $rei_fecundada   = $res[0]['REI_FECUNDADA'];
                $rei_estado      = $res[0]['REI_ESTADO'];
                $rei_certificado = $res[0]['REI_CERTIFICADO'];
                $rei_fam_id      = $res[0]['REI_FAM_ID'];
                $rei_fam_nom     = $res[0]['FAM_NOMBRE'];
                
                echo json_encode(array("ID"          => $rei_id,
                                       "NOMBRE"      => $rei_nombre,
                                       "FECHA"       => $rei_fecha,
                                       "OBTENCION"   => $rei_obtencion,
                                       "FECUNDADA"   => $rei_fecundada,
                                       "ESTADO"      => $rei_estado,
                                       "CERTIFICADO" => $rei_certificado,
                                       "FAMILIA_ID"  => $rei_fam_id,
                                       "FAMILIA_NOM" => $rei_fam_nom));
           }
        break;
    default :
        break;
}
?>