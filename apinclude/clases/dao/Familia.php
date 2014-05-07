<?php
require_once "Conexion.php";
class Familia{
    private $_ora;
    private $_conexion;
    
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
       
    public function AgregarFamilia($nombre,$tipo_fam,$origen_fam,$familia_id = NULL,$apiario_id,$reina_id,$alza,$estado,$usu_crea,$ip){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_familia(:IN_NOMBRE,:IN_TIPO_FAM,:IN_ORIGEN_FAM,:IN_FAMILIA_ID,:IN_APIARIO_ID,:IN_REINA_ID,:IN_ALZA,:IN_ESTADO,:IN_USU_CREA,:IN_IP_CREA)");
        $stmt->bindParam(':IN_NOMBRE', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':IN_TIPO_FAM', $tipo_fam, PDO::PARAM_INT);
        $stmt->bindParam(':IN_ORIGEN_FAM', $origen_fam, PDO::PARAM_INT);
        $stmt->bindParam(':IN_FAMILIA_ID', $familia_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_APIARIO_ID', $apiario_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_REINA_ID', $reina_id,PDO::PARAM_INT);
        $stmt->bindParam(':IN_ALZA', $alza, PDO::PARAM_INT);
        $stmt->bindParam(':IN_ESTADO', $estado, PDO::PARAM_INT);
        $stmt->bindParam(':IN_USU_CREA', $usu_crea, PDO::PARAM_INT);
        $stmt->bindParam(':IN_IP_CREA', $ip, PDO::PARAM_STR);
        
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
    public function ListarTipoFamilia($id){
        $stmt = $this->_ora->prepare("select trae_tipo_familia(:IN_TFM_ID)");
        $stmt->bindParam('IN_TFM_ID', $id, PDO::PARAM_INT);
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
    
    public function ListarOrigenFamilia($id){
        $stmt = $this->_ora->prepare("select trae_origen_familia(:IN_ORF_ID)");
        $stmt->bindParam('IN_ORF_ID', $id, PDO::PARAM_INT);
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
    
    public function ListarFamilia($id){
        $stmt = $this->_ora->prepare("select trae_familias(:IN_FAM_ID)");
        $stmt->bindParam('IN_FAM_ID', $id, PDO::PARAM_INT);
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
   
    public function ListarFamiliaApiario($id){
        $stmt = $this->_ora->prepare("select trae_familias_apiario(:IN_APIARIO_ID)");
        $stmt->bindParam('IN_APIARIO_ID', $id, PDO::PARAM_INT);
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
    
    public function ListarSinApiario(){
        $stmt = $this->_ora->prepare("select trae_familia_sin_apiario()");
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
    
    public function ListarFamiliaBusqueda($nombre,$tipo_fam){
        $stmt = $this->_ora->prepare("select trae_familia_busqueda(:IN_NOMBRE,:IN_TIPO)");
        $stmt->bindParam('IN_NOMBRE', $nombre, PDO::PARAM_STR);
        $stmt->bindParam('IN_TIPO', $tipo_fam, PDO::PARAM_INT);
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
