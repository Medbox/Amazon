<?php
session_start();
require_once('../clases/beans/beans_usuario.php');

if(isset($_POST['user']) && isset($_POST['pass'])){
	
	$user	=	strtoupper($_POST['user']);
	$pass	=	strtoupper($_POST['pass']);

	$obj_usu	=	new beans_usuario();
	$arr_usu	=	$obj_usu->listarUsuario($user,$pass);

	if($arr_usu[0]['usu_id'] > 0){

		$usu_id	=	$arr_usu[0]['usu_id'];		
		
		$obj_user	=	new beans_usuario();
		$obj_user->setUsuario($usu_id);
		
		$usu_nom	=	$obj_user->getNombre();
		$usu_app	=	$obj_user->getApellido_p();
		$usu_apm	=	$obj_user->getApellido_m();		
		$usu_rut	=	$obj_user->getRut();
		$fun_id		=	$obj_user->getFun_id();
		$rol_id		=	$obj_user->getRol_id();
		$rol_des	=	$obj_user->getRol();
				
		$_SESSION['fun_id']		=	$fun_id;
		$_SESSION['usu_id']		=	$usu_id;
		$_SESSION['usu_nom']	=	ucwords(strtolower($usu_nom." ".$usu_app." ".$usu_apm));
		$_SESSION['usu_rut']	=	$usu_rut;
		$_SESSION['rol_id']		=	$rol_id;
		$_SESSION['rol_des']	=	ucwords(strtolower($rol_des));
		
		
		echo "OK";
		
		}
	else{
		echo "NO_USU";
		}
	}
else{
	echo "NO_DATA";
	}


?>