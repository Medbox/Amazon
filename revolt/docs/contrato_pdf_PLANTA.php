<?php
session_start();

require_once("../lib/mpdf/mpdf.php");
require_once("../class/Class.Functions.php");
require_once("../class/Class.Funcionario.php");
require_once("../class/Class.Contrato.php");


$fun_id		=	$_SESSION['fun_id'];
$obj_fun	=	new Funcionario();
$arr_fun	=	$obj_fun->list_funcionario($fun_id);

$obj_con	=	new Contrato();
$obj_con->setContrato($fun_id);

$DATA_NOMBRE	=	$obj_con->getNombre();
$DATA_RUT		=	$obj_con->getFun_rut();
$DATA_SEXO		=	$obj_con->getSexo_id();
$DATA_OCUPACION	=	$obj_con->getCon_ocupacion();
$DATA_CIVIL		=	ucwords(strtolower($obj_con->getCon_civil()));
$DATA_DOMICILIO	=	$obj_con->getCon_domicilio();
$DATA_CIUDAD	=	ucwords(strtolower($obj_con->getCon_ciudad()));
$DATA_COMUNA	=	"";//$obj_con->getCn
$DATA_CARGO		=	$obj_con->getFuncion();
$DATA_RENTA		=	$obj_con->getCon_renta();

$domiciliado	=	$DATA_SEXO == 2 ? "domiciliada" : "domiciliado";

if($DATA_COMUNA != ""){
	$DATA_CIUDAD	=	"ciudad de ".$DATA_CIUDAD." y comuna de ".$DATA_COMUNA;
	}
else{
	$DATA_CIUDAD	=	"ciudad y comuna de ".$DATA_CIUDAD;
	}


$HOY	=	get_fecha_hoy();
$html	=	'
<div class="logo"><img src="../img/logo_pdf.png" width="160" height="34"/></div>
<div class="title">Contrato de Promesa</div>

<br><br><br>

<section>
En Concepción a '.$HOY.', por una parte y como Promitente <span>REVOLT GAMES LIMITADA</span>, 
rol único tributario número 76.310.987-9, constituida por escritura pública otorgada ante el notario de 
Concepción don Ramón García Carrasco, de fecha veintiuno de Octubre del dos mil trece,  e inscrita en el 
conservador de bienes raíces de Concepción, registro de comercio, número 2626, fojas 3045 vuelta del año 2013, 
la que por dicho instrumento, es legalmente representada por don <span>YAMIR RIVERA MALVERDE</span>, Abogado, 
casado, cedula nacional de identidad número 17.349.881-0, domiciliado en San Martin 42, Torre Doña Paula, Depto. 
1503 de la comuna y ciudad de Concepción; y por otra y como promisorio don <span>'.$DATA_NOMBRE.'</span>, 
'.$DATA_OCUPACION.', '.$DATA_CIVIL.', cedula nacional de identidad número '.$DATA_RUT.', '.$domiciliado.' en 
'.$DATA_DOMICILIO.' de la '.$DATA_CIUDAD.', ambos mayores de edad, quienes exponen:
</section>

<br>

<article>
<span>Artículo 1.- </span>Ambos acuerdan celebrar un contrato de promesa regido por las normas del artículo 1554 del Código Civil, con el objeto prometer la celebración y otorgamiento de un contrato de prestaciones de servicios profesionales regidos por las normas de este contrato y por las establecidas por el Código Civil y de Comercio, aplicables al caso. 
</article>
<br>
<article>
<span>Artículo 2.- </span>El contrato prometido, tendrá por objeto que el Promitente contrate al Promisorio, para que este preste sus servicios profesionales, como '.$DATA_CARGO.'; para satisfacer todas las peticiones que el Promitente hiciere sobre materias de sus competencias; y toda labor propia a los estudios profesionales y técnicos que el Promisorio detenta.
</article>
<br>
<article>
<span>Artículo 3.- </span>El pago por las prestaciones corresponderá al valor de <span>'.$DATA_RENTA.'</span> mensuales, pagaderas cada día 5 (cinco) de cada mes, a las cuales se le aplicarán los descuentos legales y tributarios respectivos. Los pagos se realizarán en efectivo depositados a la cuenta bancaria que disponga en el Promisorio en el contrato definitivo.
</article>
<br>
<article>
<span>Artículo 4.- </span>El contrato prometido tendrá una vigencia de 1 (un) meses, contando desde su celebración y otorgamiento. La que se prorrogará indefinidamente si las partes no manifiestan voluntad al contrario.
</article>
<br>
<article>
<span>Artículo 5.- </span>Serán obligaciones del Promisorio: (A) Cumplir con las labores en la fecha encomendadas por el Promitente. (B) Asistir a las reuniones que solicite el Promitente. (C) Ejercer sus labores con seriedad y diligencia. (D) atender todas las recomendaciones y solicitudes con la mayor prontitud.
</article>
<br>
<article>
<span>Artículo 6.- </span>Serán obligaciones del promitente: (A) Cancelar los honorarios en el tiempo y forma pactados (B) Otorgar toda la ayuda necesaria para que el Promisorio pueda cumplir sus funciones.
</article>
<br>
<article>
<span>Artículo 7.- </span>El contrato definitivo podrá ser terminado en cualquier tiempo por el Promitente, por incumplimiento de las obligaciones del Promisorio.
</article>
<br>
<article>
<span>Artículo 8.- </span>El contrato definitivo será celebrado y otorgado al momento de que el Promitente cuente con los recursos necesarios para hacer pagos totales equivalente a un mes, a todos los Promisorios con quienes tenga similares obligaciones, donde se incluya esta idéntica clausula. Todo ello sin perjuicio de que el Promitente puede en cualquier momento adelantar la celebración y otorgamiento de los contrato definitivos con quien estime necesario, aun cuando no cuente con los recursos para hacer la totalidad de los pagos a todos los promisorios o destinar recursos para hacer pagos a situaciones de implementación de oficinas o bienes y servicios que sean necesarios para producir la renta del Promitente, las que serán deducidas para los cálculos a que se refiere esta cláusula.
</article>
<br>
<article>
<span>Artículo 9.- </span>Para cualquier controversia o contienda, que deriven este contrato, las partes acuerdan sus domicilios en la ciudad y comuna de Concepción, para todos los efectos legales.
</article>
<br>
<br>
<footer>
<div class="firma_left">
	<div class="firma_imagen"><img src="../img/firmatransparente.png" width="60" height="80"/></div>
	<div class="firma_person">REVOLT GAMES LTDA</div>
	<div class="firma_rut">76.310.987-9</div>
</div>
<div class="firma_right">
	<div class="firma_imagen"></div>
	<div class="firma_person">'.$DATA_NOMBRE.'</div>
	<div class="firma_rut">'.$DATA_RUT.'</div>
</div>

</footer>
';

//<img src="../img/logo_pdf.png" width="60" height="80"/>
//==============================================================
//==============================================================
//==============================================================

$mpdf = new mPDF('rf','A4',12,'opensans',20,20,25,25);

// LOAD a stylesheet
$stylesheet = file_get_contents('contratos.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
//--------------------------------------------------------------

$mpdf->WriteHTML($html);
$mpdf->Output();
exit;
//==============================================================
//==============================================================
//==============================================================

?>
