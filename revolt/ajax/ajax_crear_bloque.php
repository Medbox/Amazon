<?php
require_once("../class/Class.Block.php");

$obj_block	=	new Block();

$nb_block		=	$_GET['nb_block'];//cod horario inicio
$nb_date		=	date("d/m/Y",$_GET['nb_date']);//stump
$nb_minutes		=	$_GET['nb_minutes'];//number
$nb_game		=	$_GET['nb_game'];//char
$nb_section		=	$_GET['nb_section'];//char
$nb_editor		=	$_GET['nb_editor'];//editor
if($nb_editor == ""){
	$nb_editor = NULL;
	}
$nb_interludio	=	$_GET['nb_interludio'];//comercial
if($nb_interludio == ""){
	$nb_interludio = NULL;
	}


$arr_resp		=	$obj_block->add_block($nb_date,$nb_block,$nb_minutes,$nb_game,$nb_section,$nb_interludio,$nb_editor);//'2013-09-25', 11, 40, 'C11', 'S02'

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