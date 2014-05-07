<?php
include_once ("/var/www/medbox/clases/dao/Equipo.php");
class beans_equipo{
    private $obj_equ;
    private $equ_id;
    private $equ_denominacion;
    private $equ_descripcion;
    private $equ_cre_id;
    private $equ_cre_deno;
    private $equ_activo;
    
    
    public function __construct() {
        $this->obj_equ = new Equipo();
    }
   
    public function listar_equipo($id = null){
        $res = $this->obj_equ->ListarEquipo($id);
        /*foreach($res as $var=>$val){
            $arr[]= $val;
        }*/
        return $res;
    }
    
    public function setEquipo($id_equ){
        $res = $this->listar_equipo($id_equ);
        if(is_array($res)){
            $this->equ_id           = $res[0]['EQU_ID'];
            $this->equ_denominacion = $res[0]['EQU_DESCRIPCION'];
            $this->equ_descripcion  = $res[0]['EQU_DENOMINACION'];
            $this->equ_cre_id       = $res[0]['EQU_CRE_ID'];
            $this->equ_cre_deno     = $res[0]['CRE_DENOMINACION'];
            $this->equ_activo       = $res[0]['EQU_ACTIVO'];
        }else{
            $this->equ_id           = "";
            $this->equ_denominacion = "";
            $this->equ_descripcion  = "";
            $this->equ_cre_id       = "";
            $this->equ_cre_deno     = "";
            $this->equ_activo       = "";
        }
    }
       
    

    public function getEqu_id() {
        return $this->equ_id;
    }

    public function setEqu_id($equ_id) {
        $this->equ_id = $equ_id;
    }

    public function getEqu_denominacion() {
        return $this->equ_denominacion;
    }

    public function setEqu_denominacion($equ_denominacion) {
        $this->equ_denominacion = $equ_denominacion;
    }

    public function getEqu_descripcion() {
        return $this->equ_descripcion;
    }

    public function setEqu_descripcion($equ_descripcion) {
        $this->equ_descripcion = $equ_descripcion;
    }

    public function getEqu_cre_id() {
        return $this->equ_cre_id;
    }

    public function setEqu_cre_id($equ_cre_id) {
        $this->equ_cre_id = $equ_cre_id;
    }

    public function getEqu_cre_deno() {
        return $this->equ_cre_deno;
    }

    public function setEqu_cre_deno($equ_cre_deno) {
        $this->equ_cre_deno = $equ_cre_deno;
    }

    public function getEqu_activo() {
        return $this->equ_activo;
    }

    public function setEqu_activo($equ_activo) {
        $this->equ_activo = $equ_activo;
    }


}
?>