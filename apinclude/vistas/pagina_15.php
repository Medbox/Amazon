<style>
    .tooltip {
        border-bottom: 1px dotted #0077AA;
        cursor: help;
    }

    .tooltip::after {
        background: rgba(0, 0, 0, 0.8);
        border-radius: 8px 8px 8px 0px;
        box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);
        color: #FFF;
        content: attr(data-tooltip); /* The main part of the code, determining the content of the pop-up prompt */
        margin-top: -24px;
        opacity: 0; /* Our element is transparent... */
        padding: 3px 7px;
        position: absolute;
        visibility: hidden; /* ...and hidden. */

        transition: all 0.4s ease-in-out; /* To add some smoothness */
    }

    .tooltip:hover::after {
        opacity: 1; /* Make it visible */
        visibility: visible;
    }
</style>
<section class="sec_atenciones_hoy">
    <div class="section_header"><span>Agregar Colmena</span></div>   
    <div class="section_body">
        <section id="add_user">
            <div class="section ">
                <label> Nombre<small>Nombre de la Colmena</small></label>   
                <div> 
                    <input type="text" name="nombre_colmena" id="nombre_colmena" class="large" required="required" autofocus="autofocus">
                </div>
            </div>
            <div class="section ">
                <label> Tipo Colmena<small>Tipo de Colmena</small></label>   
                <div> 
                    <select id="tipo_colmena" class="style-select">
                    </select>   
                </div>
            </div>
            <div class="section ">
                <label> Origen<small>Origen de la Colmena</small></label>   
                <div> 
                    <select id="origen_colmena" class="style-select">
                    </select> 
                </div>
            </div>
            <div class="section " style="display: none;" id="n_colmena_div">
                <label> Numero Colmena<small>Numero de la Colmena</small></label>   
                <div> 
                    <input type="text" class="large" name="n_colmena" id="n_colmena" onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>
            </div>
            <div class="section ">
                <label> Apiario<small>Apiario de Origen</small></label>   
                <div> 
                    <input type="text" class="large" name="apiario" id="apiario" onkeyup="javascript:this.value=this.value.toUpperCase();">
                    <span data-tooltip='Presionar para Borrar o Agregar' class="tooltip" id="limpiar" style="display: none;"><img src="./images/limpiar.png" width="15px" height="15px"/></span>
                    <input type="hidden" id="apiario_id">
                </div>
            </div>
            <div class="section ">
                <label>Reina<small>Reina Asignda</small></label>   
                <div> 
                    <input type="text" class="medium" name="reina" id="reina" disabled="disabled">
                    <span data-tooltip='Presionar para Listar o Agregar Reina' class="tooltip" id="agregar_reina"><img src="./images/add.png" width="15px" height="15px"/></span>
                    <input type="hidden" id="reina_id">
                </div>
            </div>
            <div class="section ">
                <label> Alza<small>Numero de Alzas</small></label>   
                <div> 
                    <input type="text" class="medium" name="alza" id="alza" style="width: 15%;">
                </div>
            </div>
            <div class="section">
                <label> Estado<small>Estado de la Colmena</small></label>   
                <div> 
                    <input type="checkbox" id="online" name="online"   class="online"  value="1"   checked="checked" />
                </div>
            </div>  
            <div class="section last">
                <div style="margin-left: 5px">
                    <a class="bt download2 accent" id="btn_agregar_colmena" href="#">Agregar Colmena</a>
                </div>
            </div>
        </section>

    </div>
</section>
<section class="sec_atenciones_ultimas" id="cont" style="min-height: 440px; display: block;">
    <div id="colmenas" style="display: block;">
        <div class="section_header"><span>Colmenas</span></div>   
        <div class="section_body" id="familias">
            
        </div>
    </div>
    <div id="apiarios" style="display: none;">
        <div class="section_header"><span>Apiarios</span></div>
        <div class="section_body" id="lista_apiarios">
            
        </div>
    </div>
</section>
<section class="sec_atenciones_ultimas" style="min-height: 200px; display: none;" id="lista_reina">
    <div class="section_header"><span>Reinas</span></div>
    <div class="section_body" style="overflow: auto; height: 200px;" id="lista_reinas">
        
    </div>
