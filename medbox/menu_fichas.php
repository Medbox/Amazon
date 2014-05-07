<style>
    .ficha_header{
        height:80px;
        background-color:#e8eaed;
        border-bottom:1px solid #c6c7cc;
    }
    .ficha_body{
        position:absolute;
        width:100%;
        top:81px;
        bottom:0px;
        margin-bottom: 10px;
        /*background-color:#F96;*/
    }
    .ficha_body_left{
        float:left;
        width:78%;
        margin-left:1%;
        margin-top:10px;
        margin-bottom:50px;
        background-color:#069;
        min-height:100px;

    }
    .ficha_body_right{
        float:right;
        width:19%;
        margin-right:1%;
        margin-top:11px;
        margin-bottom:50px;
        background-color:#f7f7f7;
        border:1px solid #c6c7cc;
        min-height:350px;
    }

    .div_busqueda{
        float: left;
        width: 15%;
        margin: 10px 0px 0px 24px;
        height: 60px;
        background-color: #84c7a8;
    }
    .ficha_header span{
        float: left;
        /*font-family: OpenSansLight !important;*/
        font-size: 16px;
        margin-left: 25px;
        color: #5f767e;
    }
    .nro_cct{
        float: right;
        margin-right: 20px;
        font-size:  1.9em;
        font-family: OpenSansSemibold;
        color: #777;
        text-align: center;
        line-height: 80px
    }
    
    .input_text{
        float: left;
        border: 1px solid #dadada;
        background-color: #FFF;
        font-size: 20px;
        font-family: OpenSansLight;
        outline: none;
        text-align: center;
        margin-top: 25px;
        margin-left: 20px;
        width: 150px;       
    }
    .btn_buscar_paciente{
        width:120px;
        height:30px;
        background-color:#a3c789;
        float:left;
        margin:25px 0px 0px 15px;
        text-align:center;
        cursor:pointer;
    }
    .btn_buscar_paciente:active{
        background-color:#99C07C;
    }	
    .btn_buscar_paciente > span{
        display:block;
        /*margin-top:12px;*/
        color:#FFF;
        font-size:16px;
        line-height: 30px;
    }
    .paciente{
        float: left;
        width: 450px;
        margin-left: 20px;
        margin-top: 16px;
        background-color: #f9f9f9;
        min-height: 470px;
        padding-bottom: 20px;
        border: 1px solid #dcdcdc;
    }
    .sub_menu{
        float: left;
        width: 125px;
        margin-left: 5px;
        margin-top: 16px;
        background-color: #f9f9f9;
        min-height: 470px;
        padding-bottom: 20px;
        border: 1px solid #c6c7cc;
    }    
    .datos_body{
        float: left;
        width: 50%;
        margin-left: 5px;
        margin-top: 16px;
        background-color: #f9f9f9;
        min-height: 470px;
        height: 470px;
        padding-bottom: 20px;
        border: 1px solid #c6c7cc;
        overflow-y: auto;
    }
    #spn_blank_msg{
        font-size:  1.9em;
        font-family: OpenSansSemibold;
        color: #b6b6b6;
        text-align: center;
        margin-left: 3%;
    }
    .bnt_carga_new_paciente{
        position: absolute;
        font-family: OpenSansLight;
        text-decoration: none;
        width: 220px;
        height: 30px;
        line-height: 30px;
        background-color: #769bb6;
        color: #fff;
        text-align: center;
        margin-top: 0%;
        margin-left: 8%;
        font-size: 14px;
        cursor: pointer;
    }

    .cont{
        margin-top: 15px;
    }
    .contendor_pac{
        width: 100%;
        height: 35px;
    }
    .contendor_pac > span{
        float: left;
        font-size: 18px;
        margin-left: 15px;
        margin-right: 10px;
        color: #5f767e;        
        line-height: 35px;
        width: 140px;

    }

    .input_contenedor{
        float: left;
        border: 1px solid #dadada;
        background-color: #FFF;
        font-size: 20px;
        outline: none;
        width: 265px;  
        color: #5f767e;
        font-family: OpenSansLight;
        text-transform: uppercase;
    }
    .cubo_sub_menu{
        width: 100%;
        height: 80px;
        background-color: #5f767e;
        border-bottom: 1px solid #9FC2D8;
        cursor: pointer;
    }
    
    .seleccionado{
        background-color: #60a9d7;
        border-bottom: 1px solid #7C9AAD;
    }
    .cubo_sub_menu span{
        margin-top: 15px;
        margin-bottom: 15px;
        margin-left: 5px;
        color: #fff;
        font-family: OpenSansSemibold;
        position: absolute;
    }
    .cont_text_area{
        width: 95%;
        margin-left: 15px;
        height: 150px;
    }
    .cont_text_area span{
        width: 100%;
        height: 50px;
        line-height: 50px;
        float: left;
        font-family: OpenSansBold;
        color:#696969;
    }
    .cont_text_area textarea{
        float: left;
        font-size: 18px;
        text-transform: uppercase;
        font-family: OpenSansLight;
        color: #5f767e;
        width: 100%;
    }
    
    .bnt_guardar{
        font-family: OpenSansLight;
        text-decoration: none;
        width: 220px;
        height: 30px;
        line-height: 30px;
        background-color: #769bb6;
        color: #fff;
        text-align: center;
        margin-top: 0%;
        margin-left: 30%;
        font-size: 14px;
        cursor: pointer;
    }
    
    .inp_diagnostico{
        width: 460px;
        height: 25px;
        font-size: 18px;
        text-transform: uppercase;
        font-family: OpenSansLight;
        color: #5f767e;
        line-height: 25px;        
    }
    
    .table_diag{
        border: 1px solid #5f767e;
        border-collapse: collapse;
        margin-top: 5px;
    }
    .table_diag td{
        border: 1px solid #5f767e;        
        border-collapse: collapse;
    }
    
    .btn_agregar_diagnostico{
        width:100px;
        height:30px;
        background-color:#a3c789;
        float:right;
        margin:0px 0px 0px 15px;
        text-align:center;
        cursor:pointer;
    }
    .btn_agregar_diagnostico:active{
        background-color:#99C07C;
    }	
    .btn_agregar_diagnostico > span{
        display:block;
        /*margin-top:12px;*/
        color:#FFF;
        font-size:16px;
        line-height: 30px;
    }    
    
    
    
