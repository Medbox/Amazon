<?php
include_once ("/var/www/artesaniasheider/clases/dao/Comentario.php");
class beans_comentario{
    private $obj_com;
    
    
    public function __construct() {
        $this->obj_com = new Comentario();
    }
   
    public function listarComentarioALL(){
        $res = $this->obj_com->ListarCaomentario(2,null);
        return $res;
    }
    
    public function listarComentarioPostId($id){
        $res = $this->obj_com->ListarCaomentario(1,$id);
        return $res;
    }
    
    public function agregarComentario($comentario,$ip,$post_id){
        $res = $this->obj_com->AgregarComentario($comentario,$ip,$post_id);
        return $res;
    }
     
}
?>