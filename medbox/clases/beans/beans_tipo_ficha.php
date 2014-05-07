<?php
include_once ("/var/www/medbox/clases/dao/Tipo_Ficha.php");
class beans_tipo_ficha{
    private $obj_tfi;
    private $tfi_id;
    private $tfi_denominacion;
    private $tfi_descripcion;
    private $tfi_activo;
    
    public function __construct() {
        $this->obj_tfi = new Tipo_Ficha();
    }
    public function listar_tipo_ficha_id($id){
        $res = $this->obj_tfi->ListarTipoFicha(1, $id);
        return $res;
    }
    
    public function listar_tipo_ficha_all(){
        $res = $this->obj_tfi->ListarTipoFicha(null, null);
        return $res;
    }
    
    public function setTipoFicha($id_tipo_ficha){
        $res = $this->listar_tipo_ficha_id($id_tipo_ficha);
        if(is_array($res)  && $res != null){
            $this->tfi_id                  = $res[0]['tfi_id'];
            $this->tfi_denominacion        = $res[0]['tfi_denominacion'];
            $this->tfi_descripcion         = $res[0]['tfi_descripcion'];
            $this->tfi_activo              = $res[0]['tfi_activo'];
        }else{
            $this->tfi_id                  = "";
            $this->tfi_denominacion        = "";
            $this->tfi_descripcion         = "";
            $this->tfi_activo              = "";
        }
    }
    
    public function getTfi_id() {
        return $this->tfi_id;
    }

    public function setTfi_id($tfi_id) {
        $this->tfi_id = $tfi_id;
    }

    public function getTfi_denominacion() {
        return $this->tfi_denominacion;
    }

    public function setTfi_denominacion($tfi_denominacion) {
        $this->tfi_denominacion = $tfi_denominacion;
    }

    public function getTfi_descripcion() {
        return $this->tfi_descripcion;
    }

    public function setTfi_descripcion($tfi_descripcion) {
        $this->tfi_descripcion = $tfi_descripcion;
    }

    public function getTfi_activo() {
        return $this->tfi_activo;
    }

    public function setTfi_activo($tfi_activo) {
        $this->tfi_activo = $tfi_activo;
    }



}
?>