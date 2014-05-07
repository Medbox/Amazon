<?php
/*require_once('class/Class.Game.php');

$obj_game	=	new Game();
$arr_game	=	$obj_game->list_all();

var_dump($arr_game);*/


/*require_once('class/Class.Block.php');

$obj_block	=	new Block();
//$arr_resp	=	$obj_block->add_block($nb_date,$nb_block,$nb_minutes,$nb_game,$nb_section);//'2013-09-25', 11, 40, 'C11', 'S02'

$nb_date	=	'06/10/2013';
$nb_block	=	1;
$nb_minutes	=	40;
$nb_game	=	'C02';
$nb_section	=	'S01';


$arr_resp	=	$obj_block->add_block($nb_date,$nb_block,$nb_minutes,$nb_game,$nb_section);//'2013-09-25', 11, 40, 'C11', 'S02'
var_dump($arr_resp);*/

require_once('class/Class.User.php');

if(isset($_GET['user']) && isset($_GET['pass'])){
	
	$user	=	$_GET['user'];
	$pass	=	$_GET['pass'];

	$obj_user	=	new User();
	$arr_user	=	$obj_user->list_user($user,$pass);

		$usu_id	=	$arr_user[0]['usu_id'];		
		
		$obj_user	=	new User();
		$obj_user->setUsuario($usu_id);
		
		$usu_nom		=	$obj_user->get_usu_nombre();
		$usu_app		=	$obj_user->get_usu_ape_pat();
		$usu_apm		=	$obj_user->get_usu_ape_mat();
		$usu_rol_id		=	$obj_user->get_rol_id();
		$usu_rol_des	=	$obj_user->get_rol_des();
		$get_usu_rut	=	$obj_user->get_usu_rut();
		$fun_id			=	$obj_user->get_fun_id();
		
		echo $usu_nom;
	}
else{
	echo "?user=''&pass=''";
	}
?>