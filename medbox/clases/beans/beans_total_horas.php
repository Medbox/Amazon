<?php
require_once("/var/www/medbox/clases/dao/Total_Horas.php");
class beans_total_horas{
    private $obj_tho;
    private $id;
    private $fun_id;
    private $dias_hablies;
    private $carga;
    private $horas_contratadas;
    private $jubilado_guardia;
    private $administrativo;
    private $curso;
    private $feriado_anterior;
    private $feriado_legal;
    private $activo;

    public function __construct() {
        $this->obj_tho = new Total_Horas();
    }
   
    public function listar_total_horas($id = null){
        $res = $this->obj_tho->ListarTotalHoras($id);
        return $res;
    }
    
    public function total_horas_programables($fun_id){
        $res = $this->obj_tho->ListarTotalHorasProgramables($fun_id);
        return $res;
    }
    
    public function agregar_total_horas($fun_id, $d_habiles, $carga, $h_contratadas, $j_guardia, $administrativos, $curso, $f_anteriores, $f_legal, $descanso, $dias_fuera){
        $res = $this->obj_tho->AgregarTotalHoras($fun_id, $d_habiles, $carga, $h_contratadas, $j_guardia, $administrativos, $curso, $f_anteriores, $f_legal, $descanso, $dias_fuera);
        if($res['out_cod'] == 0){
            return true;
        }else{
            return $res['out_msg'];
        }
    }
    
    public function setCentro($id_centro){
        $res = $this->listar_centro($id_centro);
        if(is_array($res)){
            $this->id                       = $res[0]['THO_ID'];
            $this->fun_id                   = $res[0]['THO_FUN_ID'];
            $this->dias_hablies             = $res[0]['THO_DIAS_HABILES'];
            $this->carga                    = $res[0]['THO_CARGA_28H'];
            $this->horas_contratadas        = $res[0]['THO_HORAS_CONTRATADAS'];
            $this->jubilado_guardia         = $res[0]['THO_JUBILADO_GUARDIA'];
            $this->administrativo           = $res[0]['THO_ADMINISTRATIVOS'];
            $this->curso                    = $res[0]['THO_CURSO'];
            $this->feriado_anterior         = $res[0]['THO_FERIADO_A_ANTERIOR'];
            $this->feriado_legal            = $res[0]['THO_FERIADO_LEGAL'];
            $this->activo                   = $res[0]['THO_ACTIVO'];
        }else{
            $this->id                   = "";
            $this->fun_id               = "";
            $this->dias_hablies         = "";
            $this->carga                = "";
            $this->horas_contratadas    = "";
            $this->jubilado_guardia     = "";
            $this->administrativo       = "";
            $this->curso                = "";
            $this->feriado_anterior     = "";
            $this->feriado_legal        = "";
            $this->activo               = "";
        }
    }
    

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getFun_id() {
        return $this->fun_id;
    }

    public function setFun_id($fun_id) {
        $this->fun_id = $fun_id;
    }

    public function getDias_hablies() {
        return $this->dias_hablies;
    }

    public function setDias_hablies($dias_hablies) {
        $this->dias_hablies = $dias_hablies;
    }

    public function getCarga() {
        return $this->carga;
    }

    public function setCarga($carga) {
        $this->carga = $carga;
    }

    public function getHoras_contratadas() {
        return $this->horas_contratadas;
    }

    public function setHoras_contratadas($horas_contratadas) {
        $this->horas_contratadas = $horas_contratadas;
    }

    public function getJubilado_guardia() {
        return $this->jubilado_guardia;
    }

    public function setJubilado_guardia($jubilado_guardia) {
        $this->jubilado_guardia = $jubilado_guardia;
    }

    public function getAdministrativo() {
        return $this->administrativo;
    }

    public function setAdministrativo($administrativo) {
        $this->administrativo = $administrativo;
    }

    public function getCurso() {
        return $this->curso;
    }

    public function setCurso($curso) {
        $this->curso = $curso;
    }


    public function getFeriado_anterior() {
        return $this->feriado_anterior;
    }

    public function setFeriado_anterior($feriado_anterior) {
        $this->feriado_anterior = $feriado_anterior;
    }

    public function getFeriado_legal() {
        return $this->feriado_legal;
    }

    public function setFeriado_legal($feriado_legal) {
        $this->feriado_legal = $feriado_legal;
    }

    public function getActivo() {
        return $this->activo;
    }

    public function setActivo($activo) {
        $this->activo = $activo;
    }

}
?>