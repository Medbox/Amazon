<?php
require_once "Conexion.php";
class Comentario{
    private $_ora;
    private $_conexion;
    
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    public function ListarCaomentario($indicador,$busqueda){
        $stmt = $this->_ora->prepare("select listar_comentarios(:indicador ,:busqueda)");
        $stmt->bindParam(':indicador', $indicador, PDO::PARAM_INT);
        $stmt->bindParam(':busqueda', $busqueda, PDO::PARAM_INT);
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
    
    public function AgregarComentario($comentario,$ip,$post_id){
        $stmt = $this->_ora->prepare("SELECT * FROM agregar_comentario(:in_comentario ,:in_ip ,:in_post_id )");
        $stmt->bindParam(':in_comentario', $comentario,PDO::PARAM_STR);
        $stmt->bindParam(':in_ip', $ip, PDO::PARAM_STR);
        $stmt->bindParam(':in_post_id', $post_id, PDO::PARAM_INT);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
    
}
?>
