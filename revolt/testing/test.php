<?php
require_once('../lib/fpdf/writetag.php');

$pdf=new PDF_WriteTag();
$pdf->SetMargins(30,15,25);
$pdf->SetFont('courier','',12);
$pdf->AddPage();

// Stylesheet
$pdf->SetStyle("p","courier","N",12,"10,100,250",15);
$pdf->SetStyle("h1","times","N",18,"102,0,102",0);
$pdf->SetStyle("a","times","BU",9,"0,0,255");
$pdf->SetStyle("pers","times","I",0,"255,0,0");
$pdf->SetStyle("place","arial","U",0,"153,0,0");
$pdf->SetStyle("vb","times","B",0,"102,153,153");

// Title
$txt="<h1>Le petit chaperon rouge</h1>";
$pdf->SetLineWidth(0.5);
$pdf->SetFillColor(255,255,204);
$pdf->SetDrawColor(102,0,102);
$pdf->WriteTag(0,10,$txt,1,"C",1,5);

$pdf->Ln(15);

// Text
$txt='
<div class="ctr_wrap">

	<div class="ctr_header">
    	<div style="height:30px;"></div>
    	<div class="ctr_header_logo"><img src="../img/login_logo.png" width="280" height="80"  alt=""/></div>
    	<div class="ctr_header_title">Contrato de Promesa</div>
        <input type="hidden" id="hi_con_id" value="<?php echo $con_id; ?>">
    </div>
    
    <div class="ctr_body">
    	
        <div class="ctr_body_p1">
        En Concepci�n a <?php echo date("d"); ?> de Diciembre del 2013, por una parte y como Promitente <span>REVOLT GAMES LIMITADA</span>, 
        rol �nico tributario n�mero 76.310.987-9, constituida por escritura p�blica otorgada ante el notario de 
        Concepci�n don Ram�n Garc�a Carrasco, de fecha veintiuno de Octubre del dos mil trece,  e inscrita en el 
        conservador de bienes ra�ces de Concepci�n, registro de comercio, n�mero 2626, fojas 3045 vuelta del a�o 2013, 
        la que por dicho instrumento, es legalmente representada por don <span>YAMIR RIVERA MALVERDE</span>, Estudiante, 
        casado, cedula nacional de identidad n�mero 17.349.881-0, domiciliado en San Martin 42, torre do�a paula, depto. 
        1503 de la comuna y ciudad de Concepci�n; y por otra y como promisorio don <span><?php echo $DATA_NOMBRE; ?></span>, 
        <?php echo $DATA_OCUPACION; ?>, <?php echo $DATA_CIVIL; ?>, cedula nacional de identidad n�mero 
        <?php echo $DATA_RUT; ?>, <?php echo $domiciliado; ?> en <?php echo $DATA_DOMICILIO; ?> de la <?php echo $DATA_CIUDAD; ?>, ambos mayores de edad, quienes exponen:
        </div>
        
        <article>
        <span>Art�culo 1.- </span>Ambos acuerdan celebrar un contrato de promesa regido por las normas del art�culo 1554 del C�digo Civil, con el objeto prometer la celebraci�n y otorgamiento de un contrato de prestaciones de servicios profesionales regidos por las normas de este contrato y por las establecidas por el C�digo Civil y de Comercio, aplicables al caso. 
        </article>
        
        <article>
        <span>Art�culo 2.- </span>El contrato prometido, tendr� por objeto que el Promitente contrate al Promisorio, para que este preste sus servicios profesionales, como <?php echo $DATA_CARGO; ?>; para satisfacer todas las peticiones que el Promitente hiciere sobre materias de sus competencias; y toda labor propia a los estudios profesionales y t�cnicos que el Promisorio detenta.
        </article>
        
        <article>
        <span>Art�culo 3.- </span>El pago por las prestaciones corresponder� al valor de <?php echo $DATA_RENTA; ?> mensuales, pagaderas cada d�a 5 (cinco) de cada mes, a las cuales se le aplicar�n los descuentos legales y tributarios respectivos. Los pagos se realizar�n en efectivo depositados a la cuenta bancaria que disponga en el Promisorio en el contrato definitivo.
        </article>
        
        <article>
        <span>Art�culo 4.- </span>El contrato prometido tendr� una vigencia de 1 (un) meses, contando desde su celebraci�n y otorgamiento. La que se prorrogar� indefinidamente si las partes no manifiestan voluntad al contrario.
        </article>
        
        <article>
        <span>Art�culo 5.- </span>Ser�n obligaciones del Promisorio: (A) Cumplir con las labores en la fecha encomendadas por el Promitente. (B) Asistir a las reuniones que solicite el Promitente. (C) Ejercer sus labores con seriedad y diligencia. (D) atender todas las recomendaciones y solicitudes con la mayor prontitud.
        </article>
        
        <article>
        <span>Art�culo 6.- </span>Ser�n obligaciones del promitente: (A) Cancelar los honorarios en el tiempo y forma pactados (B) Otorgar toda la ayuda necesaria para que el Promisorio pueda cumplir sus funciones.
        </article>
        
        <article>
        <span>Art�culo 7.- </span>El contrato definitivo podr� ser terminado en cualquier tiempo por el Promitente, por incumplimiento de las obligaciones del Promisorio.
        </article>
        
        <article>
        <span>Art�culo 8.- </span>El contrato definitivo ser� celebrado y otorgado al momento de que el Promitente cuente con los recursos necesarios para hacer pagos totales equivalente a un mes, a todos los Promisorios con quienes tenga similares obligaciones, donde se incluya esta id�ntica clausula. Todo ello sin perjuicio de que el Promitente puede en cualquier momento adelantar la celebraci�n y otorgamiento de los contrato definitivos con quien estime necesario, aun cuando no cuente con los recursos para hacer la totalidad de los pagos a todos los promisorios o destinar recursos para hacer pagos a situaciones de implementaci�n de oficinas o bienes y servicios que sean necesarios para producir la renta del Promitente, las que ser�n deducidas para los c�lculos a que se refiere esta cl�usula.
        </article>
        
        <article>
        <span>Art�culo 9.- </span>Para cualquier controversia o contienda, que deriven este contrato, las partes acuerdan sus domicilios en la ciudad y comuna de Concepci�n, para todos los efectos legales.
        </article>
        
        <div style="height:70px;"></div>
        	
            
        
        <div style="height:180px;"></div>
        
    </div>

</div>
';

$pdf->SetLineWidth(0.1);
$pdf->SetFillColor(255,255,204);
$pdf->SetDrawColor(102,0,102);
$pdf->WriteTag(0,10,$txt,1,"J",0,7);

$pdf->Ln(5);

// Signature
$txt="<a href='http://www.pascal-morin.net'>Done by Pascal MORIN</a>";
$pdf->WriteTag(0,10,$txt,0,"R");

$pdf->Output();
?>