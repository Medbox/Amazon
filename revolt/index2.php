<?php
include("session.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>.: Revolt :.</title>

<link href="css/main.css"			rel="stylesheet" type="text/css">
<link href="css/fonts.css" 			rel="stylesheet" type="text/css">
<link href="css/modal.css" 			rel="stylesheet" type="text/css">
<link href="css/perfil.css"			rel="stylesheet" type="text/css">
<link href="css/fichas.css"			rel="stylesheet" type="text/css">
<link href="css/programacion.css"	rel="stylesheet" type="text/css">
<link href="css/horario.css"		rel="stylesheet" type="text/css">

<link rel="image_src"	type="image/png"	href="img/logo.png" />
<link rel="icon" 		type="image/png"	href="img/logo_icon.png">

<link rel="stylesheet" type="text/css" href="plugins/jquery-ui/themes/base/jquery-ui.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/jquery-chat/css/estilo.css">

</head>
<body>
<style>
html,body{
	background-color:#5c606b;
	}
menu{
	margin:0;
	padding:0;
	display:block;
	}	
/*------------------------------*/
/*			  HEADER			*/
/*------------------------------*/	
	
header{
	height:55px;
	background-color:#252931;
	}
#header_logo{
	float:left;
	}
#header_avatar{
	float:right;
	height:45px;
	width:45px;
	/*background-color:#666;*/
	margin-top:5px;
	margin-right:1px;
	margin-left:20px;
	}
#header_avatar > img{
	-webkit-clip-path: rectangle(0px, 0px, 45px, 45px, 45px, 45px);
	}
#header_user{
	float:right;
	height:45px;
	/*background-color:#666;*/
	margin-top:5px;
	margin-right:10px;
	padding-right:20px;
	padding-left:5px;
	color:#FFF;
	}
#header_user_name{
	font-size:14px;
	margin-top:6px;
	height:18px;
	}
#header_user_rol{
	font-size:12px;
	}

/*------------------------------*/
/*			   MENU				*/
/*------------------------------*/

menu{
	position:absolute;
	width:100px;
	top:55px;
	left:0px;
	bottom:0px;
	background-color:#363a45;
	}
.menu_item{
	width:100px;
	height:80px;
	background-color:#363a45;
	cursor:pointer;
	}
.menu_item:active{
	background-color:#2f323d;
	}
.menu_item_selected{
	width:100px;
	height:80px;
	background-color:#4591df;
	}
.menu_item_icon{
	float:left;
	width:32px;
	height:32px;
	margin:18px 0px 5px 34px;
	background-image:url(img/menu_icons.png);
	}
.menu_item_text{
	clear:left;
	width:100%;
	margin-top:5px;
	height:13px;
	line-height:13px;
	text-align:center;	
	font-size:12px;
	color:#FFF;
	}

#menu_perfil{		background-position:0px 0px;	}
#menu_horario{		background-position:0px -64px;	}
#menu_programacion{	background-position:0px -64px;	}
#menu_edicion{		background-position:0px -96px;	}
#menu_fichas{		background-position:0px -128px;	}
#menu_documentos{	background-position:0px -160px;	}

	
/*------------------------------*/
/*			   MENU				*/
/*------------------------------*/

section{
	position:absolute;
	top:55px;
	left:100px;
	right:0px;
	bottom:0px;
	background-color:#5c606b;
	}


/*------------------------------*/
/*			 PROFILE			*/
/*------------------------------*/

.header_profile{
	float:right;
	height:55px;
	background-color:#2a2f37;
	cursor:pointer;
	padding-left:5px;
	color:#FFF;
	border-left:1px solid #23272f;
	}
.header_profile:active{
	background-color:#1f2229;
	}


/*------------------------------*/
/*			 PROFILE			*/
/*------------------------------*/

.top_menu{
	float:right;
	display:block;
	width:70px;
	height:55px;
	background-color:#2a2f37;
	border-left:1px solid #23272f;
	cursor:pointer;
	background-repeat:no-repeat;
	}
.top_menu:active{
	background-color:#1f2229;
	}
#top_menu_email{
	background-image:url(img/top_menu_email.png);
	background-position:18px 12px;
	}
#top_menu_contrato{
	background-image:url(img/top_menu_contrato.png);
	background-position:18px 12px;
	}


/*------------------------------*/
/*			CLOSE MODAL			*/
/*------------------------------*/

.form_div_close{
	float:right;
	width:60px;
	height:50px;
	line-height:50px;
	text-align:center;
	font-size:20px;
	background-color:#da6757;
	color:#FFF;
	cursor:pointer;
	}
.form_div_close:active{
	background-color:#b85345;
	}

/*------------------------------*/
/*		  HEADER MODAL			*/
/*------------------------------*/

.form_div_header{
	background-color:#222830;
	height:50px;
	color:#FFF;
	}
.form_div_title{
	height:50px;
	float:left;
	line-height:50px;
	margin-left:30px;
	}

