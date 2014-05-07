<?php
require_once("../class/Class.Block.php");

$obj_block	=	new Block();
$blk_id		=	$_GET['blk_id'];

if(is_numeric($blk_id) && $blk_id > 0){
	
	$arr_resp	=	$obj_block->del_block($blk_id);//'2013-09-25', 11, 40, 'C11', 'S02'
	
	if(isset($arr_resp) && is_array($arr_resp)){
		
		if(is_numeric($arr_resp['out_id']) && $arr_resp['out_id'] > 0){
				echo "OK|".$arr_resp['out_id'];		
				}
		else{	echo "ERROR|".$arr_resp['out_cod']." - ".$arr_resp['out_msg'];
				}
		}
	else{
		echo "ERROR|".$arr_resp['out_cod']." - ".$arr_resp['out_msg'];
		}
	
	
	}
else{
	echo "ERROR|NO_BLK_ID";
	}





?>