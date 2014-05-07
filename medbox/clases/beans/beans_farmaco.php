<?php
include_once ("/var/www/medbox/clases/dao/Farmaco.php");
class beans_farmaco{
    private $obj_far;
    private $far_id;
    private $far_denominacion;
    private $far_descripcion;
    private $far_activo;
    
    public function __construct() {
        $this->obj_far = new Farmaco();
    }
    
    public function agregarReceta($rec_id,$far_id, $atn_id){
        $arr = $this->obj_far->AgregarReceta($rec_id,$far_id, $atn_id);
        return $arr;
    }
    
    public function listar_farmaco_id($id){
        $res = $this->obj_far->ListarFarmaco(1, $id);
        return $res;
    }
    
    public function listar_receta_atn($atn){
        $res = $this->obj_far->ListarFarmaco(2, $atn);
        return $res;
    }
    
    public function listar_farmaco_all(){
        $res = $this->obj_far->ListarFarmaco(null, null);
        return $res;
    }
    
    public function setFarmaco($id_far){
        $res = $this->listar_farmaco_id($id_far);
        if(is_array($res)  && $res != null){
            $this->far_id                  = $res[0]['far_id'];
            $this->far_denominacion        = $res[0]['far_denomacion'];
            $this->far_descripcion         = $res[0]['far_descripcion'];
            $this->far_activo              = $res[0]['far_activo'];
        }else{
            $this->far_id                  = "";
            $this->far_denominacion        = "";
            $this->far_descripcion         = "";
            $this->far_activo              = "";
        }
    }
    
    public function getFar_id() {
        return $this->far_id;
    }

    public function setFar_id($far_id) {
        $this->far_id = $far_id;
    }

    public function getFar_denominacion() {
        return $this->far_denominacion;
    }

    public function setFar_denominacion($far_denominacion) {
        $this->far_denominacion = $far_denominacion;
    }

    public function getFar_descripcion() {
        return $this->far_descripcion;
    }

    public function setFar_descripcion($far_descripcion) {
        $this->far_descripcion = $far_descripcion;
    }

    public function getFar_activo() {
        return $this->far_activo;
    }

    public function setFar_activo($far_activo) {
        $this->far_activo = $far_activo;
    }


}
?>