<?php
include("session.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>.: Medbox :.</title>

<link rel="stylesheet" type="text/css" href="css/fonts.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<link rel="stylesheet" type="text/css" href="css/modal.css">
<link rel="stylesheet" type="text/css" href="js/scrollbar/scrollbar.css">

</head>
<body>
<style>
html,body{
	background-color:#f2f3f6;
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
	background-color:#395661;
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
	margin-left: 7px;
	}
#header_avatar > img{
	-webkit-clip-path: rectangle(0px, 0px, 45px, 45px, 45px, 45px);
	}
#header_user{
	float:right;
	height:45px;
	/*background-color:#666;*/
	margin-top:5px;
	margin-right:30px;
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

#header_options{
	float:right;
	height:55px;
	margin-right:30px;
	padding-left:5px;
	color:#FFF;
	display:block;
	cursor:pointer;
	}
#header_options:active{
	background-color:#304b55;
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
	background-color:#5f767e;
	}
.menu_item{
	width:100px;
	height:80px;
	background-color:#5f767e;
	cursor:pointer;
	}
.menu_item:active{
	background-color:#4f656d;
	}
.menu_item_selected{
	width:100px;
	height:80px;
	background-color:#60a9d7;
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
#menu_contratos{
	background-position:0px 0px;
	}
#menu_programacion{
	background-position:0px -64px;
	}
#menu_fichas{
	background-position:0px -128px;
	}
	

/*------------------------------*/
/*			   MENU				*/
/*------------------------------*/

section{
	position:absolute;
	top:55px;
	left:100px;
	right:0px;
	bottom:0px;
	background-color:#f2f3f6;
	}



</style>


<?php

$usu_id		=	$_SESSION['usu_id'];
$usu_nom	=	$_SESSION['usu_nom'];
$usu_rut	=	$_SESSION['usu_rut'];
$usu_rol	=	$_SESSION['rol_des'];

$menu	=	"m1";

if(isset($_GET['m']) && $_GET['m'] != ""){
	$menu	=	$_GET['m'];
	}

?>

<!-------------------------------------------------------->
<!--				  TEMPLATE WAIT						-->
<!-------------------------------------------------------->

<div id="overlay">
	<div id="overlay_box">Cargando...</div>
</div>


<!-------------------------------------------------------->
<!--				  TEMPLATE MODAL					-->
<!-------------------------------------------------------->

<div id="modal_loader"><img src="img/loader.gif" width="31" height="31"  alt=""/></div>
<div id="modal"></div>

<!-------------------------------------------------------->

<header>
	
    <input type="hidden" id="hi_menu" value="<?php echo $menu; ?>">    
    <img id="header_logo" src="img/logo_index.png" width="170" height="55">
    
    <div id="header_options">
        <div id="header_user">
            <div id="header_user_name"><?php echo $usu_nom; ?></div>
            <div id="header_user_rol"><?php echo $usu_rol; ?></div>
        </div>        
        <?php
        $img_default	=	"img/avatars/default.png";
        $img_rut		=	"img/avatars/".$usu_rut.".png";
        $img_file		=	file_exists($img_rut) ? $img_rut : $img_default;
        //$img_file		=	$img_default;
        ?>        
        <div id="header_avatar"><img src="<?php echo $img_file; ?>" width="45" height="45"></div>
    </div>
</header>

<menu>

    <?php
	
	$m1_class	=	"menu_item_selected";
	$m2_class	=	"menu_item";
	$m3_class	=	"menu_item";
	$include	=	"menu_contratos.php";
	
    switch($menu){
		case "m1":	$m1_class	=	"menu_item_selected";
					$m2_class	=	"menu_item";
					$m3_class	=	"menu_item";
					$include	=	"menu_contratos.php";
					break;
		case "m2":	$m1_class	=	"menu_item";
					$m2_class	=	"menu_item_selected";
					$m3_class	=	"menu_item";
					$include	=	"menu_programacion.php";
					break;
		case "m3":	$m1_class	=	"menu_item";
					$m2_class	=	"menu_item";
					$m3_class	=	"menu_item_selected";
					$include	=	"menu_fichas.php";
					break;
		default:	$m1_class	=	"menu_item_selected";
					$m2_class	=	"menu_item";
					$m3_class	=	"menu_item";				
					$include	=	"menu_contratos.php";
		}
	?>
    
    <div class="<?php echo $m1_class; ?>" id="m1">
    	<div class="menu_item_icon" id="menu_contratos"></div>
        <div class="menu_item_text">Contratos</div>
	</div>
    <div class="<?php echo $m2_class; ?>" id="m2">
    	<div class="menu_item_icon" id="menu_programacion"></div>
        <div class="menu_item_text">Programacion</div>
	</div>
    <div class="<?php echo $m3_class; ?>" id="m3">
    	<div class="menu_item_icon" id="menu_fichas"></div>
        <div class="menu_item_text">Flujo Clínico</div>
	</div>

