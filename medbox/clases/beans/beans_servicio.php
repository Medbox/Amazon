<?php
include_once ("/var/www/medbox/clases/dao/Servicio.php");
class beans_servicio{
    private $obj_ser;
    
    
    public function __construct() {
        $this->obj_ser = new Servicio();
    }
   
    public function listarServicioCentroResponsabilidad($id = null){
        $res = $this->obj_ser->ListarServicioCentroResponsabilidad($id);
        return $res;
    }
     
}
?>