<?php
require_once("../class/Class.Ficha.php");

$option				=	$_GET['option'];	//AM: Afiliado Crea Ficha Mensual
$ficha_id			=	NULL;
$fun_id				=	NULL;
$conductor			=	NULL;
$bloque				=	NULL;
$numero_programa	=	NULL;
$editorial			=	NULL;
$programa			=	NULL;
$nombre_programa	=	NULL;
$juego				=	NULL;
$padre_id			=	NULL;
$tfi_id				=	NULL;
$fun_retro			=	NULL;
$fecha_retro		=	NULL;
$estado				=	NULL;
$mes				=	NULL;


if(isset($option)){
switch($option){
	case "AM":	//AFILIADO - MENSUAL
				$fun_id				=	$_GET['fun_id'];				//--> obligatorio
				$conductor			=	$_GET['conductor'];				//--> obligatorio
				$bloque				=	$_GET['bloque_programa'];		//--> obligatorio
				$numero_programa	=	$_GET['numero_programa'];		//--> obligatorio
				$editorial			=	$_GET['linea_editorial'];		//--> obligatorio
				$programa			=	$_GET['desarrollo_programa'];	//--> obligatorio
				$nombre_programa	=	$_GET['nombre_programa'];		//--> obligatorio
				$juego				=	$_GET['juegos'];				//--> obligatorio
				$tfi_id				=	1;								//--> obligatorio | 1:Mensual				
				$mes				=	"Marzo 2014";
								
				$obj_ficha	=	new Ficha();
				$arr_resp	=	$obj_ficha->agregarFicha($fun_id, $conductor, $bloque, $numero_programa, $editorial, $programa, $nombre_programa, $juego, $mes);
				
				break;
	
	default	:	$arr_resp	=	NULL;
	}



if(isset($arr_resp) && is_array($arr_resp)){
	
	if(is_numeric($arr_resp['out_id']) && $arr_resp['out_id'] > 0){
			echo "OK|".$arr_resp['out_id'];		
			}
	else{	echo "ERROR|".$arr_resp['out_cod']."&".$arr_resp['out_msg'];
			}
	}
else{
	echo "ERROR|".var_dump($arr_resp);
	}
}
else{
	echo "ERROR|NO_OPTION";
	}
?>