<?php

require_once("class/Class.Game.php");
require_once("class/Class.Section.php");
require_once("class/Class.Segment.php");
require_once("class/Class.Block.php");
include_once("class/Class.Functions.php");

$obj_game		=	new Game();
$arr_games		=	$obj_game->list_all();

$obj_section	=	new Section();
$arr_sections	=	$obj_section->list_all();

$obj_segment	=	new Segment();
$arr_segments	=	$obj_segment->list_all();

$obj_block		=	new Block();



if(isset($_GET['fecha'])){
		$fecha	= $_GET['fecha'];		}
else{	$fecha	= date("d/m/Y");		}

$monday	=	getLunes($fecha);


?>

<div id="pr_left">
	<input type="text" id="datepicker" value="<?php echo $fecha; ?>">
    <select id="select_game">
    	<option value=""> - Filtrar - </option>
        <?php
		foreach($arr_games as $gam){

			$gam_cod	=	$gam['GAM_COD'];
			$gam_des	=	$gam['GAM_DES'];
			
			echo "<option value='".$gam_cod."'>[".$gam_cod."] ".$gam_des."</option>";
			
			}
        ?>
    </select>
</div>

<div id="pr_right">
	<div id="pr_right_th">
    <?php
	echo "<div class='th_column_segment'>SEGMENTOS</div>";
	
	for($i=1;$i<8;$i++){	
	
		$column_day		=	getDatePlus($monday,$i);
		$column_stp		=	getStamp($column_day);
		$day_aux		=	explode("|",strftime("%d|%A|%b, %Y",$column_stp));
		$this_day		=	date("d/m/Y",$column_stp);
		$array_days[]	=	$this_day;	
		
		echo "<div class='th_column_day'>";
		echo "	<div class='column_day_title'>
					<div class='column_day_title_date'>".utf8_encode(strtoupper($day_aux[0]))."</div>
					<div class='column_day_title_add' id='".$column_stp."'>+</div>
					<div class='column_day_inner'>
						<div class='column_day_title_day'>".utf8_encode(strtoupper($day_aux[1]))."</div>
						<div class='column_day_title_month'>".utf8_encode(strtoupper($day_aux[2]))."</div>
					</div>
					</div>";	
		
		echo "</div>";
	
	}//end for 1-7
	
	?>
    </div>
	<div id="pr_right_wrap">
	<?php
    
	echo "<div class='td_column_segment'>";
	//LISTA DE HORAS
	foreach($arr_segments as $seg){
		
		$HI		=	$seg['SEG_HI'];
		$HF		=	$seg['SEG_HF'];
		$SEG	=	$seg['SEG_COD'];
		
		echo "<div class='td_column_segment_block'>";
		echo "		<div class='td_column_segment_block_txt1'>SEG ".$SEG."</div>";
		echo "		<div class='td_column_segment_block_txt2'>".$HI." - ".$HF."</div>";
		echo "</div>";
		
		
		}
	echo "</div>";	
	
	$d = 0;
	foreach($array_days as $day){
		
		$left	=	(13 * $d ) + 7;
		echo "<div class='td_column_day' style='left:".$left."%; margin-left:".$d."px;'>";
		cargar_bloques($day);
		echo "</div>";
		$d++;
		}	

    
    ?>

	</div><!--end wrap-->
</div>