</menu>

<section>
<?php
include($include);
?>
</section>



<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/scrollbar/scrollbar.js"></script>
<script>
$(document).ready(function(e) {
    
	loader("out");
	contar_contratos();
	
	$(".menu_item").click(function(e){
		var menu	=	this.id;		
		$(this).removeClass("menu_item").addClass("menu_item_selected").siblings().removeClass("menu_item_selected").addClass("menu_item");
		loader("in");
		document.location.href	=	"?m="+menu;
		});

	//CERRAR MODAL
	$("#modal").on("click","#close_modal",function(e){
		$(this).parent().fadeOut("fast",null,function(){
			$("#modal").fadeOut("fast",null,function(){
				$(this).html("");
				});
			});
		});
	
	
	//-------------------------------------------//
	//			FUNCIONES TRANVERSALES
	//-------------------------------------------//
	
	//BTN BUSCAR MEDICO	
	$("section").on("click","#btn_buscar_medico",function(e){
		cc_modal("forms/frm_seleccionar_medico.php");		
		});
	
	//CLICK SELECCIONAR MEDICO
	$("#modal").on("click",".item_medico",function(e){
		var menu	=	$("#hi_menu").val();
		document.location.href	=	"?m="+menu+"&f="+this.id;
		});	
	
	
	//-------------------------------------------//
	//				MENU CONTRATOS
	//-------------------------------------------//
	
	
	//BTN NUEVO CONTRATO	
	$("section").on("click","#btn_nuevo_contrato",function(e){
		cc_modal("forms/frm_nuevo_contrato.php");		
		});	
	//BTN EDITAR HORAS
	$("section").on("click","#btn_editar_horas",function(e){
		activar_modificar_horas();
		$("#btn_cancelar_horas,#btn_guardar_horas").css({"visibility":"visible"});
		$(this).css({"visibility":"hidden"});
		});	
	//BTN CANCELAR HORAS
	$("section").on("click","#btn_cancelar_horas",function(e){
		loader("in");
		window.location.reload();
		});	
	//BTN GUARDAR HORAS
	$("section").on("click","#btn_guardar_horas",function(e){
		guardar_horas();
		});
	//BTN SELECCIONAR HORAS(CONTRATO)
	$("#modal").on("click",".btn_item_hora",function(e){
		$("#hi_horas_contrato").val(this.id);
		$(this).siblings().removeClass("btn_item_hora_selected").addClass("btn_item_hora");
		$(this).removeClass("btn_item_hora").addClass("btn_item_hora_selected");
		});	

	//BTN CREAR NUEVO BLOQUE
	$("section").on("click",".btn_add_block",function(e){
		//cc_modal("forms/frm_seleccionar_medico.php");		
		var arr_id	=	(this.id).split("_");
		var day_id	=	arr_id[3];
		alert(day_id);
		});
	
	
	
});


		


function loader(action){
	
	if(action == "in"){
			$("#overlay").fadeIn("fast");
		}
	else{	$("#overlay").fadeOut("fast");
		}
	}

function cc_modal(param_url){
	
	$("#modal_loader").fadeIn("fast",null,function(){
		
		$("#modal").load(param_url,function(){
			$(this).fadeIn("fast",null,function(){
				$("#modal_loader").fadeOut("fast");
				
				if(param_url == "forms/frm_seleccionar_medico.php"){
					//-------------------------//
					$("#div_seleccionar_medico_body").mCustomScrollbar({
							scrollInertia:150,
							autoHideScrollbar: true
							});
					//-------------------------//
					}			
				
				});		
			});
		});
	}


//FUNCIONES MENU_CONTRATO.PHP

function contar_contratos(){
	var cant_contratos	=	$("#hi_contratos").val();
	if(cant_contratos > 0){
		$("#btn_editar_horas").css({"visibility":"visible"});
		}
	}


