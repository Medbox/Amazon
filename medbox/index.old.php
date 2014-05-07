<?php
    include_once 'clases/beans/beans_contrato.php';
    $obj_con = new beans_contrato();
    $arr = $obj_con->listar_contrato_fun(4);
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
<style>
html,body{
	font-family:Arial, Helvetica, sans-serif;
	background-color:#f2f2f2;
	}
.div_config{
	float:left;
	width:380px;
	height:400px;
	background-color:#dadadc;
	padding:10px;
	}
.dc_title{
	background-color:#4b4f55;
	font-size:14px;
	height:23px;
	line-height:23px;
	font-weight:bold;
	color:#d1d1d1;
	}
.dc_line{
	font-size:14px;
	height:30px;
	line-height:30px;
	color:#666;
	}
.dc_line_title{
	float:left;
	width:300px;
	background-color:#e7e8e9;
	}
.dc_line_item{
	float:left;
	width:80px;
	background-color:#ffffff;
	}
.dc_line_item_span_number{
	text-align:center;
	font-size:16px;
	font-weight:bold;
	display:block;
	}
.dc_line_item_span_total{
	text-align:center;
	font-size:16px;
	font-weight:bold;
	display:block;
	background-color:#ee6852;
	color:#FFF;
	}
.dc_line_item_select{
	width: 90%;
	margin-left: 5%;
	font-size: 16px;
	}
.dc_line_item_input{
	width: 85%;
	margin-left: 5%;
	font-size: 16px;
	text-align:center;
	}

.div_medic{
	height:40px;
	width:1000px;
	padding:15px;
	background-color:#abafb1;
	color:#52565b;
	margin-bottom:10px;
	}
	
.dm_medico          {	font-size:25px;		}
.dm_especialidad    {	font-size:14px;	float: left; width: 33%;}
.dm_lugar_trabajo   {	font-size:14px;	float: right; width: 33%; text-align: center;}
.dm_rut             {   font-size:14px; float: left; width: 33%; text-align: center;}



.div_bloque{
	width:600px;
	height:400px;
	float:left;
	background-color:#c8d4c8;
	padding:10px;
	margin-left:10px;
	}
.db_section{
	height:20px;
	line-height:20px;
	font-size:14px;
	font-weight:bold;
	background-color:#596859;
	color:#ffffff;
	margin-bottom:10px;
	}
.db_header{
	height:20px;
	line-height:20px;
	font-size:14px;
	background-color:#718371;
	color:#ffffff;
	}



.div_horario{
	min-height:300px;
	background-color:#fffce8;
	}
.dh_lunes,.dh_martes,.dh_miercoles,.dh_jueves,.dh_viernes{
	float:left;
	width:20%;
	min-height:300px;
	}
