<?php
session_start();
if(isset($_SESSION['usu_id']) && is_numeric($_SESSION['usu_id'])){	
	
	//$_SESSION['MENU']['PROGRAMACION']	=	false;
	//$_SESSION['MENU']['EDICION']		=	false;
	
	if(isset($_SESSION['rol_id']) && is_numeric($_SESSION['rol_id'])){
		
		$rol_id	=	$_SESSION['rol_id'];
		
		
		
		switch($rol_id){
			case "1":	//$_SESSION['MENU']['PROGRAMACION']	=	true;
						//$_SESSION['MENU']['EDICION']		=	true;
						break;
			}		
		}	
	}
else{
	header("Location: login.php");
	}
?>