<div class="hr_header">
  
	<?php
 
	$week		=	(isset($_GET['w']) && $_GET['w'] != "") ? $_GET['w'] : "1";
	$wclass1	=	"";
	$wclass2	=	"";
	$wclass3	=	"";
	$wclass4	=	"";
  
	switch($week){
		case "1": $week = "A"; $wclass1 = "_selected"; break;
		case "2": $week = "O"; $wclass2 = "_selected"; break;
		case "3": $week = "A"; $wclass3 = "_selected"; break;
		case "4": $week = "O"; $wclass4 = "_selected"; break;
		default : $week = "A"; $wclass1 = "_selected";
		}
	  
	?>	
    
	<div id="btn_semana_1" class="item_week<?php echo $wclass1; ?>" style="margin-left:25px;">Semana 1</div>
	<div id="btn_semana_2" class="item_week<?php echo $wclass2; ?>">Semana 2</div>
	<div id="btn_semana_3" class="item_week<?php echo $wclass3; ?>">Semana 3</div>
	<div id="btn_semana_4" class="item_week<?php echo $wclass4; ?>">Semana 4</div>
  
  	<select id="select_program">
    	<option value=""> - Filtrar - </option>
        <?php
        for($P=1;$P<35;$P++){
			echo "<option value='".$P."'>Programa ".$P."</option>";
			}
        ?>
    </select>
	

  <img class="leyenda" src="img/leyenda.png" width="665" height="52">
  
</div>

<div class="hr_body">

	<!-------------------------------------------------------->
    <!--	    	   AREA IZQUIERDA / HORARIO				-->
    <!-------------------------------------------------------->
    <div class="programacion_body_left">
    
    <?php
	include_once("base_horarios.php");
	$filas			=	26;
	//$arr_dias	=	array(1 => "Lunes", 2 => "Martes", 3 => "Miércoles", 4 => "Jueves", 5 => "Viernes", 6 => "Sábado", 7 => "Domingo");
	$arr_dias	=	array(1 => "Lunes", 2 => "Martes", 3 => "Miércoles", 4 => "Jueves", 5 => "Viernes");
	?>

        <!-------------------------------------------->
        <!--				HORAS					-->
        <!-------------------------------------------->
        <div class="pbl_columna_horas">
            <div class="pbl_columna_title">Horas</div>
            <?php
			
			foreach($base_horas as $bdh){
				$HI	=	$bdh['HI'];
				$HF	=	$bdh['HF'];
				$HR	=	$bdh['HR'];
				echo "<a href='#' title='HORARIO ".$HR."' class='pbl_columna_celda1 ".$HR."'>".$HI." - ".$HF."</a>";
				}
				
			?>            
        </div>
        
        <!-------------------------------------------->
        <!--				BLOQUES					-->
        <!-------------------------------------------->
        <div class="pbl_columna_bloque">
            <div class="pbl_columna_title" style='border-left:1px solid #5c606b; font-size:12px;'>Bloque</div>
            <?php

			foreach($base_cbloques as $bbl){
				$NUM	=	$bbl["NBL"];
				$LARGE	=	$bbl["LONG"];
				$HEI	=	$LARGE == "D" ? "pbl_columna_blq2" : "pbl_columna_blq1";
				echo "<a href='#' class='".$HEI."'>".$NUM."</a>";
				}
				
			?>            
        </div>
        
        
        <?php
        
		foreach($arr_dias as $kday => $day){
				
			echo "<div class='pbl_columna_dia'>";
			echo "	<div class='pbl_columna_title' style='border-left:1px solid #5c606b;'>".$day."</div>";	
			
			foreach($base_bloques[$week][$kday] as $blq){
					$TIPO	=	$blq['TIPO'];
					$SEC	=	$blq['SEC'];
					$NRO	=	$blq['NRO'];
					$CLASS	=	$blq['CLASS'];
					
					$LONG	=	(isset($blq['LONG']) &&  $blq['LONG'] == "D") ? "pbl_columna_celda3" : "pbl_columna_celda2";
					
					switch($TIPO){
						case "L" : $TITLE = "En Vivo"; break;
						case "G" : $TITLE = "Grabación"; break;
						default	:  $TITLE =	"";
						}
					switch($CLASS){
						case "O" : $ALERT = "box_ocupado"; break;
						case "D" : $ALERT = "box_disponible"; break;
						default	:  $ALERT =	"box_desconocido";
						}
					
				echo "<div class='".$LONG." ".$CLASS." program_id_".$NRO."' style='border-left:1px solid #5c606b;'>";
				echo "<a href='#' title='".$TITLE."' class='box_tipo box_tipo_".$TIPO."'></a>";
				echo "<div href='#' class='".$ALERT."'></div>";
				if($CLASS == "REVOLT"){
					echo "<span>FRANJA REVOLT</span>";
					}
				else{
					echo "<span>PROGRAMA ".$NRO."</span>";
					}
				echo "</div>";
				
				}
					
			echo "</div>";			
			
			}

		
		?>
        
    </div>
      
</div>