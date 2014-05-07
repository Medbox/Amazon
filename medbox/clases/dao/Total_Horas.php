<?php
require_once "Conexion.php";
class Total_Horas{
    private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    
    public function AgregarTotalHoras($fun_id,$d_habiles,$carga=null,$h_contratadas,$j_guardia,$administrativos,$curso,$f_anteriores,$f_legal, $descanso, $dias_fuera){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_total_horas(:IN_FUN_ID,:IN_D_HABILIES,:IN_CARGA,:IN_H_CONTRATADAS,:IN_JUBILADO,:IN_ADMINISTRATIVO,:IN_CURSO,:IN_F_ANTERIOR,:IN_F_LEGAL,:IN_DESCANSO,:IN_D_FUERA)");
        $stmt->bindParam(':IN_FUN_ID', $fun_id,PDO::PARAM_INT);
        $stmt->bindParam(':IN_D_HABILIES', $d_habiles, PDO::PARAM_INT);
        $stmt->bindParam(':IN_CARGA', $carga, PDO::PARAM_INT);
        $stmt->bindParam(':IN_H_CONTRATADAS', $h_contratadas, PDO::PARAM_INT);
        $stmt->bindParam(':IN_JUBILADO', $j_guardia, PDO::PARAM_INT);
        $stmt->bindParam(':IN_ADMINISTRATIVO', $administrativos, PDO::PARAM_INT);
        $stmt->bindParam(':IN_CURSO', $curso, PDO::PARAM_INT);
        $stmt->bindParam(':IN_F_ANTERIOR', $f_anteriores, PDO::PARAM_INT);
        $stmt->bindParam(':IN_F_LEGAL', $f_legal, PDO::PARAM_INT);
        $stmt->bindParam(':IN_DESCANSO', $descanso, PDO::PARAM_INT);
        $stmt->bindParam(':IN_D_FUERA', $dias_fuera, PDO::PARAM_INT);
        
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
    public function ListarTotalHoras($id){
        $stmt = $this->_ora->prepare("select listar_total_horas(:in_tho_id)");
        $stmt->bindParam('in_tho_id', $id, PDO::PARAM_INT);
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
    
    public function ListarTotalHorasProgramables($fun_id){
        $stmt = $this->_ora->prepare("select total_horas_programadas(:in_fun_id)");
        $stmt->bindParam('in_fun_id', $fun_id, PDO::PARAM_INT);
        $stmt->execute();
        $cursors = $stmt->fetchAll();
        $stmt->closeCursor();
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

