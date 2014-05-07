<?php
require_once "Conexion.php";
class Farmaco{
    private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    public function ListarFarmaco($tipo,$valor){
        $stmt = $this->_ora->prepare("select listar_farmaco(:in_tipo,:in_valor)");
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
    
    public function AgregarReceta($rec_id,$far_id, $atn_id){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_receta(:IN_REC_ID,:IN_REC_FAR,:IN_REC_ATN)");
        $stmt->bindParam(':IN_REC_ID', $rec_id,PDO::PARAM_INT);
        $stmt->bindParam(':IN_REC_FAR', $far_id,PDO::PARAM_INT);
        $stmt->bindParam(':IN_REC_ATN', $atn_id, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
    
}
?>

 