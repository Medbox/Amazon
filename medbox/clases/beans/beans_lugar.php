<?php
include_once ("/var/www/medbox/clases/dao/Lugar.php");
class beans_lugar{
    private $obj_lug;
    private $lug_id;
    private $lug_denominacion;
    private $lug_descripcion;
    private $lug_activo;
    
    
    public function __construct() {
        $this->obj_lug = new Lugar();
    }
   
    public function listar_lugar($id = null){
        $res = $this->obj_lug->ListarLugar($id);
        return $res;
    }
    
    public function listarLugarPrestacion($pre){
        $res = $this->obj_lug->ListarLugarPrestacion(1,$pre);
        /*
        foreach($res as $var=>$val){
            $arr[$val['LUG_PADRE_ID']][]= $val;
        }*/
        return $res;
    }
    
    public function setLugar($id_lugar){
        $res = $this->listar_lugar($id_lugar);
        if(is_array($res)){
            $this->lug_id           = $res[0]['LUG_ID'];
            $this->lug_denominacion = $res[0]['LUG_DENOMINACION'];
            $this->lug_descripcion  = $res[0]['LUG_DESCRIPCION'];
            $this->lug_activo       = $res[0]['LUG_ACTIVO'];
        }else{
            $this->lug_id           = "";
            $this->lug_denominacion = "";
            $this->lug_descripcion  = "";
            $this->lug_activo       = "";
        }
    }
    
    public function getLug_id() {
        return $this->lug_id;
    }

    public function setLug_id($lug_id) {
        $this->lug_id = $lug_id;
    }

    public function getLug_denominacion() {
        return $this->lug_denominacion;
    }

    public function setLug_denominacion($lug_denominacion) {
        $this->lug_denominacion = $lug_denominacion;
    }

    public function getLug_descripcion() {
        return $this->lug_descripcion;
    }

    public function setLug_descripcion($lug_descripcion) {
        $this->lug_descripcion = $lug_descripcion;
    }

    public function getLug_activo() {
        return $this->lug_activo;
    }

    public function setLug_activo($lug_activo) {
        $this->lug_activo = $lug_activo;
    }
    

}
?>