<?php
require_once("class/Class.Game.php");
require_once("class/Class.Ficha.php");

$obj_game		=	new Game();
$arr_games		=	$obj_game->list_all();
$fun_id			=	$_SESSION['fun_id'];
$fun_nom		=	$_SESSION['fun_nom'];

$obj_ficha		=	new Ficha();
$arr_ficha		=	$obj_ficha->list_ficha(2,$fun_id);//1 ficha_id, 2 fun_id, 3 todos


?>

<div id="fi_left" style="overflow-y:auto;">


    <input type="hidden" id="hi_fun_id" value="<?php echo $fun_id; ?>">
        
    <div style="width:80%; margin-left:10%; color:#FFF;">
    
    	<h5>Ingreso Nueva Ficha (Mensual) </h5>
    	
        
        <div style="font-size:12px;">Nombre del Programa</div>
        <input type="text" id="ipt_nombre_programa" value="" style="width:100%">
                
        <div style="font-size:12px;">Conductor</div>
        <input type="text" id="ipt_conductor" value="<?php echo $fun_nom; ?>" style="width:100%">
                
        <div style="font-size:12px;">Bloque de Contenido</div>
        <input type="text" id="ipt_bloque_contenido" value="" style="width:100%">
                
        <div style="font-size:12px;">Numero Programa</div>
        <input type="text" id="ipt_numero_programa" value="" style="width:100%">
                
        <div style="font-size:12px;">Línea Editorial</div>
        <textarea rows="3" id="txa_editorial" style="width:100%"></textarea>
                
        <div style="font-size:12px;">Juegos a Desarrollar</div>
        <textarea rows="3" id="txa_juegos" style="width:100%"></textarea>
                
        <div style="font-size:12px;">Programa (Desarrollo)</div>
        <textarea rows="4" id="txa_programa" style="width:100%"></textarea>
        <br />
        <button id="btn_crear_ficha" style="margin-left:30%; width:40%; height:40px;">Crear Ficha</button>

    </div>
    

</div>

<div id="fi_right" style="overflow-y:scroll;">

<style>
.ficha_mensual{
	margin:20px 20px;
	background-color:#252931;
	width:620px;
	}
.ficha_mensual_left{
	width:95px;
	min-height:100px;
	float:left;
	}
.ficha_mensual_right{
	width:525px;
	float:left;
	background-color:#84868b;
	}
.ficha_mensual_title{
	height:40px;
	line-height:40px;
	background-color:#353942;
	font-size:13px;
	color:#FFF;
	}
.ficha_mensual_body{
	min-height:200px;
	padding-bottom:30px;
	/*background-color:#FC9;*/
	}
.ficha_mensual_left_box{
	width:100%;
	color:#FFF;
	text-align:center;
	margin-top:8px;
	/*background-color:#063;*/
	}
.ficha_mensual_left_box_title{
	color:#8e9095;
	font-size:14px;
	}
.ficha_mensual_left_box_value{
	font-size:28px;
	line-height:28px;
	font-family:OpenSansBold;
	}
.ficha_mensual_conductor{
	height:60px;
	margin-top:10px;
	/*background-color:#6C6;*/
	color:#FFF;
	}
.ficha_mensual_avatar{
	float:left;
	width:60px;
	height:60px;
	background-color:#933;
	margin-left:20px;
	}
.ficha_mensual_nombre{
	float:left;
	width:auto;
	margin-left:13px;
	margin-top:12px;
	line-height:20px;
	}
.ficha_mensual_nombre > span{
	font-family:OpenSansBold;
	}
.ficha_mensual_texto{
	margin:13px 20px 0px 20px;
	color:#FFF;
	font-size:13px;
	line-height:15px;
	}
.ficha_mensual_texto > span{
	font-family:OpenSansBold;
	line-height:19px;
	}
</style>
	
<?php

//print_r($arr_ficha);

if(isset($arr_ficha) && is_array($arr_ficha) && count($arr_ficha) > 0 && $arr_ficha != NULL){
	
	foreach($arr_ficha as $fic){
		
		$fic_id					=	$fic['fic_id'];					//3
		$fic_bloque				=	$fic['fic_bloque'];				//12
		$fic_conductor			=	$fic['fic_conductor'];			//Claudio Hermosilla
		$fic_editorial			=	$fic['fic_editorial'];			//linea editorial linea editorial linea editori.....
		$fic_estado				=	$fic['fic_estado'];				//aprovado, etc...
		//$fic_fun_crea			=	$fic['fic_fun_crea'];			//1
		//$fun_crea				=	$fic['fun_crea'];				//CLAUDIO HERMOSILLA DIAZ
		//$fic_fecha_crea		=	$fic['fic_fecha_crea'];			//14/01/2014
		//$fic_fun_retro		=	$fic['fic_fun_retro'];			//
		//$fun_retro			=	$fic['fun_retro'];				//
		//$fic_fecha_retro		=	$fic['fic_fecha_retro'];		//
		$fic_juego				=	$fic['fic_juego'];				//Juegos a Desarrollar Juegos a Desarrollar Juegos a Desar....
		$fic_nombre_programa	=	$fic['fic_nombre_programa'];	//El nuevo programa
		$fic_numero_programa	=	$fic['fic_numero_programa'];	//12
		//$fic_padre_id			=	$fic['fic_padre_id'];			//
		$fic_programa			=	$fic['fic_programa'];			//Programa (Desarrollo) Programa (Desarrollo) Programa (D.....
		//$fic_tfi_id			=	$fic['fic_tfi_id'];				//
		//$tfi_denominacion		=	$fic['tfi_denominacion'];		//
		
		
		
		echo "<div class='ficha_mensual'>
				
				<div class='ficha_mensual_left'>
					<div style='height:4px;'></div>
					<div class='ficha_mensual_left_box'>
						<div class='ficha_mensual_left_box_title'>Bloque</div>
						<div class='ficha_mensual_left_box_value'>".$fic_bloque."</div>
					</div>
					<div class='ficha_mensual_left_box'>
						<div class='ficha_mensual_left_box_title'>Programa</div>
						<div class='ficha_mensual_left_box_value'>".$fic_numero_programa."</div>
					</div>
				</div>
				
				<div class='ficha_mensual_right'>
					<div class='ficha_mensual_title'>
						<span style='float:left;margin-left:15px;'>".$fic_nombre_programa."</span>
						<span style='float:right; margin-right:20px; font-family:OpenSansBold; font-size:15px;'>Marzo 2014</span>
					</div>
					<div class='ficha_mensual_body'>
						<div class='ficha_mensual_conductor'>
							<div class='ficha_mensual_avatar'></div>
							<div class='ficha_mensual_nombre'>".$fic_conductor."<br /><span>{Nick del Conductor}</span></div>
						</div>
						
						<div class='ficha_mensual_texto'>
							<span>Linea Editorial</span><br />".$fic_editorial."
						</div>
						
						<div class='ficha_mensual_texto'>
							<span>Juegos a Desarrollar</span><br />".$fic_juego."
						</div>
						
						<div class='ficha_mensual_texto'>
							<span>Desarrollo del Programa</span><br />".$fic_programa."
						</div>
					</div>
				</div>
				
				<div style='clear:both;'></div>
				
			</div>";
		
		
		
		}
	}


?>    
    
    
	


</div>