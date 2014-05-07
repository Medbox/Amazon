<?php

require_once "Class.Conexion.php";

class User {

    private $_ora;
    private $_conexion;
    private $usu_id;
    private $usu_user_name;
    private $usu_pass;
    private $usu_active;
    private $rut;
    private $dv;
    private $nombre;
    private $ape_pat;
    private $ape_mat;
    private $fun_id;
    private $rol_id;
    private $rol_des;
    
    private $fecha_nacimiento;
    private $domicilio;
    private $comuna_id;
    private $comuna_des;
    private $profesion;
    private $celular;
    private $correo;
    private $skype;
    private $facebook;

    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }

    public function __destruct() {
        
    }

    public function list_user($user, $pass) {
        $this->__construct();
        $stmt = $this->_ora->prepare("select login(:in_usu,:in_pass)");
        $stmt->bindParam('in_usu', $user, PDO::PARAM_STR);
        $stmt->bindParam('in_pass', $pass, PDO::PARAM_STR);
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

    public function list_user_id($user_id) {
        $this->__construct();
        $stmt = $this->_ora->prepare("select set_usuario(:in_usu_id)");
        $stmt->bindParam('in_usu_id', $user_id, PDO::PARAM_INT);
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

    private function list_por_rol($rol_id) {
        $this->__construct();
        $stmt = $this->_ora->prepare("select listar_por_rol(:in_rol_id)");
        $stmt->bindParam('in_rol_id', $rol_id, PDO::PARAM_INT);
        $cursors = $stmt->fetchAll();
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
    
    

    public function setUsuario($usu_id) {
        
        $arr = $this->list_user_id($usu_id);
        
        foreach ($arr as $var => $val) {
            $this->usu_id = $val["USU_ID"];
            $this->usu_user_name = $val["USU_USERNAME"];
            $this->usu_pass = $val["USU_PASSWORD"];
            $this->usu_active = $val["USU_ACTIVE"];
            $this->rut = $val["fun_rut"];
            $this->dv = $val["fun_dv"];
            $this->nombre = $val["fun_nombre"];
            $this->ape_pat = $val["fun_ape_pat"];
            $this->ape_mat = $val["fun_ape_mat"];
            $this->fun_id = $val["USU_FUN_ID"];
            $this->rol_id = $val["USU_ROL_ID"];
            $this->rol_des = $val["rol_des"];
            $this->fecha_nacimiento = $val["fun_fecha_nacimiento"];
            $this->domicilio = $val["fun_domicilio"];
            $this->comuna_id = $val["fun_ciudad_id"];
            $this->comuna_des = $val["com_denominacion"];
            $this->profesion = $val["fun_profesion"];
            $this->celular = $val["fun_celular"];
            $this->correo = $val["fun_correo"];
            $this->skype = $val["fun_skype"];
            $this->facebook = $val["fun_facebook"];
        }
    }

    public function listarEditores() {
        $arr = $this->list_por_rol(2);
        return $arr;
    }

    public function get_usu_id() {
        return $this->usu_id;
    }

    public function get_usu_name() {
        return $this->usu_user_name;
    }

    public function get_usu_pass() {
        return $this->usu_pass;
    }

    public function get_usu_rut() {
        return $this->rut;
    }

    public function get_usu_dv() {
        return $this->dv;
    }

    public function get_usu_nombre() {
        return $this->nombre;
    }

    public function get_usu_ape_pat() {
        return $this->ape_pat;
    }

    public function get_usu_ape_mat() {
        return $this->ape_mat;
    }

    public function get_fun_id() {
        return $this->fun_id;
    }

    public function get_rol_id() {
        return $this->rol_id;
    }

    public function get_rol_des() {
        return $this->rol_des;
    }

    
    public function getFecha_nacimiento() {
        return $this->fecha_nacimiento;
    }

    public function getDomicilio() {
        return $this->domicilio;
    }

    public function getComuna_id() {
        return $this->comuna_id;
    }

    public function getComuna_des() {
        return $this->comuna_des;
    }

    public function getProfesion() {
        return $this->profesion;
    }

    public function getCelular() {
        return $this->celular;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getSkype() {
        return $this->skype;
    }

    public function getFacebook() {
        return $this->facebook;
    }


    
    public function getUsu_user_name() {
        return $this->usu_user_name;
    }

    public function setUsu_user_name($usu_user_name) {
        $this->usu_user_name = $usu_user_name;
    }

    public function getUsu_active() {
        return $this->usu_active;
    }

    public function setUsu_active($usu_active) {
        $this->usu_active = $usu_active;
    }

    public function getRut() {
        return $this->rut;
    }

    public function setRut($rut) {
        $this->rut = $rut;
    }

    public function getDv() {
        return $this->dv;
    }

    public function setDv($dv) {
        $this->dv = $dv;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getApe_pat() {
        return $this->ape_pat;
    }

    public function setApe_pat($ape_pat) {
        $this->ape_pat = $ape_pat;
    }

    public function getApe_mat() {
        return $this->ape_mat;
    }

    public function setApe_mat($ape_mat) {
        $this->ape_mat = $ape_mat;
    }


}

?>