<?php
include_once ("/var/www/medbox/clases/dao/Atencion.php");
class beans_atencion{
    private $obj_atn;
    private $atn_id;
    private $atn_evolucion;
    private $atn_fecha_in;
    private $atn_fic_id;
    private $atn_usu_id;
    
    public function __construct() {
        $this->obj_atn = new Atencion();
    }
       
    public function agregarAtencion($atn_id,$atn_evolucion,$atn_fic,$atn_usu){
        $arr = $this->obj_atn->AgregarAtencion($atn_id,$atn_evolucion,$atn_fic,$atn_usu);
        return $arr;
    }
    
    public function listar_atencion_usu($usu_id){
        $res = $this->obj_atn->ListarAtencion(2, $usu_id);
        return $res;
    }
    
    public function listar_atencion_ficha($ficha){
        $res = $this->obj_atn->ListarAtencion(3, $ficha);
        return $res;
    }
    
    public function listar_atencion_id($id){
        $res = $this->obj_atn->ListarAtencion(1, $id);
        return $res;
    }
    
    public function listar_atencion_all(){
        $res = $this->obj_atn->ListarAtencion(null, null);
        return $res;
    }
    
    public function setAtencion($id_atencion){
        $res = $this->listar_atencion_id($id_atencion);
        if(is_array($res)  && $res != null){
            $this->atn_id                  = $res[0]['atn_id'];
            $this->atn_evolucion           = $res[0]['atn_evolucion'];
            $this->atn_fecha_in            = $res[0]['atn_fecha_in'];
            $this->atn_fic_id              = $res[0]['atn_fic_id'];
            $this->atn_usu_id              = $res[0]['atn_usu_id'];
        }else{
            $this->atn_id                  = "";
            $this->atn_evolucion           = "";
            $this->atn_fecha_in            = "";
            $this->atn_fic_id              = "";
            $this->atn_usu_id              = "";
        }
    }
    
    public function getAtn_id() {
        return $this->atn_id;
    }

    public function setAtn_id($atn_id) {
        $this->atn_id = $atn_id;
    }

    public function getAtn_evolucion() {
        return $this->atn_evolucion;
    }

    public function setAtn_evolucion($atn_evolucion) {
        $this->atn_evolucion = $atn_evolucion;
    }

    public function getAtn_fecha_in() {
        return $this->atn_fecha_in;
    }

    public function setAtn_fecha_in($atn_fecha_in) {
        $this->atn_fecha_in = $atn_fecha_in;
    }

    public function getAtn_fic_id() {
        return $this->atn_fic_id;
    }

    public function setAtn_fic_id($atn_fic_id) {
        $this->atn_fic_id = $atn_fic_id;
    }

    public function getAtn_usu_id() {
        return $this->atn_usu_id;
    }

    public function setAtn_usu_id($atn_usu_id) {
        $this->atn_usu_id = $atn_usu_id;
    }


}
?>