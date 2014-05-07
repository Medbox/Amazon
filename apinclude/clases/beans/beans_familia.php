<?php
include_once ("../clases/dao/Familia.php");
class beans_familia{
    private $obj_fam;
    private $_nombre;
    private $_tipo_fam;
    private $_tipo_fam_den;
    private $_origen_fam;
    private $_origen_fam_den;
    private $_familia_id;
    private $_apiario_id;
    private $_reina_id;
    private $_alza;
    
    public function __construct() {
        $this->obj_fam = new Familia();
    }
   
    public function AgregarFamilia($nombre,$tipo_fam,$origen_fam,$familia_id,$apiario_id,$reina_id,$alza,$estado,$usu_crea,$ip){
        $res = $this->obj_fam->AgregarFamilia($nombre,$tipo_fam,$origen_fam,$familia_id,$apiario_id,$reina_id,$alza,$estado,$usu_crea,$ip);
        return $res;
    }
    
    public function listar_tipo_familia($id = null){
        $res = $this->obj_fam->ListarTipoFamilia($id);
        return $res;
    }
    
    public function listar_origen_familia($id = null){
        $res = $this->obj_fam->ListarOrigenFamilia($id);
        return $res;
    }
    
    public function listar_familia($id = null){
        $res = $this->obj_fam->ListarFamilia($id);
        return $res;
    }
    
    public function listar_familia_apiario($id){
        $res = $this->obj_fam->ListarFamiliaApiario($id);
        if(isset($res)){
            return $res;
        }else{
            return '';
        }
    }
    
    public function listar_sin_apiario(){
        $res = $this->obj_fam->ListarSinApiario();
        if(isset($res)){
            return $res;
        }else{
            return '';
        }
    }
    
    public function listar_familia_busqueda($nombre, $tipo_fam){
        $res = $this->obj_fam->ListarFamiliaBusqueda($nombre, $tipo_fam);
        if(isset($res)){
            return $res;
        }else{
            return '';
        }
    }
    
    public function setFamilia($id){
        $res = $this->listar_familia($id);
        if(is_array($res)){
            $this->_nombre          = $res[0]['FAM_NOMBRE'];
            $this->_tipo_fam        = $res[0]['FAM_TFM_ID'];
            $this->_tipo_fam_den    = $res[0]['TFM_DENOMINACION'];
            $this->_origen_fam      = $res[0]['FAM_ORF_ID'];
            $this->_origen_fam_den  = $res[0]['ORF_DENOMINACION'];
            $this->_familia_id      = $res[0]['FAM_FAM_ID'];
            $this->_apiario_id      = $res[0]['FAM_API_ID'];
            $this->_reina_id        = $res[0]['FAM_REI_ID'];
            $this->_alza            = $res[0]['FAM_ALZA'];
        }else{
            $this->_nombre          = '';
            $this->_tipo_fam        = '';
            $this->_tipo_fam_den    = '';
            $this->_origen_fam      = '';
            $this->_origen_fam_den  = '';
            $this->_familia_id      = '';
            $this->_apiario_id      = '';
            $this->_reina_id        = '';
            $this->_alza            = '';
        }
    }
    
    public function get_nombre() {
        return $this->_nombre;
    }

    public function set_nombre($_nombre) {
        $this->_nombre = $_nombre;
    }

    public function get_tipo_fam() {
        return $this->_tipo_fam;
    }

    public function set_tipo_fam($_tipo_fam) {
        $this->_tipo_fam = $_tipo_fam;
    }

    public function get_origen_fam() {
        return $this->_origen_fam;
    }

    public function set_origen_fam($_origen_fam) {
        $this->_origen_fam = $_origen_fam;
    }

    public function get_familia_id() {
        return $this->_familia_id;
    }

    public function set_familia_id($_familia_id) {
        $this->_familia_id = $_familia_id;
    }

    public function get_apiario_id() {
        return $this->_apiario_id;
    }

    public function set_apiario_id($_apiario_id) {
        $this->_apiario_id = $_apiario_id;
    }

    public function get_reina_id() {
        return $this->_reina_id;
    }

    public function set_reina_id($_reina_id) {
        $this->_reina_id = $_reina_id;
    }

    public function get_alza() {
        return $this->_alza;
    }

    public function set_alza($_alza) {
        $this->_alza = $_alza;
    }

    public function get_tipo_fam_den() {
        return $this->_tipo_fam_den;
    }

    public function set_tipo_fam_den($_tipo_fam_den) {
        $this->_tipo_fam_den = $_tipo_fam_den;
    }

    public function get_origen_fam_den() {
        return $this->_origen_fam_den;
    }

    public function set_origen_fam_den($_origen_fam_den) {
        $this->_origen_fam_den = $_origen_fam_den;
    }
}
?>