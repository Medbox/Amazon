<?php
include_once ("/var/www/medbox/clases/dao/Indicaciones.php");
class beans_indicaciones{
    private $obj_ind;
    private $ind_id;
    private $ind_fecha_in;
    private $ind_cie_id;
    private $ind_denominacion;
    private $ind_activo;
    
    public function __construct() {
        $this->obj_ind = new Indicaciones();
    }
    
    public function agregarIndicaciones($ind_id,$cie_id,$denominacion){
        $arr = $this->obj_ind->AgregarIndicaciones($ind_id,$cie_id,$denominacion);
        return $arr;
    }
    
    
    public function listar_indicaciones_id($id){
        $res = $this->obj_ind->ListarIndicaciones(1, $id);
        return $res;
    }
    
    public function listar_indicaciones_cie($cie){
        $res = $this->obj_ind->ListarIndicaciones(2, $cie);
        return $res;
    }
    
    public function listar_indicaciones_all(){
        $res = $this->obj_ind->ListarIndicaciones(null, null);
        return $res;
    }
    
    public function setIndicaciones($id_indicaciones){
        $res = $this->listar_indicaciones_id($id_indicaciones);
        if(is_array($res)  && $res != null){
            $this->ind_id             = $res[0]['ind_id'];
            $this->ind_cie_id         = $res[0]['ind_cie_id'];
            $this->ind_denominacion   = $res[0]['ind_denominacion'];
            $this->ind_fecha_in       = $res[0]['ind_fecha_in'];
            $this->ind_activo         = $res[0]['ind_activo'];
        }else{
            $this->ind_id             = "";
            $this->ind_cie_id         = "";
            $this->ind_denominacion   = "";
            $this->ind_fecha_in       = "";
            $this->ind_activo         = "";
        }
    }
    
 
    public function getInd_id() {
        return $this->ind_id;
    }

    public function setInd_id($ind_id) {
        $this->ind_id = $ind_id;
    }

    public function getInd_fecha_in() {
        return $this->ind_fecha_in;
    }

    public function setInd_fecha_in($ind_fecha_in) {
        $this->ind_fecha_in = $ind_fecha_in;
    }

    public function getInd_cie_id() {
        return $this->ind_cie_id;
    }

    public function setInd_cie_id($ind_cie_id) {
        $this->ind_cie_id = $ind_cie_id;
    }

    public function getInd_denominacion() {
        return $this->ind_denominacion;
    }

    public function setInd_denominacion($ind_denominacion) {
        $this->ind_denominacion = $ind_denominacion;
    }

    public function getInd_activo() {
        return $this->ind_activo;
    }

    public function setInd_activo($ind_activo) {
        $this->ind_activo = $ind_activo;
    }



}
?>