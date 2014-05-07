<?php
include_once ("/var/www/medbox/clases/dao/Funcionario.php");
class beans_funcionario{
    private $obj_fun;
    private $fun_id;
    private $fun_rut;
    private $fun_dv;
    private $fun_nombre;
    private $fun_ape_pat;
    private $fun_ape_mat;
    private $fun_car_id;
    private $fun_fecha_nacimiento;
    private $fun_sexo_id;
    private $fun_direccion;
    private $fun_telefono;
    private $fun_celular;
    private $fun_email;
    private $fun_con_id;
    private $fun_activo;
    
    
    public function __construct() {
        $this->obj_fun = new Funcionario();
    }
   
    public function listar_funcionario($id){
        $res = $this->obj_fun->ListarFuncionario($id);
        return $res;
    }
    
    public function setFuncionario($id_funcionario){
        $res = $this->listar_funcionario($id_funcionario);
        if(is_array($res)  && $res != null){
            $this->fun_id                   = $res[0]['FUN_ID'];
            $this->fun_rut                  = $res[0]['FUN_RUT'];
            $this->fun_dv                   = $res[0]['FUN_DV'];
            $this->fun_nombre               = $res[0]['FUN_NOMBRES'];
            $this->fun_ape_pat              = $res[0]['FUN_APE_PATERNO'];
            $this->fun_ape_mat              = $res[0]['FUN_APE_MATERNO'];
            $this->fun_car_id               = $res[0]['FUN_CAR_ID'];
            $this->fun_fecha_nacimiento     = $res[0]['FUN_FECHA_NAC'];
            $this->fun_sexo_id              = $res[0]['FUN_SEX_ID'];
            $this->fun_direccion            = $res[0]['FUN_DIRECCION'];
            $this->fun_telefono             = $res[0]['FUN_TELEFONO'];
            $this->fun_celular              = $res[0]['FUN_CELULAR'];
            $this->fun_email                = $res[0]['FUN_EMAIL'];
            $this->fun_con_id               = $res[0]['FUN_CON_ID'];
            $this->fun_activo               = $res[0]['FUN_ACTIVO'];
        }else{
            $this->fun_id               = "";
            $this->fun_rut              = "";
            $this->fun_dv               = "";
            $this->fun_nombre           = "";
            $this->fun_ape_pat          = "";
            $this->fun_ape_mat          = "";
            $this->fun_car_id           = "";
            $this->fun_fecha_nacimiento = "";
            $this->fun_sexo_id          = "";
            $this->fun_direccion        = "";
            $this->fun_telefono         = "";
            $this->fun_celular          = "";
            $this->fun_email            = "";
            $this->fun_con_id           = "";
            $this->fun_activo           = "";
        }
    }
    
    
    public function getFun_id() {
        return $this->fun_id;
    }

    public function setFun_id($fun_id) {
        $this->fun_id = $fun_id;
    }

    public function getFun_rut() {
        return $this->fun_rut;
    }

    public function setFun_rut($fun_rut) {
        $this->fun_rut = $fun_rut;
    }

    public function getFun_dv() {
        return $this->fun_dv;
    }

    public function setFun_dv($fun_dv) {
        $this->fun_dv = $fun_dv;
    }

    public function getFun_nombre() {
        return $this->fun_nombre;
    }

    public function setFun_nombre($fun_nombre) {
        $this->fun_nombre = $fun_nombre;
    }

    public function getFun_ape_pat() {
        return $this->fun_ape_pat;
    }

    public function setFun_ape_pat($fun_ape_pat) {
        $this->fun_ape_pat = $fun_ape_pat;
    }

    public function getFun_ape_mat() {
        return $this->fun_ape_mat;
    }

    public function setFun_ape_mat($fun_ape_mat) {
        $this->fun_ape_mat = $fun_ape_mat;
    }

    public function getFun_car_id() {
        return $this->fun_car_id;
    }

    public function setFun_car_id($fun_car_id) {
        $this->fun_car_id = $fun_car_id;
    }

    public function getFun_fecha_nacimiento() {
        return $this->fun_fecha_nacimiento;
    }

    public function setFun_fecha_nacimiento($fun_fecha_nacimiento) {
        $this->fun_fecha_nacimiento = $fun_fecha_nacimiento;
    }

    public function getFun_sexo_id() {
        return $this->fun_sexo_id;
    }

    public function setFun_sexo_id($fun_sexo_id) {
        $this->fun_sexo_id = $fun_sexo_id;
    }

    public function getFun_direccion() {
        return $this->fun_direccion;
    }

    public function setFun_direccion($fun_direccion) {
        $this->fun_direccion = $fun_direccion;
    }

    public function getFun_telefono() {
        return $this->fun_telefono;
    }

    public function setFun_telefono($fun_telefono) {
        $this->fun_telefono = $fun_telefono;
    }

    public function getFun_celular() {
        return $this->fun_celular;
    }

    public function setFun_celular($fun_celular) {
        $this->fun_celular = $fun_celular;
    }

    public function getFun_email() {
        return $this->fun_email;
    }

    public function setFun_email($fun_email) {
        $this->fun_email = $fun_email;
    }

    public function getFun_con_id() {
        return $this->fun_con_id;
    }

    public function setFun_con_id($fun_con_id) {
        $this->fun_con_id = $fun_con_id;
    }

    public function getFun_activo() {
        return $this->fun_activo;
    }

    public function setFun_activo($fun_activo) {
        $this->fun_activo = $fun_activo;
    }


}
?>