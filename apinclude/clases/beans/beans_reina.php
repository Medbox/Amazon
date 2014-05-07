<?php
include_once ("../clases/dao/Reina.php");
class beans_reina{
    private $obj_rei;
    private $_rei_id;
    private $_rei_fecha;
    private $_rei_obt_id;
    private $_rei_obt_nom;
    private $_rei_certificado;
    private $_rei_fam_id;
    private $_rei_fam_nom;
    private $_rei_fecundada;
    private $_rei_estado;
    private $_rei_nombre;
    
    public function __construct() {
        $this->obj_rei = new Reina();
    }
    
    public function AgregarReina($nombre,$fecha,$obtencion,$orden,$colmena,$fecundada,$estado,$usu_crea,$ip){
        $res = $this->obj_rei->AgregarReina($nombre,$fecha,$obtencion,$orden,$colmena,$fecundada,$estado,$usu_crea,$ip);
        return $res;
    }
   
    public function listar_reinas($id = null){
        $res = $this->obj_rei->ListarReinas($id);
        return $res;
    }
    
    public function setReina($id_reina){
        $res = $this->listar_reinas($id_reina);
        if(is_array($res)){
            $this->_rei_id          = $res[0]['REI_ID'];
            $this->_rei_fecha       = $res[0]['REI_FECHA_INGRESO'];
            $this->_rei_obt_id      = $res[0]['REI_OBT_ID'];
            $this->_rei_obt_nom     = $res[0]['OBT_DENOMINACION'];
            $this->_rei_certificado = $res[0]['REI_CERTIFICADO'];
            $this->_rei_fam_id      = $res[0]['REI_FAM_ID'];
            $this->_rei_fecundada   = $res[0]['REI_FECUNDADA'];
            $this->_rei_estado      = $res[0]['REI_ESTADO'];
            $this->_rei_nombre      = $res[0]['REI_NOMBRE'];
            $this->_rei_fam_nom     = $res[0]['FAM_NOMBRE'];
        }else{
            $this->_rei_id          = "";
            $this->_rei_fecha       = "";
            $this->_rei_obt_id      = "";
            $this->_rei_obt_nom     = "";
            $this->_rei_certificado = "";
            $this->_rei_fam_id      = "";
            $this->_rei_fecundada   = "";
            $this->_rei_estado      = "";
            $this->_rei_nombre      = "";
            $this->_rei_fam_nom     = "";
        }
    }
    
    public function get_rei_id() {
        return $this->_rei_id;
    }

    public function set_rei_id($_rei_id) {
        $this->_rei_id = $_rei_id;
    }

    public function get_rei_fecha() {
        return $this->_rei_fecha;
    }

    public function set_rei_fecha($_rei_fecha) {
        $this->_rei_fecha = $_rei_fecha;
    }

    public function get_rei_obt_id() {
        return $this->_rei_obt_id;
    }

    public function set_rei_obt_id($_rei_obt_id) {
        $this->_rei_obt_id = $_rei_obt_id;
    }

    public function get_rei_certificado() {
        return $this->_rei_certificado;
    }

    public function set_rei_certificado($_rei_certificado) {
        $this->_rei_certificado = $_rei_certificado;
    }

    public function get_rei_fam_id() {
        return $this->_rei_fam_id;
    }

    public function set_rei_fam_id($_rei_fam_id) {
        $this->_rei_fam_id = $_rei_fam_id;
    }

    public function get_rei_fecundada() {
        return $this->_rei_fecundada;
    }

    public function set_rei_fecundada($_rei_fecundada) {
        $this->_rei_fecundada = $_rei_fecundada;
    }

    public function get_rei_estado() {
        return $this->_rei_estado;
    }

    public function set_rei_estado($_rei_estado) {
        $this->_rei_estado = $_rei_estado;
    }

    public function get_rei_nombre() {
        return $this->_rei_nombre;
    }

    public function set_rei_nombre($_rei_nombre) {
        $this->_rei_nombre = $_rei_nombre;
    }

    public function get_rei_fam_nom() {
        return $this->_rei_fam_nom;
    }

    public function set_rei_fam_nom($_rei_fam_nom) {
        $this->_rei_fam_nom = $_rei_fam_nom;
    }

    public function get_rei_obt_nom() {
        return $this->_rei_obt_nom;
    }

    public function set_rei_obt_nom($_rei_obt_nom) {
        $this->_rei_obt_nom = $_rei_obt_nom;
    }



}


?>