function crear_contrato(){
	
	var contrata	=	$("#select_contrata").val();
	var lugar		=	$("#select_establecimiento").val();
	var horas		=	$("#hi_horas_contrato").val();
	var med_id		=	$("#hi_med_id").val();
	var flag		=	true;
	
	if(contrata == ""){	alert("DEBE SELECCIONAR QUIEN CONTRATA"); flag = false;	}
	if(lugar == "" && flag == true){	alert("DEBE SELECCIONAR LUGAR DE DESEMPEÑO"); flag = false;	}
	if(horas == "" && flag == true){	alert("DEBE SELECCIONAR HORAS DEL CONTRATO"); flag = false;	}
	if(med_id == "" && flag == true){	alert("NO HAY MEDICO SELECCIONADO"); flag = false;	}
	
	if(flag == true){
		
		var url_	=	"ctr_id="+contrata;
			url_	+=	"&esb_id="+lugar;
			url_	+=	"&con_id="+horas;
			url_	+=	"&med_id="+med_id;
		
		var conf	=	confirm("AGREGAR ESTE NUEVO CONTRATO?");
		if(conf == true){
				
				$.ajax({
					url		:	"ajax/ajax_crear_contrato.php",
					type	:	"GET",
					data	:	url_,
					success	:	function(data){
								
								console.log(data);
								
								var resp	=	data.split("|");
								var status	=	resp[0];
								var msg		=	resp[1];
								
								if(status == "OK"){
									alert("CONTRATO AGREGADO");
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
				
				}//end conf
		
		
		}

	}


function eliminar_contrato(rcf_id){

if(rcf_id != "" && rcf_id > 0){

	var conf	=	confirm("Eliminar contrato?");
	var key		=	"";
	
	if(conf == true){
		key		=	prompt("POR FAVOR ESCRIBA LA PALABRA 'ELIMINAR' EN EL CUADRO");
		}
	
	if(conf == true && (key == "ELIMINAR" || key == "eliminar")){
		$.ajax({
			url		:	"ajax/ajax_eliminar_contrato.php",
			type	:	"GET",
			data	:	"rcf_id="+rcf_id,
			success	:	function(data){						
							console.log(data);							
							var resp	=	data.split("|");
							var status	=	resp[0];
							var msg		=	resp[1];							
							if(status == "OK"){
								alert("CONTRATO ELIMINADO CORRECTAMENTE");
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
		}//end conf
	}
	
}


function activar_modificar_horas(){	
	$("#hp_cargo_jubilado,#dfe_admins,#dfe_feriados").prop("disabled",false);
	$("#dfe_previos,#dfe_cursos").prop("readonly",false);	
	}
function recalcular_cargo28(){
	
	var jubilado		=	$("#hp_cargo_jubilado").val();	
	if(jubilado == "0"){
		$("#hp_cargo_28horas").val(28);
		$("#dfe_descanso_compensatorio").val(10);
		}
	else{
		$("#hp_cargo_28horas").val(22);
		$("#dfe_descanso_compensatorio").val(0);
		}
	
	var valor_horas		=	$("#hp_horas_contratadas").val();
	var valor_cargo28	=	$("#hp_cargo_28horas").val();	
	var valor_total		=	parseInt(valor_horas) + parseInt(valor_cargo28);
	
	$("#hp_total_horas_programables").val(valor_total);
	recalcular_dias();
	
}

function recalcular_dias(){
	
	var dfe_descanso	=	$("#dfe_descanso_compensatorio").val();	
	var dfe_admins		=	$("#dfe_admins").val();
	var dfe_feriados	=	$("#dfe_feriados").val();
	var dfe_previos		=	$("#dfe_previos").val();
	var dfe_cursos		=	$("#dfe_cursos").val();
	
	if(isNaN(dfe_previos) || dfe_previos == ""){
		dfe_previos	=	0;
		}
	if(isNaN(dfe_cursos) || dfe_cursos == ""){
		dfe_cursos	=	0;
		}
	
	var total_dfe		=	parseInt(dfe_descanso) + parseInt(dfe_admins) + parseInt(dfe_feriados) + parseInt(dfe_previos) + parseInt(dfe_cursos);
	
	$("#dfe_total_dias").val(total_dfe);
	
}

function guardar_horas(){
	
	var fun_id			=	$("#hi_med_id").val();
	var d_habiles		=	249;//2013
	var cargo28			=	$("#hp_cargo_28horas").val();
	var horas			=	$("#hp_horas_contratadas").val();
	var jubilado		=	$("#hp_cargo_jubilado").val();
	var d_admins		=	$("#dfe_admins").val();
	var d_cursos		=	$("#dfe_cursos").val();
	var f_anteriores	=	$("#dfe_previos").val();
	var f_legal			=	$("#dfe_feriados").val();
	var descanso		=	$("#dfe_descanso_compensatorio").val();
	var total_df		=	$("#dfe_total_dias").val();
	
	var form_url		=	"fun_id="+fun_id;
		form_url		+=	"&d_habiles="+d_habiles;
		form_url		+=	"&carga="+cargo28;
		form_url		+=	"&h_contratadas="+horas;		
		form_url		+=	"&j_guardia="+jubilado;		
		form_url		+=	"&administrativos="+d_admins;
		form_url		+=	"&curso="+d_cursos;
		form_url		+=	"&f_anteriores="+f_anteriores;		
		form_url		+=	"&f_legal="+f_legal;
		form_url		+=	"&descanso="+descanso;
		form_url		+=	"&dias_fuera="+total_df;
	
	//alert(form_url);
	loader("in");
	$.ajax({
		  url		:	"ajax/ajax_guardar_horas.php",
		  type		:	"GET",
		  data		:	form_url,
		  success	:	function(data){
					  	var result	=	$.trim(data);
						if(result == "OK"){
							alert("HORAS GUARDADAS CORRECTAMENTE");
							//location.reload();
							}
						else{
							alert(data);
							}
					  }
		  });
	
}

</script>









</body>
</html>