</style>


<?php

require_once("class/Class.Funcionario.php");

$usu_id		=	$_SESSION['usu_id'];
$usu_nom	=	$_SESSION['usu_nom'];
$usu_rut	=	$_SESSION['usu_rut'];
$usu_rol	=	$_SESSION['rol_des'];
$fun_id		=	$_SESSION['fun_id'];
$fun_nom	=	$_SESSION['fun_nom'];

$obj_fun	=	new Funcionario();
$arr_fun    =   $obj_fun->trae_estado_fun($fun_id);

$con_id 	=   $arr_fun[0]['fun_con_id'];
$con_des 	=   $arr_fun[0]['tco_denominacion'];

$menu	=	"m2";

if(isset($_GET['m']) && $_GET['m'] != ""){
	$menu	=	$_GET['m'];
	}

?>

<!-------------------------------------------------------->
<!--				  TEMPLATE WAIT						-->
<!-------------------------------------------------------->

<div id="overlay">
	<div id="overlay_box">Wait :D</div>
</div>

<!-------------------------------------------------------->
<!--				TEMPLATE NEW BLOCK					-->
<!-------------------------------------------------------->

<div id="tpl_new_block" class="tpl_overlay">
    <input type="hidden" id="nb_date" value="">
	<div id="tpl_new_block_box" class="tpl_new_block_inactive"></div>
</div>

<!-------------------------------------------------------->
<!--				TEMPLATE EDIT BLOCK					-->
<!-------------------------------------------------------->

<div id="tpl_edit_block" class="tpl_overlay">
	<div id="tpl_edit_block_box" class="tpl_edit_block_inactive"></div>
</div>


<!-------------------------------------------------------->
<!--				  TEMPLATE MODAL					-->
<!-------------------------------------------------------->

<div id="modal_loader">Cargando...</div>
<div id="modal"></div>

<!-------------------------------------------------------->



<header>
	
    <input type="hidden" id="hi_menu" 		value="<?php echo $menu; ?>">
    <input type='hidden' id='hi_fun_id' 	value="<?php echo $fun_id; ?>">
    <input type="hidden" id="hi_con_id" 	value="<?php echo $con_id; ?>">
    <input type="hidden" id="hi_con_des" 	value="<?php echo $con_des; ?>">
    
    <input type='hidden' id='hi_fun_nom' 	value="<?php echo $fun_nom; ?>">
    <input type='hidden' id='hi_in_chat' 	value="0">
    
    
	<img id="header_logo" src="img/index_logo.png" width="170" height="55">
    
    <div class="header_profile">      
        <div id="header_user">
            <div id="header_user_name"><?php echo $usu_nom; ?></div>
            <div id="header_user_rol"><?php echo $usu_rol; ?></div>
        </div>
        <?php
        $img_default	=	"img/avatars/default.png";
        $img_rut		=	"img/avatars/".$usu_rut.".png";
        $img_file		=	file_exists($img_rut) ? $img_rut : $img_default;
        ?>    
        <div id="header_avatar"><img src="<?php echo $img_file; ?>" width="45" height="45"></div>
    </div>
    
    <a href="#" title="Correos" class='top_menu' id='top_menu_email'></a> 
    <a href="#" title="Contrato" class='top_menu' id='top_menu_contrato'></a> 
    
    
</header>

<menu>
    
    <?php
	
	$m2_class	=	"menu_item_selected";
	$m3_class	=	"menu_item";
	$m4_class	=	"menu_item";
	$m5_class	=	"menu_item";
	$m6_class	=	"menu_item";
	$m7_class	=	"menu_item";
	$include	=	"menu_perfil.php";
	
    switch($menu){
		case "m2":	$include	=	"menu_perfil.php";
					break;
		case "m3":	$m2_class	=	"menu_item";
					$m3_class	=	"menu_item_selected";
					$include	=	"menu_programacion.php";
					break;
		case "m4":	$m2_class	=	"menu_item";
					$m4_class	=	"menu_item_selected";
					$include	=	"menu_edicion.php";
					break;
		case "m5":	$m2_class	=	"menu_item";
					$m5_class	=	"menu_item_selected";
					$include	=	"menu_fichas.php";
					break;
		case "m6":	$m2_class	=	"menu_item";
					$m6_class	=	"menu_item_selected";
					$include	=	"menu_documentos.php";
					break;
		case "m7":	$m2_class	=	"menu_item";
					$m7_class	=	"menu_item_selected";
					$include	=	"menu_horario.php";
					break;
		default:	$include	=	"menu_perfil.php";
		}
	?>
    
    <div class="<?php echo $m2_class; ?>" id="m2">
    	<div class="menu_item_icon" id="menu_perfil"></div>
        <div class="menu_item_text">Mis Datos</div>
	</div>
    <div class="<?php echo $m7_class; ?>" id="m7">
    	<div class="menu_item_icon" id="menu_horario"></div>
        <div class="menu_item_text">Horario</div>
	</div>
    <!--<div class="<?php echo $m6_class; ?>" id="m6">
    	<div class="menu_item_icon" id="menu_documentos"></div>
        <div class="menu_item_text">Documentos</div>
	</div>
    <div class="<?php echo $m3_class; ?>" id="m3">
    	<div class="menu_item_icon" id="menu_programacion"></div>
        <div class="menu_item_text">Programacion</div>
	</div>
    <div class="<?php echo $m4_class; ?>" id="m4">
    	<div class="menu_item_icon" id="menu_edicion"></div>
        <div class="menu_item_text">Edicion</div>
	</div>-->
    <div class="<?php echo $m5_class; ?>" id="m5">
    	<div class="menu_item_icon" id="menu_fichas"></div>
        <div class="menu_item_text">Fichas</div>
	</div>

