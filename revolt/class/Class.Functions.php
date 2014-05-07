<?php

function cargar_bloques($this_day){

	$obj_block = new Block();
	$arr_blocks	=	$obj_block->list_block($this_day);

	
	if(isset($arr_blocks) && count($arr_blocks) > 0 ){
		
		$segment_counter	=	1;
		$BLK_WEEK			=	getWeek($this_day);
		
		foreach($arr_blocks as $blk){
			
			$BLK_ID			=	$blk['BLK_ID'];		// => string '17' (length=2)
			$BLK_DATE		=	$blk['BLK_DATE'];	// => string '18/09/2013' (length=10)
			$BLK_HOUR		=	$blk['BLK_SEG_HI'];	// => string '14:00' (length=5)			
			$BLK_MINUTES	=	$blk['BLK_MINUTES'];// => string '80' (length=2)					
			$BLK_SEGMENT	=	$blk['BLK_SEG_COD'];// => string '4' (length=1)	
			$BLK_GAM_COD	=	$blk['BLK_GAM_COD'];// => string 'L09' (length=3)
			$BLK_GAM_DES	=	$blk['BLK_GAM_DES'];// => string 'Startcraft' (length=10)			
			$BLK_SECTION	=	$blk['BLK_SEC_COD'];// => string 'S01' (length=3)	

            
			//generando espacios vacios mientras no venga el segmento correlativo desde la bd
			while($segment_counter < $BLK_SEGMENT){
				generar_bloque_vacio($this_day,$segment_counter);
				$segment_counter++;
				}
			//generando el bloque con los datos de la bd
			if($BLK_SEGMENT == $segment_counter){								
				
				generar_bloque($BLK_DATE,$BLK_WEEK,$BLK_ID,$BLK_HOUR,$BLK_GAM_COD,$BLK_GAM_DES,$BLK_MINUTES,$BLK_SECTION);
				
				if($BLK_MINUTES == 40){		$segment_counter	=	$segment_counter + 1;	}
				if($BLK_MINUTES == 80){		$segment_counter	=	$segment_counter + 2;	}
				if($BLK_MINUTES == 120){	$segment_counter	=	$segment_counter + 3;	}
				if($BLK_MINUTES == 160){	$segment_counter	=	$segment_counter + 4;	}
				if($BLK_MINUTES == 200){	$segment_counter	=	$segment_counter + 5;	}
				
				
				}
	
			}
			//completar bloques vacios
			while($segment_counter < 19){
				generar_bloque_vacio($this_day,$segment_counter);
				$segment_counter++;
				}

		
		}
	else{
		//completar bloques vacios
		$segment_counter	=	1;
		while($segment_counter < 19){
			generar_bloque_vacio($this_day,$segment_counter);
			$segment_counter++;
			}
		}
	
	}

function generar_bloque_vacio($DAY,$SEG){
	echo "<div class='column_block_empty'></div>";
	}

function generar_bloque($fecha,$semana,$id_bloque,$hora_inicio,$cod_juego,$texto,$duracion,$seccion){
	
    
    
	//generar alto
	switch($duracion){
		case '40':	$alto	=	$duracion + (4*1);		break;	//40 + 4
		case '80':	$alto	=	$duracion + (4*2) + 1;	break;	//40 + 4 + 1(border)
		case '120':	$alto	=	$duracion + (4*3) + 2;	break;	//40 + 4 + 2(border)
		case '160':	$alto	=	$duracion + (4*4) + 3;	break;	//40 + 4 + 3(border)
		case '200':	$alto	=	$duracion + (4*5) + 4;	break;	//40 + 4 + 4(border)
		default:	$alto	=	$duracion + 4;				//40 + 4
		}
	//generar color	
	if($cod_juego == "" || $cod_juego == NULL){
		$cod_juego	=	"NC";
		}
			
	//generando el codigo
	$file_name	=	"";
	$fecha_arr	=	explode("/",$fecha);// 17/09/2013 -> [17]/[09]/[2013]
	$year_arr	=	explode("20",$fecha_arr[2]);// 2013 -> []20[13]
	$file		=	false;
	
	//C01.A13.M09.W2.S03
	if($cod_juego != "NC" && $seccion != ""){
		
		$nmcl_game	=	$cod_juego;
		$nmcl_year	=	'A'.$year_arr[1];
		$nmcl_month	=	'M'.$fecha_arr[1];
		$nmcl_week	=	'W'.$semana;
		$nmcl_sect	=	$seccion;

		//$file_name		=	$cod_juego.".".$seccion.".".$semana.".".$fecha_arr[1].".".$year_arr[1];
		$file_name	=	$nmcl_game.".".$nmcl_year.".".$nmcl_month.".".$nmcl_week.".".$nmcl_sect;
		$file		=	videoExists($file_name);
		
		}
	
	
	echo "	<a href='#' id='".$id_bloque."' title='".$file_name."' class='column_block ".$cod_juego."' style='height:".$alto."px;'>";
	echo "		<div class='column_block_line1'>";
	//echo "			<div class='column_block_clock'>".$hora_inicio."</div>";
	echo "			<div class='column_block_text'>".$texto."</div>";
	echo "		</div>";
	echo "		<div class='column_block_line2'>";
	
	if($file){
		echo "		<div class='column_block_file'></div>";
		}
	//if(videoExists($file_name) == 1){	echo "<div class='column_block_file'></div>";	}
	
	echo "			<div class='column_block_duration'>".$duracion."min</div>";
	
	if($seccion != ""){
		echo "		<div class='column_block_section'>".$seccion."</div>";
		}
	
	echo "		</div>";
	echo "	</a>";
	
	}

