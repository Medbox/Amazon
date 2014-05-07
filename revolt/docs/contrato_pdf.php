<?php
require '../fpdf/fpdf.php';




class PDF extends FPDF
{
    
    
    /*function Header()
    {
        $this->SetFont('Arial','B',24);
        $this->Image('../img/revolt_logo.png',70,5,70,20);
        $this->Cell(190,50,'CONTRATO DE PROMESA','',0,'C');        
    }*/
    
    function cabecera()
    {
        $this->SetFont('opensans-light','',20);
        $this->Image('../img/revolt_logo.png',85,25,40,11);
        $this->Cell(null,30,'Contrato de Promesa','',0,'C');        
    }
    
    function fondo($DATA_NOMBRE,$DATA_RUT)
    {
        $this->ln(27);
        $this->SetFont('opensans-light','',10);
        $this->Image('../img/firma_yamir.png',37,95,22,26.89);
        $this->Cell(60,5,'REVOLT GAMES LTDA','',0,'C'); 
        $this->Cell(50,5,'','',0,'L'); 
        $this->Cell(60,5,$DATA_NOMBRE,'',1,'C'); 
        $this->Cell(60,5,'','',0,'L'); 
        $this->Cell(50,5,'','',0,'L');
        $this->SetFont('opensans-light','',9); 
        $this->Cell(60,5,$DATA_RUT,'',1,'C'); 
    }
    
    
    function datos($DATA_NOMBRE,$DATA_RUT,$DATA_SEXO,$DATA_OCUPACION,$DATA_CIVIL,$domiciliado,$DATA_DOMICILIO,$DATA_CIUDAD){;
        $this->ln(40);
        $this->SetFont('opensans-light','',12);
        $this->Cell(84,7,'A '.date("d").' de Diciembre del 2013, por una parte, ','',0,'L');
        $this->SetFont('opensans-bold','',12);  
        $this->Cell(30,7,'REVOLT GAMES LIMITADA [REVOLT,','',1,'L');
        $this->Cell(18,7,'GAMES],','',0,'L'); 
        $this->SetFont('opensans-light','',12);
        $this->Cell(120,7,'rol único tributario número 76.310.987-9, Registro de comercio, número 2626,','',1,'L'); 
        $this->SetFont('opensans-light','',12);
        $this->Cell(125,7,'fojas 3045 vuelta del año 2013, legalmente representada por don ','',0,'L'); 
        $this->SetFont('opensans-bold','',12);
        $this->Cell(30,7,'YAMIR RIVERA,','',1,'L');
        $this->SetFont('opensans-bold','',12);
        $this->Cell(25,7,'MALVERDE,','',0,'L');  
        $this->SetFont('opensans-light','',12);
        $this->Cell(145,7,'Abogado, casado, cedula nacional de identidad número 17.349.881-0,','',1,'L'); 
        $this->Cell(170,7,'domiciliado en San Martin 42, Torre Doña Paula, Depto. 1503 de la comuna y ciudad de','',1,'L');    
        $this->Cell(55,7,'Concepción; y por otra, Don ','',0,'L'); 
        $this->SetFont('opensans-bold','',12);   
        $this->Cell(65,7,utf8_decode($DATA_NOMBRE).', [AFILIADO]','',1,'L');        
        $this->SetFont('opensans-light','',12); 
        $this->MultiCell(170,7,utf8_decode($DATA_OCUPACION).', '.$DATA_CIVIL.', cedula nacional de identidad número '.$DATA_RUT.', '.$domiciliado.' en '.utf8_decode($DATA_DOMICILIO).' de la '.utf8_decode($DATA_CIUDAD).', ambos mayores de edad, quienes exponen:',"","J");
        
        $this->Cell(170,7,'','',1);
    }
    
