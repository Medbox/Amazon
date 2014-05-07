<?php

//	MYSQL CONECTION CLASS

class DB{
	
	private	$host = '54.232.96.192';
	private	$user = 'revolt';
	private	$pass = 'peck';
	
	public function __construct(){

		if($this->Connection($this->host,$this->user,$this->pass)){
			return true;
			}
		else{
			echo "NOT CONNECTED";
			}		
		}
		
	public function __destruct(){
		}
	
	
	
	
	private function Connection($host,$user,$pass){
		
		if(mysql_connect($host,$user,$pass)){
				return true;
				}
		else{	return false;
				}
		
		}
	
	
	
	
	}
?>