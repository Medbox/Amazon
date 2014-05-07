<?php
include_once ("/var/www/medbox/clases/dao/Cierre.php");
class beans_cierre{
    private $obj_cie;
    private $cie_id;
    private $cie_fecha_in;
    private $cie_fic_id;
    private $cie_resumen;
    private $cie_usu_id;
    private $cie_activo;
    
    public function __construct() {
        $this->obj_cie = new Cierre();
    }
    
    public function agregarCierre($cie_id,$fic_id,$resumen,$usu_id,$ip){
        $arr = $this->obj_cie->AgregarCierre($cie_id,$fic_id,$resumen,$usu_id,$ip);
        return $arr;
    }
    
    
    public function listar_cierre_id($id){
        $res = $this->obj_cie->ListarCierre(1, $id);
        return $res;
    }
    
    public function listar_cierre_fic($fic){
        $res = $this->obj_cie->ListarCierre(2, $fic);
        return $res;
    }
    
    public function listar_cierre_all(){
        $res = $this->obj_cie->ListarCierre(null, null);
        return $res;
    }
    
    public function setCierre($id_cierre){
        $res = $this->listar_cierre_id($id_cierre);
        if(is_array($res)  && $res != null){
            $this->cie_id             = $res[0]['cie_id'];
            $this->cie_resumen        = $res[0]['cie_resumen'];
            $this->cie_fic_id         = $res[0]['cie_fic_id'];
            $this->cie_fecha_in       = $res[0]['cie_fecha_in'];
            $this->cie_usu_id         = $res[0]['cie_usu_id'];
            $this->cie_activo         = $res[0]['cie_activo'];
        }else{
            $this->cie_id             = "";
            $this->cie_resumen        = "";
            $this->cie_fic_id         = "";
            $this->cie_fecha_in       = "";
            $this->cie_usu_id         = "";
            $this->cie_activo         = "";
        }
    }
    
    public function getCie_id() {
        return $this->cie_id;
    }

    public function setCie_id($cie_id) {
        $this->cie_id = $cie_id;
    }

    public function getCie_fecha_in() {
        return $this->cie_fecha_in;
    }

    public function setCie_fecha_in($cie_fecha_in) {
        $this->cie_fecha_in = $cie_fecha_in;
    }

    public function getCie_fic_id() {
        return $this->cie_fic_id;
    }

    public function setCie_fic_id($cie_fic_id) {
        $this->cie_fic_id = $cie_fic_id;
    }

    public function getCie_resumen() {
        return $this->cie_resumen;
    }

    public function setCie_resumen($cie_resumen) {
        $this->cie_resumen = $cie_resumen;
    }

    public function getCie_usu_id() {
        return $this->cie_usu_id;
    }

    public function setCie_usu_id($cie_usu_id) {
        $this->cie_usu_id = $cie_usu_id;
    }

    public function getCie_activo() {
        return $this->cie_activo;
    }

    public function setCie_activo($cie_activo) {
        $this->cie_activo = $cie_activo;
    }



}
?>