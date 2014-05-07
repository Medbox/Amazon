<style>
#btn_editar_funcionario{
	position:absolute;
	right:0px;
	width:140px;
	height:50px;
	line-height:50px;
	background-color:#68c07a;
	font-size:14px;
	text-align:center;
	cursor:pointer;
	z-index:1;
	}
#btn_editar_funcionario:active{
	background-color:#509c5f;
	}

#btn_guardar_funcionario{
	position:absolute;
	right:0px;
	width:140px;
	height:50px;
	line-height:50px;
	background-color:#b57997;
	font-size:14px;
	text-align:center;
	cursor:pointer;
	z-index:2;
	display:none;
	}
#btn_guardar_funcionario:active{
	background-color:#a36885;
	}
#btn_cancelar_funcionario{
	position:absolute;
	right:140px;
	width:100px;
	height:50px;
	line-height:50px;
	background-color:#484c59;
	font-size:14px;
	text-align:center;
	cursor:pointer;
	z-index:2;
	display:none;
	}
#btn_cancelar_funcionario:active{
	background-color:#30343e;
	}



</style>

<?php
//session_start();
require_once("class/Class.Funcionario.php");
require_once("class/Class.EstadoCivil.php");
require_once("class/Class.Ocupacion.php");
require_once("class/Class.Ciudad.php");

$obj_fun	=	new Funcionario();
$arr_fun	=	$obj_fun->list_funcionario($_SESSION['fun_id']);

$obj_civ	=	new EstadoCivil();
$arr_civ	=	$obj_civ->list_all();

$obj_ocu	=	new Ocupacion();
$arr_ocu	=	$obj_ocu->list_all();

$obj_ciu	=	new Ciudad();
$arr_ciu	=	$obj_ciu->list_all();


//print_r($arr_civ);
//var_dump($arr_fun);

$FUN	=	$_SESSION['fun_id'];
$FROM	=	$_SESSION['fun_nom'];
$RUT	=	$arr_fun[0]["fun_rut"];
$DV		=	$arr_fun[0]["fun_dv"];
$NOMBRE	=	strtr(ucwords(strtolower($arr_fun[0]["fun_nombre"]." ".$arr_fun[0]["fun_ape_pat"]." ".$arr_fun[0]["fun_ape_mat"])),"ÁÉÍÓÚÑ","áéíóúñ");
$NAC	=	$arr_fun[0]["fun_fecha_nacimiento"];//=> NULL 
$DOM	=	$arr_fun[0]["fun_domicilio"];//=> NULL 
$CIUDAD	=	$arr_fun[0]["fun_ciudad_id"];
$CIVIL	=	$arr_fun[0]["fun_esc_id"];
$OCU	=	$arr_fun[0]["fun_ocu_id"];//=> NULL
$SEX	=	$arr_fun[0]["fun_sex_id"];//=> NULL
$CEL	=	$arr_fun[0]["fun_celular"];//=> NULL 
$EMAIL	=	$arr_fun[0]["fun_correo"];//=> NULL 
$SKYPE	=	$arr_fun[0]["fun_skype"];//=> NULL 
$FB		=	$arr_fun[0]["fun_facebook"];//=> NULL
$CARGO	=	$arr_fun[0]["car_denominacion"];//=> NULL 
$OCU	=	$arr_fun[0]["fun_ocupacion"];

?>


<div class="pf_header">
	
    <?php
	$img_rut	=	"img/avatars/".$RUT.".png";
	$avatar		=	file_exists($img_rut) ? $img_rut : "img/avatars/default.png";	
	
	echo "<div id='div_fun'>
			
			<img id='div_fun_img' src='".$avatar."' width='55' height='55'  alt=''/>
			<div id='div_fun_wrap'>
				<div id='div_fun_nombre'>".$NOMBRE."</div>
				<div id='div_fun_descripcion'>".$CARGO."</div>
			</div>
		</div>";
		
	?>
  
</div>


