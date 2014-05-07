<?php
require_once("../class/Class.Block.php");

$obj_block	=	new Block();

$blk_id		=	$_GET['blk_id'];
$cod_gam	=	$_GET['nb_game'];
$cod_sec	=	$_GET['nb_section'];
$editor		=	$_GET['nb_editor'];
if($editor == ""){
	$editor = NULL;
	}
$interludio	=	$_GET['nb_interludio'];
if($interludio == ""){
	$interludio = NULL;
	}


if(is_numeric($blk_id) && $blk_id > 0){	
	
	$result	=	$obj_block->upd_block($blk_id,$cod_gam, $cod_sec, $interludio, $editor);

	if(isset($result) && is_array($result)){
		
		if(is_numeric($result['out_id']) && $result['out_id'] > 0){
				echo "OK|".$result['out_id'];		
				}
		else{	echo "ERROR|".$result['out_cod']." - ".$result['out_msg'];
				}
		}
	else{
		echo "ERROR|".$result['out_cod']." - ".$result['out_msg'];
		}
	
	
	}
else{
	echo "ERROR|NO_BLK_ID";
	}

?>