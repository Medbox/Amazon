<?php
session_start();
if(isset($_SESSION['usu_id']) && is_numeric($_SESSION['usu_id'])){	
	
	$_SESSION['MENU']['PERFIL']			=	false;
	$_SESSION['MENU']['HORARIO']		=	false;
	$_SESSION['MENU']['DOCUMENTOS']		=	false;
	$_SESSION['MENU']['PROGRAMACION']	=	false;
	$_SESSION['MENU']['EDICION']		=	false;
	$_SESSION['MENU']['FICHAS']			=	false;
	
	
	if(isset($_SESSION['rol_id']) && is_numeric($_SESSION['rol_id'])){
		
		$rol_id	=	$_SESSION['rol_id'];	

		switch($rol_id){
						
			case "1":	//ADMINISTRADOR
						$_SESSION['MENU']['PERFIL']		=	true;
						$_SESSION['MENU']['HORARIO']	=	true;
						break;
			case "2":	//CEO
						$_SESSION['MENU']['PERFIL']		=	true;
						$_SESSION['MENU']['HORARIO']	=	true;
						break;
			case "3":	//MIEMBRO REVOLT
						$_SESSION['MENU']['PERFIL']		=	true;
						$_SESSION['MENU']['HORARIO']	=	true;
						break;
			case "4":	//DEP. COMUNICACION
						$_SESSION['MENU']['PERFIL']		=	true;
						$_SESSION['MENU']['HORARIO']	=	true;
						break;
			case "5":	//DEP. CONTENIDO
						$_SESSION['MENU']['PERFIL']		=	true;
						$_SESSION['MENU']['HORARIO']	=	true;
						break;
			case "6":	//DEP. PUBLICIDAD
						$_SESSION['MENU']['PERFIL']		=	true;
						$_SESSION['MENU']['HORARIO']	=	true;
						break;
			case "7":	//DEP. POST PRODUCCIÓN
						$_SESSION['MENU']['PERFIL']		=	true;
						$_SESSION['MENU']['HORARIO']	=	true;
						break;
			case "8":	//AFILIADO
						$_SESSION['MENU']['PERFIL']		=	true;
						$_SESSION['MENU']['HORARIO']	=	true;
						break;
			case "9":	//DEP. PROGRAMACION
						$_SESSION['MENU']['PERFIL']		=	true;
						$_SESSION['MENU']['HORARIO']	=	true;
						break;
			case "10":	//DEP. DISEÑO
						$_SESSION['MENU']['PERFIL']		=	true;
						$_SESSION['MENU']['HORARIO']	=	true;
						break;
			case "11":	//DEP. EDICION
						$_SESSION['MENU']['PERFIL']		=	true;
						$_SESSION['MENU']['HORARIO']	=	true;
						break;
			case "12":	//DEP. RESEARCH
						$_SESSION['MENU']['PERFIL']		=	true;
						$_SESSION['MENU']['HORARIO']	=	true;
						break;
			case "13":	//DEP. TRANSMISION
						$_SESSION['MENU']['PERFIL']		=	true;
						$_SESSION['MENU']['HORARIO']	=	true;
						break;
			case "14":	//DEP. FINANZAS
						$_SESSION['MENU']['PERFIL']		=	true;
						$_SESSION['MENU']['HORARIO']	=	true;
						break;
			case "15":	//DEP. PRODUCCION GENERAL
						$_SESSION['MENU']['PERFIL']		=	true;
						$_SESSION['MENU']['HORARIO']	=	true;
						break;
			}		
		}
	
	
	//COMPRUEBA SI FUNCIONARIO ESTA VERIFICADO
	require_once("class/Class.Funcionario.php");	
	$fun_id		=	$_SESSION['fun_id'];	
	
	$obj_stt	=	new Funcionario();
	$arr_stt	=	$obj_stt->trae_estado_fun($fun_id);
	$fun_stt	=	$arr_stt[0]['fun_estado_contrato'];	
	$fun_con_id	=	$arr_stt[0]['fun_con_id'];
	//$fun_stt	=	$arr_stt[0]['inicio_contrato'];
	$fun_con_des	=	$arr_stt[0]['tco_denominacion'];
	
	//if($fun_stt == 1 && $fun_con_id != "" && $fun_id != 20){
//		header("Location: docs/contrato_web_".$fun_con_des.".php?con_id=".$fun_con_id);
//		}
	//-----------------------------------------
			
	}
else{
	header("Location: login.php");
	}
?>