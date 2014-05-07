<?php
include_once ("/var/www/artesaniasheider/clases/dao/Post.php");
class beans_post{
    private $obj_pos;
    
    
    public function __construct() {
        $this->obj_pos = new Post();
    }
   
    public function listarPostCategoria($cat_id){
        $res = $this->obj_pos->ListarPost(1,$cat_id);
        return $res;
    }
    
    public function listarPostId($id){
        $res = $this->obj_pos->ListarPost(2,$id);
        return $res;
    }
    
    public function agregarPost($usu_id,$titulo,$descripcion,$categoria){
        $res = $this->obj_pos->AgregarPost($usu_id,$titulo,$descripcion,$categoria);
        return $res;
    }
     
}
?>