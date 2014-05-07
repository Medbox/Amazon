<?php

Class Config{
   private $_userdb;
   private $_passdb;
   private $_hostdb;
   private $_db;
   private $_dbType;

   private static $_instance;

   public function __construct(){
      
   }

   private function __clone(){ }

   private function __wakeup(){ }
   
   public function set_Config(){
      $this->_userdb='revolt';
      $this->_passdb='peck';
      $this->_hostdb='localhost';
      $this->_db='revolt_db';
      $this->_dbType='postgress';
   }

   public static function getInstance(){
      if (!(self::$_instance instanceof self)){
         self::$_instance=new self();
      }
      return self::$_instance;
   }

   public function getUserDB(){
      $var=$this->_userdb;
      return $var;
   }

   public function getHostDB(){
      $var=$this->_hostdb;
      return $var;
   }

   public function getPassDB(){
      $var=$this->_passdb;
      return $var;
   }

   public function getDB(){
      $var=$this->_db;
      return $var;
   }

   public function getDBType(){
	  $var=$this->_dbType;
	  return $var;
   }
	
   public function set_userdb($_userdb) {
       $this->_userdb = $_userdb;
   }

   public function set_passdb($_passdb) {
       $this->_passdb = $_passdb;
   }

   public function set_hostdb($_hostdb) {
       $this->_hostdb = $_hostdb;
   }

   public function set_db($_db) {
       $this->_db = $_db;
   }

   public function set_dbType($_dbType) {
       $this->_dbType = $_dbType;
   }


}

?>