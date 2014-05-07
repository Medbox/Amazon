<?php
include_once ("/var/www/medbox/clases/dao/Examen.php");
class beans_examen{
    private $obj_exa;
    private $exa_id;
    private $exa_denominacion;
    private $exa_descipcion;
    private $exa_tex_id;
    private $exa_activo;
    
    public function __construct() {
        $this->obj_exa = new Examen();
    }
    
    public function agregarExamenAtencion($rae_id,$atn_id,$exa_id){
        $arr = $this->obj_exa->AgregarExamenAtenecion($rae_id,$atn_id,$exa_id);
        return $arr;
    }
    
    public function listar_examen_tex($tex_id){
        $res = $this->obj_exa->ListarExamen(2, $tex_id);
        return $res;
    }
    
    public function listar_examen_id($id){
        $res = $this->obj_exa->ListarExamen(1, $id);
        return $res;
    }
    
    public function listar_examen_atn($atn){
        $res = $this->obj_exa->ListarExamen(3, $atn);
        return $res;
    }
    
    public function listar_examen_all(){
        $res = $this->obj_exa->ListarExamen(null, null);
        return $res;
    }
    
    public function setExamen($id_examen){
        $res = $this->listar_examen_id($id_examen);
        if(is_array($res)  && $res != null){
            $this->exa_id                  = $res[0]['exa_id'];
            $this->exa_denominacion        = $res[0]['exa_denominacion'];
            $this->exa_descipcion          = $res[0]['exa_descripcion'];
            $this->exa_tex_id              = $res[0]['exa_tex_id'];
            $this->exa_activo              = $res[0]['exa_activo'];
        }else{
            $this->exa_id                  = "";
            $this->exa_denominacion        = "";
            $this->exa_descipcion          = "";
            $this->exa_tex_id              = "";
            $this->exa_activo              = "";
        }
    }

    public function getExa_id() {
        return $this->exa_id;
    }

    public function setExa_id($exa_id) {
        $this->exa_id = $exa_id;
    }

    public function getExa_denominacion() {
        return $this->exa_denominacion;
    }

    public function setExa_denominacion($exa_denominacion) {
        $this->exa_denominacion = $exa_denominacion;
    }

    public function getExa_descipcion() {
        return $this->exa_descipcion;
    }

    public function setExa_descipcion($exa_descipcion) {
        $this->exa_descipcion = $exa_descipcion;
    }

    public function getExa_tex_id() {
        return $this->exa_tex_id;
    }

    public function setExa_tex_id($exa_tex_id) {
        $this->exa_tex_id = $exa_tex_id;
    }

    public function getExa_activo() {
        return $this->exa_activo;
    }

    public function setExa_activo($exa_activo) {
        $this->exa_activo = $exa_activo;
    }


}
?>