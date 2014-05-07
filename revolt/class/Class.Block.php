<?php
require_once "Class.Conexion.php";
class Block{

	private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
        
    }
		
		
	public function __destruct(){
		
		}
		
	
	//--------------------------------------------
	//				LIST ALL GAMES
	//--------------------------------------------
    
    public function list_block($fecha_bloque){
        $stmt = $this->_ora->prepare("select list_block(:in_date)");
        $stmt->bindParam(':in_date', $fecha_bloque, PDO::PARAM_STR);
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
    
    
    public function list_block_fun($fecha_bloque,$fun){
        $stmt = $this->_ora->prepare("select list_block_fun(:in_date,:in_fun)");
        $stmt->bindParam(':in_date', $fecha_bloque, PDO::PARAM_STR);
        $stmt->bindParam(':in_fun', $fun, PDO::PARAM_INT);
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
    
   	
		
	//--------------------------------------------
	//				ADD BLOCK
	//--------------------------------------------
    
    
    public function add_block($nb_date,$nb_block,$nb_minutes,$nb_game,$nb_section,$com_id,$editor_id){
        $stmt = $this->_ora->prepare("SELECT * FROM add_block(:IN_BLK_DATE,:IN_BLK_SEG_COD,:IN_BLK_MINUTES,:IN_BLK_GAM_COD,:IN_BLK_SEC_COD,:IN_COM_ID,:IN_EDITOR_ID)");
        $stmt->bindParam(':IN_BLK_DATE', $nb_date, PDO::PARAM_STR);
        $stmt->bindParam(':IN_BLK_SEG_COD', $nb_block, PDO::PARAM_INT);
        $stmt->bindParam(':IN_BLK_MINUTES', $nb_minutes, PDO::PARAM_INT);
        $stmt->bindParam(':IN_BLK_GAM_COD', $nb_game, PDO::PARAM_STR);
        $stmt->bindParam(':IN_BLK_SEC_COD', $nb_section, PDO::PARAM_STR);
        $stmt->bindParam(':IN_COM_ID', $com_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_EDITOR_ID', $editor_id, PDO::PARAM_INT);
        $stmt->execute();
        
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
    
    //--------------------------------------------
	//				DEL BLOCK
	//--------------------------------------------
    
    
    public function del_block($blk_id){
        $stmt = $this->_ora->prepare("SELECT * FROM del_block(:IN_BLK_ID)");
        $stmt->bindParam(':IN_BLK_ID', $blk_id, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
    
    //--------------------------------------------
	//				UPDATE BLOCK
	//--------------------------------------------
    
    
    public function upd_block($blk_id,$cod_gam = NULL, $cod_sec = NULL, $com_id = NULL, $editor = NULL){
        $stmt = $this->_ora->prepare("SELECT * FROM update_block(:IN_BLK_ID,:IN_GAM_COD,:IN_SEC_COD,:IN_COM_ID,:IN_EDITOR_ID)");
        $stmt->bindParam(':IN_BLK_ID', $blk_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_GAM_COD', $cod_gam, PDO::PARAM_STR);
        $stmt->bindParam(':IN_SEC_COD', $cod_sec, PDO::PARAM_STR);
        $stmt->bindParam(':IN_COM_ID', $com_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_EDITOR_ID', $editor, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
	

	
	//--------------------------------------------
	//				GET BLOCK INFO
	//--------------------------------------------
    
    public function get_block($blk_id){
        $stmt = $this->_ora->prepare("select get_block(:in_blk_id)");
        $stmt->bindParam(':in_blk_id', $blk_id, PDO::PARAM_INT);
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
	


    public function action_editado($blk_id,$usu_id){
        $editado = 1;
        $stmt = $this->_ora->prepare("SELECT * FROM action_editado(:IN_BLK_ID,:IN_EDITADO,:IN_USU_ID)");
        $stmt->bindParam(':IN_BLK_ID', $blk_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_EDITADO', $editado, PDO::PARAM_INT);
        $stmt->bindParam(':IN_USU_ID', $usu_id, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
    public function action_recibido($blk_id,$usu_id){
        $recibido = 1;
        $stmt = $this->_ora->prepare("SELECT * FROM action_recibido(:IN_BLK_ID,:IN_RECIBIDO,:IN_USU_ID)");
        $stmt->bindParam(':IN_BLK_ID', $blk_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_RECIBIDO', $recibido, PDO::PARAM_INT);
        $stmt->bindParam(':IN_USU_ID', $usu_id, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
}
?>