    function articulos($DATA_CARGO,$DATA_RENTA_MONEDA,$DATA_RENTA_ESCRITA){
        $this->SetFont('opensans-bold','',12);   
        $this->Cell(25,7,'Primero.-','',0,'L');        
        $this->SetFont('opensans-light','',12);
        $this->Cell(145,7,'Las partes acuerdan celebrar un contrato de prestaciones de servicios','',1,'L'); 
        $this->MultiCell(170,7,'profesionales y representación, regido por las normas civiles y comerciales chilenas aplicables al caso.',"","J");
        
        $this->ln(4);
        
        $this->SetFont('opensans-bold','',12);
        $this->Cell(25,7,'Segundo.-','',0,'L'); 
        $this->SetFont('opensans-light','',12);
        $this->Cell(145,7,'El contrato de prestaciones de servicios profesionales tendrá por objeto que ','',1,'L'); 
        $this->MultiCell(170,7,'REVOLT GAMES ontrate al AFILIADO para que preste servicios como conductor y desarrollador de los bloques de contenidos números 11 (once), que integran el programa número 11 (once), que va desde las 16.13 (diez y seis horas, trece minutos) pm hasta las 16.57 (diez y seis horas, cincuenta y siete minutos) pm, y los bloques de contenidos diferido número 11 (once), que va desde las 16.13(diez y seis horas, trece minutos) pm hasta las 16.57 (diez y seis horas, cincuenta y siete minutos) pm, una semana los días Lunes, Miércoles y Viernes, y la siguiente semana los días Martes y Jueves, y así sucesivamente cada semana. Horas estas, que constituyen para el AFILIDADO, su jornada ordinaria de trabajo.',"","J");
        $this->ln(4);
        $this->MultiCell(170,7,'Con todo, de ocurrir por cualquier motivo, retrasos en las trasmisiones; los bloques de contenido del AFILIADO se entenderán ipso facto retrasadas en su inicio, por igual cantidad de tiempo, salvo que REVOLT GAMES disponga lo contrario. En cuyo caso no se procederá a su trasmisión, o se estará a una trasmisión parcial del o de los bloques. Sin perjuicio de ellos REVOLT GAMES, mantendrá la obligación de cancelar al AFILIADO las cantidades proporcionales que correspondan por la totalidad del bloque o de los bloques, total o parcialmente suspendidos, como si esta si estos se hubiesen llevado a efecto. REVOLT GAMES, no puede modificar el horario del AFILIADO, sino previa audiencia, y solo una vez por cada 90 días.',"","J");
        
        $this->ln(4);
        
        $this->SetFont('opensans-bold','',12);
        $this->Cell(25,7,'Tercero.-','',0,'L'); 
        $this->SetFont('opensans-light','',12);
        $this->Cell(145,7,'El AFILIADO deberá, cuando REVOLT GAMES así lo requiera, estar disponible,','',1,'L');
        $this->MultiCell(170,7,'para sus indicaciones hasta por 1 (una) hora antes de iniciar el o los bloques de contenidos respectivos a que hace referencias el artículo anterior con el objeto de planificar, coordinar o discutir acerca del desarrollo de los bloques de contenidos. ',"","J");
        $this->ln(4);
        $this->MultiCell(170,7,'Para ello REVOLT GAMES, deberá pagar al AFILIADO, todo tiempo que este entregue para el fin planteado en el inciso anterior, de manera proporcional al precio de cada hora ordinaria de trabajo, las que se calcularán dividiendo el número total de horas al mes que representen los bloques de contenidos del AFILIADO, a su remuneración neta.',"","J");
        
        $this->ln(5);
        
        $this->SetFont('opensans-bold','',12);
        $this->Cell(25,7,'Cuarto.-','',0,'L'); 
        $this->SetFont('opensans-light','',12);
        $this->Cell(145,7,'El AFILIADO, declara comprender que por la naturaleza y objeto del contrato,','',1,'L');
        $this->MultiCell(170,7,'REVOLT GAMES, cuenta con la capacidad de representación del afiliado en todo lo que sea necesario para poder promover, publicitar y promocionar tanto a la persona del AFILIADO; signo, símbolo o cualquier otro distintivo que se use para designarlo; como bloque de contenido que este desarrolle; y/o cualquier otro signo, símbolo o cualquier otros distintivo que se use para designar a REVOLT GAMES. Para el cumplimiento del o los fines antes descritos REVOLT GAMES, podrá servirse de la participación directa del AFILIADO en la forma que disponga.',"","J");
        $this->ln(4);
        $this->MultiCell(170,7,'REVOLT GAMES deberá pagar al AFILIADO, por todo el tiempo que este entregue tanto al desarrollo efectivo del o los fines planteado en el inciso anterior como en su traslado, al doble del precio de cada hora ordinaria de trabajo, calculadas en la forma a que se refiere el artículo tercero en su inciso segundo, además de todo gasto en que haya debido incurrir el AFILIADO con motivos traslado, alojamiento y alimentación. ',"","J");
        $this->ln(4);
        $this->MultiCell(170,7,'Solamente una vez por cada 30 (treinta) días REVOLT GAMES podrá exigir al AFILIADO, su participación directa en actividades para fines de promoción y publicidad en los términos antes descritos, que impliquen su traslado por más de 1 (una) hora. Y solo, una vez por cada 90 (noventa) días, la participación directa en actividades con fines de promoción y publicidad en los términos antes descritos, obligara a REVOLT GAMES a cancelar al AFILIADO solo los gastos de traslado, alojamiento y alimentación. ',"","J");
        $this->ln(4);
        $this->MultiCell(170,7,'Desde ya, REVOLT GAMES, podrá solicitarle al AFILIADO, todo aquel material auditivo, visual o audiovisual que necesite para promocionar o publicitar, a REVOLT GAMES, al AFILIADO o bloque de contenido que este conduzca y desarrolle, así como toda intervención directa del AFILIADO en actividades con idénticos fines. ',"","J");
        $this->ln(4);
        $this->MultiCell(170,7,'Se entiende por intervención directa para el uso de este contrato, como la comparecencia personal del AFILIADO, al lugar que designe REVOLT GAMES, con el objeto de desarrollar actividades de promoción , fomento y publicidad de mismo AFILIADO, alguno de los bloques que el conduzca o desarrolle, o de REVOLT GAMES sea que este implique o no un traslado del AFILIADO.',"","J");
        $this->ln(4);
        $this->MultiCell(170,7,'Los pagos que den lugar este artículo deberán ser cancelados, a más tardar, hasta dentro del quinto día hábil contando desde el momento que se produce la exigencia o se acuerda la solicitud, cuando el AFILIADO todavía no haya principiado con sus prestación de servicios como conductor o desarrollador de los bloques de contenido.',"","J");
        
        $this->ln(4);
        
        $this->SetFont('opensans-bold','',12);
        $this->Cell(25,7,'Quinto.-','',0,'L'); 
        $this->SetFont('opensans-light','',12);
        $this->Cell(145,7,'El AFILIADO declara comprender que desde la suscripción de este contrato,','',1,'L');
        $this->MultiCell(170,7,'representa en su vida profesional, como rostro, junto con los demás afiliados, a la marca registrada REVOLT GAMES, motivo por el cual se hace exigible una conducta profesional intachable, tanto fuera como en los horarios de trabajo.',"","J");
        
        $this->ln(4);
        
        $this->SetFont('opensans-bold','',12);
        $this->Cell(18,7,'Sexto.-','',0,'L'); 
        $this->SetFont('opensans-light','',12);
        $this->Cell(152,7,'La remuneración por los servicios profesionales del AFILIADO será el equivalente','',1,'L');
        $this->MultiCell(170,7,'al valor neto de 1.000.000 de pesos (un millón de pesos), pagaderas cada 5 (cinco) de cada mes desde que se hagan efectivas las prestaciones del AFILIADO. Los pagos se realizaran a la cuenta bancaria que disponga el AFILIADO. Serán de cargo de REVOLT GAMES, el pago de la obligación tributaria de retención tributarios.',"","J");
        
        $this->ln(4);
        
        $this->SetFont('opensans-bold','',12); 
        $this->Cell(25,7,'Séptimo.-','',0,'L');
        $this->SetFont('opensans-light','',12);
        $this->Cell(145,7,'Cualquier otro pago que deba realizar REVOLT GAMES al AFILIADO, se ','',1,'L');
        $this->MultiCell(170,7,'verificará junto con el pago de los servicios profesionales según los términos y condiciones del artículo precedente, con excepción de lo dispuesto en el artículo cuarto inciso final, por el cual, se pueden pagar anticipadamente los servicios de promoción, publicidad y fomento, cuando el AFILIADO todavía no ha principiado a dar inicio de sus servicios de conducción y desarrollo de los bloques de contenido. Todo pago llevará incluido un desglose financiero, informando detalladamente los ítems de pagos.',"","J");
        
        $this->ln(4);
        
        $this->SetFont('opensans-bold','',12);
        $this->Cell(20,7,'Octavo.-','',0,'L');
        $this->SetFont('opensans-light','',12);
        $this->Cell(150,7,'REVOLT GAMES, no podrá introducir ningún tipo de descuento en las ','',1,'L');
        $this->MultiCell(170,7,'remuneraciones del AFILIADO, sino previa notificación y solo cuando se trate del caso, en que este no preste efectivamente sus servicios, con excepción de la situación del artículo segundo inciso final, donde no habiendo prestados los servicios o prestándolos parcialmente REVOLT GAMES, se encuentra obligado a cancelar los valores, como si efectivamente se hubiesen prestado, cuando ha habido retraso en la trasmisión.',"","J");
        
        $this->ln(4);
        $this->SetFont('opensans-bold','',12);
        $this->Cell(25,7,'Noveno.-','',0,'L');
        $this->SetFont('opensans-light','',12);
        $this->Cell(145,7,'El contrato tendrá una duración de 3 (tres) meses, contando desde que se','',1,'L');
        $this->MultiCell(170,7,'hagan efectivas las prestaciones, de conducción y desarrollo del o de los bloques de contenido por parte del AFILIADO. Todo ello es sin perjuicio de las obligaciones y derechos contenidas en el artículo cuarto, que son efectivas desde la suscripción del contrato. El contrato se prorrogará automáticamente por igual periodo si las partes no manifiestan anticipadamente voluntad al contrario. En cada prorroga las parte podrán acordar modificar los términos y cláusulas del contrato.',"","J");
        
        $this->ln(4);
        $this->SetFont('opensans-bold','',12);
        $this->Cell(20,7,'Décimo.-','',0,'L');
        $this->SetFont('opensans-light','',12);
        $this->Cell(150,7,'Son obligaciones esenciales del AFILIADO, las siguientes: A) Cumplir fielmente ','',1,'L');
        $this->MultiCell(170,7,'con su obligación de conducir y desarrollar los bloques de contenido a que se le encomiendan. B) Encontrarse disponible, cuando REVOLT GAMES lo requiera, hasta por 1 (una) hora antes de iniciar el o los bloques de contenidos, con el objeto de planificar, coordinar o discutir acerca del desarrollo de los bloques de contenidos. C) Cumplir con diligencia las recomendaciones y peticiones de REVOLT GAMES. D) Todo el material Grabado o en Vivo que efectué el AFILIADO en cumplimiento del contrato, deberá ser inédito y exclusivo para REVOLT GAMES. E) Cumplir con la obligación de no prestar servicios a otro contratante, que explote el giro de REVOLT GAMES, en iguales o idénticos términos, con el fin de crear, desarrollar o mantener un canal audiovisual de trasmisión continua y diaria.',"","J");
        
        $this->ln(4);
        $this->SetFont('opensans-bold','',12);
        $this->Cell(40,7,'Décimo Primero.-','',0,'L');
        $this->SetFont('opensans-light','',12);
        $this->Cell(130,7,'Son obligaciones esenciales de REVOLT GAMES, las siguientes: A) ','',1,'L');
        $this->MultiCell(170,7,'Cumplir fielmente con la obligación de pagar los servicios profesionales al AFILIADO, bajo los términos y condiciones establecidas en el artículo sexto del presente contrato. B) Poner a disposición del AFILIADO toda colaboración que este requiera para desarrollar sus bloques de contenido. C) Actuar de buena fe, en todas las gestiones administrativas que digan relación con el AFILIADO, de modo que siempre busque su estabilidad del empleo y perfeccionamiento, bajo principios de transparencia, oportunidad de información y bilateralidad.',"","J");
        
        $this->ln(4);
        $this->SetFont('opensans-bold','',12);
        $this->Cell(40,7,'Décimo Segundo.-','',0,'L');
        $this->SetFont('opensans-light','',12);
        $this->Cell(130,7,'El AFILIADO tendrá derecho a vacaciones pagadas: 15 (quince) días ','',1,'L');
        $this->MultiCell(170,7,'hábiles de descanso con goce de sueldo, por cada año que dure de manera continua el contrato, pudiendo acumular vacaciones como máximo por dos periodos. La fecha en que pueda hacerse efectivas el periodo de vacaciones deberá ser acordada con REVOLT GAMES.',"","J");
        
        $this->ln(4);
        $this->SetFont('opensans-bold','',12);
        $this->Cell(40,7,'Décimo Tercero.-','',0,'L');
        $this->SetFont('opensans-light','',12);
        $this->Cell(130,7,'REVOLT GAMES, se hace propietario, del material sea vivo o grabado ','',1,'L');
        $this->MultiCell(170,7,'que genere el AFILIADO en el cumplimiento del contrato, desde su generación misma, pudiendo disponer de ella como mejor lo prefiera.',"","J");
        
        
        $this->ln(4);
        $this->SetFont('opensans-bold','',12);
        $this->Cell(40,7,'Décimo Cuarto.-','',0,'L');
        $this->SetFont('opensans-light','',12);
        $this->Cell(130,7,'Las partes establecen para todos los efectos legales sus domicilios','',1,'L');
        $this->MultiCell(170,7,'en la ciudad y comuna de Concepción República de Chile.',"","J");
        
        
        
        
        
        $this->ln(4);
        $this->SetFont('opensans-light','',10);
        $this->MultiCell(170,7,'.- Firman las partes previa lectura y en dos copias, una para el Promitente y otra para el Promisorio.-',"","J");
        
        $this->Cell(190,4,'','',1);
    }
}

