<?php
include_once ("/var/www/medbox/clases/dao/Nota.php");
class beans_nota{
    private $obj_not;
    private $not_id;
    private $not_descripcion;
    private $not_fecha_in;
    private $not_atn_id;
    private $not_activo;
    
    public function __construct() {
        $this->obj_not = new Nota();
    }
    
    public function agregarNota($not_id, $not_decripcion, $not_atn){
        $arr = $this->obj_not->AgregarNota($not_id, $not_decripcion, $not_atn);
        return $arr;
    }
    
    public function listar_nota_atn($atn){
        $res = $this->obj_not->ListarNota(2, $atn);
        return $res;
    }
    
    public function listar_nota_id($id){
        $res = $this->obj_not->ListarNota(1, $id);
        return $res;
    }
    
    public function listar_nota_all(){
        $res = $this->obj_not->ListarNota(null, null);
        return $res;
    }
    
    public function setNota($id_nota){
        $res = $this->listar_nota_id($id_nota);
        if(is_array($res)  && $res != null){
            $this->not_id                  = $res[0]['not_id'];
            $this->not_descripcion         = $res[0]['not_descripcion'];
            $this->not_fecha_in            = $res[0]['not_fecha_in'];
            $this->not_atn_id              = $res[0]['not_atn_id'];
            $this->not_activo              = $res[0]['not_activo'];
        }else{
            $this->not_id                  = "";
            $this->not_descripcion         = "";
            $this->not_fecha_in            = "";
            $this->not_atn_id              = "";
            $this->not_activo              = "";
        }
    }
    
    public function getNot_id() {
        return $this->not_id;
    }

    public function setNot_id($not_id) {
        $this->not_id = $not_id;
    }

    public function getNot_descripcion() {
        return $this->not_descripcion;
    }

    public function setNot_descripcion($not_descripcion) {
        $this->not_descripcion = $not_descripcion;
    }

    public function getNot_fecha_in() {
        return $this->not_fecha_in;
    }

    public function setNot_fecha_in($not_fecha_in) {
        $this->not_fecha_in = $not_fecha_in;
    }

    public function getNot_atn_id() {
        return $this->not_atn_id;
    }

    public function setNot_atn_id($not_atn_id) {
        $this->not_atn_id = $not_atn_id;
    }

    public function getNot_activo() {
        return $this->not_activo;
    }

    public function setNot_activo($not_activo) {
        $this->not_activo = $not_activo;
    }



}
?>