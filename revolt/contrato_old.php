<?php
session_start();

require_once("class/Class.Funcionario.php");
include("base_contratos.php");

$fun_id	=	$_SESSION['fun_id'];
if($fun_id == ""){
	$fun_id	=	$_GET['fun_id'];
	}

$obj_fun	=	new Funcionario();
$arr_fun	=	$obj_fun->list_funcionario($fun_id);

if(count($arr_fun) != 1){
	
	header("Location: index.php");
	
	}




//ESTADO USUARIO
$obj_stt	=	new Funcionario();
$arr_stt	=	$obj_stt->trae_estado_fun($fun_id);
$usu_stt	=	$arr_stt[0]['USU_ACTIVE'];


//$DATA_RUT		=	$arr_fun[0]["fun_rut"]."-".$arr_fun[0]["fun_dv"];
$DATA_NOMBRE	=	$arr_fun[0]["fun_nombre"]." ".$arr_fun[0]["fun_ape_pat"]." ".$arr_fun[0]["fun_ape_mat"];

//$DATA_NOMBRE	=	strtoupper($ARR_CONTRATO[$fun_id]['NAME']);//"Yamir Rivera Malverde
$DATA_RUT		=	$ARR_CONTRATO[$fun_id]['RUT'];//"15.123.123-4";
$DATA_OCUPACION	=	$ARR_CONTRATO[$fun_id]['OCUPACION'];//"Profesional";
$DATA_CIVIL		=	$ARR_CONTRATO[$fun_id]['CIVIL'];//"Casado";
$DATA_DOMICILIO	=	$ARR_CONTRATO[$fun_id]['DOMICILIO'];//"Hochstetter 355 Dep. 42";
$DATA_CIUDAD	=	$ARR_CONTRATO[$fun_id]['CIUDAD'];//"comuna y ciudad de Temuco";
$DATA_CARGO		=	$ARR_CONTRATO[$fun_id]['CARGO'];//"Jefe Programación";
$DATA_RENTA		=	$ARR_CONTRATO[$fun_id]['RENTA'];//"800.000 mil pesos (Ochocientos mil pesos)";

$domiciliado	=	$fun_id == 11 ? "domiciliada" : "domiciliado";

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
	/*background-image:url(img/bg1.jpg);
	background-repeat:no-repeat;
	background-position:center;
	background-size:100% 100%;*/
	}
.ctr_wrap{
	width:900px;
	position:absolute;
	left:50%;
	margin-left:-450px;
	background-color:#f4f5f6;
	/*border-left:1px solid #e3e3e3;
	border-right:1px solid #e3e3e3;*/
	}
.ctr_header{
	height:180px;
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
.ctr_body_p1{
	margin-top:35px;
	font-family:OpenSansLight;
	font-size:1em;
	color:#323232;
	width:84%;
	margin-left:8%;
	text-align:justify;
	}
.ctr_body_p1 > span{
	font-family:OpenSansSemibold;
	}

article{
	margin-top:25px;
	font-family:OpenSansLight;
	font-size:1em;
	color:#323232;
	width:84%;
	margin-left:8%;
	text-align:justify;
	}
article > span{
	font-family:OpenSansSemibold;
	}

.data{
	background-color:#FC6;
	}

#btn_rechaza_contrato, #btn_acepta_contrato, #btn_descarga_contrato{
	float:left;
	font-family:OpenSansLight;
	width:130px;
	height:69px;
	background-color:#a0a0a0;
	margin:0px 0px 0px 10px;
	background-image:url(../img/btn_icon_cancel.png);
	background-repeat:no-repeat;
	background-position:49px 10px;
	cursor:pointer;
	}
#btn_acepta_contrato{
	background-image:url(../img/btn_icon_accept.png);
	background-color:#68c07a;
	}

#btn_rechaza_contrato:active{
	background-color:#7d7d7d;
	}
#btn_acepta_contrato:active{
	background-color:#509c5f;
	}
#btn_rechaza_contrato > span, #btn_acepta_contrato > span{
	display:block;
	text-align:center;
	font-size:14px;
	color:#FFF;
	margin-top:41px;	
	}	

#btn_descarga_contrato{
	width:270px;
	background-image:url(../img/btn_icon_descarga.png);
	background-color:#4591df;
	background-position:118px 10px;
	}
#btn_descarga_contrato:active{
	background-color:#3a7ec3;
	}
