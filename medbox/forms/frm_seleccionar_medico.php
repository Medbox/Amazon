<style>
#div_seleccionar_medico{
	position:absolute;
	width:450px;
	height:450px;
	background-color:#F99;
	left:50%;
	top:40%;
	margin-left:-250px;
	margin-top:-200px;
	}
#div_seleccionar_medico_header{
	height:50px;
	line-height:50px;
	text-align:center;
	background-color:#56b589;
	color:#FFF;
	}
#div_seleccionar_medico_body{
	height:400px;
	background-color:#e8e8e8;
	}
.item_medico{
	height:70px;
	background-color:#f0f0f0;
	border-bottom:1px solid #cfcfcf;
	cursor:pointer;
	}
.item_medico:active{
	background-color:#e4e4e4;
	}
		
.item_medico_avatar{
	width:57px;
	height:57px;
	float:left;
	margin-left:20px;
	margin-top:7px;
	background-position:top;
	background-size:57px 57px;
	}
.item_medico_mask{
	width:57px;
	height:57px;
	background-image:url(../img/circle_item_medico.png);
	background-position:top;
	}
.item_medico:active > .item_medico_avatar > .item_medico_mask{
	background-position:bottom;
	}


.item_medico_name{
	font-size:21px;
	height:20px;
	line-height:20px;
	/*background-color:#06C;*/
	float:left;
	width:330px;
	margin-top:16px;
	margin-left:14px;
	color:#5f767e;
	}	
.item_medico_text{
	font-size:16px;
	height:16px;
	line-height:16px;
	/*background-color:#096;*/
	float:left;
	width:330px;
	margin-top:4px;
	margin-left:14px;
	color:#788a90;
	}
/*------------------------------*/
/*			CLOSE MODAL			*/
/*------------------------------*/

#close_modal{
	position:absolute;
	margin-left:400px;
	width:50px;
	height:50px;
	line-height:50px;
	text-align:center;
	font-size:24px;
	background-color:#468d6c;
	color:#FFF;
	cursor:pointer;
	}
#close_modal:active{
	background-color:#347356;
	}		
</style>

<div id="div_seleccionar_medico">
	
    <div id="close_modal">X</div>
	<div id="div_seleccionar_medico_header">Seleccionar Médico</div>
    <div id="div_seleccionar_medico_body">
		<?php
        require_once("../clases/beans/beans_funcionario.php");
		
		$obj_fun	=	new beans_funcionario();
		$arr_fun	=	$obj_fun->listar_funcionario(null);
		
		/*
		array(3) { 
			[0]=> array(34) { 
				["FUN_ID"]=> int(3) 
				["FUN_RUT"]=> int(15987066) 
				["FUN_DV"]=> int(9) 
				["FUN_NOMBRES"]=> string(14) "CLAUDIO ANDRES" 
				["FUN_APE_PATERNO"]=> string(10) "HERMOSILLA" 
				["FUN_APE_MATERNO"]=> string(4) "DIAZ" 
				["FUN_CAR_ID"]=> NULL 
				["CAR_DENOMINACION"]=> NULL 
				["FUN_FECHA_NAC"]=> string(10) "12/05/1985" 
				["FUN_SEX_ID"]=> int(1) 
				["FUN_DIRECCION"]=> string(15) "CALLE FALSA 123" 
				["FUN_TELEFONO"]=> NULL 
				["FUN_CELULAR"]=> NULL 
				["FUN_EMAIL"]=> NULL 
				["FUN_CON_ID"]=> int(1) 
				["CON_DENOMINACION"]=> string(2) "11" 
				["FUN_ACTIVO"]=> int(1)
				
		*/
		
		foreach($arr_fun as $fun){
            $FUN_ID		=	$fun['FUN_ID'];
			$FUN_RUT	=	$fun['FUN_RUT'];
            $FUN_MEDICO	=	ucwords(strtolower($fun['FUN_NOMBRES']." ".$fun['FUN_APE_PATERNO']." ".$fun['FUN_APE_MATERNO']));
            
			if(file_exists("../img/avatars/".$FUN_RUT.".png")){
					$FUN_AVATAR	=	"../img/avatars/".$FUN_RUT.".png";
					}
			else{	$FUN_AVATAR	=	"../img/avatars/avatar.png";
					}
					// style='background-image:url(".$FUN_AVATAR.");'	
			echo "<div id='".$FUN_ID."' class='item_medico'>
						<div class='item_medico_avatar' style='background-image:url(".$FUN_AVATAR.");'>
							<div class='item_medico_mask'></div>
						</div>
						<div class='item_medico_name'>".$FUN_MEDICO."</div>
						<div class='item_medico_text'>Descripción, Especialidad</div>					
					</div>";

            }
        ?>
		
    </div>
    
</div>