session_start();

require_once("../class/Class.Funcionario.php");
require_once("../class/Class.Contrato.php");


//$fun_id		=	$_SESSION['fun_id'];
$fun_id         =   3;

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



$arr_renta = explode('(',$DATA_RENTA);



$pdf = new PDF('P','mm','A4', NULL, NULL, NULL,NULL, NULL,NULL,NULL,NULL,NULL,NULL,NULL);
$pdf->SetMargins(20, 25 , 20); 
$pdf->SetAutoPageBreak(true,25);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->AddFont('opensans-light','','OpenSans-Light.php');
$pdf->AddFont('opensans-bold','','OpenSans-Bold.php');


$pdf->Cell(0,0,$pdf->cabecera(),0,1);
$pdf->Cell(0,0,$pdf->datos($DATA_NOMBRE,$DATA_RUT,$DATA_SEXO,$DATA_OCUPACION,$DATA_CIVIL,$domiciliado,$DATA_DOMICILIO,$DATA_CIUDAD),0,1);
$pdf->Cell(0,0,$pdf->articulos($DATA_CARGO,$arr_renta[0],$arr_renta[1]),0,1);
$pdf->Cell(0,0,$pdf->fondo($DATA_NOMBRE,$DATA_RUT),0,1);
$pdf->Output();


?>