<div class="pf_body">
	
    <div class="pf_body_box">
       
		<div class="pf_body_box_header">
        	
            <div id="btn_cancelar_funcionario">Cancelar</div>
            <div id="btn_guardar_funcionario">Guardar Datos</div>
            
            <div id="btn_editar_funcionario">Modificar Datos</div>
         
            <span>Datos Personales</span>            
		</div>
        
        <div class="pf_body_box_table">            
            
            <div class="inner_tr_active">
				<div class="inner_tr_title"><div class="inner_tr_active_text"><span>Nombre</span></div></div>
				<div class="inner_tr_data" style="width:85%;">
                  	<div class="inner_tr_active_value"><span><?php echo $NOMBRE; ?></span></div>
				</div>
            </div>
            
            
            <div class="inner_tr_active">
            		<div class="inner_tr_title"><div class="inner_tr_active_text"><span>Rut</span></div></div>
                  <div class="inner_tr_data">
                  		<div class="inner_tr_active_value">
                            <input type="text" class="line_input" id="df_rut" value="<?php echo $RUT."-".$DV; ?>" disabled>
                        </div>
                  </div>
                  <div class="inner_tr_title"><div class="inner_tr_active_text" style="border-left: 1px solid #4f5159;"><span>Fecha Nacimiento</span></div></div>
                  <div class="inner_tr_data">
                  		<div class="inner_tr_active_value">
                            <input type="text" class="line_input" id="df_fecha_nacimiento" value="<?php echo $NAC; ?>" disabled>
                        </div>
                  </div>
            </div>
            
            
            <div class="inner_tr_active">
            		<div class="inner_tr_title"><div class="inner_tr_active_text"><span>Estado Civil</span></div></div>
                  <div class="inner_tr_data">
                  		<div class="inner_tr_active_value">
                            <select class="line_select" id="df_civil" disabled>
                                <option value=""></option>
                                <?php
                                if(is_array($arr_civ)){
									foreach($arr_civ as $civ){
										$civ_id				=	$civ['esc_id'];
										$civ_denominacion	=	$civ['esc_denominacion'];
										$civ_descripcion	=	$civ['esc_descripcion'];										
										$civ_selected		=	$CIVIL == $civ_id ? " selected" : "";
										echo "<option value='".$civ_id."'".$civ_selected.">".$civ_denominacion."</option>";										
										}
									}
								?>
                            </select>
                        </div>
                  </div>
                  <div class="inner_tr_title"><div class="inner_tr_active_text" style="border-left: 1px solid #4f5159;"><span>Ocupación</span></div></div>
                  <div class="inner_tr_data">
                  		<div class="inner_tr_active_value">
                            <!--$PRO-->
                            <input type="text" class="line_input" id="df_ocupacion" value="<?php echo $OCU; ?>" disabled>
                            <!--<select class="line_select" id="df_ocupacion" disabled>
                                <option value=""></option>
                                <?php
                                /*if(is_array($arr_ocu)){
									foreach($arr_ocu as $ocu){
										$ocu_id				=	$ocu['ocu_id'];
										$ocu_denominacion	=	$ocu['ocu_denominacion'];
										$ocu_descripcion	=	$ocu['ocu_descripcion'];
										$ocu_selected		=	$OCU == $ocu_id ? " selected" : "";									
										echo "<option value='".$ocu_id."'".$ocu_selected.">".$ocu_denominacion."</option>";										
										}
									}*/
								?>
                            </select>-->
                        </div>
                  </div>
            </div>
            
            
            <div class="inner_tr_active">
            		<div class="inner_tr_title"><div class="inner_tr_active_text"><span>Domicilio</span></div></div>
                  <div class="inner_tr_data" style="width:85%;">
                  		<div class="inner_tr_active_value">
                            <input type="text" class="line_input" id="df_domicilio" value="<?php echo $DOM; ?>" disabled>
                        </div>
                  </div>
            </div>
            
            
            <div class="inner_tr_active">
            		<div class="inner_tr_title"><div class="inner_tr_active_text"><span>Ciudad</span></div></div>
                  <div class="inner_tr_data">
                  		<div class="inner_tr_active_value">
                            <select class="line_select" id="df_ciudad" disabled>
                                <option value=""></option>
                                <?php
                                if(is_array($arr_ciu)){
									foreach($arr_ciu as $ciu){
										$ciu_id				=	$ciu['ciu_id'];
										$ciu_denominacion	=	$ciu['ciu_denominacion'];
										$ciu_descripcion	=	$ciu['ciu_descripcion'];
										$ciu_selected		=	$CIUDAD == $ciu_id ? " selected" : "";										
										echo "<option value='".$ciu_id."'".$ciu_selected.">".$ciu_denominacion."</option>";										
										}
									}
								?>
                            </select>
                        </div>
                  </div>
                  <div class="inner_tr_title"><div class="inner_tr_active_text" style="border-left: 1px solid #4f5159;"><span>Comuna</span></div></div>
                  <div class="inner_tr_data">
                  		<div class="inner_tr_active_value">
                            <select class="line_select" id="df_comuna" disabled >
                                <option value=""></option>                                
                            </select>
                        </div>
                  </div>
            </div>
            
            
            <div class="inner_tr_active">
            		<div class="inner_tr_title"><div class="inner_tr_active_text"><span>E-Mail</span></div></div>
                  <div class="inner_tr_data">
                  		<div class="inner_tr_active_value">
                            <input type="text" class="line_input" id="df_email" value="<?php echo $EMAIL; ?>" disabled>
                        </div>
                  </div>
                  <div class="inner_tr_title"><div class="inner_tr_active_text" style="border-left: 1px solid #4f5159;"><span>Telefono/Celular</span></div></div>
                  <div class="inner_tr_data">
                  		<div class="inner_tr_active_value">
                            <input type="text" class="line_input" id="df_telefono" value="<?php echo $CEL; ?>" disabled>
                        </div>
                  </div>
            </div>
            
            
            <div class="inner_tr_active" style="border:1px solid #4f5159;">
            		<div class="inner_tr_title"><div class="inner_tr_active_text"><span>Skype</span></div></div>
                  <div class="inner_tr_data">
                  		<div class="inner_tr_active_value">
                            <input type="text" class="line_input" id="df_skype" value="<?php echo $SKYPE; ?>" disabled>
                        </div>
                  </div>
                  <div class="inner_tr_title"><div class="inner_tr_active_text" style="border-left: 1px solid #4f5159;"><span>Facebook Nick</span></div></div>
                  <div class="inner_tr_data">
                  		<div class="inner_tr_active_value">
                            <input type="text" class="line_input" id="df_facebook" value="<?php echo $FB; ?>" disabled>
                        </div>
                  </div>
            </div>
            

		</div>
        
        
        
	</div>
    


</div>