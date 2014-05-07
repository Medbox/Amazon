<?php
require_once "Conexion.php";
class Categorias{
    private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    public function ListarCategorias(){
        $stmt = $this->_ora->prepare("select trae_categorias()");
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
    
    public function AgregarCategoria($denominacion,$descripcion,$orden){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_categorizacion(:in_denominacion,:in_descripcion,:in_orden)");
        $stmt->bindParam(':in_denominacion', $denominacion,PDO::PARAM_STR);
        $stmt->bindParam(':in_descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':in_orden', $orden, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
}
?>
