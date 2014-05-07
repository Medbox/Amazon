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
        $this->Cell(120,7,'rol �nico tributario n�mero 76.310.987-9, Registro de comercio, n�mero 2626,','',1,'L'); 
        $this->SetFont('opensans-light','',12);
        $this->Cell(125,7,'fojas 3045 vuelta del a�o 2013, legalmente representada por don ','',0,'L'); 
        $this->SetFont('opensans-bold','',12);
        $this->Cell(30,7,'YAMIR RIVERA,','',1,'L');
        $this->SetFont('opensans-bold','',12);
        $this->Cell(25,7,'MALVERDE,','',0,'L');  
        $this->SetFont('opensans-light','',12);
        $this->Cell(145,7,'Abogado, casado, cedula nacional de identidad n�mero 17.349.881-0,','',1,'L'); 
        $this->Cell(170,7,'domiciliado en San Martin 42, Torre Do�a Paula, Depto. 1503 de la comuna y ciudad de','',1,'L');    
        $this->Cell(55,7,'Concepci�n; y por otra, Don ','',0,'L'); 
        $this->SetFont('opensans-bold','',12);   
        $this->Cell(65,7,utf8_decode($DATA_NOMBRE).', [AFILIADO]','',1,'L');        
        $this->SetFont('opensans-light','',12); 
        $this->MultiCell(170,7,utf8_decode($DATA_OCUPACION).', '.$DATA_CIVIL.', cedula nacional de identidad n�mero '.$DATA_RUT.', '.$domiciliado.' en '.utf8_decode($DATA_DOMICILIO).' de la '.utf8_decode($DATA_CIUDAD).', ambos mayores de edad, quienes exponen:',"","J");
        
        $this->Cell(170,7,'','',1);
    }
    
    function articulos($DATA_CARGO,$DATA_RENTA_MONEDA,$DATA_RENTA_ESCRITA){
        $this->SetFont('opensans-bold','',12);   
        $this->Cell(25,7,'Primero.-','',0,'L');        
        $this->SetFont('opensans-light','',12);
        $this->Cell(145,7,'Las partes acuerdan celebrar un contrato de prestaciones de servicios','',1,'L'); 
        $this->MultiCell(170,7,'profesionales y representaci�n, regido por las normas civiles y comerciales chilenas aplicables al caso.',"","J");
        
        $this->ln(4);
        
        $this->SetFont('opensans-bold','',12);
        $this->Cell(25,7,'Segundo.-','',0,'L'); 
        $this->SetFont('opensans-light','',12);
        $this->Cell(145,7,'El contrato de prestaciones de servicios profesionales tendr� por objeto que ','',1,'L'); 
        $this->MultiCell(170,7,'REVOLT GAMES ontrate al AFILIADO para que preste servicios como conductor y desarrollador de los bloques de contenidos n�meros 11 (once), que integran el programa n�mero 11 (once), que va desde las 16.13 (diez y seis horas, trece minutos) pm hasta las 16.57 (diez y seis horas, cincuenta y siete minutos) pm, y los bloques de contenidos diferido n�mero 11 (once), que va desde las 16.13(diez y seis horas, trece minutos) pm hasta las 16.57 (diez y seis horas, cincuenta y siete minutos) pm, una semana los d�as Lunes, Mi�rcoles y Viernes, y la siguiente semana los d�as Martes y Jueves, y as� sucesivamente cada semana. Horas estas, que constituyen para el AFILIDADO, su jornada ordinaria de trabajo.',"","J");
        $this->ln(4);
        $this->MultiCell(170,7,'Con todo, de ocurrir por cualquier motivo, retrasos en las trasmisiones; los bloques de contenido del AFILIADO se entender�n ipso facto retrasadas en su inicio, por igual cantidad de tiempo, salvo que REVOLT GAMES disponga lo contrario. En cuyo caso no se proceder� a su trasmisi�n, o se estar� a una trasmisi�n parcial del o de los bloques. Sin perjuicio de ellos REVOLT GAMES, mantendr� la obligaci�n de cancelar al AFILIADO las cantidades proporcionales que correspondan por la totalidad del bloque o de los bloques, total o parcialmente suspendidos, como si esta si estos se hubiesen llevado a efecto. REVOLT GAMES, no puede modificar el horario del AFILIADO, sino previa audiencia, y solo una vez por cada 90 d�as.',"","J");
        
        $this->ln(4);
        
        $this->SetFont('opensans-bold','',12);
        $this->Cell(25,7,'Tercero.-','',0,'L'); 
        $this->SetFont('opensans-light','',12);
        $this->Cell(145,7,'El AFILIADO deber�, cuando REVOLT GAMES as� lo requiera, estar disponible,','',1,'L');
        $this->MultiCell(170,7,'para sus indicaciones hasta por 1 (una) hora antes de iniciar el o los bloques de contenidos respectivos a que hace referencias el art�culo anterior con el objeto de planificar, coordinar o discutir acerca del desarrollo de los bloques de contenidos. ',"","J");
        $this->ln(4);
        $this->MultiCell(170,7,'Para ello REVOLT GAMES, deber� pagar al AFILIADO, todo tiempo que este entregue para el fin planteado en el inciso anterior, de manera proporcional al precio de cada hora ordinaria de trabajo, las que se calcular�n dividiendo el n�mero total de horas al mes que representen los bloques de contenidos del AFILIADO, a su remuneraci�n neta.',"","J");
        
        $this->ln(5);
        
        $this->SetFont('opensans-bold','',12);
        $this->Cell(25,7,'Cuarto.-','',0,'L'); 
        $this->SetFont('opensans-light','',12);
        $this->Cell(145,7,'El AFILIADO, declara comprender que por la naturaleza y objeto del contrato,','',1,'L');
        $this->MultiCell(170,7,'REVOLT GAMES, cuenta con la capacidad de representaci�n del afiliado en todo lo que sea necesario para poder promover, publicitar y promocionar tanto a la persona del AFILIADO; signo, s�mbolo o cualquier otro distintivo que se use para designarlo; como bloque de contenido que este desarrolle; y/o cualquier otro signo, s�mbolo o cualquier otros distintivo que se use para designar a REVOLT GAMES. Para el cumplimiento del o los fines antes descritos REVOLT GAMES, podr� servirse de la participaci�n directa del AFILIADO en la forma que disponga.',"","J");
        $this->ln(4);
        $this->MultiCell(170,7,'REVOLT GAMES deber� pagar al AFILIADO, por todo el tiempo que este entregue tanto al desarrollo efectivo del o los fines planteado en el inciso anterior como en su traslado, al doble del precio de cada hora ordinaria de trabajo, calculadas en la forma a que se refiere el art�culo tercero en su inciso segundo, adem�s de todo gasto en que haya debido incurrir el AFILIADO con motivos traslado, alojamiento y alimentaci�n. ',"","J");
        $this->ln(4);
        $this->MultiCell(170,7,'Solamente una vez por cada 30 (treinta) d�as REVOLT GAMES podr� exigir al AFILIADO, su participaci�n directa en actividades para fines de promoci�n y publicidad en los t�rminos antes descritos, que impliquen su traslado por m�s de 1 (una) hora. Y solo, una vez por cada 90 (noventa) d�as, la participaci�n directa en actividades con fines de promoci�n y publicidad en los t�rminos antes descritos, obligara a REVOLT GAMES a cancelar al AFILIADO solo los gastos de traslado, alojamiento y alimentaci�n. ',"","J");
        $this->ln(4);
        $this->MultiCell(170,7,'Desde ya, REVOLT GAMES, podr� solicitarle al AFILIADO, todo aquel material auditivo, visual o audiovisual que necesite para promocionar o publicitar, a REVOLT GAMES, al AFILIADO o bloque de contenido que este conduzca y desarrolle, as� como toda intervenci�n directa del AFILIADO en actividades con id�nticos fines. ',"","J");
        $this->ln(4);
        $this->MultiCell(170,7,'Se entiende por intervenci�n directa para el uso de este contrato, como la comparecencia personal del AFILIADO, al lugar que designe REVOLT GAMES, con el objeto de desarrollar actividades de promoci�n , fomento y publicidad de mismo AFILIADO, alguno de los bloques que el conduzca o desarrolle, o de REVOLT GAMES sea que este implique o no un traslado del AFILIADO.',"","J");
        $this->ln(4);
        $this->MultiCell(170,7,'Los pagos que den lugar este art�culo deber�n ser cancelados, a m�s tardar, hasta dentro del quinto d�a h�bil contando desde el momento que se produce la exigencia o se acuerda la solicitud, cuando el AFILIADO todav�a no haya principiado con sus prestaci�n de servicios como conductor o desarrollador de los bloques de contenido.',"","J");
        
        $this->ln(4);
        
        $this->SetFont('opensans-bold','',12);
        $this->Cell(25,7,'Quinto.-','',0,'L'); 
        $this->SetFont('opensans-light','',12);
        $this->Cell(145,7,'El AFILIADO declara comprender que desde la suscripci�n de este contrato,','',1,'L');
        $this->MultiCell(170,7,'representa en su vida profesional, como rostro, junto con los dem�s afiliados, a la marca registrada REVOLT GAMES, motivo por el cual se hace exigible una conducta profesional intachable, tanto fuera como en los horarios de trabajo.',"","J");
        
        $this->ln(4);
        
        $this->SetFont('opensans-bold','',12);
        $this->Cell(18,7,'Sexto.-','',0,'L'); 
        $this->SetFont('opensans-light','',12);
        $this->Cell(152,7,'La remuneraci�n por los servicios profesionales del AFILIADO ser� el equivalente','',1,'L');
        $this->MultiCell(170,7,'al valor neto de 1.000.000 de pesos (un mill�n de pesos), pagaderas cada 5 (cinco) de cada mes desde que se hagan efectivas las prestaciones del AFILIADO. Los pagos se realizaran a la cuenta bancaria que disponga el AFILIADO. Ser�n de cargo de REVOLT GAMES, el pago de la obligaci�n tributaria de retenci�n tributarios.',"","J");
        
        $this->ln(4);
        
        $this->SetFont('opensans-bold','',12); 
        $this->Cell(25,7,'S�ptimo.-','',0,'L');
        $this->SetFont('opensans-light','',12);
        $this->Cell(145,7,'Cualquier otro pago que deba realizar REVOLT GAMES al AFILIADO, se ','',1,'L');
        $this->MultiCell(170,7,'verificar� junto con el pago de los servicios profesionales seg�n los t�rminos y condiciones del art�culo precedente, con excepci�n de lo dispuesto en el art�culo cuarto inciso final, por el cual, se pueden pagar anticipadamente los servicios de promoci�n, publicidad y fomento, cuando el AFILIADO todav�a no ha principiado a dar inicio de sus servicios de conducci�n y desarrollo de los bloques de contenido. Todo pago llevar� incluido un desglose financiero, informando detalladamente los �tems de pagos.',"","J");
        
        $this->ln(4);
        
        $this->SetFont('opensans-bold','',12);
        $this->Cell(20,7,'Octavo.-','',0,'L');
        $this->SetFont('opensans-light','',12);
        $this->Cell(150,7,'REVOLT GAMES, no podr� introducir ning�n tipo de descuento en las ','',1,'L');
        $this->MultiCell(170,7,'remuneraciones del AFILIADO, sino previa notificaci�n y solo cuando se trate del caso, en que este no preste efectivamente sus servicios, con excepci�n de la situaci�n del art�culo segundo inciso final, donde no habiendo prestados los servicios o prest�ndolos parcialmente REVOLT GAMES, se encuentra obligado a cancelar los valores, como si efectivamente se hubiesen prestado, cuando ha habido retraso en la trasmisi�n.',"","J");
        
        $this->ln(4);
        $this->SetFont('opensans-bold','',12);
        $this->Cell(25,7,'Noveno.-','',0,'L');
        $this->SetFont('opensans-light','',12);
        $this->Cell(145,7,'El contrato tendr� una duraci�n de 3 (tres) meses, contando desde que se','',1,'L');
        $this->MultiCell(170,7,'hagan efectivas las prestaciones, de conducci�n y desarrollo del o de los bloques de contenido por parte del AFILIADO. Todo ello es sin perjuicio de las obligaciones y derechos contenidas en el art�culo cuarto, que son efectivas desde la suscripci�n del contrato. El contrato se prorrogar� autom�ticamente por igual periodo si las partes no manifiestan anticipadamente voluntad al contrario. En cada prorroga las parte podr�n acordar modificar los t�rminos y cl�usulas del contrato.',"","J");
        
        $this->ln(4);
        $this->SetFont('opensans-bold','',12);
        $this->Cell(20,7,'D�cimo.-','',0,'L');
        $this->SetFont('opensans-light','',12);
        $this->Cell(150,7,'Son obligaciones esenciales del AFILIADO, las siguientes: A) Cumplir fielmente ','',1,'L');
        $this->MultiCell(170,7,'con su obligaci�n de conducir y desarrollar los bloques de contenido a que se le encomiendan. B) Encontrarse disponible, cuando REVOLT GAMES lo requiera, hasta por 1 (una) hora antes de iniciar el o los bloques de contenidos, con el objeto de planificar, coordinar o discutir acerca del desarrollo de los bloques de contenidos. C) Cumplir con diligencia las recomendaciones y peticiones de REVOLT GAMES. D) Todo el material Grabado o en Vivo que efectu� el AFILIADO en cumplimiento del contrato, deber� ser in�dito y exclusivo para REVOLT GAMES. E) Cumplir con la obligaci�n de no prestar servicios a otro contratante, que explote el giro de REVOLT GAMES, en iguales o id�nticos t�rminos, con el fin de crear, desarrollar o mantener un canal audiovisual de trasmisi�n continua y diaria.',"","J");
        
        $this->ln(4);
        $this->SetFont('opensans-bold','',12);
        $this->Cell(40,7,'D�cimo Primero.-','',0,'L');
        $this->SetFont('opensans-light','',12);
        $this->Cell(130,7,'Son obligaciones esenciales de REVOLT GAMES, las siguientes: A) ','',1,'L');
        $this->MultiCell(170,7,'Cumplir fielmente con la obligaci�n de pagar los servicios profesionales al AFILIADO, bajo los t�rminos y condiciones establecidas en el art�culo sexto del presente contrato. B) Poner a disposici�n del AFILIADO toda colaboraci�n que este requiera para desarrollar sus bloques de contenido. C) Actuar de buena fe, en todas las gestiones administrativas que digan relaci�n con el AFILIADO, de modo que siempre busque su estabilidad del empleo y perfeccionamiento, bajo principios de transparencia, oportunidad de informaci�n y bilateralidad.',"","J");
        
        $this->ln(4);
        $this->SetFont('opensans-bold','',12);
        $this->Cell(40,7,'D�cimo Segundo.-','',0,'L');
        $this->SetFont('opensans-light','',12);
        $this->Cell(130,7,'El AFILIADO tendr� derecho a vacaciones pagadas: 15 (quince) d�as ','',1,'L');
        $this->MultiCell(170,7,'h�biles de descanso con goce de sueldo, por cada a�o que dure de manera continua el contrato, pudiendo acumular vacaciones como m�ximo por dos periodos. La fecha en que pueda hacerse efectivas el periodo de vacaciones deber� ser acordada con REVOLT GAMES.',"","J");
        
        $this->ln(4);
        $this->SetFont('opensans-bold','',12);
        $this->Cell(40,7,'D�cimo Tercero.-','',0,'L');
        $this->SetFont('opensans-light','',12);
        $this->Cell(130,7,'REVOLT GAMES, se hace propietario, del material sea vivo o grabado ','',1,'L');
        $this->MultiCell(170,7,'que genere el AFILIADO en el cumplimiento del contrato, desde su generaci�n misma, pudiendo disponer de ella como mejor lo prefiera.',"","J");
        
        
        $this->ln(4);
        $this->SetFont('opensans-bold','',12);
        $this->Cell(40,7,'D�cimo Cuarto.-','',0,'L');
        $this->SetFont('opensans-light','',12);
        $this->Cell(130,7,'Las partes establecen para todos los efectos legales sus domicilios','',1,'L');
        $this->MultiCell(170,7,'en la ciudad y comuna de Concepci�n Rep�blica de Chile.',"","J");
        
        
        
        
        
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