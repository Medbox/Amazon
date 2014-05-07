<?php
include_once ("/var/www/medbox/clases/dao/Paciente.php");
class beans_paciente{
    private $obj_pac;
    private $pac_id;
    private $pac_rut;
    private $pac_nombres;
    private $pac_ape_mat;
    private $pac_ape_pat;
    private $pac_direccion;
    private $pac_fecha_nac;
    private $pac_sex_id;
    private $sex_denominacion;
    private $pac_telefono;
    private $pac_activo;
    
    public function __construct() {
        $this->obj_pac = new Paciente();
    }
   
    public function agregarPaciente($pac_id,$pac_rut,$pac_dv,$pac_nombres,$pac_ape_pat,$pac_ape_mat,$pac_direccion,$pac_fecha_nac,$pac_sex_id,$pac_telefono,$pac_ip,$pac_usu){
        $arr = $this->obj_pac->AgregarPaciente($pac_id,$pac_rut,$pac_dv,$pac_nombres,$pac_ape_pat,$pac_ape_mat,$pac_direccion,$pac_fecha_nac,$pac_sex_id,$pac_telefono,$pac_ip,$pac_usu);
        return $arr;
    }
    
    public function listar_paciente_rut($rut){
        $res = $this->obj_pac->ListarPaciente(2, $rut);
        return $res;
    }
    
    public function listar_paciente_id($id){
        $res = $this->obj_pac->ListarPaciente(1, $id);
        return $res;
    }
    
    public function listar_paciente_all(){
        $res = $this->obj_pac->ListarPaciente(null, null);
        return $res;
    }
    
    public function setPaciente($id_paciente){
        $res = $this->listar_paciente_id($id_paciente);
        if(is_array($res)  && $res != null){
            $this->pac_id                   = $res[0]['pac_id'];
            $this->pac_rut                  = $res[0]['rut'];
            $this->pac_nombres              = $res[0]['pac_nombres'];
            $this->pac_ape_mat              = $res[0]['pac_ape_mat'];
            $this->pac_ape_pat              = $res[0]['pac_ape_pat'];
            $this->pac_direccion            = $res[0]['pac_direccion'];
            $this->pac_fecha_nac            = $res[0]['pac_fecha_nac'];
            $this->pac_sex_id               = $res[0]['pac_sex_id'];
            $this->sex_denominacion         = $res[0]['sex_denominacion'];
            $this->pac_telefono             = $res[0]['pac_telefono'];
            $this->pac_activo               = $res[0]['pac_activo'];
        }else{
            $this->fun_id                   = "";
            $this->pac_id                   = "";
            $this->pac_rut                  = "";
            $this->pac_nombres              = "";
            $this->pac_ape_mat              = "";
            $this->pac_ape_pat              = "";
            $this->pac_direccion            = "";
            $this->pac_fecha_nac            = "";
            $this->pac_sex_id               = "";
            $this->sex_denominacion         = "";
            $this->pac_telefono             = "";
            $this->pac_activo               = "";
        }
    }
    
    public function getPac_id() {
        return $this->pac_id;
    }

    public function setPac_id($pac_id) {
        $this->pac_id = $pac_id;
    }

    public function getPac_rut() {
        return $this->pac_rut;
    }

    public function setPac_rut($pac_rut) {
        $this->pac_rut = $pac_rut;
    }

    public function getPac_nombres() {
        return $this->pac_nombres;
    }

    public function setPac_nombres($pac_nombres) {
        $this->pac_nombres = $pac_nombres;
    }

    public function getPac_ape_mat() {
        return $this->pac_ape_mat;
    }

    public function setPac_ape_mat($pac_ape_mat) {
        $this->pac_ape_mat = $pac_ape_mat;
    }

    public function getPac_ape_pat() {
        return $this->pac_ape_pat;
    }

    public function setPac_ape_pat($pac_ape_pat) {
        $this->pac_ape_pat = $pac_ape_pat;
    }

    public function getPac_direccion() {
        return $this->pac_direccion;
    }

    public function setPac_direccion($pac_direccion) {
        $this->pac_direccion = $pac_direccion;
    }

    public function getPac_fecha_nac() {
        return $this->pac_fecha_nac;
    }

    public function setPac_fecha_nac($pac_fecha_nac) {
        $this->pac_fecha_nac = $pac_fecha_nac;
    }

    public function getPac_sex_id() {
        return $this->pac_sex_id;
    }

    public function setPac_sex_id($pac_sex_id) {
        $this->pac_sex_id = $pac_sex_id;
    }

    public function getSex_denominacion() {
        return $this->sex_denominacion;
    }

    public function setSex_denominacion($sex_denominacion) {
        $this->sex_denominacion = $sex_denominacion;
    }

    public function getPac_telefono() {
        return $this->pac_telefono;
    }

    public function setPac_telefono($pac_telefono) {
        $this->pac_telefono = $pac_telefono;
    }

    public function getPac_activo() {
        return $this->pac_activo;
    }

    public function setPac_activo($pac_activo) {
        $this->pac_activo = $pac_activo;
    }



}
?>