#btn_descarga_contrato > span{
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
    	<div style="height:30px;"></div>
    	<div class="ctr_header_logo"><img src="img/login_logo.png" width="280" height="80"  alt=""/></div>
    	<div class="ctr_header_title">Contrato de Promesa</div>
    </div>
    
    <div class="ctr_body">
    	
        <div class="ctr_body_p1">
        En Concepción a <?php echo date("d"); ?> de Diciembre del 2013, por una parte y como Promitente <span>REVOLT GAMES LIMITADA</span>, 
        rol único tributario número 76.310.987-9, constituida por escritura pública otorgada ante el notario de 
        Concepción don Ramón García Carrasco, de fecha veintiuno de Octubre del dos mil trece,  e inscrita en el 
        conservador de bienes raíces de Concepción, registro de comercio, número 2626, fojas 3045 vuelta del año 2013, 
        la que por dicho instrumento, es legalmente representada por don <span>YAMIR RIVERA MALVERDE</span>, Estudiante, 
        casado, cedula nacional de identidad número 17.349.881-0, domiciliado en San Martin 42, torre doña paula, depto. 
        1503 de la comuna y ciudad de Concepción; y por otra y como promisorio don <span><?php echo $DATA_NOMBRE; ?></span>, 
        <?php echo $DATA_OCUPACION; ?>, <?php echo $DATA_CIVIL; ?>, cedula nacional de identidad número 
        <?php echo $DATA_RUT; ?>, <?php echo $domiciliado; ?> en <?php echo $DATA_DOMICILIO; ?> de la <?php echo $DATA_CIUDAD; ?>, ambos mayores de edad, quienes exponen:
        </div>
        
        <article>
        <span>Artículo 1.- </span>Ambos acuerdan celebrar un contrato de promesa regido por las normas del artículo 1554 del Código Civil, con el objeto prometer la celebración y otorgamiento de un contrato de prestaciones de servicios profesionales regidos por las normas de este contrato y por las establecidas por el Código Civil y de Comercio, aplicables al caso. 
        </article>
        
        <article>
        <span>Artículo 2.- </span>El contrato prometido, tendrá por objeto que el Promitente contrate al Promisorio, para que este preste sus servicios profesionales, como <?php echo $DATA_CARGO; ?>; para satisfacer todas las peticiones que el Promitente hiciere sobre materias de sus competencias; y toda labor propia a los estudios profesionales y técnicos que el Promisorio detenta.
        </article>
        
        <article>
        <span>Artículo 3.- </span>El pago por las prestaciones corresponderá al valor de <?php echo $DATA_RENTA; ?> mensuales, pagaderas cada día 5 (cinco) de cada mes, a las cuales se le aplicarán los descuentos legales y tributarios respectivos. Los pagos se realizarán en efectivo depositados a la cuenta bancaria que disponga en el Promisorio en el contrato definitivo.
        </article>
        
        <article>
        <span>Artículo 4.- </span>El contrato prometido tendrá una vigencia de 1 (un) meses, contando desde su celebración y otorgamiento. La que se prorrogará indefinidamente si las partes no manifiestan voluntad al contrario.
        </article>
        
        <article>
        <span>Artículo 5.- </span>Serán obligaciones del Promisorio: (A) Cumplir con las labores en la fecha encomendadas por el Promitente. (B) Asistir a las reuniones que solicite el Promitente. (C) Ejercer sus labores con seriedad y diligencia. (D) atender todas las recomendaciones y solicitudes con la mayor prontitud.
        </article>
        
        <article>
        <span>Artículo 6.- </span>Serán obligaciones del promitente: (A) Cancelar los honorarios en el tiempo y forma pactados (B) Otorgar toda la ayuda necesaria para que el Promisorio pueda cumplir sus funciones.
        </article>
        
        <article>
        <span>Artículo 7.- </span>El contrato definitivo podrá ser terminado en cualquier tiempo por el Promitente, por incumplimiento de las obligaciones del Promisorio.
        </article>
        
        <article>
        <span>Artículo 8.- </span>El contrato definitivo será celebrado y otorgado al momento de que el Promitente cuente con los recursos necesarios para hacer pagos totales equivalente a un mes, a todos los Promisorios con quienes tenga similares obligaciones, donde se incluya esta idéntica clausula. Todo ello sin perjuicio de que el Promitente puede en cualquier momento adelantar la celebración y otorgamiento de los contrato definitivos con quien estime necesario, aun cuando no cuente con los recursos para hacer la totalidad de los pagos a todos los promisorios o destinar recursos para hacer pagos a situaciones de implementación de oficinas o bienes y servicios que sean necesarios para producir la renta del Promitente, las que serán deducidas para los cálculos a que se refiere esta cláusula.
        </article>
        
        <article>
        <span>Artículo 9.- </span>Para cualquier controversia o contienda, que deriven este contrato, las partes acuerdan sus domicilios en la ciudad y comuna de Concepción, para todos los efectos legales.
        </article>
        
        <div style="height:70px;"></div>
        	
            <?php
            if($usu_stt == 2){
				echo "<div id='btn_descarga_contrato' style='margin-left:315px;'><span>Descargar Contrato</span></div>";
				}
			else{
				echo "<div id='btn_rechaza_contrato' style='margin-left:315px;'><span>Rechazo</span></div>
            		  <div id='btn_acepta_contrato'><span>Acepto</span></div>";
				}
			?>
        
        <div style="height:180px;"></div>
        
    </div>

</div>

<script src="plugins/jquery-ui/jquery-1.9.1.js"></script>
<script>
$(document).ready(function(e) {
    $("#btn_rechaza_contrato").click(function(){
		window.location	=	"login.php";
		});
	$("#btn_acepta_contrato").click(function(){
		$.ajax({	
				url		:	"ajax/ajax_aceptar_contrato.php",
				success	:	function(data){

							console.log(data);
							
							var resp	=	data.split("|");
							var status	=	resp[0];
							var msg		=	resp[1];
							
							if(status == "OK"){
								window.location	=	"index.php";
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
});
</script>

</body>
</html>