<?php
include_once ("/var/www/medbox/clases/dao/Usuario.php");
class beans_usuario{
    private $obj_usu;
    private $usu_id;
    private $usuario;
    private $clave;
    private $fun_id;
    private $rut;
    private $dv;
    private $nombre;
    private $apellido_p;
    private $apellido_m;
    private $con_id;
    private $contrato;
    private $rol;
    private $rol_id;
    
    
    
    public function __construct() {
        $this->obj_usu = new Usuario();
    }
       
    public function listarUsuario($usuario,$clave){
        $arr = $this->obj_usu->Login($usuario,$clave);
        return $arr;
    }
    
    public function listarUsuarioId($usu_id){
        $arr = $this->obj_usu->list_usuario_id($usu_id);
        return $arr;
    }
    
    public function setUsuario($usu_id){
        $arr = $this->listarUsuarioId($usu_id);
        
        foreach ($arr as $var => $val) {
            $this->usu_id       = $val["USU_ID"];
            $this->usuario      = $val["USU_USUARIO"];
            $this->clave        = $val["USU_CLAVE"];
            $this->fun_id       = $val["USU_FUN_ID"];
            $this->rut          = $val["FUN_RUT"];
            $this->dv           = $val["FUN_DV"];
            $this->nombre       = $val["FUN_NOMBRES"];
            $this->apellido_p   = $val["FUN_APE_PATERNO"];
            $this->apellido_m   = $val["FUN_APE_MATERNO"];
            $this->con_id       = $val["FUN_CON_ID"];
            $this->contrato     = $val["CON_DENOMINACION"];
            $this->rol          = $val["ROL_DENOMINACION"];
            $this->rol_id       = $val["ROL_ID"];
        }
    }
    
    public function getUsu_id() {
        return $this->usu_id;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getClave() {
        return $this->clave;
    }

    public function getFun_id() {
        return $this->fun_id;
    }

    public function getRut() {
        return $this->rut;
    }

    public function getDv() {
        return $this->dv;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido_p() {
        return $this->apellido_p;
    }

    public function getApellido_m() {
        return $this->apellido_m;
    }

    public function getCon_id() {
        return $this->con_id;
    }

    public function getContrato() {
        return $this->contrato;
    }

    public function getRol() {
        return $this->rol;
    }
    public function getRol_id() {
        return $this->rol_id;
    }



}
?>