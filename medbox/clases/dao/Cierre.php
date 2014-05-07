<?php
require_once "Conexion.php";
class Cierre{
    private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    public function ListarCierre($tipo,$valor){
        $stmt = $this->_ora->prepare("select listar_cierre(:in_tipo,:in_valor)");
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
    
    public function AgregarCierre($cie_id,$fic_id,$resumen,$usu_id,$ip){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_cierre(:IN_CIE_ID,:IN_CIE_FIC,:IN_CIE_RESUMEN,:IN_CIE_USU,:IN_CIE_IP)");
        $stmt->bindParam(':IN_CIE_ID', $cie_id,PDO::PARAM_INT);
        $stmt->bindParam(':IN_CIE_FIC', $fic_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_CIE_RESUMEN', $resumen, PDO::PARAM_STR);
        $stmt->bindParam(':IN_CIE_USU', $usu_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_CIE_IP', $ip, PDO::PARAM_STR);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
}
?>

 