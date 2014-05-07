<?php
include_once ("../clases/dao/Usuarios.php");
class beans_usuarios{
    private $obj_usu;
    private $_rut;
    private $_nombres;
    private $_apellidoP;
    private $_apellidoM;
    private $_correo;
    private $_fecha_crea;
    private $_telefono;
    private $_estado;
    private $_tipoUsuarioId;
    private $_direccion;
    private $_clave;
    
    public function __construct() {
        $this->obj_usu = new Usuarios();
    }
    public function listar_usuarios($id = null){
        $res = $this->obj_usu->ListarUsuarios($id);
        return $res;
    }
    
    public function listar_usuarios_buscar($rut, $apellidoP, $apellidoM){
        $res = $this->obj_usu->ListarUsuariosBuscar($rut,$apellidoP,$apellidoM);
        return $res;
    }
    
    public function login($rut,$clave){
        $res = $this->obj_usu->Login($rut,$clave);
        return $res;
    }
    
    public function AgregarUsuarios($rut, $nombres, $apellido_paterno, $apellido_materno, $estado, $tipo_usuario, $direccion, $clave){
        $res = $this->obj_usu->AgregarUsuarios($rut, $nombres, $apellido_paterno, $apellido_materno, $estado, $tipo_usuario, $direccion, $clave);
        return $res;
    }
    
    public function setUsuario($id){
        $res = $this->obj_usu->ListarUsuarios($id);
        if(is_array($res)){
            $this->_rut         =   $res[0]['USU_RUT'];
            $this->_nombres     =   $res[0]['USU_NOMBRE'];
            $this->_apellidoP   =   $res[0]['USU_APELLIDO_PAT'];
            $this->_apellidoM   =   $res[0]['USU_APELLIDO_MAT'];
            $this->_correo      =   $res[0]['USU_CORREO'];
            $this->_clave       =   $res[0]['USU_CLAVE'];
            $this->_fecha_crea  =   $res[0]['USU_FECHA_CREA'];
            $this->_estado      =   $res[0]['USU_ESTADO'];
            $this->_telefono    =   $res[0]['USU_TELEFONO'];
            $this->_direccion   =   $res[0]['USU_DIRECCION'];            
        }else{
            $this->_rut         =   '';
            $this->_nombres     =   '';
            $this->_apellidoP   =   '';
            $this->_apellidoM   =   '';
            $this->_correo      =   '';
            $this->_clave       =   '';
            $this->_fecha_crea  =   '';
            $this->_estado      =   '';
            $this->_telefono    =   '';
            $this->_direccion   =   '';
        }
    }
    
    public function getObj_usu() {
        return $this->obj_usu;
    }

    public function setObj_usu($obj_usu) {
        $this->obj_usu = $obj_usu;
    }

    public function get_rut() {
        return $this->_rut;
    }

    public function set_rut($_rut) {
        $this->_rut = $_rut;
    }

    public function get_nombres() {
        return $this->_nombres;
    }

    public function set_nombres($_nombres) {
        $this->_nombres = $_nombres;
    }

    public function get_apellidoP() {
        return $this->_apellidoP;
    }

    public function set_apellidoP($_apellidoP) {
        $this->_apellidoP = $_apellidoP;
    }

    public function get_apellidoM() {
        return $this->_apellidoM;
    }

    public function set_apellidoM($_apellidoM) {
        $this->_apellidoM = $_apellidoM;
    }

    public function get_correo() {
        return $this->_correo;
    }

    public function set_correo($_correo) {
        $this->_correo = $_correo;
    }

    public function get_fecha_crea() {
        return $this->_fecha_crea;
    }

    public function set_fecha_crea($_fecha_crea) {
        $this->_fecha_crea = $_fecha_crea;
    }

    public function get_telefono() {
        return $this->_telefono;
    }

    public function set_telefono($_telefono) {
        $this->_telefono = $_telefono;
    }

    public function get_estado() {
        return $this->_estado;
    }

    public function set_estado($_estado) {
        $this->_estado = $_estado;
    }

    public function get_tipoUsuarioId() {
        return $this->_tipoUsuarioId;
    }

    public function set_tipoUsuarioId($_tipoUsuarioId) {
        $this->_tipoUsuarioId = $_tipoUsuarioId;
    }

    public function get_direccion() {
        return $this->_direccion;
    }

    public function set_direccion($_direccion) {
        $this->_direccion = $_direccion;
    }

    public function get_clave() {
        return $this->_clave;
    }

    public function set_clave($_clave) {
        $this->_clave = $_clave;
    }


}


?>