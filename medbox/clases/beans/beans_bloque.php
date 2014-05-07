<?php

include_once ("/var/www/medbox/clases/dao/Bloque.php");

class beans_bloque {

    private $obj_blh;
    private $blh_id;
    private $blh_dia;
    private $blh_h_ini;
    private $blh_h_fin;
    private $blh_rpl_id;
    private $blh_rts_id;
    private $blh_cre_id;
    private $blh_fun_id;
    private $blh_equ_id;
    private $blh_prg_id;
    private $blh_pro_id;
    private $blh_ren;
    private $blh_rsr_id;
    private $blh_activo;
    private $horas_pabellon;
    private $horas_camas;
    private $horas_interconsulta;
    private $horas_policlinico;
    private $horas_procedimiento;
    private $horas_reunion;
    private $horas_gestion;

    public function __construct() {
        $this->obj_blh = new Bloque();
    }

    public function agregarBloque($dia_semana, $h_inicio, $h_fin, $rpl_id, $rts_id, $fun_id, $equ_id, $prg_id, $pro_id, $rendimiento = null, $rsr_id, $pre_id, $tpr_id = null) {
        $arr = $this->obj_blh->AgregarBloque($dia_semana, $h_inicio, $h_fin, $rpl_id, $rts_id, $fun_id, $equ_id, $prg_id, $pro_id, $rendimiento, $rsr_id, $pre_id, $tpr_id);
        return $arr;
    }

    public function listarBloque($id = null) {
        $arr = $this->obj_blh->ListarBloque($id);
        return $arr;
    }

    public function listarHorasPabellon($fun_id) {
        $arr = $this->obj_blh->ListarHorasProgramadasPreId(1, $fun_id);
        return $arr;
    }

    public function listarHorasCamas($fun_id) {
        $arr = $this->obj_blh->ListarHorasProgramadasPreId(2, $fun_id);
        return $arr;
    }

    public function listarHorasInterconsulta($fun_id) {
        $arr = $this->obj_blh->ListarHorasProgramadasPreId(3, $fun_id);
        return $arr;
    }

    public function listarHorasPoliclinico($fun_id) {
        $arr = $this->obj_blh->ListarHorasProgramadasPreId(4, $fun_id);
        return $arr;
    }

    public function listarHorasProcedimiento($fun_id) {
        $arr = $this->obj_blh->ListarHorasProgramadasPreId(5, $fun_id);
        return $arr;
    }

    public function listarHorasReunion($fun_id) {
        $arr = $this->obj_blh->ListarHorasProgramadasPreId(6, $fun_id);
        return $arr;
    }

    public function listarHorasGestion($fun_id) {
        $arr = $this->obj_blh->ListarHorasProgramadasPreId(7, $fun_id);
        return $arr;
    }

    public function setCotrato($id_blo) {
        $res = $this->obj_blh->ListarBloque($id_blo);
        if (is_array($res)) {
            $this->blh_id = $res[0]['BLH_ID'];
            $this->blh_dia = $res[0]['BLH_DIA'];
            $this->blh_h_ini = $res[0]['BLH_H_INI'];
            $this->blh_h_fin = $res[0]['BLH_H_FIN'];
            $this->blh_rpl_id = $res[0]['BLH_RPL_ID'];
            $this->blh_rts_id = $res[0]['BLH_RTS_ID'];
            $this->blh_cre_id = $res[0]['BLH_CRE_ID'];
            $this->blh_fun_id = $res[0]['BLH_FUN_ID'];
            $this->blh_equ_id = $res[0]['BLH_EQU_ID'];
            $this->blh_prg_id = $res[0]['BLH_PRG_ID'];
            $this->blh_pro_id = $res[0]['BLH_PRO_ID'];
            $this->blh_ren = $res[0]['BLH_REN'];
            $this->blh_rsr_id = $res[0]['BLH_RSR_ID'];
            $this->blh_activo = $res[0]['BLH_ACTIVO'];
            $this->horas_pabellon = $this->listarHorasPabellon($res[0]['BLH_FUN_ID']);
            $this->horas_camas = $this->listarHorasCamas($res[0]['BLH_FUN_ID']);
        } else {
            $this->blh_id = "";
            $this->blh_dia = "";
            $this->blh_h_ini = "";
            $this->blh_h_fin = "";
            $this->blh_rpl_id = "";
            $this->blh_rts_id = "";
            $this->blh_cre_id = "";
            $this->blh_fun_id = "";
            $this->blh_equ_id = "";
            $this->blh_prg_id = "";
            $this->blh_pro_id = "";
            $this->blh_ren = "";
            $this->blh_rsr_id = "";
            $this->blh_activo = "";
        }
    }