</menu>

<section>
<?php
include($include);
?>
</section>




<!-------------------------------------------------------------------------------------->
<!------------   					SECCION CHAT   						---------------->
<!-------------------------------------------------------------------------------------->

<div id="chat">
	<div class="title" id="min">
		<span>Intranet Chat</span>
		<!--<div id="exit"><img src="plugins/jquery-chat/images/minimiza.png"></div>-->
	</div>
	<div id="chatbox"></div>
	<div class="text">
		<form id="message" name="message" action="">
			<input type="text" id="sendchat" value="" placeholder="Ingrese texto..." required autocomplete="off">
		</form>
	</div>
</div>

<audio id="audio">
	<source src="plugins/jquery-chat/sonidos/sonido_notificacion.wav" type="audio/wav">
	<source src="plugins/jquery-chat/sonidos/sonido_notificacion.ogg" type="audio/ogg">
	<source src="plugins/jquery-chat/sonidos/sonido_notificacion.mp3" type="audio/mpeg">
</audio>

<!--
FORM PARA LOGUEARSE / NO SE NECESARIO, PERO SI SE USARA PARA ENTRAR A LA SALA
<div id="loginform">
	<form action="" method="post" id="nick">
        <p id="cerrar">X</p>
        <p>Ingresa tu nick para continuar:</p>
        <input type="text" name="name" id="name" class="inputext" placeholder="Ingrese nick..." autocomplete="off">
        <input type="submit" name="enter" id="enter" class="input" value="Entrar">
    </form>
</div>-->

<!--DIV INFERIOR QUE SIMULA LA SALA DE CHAT MINIMIZADA-->
<div id="minichat">Intranet Chat<img src="plugins/jquery-chat/images/mensaje.png"></div>

<!-------------------------------------------------------------------------------------->







