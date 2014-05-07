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


$DATA_PROGRAMA	=	"27";
$DATA_NOMBRE	=	$obj_con->getNombre();
$DATA_RUT		=	$obj_con->getFun_rut();
$DATA_SEXO		=	$obj_con->getSexo_id();
$DATA_OCUPACION	=	$obj_con->getCon_ocupacion();
$DATA_CIVIL		=	ucwords(strtolower($obj_con->getCon_civil()));
$DATA_DOMICILIO	=	$obj_con->getCon_domicilio();
$DATA_CIUDAD	=	ucwords(strtolower($obj_con->getCon_ciudad()));
$DATA_COMUNA	=	"";//$obj_con->getCn
$DATA_FUNCION	=	$obj_con->getFuncion();
$DATA_RENTA		=	$obj_con->getCon_renta();

$DATA_MODALIDAD			=	$obj_con->getModalidad();
$DATA_NACIONALIDAD		=	$obj_con->getNacionalidad();


//---------------------------------------------

//COMPROBACIONES DE CAMPOS
if($DATA_CIVIL == ""){		$DATA_CIVIL		=	"<span class='span_empty'>{Estado Civil}</span>";	}
if($DATA_OCUPACION == ""){	$DATA_OCUPACION	=	"<span class='span_empty'>{Ocupación}</span>";		}
if($DATA_DOMICILIO == ""){	$DATA_DOMICILIO	=	"<span class='span_empty'>{Domicilio}</span>";		}
if($DATA_CIUDAD == ""){		$DATA_CIUDAD	=	"<span class='span_empty'>{Ciudad}</span>";			}
if($DATA_FUNCION == ""){	$DATA_FUNCION	=	"<span class='span_empty'>{funcion}</span>";		}
if($DATA_RENTA == ""){		$DATA_RENTA		=	"<span class='span_empty'>{Renta}</span>";			}

//COMPROBACION DE ENUNCIONADOS
$don			=	$DATA_SEXO == 2 ? "Doña" : "Don";
$domiciliado	=	$DATA_SEXO == 2 ? "domiciliada" : "domiciliado";

//COMPROBACION DE ESTADO CIVIL
switch($DATA_CIVIL){
	case "Casado":	$DATA_CIVIL = $DATA_SEXO == 2 ? "Casada" : "Casado"; break;
	case "Soltero":	$DATA_CIVIL = $DATA_SEXO == 2 ? "Soltera" : "Soltero"; break;
	}
	
//COMPROBACION DE COMUNA/CIUDAD
if($DATA_COMUNA != ""){
		$DATA_CIUDAD	=	"ciudad de ".$DATA_CIUDAD." y comuna de ".$DATA_COMUNA;	}
else{	$DATA_CIUDAD	=	"ciudad y comuna de ".$DATA_CIUDAD;						}

//COMPROBACION DE FECHA ACTUAL
$HOY			=	get_fecha_hoy();
//---------------------------------------------


$html	=	'
<div class="logo"><img src="../img/logo_pdf.png" width="160" height="34"/></div>
<div class="title">Contrato de Inclusión Afliliado</div>
<div class="subtitle">RPP'.$DATA_MODALIDAD.'-'.$DATA_NACIONALIDAD.'-'.$DATA_PROGRAMA.'</div>

<br><br><br>

<section>

A '.$HOY.', , por una parte, <span>REVOLT GAMES LIMITADA [REVOLT GAMES]</span>, rol único tributario 
número 76.310.987-9, Registro de comercio, número 2626, fojas 3045 vuelta del año 2013, legalmente representada 
por don <span>YAMIR RIVERA MALVERDE</span>, Abogado, casado, cedula nacional de identidad número 17.349.881-0, 
domiciliado en San Martin 42, Torre Doña Paula, Depto. 1503 de la comuna y ciudad de Concepción; y por otra, 
'.$don.' <span>'.$DATA_NOMBRE.', [AFILIADO]</span>, '.$DATA_OCUPACION.', '.$DATA_CIVIL.', cedula nacional de 
identidad número '.$DATA_RUT.', '.$domiciliado.' en '.$DATA_DOMICILIO.', de la '.$DATA_CIUDAD.', ambos mayores 
de edad quienes exponen:

