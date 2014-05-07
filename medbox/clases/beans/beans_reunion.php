<?php
include_once ("clases/dao/Reunion.php");
class beans_reunion{
    private $obj_tre;
    private $tre_id;
    private $tre_denominacion;
    private $tre_descripcion;
    private $tre_activo;
    
    
    public function __construct() {
        $this->obj_tre = new Reunion();
    }
   
    public function listar_reunion($id = null){
        $res = $this->obj_tre->ListarReunion($id);
        return $res;
    }
    
    public function listar_reunion_sub_reunion($str_id){
        $res = $this->obj_tre->ListarReunionSubReunion(1,$str_id);
        return $res;
    }
    
    public function listar_sub_reunion_reunion($tre_id){
        $res = $this->obj_tre->ListarReunionSubReunion(2,$tre_id);
        return $res;
    }
    
    public function listar_reunion_all(){
        $res = $this->obj_tre->ListarReunionSubReunion(null,null);
        return $res;
    }
    
    public function setReunion($id_reunion){
        $res = $this->listar_reunion($id_reunion);
        if(is_array($res)){
            $this->tre_id           = $res[0]['TRE_ID'];
            $this->tre_denominacion = $res[0]['TRE_DENOMINACION'];
            $this->tre_descripcion  = $res[0]['TRE_DESCRIPCION'];
            $this->tre_activo       = $res[0]['TRE_ACTIVO'];
        }else{
            $this->tre_id           = "";
            $this->tre_denominacion = "";
            $this->tre_descripcion  = "";
            $this->tre_activo       = "";
        }
    }
    
    public function getTre_id() {
        return $this->tre_id;
    }

    public function setTre_id($tre_id) {
        $this->tre_id = $tre_id;
    }

    public function getTre_denominacion() {
        return $this->tre_denominacion;
    }

    public function setTre_denominacion($tre_denominacion) {
        $this->tre_denominacion = $tre_denominacion;
    }

    public function getTre_descripcion() {
        return $this->tre_descripcion;
    }

    public function setTre_descripcion($tre_descripcion) {
        $this->tre_descripcion = $tre_descripcion;
    }

    public function getTre_activo() {
        return $this->tre_activo;
    }

    public function setTre_activo($tre_activo) {
        $this->tre_activo = $tre_activo;
    }


}
?>