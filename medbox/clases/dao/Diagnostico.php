<?php
require_once "Conexion.php";
class Diagnostico{
    private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    public function ListarDiagnostico($tipo,$valor){
        $stmt = $this->_ora->prepare("select listar_diagnostico(:in_tipo,:in_valor)");
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
    
    public function AgregarDiagnosticoAtencion($dia_id, $dia_decripcion, $dia_atn){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_diagnostico_atencion(:IN_DIA_ID,:IN_DIA_DESCRIPCION,:IN_DIA_ATN)");
        $stmt->bindParam(':IN_DIA_ID', $dia_id,PDO::PARAM_INT);
        $stmt->bindParam(':IN_DIA_DESCRIPCION', $dia_decripcion, PDO::PARAM_STR);
        $stmt->bindParam(':IN_DIA_ATN', $dia_atn, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
    public function AgregarDiagnosticoFicha($dia_id, $dia_decripcion, $dia_fic){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_diagnostico_ficha(:IN_DIA_ID,:IN_DIA_DESCRIPCION,:IN_DIA_FIC)");
        $stmt->bindParam(':IN_DIA_ID', $dia_id,PDO::PARAM_INT);
        $stmt->bindParam(':IN_DIA_DESCRIPCION', $dia_decripcion, PDO::PARAM_STR);
        $stmt->bindParam(':IN_DIA_FIC', $dia_fic, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
    public function AgregarDiagnosticoCierre($dia_id, $dia_decripcion, $dia_cie){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_diagnostico_cierre(:IN_DIA_ID,:IN_DIA_DESCRIPCION,:IN_DIA_CIE)");
        $stmt->bindParam(':IN_DIA_ID', $dia_id,PDO::PARAM_INT);
        $stmt->bindParam(':IN_DIA_DESCRIPCION', $dia_decripcion, PDO::PARAM_STR);
        $stmt->bindParam(':IN_DIA_CIE', $dia_cie, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
    public function EliminarDiagnostico($dia_id,$origen){
        $stmt = $this->_ora->prepare("SELECT * FROM eliminar_diagnostico(:IN_ID,:IN_ORIGEN)");
        $stmt->bindParam(':IN_ID', $dia_id,PDO::PARAM_INT);
        $stmt->bindParam(':IN_ORIGEN', $origen,PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
}
?>

 