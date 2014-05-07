<?php

require_once("../class/Class.Block.php");
require_once("../class/Class.Segment.php");
require_once("../class/Class.Game.php");
require_once("../class/Class.Section.php");
require_once("../class/Class.User.php");

$blk_id		=	$_GET['blk_id'];

$obj_block	=	new Block();
$arr_block	=	$obj_block->get_block($blk_id);

$obj_segment	=	new Segment();
$arr_segments	=	$obj_segment->list_all();

$obj_game		=	new Game();
$arr_games		=	$obj_game->list_all();

$obj_section	=	new Section();
$arr_sections	=	$obj_section->list_all();

$obj_user		=	new User();
$arr_editors	=	$obj_user->listarEditores();

$this_segment		=	$arr_block[0]['BLK_SEG_COD'];
$this_minutes		=	$arr_block[0]['BLK_MINUTES'];
$this_game			=	$arr_block[0]['BLK_GAM_COD'];
$this_section		=	$arr_block[0]['BLK_SEC_COD'];
$this_editor_id		=	$arr_block[0]['BLK_EDITOR_ID'];
//$this_editor_nom	=	$arr_block[0]['FUN_NOMBRES']." ".$arr_block[0]['FUN_APE_PAT']." ".$arr_block[0]['FUN_APE_MAT'];
$this_interludio	=	$arr_block[0]['BLK_COM_ID'];

/*
array(1) { 
	[0]=> array(16) { 
		["BLK_ID"]=> int(76) 
		["BLK_DATE"]=> string(10) "10/10/2013" 
		["BLK_SEG_HI"]=> string(5) "12:40" 
		["BLK_SEG_COD"]=> int(2) 
		["BLK_MINUTES"]=> int(40) 
		["BLK_GAM_DES"]=> string(11) "Mini Juegos" 
		["BLK_GAM_COD"]=> string(3) "C03" 
		["BLK_SEC_COD"]=> string(3) "S01" 
		}
	}
*/
?>


<div class="tpl_header">
	<div id="tpl_edit_block_close">X</div>
	<div id="tpl_edit_block_tittle"><span>MODIFICAR BLOQUE</span></div>
    <input id="nb_block_id" type="hidden" value="<?php echo $blk_id; ?>">
</div>

<div id="tpl_avatar" class="GAME_<?php echo $this_game; ?>"></div>

<div class="tpl_right_area">

	<div class="tpl_line">
    	<span>HR. INICIO</span>
        <select id="nb_block" disabled style="background-color:#d6d6d6;">
		<?php
		echo "<option value=''></option>";
		foreach($arr_segments as $seg){											
			$HI		=	$seg['SEG_HI'];
			$HF		=	$seg['SEG_HF'];
			$SEG	=	$seg['SEG_COD'];
			if($SEG == $this_segment){
				echo "<option value='".$SEG."' selected>[".$SEG."] ".$HI."</option>";
				}
			else{
				echo "<option value='".$SEG."'>[".$SEG."] ".$HI."</option>";
				}
			}
		?>
		</select>
	</div>
	
    <div class="tpl_line">
    	<span>DURACION</span>
        <select id="nb_minutes" disabled style="background-color:#d6d6d6;">
            <option value=""></option>
            <?php
			$option_min_40	=	$this_minutes == 40 ? " selected" : "";
			$option_min_80	=	$this_minutes == 80 ? " selected" : "";
			$option_min_120	=	$this_minutes == 120 ? " selected" : "";
			$option_min_160	=	$this_minutes == 160 ? " selected" : "";
			$option_min_200	=	$this_minutes == 200 ? " selected" : "";
			?>
            <option value="40"<?php echo $option_min_40; ?>>1 Bloque (40min)</option>
            <option value="80"<?php echo $option_min_80; ?>>2 Bloques (80min)</option>
            <option value="120"<?php echo $option_min_120; ?>>3 Bloques (120min)</option>
            <option value="160"<?php echo $option_min_160; ?>>4 Bloques (160min)</option>
            <option value="200"<?php echo $option_min_200; ?>>5 Bloques (200min)</option>
        </select>
	</div>
	
    <div class="tpl_inner">
		<span>JUEGO / SECCION</span>
		<select id="nb_game" disabled>
			<?php
			foreach($arr_games as $gam){					
				$gam_cod	=	$gam['GAM_COD'];
				$gam_des	=	$gam['GAM_DES'];
				if($gam_cod == $this_game){
					echo "<option value='".$gam_cod."' selected>[".$gam_cod."] ".$gam_des."</option>";
					}
				else{
					echo "<option value='".$gam_cod."'>[".$gam_cod."] ".$gam_des."</option>";
					}
				
				}
			?>
		</select>
		<select id="nb_section" disabled>
            <option value="">- SECCION -</option>
            <?php
            foreach($arr_sections as $sec){					
                $sec_cod	=	$sec['SEC_COD'];
                $sec_des	=	$sec['SEC_DES'];					
                
				if($sec_cod == $this_section){
					echo "<option value='".$sec_cod."' selected>[".$sec_cod."] ".$sec_des."</option>";
					}
				else{
					echo "<option value='".$sec_cod."'>[".$sec_cod."] ".$sec_des."</option>";
					}
				
                }
            ?>
		</select>
        <select id="nb_editor" disabled>
            <option value="">- EDITOR -</option>
            <?php
            foreach($arr_editors as $edit){
                $editor_nom		=	strtoupper($edit['fun_nombre']." ".$edit['fun_ape_pat']." ".$edit['fun_ape_mat']);
                $editor_id		=	$edit['USU_FUN_ID'];
                if($editor_id == $this_editor_id){
					echo "<option value='".$editor_id."' selected>[".$editor_id."] ".$editor_nom."</option>";
					}
				else{
					echo "<option value='".$editor_id."'>[".$editor_id."] ".$editor_nom."</option>";
					}
                }
            ?>
        </select>
	</div>

</div>


<div class="clear"></div>

<div class="tpl_foot_area">
	<span>INTERLUDIO / COMERCIAL</span>
    <select id="nb_interludio" disabled>
		<option value="">-</option>
        <?php
		if($this_interludio == 1){
			echo "<option value='1' selected>- DEFAULT -</option>";
			}
		else{
			echo "<option value='1'>- DEFAULT -</option>";
			}
        ?>
    </select>
</div>

<div class="clear"></div>

<div id="btn_modificar_bloque">MODIFICAR BLOQUE</div>
<div id="btn_eliminar_bloque">ELIMINAR BLOQUE</div>

<div id="btn_cancelar_bloque" style="display:none;">CANCELAR</div>
<div id="btn_guardar_bloque" style="display:none;">GUARDAR CAMBIOS</div>

<!--<button id="btn_modificar_bloque">MODIFICAR BLOQUE</button>
<button id="btn_eliminar_bloque">ELIMINAR BLOQUE</button>

<button id="btn_cancelar_bloque" style="display:none;">CANCELAR</button>
<button id="btn_guardar_bloque" style="display:none;">GUARDAR CAMBIOS</button>-->

