<?php
require_once "Conexion.php";
class Contrato{
    private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    public function ListarContrato($id){
        $stmt = $this->_ora->prepare("select listar_contrato(:in_con_id)");
        $stmt->bindParam('in_con_id', $id, PDO::PARAM_INT);
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
    
    public function ListarContratoFuncionario($tipo,$valor){
        $stmt = $this->_ora->prepare("select listar_relacion_con_fun_esb(:in_tipo,:in_valor)");
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
    
    public function AgregarContrato($fun_id,$con_id,$esb_id, $contrata){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_relacion_contrato(:IN_FUN_ID,:IN_CON_ID,:IN_ESB_ID,:IN_CONTRATA_ID)");
        $stmt->bindParam(':IN_FUN_ID', $fun_id,PDO::PARAM_INT);
        $stmt->bindParam(':IN_CON_ID', $con_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_ESB_ID', $esb_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_CONTRATA_ID', $contrata, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
    public function EliminaContrato($con_id){
        $stmt = $this->_ora->prepare("SELECT * FROM eliminacion_relacion_contrato_funcionario(:IN_RELACION_ID)");
        $stmt->bindParam(':IN_RELACION_ID', $con_id,PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
    public function TotalHoras($fun_id){
        $stmt = $this->_ora->prepare("select total_horas(:in_fun_id)");
        $stmt->bindParam('in_fun_id', $fun_id, PDO::PARAM_INT);
        $stmt->execute();
        $cursors = $stmt->fetchAll();
        $stmt->closeCursor();
        $results = array();
        foreach ($cursors as $k => $v) {
            $stmt = $this->_ora->query('FETCH ALL IN "' . $v[0] . '";');
            $results = $stmt->fetch();
            $stmt->closeCursor();
        }
        $this->_ora->commit();
        unset($stmt);
        return $results;
    }
}
?>
