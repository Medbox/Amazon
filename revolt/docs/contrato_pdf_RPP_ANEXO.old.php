<?php
require '../fpdf/fpdf.php';




class PDF extends FPDF
{
    
    
    function cabecera()
    {
        $this->SetFont('opensans-light','',18);
        $this->Image('../img/revolt_logo.png',85,18,40,11);
        $this->Cell(null,30,'ACUERDO DE REPRESENTACION PUBLICITARIA','',0,'C');        
    }
    
    function fondo($DATA_NOMBRE,$DATA_RUT)
    {
        $this->ln(27);
        $this->SetFont('opensans-light','',10);
		$this->Image('../img/firma_yamir.png',40,225,22,26.89);
        $this->Cell(60,5,'REVOLT GAMES LTDA','',0,'C'); 
        $this->Cell(40,5,'','',0,'L'); 
        $this->Cell(60,5,utf8_decode($DATA_NOMBRE),'',1,'C'); 
        $this->SetFont('opensans-light','',9);
        $this->Cell(60,5,'76.310.987-9','',0,'C'); 
        $this->Cell(40,5,'','',0,'L'); 
        $this->Cell(60,5,$DATA_RUT,'',1,'C');
    }
    
    
    function datos($DATA_NOMBRE,$DATA_RUT,$DATA_SEXO,$DATA_OCUPACION,$DATA_CIVIL,$domiciliado,$DATA_DOMICILIO,$DATA_CIUDAD){;
        $this->ln(30);
        $this->SetFont('opensans-light','',10);
        $this->SetFillColor(255,0,0);
		$this->Cell(70,6,'A '.date("d").' de Diciembre del 2013, por una parte, ','',0,'L');
		$this->SetFont('opensans-bold','',10);  
        $this->Cell(78,6,'REVOLT GAMES LIMITADA [REVOLT GAMES],','',0,'L');
        $this->SetFont('opensans-light','',10);
        $this->Cell(18,6,'rol único','',1,'L');
        //--------------
		$this->Cell(NULL,6,'tributario número 76.310.987-9, Registro de comercio, número 2626, Fojas 3045 vuelta del año 2013,','',1,'J'); 
		$this->SetFont('opensans-light','',10);
        $this->Cell(55,6,'legalmente representada por don ','',0,'L'); 
        $this->SetFont('opensans-bold','',10);
        $this->Cell(47,6,'YAMIR RIVERA MALVERDE,','',0,'L');
        $this->SetFont('opensans-light','',10);
        $this->Cell(145,6,'Abogado, casado, cedula nacional de','',1,'L'); 
        
		$this->Cell(53,6,'identidad número 17.349.881-0,','',0,'L');		
		$this->Cell(170,6,'domiciliado en San Martin 42, Torre Doña Paula, Depto. 1503 de la','',1,'L');
		
		$this->Cell(79,6,'comuna y ciudad de Concepción; y por otra, Don ','',0,'L'); 
        
		$this->SetFont('opensans-bold','',10);   
        $this->Cell(75,6,utf8_decode($DATA_NOMBRE).', [AFILIADO]','',1,'L');        
        $this->SetFont('opensans-light','',10); 
        $this->MultiCell(170,6,utf8_decode($DATA_OCUPACION).', '.$DATA_CIVIL.', cedula nacional de identidad número '.$DATA_RUT.', '.$domiciliado.' en '.utf8_decode($DATA_DOMICILIO).' de la '.utf8_decode($DATA_CIUDAD).', ambos mayores de edad, quienes exponen:',"","J");
        
        $this->Cell(170,7,'','',1);
    }
    
    function articulos($DATA_CARGO,$DATA_RENTA_MONEDA,$DATA_RENTA_ESCRITA){
        
		$alto	=	6;
		
		$this->SetFont('opensans-bold','',10);   
        $this->Cell(20,$alto,'Primero.-','',0,'L');        
        $this->SetFont('opensans-light','',10);
        
		$this->Cell(150,$alto,'El presente acuerdo, es un anexo que se adjunta al contrato principal que tiene por,','',1,'L'); 
        $this->MultiCell(170,$alto,'objeto, el de dejar constancia sumaria de los derechos de representación que REVOLT GAMES detenta sobre la persona del AFILIADO, su contenido que genera en cumplimiento del contrato principal, signo, símbolo o cualquier otro distintivo que se use para designarlo, para los fines que más adelante se señalan.',"","J");
        
        $this->ln(4);
		
        $this->SetFont('opensans-bold','',10);
        $this->Cell(20,$alto,'Segundo.-','',0,'L');
        $this->SetFont('opensans-light','',10);
        
		$this->Cell(150,$alto,'REVOLT GAMES, cuenta con la capacidad de representación del AFILIADO','',1,'L');
        $this->MultiCell(170,$alto,'en todo lo que sea necesario, para promover, publicitar y promocionar tanto a la persona misma del AFILIADO; signo, símbolo o cualquier otro distintivo que se use para designarlo; como el contenido, bloque de contenido o programa que este conduzca o desarrolle;  y/o cualquier otro signo, símbolo o cualquier otros distintivo que se use para designar a REVOLT GAMES.',"","J");
		$this->ln(4);
        $this->MultiCell(170,$alto,"El AFILIADO tendrá siempre la libertad para poder celebrar contratos publicitarios, laborales o cualquier otro, con toda empresa, marca, producto o servicios, que estime conveniente, sobre espacio de trasmisión, materiales o contenidos distintos de los que genere en el cumplimiento del contrato principal, siempre que estos, no le impidan cumplir íntegramente con las disposiciones de este contrato principal y, especialmente, en lo que dice relación con los derechos publicitarios de REVOLT GAMES, que dé el emanan.","J");
        $this->ln(4);

        $this->SetFont('opensans-light','',10);
        $this->MultiCell(170,$alto,'.- Firman las parte previa lectura, en dos copias, una para REVOLT GAMES y otra para el AFILIADO .-',"","J");
        
        $this->Cell(190,4,'','',1);
    }
}

session_start();

require_once("../class/Class.Funcionario.php");
require_once("../class/Class.Contrato.php");


$fun_id		=	$_SESSION['fun_id'];
//$fun_id         =   3;

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