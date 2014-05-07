<?php
require_once "Conexion.php";
class Reina{
    private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    public function AgregarReina($nombre,$fecha,$obtencion,$orden=null,$colmena=null,$fecundada,$estado,$usu_crea,$ip){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_reina(:IN_NOMBRE,:IN_FECHA,:IN_OBT_ID,:IN_CERTIFICADO,:IN_FAM_ID,:IN_FECUNDADA,:IN_ESTADO,:IN_USU_CREA,:IN_IP_CREA)");
        $stmt->bindParam(':IN_FECHA', $fecha, PDO::PARAM_STR);
        $stmt->bindParam(':IN_FECUNDADA', $fecundada, PDO::PARAM_INT);
        $stmt->bindParam(':IN_CERTIFICADO', $orden, PDO::PARAM_STR);
        $stmt->bindParam(':IN_ESTADO', $estado, PDO::PARAM_INT);
        $stmt->bindParam(':IN_OBT_ID', $obtencion, PDO::PARAM_INT);
        $stmt->bindParam(':IN_NOMBRE', $nombre,PDO::PARAM_STR);
        $stmt->bindParam(':IN_FAM_ID', $colmena, PDO::PARAM_INT);
        $stmt->bindParam(':IN_USU_CREA', $usu_crea, PDO::PARAM_INT);
        $stmt->bindParam(':IN_IP_CREA', $ip, PDO::PARAM_STR);
        
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
    public function ListarReinas($id){
        $stmt = $this->_ora->prepare("select trae_reinas(:IN_REI_ID)");
        $stmt->bindParam('IN_REI_ID', $id, PDO::PARAM_INT);
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
}
?>
