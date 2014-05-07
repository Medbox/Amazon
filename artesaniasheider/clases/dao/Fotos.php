<?php
require_once "Conexion.php";
class Fotos{
    private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    
    public function AgregarFotos($post_id,$url,$caratula){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_foto(:in_url ,:in_post_id,:in_caratula)");
        $stmt->bindParam(':in_url', $url,PDO::PARAM_STR);
        $stmt->bindParam(':in_post_id', $post_id, PDO::PARAM_INT);
        $stmt->bindParam(':in_caratula', $caratula, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
    
    public function ListarFoto($post_id){
        $stmt = $this->_ora->prepare("select listar_foto(:in_post_id)");
        $stmt->bindParam(':in_post_id', $post_id, PDO::PARAM_INT);
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