<script type="text/javascript" src="plugins/jquery-ui/jquery-1.9.1.js"></script>
<script type="text/javascript" src="plugins/jquery-ui/ui/jquery-ui.js"></script>
<script type="text/javascript" src="plugins/jquery-ui/ui/i18n/jquery.ui.datepicker-es.js"></script>
<!-- CHAT REVOLT -->
<script type="text/javascript" src="plugins/jquery-chat/js/chat.js"></script>
<script type="text/javascript" src="plugins/jquery-chat/js/jquery.slimscroll.min.js"></script>
<!----------------->
<script>
$(document).ready(function(e) {
    
	loader("out");
	
	$(".menu_item").click(function(){
		var menu	=	this.id;		
		$(this).removeClass("menu_item").addClass("menu_item_selected").siblings().removeClass("menu_item_selected").addClass("menu_item");
		loader("in");
		document.location.href	=	"?m="+menu;
		});
	
	
	//MONTHPICKER
	$("#datepicker").datepicker({
			selectWeek:true,
			closeOnSelect:false,
			onSelect:function(date){
				var menu	=	$("#hi_menu").val();
				document.location.href = "?m="+menu+"&fecha="+date;
				}
			});
	
			
	$("#select_game").change(function(){
		var option	=	this.value;

		if(option == ""){
				$(".column_block").css({ opacity: 1 });
				}
		else{	$(".column_block").css({ opacity: 1 });
				$(".column_block").not("."+option).css({ opacity: 0.3 });
				}
		
		});		
	//end monthpicker
	
	
	//CLICK EN NEW BLOCK
	$("section").on("click",".column_day_title_add",function(e){
		var date_dump	=	this.id;
		create_new_block(date_dump);		
		});
	//CLICK EN EDIT BLOCK
	$("a[class*='column_block']").click(function(){
		var blk_id	=	this.id;
		edit_block(blk_id);
		});
	//CLICK CERRAR MODAL	
	$(".tpl_overlay").on("click","#tpl_new_block_close,#tpl_edit_block_close",function(e){		
		close_modal();
		});
	
	//ACTION NEW BLOCK
	$(".tpl_overlay").on("click","#btn_crear_bloque",function(e){	
		action_create_new_block();		
		});
	//ACTION DELETE BLOCK
	$(".tpl_overlay").on("click","#btn_eliminar_bloque",function(e){		
		var block_id	=	$("#nb_block_id").val();
		action_delete_block(block_id);
		});
	
	//CLICK EDIT BLOCK
	$(".tpl_overlay").on("click","#btn_modificar_bloque",function(e){		
		//activando los selects
		$("#nb_game").prop("disabled",false);
		$("#nb_section").prop("disabled",false);
		$("#nb_editor").prop("disabled",false);
		$("#nb_interludio").prop("disabled",false);
		//cambiando botones
		$("#btn_modificar_bloque,#btn_eliminar_bloque").fadeOut("fast");
		$("#btn_cancelar_bloque,#btn_guardar_bloque").fadeIn("fast");
		
		});
		
	//CLICK CANCEL BLOCK
	$(".tpl_overlay").on("click","#btn_cancelar_bloque",function(e){		
		//activando los selects
		$("#nb_game").prop("disabled",true);
		$("#nb_section").prop("disabled",true);
		$("#nb_editor").prop("disabled",true);
		$("#nb_interludio").prop("disabled",true);
		//cambiando botones
		$("#btn_modificar_bloque,#btn_eliminar_bloque").fadeIn("fast");
		$("#btn_cancelar_bloque,#btn_guardar_bloque").fadeOut("fast");
		});
		
	//ACTION EDIT BLOCK
	$(".tpl_overlay").on("click","#btn_guardar_bloque",function(e){		
		action_save_block();
		});
	
	//ACTION EDIT BLOCK
	$(".tpl_overlay").on("change","#nb_game",function(e){		
		var game	=	this.value;
		$("#tpl_avatar").removeClass().addClass("GAME_"+game);
		});
	
	
	
	//MENU PERFIL
	$("section").on("click","#btn_modificar_perfil",function(e){
		
		$("input[id^='dd_']").prop("disabled",false);
		$("select[id^='dd_']").prop("disabled",false);
		$("#btn_cancelar_perfil").fadeIn("fast");
		$("#btn_guardar_perfil").fadeIn("fast");
		$("#btn_modificar_perfil").fadeOut("fast");
		
		});
	$("section").on("click","#btn_cancelar_perfil",function(e){
		
		$("input[id^='dd_']").prop("disabled",true);
		$("select[id^='dd_']").prop("disabled",true);
		$("#btn_cancelar_perfil").fadeOut("fast");
		$("#btn_guardar_perfil").fadeOut("fast");
		$("#btn_modificar_perfil").fadeIn("fast");
		
		});
	
	
	//MODIFICAR DATOS FUNCIONARIO
	$("section").on("click","#btn_guardar_funcionario",function(e){
		
		var fun_id	=	$("#hi_fun_id").val();
		var rut		=	$("#df_rut").val();
		var nac		=	$("#df_fecha_nacimiento").val();
		var civ		=	$("#df_civil").val();
		var ocu		=	$("#df_ocupacion").val();
		var dom		=	$("#df_domicilio").val();		
		var ciudad	=	$("#df_ciudad").val();
		var comuna	=	$("#df_comuna").val();
		var email	=	$("#df_email").val();		
		var fono	=	$("#df_telefono").val();		
		var skype	=	$("#df_skype").val();
		var fb		=	$("#df_facebook").val();
		
		var mod_url	=	"fun_id="+fun_id;
			mod_url	+=	"&rut="+rut;
			mod_url	+=	"&nac="+nac;
			mod_url	+=	"&civ="+civ;			
			mod_url	+=	"&ocu="+ocu;
			mod_url	+=	"&dom="+dom;
			mod_url	+=	"&ciudad="+ciudad+"&comuna="+comuna;
			mod_url	+=	"&email="+email;
			mod_url	+=	"&fono="+fono;
			mod_url	+=	"&skype="+skype+"&fb="+fb;

		
		//alert(mod_url);
		
		if(fun_id != ""){

			$.ajax({	
				url		:	"ajax/ajax_modificar_funcionario.php",
				type	:	"GET",
				data	:	mod_url,
				success	:	function(data){
							
							console.log(data);

							var resp	=	data.split("|");
							var status	=	resp[0];
							var msg		=	resp[1];
							
							if(status == "OK"){
								alert("DATOS MODIFICADOS");
								location.reload();
								}
							else if(status == "ERROR"){
								alert(msg);
								}
							else{
								alert(data);
								}
							}
				});
		}			
			
		/*
		$("input[id^='dd_']").prop("disabled",true);
		$("select[id^='dd_']").prop("disabled",true);
		$("#btn_cancelar_perfil").fadeOut("fast");
		$("#btn_guardar_perfil").fadeOut("fast");
		$("#btn_modificar_perfil").fadeIn("fast");
		*/
		});
	
	
	
	//DATEPICKER	
	$("#df_fecha_nacimiento").datepicker({
		  changeMonth: true,
		  changeYear: true,
		  yearRange: '1980:2000'
		});
	
	
	
	
	
	//-------------------------------------------------------------------
	//					FUNCIONES DE ENVIO DE CORREO
	//-------------------------------------------------------------------
	
	//SELECCIONAR CONTACTO
	$("#modal").on("click",".dsm_item_contact",function(e){
		var item_email	=	this.id;//item_contact_
		marcar_email(item_email);
		});
	//DESELECIONAR CONTACTO
	$("#modal").on("click",".dsm_item_contact_selected",function(e){
		var item_email	=	this.id;//item_contact_
		desmarcar_email(item_email);
		});
	//SELECCIONAR TODOS LOS CONTACTOS
	$("#modal").on("click","#dsm_filtro_todos",function(e){
		$("a[id^='item_contact_']").removeClass("dsm_item_contact").addClass("dsm_item_contact_selected")
		.find(".dsm_item_mask").removeClass("dsm_item_mask").addClass("dsm_item_mask_selected");
		});
	//DESELECCIONAR TODOS LOS CONTACTOS
	$("#modal").on("click","#dsm_filtro_ninguno",function(e){
		$("a[id^='item_contact_']").removeClass("dsm_item_contact_selected").addClass("dsm_item_contact")
		.find(".dsm_item_mask_selected").removeClass("dsm_item_mask_selected").addClass("dsm_item_mask");
		});
	
	
	//CLICK ENVIAR CORREO
	$("#modal").on("click","#dsm_enviar_correo",function(e){
		
		var destino = [];
		$(".dsm_item_contact_selected").each(function(index, element) {
			var arr	=	(this.id).split("_");
			destino.push(arr[2]);
        	});
			
		var from_email	=	$("#dsm_from_email").val();
		var from_name	=	$("#dsm_from_name").val();
		var to_emails	=	destino.join(",");
		var email_sub	=	$.trim($("#dsm_asunto_correo").val());
		var email_msg	=	$.trim($("#dsm_mensaje_correo").val());
		var email_flag	=	true;
		
		if(from_email == ""){
			alert("No se ha configurado email de emisor");
			email_flag	=	false;
			}
		if(to_emails == "" && email_flag == true){
			alert("no ha seleccionado destinatarios");
			email_flag 	=	false;
			}
		if(email_msg == "" && email_flag == true){
			alert("no ha escrito mensaje");
			email_flag	=	false;
			}
		
		if(email_flag == true){

			var email_url	=	"from_email="+from_email;
				email_url	+=	"&from_name="+from_name;
				email_url	+=	"&to_emails="+to_emails;
				email_url	+=	"&email_sub="+email_sub;
				email_url	+=	"&email_msg="+email_msg;

			//alert(email_url);
			loader("in");
			$.ajax({	
				url		:	"ajax/ajax_enviar_correo.php",
				type	:	"POST",
				data	:	email_url,
				success	:	function(data){
							
							console.log(data);
							var resp	=	data.split("|");
							var status	=	resp[0];
							var msg		=	resp[1];
							
							if(status == "OK"){
								alert("CORREO ENVIADO");
								location.reload();
								}
							else if(status == "ERROR"){
								alert(msg);
								}
							else{
								alert(data);
								}
							}
				});
			}
		
		});
	
	
	
	
	
	
	
	
	
	
		
	//CERRAR CC MODAL
	$("#modal").on("click",".form_div_close",function(e){
		//alert("hola");
		close_cc_modal();
		});
	
	
	//CLICK ENVIAR CORREO
	$("section").on("click","#btn_enviar_correo",function(e){
		
		var destino = [];
		$(".check_mail:checked").each(function(index, element) {
			destino.push(this.id);
        	});
			
		var from_email	=	$("#hi_from_email").val();
		var from_name	=	$("#hi_from_name").val();
		var to_emails	=	destino.join(",");
		var email_sub	=	$.trim($("#ipt_asunto_correo").val());
		var email_msg	=	$.trim($("#txt_mensaje_correo").val());
		var email_flag	=	true;
		
		if(from_email == ""){
			alert("No se ha configurado email de emisor");
			email_flag	=	false;
			}
		if(to_emails == "" && email_flag == true){
			alert("no ha seleccionado destinatarios");
			email_flag 	=	false;
			}
		if(email_msg == "" && email_flag == true){
			alert("no ha escrito mensaje");
			email_flag	=	false;
			}
		
		if(email_flag == true){
			//alert("GOGO EMAIL");
			var email_url	=	"from_email="+from_email;
				email_url	+=	"&from_name="+from_name;
				email_url	+=	"&to_emails="+to_emails;
				email_url	+=	"&email_sub="+email_sub;
				email_url	+=	"&email_msg="+email_msg;
			
			loader("in");
			$.ajax({	
				url		:	"ajax/ajax_enviar_correo.php",
				type	:	"POST",
				data	:	email_url,
				success	:	function(data){
							
							console.log(data);
							var resp	=	data.split("|");
							var status	=	resp[0];
							var msg		=	resp[1];
							
							if(status == "OK"){
								alert("CORREO ENVIADO");
								location.reload();
								}
							else if(status == "ERROR"){
								alert(msg);
								}
							else{
								alert(data);
								}
							}
				});
			}
		
		});
	
	//CLICK CREAR FICHA
	$("section").on("click","#btn_crear_ficha",function(e){
		
		var fun_id		=	$("#hi_fun_id").val();
		var conductor	=	$("#ipt_conductor").val();
		var game		=	$("#select_game").val();
		var editorial	=	$("#ipt_editorial").val();
		var video		=	$("#ipt_video").val();
		var flag		=	true;
		
		if(fun_id == ""){						alert("NO_SESSION");			flag = false;	}
		if(conductor == "" && flag == true){	alert("falta conductor");		flag = false;	}
		if(game == "" && flag == true){			alert("falta juego/seccion");	flag = false;	}
		if(editorial == "" && flag == true){	alert("falta editorial");		flag = false;	}
		if(video == "" && flag == true){		alert("falta video");			flag = false;	}
		
		
		if(flag == true){			
			
			var url_get	=	"fun_id="+fun_id;
				url_get	+=	"&conductor="+conductor;
				url_get	+=	"&game="+game;
				url_get	+=	"&editorial="+editorial;
				url_get	+=	"&video="+video;
			
			alert(url_get);
			
			$.ajax({	
				url		:	"ajax/ajax_crear_ficha.php",
				type	:	"GET",
				data	:	url_get,
				success	:	function(data){
							
							console.log(data);

							var resp	=	data.split("|");
							var status	=	resp[0];
							var msg		=	resp[1];
							
							if(status == "OK"){
								alert("FICHA REGISTRADA");
								location.reload();
								}
							else if(status == "ERROR"){
								alert(msg);
								}
							else{
								alert(data);
								}
							}
				});
			
			}
		
		});
	

	//CLICK LOGOUT
	$(".header_profile").click(function(e){
		cc_modal("logout.php");
		});
	//CLICK EMAIL
	$("#top_menu_email").click(function(e){
		cc_modal("forms/form_send_email.php");
		});
	//CLICK EMAIL
	$("#top_menu_contrato").click(function(e){
		
		var fun_id		=	$("#hi_fun_id").val();
		var con_id		=	$("#hi_con_id").val();
		var con_des		=	$("#hi_con_des").val();		
		
		if(con_id == ""){
			if(fun_id == 20){
				cc_modal("elegir_contrato.php");
				}
			else{
				window.location	=	"woc.php";
				}
			}
		else{
			window.location	=	"docs/contrato_web_"+con_des+".php?con_id="+con_id;
			}
		
		});	
	
	
	//CANCELAR LOGOUT
	$("#modal").on("click","#btn_cancelar_logout",function(e){
		$(this).parent().fadeOut("fast",null,function(){
			$("#modal").fadeOut("fast",null,function(){
				$(this).html("");
				});
			});
		});
	
	
		
	//CLICK LOGOUT
	$("#modal").on("click","#btn_logout",function(e){
		$(this).parent().fadeOut("fast",null,function(){
			document.location.href	=	"login.php";
			});
		});
	
	
	//HORARIOS
	$("section").on("click",".item_week",function(e){
		var menu	=	$("#hi_menu").val();
		var arr		=	(this.id).split("_");
		var week	=	arr[2];
		loader("in");
		document.location.href	=	"index.php?m="+menu+"&w="+week;
		});
	
	
	//ELEGIR CONTRATO
	$("#modal").on("click",".btn_contrato",function(e){
		
		var this_id		=	(this.id).split("_");
		var this_cod	=	(this.id).split("|");
		var con_id		=	this_id[3];
		var con_cod		=	this_cod[1];
		$(this).removeClass("btn_contrato").addClass("btn_contrato_selected")
		.siblings("div[id^='btn_elige_contrato_']").removeClass("btn_contrato_selected").addClass("btn_contrato");
		$("#hi_elige_con_id").val(con_id);
		$("#hi_elige_con_cod").val(con_cod);
		
		});
		
	//GENERAR CONTRATO
	$("#modal").on("click","#btn_generar_contrato",function(e){
		
		var con_id		=	$("#hi_elige_con_id").val();
		var rut			=	$("#df_rut").val();
		var civil		=	$("#df_civil").val();
		var ocupacion	=	$("#df_ocupacion").val();
		var domicilio	=	$("#df_domicilio").val();
		var ciudad		=	$("#df_ciudad").val();
		var flag		=	true;
		
		if(con_id == ""){
			alert("No has seleccionado el contrato a generar");
			flag = false;
			}
		/*if((rut == "" || civil == "" || ocupacion == "" || domicilio == "" || ciudad == "") && flag == true){
			alert("Debes completar tus datos para poder generar tu contrato");
			flag = false;
			}*/
		
		$.ajax({
				url		:	"ajax/ajax_seleccionar_contrato.php",
				type	:	"GET",
				data	:	"con_id="+con_id,
				success	:	function(data){
							
							console.log(data);
														
							var resp	=	data.split("|");
							var status	=	resp[0];
							var msg		=	resp[1];
							
							if(status == "OK"){
								alert("CONTRATO GENERADO");
								location.reload();
								}
							else if(status == "ERROR"){
								alert(msg);
								}
							else{
								alert(data);
								}
							}
				});
		
		
		});
	
	//MODIFICAR DATOS FUNCIONARIO
	$("section").on("click","#btn_editar_funcionario",function(e){
		
		$("#btn_editar_funcionario").fadeOut("fast");
		$("#btn_guardar_funcionario,#btn_cancelar_funcionario").fadeIn("fast");
		activar_inputs_funcionario();
		});
	//CANCELAR DATOS FUNCIONARIO
	$("section").on("click","#btn_cancelar_funcionario",function(e){

		$("#btn_editar_funcionario").fadeIn("fast");
		$("#btn_guardar_funcionario,#btn_cancelar_funcionario").fadeOut("fast");
		desactivar_inputs_funcionario();
		});
	
	
	
	//ALGUNAS FUNCIONES PARA EL MENU DE HORARIO
	
	$("#select_program").change(function(){
		
		var option	=	this.value;
		//alert(option);
		if(option == ""){
				$("div[class*='program_id_']").css({ opacity: 1 });
				}
		else{	$("div[class*='program_id_']").css({ opacity: 0.1 });
				$(".program_id_"+option).css({ opacity: 1 });
				}
		
		});	
	
	
	$("#mas_juegos").click(function(){
            //var game = $("#select_game > option").attr('name');
            var id = $("#select_game").attr('id');
            
            
            alert(id);
        });
	
	
	
	//SCROLL PARA SALA DE CHAT
	$('#chatbox').slimScroll({
			height: '230px',
			size: '10px',
			position: 'right',
			color: '#fff',
			alwaysVisible: true,
			railVisible: true,
			railColor: 'rgba(160,11,15,1)',
			railOpacity: 1,
			allowPageScroll: false,
			wheelStep: 1,
			start: 'bottom'
	});
	
	//CARGAR CHAT CADA 0.5 SEGUNDOS
	//setInterval (loadLog, 500);
	
});


