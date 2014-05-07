<?php
include_once ("/var/www/medbox/clases/dao/Prestacion.php");
class beans_prestacion{
    private $obj_pre;
    
    
    public function __construct() {
        $this->obj_pre = new Prestacion();
    }
   
    public function listar_prestacion($id = null){
        $res = $this->obj_pre->ListarPrestacion($id);
        return $res;
    }
    
    
    

    
}
?>