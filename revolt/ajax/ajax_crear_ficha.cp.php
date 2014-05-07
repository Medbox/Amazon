<?php
require_once("../class/Class.Ficha.php");

$ficha_id		=	NULL;
$fun_id			=	$_GET['fun_id'];
$conductor		=	$_GET['conductor'];
$game_id		=	$_GET['game'];
$editorial		=	$_GET['editorial'];
$video			=	$_GET['video'];
$comentario		=	"";
$clasificacion	=	NULL;
$fun_id_retro	=	NULL;
$fecha			=	NULL;
$estado			=	NULL;

$obj_ficha		=	new Ficha();
$arr_resp               =       $obj_ficha->AgregarFicha($fic_id, $fic_antecedentes, $fic_motivo, $cct_id, $cct_nro, $fecha_out, $pac_id, $tfi_id)    
$arr_resp		=	$obj_ficha->add_ficha($ficha_id,$fun_id,$conductor,$game_id,$editorial,$video,$comentario,$clasificacion,$fun_id_retro,$fecha,$estado);


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
?>