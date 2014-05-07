<?php
include_once ("/var/www/medbox/clases/dao/Centro_Responsabilidad.php");
class beans_centro_responsabilidad{
    private $obj_cre;
    private $cre_id;
    private $cre_denominacion;
    private $cre_descripcion;
    private $cre_activo;
    
    
    public function __construct() {
        $this->obj_cre = new Centro_Responsabilidad();
    }
   
    public function listar_centro($id = null){
        $res = $this->obj_cre->ListarCentro($id);
        return $res;
    }
    
    public function listar_centro_esb($esb_id){
        $res = $this->obj_cre->ListarCentroResponsabilidadEstablecimiento($esb_id);
        return $res;
    }
    
    public function setCentro($id_centro){
        $res = $this->listar_centro($id_centro);
        if(is_array($res)){
            $this->cre_id           = $res[0]['CRE_ID'];
            $this->cre_denominacion = $res[0]['CRE_DENOMINACION'];
            $this->cre_descripcion  = $res[0]['CRE_DESCRIPCION'];
            $this->cre_activo       = $res[0]['CRE_ACTIVO'];
        }else{
            $this->cre_id           = "";
            $this->cre_denominacion = "";
            $this->cre_descripcion  = "";
            $this->cre_activo       = "";
        }
    }
    
    public function prueba(){
        return false;
    }

    public function getCre_id() {
        return $this->cre_id;
    }

    public function setCre_id($cre_id) {
        $this->cre_id = $cre_id;
    }

    public function getCre_denominacion() {
        return $this->cre_denominacion;
    }

    public function setCre_denominacion($cre_denominacion) {
        $this->cre_denominacion = $cre_denominacion;
    }

    public function getCre_descripcion() {
        return $this->cre_descripcion;
    }

    public function setCre_descripcion($cre_descripcion) {
        $this->cre_descripcion = $cre_descripcion;
    }

    public function getCre_activo() {
        return $this->cre_activo;
    }

    public function setCre_activo($cre_activo) {
        $this->cre_activo = $cre_activo;
    }
}
?>