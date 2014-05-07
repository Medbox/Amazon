<?php
require_once "Class.Conexion.php";
class Ficha{

	private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
        
    }
		
		
	public function __destruct(){
		
		}
		
	
    /***
     * $ficha_id            
     * $fun_id            --> obligatorio
     * $conductor         --> obligatorio   
     * $bloque            --> obligatorio
     * $numero_programa   --> obligatorio
     * $editorial         --> obligatorio
     * $programa          --> obligatorio
     * $nombre_programa            --> obligatorio
     * $juego             --> obligatorio
     * $padre_id
     * $tfi_id            --> obligatorio este debe de ser 1 para la mensual
     * $fun_retro
     * $fecha_retro
     * $estado
     */	
    private function add_ficha($ficha_id,$fun_id,$conductor,$bloque,$numero_programa,$editorial,$programa,$nombre_programa,$juego,$padre_id,$tfi_id,$fun_retro,$fecha_retro,$estado,$mes){
        $stmt = $this->_ora->prepare("SELECT * FROM add_ficha(:IN_FIC_ID,:IN_FUN_CREA,:IN_CONDUCTOR,:IN_BLOQUE,:IN_NUMERO_PROGRAMA,:IN_EDITORIAL,:IN_PROGRAMA,:IN_NOMBRE_PROGRAMA,:IN_JUEGO,:IN_PADRE_ID,:IN_TFI_ID,:IN_FUN_RETRO,:IN_F_RETRO,:IN_ESTADO,:IN_MES)");
        $stmt->bindParam(':IN_FIC_ID', $ficha_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_FUN_CREA', $fun_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_CONDUCTOR', $conductor, PDO::PARAM_STR);
        $stmt->bindParam(':IN_BLOQUE', $bloque, PDO::PARAM_STR);
        $stmt->bindParam(':IN_NUMERO_PROGRAMA', $numero_programa, PDO::PARAM_INT);
        $stmt->bindParam(':IN_EDITORIAL', $editorial, PDO::PARAM_STR);
        $stmt->bindParam(':IN_PROGRAMA', $programa, PDO::PARAM_STR);
        $stmt->bindParam(':IN_NOMBRE_PROGRAMA', $nombre_programa, PDO::PARAM_STR);
        $stmt->bindParam(':IN_JUEGO', $juego, PDO::PARAM_STR);
        $stmt->bindParam(':IN_PADRE_ID', $padre_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_TFI_ID', $tfi_id, PDO::PARAM_INT);
        $stmt->bindParam(':IN_FUN_RETRO', $fun_retro, PDO::PARAM_INT);
        $stmt->bindParam(':IN_F_RETRO', $fecha_retro, PDO::PARAM_STR);
        $stmt->bindParam(':IN_ESTADO', $estado, PDO::PARAM_INT);
        $stmt->bindParam(':IN_MES', $mes, PDO::PARAM_STR);
        $stmt->execute();
        
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
    public function list_ficha($consulta,$busqueda){
        $stmt = $this->_ora->prepare("select list_ficha(:in_consulta,:in_busqueda)");
        $stmt->bindParam(':in_consulta', $consulta, PDO::PARAM_INT);
        $stmt->bindParam(':in_busqueda', $busqueda, PDO::PARAM_INT);
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
    
    public function agregarFicha($fun_id,$conductor,$bloque,$numero_programa,$editorial,$programa,$nombre_programa,$juego,$mes){
        $arr = $this->add_ficha(NULL,$fun_id,$conductor,$bloque,$numero_programa,$editorial,$programa,$nombre_programa,$juego,NULL,1,NULL,NULL,NULL,$mes);
        return $arr;
    }
}
?>