</section>
<section class="sec_atenciones_ultimas" id="add_reina" style="min-height: 200px; display: none;">
    <div class="section_header"><span>Agregar Reina</span></div>
    <div class="section_body" >
        <div class="section ">
            <label style="margin-left: 5px"> Nombre<small>Descripcion</small></label>   
            <div> 
                <input type="text" class="large" name="nombre_rei" id="nombre_rei"/>
            </div>
        </div>
        <div class="section ">
            <label style="margin-left: 5px"> Fecha Ingreso<small>Fecha Ingreso</small></label>   
            <div> 
                <input type="text" class="large" name="f_ingreso_rei" id="f_ingreso_rei"/>
            </div>
        </div>
        <div class="section ">
            <label style="margin-left: 5px"> Fecundada<small>Rina Fecundada</small></label>   
            <div> 
                <input type="checkbox" id="fecundada" name="online"   class="fecundada"  value="1"   checked="checked" />
            </div>
        </div>
        <div class="section last">
            <div style="margin-left: 5px">
                <a class="bt download2 accent" id="btn_agregar_reina" href="#" style="height: 30px;line-height: 30px;">Agregar Reina</a>
            </div>
        </div>
    </div>
</section>
<script src="../socket.io/lib/socket.io.js"></script>
<script>
    console.log('Inicio conet!');
    var websocket = new io.connect('artesaniasheider.com:8080');
    console.log('Paso conet!');
    $(document).ready(function() {
        
        carga_tipo_familia();
        carga_origen_familia();
        carga_apiario();
        carga_reina();
        websocket.on('usr_conectado', carga_familias);
        //carga_familias();
        $("#f_ingreso_rei").datepicker();
        $("a").live('click',function(){
            return false;
        });
        $(".online").iphoneStyle({  //  Custom Label 
            checkedLabel: "Activo",
            uncheckedLabel: "Desactivo ",
            labelWidth:'65px',
            onChange: function(){
                if($(".online").val() == 1){
                    $(".online").val("2"); 
                }else{
                    $(".online").val("1"); 
                }
            }
        });
        $("#fecundada").iphoneStyle({  //  Custom Label 
            checkedLabel: "Si",
            uncheckedLabel: "No",
            labelWidth:'40px',
            onChange: function(){
                if($("#fecundada").val() == 1){
                    $("#fecundada").val("0"); 
                }else{
                    $("#fecundada").val("1"); 
                }
            }
        });
        
        $("#colmenas a").live('click',function(){
            var id = this.id;
            $("#n_colmena").val(id);
        });
        
        $("#lista_apiarios a").live('click',function(){
            var id = this.id;
            var nombre = this.rel;
            $("#apiario").val(nombre);
            $("#apiario_id").val(id);
        });
        
        $("#lista_reinas a").live('click',function(){
            var id = this.id;
            $("#reina").val(id);
        });
        
        $("#origen_colmena").change(function(){
            if($("#origen_colmena").val() == 4){
                $("#cont").show();
                $("#colmenas").show('fast');
                $("#n_colmena_div").show();
                $("#apiarios").hide('fast');
                $("#lista_reina").hide();
                $("#add_reina").hide();
            }else{
                $("#cont").show();
                $("#colmenas").hide('fast');
                $("#n_colmena_div").hide('fast');
                $("#n_colmena").val('');
                $("#apiarios").hide('fast');
                $("#lista_reina").hide();
                $("#add_reina").hide();
            }
        });
        $("#apiario").focus(function(){
            $("#cont").show();
            $("#apiario").attr('disabled', 'disabled');
            $("#colmenas").hide('fast');
            $("#apiarios").show('fast');
            $("#limpiar").show();
            $("#lista_reina").hide();
            $("#add_reina").hide();
        });
        
        $("#agregar_reina").click(function(){
            $("#cont").hide();
            $("#lista_reina").show();
            $("#add_reina").show();
        });
        
        
        $("#limpiar").click(function(){
            $("#cont").show();
            $("#apiario").val('');
            $("#apiario_id").val('');
            $("#apiarios").show('fast');
            $("#colmenas").hide('fast');
            $("#lista_reina").hide();
            $("#add_reina").hide();
        });
        
        $("#btn_agregar_reina").click(function(){
            var nombre  = $("#nombre_rei").val();
            var fecha   = $("#f_ingreso_rei").val();
            var fecundada  = $("#fecundada").val();
            var url         = "./ajax/ajax_reina.php?case=agregar_reina";
                url         += "&nombre="+nombre;
                url         += "&fecha="+fecha;
                url         += "&obtencion=1";
                url         += "&orden=";
                url         += "&colmena=";
                url         += "&fecundada="+fecundada;
                url         += "&estado=1";
            $.ajax({
                type: "GET",
                url: url,
                success: function(datos){
                   var dato = datos.split(',');
                   if(dato[1] == 0){
                        
                        carga_reina();
                        $("#reina").val(dato[0]);
                        limpiar_reina();
                    }else{
                        alert(dato[2]);
                    }
                }
            });
            
        }); 
        
       $("#btn_agregar_colmena").click(function(){
            var nombre          = $("#nombre_colmena").val();
            var tipo_colmena    = $("#tipo_colmena").val();
            var origen          = $("#origen_colmena").val();
            var n_colmena       = $("#n_colmena").val();
            var apiario         = $("#apiario_id").val();
            var reina           = $("#reina").val();
            var alza            = $("#alza").val();
            var estado          = $("#online").val();
            var url         = "./ajax/ajax_familia.php?case=agregar_familia";
                url         += "&nombre="+nombre;
                url         += "&tipo_fam="+tipo_colmena;
                url         += "&origen_fam="+origen;
                url         += "&familia_id="+n_colmena;
                url         += "&apiario_id="+apiario;
                url         += "&reina_id="+reina;
                url         += "&alza="+alza;
                url         += "&estado="+estado;
            $.ajax({
                type: "GET",
                url: url,
                success: function(datos){
                   var dato = datos.split(',');
                   if(dato[1] == 0){
                        websocket.emit('usr_conectado', 'carga_familias');
                        limpiar();
                    }else{
                        alert(dato[2]);
                    }
                }
            });
       })     
    });
    function limpiar_reina(){
        $("#nombre_rei").val("");
        $("#f_ingreso_rei").val("");
    }
    function carga_apiario(){
        $.ajax({
            type: "GET",
            url: "./ajax/ajax_apiario.php?case=lista_apiarios",
            success: function(datos){
                $("#lista_apiarios").html(datos);
            }
        }); 
    }
    function carga_reina(){
        $.ajax({
            type: "GET",
            url: "./ajax/ajax_reina.php?case=lista_reina_vista",
            success: function(datos){
                $("#lista_reinas").html(datos);
            }
        });
    }
    function carga_tipo_familia(){
        $.ajax({
            type: "GET",
            url: "./ajax/ajax_familia.php?case=select_tipo_familia",
            success: function(datos){
                
                $("#tipo_colmena").html(datos);
            }
        }); 
    }
    function carga_origen_familia(){
        $.ajax({
            type: "GET",
            url: "./ajax/ajax_familia.php?case=select_origen_familia",
            success: function(datos){
                $("#origen_colmena").html(datos);
            }
        }); 
    }
    function carga_familias(){
        $.ajax({
            type: "GET",
            url: "./ajax/ajax_familia.php?case=select_familias",
            success: function(datos){
                alert("hola");
                $("#familias").html(datos);
            }
        }); 
    }
    function limpiar(){
        $("#nombre_colmena").val('');
        $("#tipo_colmena").val('');
        $("#origen_colmena").val('');
        $("#n_colmena").val('');
        $("#apiario_id").val('');
        $("#apiario").val('');
        $("#reina").val('');
        $("#alza").val('');
        $("#lista_reina").hide();
        $("#add_reina").hide();
        $("#apiarios").hide();
        //carga_familias();
        $("#cont").show();
        $("#colmenas").show();
        
    }
</script>