    public function setHoras($fun_id) {
        $res = $this->obj_blh->ListarHorasProgramadasPreId(null, $fun_id);
        foreach($res as $var=>$val){ 
            if($val['TOTAL'] == null){
                $val['TOTAL'] = '00:00';
            }else{
                $val['TOTAL'] = $val['TOTAL'];
            }
            switch ($val['PRE_ID']) {
                case 1:
                    $this->horas_pabellon = $val['TOTAL'];
                    break;
                case 2:
                    $this->horas_camas = $val['TOTAL'];
                    break;
                case 3:
                    $this->horas_interconsulta = $val['TOTAL'];
                    break;
                case 4:
                    $this->horas_policlinico = $val['TOTAL'];
                    break;
                case 5:
                    $this->horas_procedimiento = $val['TOTAL'];
                    break;
                case 6:
                    $this->horas_reunion = $val['TOTAL'];
                    break;
                case 7:
                    $this->horas_gestion = $val['TOTAL'];
                    break;
                default:
                    break;
            }
        }
        
        
        
    }
    
    public function getBlh_id() {
        return $this->blh_id;
    }

    public function setBlh_id($blh_id) {
        $this->blh_id = $blh_id;
    }

    public function getBlh_dia() {
        return $this->blh_dia;
    }

    public function setBlh_dia($blh_dia) {
        $this->blh_dia = $blh_dia;
    }

    public function getBlh_h_ini() {
        return $this->blh_h_ini;
    }

    public function setBlh_h_ini($blh_h_ini) {
        $this->blh_h_ini = $blh_h_ini;
    }

    public function getBlh_h_fin() {
        return $this->blh_h_fin;
    }

    public function setBlh_h_fin($blh_h_fin) {
        $this->blh_h_fin = $blh_h_fin;
    }

    public function getBlh_rpl_id() {
        return $this->blh_rpl_id;
    }

    public function setBlh_rpl_id($blh_rpl_id) {
        $this->blh_rpl_id = $blh_rpl_id;
    }

    public function getBlh_rts_id() {
        return $this->blh_rts_id;
    }

    public function setBlh_rts_id($blh_rts_id) {
        $this->blh_rts_id = $blh_rts_id;
    }

    public function getBlh_cre_id() {
        return $this->blh_cre_id;
    }

    public function setBlh_cre_id($blh_cre_id) {
        $this->blh_cre_id = $blh_cre_id;
    }

    public function getBlh_fun_id() {
        return $this->blh_fun_id;
    }

    public function setBlh_fun_id($blh_fun_id) {
        $this->blh_fun_id = $blh_fun_id;
    }

    public function getBlh_equ_id() {
        return $this->blh_equ_id;
    }

    public function setBlh_equ_id($blh_equ_id) {
        $this->blh_equ_id = $blh_equ_id;
    }

    public function getBlh_prg_id() {
        return $this->blh_prg_id;
    }

    public function setBlh_prg_id($blh_prg_id) {
        $this->blh_prg_id = $blh_prg_id;
    }

    public function getBlh_pro_id() {
        return $this->blh_pro_id;
    }

    public function setBlh_pro_id($blh_pro_id) {
        $this->blh_pro_id = $blh_pro_id;
    }

    public function getBlh_ren() {
        return $this->blh_ren;
    }

    public function setBlh_ren($blh_ren) {
        $this->blh_ren = $blh_ren;
    }

    public function getBlh_rsr_id() {
        return $this->blh_rsr_id;
    }

    public function setBlh_rsr_id($blh_rsr_id) {
        $this->blh_rsr_id = $blh_rsr_id;
    }

    public function getBlh_activo() {
        return $this->blh_activo;
    }

    public function setBlh_activo($blh_activo) {
        $this->blh_activo = $blh_activo;
    }

    public function getHoras_pabellon() {
        return $this->horas_pabellon;
    }

    public function setHoras_pabellon($horas_pabellon) {
        $this->horas_pabellon = $horas_pabellon;
    }

    public function getHoras_camas() {
        return $this->horas_camas;
    }

    public function setHoras_camas($horas_camas) {
        $this->horas_camas = $horas_camas;
    }


    public function getHoras_interconsulta() {
        return $this->horas_interconsulta;
    }

    public function setHoras_interconsulta($horas_interconsulta) {
        $this->horas_interconsulta = $horas_interconsulta;
    }

    public function getHoras_policlinico() {
        return $this->horas_policlinico;
    }

    public function setHoras_policlinico($horas_policlinico) {
        $this->horas_policlinico = $horas_policlinico;
    }

    public function getHoras_procedimiento() {
        return $this->horas_procedimiento;
    }

    public function setHoras_procedimiento($horas_procedimiento) {
        $this->horas_procedimiento = $horas_procedimiento;
    }

    public function getHoras_reunion() {
        return $this->horas_reunion;
    }

    public function setHoras_reunion($horas_reunion) {
        $this->horas_reunion = $horas_reunion;
    }

    public function getHoras_gestion() {
        return $this->horas_gestion;
    }

    public function setHoras_gestion($horas_gestion) {
        $this->horas_gestion = $horas_gestion;
    }



}

?>