</section>


<br>

<article>
<span>Primero.- </span>Las partes acuerdan celebrar un contrato de prestaciones de servicios profesionales y representación, regido por las normas civiles y comerciales chilenas aplicables al caso.
</article>

<br>

<article>
<span>Segundo.- </span>El contrato de prestaciones de servicios profesionales tendrá por objeto que REVOLT GAMES 
contrate al AFILIADO para que preste servicios como '.$DATA_FUNCION.' número 12 
(doce) que integra el programa número 27 (veintisiete), que va desde las 17.06 (diez y siete horas, seis minutos) 
hasta las 17.51 (diez y siete horas, cincuenta y un minutos, cada semana los días Jueves. Horas estas, que 
constituyen para el AFILIDADO, su jornada ordinaria de trabajo. 
<br><br>
Con todo, de ocurrir por cualquier motivo, retrasos en 
las trasmisiones; los bloques de contenido del AFILIADO se entenderán ipso facto retrasadas en su inicio, por 
igual cantidad de tiempo, salvo que REVOLT GAMES disponga lo contrario. En cuyo caso no se procederá a su 
trasmisión, o se estará a una trasmisión parcial del o de los bloques. Sin perjuicio de ellos REVOLT GAMES, 
mantendrá la obligación de cancelar al AFILIADO las cantidades proporcionales que correspondan por la totalidad 
del bloque o de los bloques, total o parcialmente suspendidos, como si esta si estos se hubiesen llevado a 
efecto. REVOLT GAMES, no puede modificar el horario del AFILIADO, sino previa audiencia, y solo una vez por 
cada 90 días.
</article>

<br>

<article>
<span>Tercero.- </span>El AFILIADO deberá, cuando REVOLT GAMES así lo requiera, estar disponible, para sus 
indicaciones hasta por 1 (una) hora antes de iniciar el o los bloques de contenidos respectivos a que hace 
referencias el artículo anterior con el objeto de planificar, coordinar o discutir acerca del desarrollo de 
los bloques de contenidos.
<br><br>
Para ello REVOLT GAMES, deberá pagar al AFILIADO, todo tiempo que este entregue para el fin planteado en el 
inciso anterior, de manera proporcional al precio de cada hora ordinaria de trabajo, las que se calcularán 
dividiendo el número total de horas al mes que representen los bloques de contenidos del AFILIADO, a su 
remuneración neta.
</article>

<br>

<article>
<span>Cuarto.- </span>El AFILIADO, declara comprender que por la naturaleza y objeto del contrato, REVOLT GAMES, 
cuenta con la capacidad de representación del AFILIADO en todo lo que sea necesario, para promover, publicitar y 
promocionar tanto a la persona misma del AFILIADO; signo, símbolo o cualquier otro distintivo que se use para 
designarlo; como el contenido, bloque de contenido o programa que este conduzca o desarrolle;  y/o cualquier otro 
signo, símbolo o cualquier otros distintivo que se use para designar a REVOLT GAMES. Para el cumplimiento del o 
los fines antes descritos REVOLT GAMES, podrá servirse de la participación directa del AFILIADO en la forma que 
disponga.
<br><br>
REVOLT GAMES deberá pagar al AFILIADO, por todo el tiempo que este entregue fuera de las horas ordinarias o que no 
puedan ser imputadas a estas, tanto al desarrollo efectivo del o los fines planteado en el inciso anterior como en 
su traslado, al doble del precio de cada hora ordinaria de trabajo, calculadas en la forma a que se refiere el artículo 
tercero en su inciso segundo, además de todo gasto en que haya debido incurrir el AFILIADO con motivos traslado, 
alojamiento y alimentación. Solamente una vez por cada 30 (treinta) días REVOLT GAMES podrá exigir al AFILIADO, su 
participación directa en actividades para fines de promoción y publicidad en los términos antes descritos, que pudiera 
implicar su traslado por más de 1 (una) hora.  Y solo, una vez por cada 90 (noventa) días, la participación directa en 
actividades con fines de promoción y publicidad  en los términos antes descritos, obligara a REVOLT GAMES a cancelar 
al AFILIADO solo los gastos de traslado, alojamiento y alimentación.
<br><br>
Desde ya, REVOLT GAMES, podrá solicitarle al AFILIADO, todo aquel material auditivo, visual o audiovisual que necesite 
para promocionar o publicitar, a REVOLT GAMES, al AFILIADO  o su contenido, bloque de contenido o programa que este 
conduzca y desarrolle, así como toda intervención directa  del AFILIADO en actividades con idénticos fines.
<br><br>
Se entiende por intervención directa para el uso de este contrato, como la comparecencia personal del AFILIADO, al 
lugar que designe REVOLT GAMES, con el objeto de desarrollar actividades de promoción, fomento y publicidad de mismo 
AFILIADO, alguno de los bloques que el conduzca o desarrolle, o de REVOLT GAMES sea que este implique o no un traslado 
del AFILIADO.
<br><br>
Los pagos que den lugar este artículo deberán ser cancelados, a más tardar, hasta dentro del quinto día hábil contando 
desde el momento que se produce la exigencia o  se acuerda la solicitud, cuando el AFILIADO todavía no haya principiado 
con sus prestación de servicios como conductor o desarrollador de los bloques de contenido.
<br><br>
Con el objeto de facilitar a REVOLT GAMES la representación del AFILIADO, para los fines publicitario, promocionales y 
fomento, tanto del mismo AFILIADO, su contenido, programa o bloque de contenido que conduzca y desarrolle para REVOLT GAMES, 
frente a terceros, sean personas naturales o jurídicas, es que las partes, acuerdan suscribir, con dicho fin, un anexo a 
este contrato.
<br><br>
El AFILIADO tendrá siempre la libertad para poder celebrar contratos publicitarios, laborales o cualquier otro, con toda 
empresa, marca, producto o servicios, que estime conveniente, siempre que estos, no le impidan cumplir íntegramente con 
las disposiciones de este contrato y, especialmente, en lo que dice relación con los derechos publicitarios de REVOLT GAMES, 
que emanan de este artículo.
</article>

<br>

<article>
<span>Quinto.- </span>El AFILIADO declara comprender que desde la suscripción de este contrato, representa 
en su vida profesional, como rostro, junto con los demás afiliados, a la marca registrada REVOLT GAMES, motivo 
por el cual se hace exigible una conducta profesional intachable, tanto fuera como en los horarios de trabajo.
</article>

<br>

<article>
<span>Sexto.- </span>La remuneración por los servicios profesionales del AFILIADO será el equivalente al 
valor neto de <span>'.$DATA_RENTA.'</span>, pagaderas cada 5 (cinco) de cada mes desde que se hagan efectivas las 
prestaciones del AFILIADO. Los pagos se realizaran a la cuenta bancaria que disponga el AFILIADO. Serán de cargo 
de REVOLT GAMES, el pago de la obligación tributaria de retención tributarios.
</article>

<br>

<article>
<span>Séptimo.- </span>Cualquier otro pago que deba realizar REVOLT GAMES al AFILIADO, se verificará junto con 
el pago de los servicios profesionales según los términos y condiciones del artículo precedente, con excepción 
de lo dispuesto en el artículo cuarto inciso final, por el cual, se pueden pagar anticipadamente los servicios 
de promoción, publicidad y fomento, cuando el AFILIADO todavía no ha principiado a dar inicio de sus servicios 
de conducción y desarrollo de los bloques de contenido. Todo pago llevará incluido un desglose financiero, 
informando detalladamente los ítems de pagos.
</article>

<br>

<article>
<span>Octavo.- </span>REVOLT GAMES, no podrá introducir ningún tipo de descuento en las remuneraciones del 
AFILIADO, sino previa notificación y solo cuando se trate del caso, en que este no preste efectivamente sus 
servicios, con excepción de la situación del artículo segundo inciso final, donde no habiendo prestados los 
servicios o prestándolos parcialmente REVOLT GAMES, se encuentra obligado a cancelar los valores, como si 
efectivamente se hubiesen prestado, cuando ha habido retraso en la trasmisión.
</article>

<br>

<article>
<span>Noveno.- </span>El contrato tendrá una duración de 3 (tres) meses, contando desde que se hagan efectivas 
las prestaciones, de conducción y desarrollo del o de los bloques de contenido por parte del AFILIADO. Todo ello 
es sin perjuicio de las obligaciones y derechos contenidas en el artículo cuarto, que son efectivas desde la 
suscripción del contrato. El contrato se prorrogará automáticamente por igual periodo si las partes no 
manifiestan anticipadamente voluntad al contrario. En cada prorroga las parte podrán acordar modificar los 
términos y cláusulas del contrato.
</article>

<br>

<article>
<span>Décimo.- </span>Son obligaciones esenciales del AFILIADO, las siguientes: A) Cumplir fielmente con su 
obligación de conducir y desarrollar los bloques de contenido a que se le encomiendan. B) Encontrarse disponible, 
cuando REVOLT GAMES lo requiera, hasta por 1 (una) hora antes de iniciar el o los bloques de contenidos, con el 
objeto de planificar, coordinar o discutir acerca del desarrollo de los bloques de contenidos. C) Cumplir con 
diligencia las recomendaciones y peticiones de REVOLT GAMES. D) Todo el material Grabado o en Vivo que efectué 
el AFILIADO en cumplimiento del contrato, deberá ser inédito y exclusivo para REVOLT GAMES. 
E) Cumplir con la 
obligación de no prestar servicios a otro contratante, que explote el giro de REVOLT GAMES, en iguales o 
idénticos términos,  con el fin de crear, desarrollar o mantener un canal audiovisual  de trasmisión continua 
y diaria.
</article>

