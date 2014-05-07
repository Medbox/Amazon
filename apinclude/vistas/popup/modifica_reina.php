<?php
$id = $_GET["id"];
?>
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
        content: attr(data-tooltip);
        margin-top: -24px;
        opacity: 0; 
        padding: 3px 7px;
        position: absolute;
        visibility: hidden;

        transition: all 0.4s ease-in-out;
    }

    .tooltip:hover::after {
        opacity: 1;
        visibility: visible;
    }
    .section{
        background-color: #ffffff;
    }

    .check label{
        margin-left: 0px;
    }
    .modifica_colmena label{
        line-height: 14px;
    }
    .modifica_colmena{
        width: 1200px;
        left: 13%;
        width: 1000px;
    }
    .new_input {
        width: 100%;
        max-width: 92%;
        font-size: 2em;
        color: #333;
        outline: none;
        padding-left: 5px;
        padding-right: 5px;
    }
    #obs{
        text-align: left;
    }
    section input.large, section textarea.large {
        width: 100%;
        max-width: 94%;
    }
</style>
<script>
    
    $(document).ready(function() {
        var id_reina = $("#reina_id").val();
        $.ajax({
            type: "GET",
            url: "../ajax/ajax_reina.php?case=lista_reina&id_reina="+id_reina,
            success: function(datos){
                var obj     =	$.parseJSON(datos);
                $("#nombre_reina").val(obj.NOMBRE);
                $("#f_ingreso").val(obj.FECHA);
                $("#obtencion").find("option[value='"+obj.OBTENCION+"']").attr("selected","selected");
                if(obj.OBTENCION == 2){
                    $("#n_orden_div").show();
                    $("#n_colmena_div").hide();
                    $("#n_orden").val(obj.CERTIFICADO);
                    $("#estado_reina").attr('checked', true);
                    $("#estado_reina").iphoneStyle({
                        checkedLabel: "Activo",
                        uncheckedLabel: "Desactivo ",
                        labelWidth:'65px'
                    });
                    $("#rei_fecundada").attr('checked', true);
                    $("#rei_fecundada").iphoneStyle({
                        checkedLabel: "SI",
                        uncheckedLabel: "NO ",
                        labelWidth:'40px'
                    });
                }else if(obj.OBTENCION == 3){
                    $("#n_orden_div").hide();
                    $("#n_colmena_div").show();
                    $("#n_colmena").val(obj.FAMILIA_NOM);
                    $("#n_colmena_id").val(obj.FAMILIA_ID);
                    apiario_id(obj.FAMILIA_ID);
                }else{
                    $("#n_orden_div").hide();
                    $("#n_colmena_div").hide();
                    $("#estado_reina").attr('checked', true);
                    $("#estado_reina").iphoneStyle({
                        checkedLabel: "Activo",
                        uncheckedLabel: "Desactivo ",
                        labelWidth:'65px'
                    });
                    $("#rei_fecundada").attr('checked', true);
                    $("#rei_fecundada").iphoneStyle({
                        checkedLabel: "SI",
                        uncheckedLabel: "NO ",
                        labelWidth:'40px'
                    });
                }
                
                $("#n_apiario").val(obj.APIARIO);
                
                
                if(obj.FECUNDADA == 0){
                    $("#fecundada").attr('checked', false);
                    $("#fecundada").iphoneStyle({
                        checkedLabel: "SI",
                        uncheckedLabel: "NO ",
                        labelWidth:'40px'
                    });
                }else{
                    $("#fecundada").attr('checked', true);
                    $("#fecundada").iphoneStyle({
                        checkedLabel: "SI",
                        uncheckedLabel: "NO ",
                        labelWidth:'40px'
                    });
                }
                
                if(obj.ESTADO == 0){
                    $("#online").attr('checked', false);
                    $("#online").iphoneStyle({
                        checkedLabel: "Activo",
                        uncheckedLabel: "Desactivo ",
                        labelWidth:'65px'
                    });
                }else{
                    $("#online").attr('checked', true);
                    $("#online").iphoneStyle({
                        checkedLabel: "Activo",
                        uncheckedLabel: "Desactivo ",
                        labelWidth:'65px'
                    });
                }            
            }
        });
       
        
             
    });
    function apiario_id(id_familia){
        $.ajax({
            type: "GET",
            url: "./ajax/ajax_familia.php?case=trae_apiario&id_familia="+id_familia,
            success: function(datos){
                var obj     =	$.parseJSON(datos);
                $("#n_apiario").val(obj.NOMBRE_API);
                $("#n_apiario_id").val(obj.ID_API); 
                $("#nombre_rei").val(obj.REI_NOMBRE); 
                $("#f_ingreso_rei").val(obj.REI_FECHA); 
                $("#obtencion_new").val(obj.REI_OBT_NOM);
                $("#orden").val(obj.REI_CERTIFICADO);
                $("#colmena").val(obj.REI_FAM_NOM); 
                $("#apiario").val(obj.REI_API_NOM); 
                if(obj.REI_FECUNDADA == 0){
                    $("#rei_fecundada").attr('checked', false);
                    $("#rei_fecundada").iphoneStyle({
                        checkedLabel: "SI",
                        uncheckedLabel: "NO ",
                        labelWidth:'40px'
                    });
                }else{
                    $("#rei_fecundada").attr('checked', true);
                    $("#rei_fecundada").iphoneStyle({
                        checkedLabel: "SI",
                        uncheckedLabel: "NO ",
                        labelWidth:'40px'
                    });
                }
                
                if(obj.REI_ESTADO == 0){
                    $("#estado_reina").attr('checked', false);
                    $("#estado_reina").iphoneStyle({
                        checkedLabel: "Activo",
                        uncheckedLabel: "Desactivo ",
                        labelWidth:'65px'
                    });
                }else{
                    $("#estado_reina").attr('checked', true);
                    $("#estado_reina").iphoneStyle({
                        checkedLabel: "Activo",
                        uncheckedLabel: "Desactivo ",
                        labelWidth:'65px'
                    });
                }  
            }
        });
    }
