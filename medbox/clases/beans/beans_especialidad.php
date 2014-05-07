<?php
include_once ("/var/www/medbox/clases/dao/Especialidad.php");
class beans_especialidad{
    private $obj_esm;
    private $esm_id;
    private $esm_denominacion;
    private $esm_descripcion;
    private $esm_activo;
    private $esm_padre;
    
    
    public function __construct() {
        $this->obj_esm = new Especialidad();
    }
   
    public function listar_especialidad($id = null){
        $res = $this->obj_esm->ListarEspecialidad($id);
        return $res;
    }
    
    public function setEspecialidad($id_especialidad){
        $res = $this->listar_especialidad($id_especialidad);
        if(is_array($res)){
            $this->esm_id           = $res[0]['ESM_ID'];
            $this->esm_denominacion = $res[0]['ESM_DENOMINACION'];
            $this->esm_descripcion  = $res[0]['ESM_DESCRIPCION'];
            $this->esm_activo       = $res[0]['ESM_ACTIVO'];
            $this->esm_padre        = $res[0]['ESM_PADRE'];
        }else{
            $this->esm_id           = "";
            $this->esm_denominacion = "";
            $this->esm_descripcion  = "";
            $this->esm_activo       = "";
            $this->esm_padre        = "";
        }
    }
    
    public function getEsm_id() {
        return $this->esm_id;
    }

    public function setEsm_id($esm_id) {
        $this->esm_id = $esm_id;
    }

    public function getEsm_denominacion() {
        return $this->esm_denominacion;
    }

    public function setEsm_denominacion($esm_denominacion) {
        $this->esm_denominacion = $esm_denominacion;
    }

    public function getEsm_descripcion() {
        return $this->esm_descripcion;
    }

    public function setEsm_descripcion($esm_descripcion) {
        $this->esm_descripcion = $esm_descripcion;
    }

    public function getEsm_activo() {
        return $this->esm_activo;
    }

    public function setEsm_activo($esm_activo) {
        $this->esm_activo = $esm_activo;
    }

    public function getEsm_padre() {
        return $this->esm_padre;
    }

    public function setEsm_padre($esm_padre) {
        $this->esm_padre = $esm_padre;
    }




}


?>