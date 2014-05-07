<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Testing the flow</title>
<link href="css/flow.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
require_once("clases/beans/beans_funcionario.php");
require_once("clases/beans/beans_contrato.php");
require_once("clases/beans/beans_establecimiento.php");
require_once("clases/beans/beans_total_horas.php");
require_once("clases/beans/beans_tipo_prestacion.php");
require_once("clases/beans/beans_lugar.php");

$obj_fun	=	new beans_funcionario();
$arr_fun	=	$obj_fun->listar_funcionario(null);

if(isset($_GET['md'])){
	$md			=	$_GET['md'];//id medico
	}

?>


<!-----------------   SELECCIONAR MEDICO   ----------------->
<div class="seleccionar_medico">
<label for="funcionario">Seleccionar Médico</label>
    <select id="funcionario">
        <option value="x"> - - - - </option>
        <?php
        foreach($arr_fun as $fun){
            
            $FUN_ID		=	$fun['FUN_ID'];
            $FUN_MEDICO	=	$fun['FUN_NOMBRES']." ".$fun['FUN_APE_PATERNO']." ".$fun['FUN_APE_MATERNO'];
            if($FUN_ID == $md){
				echo "<option value='".$FUN_ID."' selected>".$FUN_MEDICO."</option>";
				}
			else{
				echo "<option value='".$FUN_ID."'>".$FUN_MEDICO."</option>";
				}
            
            }
        ?>
    </select>
    <button id="cargar_medico">Cargar Médico</button>
</div>

<!-----------------   MEDICO SELECCIONADO   ----------------->

<div class="div_medico">
	<?php
	if(isset($md) && is_numeric($md) && $md > 0){
		
		$obj_med	=	new beans_funcionario();
		$obj_med->setFuncionario($md);
		
		$med_id		=	$obj_med->getFun_id();
		$med_nom	=	$obj_med->getFun_nombre();
		$med_app	=	$obj_med->getFun_ape_pat();
		$med_apm	=	$obj_med->getFun_ape_mat();		
		$med_rut	=	$obj_med->getFun_rut();
		$med_dv		=	$obj_med->getFun_dv();
		$med_fecha	=	$obj_med->getFun_fecha_nacimiento();
		$med_fono	=	$obj_med->getFun_telefono();
		$med_con	=	$obj_med->getFun_con_id();
		
		$medico		=	$med_nom." ".$med_app." ".$med_apm;
		$rut		=	$med_rut."-".$med_dv;

		if(is_numeric($med_id) && $med_id > 0){
			echo "<div class='nombre_medico'>".$medico." <input type='text' id='hi_med_id' value='".$med_id."' disabled> </div>";
			echo "<div class='datos_medico'>";
			echo "	<span>RUT: ".$rut."</span>";
			echo "	<span>FECHA NACIMIENTO: ".$med_fecha."</span>";
			echo "	<span>FONO: ".$med_fono."</span>";
			echo "</div>";
			}		
		
		}

	?>
	
</div>



