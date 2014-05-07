<?php
include_once ("/var/www/medbox/clases/dao/Diagnostico.php");
class beans_diagnostico{
    private $obj_dia;
    private $dia_id;
    private $dia_descripcion;
    private $dia_atn_id;
    private $dia_activo;
    
    public function __construct() {
        $this->obj_dia = new Diagnostico();
    }
    
    public function agregarDiagnosticoAtencion($dia_id, $dia_decripcion, $dia_atn){
        $arr = $this->obj_dia->AgregarDiagnosticoAtencion($dia_id, $dia_decripcion, $dia_atn);
        return $arr;
    }
    
    public function agregarDiagnosticoFicha($dia_id, $dia_decripcion, $dia_fic){
        $arr = $this->obj_dia->AgregarDiagnosticoFicha($dia_id, $dia_decripcion, $dia_fic);
        return $arr;
    }
    
    public function agregarDiagnosticoCierre($dia_id, $dia_decripcion, $dia_cie){
        $arr = $this->obj_dia->AgregarDiagnosticoCierre($dia_id, $dia_decripcion, $dia_cie);
        return $arr;
    }
    
    public function eliminarDiagnostico($dia_id,$origen){
        $arr = $this->obj_dia->EliminarDiagnostico($dia_id,$origen);
        return $arr;
    }
    
    public function listar_diagnostico_atn($atn){
        $res = $this->obj_dia->ListarDiagnostico(2, $atn);
        return $res;
    }
    
    public function listar_diagnostico_fic($fic){
        $res = $this->obj_dia->ListarDiagnostico(3, $fic);
        return $res;
    }
    
    public function listar_diagnostico_cie($cie){
        $res = $this->obj_dia->ListarDiagnostico(4, $cie);
        return $res;
    }
    
    public function listar_diagnostico_id($id){
        $res = $this->obj_dia->ListarDiagnostico(1, $id);
        return $res;
    }
    
    public function listar_diagnostico_all(){
        $res = $this->obj_dia->ListarDiagnostico(null, null);
        return $res;
    }
    
    public function setDiagnostico($id_diagnostico){
        $res = $this->listar_diagnostico_id($id_diagnostico);
        if(is_array($res)  && $res != null){
            $this->dia_id                  = $res[0]['dat_id'];
            $this->dia_descripcion         = $res[0]['dat_descripcion'];
            $this->dia_atn_id              = $res[0]['dat_atn_id'];
            $this->dia_activo              = $res[0]['dat_activo'];
        }else{
            $this->dia_id                  = "";
            $this->dia_descripcion         = "";
            $this->dia_atn_id              = "";
            $this->dia_activo              = "";
        }
    }


    
    public function getDia_id() {
        return $this->dia_id;
    }

    public function setDia_id($dia_id) {
        $this->dia_id = $dia_id;
    }

    public function getDia_descripcion() {
        return $this->dia_descripcion;
    }

    public function setDia_descripcion($dia_descripcion) {
        $this->dia_descripcion = $dia_descripcion;
    }

    public function getDia_atn_id() {
        return $this->dia_atn_id;
    }

    public function setDia_atn_id($dia_atn_id) {
        $this->dia_atn_id = $dia_atn_id;
    }

    public function getDia_activo() {
        return $this->dia_activo;
    }

    public function setDia_activo($dia_activo) {
        $this->dia_activo = $dia_activo;
    }


}
?>