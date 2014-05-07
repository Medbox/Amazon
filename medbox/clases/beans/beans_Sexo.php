<?php
include_once ("/var/www/medbox/clases/dao/Sexo.php");
class beans_sexo{
    private $obj_sex;
    private $sex_id;
    private $sex_denominacion;
    private $sex_descripcion;
    private $sex_activo;
    
    public function __construct() {
        $this->obj_sex = new Sexo();
    }
   
    public function listar_sexo_id($id){
        $res = $this->obj_sex->ListarSexo(1, $id);
        return $res;
    }
    
    public function listar_sexo_all(){
        $res = $this->obj_sex->ListarSexo(null, null);
        return $res;
    }
    
    public function setSexo($id_sexo){
        $res = $this->listar_sexo_id($id_sexo);
        if(is_array($res)  && $res != null){
            $this->sex_id                   = $res[0]['sex_id'];
            $this->sex_denominacion         = $res[0]['sex_denominacion'];
            $this->sex_descripcion          = $res[0]['sex_descripcion'];
            $this->sex_activo               = $res[0]['sex_activo'];
        }else{
            $this->sex_id                   = "";
            $this->sex_denominacion         = "";
            $this->sex_descripcion          = "";
            $this->sex_activo               = "";
        }
    }


    public function getSex_id() {
        return $this->sex_id;
    }

    public function setSex_id($sex_id) {
        $this->sex_id = $sex_id;
    }

    public function getSex_denominacion() {
        return $this->sex_denominacion;
    }

    public function setSex_denominacion($sex_denominacion) {
        $this->sex_denominacion = $sex_denominacion;
    }

    public function getSex_descripcion() {
        return $this->sex_descripcion;
    }

    public function setSex_descripcion($sex_descripcion) {
        $this->sex_descripcion = $sex_descripcion;
    }

    public function getSex_activo() {
        return $this->sex_activo;
    }

    public function setSex_activo($sex_activo) {
        $this->sex_activo = $sex_activo;
    }


}
?>