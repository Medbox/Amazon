<?php

require_once "Class.Conexion.php";

class Cargo {

    private $_ora;
    private $_conexion;

    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }

    public function __destruct() {
        
    }

    public function list_cargo($cargo) {
        $stmt = $this->_ora->prepare("select list_cargo(:in_car_id)");
        $stmt->bindParam('in_car_id', $cargo, PDO::PARAM_INT);
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