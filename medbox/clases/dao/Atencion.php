<?php
require_once "Conexion.php";
class Atencion{
    private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    public function ListarAtencion($tipo,$valor){
        $stmt = $this->_ora->prepare("select listar_atencion(:in_tipo,:in_valor)");
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
    
    public function AgregarAtencion($atn_id,$atn_evolucion,$atn_fic,$atn_usu){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_atencion(:IN_ATN_ID,:IN_ATN_EVOLUCION,:IN_ATN_FIC,:IN_ATN_USU)");
        $stmt->bindParam(':IN_ATN_ID', $atn_id,PDO::PARAM_INT);
        $stmt->bindParam(':IN_ATN_EVOLUCION', $atn_evolucion, PDO::PARAM_STR);
        $stmt->bindParam(':IN_ATN_FIC', $atn_fic, PDO::PARAM_INT);
        $stmt->bindParam(':IN_ATN_USU', $atn_usu, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
}
?>

 