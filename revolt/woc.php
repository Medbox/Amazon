<?php
session_start();

require_once("class/Class.Funcionario.php");
require_once("class/Class.Contrato.php");

$fun_id		=	$_SESSION['fun_id'];
$obj_fun	=	new Funcionario();
$arr_fun	=	$obj_fun->list_funcionario($fun_id);

if(count($arr_fun) != 1){
	
	header("Location: index.php");
	
	}

?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>.: Contrato Revolt :.</title>


<link href="css/fonts.css"	rel="stylesheet" type="text/css">
<style>
html,body{
	margin:0;
	padding:0;
	background-color:#2c3439;
	}
.ctr_wrap{
	position:absolute;
	width:500px;
	height:400px;
	left:50%;
	top:50%;
	margin-left:-250px;
	margin-top:-200px;	
	background-color:#f4f5f6;
	/*border-left:1px solid #e3e3e3;
	border-right:1px solid #e3e3e3;*/
	}
.ctr_header{
	height:100px;
	background-color:#3d484f;
	}
.ctr_header_logo{
	text-align:center;
	}
.ctr_header_title{
	text-align:center;
	font-family:Impregnable;
	font-size:2.6em;
	color:#FFF;
	}
.ctr_body{
	margin-top:35px;
	font-family:OpenSansLight;
	font-size:1em;
	color:#323232;
	width:84%;
	margin-left:8%;
	text-align:justify;
	}


/*-----------------------------------------*/

#btn_home{
	float:left;
	font-family:OpenSansLight;
	width:200px;
	height:69px;
	margin:0px 0px 0px 10px;
	background-image:url(../img/btn_icon_home.png);
	background-repeat:no-repeat;
	background-color:#68c07a;
	background-position:85px 10px;
	cursor:pointer;
	}
#btn_home:active{
	background-color:#509c5f;
	}
#btn_home > span{
	display:block;
	text-align:center;
	font-size:14px;
	color:#FFF;
	margin-top:41px;	
	}
</style>
</head>
<body>

<div class="ctr_wrap">

	<div class="ctr_header">
    	<div style="height:13px;"></div>
    	<div class="ctr_header_logo"><img src="img/login_logo.png" width="280" height="80"  alt=""/></div>
    </div>
    
    <div class="ctr_body">
    	<div>
        	Hola, bienvenido a Revolt :D, probablemente tu contrato está siendo creado o modificado, te pedimos que tengas un poquito de paciencia que cuando este listo te notificaremos.<br><br> Atte.<br>Revolt Games Ltda.
        </div>
		<div style="clear:both; height:18px;"></div>
        <div id='btn_home' style='margin-left:110px;'><span>Volver al Inicio</span></div>
    </div>

</div>

<script src="plugins/jquery-ui/jquery-1.9.1.js"></script>
<script>
$(document).ready(function(e) {
    $("#btn_home").click(function(){
		window.location	=	"index.php";
		});
});
</script>

</body>
</html>