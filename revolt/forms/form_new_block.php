<?php

require_once("../class/Class.Section.php");
require_once("../class/Class.Game.php");
require_once("../class/Class.Segment.php");
require_once("../class/Class.User.php");

$obj_segment	=	new Segment();
$arr_segments	=	$obj_segment->list_all();

$obj_game		=	new Game();
$arr_games		=	$obj_game->list_all();

$obj_section	=	new Section();
$arr_sections	=	$obj_section->list_all();

$obj_user		=	new User();
$arr_editors	=	$obj_user->listarEditores();

/*var_dump($arr_editors);

array(1) { [0]=> array(24) { 
	["USU_ID"]=> int(3) 
	["USU_FUN_ID"]=> int(3) 
	["USU_ROL_ID"]=> int(2) 
	["USU_USERNAME"]=> string(6) "CPAVEZ" 
	["USU_PASSWORD"]=> string(5) "PAVEZ" 
	["fun_rut"]=> int(19201295) 
	["fun_dv"]=> string(1) "3" 
	["fun_nombre"]=> string(9) "CRISTHIAN" 
	["fun_ape_pat"]=> string(5) "PAVEZ" 
	["fun_ape_mat"]=> string(6) "FRANCO" 
	["fun_activo"]=> int(1) 
	["rol_des"]=> string(6) "EDITOR" 
	}
}*/


?>

<div class="tpl_header">
	<div id="tpl_new_block_close">X</div>
	<div id="tpl_new_block_tittle"><span>CREAR NUEVO BLOQUE :D</span></div>
</div>

<div id="tpl_avatar"></div>

<div class="tpl_right_area">
	
    <div class="tpl_line">
    	<span>HR. INICIO</span>
        <select id="nb_block">
		<?php
		echo "<option value=''>- INICIO -</option>";
		foreach($arr_segments as $seg){											
			$HI		=	$seg['SEG_HI'];
			$HF		=	$seg['SEG_HF'];
			$SEG	=	$seg['SEG_COD'];											
			echo "<option value='".$SEG."'>[".$SEG."] ".$HI."</option>";
			}
		?>
		</select>
	</div>
	
    <div class="tpl_line">
    	<span>DURACION</span>
        <select id="nb_minutes">
            <option value="">- DURACION -</option>
            <option value="40">1 Bloque (40min)</option>
            <option value="80">2 Bloques (80min)</option>
            <option value="120">3 Bloques (120min)</option>
            <option value="160">4 Bloques (160min)</option>
            <option value="200">5 Bloques (200min)</option>
		</select>
	</div>
	
    <div class="tpl_inner">
		<span>JUEGO / SECCION / EDITOR</span>
		<select id="nb_game">
            <?php
            foreach($arr_games as $gam){					
                $gam_cod	=	$gam['GAM_COD'];
                $gam_des	=	$gam['GAM_DES'];					
                echo "<option value='".$gam_cod."'>[".$gam_cod."] ".$gam_des."</option>";
                }
            ?>
        </select>
		<select id="nb_section">
            <option value="">- SECCION -</option>
            <?php
            foreach($arr_sections as $sec){					
                $sec_cod	=	$sec['SEC_COD'];
                $sec_des	=	$sec['SEC_DES'];					
                echo "<option value='".$sec_cod."'>[".$sec_cod."] ".$sec_des."</option>";
                }
            ?>
        </select>
        <select id="nb_editor">
            <option value="">- EDITOR -</option>
            <?php
            foreach($arr_editors as $edit){
                $editor_nom		=	strtoupper($edit['fun_nombre']." ".$edit['fun_ape_pat']." ".$edit['fun_ape_mat']);
                $editor_cod		=	$edit['USU_FUN_ID'];
                echo "<option value='".$editor_cod."'>[".$editor_cod."] ".$editor_nom."</option>";
                }
            ?>
        </select>
	</div>
    
</div>

<div class="clear"></div>

<div class="tpl_foot_area">
	<span>INTERLUDIO / COMERCIAL</span>
    <select id="nb_interludio">
		<option value="">-</option>
        <option value="1">- DEFAULT -</option>
    </select>
</div>

<div class="clear"></div>

<div class="flat_button_green" id="btn_crear_bloque">CREAR BLOQUE</div>