</style>


<div class="ficha_header">
    <span style="line-height: 80px">BUSCAR RUT PACIENTE</span>
    <input type="text" id="rut_busqueda" class="input_text"/>
    <div class="btn_buscar_paciente" id="btn_buscar"><span id="prueba">BUSCAR</span></div>
    <div class="nro_cct"></div>
    <input type="hidden" id="nro_cct">
    <input type="hidden" id="fic_id">
    <input type="hidden" id="cie_id">
</div>

<div class="ficha_body">
    <div class="paciente">
        <span id="spn_blank_msg" style="line-height: 200px; display: none;">PACIENTE NO ENCONTRADO</span>
        <div class="bnt_carga_new_paciente" id="btn_new_paciente" style="display: none;">
            REGISTRAR NUEVO PACIENTE
        </div>
        <div class="cont" id="cont" style="display: none;">
            <input type="hidden" id="pac_id"/>
            <div class="contendor_pac">
                <span>RUT</span>
                <input type="text" id="rut" class="input_contenedor" disabled/>
            </div> 
            <div class="contendor_pac">
                <span>NOMBRES</span>
                <input type="text" id="nombres" class="input_contenedor"/>
            </div> 
            <div class="contendor_pac">
                <span>A. PATERNO</span>
                <input type="text" id="ape_pat" class="input_contenedor"/>
            </div> 
            <div class="contendor_pac">
                <span>A. MATERNO</span>
                <input type="text" id="ape_mat" class="input_contenedor"/>
            </div> 
            <div class="contendor_pac">
                <span>F. NACIMIENTO</span>
                <input type="text" id="f_nacimiento" class="input_contenedor"/>
            </div> 
            <div class="contendor_pac">
                <span>SEXO</span>
                <select id="sexo" class="input_contenedor">
                    <option value="1">MASCULINO</option>
                    <option value="2">FEMENINO</option>
                </select>
            </div> 
            <div class="contendor_pac">
                <span>DIRECCION</span>
                <input type="text" id="direccion" class="input_contenedor"/>
            </div>
            <div class="contendor_pac">
                <span>TELEFONO</span>
                <input type="text" id="telefono" class="input_contenedor"/>
            </div>
            <div class="bnt_carga_new_paciente" id="btn_guardar_new_paciente" style="margin-top: 20px; display: none;">
                GUARDAR NUEVO PACIENTE
            </div>
            <div class="bnt_carga_new_paciente" id="btn_cargar_new_paciente" style="margin-top: 20px; display: none;">
                CARGAR PACIENTE
            </div>
        </div>

    </div>
    
    
    
    
    
    
    <div class="sub_menu" id="sub_menu" style="display: none;">
        <div class="cubo_sub_menu" id="mn_datos_clinicos">
            <span>DATOS <br> CLINICOS</span>
        </div>
        <div class="cubo_sub_menu" id="mn_datos_evolucion">
            <span>DATOS <br> EVOLUCIÓN</span>
        </div>
        <div class="cubo_sub_menu" id="mn_datos_cierre">
            <span>DATOS <br> CIERRE</span>
        </div>
    </div>
    
    
    
    
    <div class="datos_body" id="datos_body">
        
    </div>