<br>

<article>
<span>Décimo Primero.- </span>Son obligaciones esenciales de REVOLT GAMES, las siguientes: A) Cumplir fielmente 
con la obligación de pagar los servicios profesionales al AFILIADO,  bajo los términos y condiciones establecidas 
en el artículo sexto del presente contrato. B) Poner a disposición del AFILIADO toda colaboración que este 
requiera para desarrollar sus bloques de contenido. C) Actuar de buena fe, en todas las gestiones administrativas 
que digan relación con el AFILIADO, de modo que siempre busque su estabilidad del empleo y perfeccionamiento, 
bajo principios de transparencia, oportunidad de información y bilateralidad.
</article>

<br>

<article>
<span>Décimo Segundo.- </span>El AFILIADO tendrá derecho a vacaciones pagadas: 15 (quince) días hábiles de 
descanso con goce de sueldo, por cada año que dure de manera continua el contrato, pudiendo acumular vacaciones 
como máximo por dos periodos. La fecha en que pueda hacerse efectivas el periodo de vacaciones deberá ser 
acordada con REVOLT GAMES.
</article>

<br>

<article>
<span>Décimo Tercero.- </span>REVOLT GAMES, se hace propietario, del material sea vivo o grabado que genere 
el AFILIADO  en el cumplimiento del contrato, desde su generación misma, pudiendo disponer de ella como mejor 
lo prefiera.
</article>

<br>

<article>
<span>Décimo Cuarto.- </span>Las partes establecen para todos los efectos legales sus domicilios en la ciudad 
y comuna de Concepción República de Chile.
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


$mpdf	=	new mPDF('rf','A4',12,'opensans',20,20,25,25);
$output	=	"Contrato_RPP".$DATA_MODALIDAD."-".$DATA_NACIONALIDAD."-".$DATA_PROGRAMA.".pdf";

// LOAD a stylesheet
$stylesheet = file_get_contents('contratos.css');
$mpdf->WriteHTML($stylesheet,1);	// The parameter 1 tells that this is css/style only and no body/html/text
//--------------------------------------------------------------

$mpdf->WriteHTML($html);
$mpdf->Output($output,'I');
exit;
//==============================================================
//==============================================================
//==============================================================

?>