function getLunes($today){	
	
	$f_aux	=	explode("/",$today);
	$f_dia	=	$f_aux[0];
	$f_mes	=	$f_aux[1];
	$f_ano	=	$f_aux[2];

	
	$tstamp		=	mktime(0,0,0,$f_mes,$f_dia,$f_ano);
	$week_nro	=	date("N", $tstamp);

	
	switch($week_nro){

		case 1: $mon_stamp		=	mktime(0,0,0,$f_mes,$f_dia,$f_ano);		break;
		case 2: $mon_stamp		=	mktime(0,0,0,$f_mes,$f_dia-1,$f_ano);	break;
		case 3:	$mon_stamp		=	mktime(0,0,0,$f_mes,$f_dia-2,$f_ano);	break;
		case 4: $mon_stamp		=	mktime(0,0,0,$f_mes,$f_dia-3,$f_ano);	break;
		case 5: $mon_stamp		=	mktime(0,0,0,$f_mes,$f_dia-4,$f_ano);	break;
		case 6: $mon_stamp		=	mktime(0,0,0,$f_mes,$f_dia-5,$f_ano);	break;
		case 7: $mon_stamp		=	mktime(0,0,0,$f_mes,$f_dia-6,$f_ano);	break;
				
		}

	$monday		=	date("d/m/Y", $mon_stamp);

	return $monday;
	
	}

function getDatePlus($sunday,$i){
	
	//for 1-7
	//1:domingo / 7:sabado
	$dom_aux	=	explode("/",$sunday);
	switch($i){
		case 1:	$result = date("d/m/Y",mktime(0,0,0,$dom_aux[1],$dom_aux[0],$dom_aux[2]));   break;
		case 2:	$result = date("d/m/Y",mktime(0,0,0,$dom_aux[1],$dom_aux[0]+1,$dom_aux[2])); break;
		case 3:	$result = date("d/m/Y",mktime(0,0,0,$dom_aux[1],$dom_aux[0]+2,$dom_aux[2])); break;
		case 4:	$result = date("d/m/Y",mktime(0,0,0,$dom_aux[1],$dom_aux[0]+3,$dom_aux[2])); break;
		case 5:	$result = date("d/m/Y",mktime(0,0,0,$dom_aux[1],$dom_aux[0]+4,$dom_aux[2])); break;
		case 6:	$result = date("d/m/Y",mktime(0,0,0,$dom_aux[1],$dom_aux[0]+5,$dom_aux[2])); break;
		case 7:	$result = date("d/m/Y",mktime(0,0,0,$dom_aux[1],$dom_aux[0]+6,$dom_aux[2])); break;
		}	
	return $result;	
	
	}

function getStamp($date){
		
	$date_aux	=	explode("/",$date);
	$timestamp	=	mktime(0,0,0,$date_aux[1],$date_aux[0],$date_aux[2]);
	
	return $timestamp;
	
	}

function getWeek($date){
	
	
	$date_arr	=	explode("/",$date);
	$date_day	=	$date_arr[0];
	$date_month	=	$date_arr[1];
	$date_year	=	$date_arr[2];
	
	//primer dia de la semana
	$stump_first	=	mktime(0,0,0,$date_month,1,$date_year);
	//dia actual de la semana
	$stump_today	=	mktime(0,0,0,$date_month,$date_day,$date_year);
	
	$week_first		=	date("W", $stump_first);
	$week_today		=	date("W", $stump_today);
	$week_number	=	$week_today - $week_first + 1;
	
	//return "Semana 1er dia: ".$week_first." | Semana Este dia: ".$week_today." | Nro Semana: ".$week_number;
	return $week_number;
	
	}

function videoExists($code){
	
	$code_arr		=	explode(".",$code); // C01.A13.M09.W2.S03
	$game_folder	=	$code_arr[0];
	$year_folder	=	$code_arr[1];
	$game_file		=	$code.".mp4";
	$path_file		=	"videos/".$game_folder."/".$year_folder."/".$game_file;

	if (file_exists($path_file)) {
			return true;
			}
	else{	return false;
			}
	
	}

function get_fecha_hoy(){
	
	$dias	=	array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	$meses	=	array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
	$return	=	date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
	//Salida: 24 de Febrero del 2012
	return $return;
	}

	
?>