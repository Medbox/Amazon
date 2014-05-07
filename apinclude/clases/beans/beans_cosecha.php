<?php
include_once ("../clases/dao/Cosecha.php");
class beans_cosecha{
    private $obj_cos;
    
    public function __construct() {
        $this->obj_cos = new Cosecha();
    }
    
    public function AgregarCosecha($fecha, $kilos, $n_certificado, $apiario, $floracion, $estado,$denominacion_floracion,$usu_id,$ip){
        $res = $this->obj_cos->AgregarCosecha($fecha, $kilos, $n_certificado, $apiario, $floracion, $estado,$denominacion_floracion,$usu_id,$ip);
        return $res;
    }
    
    public function listar_cosecha($id = null){
        $res = $this->obj_cos->ListarCosecha($id);
        return $res;
    }
    
    public function listarApiariosKilos(){
        $res = $this->obj_cos->ListarApiarioKilos();
        return $res;
    }
    
    public function listaKilosAnos(){
        $res = $this->obj_cos->ListarKilosAnos();
        return $res;
    }
   
}


?>