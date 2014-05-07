<?php
require_once "Conexion.php";
class Nota{
    private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    public function ListarNota($tipo,$valor){
        $stmt = $this->_ora->prepare("select listar_nota(:in_tipo,:in_valor)");
        $stmt->bindParam('in_tipo', $tipo, PDO::PARAM_INT);
        $stmt->bindParam('in_valor', $valor, PDO::PARAM_INT);
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
    
    public function AgregarNota($not_id, $not_decripcion, $not_atn){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_nota(:IN_NOT_ID,:IN_NOT_DESCRIPCION,:IN_NOT_ATN)");
        $stmt->bindParam(':IN_NOT_ID', $not_id,PDO::PARAM_INT);
        $stmt->bindParam(':IN_NOT_DESCRIPCION', $not_decripcion, PDO::PARAM_STR);
        $stmt->bindParam(':IN_NOT_ATN', $not_atn, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
    
}
?>

 