//-----------------------------------
// 			END READY
//-----------------------------------




function loadLog(){		
	
	$.ajax({
		url: "plugins/jquery-chat/chat.html",
		cache: false,
		success: function(html){	
				$("#chatbox").html(html);
				$("#chatbox").slimScroll({ start: 'bottom' });
				//nose para que sirve esto
				//if(length < html.length){
					//length=html.length;
					//$("#minichat img").stop().css({"display":"inherit"}).animate({width:"4.5%"},200).animate({width:"5%"},200);
					//$('#audio')[0].play();
					//}		
				}
        });
	}





function loader(action){
	if(action == "in"){
		$("#overlay").fadeIn("fast");
		}
	else{
		$("#overlay").fadeOut("fast");
		}
	}
function create_new_block(date_dump){	
	$("#nb_date").val(date_dump);
	$("#tpl_new_block").fadeIn("fast");
	$("#tpl_new_block_box").load("forms/form_new_block.php").removeClass("tpl_new_block_inactive").addClass("tpl_new_block_active");
	}
function edit_block(blk_id){
	$("#tpl_edit_block").fadeIn("fast");
	$("#tpl_edit_block_box").load("forms/form_edit_block.php?blk_id="+blk_id).removeClass("tpl_edit_block_inactive").addClass("tpl_edit_block_active");
	}
