<?php

require_once 'Class.Config.php';

Class Conexion {

    private $servidor;
    private $usuario;
    private $password;
    private $base_datos;
    private $tipo;
    private $link;
    private $stmt;
    private $array;
    private static $_instance;

    /* La funci�n construct es privada para evitar que el objeto pueda ser creado mediante new */

    function __construct() {
//        $this->setConexion();
//        $this->conectar();
    }

    public function __destruct() {
        $this->servidor = '';
        $this->base_datos = '';
        $this->usuario = '';
        $this->password = '';
        $this->tipo = '';
    }

    /* M�todo para establecer los par�metros de la conexi�n */

    public function setConexion() {
        $conf = new Config();
        $conf->set_Config();
        $this->servidor = $conf->getHostDB();
        $this->base_datos = $conf->getDB();
        $this->usuario = $conf->getUserDB();
        $this->password = $conf->getPassDB();
        $this->tipo = $conf->getDBType();
    }

    public function destruir() {
        $this->servidor = '';
        $this->base_datos = '';
        $this->usuario = '';
        $this->password = '';
        $this->tipo = '';
    }

    /* Evitamos el clonaje del objeto. Patr�n Singleton */

    private function __clone() {
        
    }

    private function __wakeup() {
        
    }

    public function prepare() {
        $this->setConexion();
        $conn = new PDO("pgsql:host=" . $this->servidor . ";port=5432;dbname=" . $this->base_datos . "", "" . $this->usuario . "", "" . $this->password . "");
        $conn->beginTransaction();
        return $conn;
    }

    /* Funci�n encargada de crear, si es necesario, el objeto. Esta es la funci�n que debemos llamar desde fuera de la clase para instanciar el objeto, y as�, poder utilizar sus m�todos */

    public static function getInstance() {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /* Realiza la conexi�n a la base de datos. */

    public function conectar() {
        $this->setConexion();
        $url = "host='$this->servidor' dbname='$this->base_datos' user='$this->usuario' password='$this->password'";
        $this->link = pg_connect($url);
        if (!$this->link)
            echo 'Se produjo un error al intentar conectar con la base de datos';
        else {
            return true;
        }
    }

    /* M�todo para ejecutar una sentencia sql */

    public function ejecutar($sql) {
        $this->conectar();
        $this->stmt = pg_exec($this->link, $sql);
        return $this->stmt;
    }

    /* M�todo para obtener una fila de resultados de la sentencia sql */

    public function obtener_fila($stmt, $fila) {
        if ($fila == 0) {
            $this->array = pg_fetch_row($stmt);
        } else {
            $this->array = pg_fetch_row($stmt, $fila);
        }
        return $this->array;
    }

}

?>