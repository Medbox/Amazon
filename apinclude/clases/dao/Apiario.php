<?php
require_once "Conexion.php";
class Apiario{
    private $_ora;
    private $_conexion;
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    public function AgregarApiario($nombre, $direccion, $latitud, $longitud, $estado){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_apiario(:IN_NOMBRE,:IN_DIRECCION,:IN_LATITUD,:IN_LONGITUD,:IN_ESTADO)");
        $stmt->bindParam(':IN_NOMBRE', $nombre,PDO::PARAM_STR);
        $stmt->bindParam(':IN_DIRECCION', $direccion, PDO::PARAM_STR);
        $stmt->bindParam(':IN_LATITUD', $latitud, PDO::PARAM_STR);
        $stmt->bindParam(':IN_LONGITUD', $longitud, PDO::PARAM_STR);
        $stmt->bindParam(':IN_ESTADO', $estado, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
    public function ListarApiarios($id){
        $stmt = $this->_ora->prepare("select trae_apiarios(:IN_API_ID)");
        $stmt->bindParam('IN_API_ID', $id, PDO::PARAM_INT);
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
