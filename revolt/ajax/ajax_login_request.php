<?php
session_start();
require_once('../class/Class.User.php');

if(isset($_POST['user']) && isset($_POST['pass'])){
	
	$user	=	strtoupper($_POST['user']);
	$pass	=	strtoupper($_POST['pass']);

	$obj_usu	=	new User();
	$arr_usu	=	$obj_usu->list_user($user,$pass);

	if($arr_usu[0]['usu_id'] > 0){

		$usu_id	=	$arr_usu[0]['usu_id'];		
		
		$obj_user	=	new User();
		$obj_user->setUsuario($usu_id);
		
		$usu_nom		=	$obj_user->get_usu_nombre();
		$usu_app		=	$obj_user->get_usu_ape_pat();
		$usu_apm		=	$obj_user->get_usu_ape_mat();
		$usu_rol_id		=	$obj_user->get_rol_id();
		$usu_rol_des	=	$obj_user->get_rol_des();
		$get_usu_rut	=	$obj_user->get_usu_rut();
		$fun_id			=	$obj_user->get_fun_id();
		$usu_stt		=	$obj_user->getUsu_active();
		
		//	strtr(áéíóúñ  ÁÉÍÓÚÑ
		
		$_SESSION['fun_id']		=	$fun_id;
		$_SESSION['fun_nom']	=	strtr(ucwords(strtolower($usu_nom." ".$usu_app)),"ÁÉÍÓÚÑ","áéíóúñ");
		$_SESSION['usu_id']		=	$usu_id;
		$_SESSION['usu_nom']	=	strtr(ucwords(strtolower($usu_nom." ".$usu_app." ".$usu_apm)),"ÁÉÍÓÚÑ","áéíóúñ");
		$_SESSION['usu_rut']	=	$get_usu_rut;
		$_SESSION['rol_id']		=	$usu_rol_id;
		$_SESSION['rol_des']	=	strtr(ucwords(strtolower($usu_rol_des)),"ÁÉÍÓÚÑ","áéíóúñ");
		$_SESSION['usu_stt']	=	$usu_stt;

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