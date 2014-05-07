<?php
include_once ("/var/www/medbox/clases/dao/Contrato.php");
class beans_contrato{
    private $obj_con;
    private $con_id;
    private $con_denominacion;
    private $con_descripcion;
    private $con_activo;
    
    
    public function __construct() {
        $this->obj_con = new Contrato();
    }
   
    public function listar_contrato($id = null){
        $res = $this->obj_con->ListarContrato($id);
        return $res;
    }
    
    public function listar_contrato_fun($fun_id){
        $res = $this->obj_con->ListarContratoFuncionario(1, $fun_id);
        return $res;
    }
    
    public function listar_contrato_con($con_id){
        $res = $this->obj_con->ListarContratoFuncionario(2, $con_id);
        return $res;
    }
    
    public function listar_contrato_esb($esb_id){
        $res = $this->obj_con->ListarContratoFuncionario(3, $esb_id);
        return $res;
    }
    
    public function listar_contrato_all(){
        $res = $this->obj_con->ListarContratoFuncionario(null, null);
        return $res;
    }
    
    public function agregar_contrato($fun_id, $con_id, $esb_id, $contrata){
        $res = $this->obj_con->AgregarContrato($fun_id, $con_id, $esb_id, $contrata);
        return $res;
    }
    
    public function elimina_contrato($rcf_id){
        $res = $this->obj_con->EliminaContrato($rcf_id);
        return $res;
    }
    
    public function total_horas($fun_id){
        $res = $this->obj_con->TotalHoras($fun_id);
        return $res;
    }
    
    public function setCotrato($id_con){
        $res = $this->listar_contrato($id_con);
        if(is_array($res)){
            $this->con_id           = $res[0]['CON_ID'];
            $this->con_denominacion = $res[0]['CON_DENOMINACION'];
            $this->con_descripcion  = $res[0]['CON_DESCRIPCION'];
            $this->con_activo       = $res[0]['CON_ACTIVO'];
        }else{
            $this->con_id           = "";
            $this->con_denominacion = "";
            $this->con_descripcion  = "";
            $this->con_activo       = "";
        }
    }
    public function getCon_id() {
        return $this->con_id;
    }

    public function setCon_id($con_id) {
        $this->con_id = $con_id;
    }

    public function getCon_denominacion() {
        return $this->con_denominacion;
    }

    public function setCon_denominacion($con_denominacion) {
        $this->con_denominacion = $con_denominacion;
    }

    public function getCon_descripcion() {
        return $this->con_descripcion;
    }

    public function setCon_descripcion($con_descripcion) {
        $this->con_descripcion = $con_descripcion;
    }

    public function getCon_activo() {
        return $this->con_activo;
    }

    public function setCon_activo($con_activo) {
        $this->con_activo = $con_activo;
    }

     
}
?>