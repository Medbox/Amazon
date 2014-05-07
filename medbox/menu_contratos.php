<style>
.contratos_header{
	height:80px;
	background-color:#e8eaed;
	border-bottom:1px solid #c6c7cc;
	}

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

/*--------------------------------------*/
/*			BOTON EDITAR HORAS			*/
/*--------------------------------------*/
#btn_editar_horas{
	width:90px;
	height:60px;
	background-color:#caab9a;
	float:left;
	margin:11px 0px 0px 60px;
	padding:0px 15px 0px 15px;
	text-align:center;
	cursor:pointer;
	visibility:hidden;
	}
#btn_editar_horas:active{
	background-color:#ad8d7b;
	}
#btn_editar_horas > span{
	display:block;
	margin-top:14px;
	color:#ffffff;
	font-size:14px;
	}
/*--------------------------------------*/
/*			BOTON CANCELAR HORAS		*/
/*--------------------------------------*/
#btn_cancelar_horas{
	width:90px;
	height:60px;
	line-height:60px;
	background-color:#aeb0b5;
	float:left;
	margin:11px 0px 0px 8px;
	padding:0px 15px 0px 15px;
	text-align:center;
	cursor:pointer;
	visibility:hidden;
	}
#btn_cancelar_horas:active{
	background-color:#9a9ca1;
	}
#btn_cancelar_horas > span{
	display:block;
	color:#ffffff;
	font-size:14px;
	}
/*--------------------------------------*/
/*			BOTON GUARDAR HORAS			*/
/*--------------------------------------*/
#btn_guardar_horas{
	width:90px;
	height:60px;
	background-color:#6d9ebc;
	float:left;
	margin:11px 0px 0px 8px;
	padding:0px 15px 0px 15px;
	text-align:center;
	cursor:pointer;
	visibility:hidden;
	}
#btn_guardar_horas:active{
	background-color:#5b87a2;
	}
#btn_guardar_horas > span{
	display:block;
	margin-top:14px;
	color:#ffffff;
	font-size:14px;
	}





.contratos_body{
	position:absolute;
	width:100%;
	top:81px;
	bottom:0px;
	/*background-color:#F96;*/
	}

/*---------------------------------------------------------------------*/

#cb_area_contratos, #cb_area_horas_programables, #cb_area_dias_fuera{
	float:left;
	width:368px;
	margin-left:20px;
	margin-top:16px;
	background-color:#f9f9f9;
	min-height:300px;
	padding-bottom:20px;
	border:1px solid #dcdcdc;
	}
#cb_area_contratos_header, #cb_area_horas_programables_header, #cb_area_dias_fuera_header{
	height:50px;
	background-color:#5f767e;
	width:370px;
	margin-left:-1px;
	margin-top:-1px;
	margin-bottom:15px;
	}
#cb_area_contratos_header > span, #cb_area_horas_programables_header > span, #cb_area_dias_fuera_header > span{
	display:block;
	float:left;
	margin-left:20px;
	line-height:50px;
	color:#FFF;
	}
#btn_nuevo_contrato{
	float:right;
	height:50px;
	background-color:#84c7a8;
	width:110px;
	color:#FFF;
	cursor:pointer;
	}
#btn_nuevo_contrato:active{
	background-color:#68a88a;
	}
#btn_nuevo_contrato_icon{
	width:30px;
	height:30px;
	/*background-color:#900;*/
	float:left;
	margin-top:11px;
	margin-left:10px;
	background-image:url(img/icon_btn_nuevo_contrato.png);
	}
#btn_nuevo_contrato_text{
	float:left;
	width:64px;
	height:30px;
	margin-top:12px;
	margin-left:4px;
	/*background-color:#F00;*/
	font-size:13px;
	line-height:14px;
	}
.cb_contrato_item{
	margin-bottom:10px;
	margin-left:15px;
	width:336px;
	height:100px;
	background-color:#FFF;
	border:1px solid #dcdcdc;
	font-size:14px;
	color:#696969;
	}
.cb_contrato_item_horas{
	float:right;
	width:62px;
	height:85px;
	background-image:url(img/circle_horas_contrato.png);
	background-repeat:no-repeat;
	margin:10px 8px 0px 0px;
	color:#FFF;
	}
