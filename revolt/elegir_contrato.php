<style>
.elige_box{
	position:absolute;
	width:490px;
	height:290px;
	background-color:#2f333d;
	left:50%;
	top:45%;
	margin-left:-245px;
	margin-top:-145px;
	font-size:16px;
	text-align:center;
	color:#FFF;
	}

.elige_title{
	text-align:center;
	font-size:16px;
	}

.btn_contrato,.btn_contrato_selected{
	float:left;
	width:180px;
	height:95px;
	margin-top:32px;
	background-color:#464b57;
	cursor:pointer;
	}
.btn_contrato:active{
	background-color:#2c2e34;
	}

.btn_contrato_selected{
	background-color:#60b672;
	}

#btn_generar_contrato{
	height:50px;
	line-height:50px;
	width:180px;
	margin:20px auto 0px auto;
	background-color:#4591df;
	cursor:pointer;
	}
#btn_generar_contrato:active{
	background-color:#3879bc;
	}

</style>
<div class="elige_box">
    
    <div class="form_div_header">    
    	<div class="form_div_title">¿Qué contrato es el que deseas hacer efectivo?</div>
        <div class="form_div_close">X</div>
	</div>
    
    <input type="hidden" id="hi_elige_con_id" value="">
    <input type="hidden" id="hi_elige_con_cod" value="">
    
    <div class="btn_contrato" id="btn_elige_contrato_22_|RPP_03_12" style="margin-left:60px;"><div style="margin-top:25px;">Bloque 12<br>Programa 12</div></div>
    <div class="btn_contrato" id="btn_elige_contrato_23_|RPP_04_11" style="margin-left:10px;"><div style="margin-top:25px;">Bloque 11<br>Programas 11/D11</div></div>
    <div style="clear:both; height:1px;"></div>
    <div id="btn_generar_contrato">Generar Contrato</div>
    
</div>