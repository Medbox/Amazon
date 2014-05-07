<?php
var_dump($_SESSION['fun_id']);
//session_start();
//require_once("class/Class.Game.php");
//require_once("class/Class.Section.php");
//require_once("class/Class.Segment.php");
require_once("class/Class.Block.php");
//include_once("class/Class.Functions.php");

$obj_blk	=	new Block();
$arr_blk	=	$obj_blk->list_block_fun(null,$_SESSION['fun_id']);

var_dump($arr_blk);

?>