<?php

require_once "Class.Conexion.php";

class Funcionario {

    private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }

    public function __destruct() {
        
    }

    public function list_funcionario($fun_id) {
        $this->__construct();
        $stmt = $this->_ora->prepare("select list_funcionario(:in_fun_id)");
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
    
    public function trae_estado_fun($fun_id) {
        $this->__construct();
        $stmt = $this->_ora->prepare("select trae_estado_fun(:in_fun_id)");
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
    
    public function cambiar_estado($fun_id,$active,$con_id){
        $stmt = $this->_ora->prepare("SELECT * FROM actualiza_estado(:IN_FUN_ID,:IN_ESTADO,:IN_CON_ID)");
        $stmt->bindParam(':IN_FUN_ID', $fun_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_ESTADO', $active, PDO::PARAM_INT);
        $stmt->bindParam(':IN_CON_ID', $con_id, PDO::PARAM_INT);
        $stmt->execute();        
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
        
    }
    
    public function selecciona_contrato($con_id,$fun_id){
        $stmt = $this->_ora->prepare("SELECT * FROM selecciona_contrato(:IN_CON_ID,:IN_FUN_ID)");
        $stmt->bindParam(':IN_CON_ID', $con_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_FUN_ID', $fun_id, PDO::PARAM_INT);
        $stmt->execute();        
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
        
    }
        
    
    public function add_funcionario($in_id,$in_rut,$in_nombre,$in_apep,$in_apem,$in_f_nac,$in_celular,$in_com_id,$in_correo,$in_domicilio,$in_facebook,$in_profesion,$in_skype, $in_esc_id, $in_ocu_id, $in_sex_id, $in_ocupacion){
        
        $arr_rut = explode('-',$in_rut);
        $rut = $arr_rut[0];
        $dv  = $arr_rut[1];
        
        
        $stmt = $this->_ora->prepare("SELECT * FROM add_fun(:IN_FUN_ID,:IN_FUN_RUT,:IN_FUN_DV,:IN_FUN_NOMBRE,:IN_FUN_APEP,:IN_FUN_APEM,:IN_F_NAC,:IN_FUN_CELULAR,:IN_FUN_COM_ID,:IN_FUN_CORREO,:IN_FUN_DOMICILIO,:IN_FUN_FACEBOOK,:IN_FUN_PROFESION,:IN_FUN_SKYPE,:IN_ESC_ID,:IN_OCU_ID,:IN_SEX_ID,:IN_OCUPACION)");
        $stmt->bindParam(':IN_FUN_ID', $in_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_FUN_RUT', $rut, PDO::PARAM_INT);
        $stmt->bindParam(':IN_FUN_DV', $dv, PDO::PARAM_INT);
        $stmt->bindParam(':IN_FUN_NOMBRE', $in_nombre, PDO::PARAM_STR);
        $stmt->bindParam(':IN_FUN_APEP', $in_apep, PDO::PARAM_STR);
        $stmt->bindParam(':IN_FUN_APEM', $in_apem, PDO::PARAM_STR);
        $stmt->bindParam(':IN_F_NAC', $in_f_nac, PDO::PARAM_STR);
        $stmt->bindParam(':IN_FUN_CELULAR', $in_celular, PDO::PARAM_STR);
        $stmt->bindParam(':IN_FUN_COM_ID', $in_com_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_FUN_CORREO', $in_correo, PDO::PARAM_STR);
        $stmt->bindParam(':IN_FUN_DOMICILIO', $in_domicilio, PDO::PARAM_STR);
        $stmt->bindParam(':IN_FUN_FACEBOOK', $in_facebook, PDO::PARAM_STR);
        $stmt->bindParam(':IN_FUN_PROFESION', $in_profesion, PDO::PARAM_STR);
        $stmt->bindParam(':IN_FUN_SKYPE', $in_skype, PDO::PARAM_STR);
        $stmt->bindParam(':IN_ESC_ID', $in_esc_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_OCU_ID', $in_ocu_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_SEX_ID', $in_sex_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_OCUPACION', $in_ocupacion, PDO::PARAM_STR);
        $stmt->execute();
        
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
        
    }
    
    
}

?>