<?php
include_once ("/var/www/medbox/clases/dao/Establecimiento.php");
class beans_establecimiento{
    private $obj_esb;
    private $esb_id;
    private $esb_denominacion;
    private $esb_descripcion;
    private $esb_activo;
    private $esb_tes_id;
    private $tipo_establecimiento;




    public function __construct() {
        $this->obj_esb = new Establecimiento();
    }
   
    public function listar_establecimiento($id = null){
        $res = $this->obj_esb->ListarEstablecimiento($id);
        return $res;
    }
    
    public function listar_establecimiento_lugar($id = null){
        $res = $this->obj_esb->ListarEstablecimientoLugar($id);
        return $res;
    }
    
    public function setEstablecimiento($id_establecimiento){
        $res = $this->listar_establecimiento($id_establecimiento);
        if(is_array($res)){
            $this->esb_id                     = $res[0]['ESB_ID'];
            $this->esb_denominacion           = $res[0]['ESB_DENOMINACION'];
            $this->esb_descripcion            = $res[0]['ESB_DESCRIPCION'];
            $this->esb_activo                 = $res[0]['ESB_ACTIVO'];
            $this->esb_tes_id                 = $res[0]['ESB_ACTIVO'];
            $this->tipo_establecimiento       = $res[0]['TES_DENOMINACION'];
        }else{
            $this->esb_id                     = "";
            $this->esb_denominacion           = "";
            $this->esb_descripcion            = "";
            $this->esb_activo                 = "";
            $this->esb_tes_id                 = "";
            $this->tipo_establecimiento       = "";
        }
    }
    public function getEsb_id() {
        return $this->esb_id;
    }

    public function setEsb_id($esb_id) {
        $this->esb_id = $esb_id;
    }

    public function getEsb_denominacion() {
        return $this->esb_denominacion;
    }

    public function setEsb_denominacion($esb_denominacion) {
        $this->esb_denominacion = $esb_denominacion;
    }

    public function getEsb_descripcion() {
        return $this->esb_descripcion;
    }

    public function setEsb_descripcion($esb_descripcion) {
        $this->esb_descripcion = $esb_descripcion;
    }

    public function getEsb_activo() {
        return $this->esb_activo;
    }

    public function setEsb_activo($esb_activo) {
        $this->esb_activo = $esb_activo;
    }

    public function getEsb_tes_id() {
        return $this->esb_tes_id;
    }

    public function setEsb_tes_id($esb_tes_id) {
        $this->esb_tes_id = $esb_tes_id;
    }

    public function getTipo_establecimiento() {
        return $this->tipo_establecimiento;
    }

    public function setTipo_establecimiento($tipo_establecimiento) {
        $this->tipo_establecimiento = $tipo_establecimiento;
    }


}
?>