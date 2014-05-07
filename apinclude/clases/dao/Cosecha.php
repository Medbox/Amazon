<?php
require_once "Conexion.php";
class Cosecha{
    private $_ora;
    private $_conexion;
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    public function AgregarCosecha($fecha, $kilos, $n_certificado, $apiario, $floracion, $estado,$denominacion_floracion,$usu_id,$ip){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_cosecha(:IN_FECHA,:IN_KILOS,:IN_CERTIFICADO,:IN_API_ID, :IN_FLO_ID,:IN_ESTADO,:IN_DENOMINACION_FLORACION,:IN_USU_CREA,:IN_IP_CREA)");
        $stmt->bindParam(':IN_FECHA', $fecha,PDO::PARAM_STR);
        $stmt->bindParam(':IN_KILOS', $kilos, PDO::PARAM_INT);
        $stmt->bindParam(':IN_CERTIFICADO', $n_certificado, PDO::PARAM_INT);
        $stmt->bindParam(':IN_API_ID', $apiario, PDO::PARAM_INT);
        $stmt->bindParam(':IN_FLO_ID', $floracion, PDO::PARAM_INT);
        $stmt->bindParam(':IN_ESTADO', $estado, PDO::PARAM_INT);
        $stmt->bindParam(':IN_DENOMINACION_FLORACION', $denominacion_floracion, PDO::PARAM_STR);
        $stmt->bindParam(':IN_USU_CREA', $usu_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_IP_CREA', $ip, PDO::PARAM_STR);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
    public function ListarCosecha($id){
        $stmt = $this->_ora->prepare("select trae_cosechas(:IN_COS_ID)");
        $stmt->bindParam('IN_COS_ID', $id, PDO::PARAM_INT);
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
    
    public function ListarApiarioKilos(){
        $stmt = $this->_ora->prepare("select trae_apiario_kilos()");
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
    
    public function ListarKilosAnos(){
        $stmt = $this->_ora->prepare("select trae_kilos_anos()");
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
