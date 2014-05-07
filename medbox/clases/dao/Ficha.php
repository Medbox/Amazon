<?php
require_once "Conexion.php";
class Ficha{
    private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    public function ListarFicha($tipo,$valor){
        $stmt = $this->_ora->prepare("select listar_ficha(:in_tipo,:in_valor)");
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
    
    public function AgregarFicha($fic_id,$fic_antecedentes,$fic_motivo,$cct_id,$cct_nro,$fecha_out,$pac_id,$tfi_id){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_ficha(:IN_FIC_ID,:IN_FIC_ANTECEDENTES,:IN_FIC_MOTIVO,:IN_FIC_CCT_ID,:IN_FIC_CCT_NRO,:IN_FIC_FECHA_OUT,:IN_FIC_PAC,:IN_FIC_TFI)");
        $stmt->bindParam(':IN_FIC_ID', $fic_id,PDO::PARAM_INT);
        $stmt->bindParam(':IN_FIC_ANTECEDENTES', $fic_antecedentes, PDO::PARAM_STR);
        $stmt->bindParam(':IN_FIC_MOTIVO', $fic_motivo, PDO::PARAM_STR);
        $stmt->bindParam(':IN_FIC_CCT_ID', $cct_id,PDO::PARAM_INT);
        $stmt->bindParam(':IN_FIC_CCT_NRO', $cct_nro, PDO::PARAM_INT);
        $stmt->bindParam(':IN_FIC_FECHA_OUT', $fecha_out, PDO::PARAM_STR);
        $stmt->bindParam(':IN_FIC_PAC', $pac_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_FIC_TFI', $tfi_id, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
}
?>

 