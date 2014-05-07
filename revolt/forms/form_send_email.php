<style>
#div_send_email{
	width:1000px;
	height:550px;
	position:absolute;
	left:50%;
	top:50%;
	margin-left:-500px;
	margin-top:-275px;
	background-color:#40424b;
	}
.dsm_filtros{
	height:40px;
	background-color:#2f333d;
	}
.dsm_filtros_item{
	float:left;
	font-size:11px;
	color:#FFF;
	height:40px;
	line-height:40px;
	padding-left:20px;
	padding-right:20px;
	cursor:pointer;
	}
.dsm_filtros_item:active{
	background-color:#252931;
	}	
.dsm_body{
	position:absolute;
	bottom:0px;
	left:0px;
	right:0px;
	top:90px;
	}
.dsm_item_contact,.dsm_item_contact_selected{
	display:block;
	text-decoration:none;
	width:230px;
	height:54px;
	background-color:#383940;
	float:left;
	margin-left:6px;
	margin-top:6px;
	color:#FFF;
	cursor:pointer;
	}
.dsm_item_contact_selected{	background-color:#68c07a;	}

.dsm_item_pic{
	width:57px;
	height:54px;
	float:left;
	}
.dsm_item_avatar{
	width:42px;
	height:42px;
	background-size:42px 42px;
	background-color:#03F;
	float:left;
	margin-left:8px;
	margin-top:6px;
	}
.dsm_item_mask,.dsm_item_mask_selected{
	width:42px;
	height:42px;
	background-image:url(../img/sprite_item_contact.png);
	background-size:42px 84px;
	background-position:top;
	}
.dsm_item_mask_selected{
	background-position:bottom;
	}

.dsm_item_name{
	float:left;
	width:170px;
	height:16px;
	line-height:16px;
	/*background-color:#F99;*/
	color:#e6e6e6;
	font-size:13px;
	margin-top:10px;
	}
.dsm_item_cargo{
	font-family:OpenSansRegular;
	float:left;
	width:170px;
	height:16px;
	line-height:16px;
	/*background-color:#F99;*/
	font-size:13px;
	margin-top:2px;
	}

/*------------------------------*/
/*	    INPUT + SELECT FORM		*/
/*------------------------------*/

.dsm_form{
	float:left;
	width:830px;
	height:110px;
	/*background-color:#999;*/
	margin-left:85px;
	margin-top:12px;
	}
#dsm_asunto_correo{
	width:400px;
	height:30px;
	font-family:OpenSansLight;
	font-size:16px;
	background-color:#FFF;
	outline:none;
	border:none;
	padding-left:13px;
	color:#333;
	}
#dsm_mensaje_correo{
	float:left;
	width:660px;
	height:65px;
	font-family:OpenSansLight;
	font-size:16px;
	background-color:#FFF;
	outline:none;
	border:none;
	padding-left:13px;
	color:#333;
	resize:none;
	}
.dsm_form_line1{
	height:35px;
	background-color:#069;
	}
#dsm_enviar_correo{
	float:left;
	width:130px;
	height:69px;
	background-color:#68c07a;
	margin:0px 0px 0px 6px;
	background-image:url(../img/btn_icon_email.png);
	background-repeat:no-repeat;
	background-position:46px 10px;
	cursor:pointer;
	}
#dsm_enviar_correo:active{
	background-color:#509c5f;
	}
#dsm_enviar_correo > span{
	display:block;
	text-align:center;
	font-size:15px;
	color:#FFF;
	margin-top:40px;	
	}	
</style>

<?php
session_start();
include("../base.php");
require_once("../class/Class.Funcionario.php");

$modal_obj_fun	=	new Funcionario();
$modal_arr_fun	=	$modal_obj_fun->list_funcionario($_SESSION['fun_id']);

$FROM	=	$_SESSION['fun_nom'];
$EMAIL	=	$modal_arr_fun[0]["fun_correo"];//=> NULL 

?>

<div id="div_send_email">
	
    <input id="dsm_from_name" type="hidden" value="<?php echo $FROM; ?>">
	<input id="dsm_from_email" type="hidden" readonly value="<?php echo $EMAIL; ?>">
    
    <div class="form_div_header">    
    	<div class="form_div_title">Selecciona a quienes deseas enviar un e-mail</div>
        <div class="form_div_close">X</div>
	</div>
    
    <div class="dsm_filtros">
		<div class="dsm_filtros_item" id="dsm_filtro_todos" style="margin-left:345px;">SELECCIONAR TODOS</div>
		<div class="dsm_filtros_item" id="dsm_filtro_ninguno" style="margin-left:10px;">DESELECCIONAR TODOS</div>
	</div>
	
	<div class="dsm_body">
		<div class="dsm_contacts" style="margin-left:25px; margin-top:12px; height:305px;">
			<?php
            foreach($ARR_REVOLT as $arr){
				
				$ARR	=	explode(" ",$arr["NAME"]);//	=>	"Yamir Rivera Malverde",
				$NAME	=	$ARR[0]." ".$ARR[1]." ".$ARR[2][0].".";
				
				$RUT	=	$arr["RUT"];//	=>	"13212322",
				$DEP	=	$arr["DEP"];//	=>	"CEO",
				$CARGO	=	$arr["CARGO"];//	=>	"CEO",
				$EMAIL	=	$arr["EMAIL"];//	=>	"yamirr.ceo.revolt@gmail.com");
				
				//if(file_exists("../img/avatars/".$RUT.".png")){
				//		$AVATAR	=	"../img/avatars/".$RUT.".png";
				//		}
				//else{	
						$AVATAR	=	"../img/avatars/default.png";
				//		}
				
				
				
				echo "<a class='dsm_item_contact' id='item_contact_".$EMAIL."' title='".$EMAIL."'>
						<div class='dsm_item_pic'>
							<div class='dsm_item_avatar' style='background-image:url(".$AVATAR.");'>
								<div class='dsm_item_mask'></div>
							</div>
						</div>
						<div class='dsm_item_name'>".$NAME."</div>
						<div class='dsm_item_cargo'>".$CARGO."</div>
					</a>";
				
				
				}
			?>

		</div>
        <div class="dsm_form">
			<input type="text" id="dsm_asunto_correo" placeholder="Asunto" />
            <div style="clear:both; height:5px;"></div>
            <textarea id="dsm_mensaje_correo" placeholder="Mensaje"></textarea>
            <div id="dsm_enviar_correo"><span>enviar email</span></div>
		</div>
	</div>	
	
    
    
</div>