function close_modal(){	
	$("#nb_date").val("");
	$("#tpl_new_block_box").removeClass("tpl_new_block_active").addClass("tpl_new_block_inactive");
	$("#tpl_edit_block_box").removeClass("tpl_edit_block_active").addClass("tpl_edit_block_inactive");
	$("#tpl_new_block,#tpl_edit_block").fadeOut("fast");
	}






//ACTIONS

function action_create_new_block(){
	
	var nb_block		=	$("#nb_block").val();
	var nb_minutes		=	$("#nb_minutes").val();
	var nb_date			=	$("#nb_date").val();
	var nb_game			=	$("#nb_game").val();
	var nb_section		=	$("#nb_section").val();
	var nb_editor		=	$("#nb_editor").val();
	var nb_interludio	=	$("#nb_interludio").val();
	
	var nb_url		=	"nb_block="+nb_block;
		nb_url		+=	"&nb_minutes="+nb_minutes;
		nb_url		+=	"&nb_game="+nb_game;
		nb_url		+=	"&nb_section="+nb_section;
		nb_url		+=	"&nb_date="+nb_date;
		nb_url		+=	"&nb_editor="+nb_editor;
		nb_url		+=	"&nb_interludio="+nb_interludio;
			
	if(nb_block != "" && nb_minutes != "" && nb_date != ""){
		
		//alert(nb_url);	
		$.ajax({
				url		:	"ajax/ajax_crear_bloque.php",
				type	:	"GET",
				data	:	nb_url,
				success	:	function(data){
							
							console.log(data);
							
							var resp	=	data.split("|");
							var status	=	resp[0];
							var msg		=	resp[1];
							
							if(status == "OK"){
								alert("BLOQUE CREADO");
								location.reload();
								}
							else if(status == "ERROR"){
								alert(msg);
								}
							else{
								alert(data);
								}
							}
				});
		}
	else{
		alert("Faltan Datos");
		}
	}