</script>
<input type="hidden" id="reina_id" value='<?php echo $id; ?>' />
<div class="modifica_colmena">
    <div id="content" style="width: 1000px; text-align: left;">
        <section class="sec_atenciones_hoy">
            <div class="section_header"><span>Modificar Reina</span></div>   
            <div class="section_body">
                <section id="add_user">
                    <div class="section ">
                        <label> Nombre<small>Nombre de la Reina</small></label>   
                        <div> 
                            <input type="text" name="nombre_reina" id="nombre_reina" class="medium" required="required" autofocus="autofocus">
                        </div>
                    </div>
                    <div class="section ">
                        <label>Fecha<small>Fecha Ingreso</small></label>   
                        <div> 
                            <input type="text" class="medium" name="f_ingreso" id="f_ingreso">
                        </div>
                    </div>
                    <div class="section ">
                        <label> Obtencion<small>Como se Obtuvo la Reina</small></label>   
                        <div> 
                            <select id="obtencion" class="style-select">
                                <option value="1">ENJAMBRE</option>
                                <option value="2">COMPRADA</option>
                                <option value="3">DE OTRA COLMENA</option>
                            </select>   
                        </div>
                    </div>
                    <div class="section " id="n_orden_div" style="display: none;">
                        <label> Numero de Orden<small>Numero de la Orden de Compra o Factura</small></label>   
                        <div> 
                            <input type="text" class="medium" name="n_orden" id="n_orden">
                        </div>
                    </div>
                    <div class="section " id="n_colmena_div" style="display: none;">
                        <label> Colmena<small>Nombre de la Colmena Origen</small></label>   
                        <div> 
                            <input type="text" class="medium" name="n_colmena" id="n_colmena">
                            <span data-tooltip='Presionar para Borrar o Agregar' class="tooltip" id="limpiar" style="display: none;"><img src="./images/add.png" width="15px" height="15px"/></span>
                            <input type="hidden" id="n_colmena_id">
                        </div>
                    </div>
                    <div class="section " id="n_colmena_div">
                        <label> Apiario<small>Nombre del Apiario</small></label>   
                        <div> 
                            <input type="text" class="medium" name="n_apiario" id="n_apiario">
                            <input type="hidden" id="n_apiario_id">
                        </div>
                    </div>
                    <div class="section">
                        <label> Fecundada<small>Estado de la Fecundacion</small></label>   
                        <div class="check"> 
                            <input type="checkbox" id="fecundada" name="online" checked="true"/>
                        </div>
                    </div>  
                    <div class="section">
                        <label> Estado<small>Estado de la Reina</small></label>   
                        <div class="check"> 
                            <input type="checkbox" id="online" name="online"   class="online"  value="1" checked="true"/>
                        </div>
                    </div>  
                    <div class="section last">
                        <div style="margin-left: 5px">
                            <a class="bt download2 accent" id="btn_agregar_apiario" href="#">Modificar Reina</a>
                        </div>
                    </div>
                </section>

            </div>
        </section>

        <section class="sec_atenciones_ultimas" id="lista_apiarios" style="min-height: 200px; margin-bottom: 0px;">
            <div class="section_header"><span>Reina Madre</span></div>
            <div class="section_body" >
                <div class="section ">
                    <label style="margin-left: 5px"> Nombre<small>Descripcion</small></label>   
                    <div> 
                        <input type="text" class="large" name="nombre_rei" id="nombre_rei" disabled="disabled"/>
                    </div>
                </div>
                <div class="section ">
                    <label style="margin-left: 5px"> Fecha Ingreso<small>Fecha Ingreso</small></label>   
                    <div> 
                        <input type="text" class="large" name="f_ingreso_rei" id="f_ingreso_rei" disabled="disabled"/>
                    </div>
                </div>
                <div class="section ">
                    <label style="margin-left: 5px"> Obtencion<small>Como se Obtuvo</small></label>   
                    <div> 
                        <input type="text" class="large" name="f_api_rei" id="obtencion_new" disabled="disabled"/>
                    </div>
                </div>
                <div class="section ">
                    <label style="margin-left: 5px"> Orden<small>Orden de Compra o Factura</small></label>   
                    <div> 
                        <input type="text" class="large" name="f_api_rei" id="orden" disabled="disabled"/>
                    </div>
                </div>
                <div class="section ">
                    <label style="margin-left: 5px"> Colmena<small>Colmena de la que Viene</small></label>   
                    <div> 
                        <input type="text" class="large" name="f_col_rei" id="colmena" disabled="disabled"/>
                    </div>
                </div>
                <div class="section ">
                    <label style="margin-left: 5px"> Apiario<small>Apiario de donde Viene</small></label>   
                    <div> 
                        <input type="text" class="large" name="f_api_rei" id="apiario" disabled="disabled"/>
                    </div>
                </div>
                <div class="section ">
                    <label style="margin-left: 5px"> Fecundada<small>Rina Fecundada</small></label>   
                    <div class="check"> 
                        <input type="checkbox" id="rei_fecundada" name="online"   class="rei_fecundada"  value="1"   checked="true" disabled="disabled"/>
                    </div>
                </div>
                <div class="section">
                    <label style="margin-left: 5px;"> Estado<small>Estado de la Reina</small></label>   
                    <div class="check"> 
                        <input type="checkbox" id="estado_reina" name="online"   class="online"  value="1"   checked="true" disabled="disabled"/>
                    </div>
                </div> 
            </div>
        </section>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#f_ingreso").datepicker();
        $("a").click(function(){
            return false;
        });               
    });
    function modificar_datos(){
        var nombre      = $("#nombre_reina").val();
        var fecha       = $("#f_ingreso").val();
        var obtencion   = $("#obtencion").val();
        var apiario     = $("#n_apiario").val();
        var fecundada   = $("#fecundada").val();
        var estado      = $("#online").val();
        var familia     = $("#n_colmena_id").val();
    }
    
</script>