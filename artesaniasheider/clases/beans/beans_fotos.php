<?php
include_once ("/var/www/artesaniasheider/clases/dao/Fotos.php");
class beans_fotos{
    private $obj_fot;
    
    
    public function __construct() {
        $this->obj_fot = new Fotos();
    }
       
    public function agregarFoto($post_id,$url,$caratula){
        $res = $this->obj_fot->AgregarFotos($post_id,$url,$caratula);
        return $res;
    }
    
    public function listarFoto($post_id){
        $res = $this->obj_fot->ListarFoto($post_id);
        return $res;
    }
    
}
?>