<?php

/*require_once("class/Class.User.php");
$obj_game	=	new User();
$arr_games	=	$obj_game->listarEditores();
var_dump($arr_games);*/

require_once("class/Class.Comuna.php");
$obj_com	=	new Comuna();
$arr_com	=	$obj_com->list_comuna_ciudad(3);
var_dump($arr_com);

?>