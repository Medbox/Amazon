<?php
require_once "Conexion.php";
class Paciente{
    private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    public function ListarPaciente($tipo,$valor){
        $stmt = $this->_ora->prepare("select listar_paciente(:in_tipo,:in_valor)");
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
    
    public function AgregarPaciente($pac_id,$pac_rut,$pac_dv,$pac_nombres,$pac_ape_pat,$pac_ape_mat,$pac_direccion,$pac_fecha_nac,$pac_sex_id,$pac_telefono,$pac_ip,$pac_usu){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_paciente(:IN_PAC_ID,:IN_PAC_RUT,:IN_PAC_DV,:IN_PAC_NOMBRES,:IN_PAC_APE_PAT,:IN_PAC_APE_MAT,:IN_PAC_DIRECCION,:IN_PAC_FECHA_NAC,:IN_PAC_SEX_ID,:IN_PAC_TELEFONO,:IN_PAC_IP,:IN_PAC_USU)");
        $stmt->bindParam(':IN_PAC_ID', $pac_id,PDO::PARAM_INT);
        $stmt->bindParam(':IN_PAC_RUT', $pac_rut, PDO::PARAM_INT);
        $stmt->bindParam(':IN_PAC_DV', $pac_dv, PDO::PARAM_INT);
        $stmt->bindParam(':IN_PAC_NOMBRES', $pac_nombres, PDO::PARAM_STR);
        $stmt->bindParam(':IN_PAC_APE_PAT', $pac_ape_pat, PDO::PARAM_STR);
        $stmt->bindParam(':IN_PAC_APE_MAT', $pac_ape_mat, PDO::PARAM_STR);
        $stmt->bindParam(':IN_PAC_DIRECCION', $pac_direccion, PDO::PARAM_STR);
        $stmt->bindParam(':IN_PAC_FECHA_NAC', $pac_fecha_nac, PDO::PARAM_STR);
        $stmt->bindParam(':IN_PAC_SEX_ID', $pac_sex_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_PAC_TELEFONO', $pac_telefono, PDO::PARAM_STR);
        $stmt->bindParam(':IN_PAC_IP', $pac_ip, PDO::PARAM_STR);
        $stmt->bindParam(':IN_PAC_USU', $pac_usu, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
}
?>

 