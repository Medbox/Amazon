<?php
require_once "Class.Conexion.php";

class Section{

	private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
        
    }
		
		
	public function __destruct(){
		
		}
		
	
	//--------------------------------------------
	//			   LIST ALL SECTIONS
	//--------------------------------------------
	
	/*public function list_all(){
		
		if($this->_ora){
			$query	=	$this->_ora->query("CALL LIST_SECTIONS()");			
			while($row = $query->fetch(PDO::FETCH_ASSOC)){
				$array[$row['SEC_COD']]	=	$row;
				}			
			return $array;			
			}		
		}	
	}*/
    
    public function list_all(){
        $stmt = $this->_ora->prepare("select list_sections()");
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

