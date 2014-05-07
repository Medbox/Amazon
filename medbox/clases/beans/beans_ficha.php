<?php
include_once ("/var/www/medbox/clases/dao/Ficha.php");
class beans_ficha{
    private $obj_fic;
    private $fic_id;
    private $fic_motivo_consulta;
    private $fic_antecedentes;
    private $fic_cct_id;
    private $fic_cct_nro;
    private $fic_fecha_in;
    private $fic_fecha_out;
    private $fic_pac_id;
    private $fic_tfi_id;
    private $fic_activo;
    
    public function __construct() {
        $this->obj_fic = new Ficha();
    }
    
    public function agregarFicha($fic_id,$fic_antecedentes,$fic_motivo,$cct_id,$cct_nro,$fecha_out,$pac_id,$tfi_id){
        $arr = $this->obj_fic->AgregarFicha($fic_id,$fic_antecedentes,$fic_motivo,$cct_id,$cct_nro,$fecha_out,$pac_id,$tfi_id);
        return $arr;
    }
       
    public function listar_ficha_tfi($tfi_id){
        $res = $this->obj_fic->ListarFicha(2, $tfi_id);
        return $res;
    }
    
    public function listar_ficha_id($id){
        $res = $this->obj_fic->ListarFicha(1, $id);
        return $res;
    }
    
    public function listar_ficha_cct_id($cct_id){
        $res = $this->obj_fic->ListarFicha(4, $cct_id);
        return $res;
    }
    
    public function listar_ficha_cct_nro($cct_nro){
        $res = $this->obj_fic->ListarFicha(5, $cct_nro);
        return $res;
    }
    
    public function listar_ficha_pac($pac){
        $res = $this->obj_fic->ListarFicha(3, $pac);
        return $res;
    }
    
    public function listar_ficha_all(){
        $res = $this->obj_fic->ListarFicha(null, null);
        return $res;
    }
    
    public function setFicha($id_ficha){
        $res = $this->listar_ficha_id($id_ficha);
        if(is_array($res)  && $res != null){
            $this->fic_id                  = $res[0]['fic_id'];
            $this->fic_motivo_consulta     = $res[0]['fic_motivo_consulta'];
            $this->fic_antecedentes        = $res[0]['fic_antecedentes'];
            $this->fic_cct_id              = $res[0]['fic_cct_id'];
            $this->fic_cct_nro             = $res[0]['fic_cct_nro'];
            $this->fic_fecha_in            = $res[0]['fic_fecha_in'];
            $this->fic_fecha_out           = $res[0]['fic_fecha_out'];
            $this->fic_pac_id              = $res[0]['fic_pac_id'];
            $this->fic_tfi_id              = $res[0]['fic_tfi_id'];
            $this->fic_activo              = $res[0]['fic_activo'];
            
        }else{
            $this->fic_id                  = "";
            $this->fic_motivo_consulta     = "";
            $this->fic_antecedentes        = "";
            $this->fic_cct_id              = "";
            $this->fic_cct_nro             = "";
            $this->fic_fecha_in            = "";
            $this->fic_fecha_out           = "";
            $this->fic_pac_id              = "";
            $this->fic_tfi_id              = "";
            $this->fic_activo              = "";
        }
    }
    
    public function getFic_id() {
        return $this->fic_id;
    }

    public function setFic_id($fic_id) {
        $this->fic_id = $fic_id;
    }

    public function getFic_motivo_consulta() {
        return $this->fic_motivo_consulta;
    }

    public function setFic_motivo_consulta($fic_motivo_consulta) {
        $this->fic_motivo_consulta = $fic_motivo_consulta;
    }

    public function getFic_antecedentes() {
        return $this->fic_antecedentes;
    }

    public function setFic_antecedentes($fic_antecedentes) {
        $this->fic_antecedentes = $fic_antecedentes;
    }

    public function getFic_cct_id() {
        return $this->fic_cct_id;
    }

    public function setFic_cct_id($fic_cct_id) {
        $this->fic_cct_id = $fic_cct_id;
    }

    public function getFic_cct_nro() {
        return $this->fic_cct_nro;
    }

    public function setFic_cct_nro($fic_cct_nro) {
        $this->fic_cct_nro = $fic_cct_nro;
    }

    public function getFic_fecha_in() {
        return $this->fic_fecha_in;
    }

    public function setFic_fecha_in($fic_fecha_in) {
        $this->fic_fecha_in = $fic_fecha_in;
    }

    public function getFic_fecha_out() {
        return $this->fic_fecha_out;
    }

    public function setFic_fecha_out($fic_fecha_out) {
        $this->fic_fecha_out = $fic_fecha_out;
    }

    public function getFic_pac_id() {
        return $this->fic_pac_id;
    }

    public function setFic_pac_id($fic_pac_id) {
        $this->fic_pac_id = $fic_pac_id;
    }

    public function getFic_tfi_id() {
        return $this->fic_tfi_id;
    }

    public function setFic_tfi_id($fic_tfi_id) {
        $this->fic_tfi_id = $fic_tfi_id;
    }

    public function getFic_activo() {
        return $this->fic_activo;
    }

    public function setFic_activo($fic_activo) {
        $this->fic_activo = $fic_activo;
    }



}
?>