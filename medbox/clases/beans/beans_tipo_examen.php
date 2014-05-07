<?php
include_once ("/var/www/medbox/clases/dao/Tipo_Examen.php");
class beans_tipo_examen{
    private $obj_tex;
    private $tex_id;
    private $tex_denominacion;
    private $tex_descripcion;
    private $tex_activo;
    
    public function __construct() {
        $this->obj_tex = new Tipo_Examen();
    }
    public function listar_tipo_examen_id($id){
        $res = $this->obj_tex->ListarTipoExamen(1, $id);
        return $res;
    }
    
    public function listar_tipo_examen_all(){
        $res = $this->obj_tex->ListarTipoExamen(null, null);
        return $res;
    }
    
    public function setTipoExamen($id_tipo_examen){
        $res = $this->listar_tipo_examen_id($id_tipo_examen);
        if(is_array($res)  && $res != null){
            $this->tex_id                  = $res[0]['tex_id'];
            $this->tex_denominacion        = $res[0]['tex_denominacion'];
            $this->tex_descripcion         = $res[0]['tex_descripcion'];
            $this->tex_activo              = $res[0]['tex_activo'];
        }else{
            $this->tex_id                  = "";
            $this->tex_denominacion        = "";
            $this->tex_descripcion         = "";
            $this->tex_activo              = "";
        }
    }
    
    public function getTex_id() {
        return $this->tex_id;
    }

    public function setTex_id($tex_id) {
        $this->tex_id = $tex_id;
    }

    public function getTex_denominacion() {
        return $this->tex_denominacion;
    }

    public function setTex_denominacion($tex_denominacion) {
        $this->tex_denominacion = $tex_denominacion;
    }

    public function getTex_descripcion() {
        return $this->tex_descripcion;
    }

    public function setTex_descripcion($tex_descripcion) {
        $this->tex_descripcion = $tex_descripcion;
    }

    public function getTex_activo() {
        return $this->tex_activo;
    }

    public function setTex_activo($tex_activo) {
        $this->tex_activo = $tex_activo;
    }


}
?>