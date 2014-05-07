<?php
include_once ("clases/dao/Menu.php");
class beans_menu{
    private $obj_men;
    private $men_id;
    private $men_name;
    private $men_parent;
    private $men_texto;
    private $men_link;
    private $men_target;
    private $men_orden;
    private $men_extra;
    private $men_action;
    private $men_img;
    private $men_class;
    private $men_nivel;
    private $men_activo;
    
    public function __construct() {
        $this->obj_men = new Menu();
    }
   
    public function listar_menu($id = null){
        $res = $this->obj_men->ListarMenu($id);
        return $res;
    }
    
    public function setMenu($id_menu){
        $res = $this->listar_menu($id_menu);
        if(is_array($res)){
            $this->men_id           = $res[0]['MEN_ID'];
            $this->men_name         = $res[0]['MEN_NAME'];
            $this->men_parent       = $res[0]['MEN_PARENT'];
            $this->men_texto        = $res[0]['MEN_TEXTO'];
            $this->men_link         = $res[0]['MEN_LINK'];
            $this->men_target       = $res[0]['MEN_TARGET'];
            $this->men_orden        = $res[0]['MEN_ORDEN'];
            $this->men_extra        = $res[0]['MEN_EXTRA'];
            $this->men_action       = $res[0]['MEN_ACTION'];
            $this->men_img          = $res[0]['MEN_IMG'];
            $this->men_class        = $res[0]['MEN_CLASS'];
            $this->men_nivel        = $res[0]['MEN_NIVEL'];
            $this->men_activo       = $res[0]['MEN_ACTIVO'];
        }else{
            $this->men_id           = "";
            $this->men_name         = "";
            $this->men_parent       = "";
            $this->men_texto        = "";
            $this->men_link         = "";
            $this->men_target       = "";
            $this->men_orden        = "";
            $this->men_extra        = "";
            $this->men_action       = "";
            $this->men_img          = "";
            $this->men_class        = "";
            $this->men_nivel        = "";
            $this->men_activo       = "";
        }
    }
    
    public function getMen_id() {
        return $this->men_id;
    }

    public function setMen_id($men_id) {
        $this->men_id = $men_id;
    }

    public function getMen_name() {
        return $this->men_name;
    }

    public function setMen_name($men_name) {
        $this->men_name = $men_name;
    }

    public function getMen_parent() {
        return $this->men_parent;
    }

    public function setMen_parent($men_parent) {
        $this->men_parent = $men_parent;
    }

    public function getMen_texto() {
        return $this->men_texto;
    }

    public function setMen_texto($men_texto) {
        $this->men_texto = $men_texto;
    }

    public function getMen_link() {
        return $this->men_link;
    }

    public function setMen_link($men_link) {
        $this->men_link = $men_link;
    }

    public function getMen_target() {
        return $this->men_target;
    }

    public function setMen_target($men_target) {
        $this->men_target = $men_target;
    }

    public function getMen_orden() {
        return $this->men_orden;
    }

    public function setMen_orden($men_orden) {
        $this->men_orden = $men_orden;
    }

    public function getMen_extra() {
        return $this->men_extra;
    }

    public function setMen_extra($men_extra) {
        $this->men_extra = $men_extra;
    }

    public function getMen_action() {
        return $this->men_action;
    }

    public function setMen_action($men_action) {
        $this->men_action = $men_action;
    }

    public function getMen_img() {
        return $this->men_img;
    }

    public function setMen_img($men_img) {
        $this->men_img = $men_img;
    }

    public function getMen_class() {
        return $this->men_class;
    }

    public function setMen_class($men_class) {
        $this->men_class = $men_class;
    }

    public function getMen_nivel() {
        return $this->men_nivel;
    }

    public function setMen_nivel($men_nivel) {
        $this->men_nivel = $men_nivel;
    }

    public function getMen_activo() {
        return $this->men_activo;
    }

    public function setMen_activo($men_activo) {
        $this->men_activo = $men_activo;
    }



}
?>