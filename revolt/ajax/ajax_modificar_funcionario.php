<?php
require_once("../class/Class.Funcionario.php");

$fun_id	=	$_GET['fun_id'];
$rut	=	$_GET['rut'];
$nac	=	$_GET['nac'];
$civil	=	$_GET['civ'];
$ocu	=	NULL;//$_GET['ocu'];
$dom	=	$_GET['dom'];
$ciudad	=	$_GET['ciudad'];
$comuna	=	$_GET['comuna'];
$email	=	$_GET['email'];
$fono	=	$_GET['fono'];
$skype	=	$_GET['skype'];
$fb		=	$_GET['fb'];

$ocupacion	=	$_GET['ocu'];


$nombre		=	NULL;
$app		=	NULL;
$apm		=	NULL;
$profesion	=	NULL;
$sex		=	NULL;

if($nac == ""){		$nac	=	NULL;	}
if($fono == ""){	$fono	=	NULL;	}
if($ciudad == ""){	$ciudad	=	NULL;	}
if($email == ""){	$email	=	NULL;	}
if($dom == ""){		$dom	=	NULL;	}
if($fb == ""){		$fb		=	NULL;	}
if($ocu == ""){		$ocu	=	NULL;	}
if($civil == ""){	$civil	=	NULL;	}
if($skype == ""){	$skype	=	NULL;	}

$obj_fun	=	new Funcionario();
$arr_resp	=	$obj_fun->add_funcionario($fun_id,$rut,$nombre,$app,$apm,$nac,$fono,$ciudad,$email,$dom,$fb,$profesion,$skype,$civil,$ocu,$sex,$ocupacion);	

//var_dump($arr_resp);

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