function action_save_block(){
	
	var blk_id			=	$("#nb_block_id").val();
	var nb_game			=	$("#nb_game").val();
	var nb_section		=	$("#nb_section").val();
	var nb_editor		=	$("#nb_editor").val();
	var nb_interludio	=	$("#nb_interludio").val();
	
	var edit_url	=	"blk_id="+blk_id;
		edit_url	+=	"&nb_game="+nb_game;
		edit_url	+=	"&nb_section="+nb_section;
		edit_url	+=	"&nb_editor="+nb_editor;
		edit_url	+=	"&nb_interludio="+nb_interludio;
	
	if(blk_id != ""){

		$.ajax({	
				url		:	"ajax/ajax_modificar_bloque.php",
				type	:	"GET",
				data	:	edit_url,
				success	:	function(data){
					
							console.log(data);
							
							var resp	=	data.split("|");
							var status	=	resp[0];
							var msg		=	resp[1];
							
							if(status == "OK"){
								alert("BLOQUE MODIFICADO");
								location.reload();
								}
							else if(status == "ERROR"){
								alert(msg);
								}
							else{
								alert(data);
								}
							}
				});
		}
		
	}
	
function action_delete_block(blk_id){
	
	var resp	=	confirm("Borrar?");
	if(resp === true && blk_id != ""){
		$.ajax({	
				url		:	"ajax/ajax_eliminar_bloque.php",
				type	:	"GET",
				data	:	"blk_id="+blk_id,
				success	:	function(data){
					
							console.log(data);
							
							var resp	=	data.split("|");
							var status	=	resp[0];
							var msg		=	resp[1];
							
							if(status == "OK"){
								alert("BLOQUE ELIMINADO");
								location.reload();
								}
							else if(status == "ERROR"){
								alert(msg);
								}
							else{
								alert(data);
								}
							}
				});
		}
		
	}




