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
$don			=	$DATA_SEXO == 2 ? "Doña" : "Don";

if($DATA_COMUNA != ""){
	$DATA_CIUDAD	=	"ciudad de ".$DATA_CIUDAD." y comuna de ".$DATA_COMUNA;
	}
else{
	$DATA_CIUDAD	=	"ciudad y comuna de ".$DATA_CIUDAD;
	}


$HOY	=	get_fecha_hoy();
$html	=	'
<div class="logo"><img src="../img/logo_pdf.png" width="160" height="34"/></div>
<div class="title2">ACUERDO DE REPRESENTACION PUBLICITARIA</div>

<br><br><br>

<section class="anexo_header">
A '.$HOY.', por una parte, REVOLT GAMES LIMITADA <span>[REVOLT GAMES]</span>, rol único tributario número 76.310.987-9, 
Registro de comercio, número 2626, fojas 3045 vuelta del año 2013, legalmente representada por don YAMIR RIVERA MALVERDE, 
Abogado, casado, cedula nacional de identidad número 17.349.881-0,  domiciliado en San Martin 42, Torre Doña Paula, Depto. 1503 
de la comuna y ciudad de Concepción; y por otra, '.$don.' <span>'.$DATA_NOMBRE.'</span>, <span>[AFILIADO]</span>, 
'.$DATA_OCUPACION.', '.$DATA_CIVIL.', cedula nacional de identidad número '.$DATA_RUT.', '.$domiciliado.' en 
'.$DATA_DOMICILIO.' de la '.$DATA_CIUDAD.', ambos mayores de edad, quienes exponen:
</section>


<br>

<article class="anexo_article">
<span>Primero.- </span>El presente acuerdo, es un anexo que se adjunta al contrato principal, que tiene por objeto, el de dejar 
constancia sumaria de los derechos de representación que REVOLT GAMES detenta sobre la persona del AFILIADO, su contenido que 
genera en cumplimiento del contrato principal, signo, símbolo o cualquier otro distintivo que se use para designarlo, para los 
fines que más adelante se señalan.
</article>
<br>

<article class="anexo_article">
<span>Segundo.- </span>REVOLT GAMES, cuenta con la capacidad de representación del AFILIADO en todo lo que sea necesario, para 
promover, publicitar y promocionar tanto a la persona misma del AFILIADO; signo, símbolo o cualquier otro distintivo que se use 
para designarlo; como el contenido, bloque de contenido o programa que este conduzca o desarrolle;  y/o cualquier otro signo, 
símbolo o cualquier otros distintivo que se use para designar a REVOLT GAMES.
<br><br>
El AFILIADO tendrá siempre la libertad para poder celebrar contratos publicitarios, laborales o cualquier otro, con toda empresa, 
marca, producto o servicios, que estime conveniente, sobre espacio de trasmisión, materiales o contenidos distintos de los que 
genere en el cumplimiento del contrato principal, siempre que estos, no le impidan cumplir íntegramente con las disposiciones de 
este contrato principal y, especialmente, en lo que dice relación con los derechos publicitarios de REVOLT GAMES, que dé el emanan.
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