.cb_contrato_item_eliminar{
	width:60px;
	height:18px;
	line-height:16px;
	font-size:13px;
	text-align:center;
	margin:16px 0px 0px 0px;
	color:#FFF;
	background-color:#e5b5cd;
	cursor:pointer;
	border-radius:3px;
	-webkit-border-radius:3px;
	-moz-border-radius:3px;
	}
.cb_contrato_item_eliminar:active{
	background-color:#aa6a8a;
	}

	
	
.cb_contrato_item_title1{
	float:left;
	margin-left:10px;
	margin-top:12px;
	height:16px;
	line-height:16px;
	width:255px;
	/*background-color:#F03;*/
	font-family:OpenSansBold;
	}
.cb_contrato_item_data1{
	float:left;
	margin-left:10px;
	width:255px;
	/*background-color:#39C;*/
	}
.cb_contrato_item_title2{
	float:left;
	margin-left:10px;
	margin-top:6px;
	height:16px;
	line-height:16px;
	width:255px;
	/*background-color:#F03;*/
	font-family:OpenSansBold;
	}
.cb_contrato_item_data2{
	float:left;
	margin-left:10px;
	width:255px;
	/*background-color:#39C;*/
	}
.cb_contrato_item_horas_number{
	font-family:OpenSansBold;
	text-align:center;
	height:28px;
	line-height:32px;
	font-size:32px;
	margin-top:7px;
	}
.cb_contrato_item_horas_text{
	text-align:center;
	height:13px;
	line-height:13px;
	font-size:14px;
	}





#cb_area_horas_programables, #cb_area_dias_fuera{
	width:348px;
	/**/
	}
#cb_area_horas_programables_header, #cb_area_dias_fuera_header{
	width:350px;
	/**/
	}

#cb_area_horas_programables_table, #cb_area_dias_fuera_table{
	width:90%;
	min-height:200px;
	/*background-color:#930;*/
	margin:20px 5% 20px 5%;
	}
.inner_tr_active{
	border:1px solid #dcdcdc;
	border-bottom:none;
	background-color:#FFF;
	height:50px;
	}
.inner_tr_final{
	border:1px solid #dcdcdc;
	background-color:#f1f0f0;
	height:50px;
	}

.inner_tr_active_text, .inner_tr_final_text{
	height:50px;
	line-height:50px;
	font-size:14px;
	width:225px;
	float:left;
	color:#5f767e;
	/*background-color:#069;*/
	}
.inner_tr_active_text > span, .inner_tr_final_text > span{
	margin-left:14px;
	}
.inner_tr_active_value, .inner_tr_final_value{
	height:50px;
	width:84px;
	border-left:1px solid #dcdcdc;
	background-color:#f7f7f7;
	float:right;
	font-family:OpenSansExtrabold;
	text-align:center;
	color:#5ca784;
	}

.inner_tr_final_text{
	font-family:OpenSansBold;
	}
.inner_tr_final_value{
	background-color:#f1f0f0;
	color:#5f767e;
	}

/*------------------------------------------------*/

.line_input{
	font-size:30px;
	font-family:OpenSansExtrabold;
	text-align:center;
	background-color:#fbfae7;
	border:1px solid #dcdcdc;
	color:#5ca784;
	width:86%;
	margin-left:2%;
	outline:none;
	}
.line_input[readonly]{
	background-color:#f7f7f7;
	border:1px solid #f7f7f7;
	}

.line_select{/*para modificar*/
	font-size:28px;
	font-family:OpenSansExtrabold;
	text-align:center;
	background-color:#fbfae7;
	border:1px solid #dcdcdc;
	color:#5ca784;
	width:86%;
	margin-left:2%;
	outline:none;
	}
.line_select[disabled]{
	background-color:#f7f7f7;
	border:1px solid #f7f7f7;
	}


#hp_total_horas_programables,#dfe_total_dias{
	background-color:#f1f0f0;
	border:1px solid #f1f0f0;
	color:#5f767e;
	}


</style>

<?php

require_once("clases/beans/beans_funcionario.php");
require_once("clases/beans/beans_contrato.php");
require_once("clases/beans/beans_total_horas.php");


$md		=	isset($_GET['f']) ? $_GET['f'] : "";


?>

