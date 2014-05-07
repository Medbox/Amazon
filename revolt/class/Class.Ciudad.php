<?php

require_once "Class.Conexion.php";

class Ciudad {

    private $_ora;
    private $_conexion;

    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }

    public function __destruct() {
        
    }

    public function list_all() {
        $stmt = $this->_ora->prepare("select list_ciudad()");
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

