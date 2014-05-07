<?php
require_once "Conexion.php";
class Bloque{
    private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    
    public function AgregarBloque($dia_semana,$h_inicio,$h_fin,$rpl_id,$rts_id,$fun_id,$equ_id,$prg_id,$pro_id,$rendimiento,$rsr_id,$pre_id,$tpr_id){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_bloque(:IN_DIA_SEMANA,:IN_H_INICIO,:IN_H_FIN,:IN_RPL_ID,:IN_RTS_ID,:IN_FUN_ID,:IN_EQU_ID,:IN_PRG_ID,:IN_PRO_ID,:IN_RENDIMIENTO,:IN_RSR_ID,:IN_PRE_ID,:IN_TPR_ID)");
        $stmt->bindParam(':IN_DIA_SEMANA', $dia_semana,PDO::PARAM_INT);
        $stmt->bindParam(':IN_H_INICIO', $h_inicio, PDO::PARAM_STR);
        $stmt->bindParam(':IN_H_FIN', $h_fin, PDO::PARAM_STR);
        $stmt->bindParam(':IN_RPL_ID', $rpl_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_RTS_ID', $rts_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_FUN_ID', $fun_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_EQU_ID', $equ_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_PRG_ID', $prg_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_PRO_ID', $pro_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_RENDIMIENTO', $rendimiento, PDO::PARAM_INT);
        $stmt->bindParam(':IN_RSR_ID', $rsr_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_PRE_ID', $pre_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_TPR_ID', $tpr_id, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
    public function ListarBloque($id){
        $stmt = $this->_ora->prepare("select listar_bloque(:in_blo_id)");
        $stmt->bindParam('in_blo_id', $id, PDO::PARAM_INT);
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
    
    public function ListarHorasProgramadasPreId($id,$fun_id){
        $stmt = $this->_ora->prepare("select listar_horas_programadas_pre_id(:in_valor,:in_fun_id)");
        $stmt->bindParam('in_valor', $id, PDO::PARAM_INT);
        $stmt->bindParam('in_fun_id', $fun_id, PDO::PARAM_INT);
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
