<?php

include_once '../clases/beans/beans_familia.php';
include_once '../clases/beans/beans_apiario.php';
include_once '../clases/beans/beans_reina.php';
$obj_fam    =   new beans_familia();
$obj_api    =   new beans_apiario();
$obj_rei    =   new beans_reina();
$case       =   $_GET["case"];
switch ($case) {
    case "agregar_familia" :
            $nombre         =   $_GET["nombre"];
            $tipo_fam       =   $_GET["tipo_fam"];
            $origen_fam     =   $_GET["origen_fam"];
            $familia_id     =   $_GET["familia_id"];
            $apiario_id     =   $_GET["apiario_id"];
            $reina_id       =   $_GET["reina_id"];
            $alza           =   $_GET["alza"];
            $estado         =   $_GET["estado"];
            $usu_crea       =   1;
            $ip             =   $_SERVER['REMOTE_ADDR'];
            if($familia_id != '' && $apiario_id != ''){
              $res = $obj_fam->AgregarFamilia($nombre,$tipo_fam,$origen_fam,$familia_id,$apiario_id,$reina_id,$alza,$estado,$usu_crea,$ip);
            }elseif($familia_id == '' && $apiario_id != ''){
                $res = $obj_fam->AgregarFamilia($nombre,$tipo_fam,$origen_fam,null,$apiario_id,$reina_id,$alza,$estado,$usu_crea,$ip);  
            }elseif($familia_id != '' && $apiario_id == ''){
                $res = $obj_fam->AgregarFamilia($nombre,$tipo_fam,$origen_fam,$familia_id,null,$reina_id,$alza,$estado,$usu_crea,$ip);  
            }elseif($familia_id == '' && $apiario_id == ''){
                $res = $obj_fam->AgregarFamilia($nombre,$tipo_fam,$origen_fam,null,null,$reina_id,$alza,$estado,$usu_crea,$ip);  
            }
            $fam_id     =   $res['out_id'];
            $fam_cod    =   $res['out_cod'];
            $fam_msg    =   $res['out_msg'];
            echo "$fam_id,$fam_cod,$fam_msg";
        break;
    case "select_tipo_familia" :
        $res = $obj_fam->listar_tipo_familia();
        $salida = '';
        foreach ($res as $val) {
            $salida .= "<option value='" . $val["TFM_ID"] ."'>" . $val["TFM_DENOMINACION"] . "</option>";
        }
        echo $salida;
        break;
    case "select_origen_familia" :
        $res = $obj_fam->listar_origen_familia();
        $salida = '';
        foreach ($res as $val) {
            $salida .= "<option value='" . $val["ORF_ID"] ."'>" . $val["ORF_DENOMINACION"] . "</option>";
        }
        echo $salida;
        break;
    case "select_familias" :
        $res = $obj_fam->listar_familia(null);
        $salida = '';
        foreach ($res as $val) {
            $salida .= "<a href=\"#\" id=".$val["FAM_ID"].">
                            <div class=\"sb_link_foto\"><div><img src=\"./images/cajon_1.png\" width=\"50\" height=\"50\"></div></div>
                            <div class=\"sb_link\" >
                                <span class=\"spn_text1\">".$val["FAM_NOMBRE"]."</span>
                                <span class=\"spn_text1\">".$val["TFM_DENOMINACION"]."</span>
                                <span class=\"spn_text2\">".$val["ORF_DENOMINACION"]."</span>
                            </div>
                        </a>";
        }
        echo $salida;
        break;
    case "select_familias_apiario" :
        $id_apiario = $_GET["id_apiario"];
        $res = $obj_fam->listar_familia_apiario($id_apiario);
        $salida = '';
        foreach ($res as $val) {
            $salida .= "<a href=\"#\" id=".$val["FAM_ID"]." rel='".$val["FAM_NOMBRE"]."'>
                            <div class=\"sb_link_foto\"><div><img src=\"./images/cajon_1.png\" width=\"50\" height=\"50\"></div></div>
                            <div class=\"sb_link\" >
                                <span class=\"spn_text1\">".$val["FAM_NOMBRE"]."</span>
                                <span class=\"spn_text1\">".$val["TFM_DENOMINACION"]."</span>
                                <span class=\"spn_text2\">".$val["ORF_DENOMINACION"]."</span>
                            </div>
                        </a>";
        }
        echo $salida;
        break;
    case "trae_apiario" :
        $id                 = $_GET["id_familia"];
        $obj_fam->setFamilia($id);
        $api_id             = $obj_fam->get_apiario_id();
        $obj_api->setApiario($api_id);
        $apiario_nom        = $obj_api->get_api_nombre();
        $rei_id             = $obj_fam->get_reina_id();
        $obj_rei->setReina($rei_id);
        $rei_fecha          = $obj_rei->get_rei_fecha();
        $rei_obt_id         = $obj_rei->get_rei_obt_id();
        $rei_obt_nom        = $obj_rei->get_rei_obt_nom();
        $rei_certificado    = $obj_rei->get_rei_certificado();
        $rei_fecundada      = $obj_rei->get_rei_fecundada();
        $rei_estado         = $obj_rei->get_rei_estado();
        $rei_nombre         = $obj_rei->get_rei_nombre();
        $rei_fam_id         = $obj_rei->get_rei_fam_id();
        $rei_fam_nom        = $obj_rei->get_rei_fam_nom();
        $obj_fam_2 = new beans_familia();
        $obj_fam_2->setFamilia($rei_fam_id);
        $api_rei_origen = $obj_fam_2->get_apiario_id();
        $obj_api_2 = new beans_apiario();
        $obj_api_2->setApiario($api_rei_origen);
        $api_rei_origen_nom = $obj_api_2->get_api_nombre();
        echo json_encode(array( "ID_API"          => $api_id,
                                "NOMBRE_API"      => $apiario_nom,
                                "REI_ID"          => $rei_id,
                                "REI_FECHA"       => $rei_fecha,
                                "REI_OBT_ID"      => $rei_obt_id,
                                "REI_OBT_NOM"     => $rei_obt_nom,
                                "REI_CERTIFICADO" => $rei_certificado,
                                "REI_FECUNDADA"   => $rei_fecundada,
                                "REI_ESTADO"      => $rei_estado,
                                "REI_NOMBRE"      => $rei_nombre,
                                "REI_FAM_ID"      => $rei_fam_id,
                                "REI_FAM_NOM"     => $rei_fam_nom,
                                "REI_API_NOM"     => $api_rei_origen_nom,
                                "REI_API_ID"      => $api_rei_origen));
        break;
    case "fb_lista_sin_apiario" :
        $res = $obj_fam->listar_sin_apiario();
        $salida = '';
        foreach ($res as $val) {
            $salida .= "<li class=\"sortable\" id=".$val["FAM_ID"].">
                            <a href=\"#\" id=".$val["FAM_ID"].">
                                <div class=\"sb_link_foto\"><div><img src=\"./images/cajon_1.png\" width=\"50\" height=\"50\"></div></div>
                                <div class=\"sb_link\" >
                                    <span class=\"spn_text1\">".$val["FAM_NOMBRE"]."</span>
                                    <span class=\"spn_text1\">".$val["TFM_DENOMINACION"]."</span>
                                    <span class=\"spn_text2\">".$val["ORF_DENOMINACION"]."</span>
                                </div>
                            </a>
                        </li>";
        }
        echo $salida;
        break;
    case "fb_lista_fam_apiario" :
        $id_apiario = $_GET["apiario_id"];
        $res = $obj_fam->listar_familia_apiario($id_apiario);
        $salida = '';
        foreach ($res as $val) {
            $salida .= "<div class=\"slp_box_container\">
                            <a href=\"#\" id=".$val["FAM_ID"].">
                                <div class=\"avatar_lista\"><img src=\"./images/cajon_1.png\" width=\"60\" height=\"60\"></div>
                                <div class=\"slp_data\">
                                    <span class=\"slp_data_spn1\">" . $val["FAM_NOMBRE"] ."</span>
                                    <span class=\"slp_data_spn2\">" . $val["TFM_DENOMINACION"] . "</span><br>
                                    <span class=\"slp_data_spn2\">" . $val["ORF_DENOMINACION"] . "</span>
                                </div>            
                            </a>
                        </div>";
        }
        echo $salida;
        break;
    case "fb_lista_familia_busqueda" :
        $nombre     = $_GET["nombre"];
        $id_tipo    = $_GET["tipo"];
        $res        = $obj_fam->listar_familia_busqueda($nombre, $id_tipo);
        $salida     = ''; 
        foreach ($res as $val){
            $salida .= "<div class='slp_box_container'>
                            <a href='#' id=".$val["FAM_ID"].">
                                <div class='avatar_lista'><img src='./images/cajon_1.png' width='60' height='60'></div>
                                <div class='slp_data'>
                                    <span class='slp_data_spn1'>".$val["FAM_NOMBRE"]."</span>
                                    <span class='slp_data_spn2'>".$val["TFM_DENOMINACION"]."</span><br>
                                    <span class='slp_data_spn2'>".$val["ORF_DENOMINACION"]."</span>
                                </div>            
                            </a>
                        </div>";
        }
        echo $salida;
        break;
    default :
        break;
}
?>