<?php
if(isset($med_id) && $med_id != "" && is_numeric($med_id)){
?>

<div class="div_contratos">

<!-----------------   CREAR NUEVO CONTRATO   ----------------->
	
    <div class="div_nuevo_contrato">
        <b>CREAR NUEVO CONTRATO</b><br>
        
        Quien Contrata
        <select id="select_contrata">
        <option value="x">-- Quien Contrata --</option>
        <?php    
        //listar establecimientos
        $obj_esb	=	new beans_establecimiento();
        $arr_esb	=	$obj_esb->listar_establecimiento();
    
        if(is_array($arr_esb)){
                foreach($arr_esb as $esb){
                    $ESB_ID				=	$esb["ESB_ID"];//=> int(1) 
                    $ESB_DENOMINACION	=	$esb["ESB_DENOMINACION"];//=> string(33) "HOSPITAL HERNAN HENRIQUES ARAVENA"
                    
                    echo "<option value='".$ESB_ID."'>".$ESB_DENOMINACION."</option>";
                    
                    }
                }
        
        ?>
        </select><br>
        
        Lugar Desempeño
        <select id="select_establecimiento">
        <option value="x">-- establecimiento --</option>
        <?php    
        //listar establecimientos
        $obj_esb	=	new beans_establecimiento();
        $arr_esb	=	$obj_esb->listar_establecimiento();
    
        if(is_array($arr_esb)){
                foreach($arr_esb as $esb){
                    $ESB_ID				=	$esb["ESB_ID"];//=> int(1) 
                    $ESB_DENOMINACION	=	$esb["ESB_DENOMINACION"];//=> string(33) "HOSPITAL HERNAN HENRIQUES ARAVENA"
                    
                    echo "<option value='".$ESB_ID."'>".$ESB_DENOMINACION."</option>";
                    
                    }
                }
        
        ?>
        </select><br>
        
        Horas Contratadas
        <select id="select_horas_contrato">
        <option value="x">-- horas --</option>
        <?php    
        //listar tipo de horas 
        $obj_con	=	new beans_contrato();
        $arr_con	=	$obj_con->listar_contrato();
        
        if(is_array($arr_con)){
                foreach($arr_con as $con){
                    $CON_ID				=	$con["CON_ID"];//=> int(1) 
                    $CON_DENOMINACION	=	$con["CON_DENOMINACION"];//=> string(2) "33" 
                    $CON_DESCRIPCION	=	$con["CON_DESCRIPCION"];//=> string(2) "33" 
    
                    echo "<option value='".$CON_ID."'>".$CON_DENOMINACION."</option>";
                    
                    }
                }
        
        ?>
        </select>
        
        
        <button id="crear_contrato">crear contrato</button>
    </div>
    
<!-----------------   LISTA DE CONTRATOS   ----------------->    
    
    <div class="div_lista_contratos">
        <b>LISTA DE CONTRATOS</b><br>
        <?php
        if(isset($med_id) && is_numeric($med_id) && $med_id > 0){
            
            $obj_con	=	new beans_contrato();
            $arr_con	=	$obj_con->listar_contrato_fun($med_id);
            
            $horas		=	0;
            $cargo28	=	0;	
            $descanso	=	0;
            $total		=	0;
            $previos	=	0;
            
            if(is_array($arr_con)){
                foreach($arr_con as $con){
                    $RCF_ID				=	$con["RCF_ID"];//=> string(1) "1" 
                    $CON_ID				=	$con["CON_ID"];//=> int(1) 
                    $CON_DENOMINACION	=	intval($con["CON_DENOMINACION"]);//=> string(2) "33" 
                    $ESB_ID				=	$con["ESB_ID"];//=> int(1) 
                    $ESB_DENOMINACION	=	$con["ESB_DENOMINACION"];//=> string(33) "HOSPITAL HERNAN HENRIQUES ARAVENA" 
                    $ESB_CONTRATA		=	$con["ESB_CONTRATA"];//=> string(33) "HOSPITAL HERNAN HENRIQUES ARAVENA"
                    
                    if($CON_DENOMINACION == 28){
                            $cargo28	=	28;
                            $descanso	=	10;
                            }
                    else{	$cargo28	=	0;
                            $descanso	=	0;
                            $horas		=	$horas + $CON_DENOMINACION;						
                            }
                    $total		=	$total + $CON_DENOMINACION;
                    
                    echo "<div class='box_contrato'>";
                    echo "<b>CONTRATA: </b>".$ESB_CONTRATA." <br><b>LUGAR :</b> ".$ESB_DENOMINACION."  <br><b>HORAS :</b> ".$CON_DENOMINACION." <button onClick='eliminar_contrato(".$RCF_ID.");'>eliminar</button><br>";
                    echo "</div>";
                    
                    }
                }
    
            }
        ?>
        <div style="clear:both; height:5px;"></div>
    </div>
	
    
</div>



<div class="div_config">

	<?php
    $obj_horas			=	new beans_total_horas();
	$arr_horas			=	$obj_horas->listar_total_horas($med_id);
	$horas_guardadas	=	count($arr_horas);
		
	if(is_numeric($horas_guardadas) && $horas_guardadas > 0){
		
		$THO_ID					=	$arr_horas[0]["THO_ID"];//=> int(3) 
		$THO_FUN_ID				=	$arr_horas[0]["THO_FUN_ID"];//=> int(3) 
		$THO_DIAS_HABILES		=	$arr_horas[0]["THO_DIAS_HABILES"];//=> int(249) 
		$THO_CARGA_28H			=	$arr_horas[0]["THO_CARGA_28H"];//=> int(22)		
		$THO_JUBILADO_GUARDIA	=	$arr_horas[0]["THO_JUBILADO_GUARDIA"];//=> int(1)
		
		$THO_DESCANSO			=	$arr_horas[0]["THO_DESCANSO"];
		$THO_ADMINISTRATIVOS	=	$arr_horas[0]["THO_ADMINISTRATIVOS"];//=> int(12) 
		$THO_FERIADO_LEGAL		=	$arr_horas[0]["THO_FERIADO_LEGAL"];//=> int(33) 	
		$THO_FERIADO_A_ANTERIOR	=	$arr_horas[0]["THO_FERIADO_A_ANTERIOR"];//=> int(0) 
		$THO_CURSO				=	$arr_horas[0]["THO_CURSO"];//=> int(6) 
		
		}
		
	//--------------------------------------------------------------------------------------------------
	//	CALCULAR HORAS PROGRAMABLES
	//--------------------------------------------------------------------------------------------------
	
	$class_cargo_28	=	"novisible";
	$class_jubilado	=	"novisible";
	
    if($cargo28 == 28){
		//MOSTRAR DIVS DE CARGO28 Y JUBILADO
		$class_cargo_28	=	"";
		$class_jubilado	=	"";
		$descanso		=	10;
		//TIENE 1 CONTRATO DE 28, AHORA COMPROBAR ES ESTADO DE JUBILADO	
		if(isset($THO_JUBILADO_GUARDIA) && $THO_JUBILADO_GUARDIA == 1){
			$cargo28			=	$THO_CARGA_28H;
			$jubilado_selected	=	"selected='selected'";
			$descanso			=	0;
        }
	}
	//RECALCULAR TOTAL DE HORAS PROGRAMABLES
	$total	=	$cargo28 + $horas;	
	
	
	//--------------------------------------------------------------------------------------------------
	//	CALCULAR DIAS FUERA DEL ESTABLECIMIENTO
	//--------------------------------------------------------------------------------------------------
	
	//	DIAS ADMINISTRATIVOS
	if(isset($THO_ADMINISTRATIVOS) && is_numeric($THO_ADMINISTRATIVOS)){
		
		switch($THO_ADMINISTRATIVOS){
			case "6":	$admins_6	=	" selected='selected'";
						$admins_12	=	"";
						break;
			case "12":	$admins_6	=	"";
						$admins_12	=	" selected='selected'";
						break;
			default:	$admins_6	=	"";
						$admins_12	=	" selected='selected'";
			}
		$admins	=	$THO_ADMINISTRATIVOS;
		}
	else{
		$admins_6	=	"";
		$admins_12	=	" selected='selected'";
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
	
    
    <!------------   HORAS PROGRAMABLES   ------------>
	<div class="dc_title"><span style="margin-left:10px;">HORAS PROGRAMABLES</span></div>    
    
    <div class="dc_line">
    		<div class="dc_line_title">Horas Contratadas</div>
            <div class="dc_line_item"><input class="dc_line_item_input" id="hp_horas_contratadas" value="<?php echo $horas; ?>" disabled /></div>
	</div>
    
    <div class="dc_line <?php echo $class_cargo_28; ?>">
		<div class="dc_line_title">Cargo 28Hrs Activo</div>
		<div class="dc_line_item"><input class="dc_line_item_input" id="hp_cargo_28horas" value="<?php echo $cargo28; ?>" disabled ></div>
	</div>
        
	<div class="dc_line <?php echo $class_jubilado; ?>">
		<div class="dc_line_title">Cargo Jubilado Guardia</div>
		<div class="dc_line_item">	<select class="dc_line_item_select" id="hp_cargo_jubilado" onChange="recalcular_cargo28();">
										<?php
                                        echo "<option value='0'>NO</option>";
										echo "<option value='1' ".$jubilado_selected.">SI</option>";
										?>                    
									</select></div>
	</div>
	    
    <div class="dc_line">
		<div class="dc_line_title">TOTAL HORAS PROGRAMABLES</div>
		<div class="dc_line_item"><span class="dc_line_item_span_total"><input id="hp_total_horas_programables" value="<?php echo $total; ?>" disabled /></span></div>
	</div>
    
    <!------------   DIAS FUERA ESTABLECIMIENTO   ------------>
    
	<div class="dc_title"><span style="margin-left:10px;">DIAS FUERA ESTABLECIMIENTO</span></div>
    
    <div class="dc_line">
    		<div class="dc_line_title">Descanso Compensatorio</div>
            <div class="dc_line_item"><input class="dc_line_item_input" id="dfe_descanso_compensatorio" type="text" value="<?php echo $descanso; ?>" disabled></div>
	</div>
    
    <div class="dc_line">
    		<div class="dc_line_title">Dias Administrativos</div>
            <div class="dc_line_item">	<select class="dc_line_item_select" id="dfe_admins" onChange="recalcular_dias();">
                                        <option value="6"<?php echo $admins_6; ?>>6</option>
                                        <option value="12"<?php echo $admins_12; ?>>12</option>
                                        </select>
            							</div>
	</div>
    
    <div class="dc_line">
    		<div class="dc_line_title">Feriados Legales</div>
            <div class="dc_line_item"><select class="dc_line_item_select" id="dfe_feriados" onChange="recalcular_dias();">
                                        <option value="15"<?php echo $feriados_15; ?>>15</option>
                                        <option value="20"<?php echo $feriados_20; ?>>20</option>
                                        <option value="25"<?php echo $feriados_25; ?>>25</option>
                                        </select></div>
	</div>
    
    <div class="dc_line">
    		<div class="dc_line_title">Feriados Año Anterior</div>
            <div class="dc_line_item"><input class="dc_line_item_input" id="dfe_previos" type="text" value="<?php echo $previos; ?>" onKeyUp="recalcular_dias();"></div>
	</div>
    
    <div class="dc_line">
    		<div class="dc_line_title">Cursos</div>
            <div class="dc_line_item">	<select class="dc_line_item_select" id="dfe_cursos" onChange="recalcular_dias();">
                                        <option value="6">6</option>
                                        </select>
										</div>
	</div>   
    
    <div class="dc_line">
    		<div class="dc_line_title">TOTAL DIAS FUERA ESTABLECIMIENTO</div>
            <div class="dc_line_item"><span class="dc_line_item_span_total"><input id="dfe_total_dias" value="<?php echo $total_dfe; ?>" disabled /></span></div>
	</div>
    
    <div>
    
    <button onClick="guardar_horas();">Guardar Horas</button></div>
    
</div>

<div class="div_dump" style="display:none;">
	<?php
    var_dump($arr_horas);
	?>
</div>


<div class="div_bloques">

<div class="div_bloque">

	<div class="db_section"><span style="margin-left:10px;">CREACION BLOQUE</span></div>
    
    <div class="db_header"><span style="margin-left:10px;">DATOS ENCABEZADO</span></div>
	
    <div class="dc_line">
	
			<div class="dc_line_title" style="width: 110px;">Establecimiento</div>
            <div class="dc_line_item" style="width: 190px;">
					<select class="dc_line_item_select" id="select_establecimiento_bloque">
							<option value="">-- establecimiento --</option>
							<?php    
							if(is_array($arr_esb)){
								foreach($arr_esb as $esb){
									$ESB_ID				=	$esb["ESB_ID"];//=> int(1) 
									$ESB_DENOMINACION	=	$esb["ESB_DENOMINACION"];//=> string(33) "HOSPITAL HERNAN HENRIQUES ARAVENA"
                                                        
									echo "<option value='".$ESB_ID."'>".$ESB_ID."|".$ESB_DENOMINACION."</option>";
									}
								}
							?>
					</select>
					</div>                          
    		<div class="dc_line_title" style="width: 110px;">Centro Resp.</div>
            <div class="dc_line_item" style="width: 190px;">
            							<select class="dc_line_item_select" id="select_centro_responsabilidad">
                                        <option value="">-- --</option>
                                        </select></div><br>
			<div class="dc_line_title" style="width: 110px;">Servicio</div>
            <div class="dc_line_item" style="width: 190px;">
            							<select class="dc_line_item_select" id="select_servicio_bloque">
                                        <option value="">-- --</option>
                                        </select></div>                          
	</div>
    
    
    <div style="clear:both; height:5px;"></div>
    <div class="db_header"><span style="margin-left:10px;">DATOS BLOQUE</span></div>
	
    <div class="dc_line">
    		<div class="dc_line_title" style="width: 150px; text-align:center;"><b>Dia</b></div>
            <div class="dc_line_title" style="width: 120px; text-align:center; background-color:#dee0dd;"><b>Hora Inicio</b></div>
			<div class="dc_line_title" style="width: 120px; text-align:center;"><b>Hora Fin</b></div>
            <div class="dc_line_title" style="width: 220px; text-align:center;"><b>Prestacion</b></div>
	</div>
    
    
    <div class="dc_line">
            <div class="dc_line_item" style="width: 150px;">
            							<select class="dc_line_item_select" id="sel_db_dia">
                                            <option value="1">Lunes</option>
                                            <option value="2">Martes</option>
                                            <option value="2">Miercoles</option>
                                            <option value="2">Jueves</option>
                                            <option value="2">Viernes</option>
                                        </select></div>
            <div class="dc_line_item" style="width: 120px;">
            							<input class="dc_line_item_input" id="sel_db_hora_inicio" type="text" value="08:00"></div>
            <div class="dc_line_item" style="width: 120px;">
            							<input class="dc_line_item_input" id="sel_db_hora_fin" type="text" value="09:15"></div>
           	<div class="dc_line_item" style="width: 220px;">
            							<select class="dc_line_item_select" id="sel_db_prestacion">
                                            <option value="1">Prestacion</option>
											<!--<?php
											/*$pre_obj	=	new beans_tipo_prestacion();
											$arr_pre	=	$pre_obj->listar_tipo_prestacion();*/
											?>-->
                                            
                                        </select></div>
	</div>
  	
<!--------------------------------------------------------------------------------------------------------------------->

    <div class="area_bloque" id="area_bloque_pabellon">    
    
    	<div class="dc_line"><b>Pabellonaaaaaaaaa</b></div>
        <div class="dc_line">Lugar<select id="select_lugar_pabellon">
                                    <option value="x">-- Lista Fija --</option>
                                    <option value='1'>Pabellón Central</option>
									<option value='2'>Pabellón CMA</option>
                                    <option value='3'>Pabellón UPC</option>
                                    </select>
                             Equipo Quirurgico<select id="select_eqx_pabellon">
                                    <option value="x">-- Lista Fija --</option>
                                    <optgroup label="Cirugía Adulto">
                                        <option value='1'>Biliopáncreas</option>
                                        <option value='2'>Cirugía Plástica y Cabeza & Cuello</option>
                                        <option value='3'>Cirugía General</option>
                                        <option value='4'>Cirugía Cardíaca</option>
                                        <option value='5'>Cirugía Digestiva</option>
                                        <option value='6'>Cirugía de Mama</option>
                                        <option value='7'>Cirugía Tórax</option>
                                        <option value='8'>Cirugía Vascular</option>
                                        <option value='9'>Traumatología Infantil</option>                                        
                                    </optgroup>
                                    <optgroup label="Traumatología Adulto">
                                    	<option value='10'>Traumatología</option>                                    
                                    </optgroup>					
                                    <optgroup label="Ginecología y Obstetricia">
                                    	<option value='11'>Ginecología General</option>    
                                    	<option value='12'>Oncología Ginecológica</option>                                    
                                    </optgroup>                                    
                                    <optgroup label="Anestesia">
                                    	<option value='13'>Anestesia General</option>    
                                    	<option value='14'>Anestesia Cardiovascular</option>                                    
                                    </optgroup>		
                                    <optgroup label="Cirugía Infantil">
                                    	<option value='15'>Cirugía Infantil</option>    
                                    </optgroup>	
                                    <optgroup label="Medicina Interna">
                                    	<option value='16'>Cardiología, Hemodinamia</option>    
                                    	<option value='17'>Nefrología</option>                                    
                                    </optgroup>		
                                    </select>
                                    <button>Crear Bloque</button>
                                    </div>
    
    </div>
	

    <div class="area_bloque" id="area_bloque_camas">
    
    	<div class="dc_line"><b>Camas (Hospitalizados)</b></div>
        <div class="dc_line">Lugar<select id="select_lugar_camas">
                                    <option value="x">-- Lista Fija --</option>                                    
                                    <optgroup label="Pediatría">
                                        <option value='1'>Segunda Infancia</option>
                                        <option value='2'>Lactante y Preescolares</option>
                                        <option value='3'>Neonatología</option>
                                        <option value='4'>UCI Infantil</option>
                                        <option value='5'>UCI Neo</option>
                                        <option value='6'>UTI Infantil</option>
                                        <option value='7'>UTI Neo</option>                                     
                                    </optgroup>
                                    <optgroup label="Ginecología y Obstetricia">
                                        <option value='8'>Puerperio</option>
                                        <option value='9'>Alto Riesgo Obstétrico (ARO)</option>
                                        <option value='10'>Ginecología</option>
                                        <option value='11'>Onco-ginecología</option>                                    
                                    </optgroup>
                                    <optgroup label="Cirugía Indiferenciado">
                                        <option value='12'>Urología</option>
                                        <option value='13'>Cirugía Mama</option>                                  
                                    </optgroup>                                    
                                    <option value='14'>Cirugía Infantil</option>  
                                    <option value='15'>CONAC</option>                                    
                                    <optgroup label="Especialidades derivadas de Medicina Interna">
                                        <option value='16'>Medicina Interna</option>
                                        <option value='17'>Hemato-Oncología</option>
                                        <option value='18'>UCI Adultos</option>
                                        <option value='19'>UTI Adultos</option>
                                        <option value='20'>Diálisis Crónica</option>
                                        <option value='21'>Diálisis Aguda</option>
                                    </optgroup>                                    
                                    <option value='22'>Neurocirugía</option>  
                                    <option value='23'>Psiquiatría</option>  
                                    <option value='24'>Traumatología Adultos</option> 
                                    <option value='25'>Traumatología Infantil</option>                                     
                                    <optgroup label="Intensivo Cardiovascular">
                                        <option value='26'>UCI Cardioquirúrgica</option>
                                        <option value='27'>UTI Cardioquirúrgica</option>
                                    </optgroup>                                    
                                    <option value='28'>Otro</option>                                    
                                    </select>
                             Rendimiento<select id="select_rendimiento_camas">
                                    <option value="x">-- Lista Fija --</option>                                    
                                    <option value='1'>1 por hora</option>
                                    <option value='2'>2 por hora</option>
                                    <option value='3'>3 por hora</option>
                                    <option value='4'>4 por hora</option> 
                                    <option value='5'>5 por hora</option> 
                                    </select>
                                    <button>Crear Bloque</button>
                                    </div>
    
    </div>
	

    <div class="area_bloque" id="area_bloque_reuniones">
    
    	<div class="dc_line"><b>Reuniones</b></div>
        <div class="dc_line">Tipo Reunión<select id="select_reunion_reuniones">
                                    <option value="x">-- Lista Fija --</option>                                    
                                    <option value='1'>Conducta Clínica</option>
                                    <option value='2'>Clínico administrativa</option>
                                    <option value='3'>Gestión Clínico</option>
                                    </select>
                                    <button>Crear Bloque</button>
                                    </div>
    
    </div>
	

    <div class="area_bloque" id="area_bloque_gestion">
    
    	<div class="dc_line"><b>Gestión (si posee Jefatura de algo o es Coordinador)</b></div>
        <div class="dc_line">Jefatura/Cargo
        						<select id="select_cargo_gestion">
                                    <option value="x">-- Lista Fija --</option>                                    
                                    <option value='1'>Jefe de Centro de Responsabilidad</option>
                                    <option value='2'>Jefe de Servicio</option>
                                    <option value='3'>Jefe de Unidad</option>
                                    <option value='4'>Jefe de Equipo</option>
                                    <option value='5'>Coordinador de X actividad</option>
                                    </select>                                
        						<select id="select_lugar_gestion">
                                    <option value="x">-- Lista Fija --</option>                                    
                                    <option value='1'>C.R,servicio,unidad,equipo?</option>
                                    </select>                                
								<button>Crear Bloque</button>
								</div>
    
    </div>
    

    <div class="area_bloque" id="area_bloque_interconsulta">
    
    	<div class="dc_line"><b>Interconsultas</b></div>
        <div class="dc_line">Rendimiento<select id="select_rendimiento_interconsulta">
                                    <option value="x">-- Lista Fija --</option>                                    
                                    <option value='1'>1 por hora</option>
                                    <option value='2'>2 por hora</option>
                                    <option value='3'>3 por hora</option>
                                    <option value='4'>4 por hora</option> 
                                    <option value='5'>5 por hora</option> 
                                    </select>                             
								<button>Crear Bloque</button>
								</div>
    
    </div>
    

    <div class="area_bloque" id="area_bloque_procedimiento_ac">
    
    	<div class="dc_line"><b>Procedimientos Atencion Cerrada</b></div>
        <div class="dc_line">
        			Lugar<select id="select_lugar_procemiento_ac">
                                    <option value="x">-- Lista Fija --</option>                                    
                                    <option value='1'>no definido</option>
                                    </select>
                    Tipo Procedimiento<select id="select_tipo_procedimiento_procemiento_ac">
                                    <option value="x">-- Lista Fija --</option>                                    
                                    <option value='1'>Catéter Tunelizado</option>
                                    <option value='2'>Cistoscopías y Biopsias</option>
                                    <option value='3'>Colposcopía</option>
                                    <option value='4'>Dermatología</option>
                                    <option value='5'>EcoB</option>
                                    <option value='6'>Ecocardiografía</option>
                                    <option value='7'>Ecografía</option>
                                    <option value='8'>ECT</option>
                                    <option value='9'>Electroencefalograma</option>
                                    <option value='10'>Electromiografía</option>
                                    <option value='11'>Electrofisiología</option>
                                    <option value='12'>Evaluación Continencia</option>
                                    <option value='13'>Láser</option>
                                    <option value='14'>Marcapasos</option>
                                    <option value='15'>Medicina Nuclear</option>
                                    <option value='16'>Monitoreo Fetal</option>
                                    <option value='17'>Pabellón Quemados</option>
                                    </select>
                    Rendimiento<select id="select_rendimiento_procemiento_ac">
                                    <option value="x">-- Lista Fija --</option>                                    
                                    <option value='1'>1 por hora</option>
                                    <option value='2'>2 por hora</option>
                                    <option value='3'>3 por hora</option>
                                    <option value='4'>4 por hora</option> 
                                    <option value='5'>5 por hora</option> 
                                    </select>
                                                            
								<button>Crear Bloque</button>
								</div>
    
    </div>
    

    <div class="area_bloque" id="area_bloque_policlinico">
    
    	<div class="dc_line"><b>Policlínico</b></div>
        <div class="dc_line">
        			Lugar<select id="select_lugar_policlinico">
                                    <option value="x">-- Lista Fija --</option>                                    
                                    <option value='1'>CDT - Módulo A</option>
                                    <option value='1'>CDT - Módulo B</option>
                                    <option value='1'>CDT - Módulo C</option>
                                    <option value='1'>CDT - Módulo D</option>
                                    <option value='1'>Otro</option>
                                    </select>
                    Atención/Programa.<select id="select_programa_policlinico">
                                    <option value="x">-- Lista Fija --</option>                                    
                                    <option value='1'>GES</option>
                                    <option value='2'>Controles</option>
                                    <option value='3'>Consultas Nuevas</option>
                                    <option value='4'>Ingresos</option>
                                    <option value='5'>Otro</option>
                                    </select>
                    Rendimiento<select id="select_rendimiento_policlinico">
                                    <option value="x">-- Lista Fija --</option>                                    
                                    <option value='1'>1 por hora</option>
                                    <option value='2'>2 por hora</option>
                                    <option value='3'>3 por hora</option>
                                    <option value='4'>4 por hora</option> 
                                    <option value='5'>5 por hora</option> 
                                    </select>
                                                            
								<button>Crear Bloque</button>
								</div>
    
    </div>

    <div class="area_bloque" id="area_bloque_procedimiento_aa">
    
    	<div class="dc_line"><b>Procedimientos Atencion Abierta</b></div>
        <div class="dc_line">
        			Lugar<select id="select_lugar_procemiento_aa">
                                    <option value="x">-- Lista Fija --</option>                                    
                                    <option value='1'>no definido</option>
                                    </select>
                    Tipo Procedimiento<select id="select_tipo_procedimiento_procemiento_aa">
                                    <option value="x">-- Lista Fija --</option>                                    
                                    <option value='1'>Catéter Tunelizado</option>
                                    <option value='2'>Cistoscopías y Biopsias</option>
                                    <option value='3'>Colposcopía</option>
                                    <option value='4'>Dermatología</option>
                                    <option value='5'>EcoB</option>
                                    <option value='6'>Ecocardiografía</option>
                                    <option value='7'>Ecografía</option>
                                    <option value='8'>ECT</option>
                                    <option value='9'>Electroencefalograma</option>
                                    <option value='10'>Electromiografía</option>
                                    <option value='11'>Electrofisiología</option>
                                    <option value='12'>Evaluación Continencia</option>
                                    <option value='13'>Láser</option>
                                    <option value='14'>Marcapasos</option>
                                    <option value='15'>Medicina Nuclear</option>
                                    <option value='16'>Monitoreo Fetal</option>
                                    <option value='17'>Pabellón Quemados</option>
                                    </select>
                    Rendimiento<select id="select_rendimiento_procemiento_aa">
                                    <option value="x">-- Lista Fija --</option>                                    
                                    <option value='1'>1 por hora</option>
                                    <option value='2'>2 por hora</option>
                                    <option value='3'>3 por hora</option>
                                    <option value='4'>4 por hora</option> 
                                    <option value='5'>5 por hora</option> 
                                    </select>
                                                            
								<button>Crear Bloque</button>
								</div>
    
    </div>
    
    
    
    
    
    
<!--------------------------------------------------------------------------------------------------------------------->




</div>

</div>





<?php
}//end if med_id
?>

<!--------------------------------------------------------------------------------------------------------------------->




<script src="js/jquery-1.9.1.min.js"></script>
<script>
$(document).ready(function(e){
    
	$("#cargar_medico").click(function(){
		
		var med_id		=	$("#funcionario").val();
		if(med_id != "x"){
			location.href	=	"?md="+med_id;
			}
		});
	
	$("#crear_contrato").click(function(){
		
		var med_id	=	$("#hi_med_id").val();
		var ctr_id	=	$("#select_contrata").val();
		var esb_id	=	$("#select_establecimiento").val();
		var con_id	=	$("#select_horas_contrato").val();
		
		
		if(esb_id != "x" && con_id != "x"){

			var con_url	=	"med_id="+med_id+"&ctr_id="+ctr_id+"&esb_id="+esb_id+"&con_id="+con_id;
		
			var conf	=	confirm("Agregar nuevo contrato?");
			if(conf == true){
				
				$.ajax({
					url		:	"ajax/ajax_crear_contrato.php",
					type	:	"GET",
					data	:	con_url,
					success	:	function(data){
								alert(data);
								location.reload();
								}
					});
				
				}//end conf
			}
		
		
		});
	
	
	//--------------------------------------------------------------
	//						SELECT ESTABLECIMIENTO
	//--------------------------------------------------------------	
	
	$("#select_establecimiento_bloque").change(function(){
		
		var value	=	this.value;
		$.getJSON('json/json_lista_centros.php?esb_id='+value, function(data) {
			
			var items = [];
			$('#select_centro_responsabilidad').html("");
			items.push("<option value=''>-- seleccione CCRR --</option>");
			$.each(data, function(i,val) {
				items.push('<option value="'+val.RCE_ID+'">'+val.RCE_ID+"|"+val.RCE_CRE_DENOMINACION+'</option>');
				});
				$('#select_centro_responsabilidad').append( items.join('') );
				$('#select_servicio_bloque').html("<option value=''>-- --</option>");
		}).fail(function(){
				$('#select_centro_responsabilidad').html("<option value=''>--  --</option>");
				$('#select_servicio_bloque').html("<option value=''>-- --</option>");
				});
	});
	
	//--------------------------------------------------------------
	//						SELECT SERVICIOS
	//--------------------------------------------------------------	
	
	$("#select_centro_responsabilidad").change(function(){
		
		var value	=	this.value;
		$.getJSON('json/json_lista_servicios.php?cre_id='+value, function(data) {
			
			var items = [];
			$('#select_servicio_bloque').html("");
			items.push("<option value=''>-- seleccione --</option>");
			$.each(data, function(i,val) {
				items.push('<option id="'+val.SER_ID+'">'+val.SER_ID+"|"+val.SER_DENOMINACION+'</option>');
				});
				$('#select_servicio_bloque').append( items.join('') );
		}).fail(function(){
				$('#select_servicio_bloque').html("<option value=''>-- --</option>");
				});
	});
	


});

//---------------------------------------------------------------------------------------
//------------------------------		END READY		---------------------------------
//---------------------------------------------------------------------------------------




function eliminar_contrato(rcf_id){

if(rcf_id != "" && rcf_id > 0){

	var conf	=	confirm("Eliminar contrato?");
	if(conf == true){		
		$.ajax({
			url		:	"ajax/ajax_eliminar_contrato.php",
			type	:	"GET",
			data	:	"rcf_id="+rcf_id,
			success	:	function(data){
						alert(data);
						location.reload();
						}
			});
		}//end conf
	}
	
}

function recalcular_cargo28(){
	
	var jubilado		=	$("#hp_cargo_jubilado").val();	
	if(jubilado == "0"){
		$("#hp_cargo_28horas").val(28);
		$("#dfe_descanso_compensatorio").val(10);
		}
	else{
		$("#hp_cargo_28horas").val(22);
		$("#dfe_descanso_compensatorio").val(0);
		}
	
	var valor_horas		=	$("#hp_horas_contratadas").val();
	var valor_cargo28	=	$("#hp_cargo_28horas").val();	
	var valor_total		=	parseInt(valor_horas) + parseInt(valor_cargo28);
	
	$("#hp_total_horas_programables").val(valor_total);
	recalcular_dias();
	
}

function recalcular_dias(){
	
	var dfe_descanso	=	$("#dfe_descanso_compensatorio").val();	
	var dfe_admins		=	$("#dfe_admins").val();
	var dfe_feriados	=	$("#dfe_feriados").val();
	var dfe_previos		=	$("#dfe_previos").val();
	var dfe_cursos		=	$("#dfe_cursos").val();
	
	if(isNaN(dfe_previos) || dfe_previos == ""){
		dfe_previos	=	0;
		}
	
	var total_dfe		=	parseInt(dfe_descanso) + parseInt(dfe_admins) + parseInt(dfe_feriados) + parseInt(dfe_previos) + parseInt(dfe_cursos);
	
	$("#dfe_total_dias").val(total_dfe);
	
}


function guardar_horas(){
	
	var fun_id			=	$("#hi_med_id").val();
	var d_habiles		=	249;//2013
	var cargo28			=	$("#hp_cargo_28horas").val();
	var horas			=	$("#hp_horas_contratadas").val();
	var jubilado		=	$("#hp_cargo_jubilado").val();
	var d_admins		=	$("#dfe_admins").val();
	var d_cursos		=	$("#dfe_cursos").val();
	var f_anteriores	=	$("#dfe_previos").val();
	var f_legal			=	$("#dfe_feriados").val();
	var descanso		=	$("#dfe_descanso_compensatorio").val();
	var total_df		=	$("#dfe_total_dias").val();
	
	var form_url		=	"fun_id="+fun_id;
		form_url		+=	"&d_habiles="+d_habiles;
		form_url		+=	"&carga="+cargo28;
		form_url		+=	"&h_contratadas="+horas;		
		form_url		+=	"&j_guardia="+jubilado;		
		form_url		+=	"&administrativos="+d_admins;
		form_url		+=	"&curso="+d_cursos;
		form_url		+=	"&f_anteriores="+f_anteriores;		
		form_url		+=	"&f_legal="+f_legal;
		form_url		+=	"&descanso="+descanso;
		form_url		+=	"&dias_fuera="+total_df;

	$.ajax({
		  url		:	"ajax/ajax_guardar_horas.php",
		  type		:	"GET",
		  data		:	form_url,
		  success	:	function(data){
					  	var result	=	$.trim(data);
						if(result == "OK"){
							alert("HORAS GUARDADAS CORRECTAMENTE");
							location.reload();
							}
						else{
							alert(data);
							}
					  }
		  });
	
}



















</script>

</body>
</html>