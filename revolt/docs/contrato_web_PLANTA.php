<?php
session_start();

require_once("../class/Class.Funcionario.php");
require_once("../class/Class.Contrato.php");


$con_id		=	$_GET['con_id'];
$fun_id		=	$_SESSION['fun_id'];

$obj_fun	=	new Funcionario();
$arr_fun	=	$obj_fun->list_funcionario($fun_id);
$arr_stt	=	$obj_fun->trae_estado_fun($fun_id);

$fun_stt	=	$arr_stt[0]['fun_estado_contrato'];

//$fun_stt	=	$arr_stt[0]['inicio_contrato'];
//$fun_stt	=	$arr_stt[0]['fun_con_id'];
//$fun_stt	=	$arr_stt[0]['tco_denominacion'];

if(count($arr_fun) != 1){	
	header("Location: index.php");	
	}

$obj_con	=	new Contrato();
$obj_con->setContrato($fun_id);

$DATA_NOMBRE	=	$obj_con->getNombre();
$DATA_RUT		=	$obj_con->getFun_rut();
$DATA_SEXO		=	$obj_con->getSexo_id();
$DATA_OCUPACION	=	$obj_con->getCon_ocupacion();
$DATA_CIVIL		=	ucwords(strtolower($obj_con->getCon_civil()));
$DATA_DOMICILIO	=	$obj_con->getCon_domicilio();
$DATA_CIUDAD	=	ucwords(strtolower($obj_con->getCon_ciudad()));
$DATA_COMUNA	=	"";
$DATA_CARGO		=	$obj_con->getFuncion();
$DATA_RENTA		=	$obj_con->getCon_renta();

$domiciliado	=	$DATA_SEXO == 2 ? "domiciliada" : "domiciliado";

if($DATA_COMUNA != ""){
	$DATA_CIUDAD	=	"ciudad de ".$DATA_CIUDAD." y comuna de ".$DATA_COMUNA;
	}
else{
	$DATA_CIUDAD	=	"ciudad y comuna de ".$DATA_CIUDAD;
	}




?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>.: Contrato Revolt :.</title>


<link href="../css/fonts.css"	rel="stylesheet" type="text/css">
<link href="../css/contrato.css"	rel="stylesheet" type="text/css">

</head>
<body>

<div class="ctr_wrap">

	<div class="ctr_header">
    	<div style="height:30px;"></div>
    	<div class="ctr_header_logo"><img src="../img/login_logo.png" width="280" height="80"  alt=""/></div>
    	<div class="ctr_header_title">Contrato de Promesa</div>
        <input type="hidden" id="hi_con_id" value="<?php echo $con_id; ?>">
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

			if($fun_stt == 2){
				echo "<div id='btn_home' style='margin-left:195px;'><span>Volver al Inicio</span></div>";
				echo "<div id='btn_descarga_contrato' style='margin-left:15px;'><span>Descargar Contrato</span></div>";
				}
			else{
				echo "<div id='btn_rechaza_contrato' style='margin-left:315px;'><span>Rechazo</span></div>
            		  <div id='btn_acepta_contrato'><span>Acepto</span></div>";
				}
			?>
        
        <div style="height:180px;"></div>
        
    </div>

</div>

<script src="../plugins/jquery-ui/jquery-1.9.1.js"></script>
<script>
$(document).ready(function(e) {
    $("#btn_rechaza_contrato").click(function(){
		window.location	=	"../login.php";
		});
	$("#btn_home").click(function(){
		window.location	=	"../index.php";
		});
	$("#btn_acepta_contrato").click(function(){
		var con_id	=	$("#hi_con_id").val();
		$.ajax({	
				url		:	"../ajax/ajax_aceptar_contrato.php",
				data	:	"con_id="+con_id,
				success	:	function(data){

							console.log(data);
							
							var resp	=	data.split("|");
							var status	=	resp[0];
							var msg		=	resp[1];
							
							if(status == "OK"){
								alert("CONTRATO ACEPTADO CORRECTAMENTE");
								window.location	=	"../index.php";
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
	
	$("#btn_descarga_contrato").click(function(){
		
		var con_id	=	$("#hi_con_id").val();
		var win_width = $(window).width();
        var win_height = $(window).height();
        var href 	= 	"contrato_pdf_PLANTA.php?con_id="+con_id;
        var target 	= 	"_blank";		
        window.open(href,target, "width="+win_width+"px,height="+win_height+"px"); 	
		
		});
	
	
});
</script>

</body>
</html>