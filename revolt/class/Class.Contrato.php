<?php

require_once "Class.Conexion.php";

class Contrato {

    private $_ora;
    private $_conexion;
    private $fun_rut;
    private $nombre;
    private $estado;
    private $con_domicilio;
    private $con_mail_revolt;
    private $con_cargo;
    private $con_ciudad;
    private $departamento;
    private $con_civil;
    private $con_ocupacion;
    private $sexo;
    private $sexo_id;
    private $funsion;
    private $con_renta;
    private $anexo_id;
    private $anexo_des;
	private $modalidad;
	private $nacionalidad;

    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }

    public function __destruct() {
        
    }

    public function list_contrato($fun_id) {
        $stmt = $this->_ora->prepare("select listar_contrato(:in_fun_id)");
        $stmt->bindParam('in_fun_id', $fun_id, PDO::PARAM_INT);
        $stmt->execute();
        $cursors = $stmt->fetchAll();
        $stmt->closeCursor();
        $results = array();
        foreach ($cursors as $k => $v) {
            $stmt = $this->_ora->query('FETCH ALL IN "' . $v[0] . '";');
            $results = $stmt->fetchAll();
            $stmt->closeCursor();
        }
        $this->_ora->commit();
        unset($stmt);
        return $results;
    }
    
    public function list_contrato_contrato($con_id,$fun_id) {
        $stmt = $this->_ora->prepare("select listar_contrato_contrato(:in_con_id,:in_fun_id)");
        $stmt->bindParam('in_con_id', $con_id, PDO::PARAM_INT);
        $stmt->bindParam('in_fun_id', $fun_id, PDO::PARAM_INT);
        $stmt->execute();
        $cursors = $stmt->fetchAll();
        $stmt->closeCursor();
        $results = array();
        foreach ($cursors as $k => $v) {
            $stmt = $this->_ora->query('FETCH ALL IN "' . $v[0] . '";');
            $results = $stmt->fetchAll();
            $stmt->closeCursor();
        }
        $this->_ora->commit();
        unset($stmt);
        return $results;
    }
    
    public function getPuntosRut($rut){
            $rutTmp = explode( "-", $rut );
            return number_format( $rutTmp[0], 0, "", ".") . '-' . $rutTmp[1];
    }
    
    public function setContratoContrato($con_id,$fun_id){//traer datos del contrato :D
        $res = $this->list_contrato_contrato($con_id,$fun_id);
        if(is_array($res)  && $res != null){
            $this->fun_rut          = $this->getPuntosRut($res[0]['fun_rut']);
            $this->nombre           = $res[0]['fun_nombre'];
            $this->estado           = $res[0]['fun_activo'];
            $this->con_domicilio    = $res[0]['fun_domicilio'];
            $this->con_mail_revolt  = $res[0]['fun_correo'];
            $this->con_cargo        = $res[0]['car_denominacion'];
            $this->con_ciudad       = $res[0]['ciu_denominacion'];
            $this->departamento     = $res[0]['dep_denominacion'];
            $this->con_civil        = $res[0]['esc_denominacion'];
            //$this->con_ocupacion    = $res[0]['ocu_denominacion'];
            $this->con_ocupacion    = $res[0]['fun_ocupacion'];
			$this->sexo             = $res[0]['sex_denominacion'];
            $this->sexo_id          = $res[0]['fun_sex_id'];
            $this->funsion          = $res[0]['fco_denominacion'];
            $this->con_renta        = $res[0]['con_renta'];
            $this->anexo_id         = $res[0]['con_ane_id'];
            $this->anexo_des        = $res[0]['ane_denominacion'];
			$this->modalidad		= $res[0]['fun_tipo_modalidad'];//agregado por colt
			$this->nacionalidad		= $res[0]['fun_tipo_nacionalidad'];//agregado por colt :D
			
        }else{
            $this->fun_rut          = "";
            $this->nombre           = "";
            $this->con_domicilio    = "";
            $this->con_mail_revolt  = "";
            $this->con_cargo        = "";
            $this->con_ciudad       = "";
            $this->departamento     = "";
            $this->con_civil        = "";
            $this->con_ocupacion    = "";
            $this->sexo             = "";
            $this->sexo_id          = "";
            $this->funsion          = "";
            $this->con_renta        = "";
            $this->anexo_id         = "";
            $this->anexo_des        = "";
			$this->modalidad		= "";//agregado por colt
			$this->nacionalidad		= "";//agregado por colt :D
        }
    }
    
    
    
    public function setContrato($fun_id){
        $res = $this->list_contrato($fun_id);
        if(is_array($res)  && $res != null){
            $this->fun_rut          = $this->getPuntosRut($res[0]['fun_rut']);
            $this->nombre           = $res[0]['fun_nombre'];
            $this->estado           = $res[0]['fun_activo'];
            $this->con_domicilio    = $res[0]['fun_domicilio'];
            $this->con_mail_revolt  = $res[0]['fun_correo'];
            $this->con_cargo        = $res[0]['car_denominacion'];
            $this->con_ciudad       = $res[0]['ciu_denominacion'];
            $this->departamento     = $res[0]['dep_denominacion'];
            $this->con_civil        = $res[0]['esc_denominacion'];
			//$this->con_ocupacion    = $res[0]['ocu_denominacion'];
            $this->con_ocupacion    = $res[0]['fun_ocupacion'];
            $this->sexo             = $res[0]['sex_denominacion'];
            $this->sexo_id          = $res[0]['fun_sex_id'];
            $this->funsion          = $res[0]['fco_denominacion'];
            $this->con_renta        = $res[0]['con_renta'];
            $this->anexo_id         = $res[0]['con_ane_id'];
            $this->anexo_des        = $res[0]['ane_denominacion'];
			$this->modalidad		= $res[0]['fun_tipo_modalidad'];//agregado por colt
			$this->nacionalidad		= $res[0]['fun_tipo_nacionalidad'];//agregado por colt :D
            
        }else{
            $this->fun_rut          = "";
            $this->nombre           = "";
            $this->con_domicilio    = "";
            $this->con_mail_revolt  = "";
            $this->con_cargo        = "";
            $this->con_ciudad       = "";
            $this->departamento     = "";
            $this->con_civil        = "";
            $this->con_ocupacion    = "";
            $this->sexo             = "";
            $this->sexo_id          = "";
            $this->funsion          = "";
            $this->con_renta        = "";
            $this->anexo_id         = "";
            $this->anexo_des        = "";
			$this->modalidad		= "";//agregado por colt
			$this->nacionalidad		= "";//agregado por colt :D
        }
    }
    
    public function get_conexion() {
        return $this->_conexion;
    }

    public function set_conexion($_conexion) {
        $this->_conexion = $_conexion;
    }

    public function getFun_rut() {
        return $this->fun_rut;
    }

    public function setFun_rut($fun_rut) {
        $this->fun_rut = $fun_rut;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    public function getCon_domicilio() {
        return $this->con_domicilio;
    }

    public function setCon_domicilio($con_domicilio) {
        $this->con_domicilio = $con_domicilio;
    }

    public function getCon_mail_revolt() {
        return $this->con_mail_revolt;
    }

    public function setCon_mail_revolt($con_mail_revolt) {
        $this->con_mail_revolt = $con_mail_revolt;
    }

    public function getCon_cargo() {
        return $this->con_cargo;
    }

    public function setCon_cargo($con_cargo) {
        $this->con_cargo = $con_cargo;
    }

    public function getCon_ciudad() {
        return $this->con_ciudad;
    }

    public function setCon_ciudad($con_ciudad) {
        $this->con_ciudad = $con_ciudad;
    }

    public function getDepartamento() {
        return $this->departamento;
    }

    public function setDepartamento($departamento) {
        $this->departamento = $departamento;
    }

    public function getCon_civil() {
        return $this->con_civil;
    }

    public function setCon_civil($con_civil) {
        $this->con_civil = $con_civil;
    }

    public function getCon_ocupacion() {
        return $this->con_ocupacion;
    }

    public function setCon_ocupacion($con_ocupacion) {
        $this->con_ocupacion = $con_ocupacion;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getFuncion() {
        return $this->funsion;
    }

    public function setFunsion($funsion) {
        $this->funsion = $funsion;
    }

    public function getCon_renta() {
        return $this->con_renta;
    }

    public function setCon_renta($con_renta) {
        $this->con_renta = $con_renta;
    }
    
    public function getSexo_id() {
        return $this->sexo_id;
    }

    public function setSexo_id($sexo_id) {
        $this->sexo_id = $sexo_id;
    }


    public function getAnexo_id() {
        return $this->anexo_id;
    }

    public function setAnexo_id($anexo_id) {
        $this->anexo_id = $anexo_id;
    }

    public function getAnexo_des() {
        return $this->anexo_des;
    }

    public function setAnexo_des($anexo_des) {
        $this->anexo_des = $anexo_des;
    }

    public function getModalidad(){
        return $this->modalidad;
    }
	
	public function getNacionalidad(){
        return $this->nacionalidad;
    }


}

?>