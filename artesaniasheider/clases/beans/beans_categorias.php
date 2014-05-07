<?php
include_once ("/var/www/artesaniasheider/clases/dao/Categorias.php");
class beans_categorias{
    private $obj_cat;
    
    
    public function __construct() {
        $this->obj_cat = new Categorias();
    }
   
    public function listarCategorias(){
        $res = $this->obj_cat->ListarCategorias();
        return $res;
    }
    
    public function agregarCategoria($denominacion,$descripcion,$orden){
        $res = $this->obj_cat->AgregarCategoria($denominacion,$descripcion,$orden);
        return $res;
    }
     
}
?>