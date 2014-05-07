<style>
.programacion_header{
	height:80px;
	background-color:#e8eaed;
	border-bottom:1px solid #c6c7cc;
	}
.programacion_body{
	position:absolute;
	width:100%;
	top:81px;
	bottom:0px;
	overflow-y:auto;
	/*background-color:#F96;*/
	}

/*-------------------------------------------------------------*/

.programacion_body_left{
	float:left;
	width:78%;
	margin-left:1%;
	margin-top:10px;
	margin-bottom:50px;
	background-color:#fff;
	min-height:100px;
	}
.programacion_body_right{
	float:right;
	width:19%;
	margin-right:1%;
	margin-top:10px;
	margin-bottom:10px;
	background-color:#ffffff;
	min-height:350px;
	}

/*-------------------------------------------------------------*/
/*	programacion_body_right : pbr	*/
/*-------------------------------------------------------------*/

.pbr_header{
	height:70px;
	background-color:#5f767e;
	}
.pbr_header_text{
	float:left;
	height:40px;
	width:37%;
	margin:6% 0px 0px 8%;
	/*background-color:#09C;*/
	color:#FFF;
	font-size:15px;
	}
.pbr_header_horas{
	float:left;
	text-align:center;
	height:50px;
	width:47%;
	margin:4% 0px 0px 0%;
	/*background-color:#F99;*/
	color:#FFF;
	font-family:OpenSansExtrabold;
	font-size:40px;
	}
.pbr_header_horas > span{
	font-family:OpenSansLight;
	font-size:18px;
	}

.pbr_item{
	float:left;
	margin-top:5px;
	margin-left:5%;
	height:50px;
	width:90%;
	background-color:#8cb0c7;
	color:#FFF;
	}
.pbr_item_text{
	font-size: 14px;
	float:left;
	width:58%;
	text-align:left;
	margin-top:3%;
	margin-left:5%;
	background-color:#8cb0c7;
	}
.pbr_item_value{
	float:right;
	font-family:OpenSansExtrabold;
	font-size: 30px;
	text-align:center;
	height:50px;
	line-height:50px;
	width:37%;
	background-color:#7897ab;
	}

.pbr_item_decimal{
	font-family:OpenSansLight;
	font-size:16px;
	}

/*-------------------------------------------------------------*/
/*	programacion_body_left : pbl	*/
/*-------------------------------------------------------------*/

.pbl_columna_horas{
	float:left;
	width:7.5%;
	/*background-color:#999;*/
	min-height:400px;
	}
.pbl_columna_dia{
	float:left;
	width:18.5%;
	/*background-color:#6C3;*/
	min-height:400px;
	position:relative;
	}

.pbl_columna_title{
	height:30px;
	line-height:30px;
	background-color:#5f767e;
	text-align:center;
	color:#FFF;
	font-size:14px;
	}


.pbl_columna_celda1,.pbl_columna_celda2{
	background-color:#d4d4d4;
	height:35px;/*36*/
	line-height:35px;
	text-align:center;
	font-size:10px;
	margin-bottom:1px;
	}
.pbl_columna_celda1:last-child,.pbl_columna_celda2:last-child{
	margin-bottom:none;
	}
.pbl_columna_celda2{
	background-color:#ffffff;
	}


.pbl_columna_bloque{
	position: absolute;
	width: 100%;
	height:50px;
	background-color:#693;
	border-left:1px solid #FFF;
	font-size:11px;
	}

/*-------------------------------------------------------------*/

#btn_buscar_medico{
	width:120px;
	height:60px;
	background-color:#84c7a8;
	float:left;
	margin:11px 0px 0px 24px;
	text-align:center;
	cursor:pointer;
	}
#btn_buscar_medico:active{
	background-color:#68a88a;
	}	
#btn_buscar_medico > span{
	display:block;
	margin-top:12px;
	color:#FFF;
	font-size:14px;
	}
#div_medico{
	float:left;
	height:60px;
	margin-top:11px;
	margin-left:20px;
	min-width:100px;
	/*background-color:#FC6;*/
	}
#div_medico_img{
	float:left;
	margin-top:3px;
	-webkit-clip-path: rectangle(0px, 0px, 55px, 55px, 55px, 55px);
	}
#div_medico_wrap{
	float:left;
	margin-left:10px;
	color:#50585b;
	}
