<?php
include_once ("/var/www/medbox/clases/dao/Tipo_Prestacion.php");

class beans_tipo_procedimiento{
    private $obj_tpr;
    public function __construct() {
        $this->obj_tpr = new Tipo_Prestacion();
    }
    public function listar_tipo_procedimiento($id = null){
        $res = $this->obj_tpr->ListarTipoProcedimiento($id);
        return $res;
    } 
}
?>