</div>
    
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery.Rut.min.js"></script>
<script>
    $(document).ready(function(e){    
        $("#btn_buscar").click(function(){
            var rut = $("#rut_busqueda").val();        
            $.ajax({
                url	:	"ajax/ajax_buscar_paciente.php",
                type	:	"GET",
                data	:	"rut="+rut,
                dataType:       "json",
                success	:	function(data){
                    console.log(data);
                    var error = data.ERROR;
                    if(error != 0){
                        $("#cont").hide();
                        $("#spn_blank_msg").show();
                        $("#btn_new_paciente").show();
                        carga_pac(data);                        
                    }else{
                        carga_pac(data);
                        $("#spn_blank_msg").hide();
                        $("#btn_new_paciente").hide();                        
                        $("#cont").show('fast');
                        
                    }
                }
            });
        });
        
        $("#btn_new_paciente").click(function(){
            $("#spn_blank_msg").hide();
            $("#btn_new_paciente").hide();
            $("#cont").show('fast');
        });
        
        $("#btn_cargar_new_paciente").click(function(){
            var cct_nro = prompt("Ingrese el Numero de la Cuenta Correinte");
            if (cct_nro != null)
            {
                $(".nro_cct").html("Nro CCT: "+cct_nro);
                $("#nro_cct").val(cct_nro);
                $(".cubo_sub_menu").removeClass("seleccionado");
                $("#mn_datos_clinicos").addClass("seleccionado");
                carga_datos_clinicos();
                $("#sub_menu").show();
                $("#datos_body").show();
            }            
        });
        
        $("#btn_guardar_new_paciente").click(function(){
            agregar_actualizar();
        });
        
        $("#mn_datos_clinicos").click(function(){
            $(".cubo_sub_menu").removeClass("seleccionado");
            $(this).addClass("seleccionado");
            carga_datos_clinicos();
        });
        
        $("#mn_datos_evolucion").click(function(){
            $(".cubo_sub_menu").removeClass("seleccionado");
            $(this).addClass("seleccionado");
            $("#datos_body").load("/forms/frm_datos_evolucion.php",function(responseTxt,statusTxt,xhr){
                if(statusTxt=="success")
                   
                if(statusTxt=="error")
                   alert("Error: "+xhr.status+": "+xhr.statusText);
             });
        });
        
        $("#mn_datos_cierre").click(function(){
            $(".cubo_sub_menu").removeClass("seleccionado");
            $(this).addClass("seleccionado");
            carga_datos_cierre();
        });
    })
    
    function carga_datos_clinicos(){
        var cct_nro = $("#nro_cct").val();
            var pac_id  = $("#pac_id").val();
        
            var url = "cct_nro="+cct_nro;
                url += "&pac_id="+pac_id;
        
            $.ajax({
                url         :	"ajax/ajax_crear_ficha.php",
                type        :	"GET",
                data        :	url,
                dataType    :   "json",
                success     :	function(data){
                    console.log(data);
                    if(data.ERROR_ID == 0){
                        $("#fic_id").val(data.FIC_ID);
                        $("#datos_body").load("/forms/frm_datos_clinicos.php",function(responseTxt,statusTxt,xhr){
                            if(statusTxt=="success")
                               $("#antecedentes").val(data.FIC_ANTECEDENTES);
                               $("#motivo_consulta").val(data.FIC_MOTIVO_CONSULTA);
                            if(statusTxt=="error")
                               alert("Error: "+xhr.status+": "+xhr.statusText);
                         });
                        
                    }else{
                        alert(data.ERROR);
                    }
                }
            });
    }
    
    function carga_datos_cierre(){
            var fic_id = $("#fic_id").val();
        
            var url = "fic_id="+fic_id;
        
            $.ajax({
                url         :	"ajax/ajax_crear_cierre.php",
                type        :	"GET",
                data        :	url,
                dataType    :   "json",
                success     :	function(data){
                    console.log(data);
                    if(data.ERROR_ID == 0){
                        $("#cie_id").val(data.CIE_ID);
                        $("#datos_body").load("/forms/frm_datos_cierre.php",function(responseTxt,statusTxt,xhr){
                            if(statusTxt=="success")
                               $("#evolucion_examenes").val(data.CIE_RESUMEN);
                            if(statusTxt=="error")
                               alert("Error: "+xhr.status+": "+xhr.statusText);
                         });
                        
                    }else{
                        alert(data.ERROR);
                    }
                }
            });
    }
    
    function carga_pac(data){
        
        var PAC_RUT = data.PAC_RUT;
        var PAC_APE_MAT = data.PAC_APE_MAT;
        var PAC_APE_PAT = data.PAC_APE_PAT;
        var PAC_DIRECCION = data.PAC_DIRECCION;
        var PAC_FECHA_NAC = data.PAC_FECHA_NAC;
        var PAC_ID = data.PAC_ID;
        var PAC_NOMBRES = data.PAC_NOMBRES;
        var PAC_SEX_ID = data.PAC_SEX_ID;
        var PAC_TELEFONO = data.PAC_TELEFONO;
        var rut_input = $("#rut_busqueda").val();
        if(PAC_RUT==""){PAC_RUT=rut_input+'-'+dv(rut_input);}
        if(PAC_ID != ''){$("#btn_guardar_new_paciente").hide();$("#btn_cargar_new_paciente").show();}else{$("#btn_guardar_new_paciente").show();$("#btn_cargar_new_paciente").hide();}
        
        $("#pac_id").val(PAC_ID);
        $("#rut").val(PAC_RUT);
        $("#nombres").val(PAC_NOMBRES);
        $("#ape_pat").val(PAC_APE_PAT);
        $("#ape_mat").val(PAC_APE_MAT);
        $("#f_nacimiento").val(PAC_FECHA_NAC);
        $("#direccion").val(PAC_DIRECCION);
        $("#telefono").val(PAC_TELEFONO); 
        $("#sexo").find("option[value="+PAC_SEX_ID+"]").attr("selected","selected");
    }
    
    function dv(rut){
        var dvr = '0';
        suma = 0;
        mul  = 2;
        for(i=rut.length -1;i >= 0;i--) 
        { 
            suma = suma + rut.charAt(i) * mul;    
            if (mul == 7)
            {
                mul = 2;
            }   
            else
            {         
                mul++;
            } 
        }
        res = suma % 11;  
        if (res==1)
        {
            return 'k';
        } 
        else if(res==0)
        {   
            return '0';
        } 
        else  
        {   
            return 11-res;
        }
    }
    
    function agregar_actualizar(){
        var pac_id          = $("#pac_id").val();
        var pac_rut         = $("#rut").val().split("-");
        var rut             = pac_rut[0];
        var dv              = pac_rut[1];
        var pac_nombre      = $("#nombres").val();
        var pac_ape_pat     = $("#ape_pat").val();
        var pac_ape_mat     = $("#ape_mat").val();
        var pac_f_nac       = $("#f_nacimiento").val();
        var pac_sex_id      = $("#sexo").val();
        var pac_direccion   = $("#direccion").val();
        var pac_telefono    = $("#telefono").val();
        
        
        var url = "pac_id="+pac_id;
            url += "&rut="+rut;
            url += "&dv="+dv;
            url += "&pac_nombre="+pac_nombre;
            url += "&pac_ape_pat="+pac_ape_pat;
            url += "&pac_ape_mat="+pac_ape_mat;
            url += "&pac_f_nac="+pac_f_nac;
            url += "&pac_sex_id="+pac_sex_id;
            url += "&pac_direccion="+pac_direccion;
            url += "&pac_telefono="+pac_telefono;
                
       
        $.ajax({
                url	:	"ajax/ajax_agregar_paciente.php",
                type	:	"GET",
                data	:	url,
                dataType:       "json",
                success	:	function(data){
                    console.log(data);
                    if(data.ERROR_ID == 0){
                        carga_pac(data);
                    }else{
                        alert(data.ERROR);
                    }
                }
            });
    }
</script>