#div_medico_nombre{		font-size:24px; height:30px; margin-top:5px;	}
#div_medico_descripcion{font-size:16px; height:20px; line-height:20px;}


/*-------------------------------------------------*/

#div_horas_contratadas{
	float:left;
	margin-top:11px;
	margin-left:100px;
	height:60px;
	width:160px;
	background-color:#8cb0c7;
	color:#FFF;
	}
#div_horas_programables{
	float:left;
	margin-top:11px;
	margin-left:10px;
	height:60px;
	width:170px;
	background-color:#8cb0c7;
	color:#FFF;
	}
.div_horas_text{
	font-size: 14px;
	float:left;
	width:85px;
	text-align:left;
	margin-top:12px;
	margin-left:12px;
	background-color:#8cb0c7;
	/*background-color:#F00;*/
	}
.div_horas_value{
	float:right;
	font-family:OpenSansExtrabold;
	font-size: 30px;
	text-align:center;
	height:60px;
	line-height:60px;
	width:60px;
	background-color:#7897ab;
	}



/*-------------------------------------------------------------*/
.bloque_color_1{	background-color:#56dea7;	}
.bloque_color_2{	background-color:#5ca7df;	}
.bloque_color_3{	background-color:#ff7659;	}
.bloque_color_4{	background-color:#f26175;	}
.bloque_color_5{	background-color:#9e7ac2;	}
.bloque_color_6{	background-color:#f8cd36;	}
.bloque_color_7{	background-color:#8b8172;	}



/*-------------------------------------------------------------*/
.btn_add_block{
	position: absolute;
	height: 24px;
	line-height:24px;
	font-size:16px;
	font-family:OpenSansExtrabold;
	width: 30px;
	background-color: #495b61;
	margin: 3px 0px 0px 3px;
	right: 5px;
	cursor:pointer;
	}
.btn_add_block:active{
	background-color:#344246;
	}

</style>


<?php

require_once("clases/beans/beans_funcionario.php");
require_once("clases/beans/beans_contrato.php");
require_once("clases/beans/beans_total_horas.php");
require_once("clases/beans/beans_bloque.php");


$md		=	isset($_GET['f']) ? $_GET['f'] : "";


?>

<div class="programacion_header">
	
    <div id="btn_buscar_medico"><span>Seleccionar Médico</span></div>
	<?php

	if(isset($md) && is_numeric($md) && $md > 0){
		
		$obj_med	=	new beans_funcionario();
		$obj_med->setFuncionario($md);
		
		$med_id		=	$obj_med->getFun_id();
		
		if(is_numeric($med_id) && $med_id > 0){
			$med_nom	=	$obj_med->getFun_nombre();
			$med_app	=	$obj_med->getFun_ape_pat();
			$med_apm	=	$obj_med->getFun_ape_mat();		
			$med_rut	=	$obj_med->getFun_rut();
			$med_dv		=	$obj_med->getFun_dv();
			$med_fecha	=	$obj_med->getFun_fecha_nacimiento();
			$med_fono	=	$obj_med->getFun_telefono();
			$med_con	=	$obj_med->getFun_con_id();
			
			$medico		=	ucwords(strtolower($med_nom." ".$med_app." ".$med_apm));
			$rut		=	$med_rut;
	
			$img_rut	=	"img/avatars/".$rut.".png";
			$avatar		=	file_exists($img_rut) ? $img_rut : "img/avatars/avatar.png";
			
			echo "<div id='div_medico'>
					<input type='hidden' id='hi_med_id' value='".$med_id."' disabled>
					<img id='div_medico_img' src='".$avatar."' width='55' height='55'  alt=''/>
					<div id='div_medico_wrap'>
						<div id='div_medico_nombre'>".$medico."</div>
						<div id='div_medico_descripcion'>Descripcion, Especialidad</div>
					</div>
				</div>";
			
			$obj_con		=	new beans_contrato();
			$arr_horas_c	=	$obj_con->total_horas($med_id);
			
			$obj_tth		=	new beans_total_horas();
			$arr_horas_p	=	$obj_tth->total_horas_programables($med_id);
			
			$horas_contratadas	=	$arr_horas_c['total'];
			$horas_programables	=	$arr_horas_p['total'];
			
			//var_dump($arr_horas_p);
			
			//HORAS CONTRATADAS
			if($horas_contratadas != ""){
				echo "	<div id='div_horas_contratadas'>
							<div class='div_horas_text'>Horas Contratadas</div>
							<div class='div_horas_value'>".$horas_contratadas."</div>
						</div>";
				}
			//HORAS PROGRAMABLES
			if($horas_programables != ""){
				echo "	<div id='div_horas_programables'>
							<div class='div_horas_text' style='width:95px;'>Horas Programables</div>
							<div class='div_horas_value'>".$horas_programables."</div>
						</div>";
				}
			}
		}

	?>
    
  
</div>

<?php
if(isset($horas_programables) && is_numeric($horas_programables) && $horas_programables != ""){

$filas			=	14;
$hora_inicial	=	"07:00";
?>

<div class="programacion_body">
	
    <!-------------------------------------------------------->
    <!--	    	   AREA IZQUIERDA / HORARIO				-->
    <!-------------------------------------------------------->
    <div class="programacion_body_left">
    
    <?php
	$obj_blq	=	new beans_bloque();
	$arr_blq	=	$obj_blq->listarBloque($med_id);
	$arr_dias	=	array(1 => "Lunes", 2 => "Martes", 3 => "Miércoles", 4 => "Jueves", 5 => "Viernes");
	if(is_array($arr_blq)){
		foreach($arr_blq as $blq){
			
			$dia				=	$blq['BLH_DIA'];
			$BLOQUES[$dia][]	=	array(	"BLQ_ID" 						=> $blq['BLH_ID'],
											"BLQ_DIA" 						=> $arr_dias[$dia],
											"BLQ_FECHA_INI" 				=> $blq['BLH_H_INI'],//"08:00"
											"BLQ_FECHA_FIN" 				=> $blq['BLH_H_FIN'],//"09:15"
											"BLQ_PRE_ID" 					=> $blq['BLH_PRE_ID'],//int(1)
											"BLQ_PRE_DENOMINACION" 			=> $blq['PRE_DENOMINACION'],
											"BLQ_ESTABLECIMIENTO" 			=> $blq['ESB_DENOMINACION'],//"HOSPITAL HERNAN HENRIQUEZ ARAVENA"
											"BLQ_CENTRO_RESPONSABILIDAD"	=> $blq['CRE_DENOMINACION'],//"CARDIOVASCULAR"
											"BLQ_PRE_ID" 					=> $blq['BLH_PRE_ID'],//int(1)
											"BLQ_LUG_DENOMINACION" 			=> $blq['LUG_DENOMINACION'],//"PABELLON CENTRAL"
											"BLQ_EQX_DENOMINACION"			=> $blq['EQU_DENOMINACION'],//int(1)
											"BLQ_PRE_ID"					=> $blq['BLH_PRE_ID']);
			
		}
	}
	?>
    
    
    
    
    	
        <!-------------------------------------------->
        <!--				HORAS					-->
        <!-------------------------------------------->
        <div class="pbl_columna_horas">
            <div class="pbl_columna_title">Horas</div>
            <?php
            $inicio	=	strtotime($hora_inicial);
			for($h=0;$h<$filas;$h++){
				$hora1	=	date("H:i",$inicio+($h*3600));
				$hora2	=	date("H:i",$inicio+(($h+1)*3600));
				echo "<div class='pbl_columna_celda1'>".$hora1." - ".$hora2."</div>";
				}
			?>            
        </div>
        <?php
        
		for($i=1;$i<6;$i++){
			
			//--------------------------------
			//------------	DIA  -------------
			//--------------------------------
			$dia	=	$arr_dias[$i];
				
			echo "<div class='pbl_columna_dia'>";
			echo "	<div class='pbl_columna_title' style='border-left:1px solid #ffffff;'><div id='btn_dia_".$dia."_".$i."' class='btn_add_block'>+</div>".$dia."</div>";
			
			//--------------------------------------------	
			/*if($i == 2){
				$margin		=	get_margin("11:00");//$hora_inicio
				$pixels		=	get_pixels("11:00","13:00");
				echo "<div class='pbl_columna_bloque' style='margin-top:".$margin."px; height:".$pixels."px;'>asdasd</div>";
				}*/
					
			if(isset($BLOQUES[$i]) && count($BLOQUES[$i]) > 0){	
						
						foreach($BLOQUES[$i] as $item){							
							
							$BLQ_ID						=	$item['BLQ_ID'];
							$BLQ_FECHA_INI 				=	$item['BLQ_FECHA_INI'];//"08:00"
							$BLQ_FECHA_FIN				=	$item['BLQ_FECHA_FIN'];//"09:15"
							//$BLQ_PRE_ID" 				=> $item['BLH_PRE_ID'],//int(1)
							$BLQ_PRE_DENOMINACION		=	$item['BLQ_PRE_DENOMINACION'];
							$BLQ_LUG_DENOMINACION		=	$item['BLQ_LUG_DENOMINACION'];//"PABELLON CENTRAL
							$BLQ_CENTRO_RESPONSABILIDAD	=	$item['BLQ_CENTRO_RESPONSABILIDAD'];//CARDIOVASCULAR
							//$BLQ_ESTABLECIMIENTO" 			=> $item['BLQ_ESTABLECIMIENTO'],//"HOSPITAL HERNAN HENRIQUEZ ARAVENA"
							$BLQ_PRE_ID					=	$item['BLQ_PRE_ID'];//int(1)
							//$BLQ_EQX_DENOMINACION"			=> $item['BLQ_EQX_DENOMINACION'],//int(1)
							//$BLQ_PRE_ID"					=> $item['BLQ_PRE_ID']);
							
							$margin		=	get_margin($BLQ_FECHA_INI);
							$pixels		=	get_pixels($BLQ_FECHA_INI,$BLQ_FECHA_FIN);							
							
							echo "<div class='pbl_columna_bloque bloque_color_".$BLQ_PRE_ID."' style='margin-top:".$margin."px; height:".$pixels."px;'>";
							echo "<div>".$BLQ_FECHA_INI." | ".$BLQ_FECHA_FIN."</div>";
							echo "<div><b>".$BLQ_PRE_DENOMINACION."</b></div>";
							echo "<div>".$BLQ_LUG_DENOMINACION."</div>";
							echo "<span>CR: ".$BLQ_CENTRO_RESPONSABILIDAD."</span>";
							echo "</div>";
							
							/*echo "	<div class='bloque_item' id='".$BLQ_ID."'>
										<div>".$BLQ_FECHA_INI." | ".$BLQ_FECHA_FIN."</div>
										<div><b>".$BLQ_PRE_DENOMINACION."</b></div>
										<div>".$BLQ_LUG_DENOMINACION."</div>
										<span>CR: ".$BLQ_CENTRO_RESPONSABILIDAD."</span>
									</div>";*/
							}
						
					}
			//--------------------------------------------			
			
			for($h=0;$h<$filas;$h++){
					echo "<div class='pbl_columna_celda2' style='border-left:1px solid #ffffff;'></div>";
					}   
			echo "</div>";
			
			}
		
		?>
        
    </div>
        
    <!-------------------------------------------------------->
    <!--			AREA DERECHA / HORAS ASIGNADAS			-->
    <!-------------------------------------------------------->
    <div class="programacion_body_right">
    	
        <?php
        $obj_blq	=	new beans_bloque();
		
		$obj_blq->setHoras($med_id);

		$hrs_pabellon		=	transformar_horas($obj_blq->getHoras_pabellon());
		$hrs_camas			=	transformar_horas($obj_blq->getHoras_camas());
		$hrs_interconsulta	=	transformar_horas($obj_blq->getHoras_interconsulta()); 
		$hrs_policlinico	=	transformar_horas($obj_blq->getHoras_policlinico());
		$hrs_procedimiento	=	transformar_horas($obj_blq->getHoras_procedimiento());
		$hrs_reunion		=	transformar_horas($obj_blq->getHoras_reunion());
		$hrs_gestion		=	transformar_horas($obj_blq->getHoras_gestion());
		
		$hrs_total			=	sumar_horas($hrs_pabellon,$hrs_camas,$hrs_interconsulta,$hrs_policlinico,$hrs_procedimiento,$hrs_reunion,$hrs_gestion);
		$hrs_sin_asignar	=	$horas_programables - $hrs_total;
		?>
        
        <!-------------------------------------------->
        <div class="pbr_header">
        	<div class="pbr_header_text">Horas<br>Sin Asignar</div>
            <div class="pbr_header_horas"><?php echo hrs_stylized($hrs_sin_asignar); ?></div><!--<span>/<?php //echo $horas_programables; ?></span>-->
        </div>
        
        <!-------------------------------------------->        
        <div class='pbr_item' style="margin-top:10px;">
			<div class='pbr_item_text'>Horas<br>Pabellón</div>
			<div class='pbr_item_value bloque_color_1'><?php echo hrs_stylized($hrs_pabellon); ?></div>
		</div>
        <div class='pbr_item'>
			<div class='pbr_item_text'>Horas<br>Camas / Hosp.</div>
			<div class='pbr_item_value bloque_color_2'><?php echo hrs_stylized($hrs_camas); ?></div>
		</div>
        <div class='pbr_item'>
			<div class='pbr_item_text'>Horas<br>Interconsulta</div>
			<div class='pbr_item_value bloque_color_3'><?php echo hrs_stylized($hrs_interconsulta); ?></div>
		</div>
        <div class='pbr_item'>
			<div class='pbr_item_text'>Horas<br>Policlínico</div>
			<div class='pbr_item_value bloque_color_4'><?php echo hrs_stylized($hrs_policlinico); ?></div>
		</div>
        <div class='pbr_item'>
			<div class='pbr_item_text'>Horas<br>Procedimientos</div>
			<div class='pbr_item_value bloque_color_5'><?php echo hrs_stylized($hrs_procedimiento); ?></div>
		</div>
        <div class='pbr_item'>
			<div class='pbr_item_text'>Horas<br>Reunión</div>
			<div class='pbr_item_value bloque_color_6'><?php echo hrs_stylized($hrs_reunion); ?></div>
		</div>
        <div class='pbr_item'>
			<div class='pbr_item_text'>Horas<br>Gestión</div>
			<div class='pbr_item_value bloque_color_7'><?php echo hrs_stylized($hrs_gestion); ?></div>
		</div>
               
        <div style="clear:both; height:10px;"></div>
        
    </div>
    
</div>

<?php
}

function transformar_horas($hora){		
	
	$aux	=	explode(":",$hora);
	$horas	=	intval($aux[0]);
	$dcml	=	round($aux[1]/60*10,1);//0.833333
	$mins	=	$dcml*10;
	
	if($horas == 0 && $mins == 0){
		$return	=	"";
		}
	else if($mins == 0){
		$return	=	$horas;
		}
	else{
		//$return	=	$horas."<span class='pbr_item_decimal'>.".$mins."</span>";
		$return	=	$horas.".".$mins;
		}		
	return $return;	
	}

function hrs_stylized($hora){
	
	if($hora == 0){
		$return	=	0;
		}
	elseif($hora != ""){
		
		$arr	=	explode(".",$hora);
		$hora	=	$arr[0];
		$mins	=	isset($arr[1]) ? $arr[1] : "";
				
		if($mins == ""){//3.0
			//var_dump($hora);
			$return	=	$hora;//."<span class='pbr_item_decimal'>.".$arr[1]."</span>";
			
			}
		else{
			$return	=	$hora."<span class='pbr_item_decimal'>.".$mins."</span>";
			}
		}
	else{
		$return	=	"";
		}	
	
	return $return;//$arr[0]."<span class='pbr_item_decimal'>.".$arr[1]."</span>";
	}

function sumar_horas($hrs_pabellon=0,$hrs_camas=0,$hrs_interconsulta=0,$hrs_policlinico=0,$hrs_procedimiento=0,$hrs_reunion=0,$hrs_gestion=0){	
	
	$return	=	$hrs_pabellon+$hrs_camas+$hrs_interconsulta+$hrs_policlinico+$hrs_procedimiento+$hrs_reunion+$hrs_gestion;
		
	return $return;	
	}

function get_margin($hora){
	
	$hora_diff	=	date("H:i", strtotime("00:00") + strtotime($hora) - strtotime("07:00"));
	$hora_arr	=	explode(":",$hora_diff);
	$min_diff	=	(intval($hora_arr[0])*60)+intval($hora_arr[1]);
	
	//30px -> 60min
	//?px -> 150min
	
	$return		=	($min_diff * 36 / 60);
	
	return $return;	//150minutos, -> x pixels
	}
function get_pixels($hora_inicio,$hora_fin){
	
	$hora_diff	=	date("H:i", strtotime("00:00") + strtotime($hora_fin) - strtotime($hora_inicio));
	$hora_arr	=	explode(":",$hora_diff);
	$min_diff	=	(intval($hora_arr[0])*60)+intval($hora_arr[1]);
	
	$return		=	($min_diff * 36 / 60);
	
	return $return;
	
	}



?>
