<?php

include_once '../clases/beans/beans_usuarios.php';
$obj_usu = new beans_usuarios();
$case           = $_GET["case"];

switch ($case) {
    case "listar_usuarios" :
        $res = $obj_usu->listar_usuarios();
        $salida = '';
        foreach ($res as $val) {
            $salida .= "<a href=\"#\">
                        <div class=\"sb_link_foto\"><div><img src=\"./images/avatar.png\" width=\"50\" height=\"50\"></div></div>
                        <div class=\"sb_link\">
                            <span class=\"spn_text1\">" . $val["USU_NOMBRE"] . " " . $val["USU_APELLIDO_PAT"] . " " . $val["USU_APELLIDO_MAT"] . "</span>
                            <span class=\"spn_text1\">" . $val["USU_RUT"] . "</span>
                            <span class=\"spn_text2\">" . $val["USU_DIRECCION"] . "</span>
                        </div>
                    </a>";
        }
        echo $salida;
        break;
    case "listar_usuarios_buscar" :
        $rut       = $_GET["rut"];
        $apellidoP = $_GET["apellidoP"];
        $apellidoM = $_GET["apellidoM"];
        $res = $obj_usu->listar_usuarios_buscar($rut,$apellidoP,$apellidoM);
        $salida = '';
        foreach ($res as $val) {
            $salida .= "<div class=\"slp_box_container\">
                            <a href=\"#\" id=".$val["USU_ID"].">
                                <div class=\"avatar_lista\"><img src=\"./images/avartar2.png\" width=\"60\" height=\"60\"></div>
                                <div class=\"slp_data\">
                                    <span class=\"slp_data_spn1\">" . $val["USU_NOMBRE"] . " " . $val["USU_APELLIDO_PAT"] . " " . $val["USU_APELLIDO_MAT"] . "</span>
                                    <span class=\"slp_data_spn2\">" . $val["USU_RUT"] . "</span><br>
                                    <span class=\"slp_data_spn2\">" . $val["USU_DIRECCION"] . "</span>
                                </div>            
                            </a>
                        </div>";
        }
        echo $salida;
        break;
    case "agregar_usuario" :
        $rut            = $_GET["rut"];
        $nombres        = $_GET["nombres"];
        $apellidoPat    = $_GET["apellidoPat"];
        $apellidoMat    = $_GET["apellidoMat"];
        $estado         = $_GET["estado"];
        $direccion      = $_GET["direccion"];
        $clave          = $_GET["clave"];
        $tipo_usuario   = $_GET["tipo_usuario"];
        $res = $obj_usu->AgregarUsuarios($rut, $nombres, $apellidoPat, $apellidoMat, $estado, $tipo_usuario, $direccion, $clave);
        $usu_id = $res['usu_id'];
        $usu_cod = $res['usu_cod'];
        $usu_msg = $res['usu_msg'];
        echo "$usu_id,$usu_cod,$usu_msg";
        break;
    default :
        break;;
}
?>