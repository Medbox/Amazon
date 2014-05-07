<?php
require_once "Conexion.php";
class Examen{
    private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    public function ListarExamen($tipo,$valor){
        $stmt = $this->_ora->prepare("select listar_examen(:in_tipo,:in_valor)");
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
    
    public function AgregarExamenAtenecion($rae_id,$atn_id,$exa_id){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_examen_atencion(:IN_RAE_ID,:IN_RAE_ATN,:IN_RAE_EXA)");
        $stmt->bindParam(':IN_RAE_ID', $rae_id,PDO::PARAM_INT);
        $stmt->bindParam(':IN_RAE_ATN', $atn_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_RAE_EXA', $exa_id, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
}
?>

 