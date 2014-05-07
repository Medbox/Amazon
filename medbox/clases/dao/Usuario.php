<?php
require_once "Conexion.php";
class Usuario{
    private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
       
    public function Login($usuario,$clave){
        $stmt = $this->_ora->prepare("select login(:in_usu,:in_pass)");
        $stmt->bindParam('in_usu', $usuario, PDO::PARAM_STR);
        $stmt->bindParam('in_pass', $clave, PDO::PARAM_STR);
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
    
    public function list_usuario_id($user_id) {
        $this->__construct();
        $stmt = $this->_ora->prepare("select set_usuario(:in_usu_id)");
        $stmt->bindParam('in_usu_id', $user_id, PDO::PARAM_INT);
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
}
?>
