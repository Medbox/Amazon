<?php
require_once "Conexion.php";
class Usuarios{
    private $_ora;
    private $_conexion;
    public function __construct() {
        $this->_conexion = new Conexion();
        $this->_ora = $this->_conexion->prepare();
    }
    public function ListarUsuarios($id){
        $stmt = $this->_ora->prepare("select trae_usuarios(:IN_USU_ID)");
        $stmt->bindParam('IN_USU_ID', $id, PDO::PARAM_INT);
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
    
    public function ListarUsuariosBuscar($rut,$apellidoP,$apellidoM){
        $stmt = $this->_ora->prepare("select trae_usuarios_busqueda(:IN_RUT,:IN_APELLIDO_P,:IN_APELLIDO_M)");
        $stmt->bindParam('IN_RUT', $rut, PDO::PARAM_STR);
        $stmt->bindParam('IN_APELLIDO_P', $apellidoP, PDO::PARAM_STR);
        $stmt->bindParam('IN_APELLIDO_M', $apellidoM, PDO::PARAM_STR);
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
    
    public function Login($rut,$clave){
        $sql = "SELECT compara_usuario('".$rut."','".$clave."')";
        $arr = $this->_conexion->ejecutar($sql);
        $i=0;
        while ($row = pg_fetch_assoc($arr)){
            $salida[$i]=$row;
            $i++;
        }
        return $salida;
    }
    
    public function AgregarUsuarios($rut, $nombres, $apellido_paterno, $apellido_materno, $estado, $tipo_usuario, $direccion, $clave){
        $stmt = $this->_ora->prepare("SELECT * FROM add_usuario(:IN_RUT,:IN_NOMBRE,:IN_APELLIDO_PAT,:IN_APELLIDO_MAT,:IN_ESTADO,:IN_TIPO_USU,:IN_DIRECCION,:IN_CLAVE)");
        $stmt->bindParam(':IN_RUT', $rut,PDO::PARAM_STR);
        $stmt->bindParam(':IN_NOMBRE', $nombres, PDO::PARAM_STR);
        $stmt->bindParam(':IN_APELLIDO_PAT', $apellido_paterno, PDO::PARAM_STR);
        $stmt->bindParam(':IN_APELLIDO_MAT', $apellido_materno, PDO::PARAM_STR);
        $stmt->bindParam(':IN_ESTADO', $estado, PDO::PARAM_INT);
        $stmt->bindParam(':IN_TIPO_USU', $tipo_usuario, PDO::PARAM_INT);
        $stmt->bindParam(':IN_DIRECCION', $direccion, PDO::PARAM_STR);
        $stmt->bindParam(':IN_CLAVE', $clave, PDO::PARAM_STR);
        $stmt->execute();
        $this->_ora->commit();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return array("out_id"  => $result['out_id'],
                     "out_cod" => $result['out_cod'],
                     "out_msg" => $result['out_msg']);
    }
}
?>
