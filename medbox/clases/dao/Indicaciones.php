<?php
require_once "Conexion.php";
class Indicaciones{
    private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    public function ListarIndicaciones($tipo,$valor){
        $stmt = $this->_ora->prepare("select listar_indicaciones(:in_tipo,:in_valor)");
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
    
    public function AgregarIndicaciones($ind_id,$cie_id,$denominacion){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_indicaciones(:IN_IND_ID,:IN_IND_CIE,:IN_IND_DENOMINACION)");
        $stmt->bindParam(':IN_IND_ID', $ind_id,PDO::PARAM_INT);
        $stmt->bindParam(':IN_IND_CIE', $cie_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_IND_DENOMINACION', $denominacion, PDO::PARAM_STR);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
}
?>

 