<div class="contratos_header">
	
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
			
			echo "<div id='btn_editar_horas'><span>Modificar Horas</span></div>";
			echo "<div id='btn_cancelar_horas'><span>Cancelar</span></div>";
			echo "<div id='btn_guardar_horas'><span>Guardar Horas</span></div>";	
			}
		}

	?>
    
  
</div>

<?php
if(isset($md) && is_numeric($md) && $md > 0){
	?>


<div class="contratos_body">
	
    <div id="cb_area_contratos">
    	<div id="cb_area_contratos_header">
        	<span>Contratos</span>
            <div id="btn_nuevo_contrato">
            	<div id="btn_nuevo_contrato_icon"></div>
                <div id="btn_nuevo_contrato_text">Nuevo Contrato</div>
			</div>
        </div>
		<?php
		
		if(isset($med_id) && is_numeric($med_id) && $med_id > 0){
			
			$obj_con		=	new beans_contrato();
			$arr_contratos	=	$obj_con->listar_contrato_fun($med_id);
			$cant_contratos	=	count($arr_contratos);
            $previos		=	0;
			}
		else{
			$cant_contratos	=	0;
			}	
		
		echo "<input type='hidden' id='hi_contratos' value='".$cant_contratos."'>";
	
        if(isset($arr_contratos) && is_array($arr_contratos) && count($arr_contratos) > 0){
			
			$horas			=	0;
            $cargo28		=	0;	
            $descanso		=	0;
            $total			=	0;
			
			foreach($arr_contratos as $con){
				
				$RCF_ID				=	$con["RCF_ID"];//=> string(1) "1" 
				$CON_ID				=	$con["CON_ID"];//=> int(1) 
				$CON_DENOMINACION	=	intval($con["CON_DENOMINACION"]);//=> string(2) "33" 
				$ESB_ID				=	$con["ESB_ID"];//=> int(1) 
				$ESB_DENOMINACION	=	ucwords(strtolower($con["ESB_DENOMINACION"]));//=> string(33) "HOSPITAL HERNAN HENRIQUES ARAVENA" 
				$ESB_CONTRATA		=	ucwords(strtolower($con["ESB_CONTRATA"]));//=> string(33) "HOSPITAL HERNAN HENRIQUES ARAVENA"
				
				if($CON_DENOMINACION == 28){
						$cargo28	=	28;
						$descanso	=	10;
						}
				else{	$horas		=	$horas + $CON_DENOMINACION;						
						}
				$total		=	$total + $CON_DENOMINACION;
				
				echo "<div class='cb_contrato_item'>						
						
						<div class='cb_contrato_item_horas'>
							<div class='cb_contrato_item_horas_number'>".$CON_DENOMINACION."</div>
							<div class='cb_contrato_item_horas_text'>Horas</div>
							<div class='cb_contrato_item_eliminar' onClick='eliminar_contrato(".$RCF_ID.");'>eliminar</div>
						</div>
						<div class='cb_contrato_item_title1'>Contrata</div>
						<div class='cb_contrato_item_data1'>".$ESB_CONTRATA."</div>
						<div class='cb_contrato_item_title2'>Lugar Desempeño</div>
						<div class='cb_contrato_item_data2'>".$ESB_DENOMINACION."</div>
					</div>";
				
				}
			}
		?>
	
    </div>

	<?php
    if($cant_contratos > 0){
		//IF CANTIDAD DE CONTRATOS (INICIO)
		?>

    <div id="cb_area_horas_programables">
		
		<?php
		
		$obj_horas			=	new beans_total_horas();
		$arr_horas			=	$obj_horas->listar_total_horas($med_id);
		$horas_guardadas	=	count($arr_horas);
		
		if(is_numeric($horas_guardadas) && $horas_guardadas > 0){
			
			$THO_ID						=	$arr_horas[0]["THO_ID"];//=> int(3) 
			$THO_FUN_ID					=	$arr_horas[0]["THO_FUN_ID"];//=> int(3) 
			$THO_DIAS_HABILES			=	$arr_horas[0]["THO_DIAS_HABILES"];//=> int(249) 
			$THO_CARGA_28H				=	$arr_horas[0]["THO_CARGA_28H"];//=> int(22)		
			$THO_JUBILADO_GUARDIA		=	$arr_horas[0]["THO_JUBILADO_GUARDIA"];//=> int(1)
			
			$THO_DESCANSO				=	$arr_horas[0]["THO_DESCANSO"];
			$THO_ADMINISTRATIVOS		=	$arr_horas[0]["THO_ADMINISTRATIVOS"];//=> int(12) 
			$THO_FERIADO_LEGAL			=	$arr_horas[0]["THO_FERIADO_LEGAL"];//=> int(33) 	
			$THO_FERIADO_A_ANTERIOR		=	$arr_horas[0]["THO_FERIADO_A_ANTERIOR"];//=> int(0) 
			$THO_CURSO					=	$arr_horas[0]["THO_CURSO"];//=> int(6) 
		
		}
		
		//--------------------------------------------------------------------------------------------------
		//	CALCULAR HORAS PROGRAMABLES
		//--------------------------------------------------------------------------------------------------
		
		$class_cargo_28		=	" novisible";
		$class_jubilado		=	" novisible";
		$jubilado			=	"";
		$jubilado_selected	=	"";

		
		if($cargo28 == 28){
			//MOSTRAR DIVS DE CARGO28 Y JUBILADO
			$class_cargo_28		=	"";
			$class_jubilado		=	"";
			$descanso			=	10;
			$jubilado			=	"NO";
			
			//TIENE 1 CONTRATO DE 28, AHORA COMPROBAR ES ESTADO DE JUBILADO	
			if(isset($THO_JUBILADO_GUARDIA) && $THO_JUBILADO_GUARDIA == 1){
				$cargo28				=	$THO_CARGA_28H;
				$jubilado_selected		=	" selected";
				$descanso				=	0;
				$jubilado				=	"SI";
			}
		}
		//RECALCULAR TOTAL DE HORAS PROGRAMABLES
		$total	=	$cargo28 + $horas;	

		?>
       
		<div id="cb_area_horas_programables_header">
        	<span>Horas Programables</span>
		</div>
        
		<div id="cb_area_horas_programables_table">
            <div class="inner_tr_active">
            		<div class="inner_tr_active_text"><span>Horas Contratadas</span></div>
					<div class="inner_tr_active_value"><input type="text" class="line_input" readonly id="hp_horas_contratadas" value="<?php echo $horas; ?>"></div>
            </div>
            <div class="inner_tr_active">
            		<div class="inner_tr_active_text"><span>Cargo 28 Horas Activo</span></div>
					<div class="inner_tr_active_value"><input type="text" class="line_input<?php echo $class_cargo_28; ?>" readonly id="hp_cargo_28horas" value="<?php if($cargo28 == 28 || $cargo28 == 22){ echo $cargo28; } else { echo ""; } ?>"></div>
            </div>
            <div class="inner_tr_active">
            		<div class="inner_tr_active_text"><span>Cargo Jubilado Guardia</span></div>
					<div class="inner_tr_active_value" style="font-size:24px;">
                    		<select class="line_select<?php echo $class_jubilado; ?>" id="hp_cargo_jubilado" onChange="recalcular_cargo28();" disabled>
								<?php
                                echo "<option value='0'>NO</option>";
                                echo "<option value='1' ".$jubilado_selected.">SI</option>";
                                ?>                    
                            </select>                           
                            </div>
            </div>
            <div class="inner_tr_final">
            		<div class="inner_tr_final_text"><span>Total Horas Programables</span></div>
					<div class="inner_tr_final_value"><input type="text" class="line_input" readonly id="hp_total_horas_programables" value="<?php echo $total; ?>"></div>
            </div>
		</div>
        
        
        
	</div>
    

	     
    <div id="cb_area_dias_fuera">
		
		<div id="cb_area_dias_fuera_header">
        	<span>Dias Fuera del Establecimiento</span>
		</div>
		
        <?php
		   
		
		//--------------------------------------------------------------------------------------------------
		//	CALCULAR DIAS FUERA DEL ESTABLECIMIENTO
		//--------------------------------------------------------------------------------------------------
		
		//	DIAS ADMINISTRATIVOS
		if(isset($THO_ADMINISTRATIVOS) && is_numeric($THO_ADMINISTRATIVOS)){
			
			switch($THO_ADMINISTRATIVOS){
				case "6":	$admins_6	=	" selected";
							$admins_12	=	"";
							break;
				case "12":	$admins_6	=	"";
							$admins_12	=	" selected";
							break;
				default:	$admins_6	=	"";
							$admins_12	=	" selected";
				}
			$admins	=	$THO_ADMINISTRATIVOS;
			}
		else{
			$admins_6	=	"";
			$admins_12	=	" selected";
			$admins		=	12;
			}
		
		//	FERIADOS AÑO ANTERIOR
		if(isset($THO_FERIADO_A_ANTERIOR) && is_numeric($THO_FERIADO_A_ANTERIOR) && $THO_FERIADO_A_ANTERIOR > 0){
			$previos	=	$THO_FERIADO_A_ANTERIOR;
			}
			
		//	FERIADOS LEGALES
		if(isset($THO_FERIADO_LEGAL) && is_numeric($THO_FERIADO_LEGAL)){
			
			switch($THO_FERIADO_LEGAL){
				case "15":	$feriados_15	=	" selected='selected'";
							$feriados_20	=	"";
							$feriados_25	=	"";
							break;
				case "20":	$feriados_15	=	"";
							$feriados_20	=	" selected='selected'";
							$feriados_25	=	"";
							break;
				case "25":	$feriados_15	=	"";
							$feriados_20	=	"";
							$feriados_25	=	" selected='selected'";
							break;
				default:	$feriados_15	=	" selected='selected'";
							$feriados_20	=	"";
							$feriados_25	=	"";
				}
			$feriados	=	$THO_FERIADO_LEGAL;
			}
		else{
			$feriados_15	=	" selected='selected'";
			$feriados_20	=	"";
			$feriados_25	=	"";
			$feriados		=	0;
			}
			
		//	DIAS CURSOS
		if(isset($THO_CURSO) && is_numeric($THO_CURSO) && $THO_CURSO > 0){
			$cursos	=	$THO_CURSO;
			}
		else{
			$cursos	=	6;
			}
		
		$total_dfe	=	$descanso + $admins + $feriados + $previos + $cursos;
		 
		?>
        
		<div id="cb_area_dias_fuera_table">
            <div class="inner_tr_active">
            		<div class="inner_tr_active_text"><span>Descanso Compensatorio</span></div>
					<div class="inner_tr_active_value"><input class="line_input" id="dfe_descanso_compensatorio" type="text" value="<?php echo $descanso; ?>" readonly></div>
            </div>
            <div class="inner_tr_active">
            		<div class="inner_tr_active_text"><span>Dias Administrativos</span></div>
					<div class="inner_tr_active_value">
						<select class="line_select" id="dfe_admins" onChange="recalcular_dias();" disabled>
                            <option value="6"<?php echo $admins_6; ?>>6</option>
                            <option value="12"<?php echo $admins_12; ?>>12</option>
                        </select>						
                        </div>
            </div>
            <div class="inner_tr_active">
            		<div class="inner_tr_active_text"><span>Feriados Legales</span></div>
					<div class="inner_tr_active_value">
                    					<select class="line_select" id="dfe_feriados" onChange="recalcular_dias();" disabled>
                                            <option value="15"<?php echo $feriados_15; ?>>15</option>
                                            <option value="20"<?php echo $feriados_20; ?>>20</option>
                                            <option value="25"<?php echo $feriados_25; ?>>25</option>
                                        </select></div>
            </div>
            <div class="inner_tr_active">
            		<div class="inner_tr_active_text"><span>Feriados Legales Año Anterior</span></div>
					<div class="inner_tr_active_value"><input class="line_input" id="dfe_previos" type="text" value="<?php echo $previos; ?>" readonly onKeyUp="recalcular_dias();"></div>
            </div>
            <div class="inner_tr_active">
            		<div class="inner_tr_active_text"><span>Cursos</span></div>
					<div class="inner_tr_active_value"><input class="line_input" id="dfe_cursos" type="text" value="<?php echo $cursos; ?>" readonly onKeyUp="recalcular_dias();"></div>                    
            </div>
          <div class="inner_tr_final">
            		<div class="inner_tr_final_text"><span>Total Dias Fuera</span></div>
					<div class="inner_tr_final_value">
                    <input type="text" class="line_input" readonly id="dfe_total_dias" value="<?php echo $total_dfe; ?>"></div>
            </div>
		</div>
	</div>
  
        <?php
		}//IF CANTIDAD DE CONTRATOS (FIN)
	?>
  	
</div>


    
	<?php
	}
?>