.dh_lunes{		background-color:#fbb3e3;	}
.dh_martes{		background-color:#d3b8fd;	}
.dh_miercoles{	background-color:#a0d9ff;	}
.dh_jueves{		background-color:#aaeed6;	}
.dh_viernes{	background-color:#c4e3a3;	}

.dh_title{
	height:30px;
	line-height:30px;
	font-weight:bold;
	font-size:16px;
	color:#666;
	text-align:center;
	}

.area_bloque{
	width:98%;
	margin:5px auto 0px auto;
	background-color:#FCC;
	}

</style>


<div class="div_medic">
	<div class="dm_medico">FERNANDO ARANEDA LEYTON</div>
        <div class="dm_especialidad">Pediatra, Infectología</div>
        <div class="dm_rut">19.201.295-3</div>
        <div class="dm_lugar_trabajo">HHHA</div>
</div>


<div class="div_config">
	
    <!------------   DATOS EXTERNOS   ------------>
	<div class="dc_title"><span style="margin-left:10px;">DATOS EXTERNOS</span></div>
    
    <div class="dc_line">
    		<div class="dc_line_title">Dias Habiles 2013</div>
            <div class="dc_line_item"><span class="dc_line_item_span_number">249</span></div>
	</div>
	
    <!------------   HORAS PROGRAMABLES   ------------>
	<div class="dc_title"><span style="margin-left:10px;">HORAS PROGRAMABLES</span></div>
    
    <div class="dc_line">
    		<div class="dc_line_title">Cargo 28Hrs Activo</div>
                <div class="dc_line_item"><select class="dc_line_item_select" id="dfe_cargo_28horas">
                                        <option value="0">NO</option>
                                        <option value="1">SI</option>                        
                                        </select></div>
	</div>
    
    <div class="dc_line">
    		<div class="dc_line_title">Horas Contratadas</div>
            <div class="dc_line_item"><select class="dc_line_item_select" id="hp_horas_contratadas">
                                        <option value="11">11</option>
                                        <option value="22">22</option>
                                        <option value="33">33</option>
                                        <option value="44">44</option>
                                        </select></div>
	</div>
    <div class="dc_line">
    		<div class="dc_line_title">Cargo Jubilado Guardia</div>
                <div class="dc_line_item"><select class="dc_line_item_select" id="hp_cargo_jubilado">
                                        <option value="0">NO</option>
                                        <option value="1">SI</option>                        
                                        </select></div>
	</div>
    <div class="dc_line">
    		<div class="dc_line_title">TOTAL HORAS PROGRAMABLES</div>
            <div class="dc_line_item"><span class="dc_line_item_span_total" id="hp_total_horas_programables">0</span></div>
	</div>
    
    <!------------   DIAS FUERA ESTABLECIMIENTO   ------------>
	<div class="dc_title"><span style="margin-left:10px;">DIAS FUERA ESTABLECIMIENTO</span></div>
    
    <div class="dc_line">
    		<div class="dc_line_title">Dias Administrativos</div>
            <div class="dc_line_item"><input class="dc_line_item_input" id="dfe_admins" type="text" value="12"></div>
	</div>
    <div class="dc_line">
    		<div class="dc_line_title">Feriados Legales</div>
            <div class="dc_line_item"><select class="dc_line_item_select" id="dfe_feriados">
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        <option value="25">25</option>
                                        </select></div>
	</div>
    <div class="dc_line">
    		<div class="dc_line_title">Feriados Año Anterior</div>
            <div class="dc_line_item"><input class="dc_line_item_input" id="dfe_previos" type="text" value="0"></div>
	</div>
    
    <div class="dc_line">
    		<div class="dc_line_title">Descanso Compensatorio</div>
            <div class="dc_line_item"><span class="dc_line_item_span_number" id="dfe_descanso_compensatorio">0</span></div>
	</div>
    <div class="dc_line">
    		<div class="dc_line_title">Cursos</div>
            <div class="dc_line_item"><input class="dc_line_item_input" id="dfe_cursos" type="text" value="6"></div>
	</div>
    <div class="dc_line">
    		<div class="dc_line_title">TOTAL DIAS FUERA ESTABLECIMIENTO</div>
            <div class="dc_line_item"><span class="dc_line_item_span_total" id="dfe_total">0</span></div>
	</div>
</div>


<!--------------------------------------------------------------------------------------------------------------------->


<div class="div_bloque">

	<div class="db_section"><span style="margin-left:10px;">CREACION BLOQUE</span></div>
    
    <div class="db_header"><span style="margin-left:10px;">DATOS [XXXXXX] (no se eligen, ya estan asociados al medico)</span></div>
	
    <div class="dc_line">
    		<div class="dc_line_title" style="width: 110px;">Contrato</div>
            <div class="dc_line_item" style="width: 190px;"><select class="dc_line_item_select" id="">
                                        <option value="1">Contrato 1</option>
                                        <option value="2">Contrato 2</option>
                                        </select></div>
			<div class="dc_line_title" style="width: 110px;">Establecimiento</div>
            <div class="dc_line_item" style="width: 190px;"><select class="dc_line_item_select" id="">
                                        <option value="1">Establecimiento 1</option>
                                        <option value="2">Establecimiento 2</option>
                                        </select></div>                          
	</div>
    <div class="dc_line">
    		<div class="dc_line_title" style="width: 110px;">Centro Resp.</div>
            <div class="dc_line_item" style="width: 190px;"><select class="dc_line_item_select" id="">
                                        <option value="1">Centro 1</option>
                                        <option value="2">Centro 2</option>
                                        </select></div>
			<div class="dc_line_title" style="width: 110px;">Servicio</div>
            <div class="dc_line_item" style="width: 190px;"><select class="dc_line_item_select" id="">
                                        <option value="1">Servicio 1</option>
                                        <option value="2">Servicio 2</option>
                                        </select></div>                          
	</div>
    
    
    <div class="db_header"><span style="margin-left:10px;">DATOS BLOQUE</span></div>
	
    <div class="dc_line">
    		<div class="dc_line_title" style="width: 150px; text-align:center;"><b>Dia</b></div>
            <div class="dc_line_title" style="width: 120px; text-align:center; background-color:#dee0dd;"><b>Hora Inicio</b></div>
			<div class="dc_line_title" style="width: 120px; text-align:center;"><b>Hora Fin</b></div>
            <div class="dc_line_title" style="width: 210px; text-align:center; background-color:#dee0dd;"><b>Prestacion</b></div>                          
	</div>
    
    
    <div class="dc_line">
            <div class="dc_line_item" style="width: 150px;"><select class="dc_line_item_select" id="">
                                        <option value="1">Lunes</option>
                                        <option value="2">Martes</option>
                                        <option value="2">Miercoles</option>
                                        <option value="2">Jueves</option>
                                        <option value="2">Viernes</option>
                                        </select></div>
            <div class="dc_line_item" style="width: 120px;"><input class="dc_line_item_input" id="db_hora_inicio" type="text" value="08:00"></div>
            <div class="dc_line_item" style="width: 120px;"><input class="dc_line_item_input" id="db_hora_fin" type="text" value="09:15"></div>
            <div class="dc_line_item" style="width: 210px;"><select class="dc_line_item_select" id="select_prestaciones">
                                                            <option value="x">-- -- --</option>
                                                            
                                                            <option value="1">Pabellon</option>
                                                            <option value="2">Camas Hosp.</option>
                                                            <option value="3">Interconsulta</option>
                                                            <option value="4">Policlinico</option>
                                                            <option value="5">Procedimientos</option>
                                                            <option value="6">Reuniones</option>
                                                            
                                                            </select></div>                    
	</div>
 
 															<?php
															/*require_once("clases/dao/Tipo_Prestacion.php");
															$obj_tpr	=	new Tipo_Prestacion();
															$arr_tpr	=	$obj_tpr->ListarTipoPrestacion(null);
															var_dump($arr_tpr);*/
															?>
  
<!--------------------------------------------------------------------------------------------------------------------->
    
    
    <div class="area_bloque" id="area_bloque_pabellon" style="display:none;">
    
    	<div class="dc_line"><b>creacion bloque (pabellon)</b></div>
        <div class="dc_line">Lugar<select id="select_lugar_pabellon">
                                    <option value="x">-- -- --</option>
                                    <?php
									require_once("clases/dao/Lugar.php");
									$obj_lgr	=	new Lugar();
									$arr_lgr	=	$obj_lgr->ListarLugar(null);
									if(is_array($arr_lgr)){
										foreach($arr_lgr as $lgr){
											$LUG_ID				=	$lgr["LUG_ID"];//=>int(3)
											$LUG_DENOMINACION	=	$lgr["LUG_DENOMINACION"];//=>string(12) "PABELLON UPC"
											$LUG_DESCRIPCION	=	$lgr["LUG_DESCRIPCION"];//=>string(12) "PABELLON UPC"			
											echo "<option value='".$LUG_ID."'>".$LUG_DENOMINACION."</option>";		
										}
									}
									?>                                                       
                                    </select></div>
        <div class="dc_line">Equipo Quirurgico<select id="select_eqx_pabellon">
                                    <option value="x">-- -- --</option>                                                        
                                    </select></div>
    
    </div>

</div>






<!--------------------------------------------------------------------------------------------------------------------->
<div style="clear:both; height:1px; border-bottom:1px dashed #999; padding-top:20px; margin-bottom:20px;"></div>


<div class="div_horario">

	<div class="dh_lunes"><div class="dh_title">LUNES</div></div>
    <div class="dh_martes"><div class="dh_title">MARTES</div></div>
    <div class="dh_miercoles"><div class="dh_title">MIERCOLES</div></div>
    <div class="dh_jueves"><div class="dh_title">JUEVES</div></div>
    <div class="dh_viernes"><div class="dh_title">VIERNES</div></div>

</div>



<!--------------------------------------------------------------------------------------------------------------------->
<div style="clear:both; height:1px; border-bottom:1px dashed #999; padding-top:20px; margin-bottom:20px;"></div>

<table width="480" border="1" cellpadding="0" cellspacing="0" style="border-collapse:collapse;" align="center">
	<tr><th colspan="2">INFORME PROGRAMACI&Oacute;N M&Eacute;DICA 2013</th></tr>
	
    <tr>
        <td width="216">Nombre Medico</td>
        <td width="197"><input type="text" value="ARANEDA LEYTON FERNANDO" disabled style="width:95%;"></td>
	</tr>
    <tr>
        <td width="216">Rut</td>
        <td width="197"><input type="text" value="6290409-7" disabled style="width:95%;"></td>
	</tr>
    <tr>
        <td width="216">Especialidad</td>
        <td width="197"><input type="text" value="Pediatra, Infectología" disabled style="width:95%;"></td>
	</tr>
    <tr>
        <td width="216">Establecimiento</td>
        <td width="197"><input type="text" value="HHHA" disabled style="width:95%;"></td>
	</tr>
    <tr>
        <td width="216">Centro de Responsabilidad</td>
        <td width="197"><input type="text" value="Médico Pediátrico" disabled style="width:95%;"></td>
	</tr>
	<tr>
        <td width="216">Unidad</td>
        <td width="197"><input type="text" value="SERV. CL. PEDIATRIA HOSP" disabled style="width:95%;"></td>
	</tr>
    
    <tr>
        <td colspan="2">&nbsp;</td>
	</tr>
    <tr>
        <td width="216">Horas Contratadas</td>
        <td width="197"><input type="text" value="xx" disabled style="width:95%;"></td>
	</tr>
    <tr>
        <td width="216">Horas Programables</td>
        <td width="197"><input type="text" value="xx" disabled style="width:95%;"></td>
	</tr>
    <tr>
        <td width="216">Horas Programadas</td>
        <td width="197"><input type="text" value="xx" disabled style="width:95%;"></td>
	</tr>
    <tr>
        <td width="216">Feriado Legal</td>
        <td width="197"><input type="text" value="xx" disabled style="width:95%;"></td>
	</tr>
    <tr>
        <td colspan="2">&nbsp;</td>
	</tr>
    <tr>
        <td width="216">Cargos</td>
        <td width="197"><input type="text" value="Comité de Auditoría Mortalidad Infantil" disabled style="width:95%;"></td>
	</tr>
    <tr>
        <td width="216">Horas Semanales gestión</td>
        <td width="197"><input type="text" value="4,5" disabled style="width:95%;"></td>
	</tr>
    <tr>
        <td width="216"><b>HORAS ATENCION CERRADA</b></td>
        <td width="197"><input type="text" value="6" disabled style="width:95%; font-weight:bold; font-size:16px;"></td>
	</tr>
    <tr>
        <td width="216">Horas Semanales Pabellon</td>
        <td width="197"><input type="text" value="0" disabled style="width:95%;"></td>
	</tr>
    <tr>
        <td width="216">Lugar o Equipo</td>
        <td width="197"><input type="text" value="Ninguna" disabled style="width:95%;"></td>
	</tr>
    <tr>
        <td width="216">Horas Semanales Sala</td>
        <td width="197"><input type="text" value="6" disabled style="width:95%;"></td>
	</tr>
    <tr>
        <td width="216">Lugar Salas</td>
        <td width="197"><input type="text" value="Lactante y Preescolares" disabled style="width:95%;"></td>
	</tr>
    <tr>
        <td width="216">Horas Semanales Interconsultas</td>
        <td width="197"><input type="text" value="0" disabled style="width:95%;"></td>
	</tr>	
	<tr>
        <td width="216"><b>HORAS ATENCION ABIERTA</b></td>
        <td width="197"><input type="text" value="13,5" disabled style="width:95%; font-weight:bold; font-size:16px;"></td>
	</tr>
    <tr>
        <td width="216">Horas Semanales Poli</td>
        <td width="197"><input type="text" value="13,5" disabled style="width:95%;"></td>
	</tr>
    <tr>
        <td width="216">Horas Semanales Procedimientos</td>
        <td width="197"><input type="text" value="0" disabled style="width:95%;"></td>
	</tr>
    <tr>
        <td width="216">Lugar o Procedimiento Principal</td>
        <td width="197"><input type="text" value="Ninguna" disabled style="width:95%;"></td>
	</tr>
    <tr>
        <td width="216">Produccion Anual esperada Poli (horas)</td>
        <td width="197"><input type="text" value="553,5" disabled style="width:95%;"></td>
	</tr>
    <tr>
        <td width="216"><b>Producción Anual Esperada Poli (4pac/hora)</b></td>
        <td width="197"><input type="text" value="2214" disabled style="width:95%; font-weight:bold; font-size:14px;"></td>
	</tr>
	
</table>









        
</body>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(e) {
    
	calcula_horas_contratadas();
	calcula_dias_fuera();
	
        
	//	HORAS PROGRAMABLES
	$("#hp_horas_contratadas").change(function(){
		calcula_horas_contratadas();
		});		
	$("#hp_cargo_jubilado").keyup(function(){
		calcula_horas_contratadas();
		});	
	
	//	DIAS FUERA ESTABLECIMIENTO
	$("#dfe_admins,#dfe_cursos,#dfe_previos").keyup(function(){
		calcula_dias_fuera();
		});		
	$("#dfe_feriados").change(function(){
		calcula_dias_fuera();
		});	
	$("#dfe_cargo_28horas").change(function(){
		var this_val	=	$(this).val();
		if(this_val == 1){
				$("#dfe_descanso_compensatorio").html(10);	}
		else{	$("#dfe_descanso_compensatorio").html(0);
				}		
		calcula_dias_fuera();
		});	
        $("#hp_cargo_jubilado").change(function(){
            var this_val    =   $(this).val();
            if(this_val == 1){
                calcula_dias_fuera_resta();                
            }else{
                calcula_dias_fuera();
            }
        });
        
        $("#dfe_feriados").change(function(){
            var jubilado    =   $("#hp_cargo_jubilado").val();
            if(jubilado == 1){
                calcula_dias_fuera_resta();                
            }else{
                calcula_dias_fuera();
            }
        });
	
	
	//
	$("#select_prestaciones").change(function(){
		var this_val	=	$(this).val();
		if(this_val == 1){//pabellon
				$("div[id^='area_bloque_']").fadeOut("fast");
				$("#area_bloque_pabellon").fadeIn("fast");
				}
		});
	
});

function calcula_horas_contratadas(){
	var horas_contratadas	=	$("#hp_horas_contratadas").val();
	var cargo_jubilado		=	$("#hp_cargo_jubilado").val();
	var total_horas_prog	=	parseInt(horas_contratadas)+parseInt(cargo_jubilado);
	$("#hp_total_horas_programables").html(total_horas_prog);
	}

function calcula_dias_fuera(){
	var admins		=	$("#dfe_admins").val();
	var feriados	=	$("#dfe_feriados").val();
	var previos		=	$("#dfe_previos").val();
	var descanso	=	$("#dfe_descanso_compensatorio").html();
	var cursos		=	$("#dfe_cursos").val();	
	var total		=	parseInt(admins)+parseInt(feriados)+parseInt(previos)+parseInt(descanso)+parseInt(cursos);
	
	$("#dfe_total").html(total);
	}
function calcula_dias_fuera_resta(){
	var admins	=	$("#dfe_admins").val();
	var feriados	=	$("#dfe_feriados").val();
	var previos	=	$("#dfe_previos").val();
	var descanso	=	$("#dfe_descanso_compensatorio").html();
	var cursos	=	$("#dfe_cursos").val();	
	var total	=	parseInt(admins)+parseInt(feriados)+parseInt(previos)+parseInt(descanso)+parseInt(cursos);
	
	$("#dfe_total").html(total-6);
	}

</script>
</html>