function marcar_email(email){
	var arr		=	email.split("_");
	var email	=	arr[2];	
	$("a[id='item_contact_"+email+"']").removeClass("dsm_item_contact").addClass("dsm_item_contact_selected")
	.find(".dsm_item_mask").removeClass().addClass("dsm_item_mask_selected");	
	}
function desmarcar_email(email){
	var arr		=	email.split("_");
	var email	=	arr[2];	
	$("a[id='item_contact_"+email+"']").removeClass("dsm_item_contact_selected").addClass("dsm_item_contact")
	.find(".dsm_item_mask_selected").removeClass().addClass("dsm_item_mask");	
	}



//FUNCIONES DE MODIFICAR DATOS FUNCIONARIO

function activar_inputs_funcionario(){
	$("#df_rut").prop("disabled",false);
	$("#df_fecha_nacimiento").prop("disabled",false);
	$("#df_civil").prop("disabled",false);
	$("#df_ocupacion").prop("disabled",false);
	$("#df_domicilio").prop("disabled",false);
	$("#df_ciudad").prop("disabled",false);
	$("#df_comuna").prop("disabled",false);	
	$("#df_email").prop("disabled",false);
	$("#df_telefono").prop("disabled",false);
	$("#df_skype").prop("disabled",false);	
	$("#df_facebook").prop("disabled",false);
	}

function desactivar_inputs_funcionario(){
	$("#df_rut").prop("disabled",true);
	$("#df_fecha_nacimiento").prop("disabled",true);
	$("#df_civil").prop("disabled",true);
	$("#df_ocupacion").prop("disabled",true);
	$("#df_domicilio").prop("disabled",true);
	$("#df_ciudad").prop("disabled",true);
	$("#df_comuna").prop("disabled",true);	
	$("#df_email").prop("disabled",true);
	$("#df_telefono").prop("disabled",true);
	$("#df_skype").prop("disabled",true);	
	$("#df_facebook").prop("disabled",true);
	}


function cc_modal(param_url){
	
	$("#modal_loader").fadeIn("fast",null,function(){
		
		$("#modal").load(param_url,function(){
			$(this).fadeIn("fast",null,function(){
				$("#modal_loader").fadeOut("fast");
				});		
			});
		});
	}
function close_cc_modal(){
	
	$("#modal > div").fadeOut("fast",null,function(){
		$("#modal").fadeOut("fast",null,function(){
				$(this).html("");
				});
		});

	}
	
</script>


</body>
</html>