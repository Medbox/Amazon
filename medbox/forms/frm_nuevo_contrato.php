<?php
require_once("../clases/beans/beans_establecimiento.php");
require_once("../clases/beans/beans_contrato.php");
?>

<style>
#div_nuevo_contrato{
	width:420px;
	height:320px;
	position:absolute;
	left:50%;
	top:45%;
	margin-left:-210px;
	margin-top:-163px;
	background-color:#f9f9f9;
	}
#div_nuevo_contrato_header{
	height:50px;
	line-height:50px;
	background-color:#6d8790;
	color:#FFF;
	font-size:16px;
	}
#div_nuevo_contrato_header > span{
	display:block;
	float:left;
	margin-left:20px;
	}
#close_modal{
	position:absolute;
	margin-left:360px;
	width:60px;
	height:50px;
	line-height:50px;
	text-align:center;
	font-size:20px;
	background-color:#597179;
	color:#FFF;
	cursor:pointer;
	}
#close_modal:active{
	background-color:#455960;
	}	
#div_nuevo_contrato_body{
	height:270px;
	}

/*---------------------------------------*/

.div_nuevo_contrato_line{
	height:20px;
	font-family:OpenSansSemibold;
	font-size:14px;
	color:#39464b;
	}
.div_nuevo_contrato_line > span{
	margin-left:32px;
	}
.div_nuevo_contrato_line > select{
	margin-left:32px;
	height:32px;
	font-family:OpenSansLight;
	border:1px solid #dcdcdc;
	background-color:#ffffff;
	font-size:16px;
	width:356px;
	outline:none;
	}

.btn_item_hora{
	float:left;
	width:64px;
	height:48px;
	background-color:#ffffff;
	border:1px solid #dcdcdc;
	margin-left:6px;
	color:#c2c2c2;
	text-align:center;
	cursor:pointer;
	}
.btn_item_hora_text{
	font-family:OpenSansExtrabold;
	font-size:25px;
	height:28px;
	}
.btn_item_hora_sub{
	font-family:OpenSansLight;
	font-size:12px;
	height:14px;
	}
.btn_item_hora:active{
	background-color:#ececec;
	}
	
.btn_item_hora_selected{
	float:left;
	width:64px;
	height:48px;
	background-color:#84c7a8;
	border:1px solid #76b497;
	margin-left:6px;
	color:#ffffff;
	text-align:center;
	cursor:pointer;
	}

/*-----------------------------*/

#btn_crear_contrato{
	width:190px;
	height:50px;
	line-height:50px;
	background-color:#84b1cd;
	cursor:pointer;
	color:#FFF;
	font-family:OpenSansLight;
	font-size:14px;
	margin-left:auto;
	margin-right:auto;
	}
#btn_crear_contrato:active{
	background-color:#6994ae;
	}


</style>

<div id="div_nuevo_contrato">
	
    
    <div id="close_modal">X</div>
	<div id="div_nuevo_contrato_header"><span>Crear Nuevo Contrato</span></div>
    
    
    <div id="div_nuevo_contrato_body">
		<div style="height:15px;"></div>
        
		<div class="div_nuevo_contrato_line"><span>Contrata</span></div>        
        <div class="div_nuevo_contrato_line" style="height:34px;">            
			<select id="select_contrata">
                <option value="">-- Quien Contrata --</option>
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
            </select>
        </div>
        
        <div style="height:6px;"></div>
        
        <div class="div_nuevo_contrato_line"><span>Lugar Desempeño</span></div>        
        <div class="div_nuevo_contrato_line" style="height:34px;">
            <select id="select_establecimiento">
                <option value="">-- establecimiento --</option>
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
            </select>        
		</div>
        
		
        <div style="height:10px;"></div>
		
        <div class="div_nuevo_contrato_line" style="padding-left:26px; height:50px;">
        <input type="hidden" id="hi_horas_contrato">	
        	
            <?php    
			//listar tipo de horas 
			$obj_con	=	new beans_contrato();
			$arr_con	=	$obj_con->listar_contrato();
			
			if(is_array($arr_con)){
					foreach($arr_con as $con){
						$CON_ID				=	$con["CON_ID"];//=> int(1) 
						$CON_DENOMINACION	=	$con["CON_DENOMINACION"];//=> string(2) "33" 
						$CON_DESCRIPCION	=	$con["CON_DESCRIPCION"];//=> string(2) "33" 
												
						echo "<div class='btn_item_hora' id='".$CON_ID."'>
								<div class='btn_item_hora_text'>".$CON_DENOMINACION."</div>
								<div class='btn_item_hora_sub'>Horas</div>
							</div>";
						
						}
					}
			
			?>

        </div>
        
        <div style="height:13px;"></div>
		
        <div class="div_nuevo_contrato_line" style="height:50px; text-align:center;">
        	<div id="btn_crear_contrato" onClick="crear_contrato();">Crear Contrato</div>
        </div>

    
    </div>

        
</div>