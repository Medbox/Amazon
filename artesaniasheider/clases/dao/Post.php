<?php
require_once "Conexion.php";
class Post{
    private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    public function ListarPost($indicador,$valor){
        $stmt = $this->_ora->prepare("select listar_post(:indicador,:busqueda)");
        $stmt->bindParam(':indicador', $indicador, PDO::PARAM_INT);
        $stmt->bindParam(':busqueda', $valor, PDO::PARAM_INT);
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
    
    public function AgregarPost($usu_id,$titulo,$descripcion,$categoria){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_post(:IN_USU_CREA ,:IN_TITULO ,:IN_DESCRIPCION,:IN_CATEGORIA)");
        $stmt->bindParam(':IN_USU_CREA', $usu_id,PDO::PARAM_INT);
        $stmt->bindParam(':IN_TITULO', $titulo, PDO::PARAM_STR);
        $stmt->bindParam(':IN_DESCRIPCION', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':IN_CATEGORIA', $categoria, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
    
}
?>
