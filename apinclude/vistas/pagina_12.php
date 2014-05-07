
<section class="sec_atenciones_hoy">
    <div class="section_header"><span>Agregar Reina</span></div>   
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
                    <input type="hidden" id="colmena_id">
                </div>
            </div>
            <div class="section">
                <label> Fecundada<small>Estado de la Fecundacion</small></label>   
                <div> 
                    <input type="checkbox" id="fecundada" name="online" value="1"   checked="checked" />
                </div>
            </div>  
            <div class="section">
                <label> Estado<small>Estado de la Reina</small></label>   
                <div> 
                    <input type="checkbox" id="online" name="online"   class="online"  value="1"   checked="checked" />
                </div>
            </div>  
            <div class="section last">
                <div style="margin-left: 5px">
                    <a class="bt download2 accent" id="btn_agregar_reina" href="#">Agregar Reina</a>
                </div>
            </div>
        </section>

    </div>
</section>
<section class="sec_atenciones_ultimas" id="lista_apiarios" style="min-height: 200px; margin-bottom: 0px; display: none;">
    <div class="section_header"><span>Apiario</span></div>
    <div class="section_body" style="overflow: auto; height: 200px;" id="lista_apiarios_div">
        
    </div>
</section>
<section class="sec_atenciones_ultimas" style="min-height: 200px; margin-top: 5px; display: none;" id="lista_colmenas">
    <div class="section_header"><span>Colmenas</span></div>
    <div class="section_body" id="familias_apiario" style="overflow: auto; height: 200px;">
        
    </div>
</section>


<script>
    $(document).ready(function(){
        carga_api();
        $("a").live('click',function(){
            return false;
        });
        $("#lista_apiarios_div > a").live('click',function(){
            var id = this.id
            carga_fam_api(id);
        });
        $("#familias_apiario > a").live('click',function(){
            var id = this.id;
            var nombre = this.rel;
            $("#n_colmena").val(nombre);
            $("#colmena_id").val(id);
        });
        $("#f_ingreso").datepicker();
        $(".online").iphoneStyle({  //  Custom Label 
            checkedLabel: "Activo",
            uncheckedLabel: "Desactivo ",
            labelWidth:'65px',
            onChange: function(){
                if($(".online").val() == 1){
                    $(".online").val("0"); 
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
        $("#obtencion").change(function(){
            var id           =   $("#obtencion").val();
            var n_orden      =   $("#n_orden_div");
            var n_colmena    =   $("#n_colmena_div");
            var l_colmenas   =   $("#lista_colmenas");
            var l_apiarios   =   $("#lista_apiarios");
            if(id == 2){
                n_orden.show();
            }else{
                n_orden.hide();
                l_colmenas.hide();
                l_apiarios.hide();
            }
            if(id == 3){
                n_colmena.show();
                l_colmenas.show();
                l_apiarios.show();
            }else{
                n_colmena.hide();
                l_colmenas.hide();
                l_apiarios.hide();
            }
        });
        
        $("#btn_agregar_reina").click(function(){
            var nombre      =   $("#nombre_reina").val();
            var fecha       =   $("#f_ingreso").val();
            var obtencion   =   $("#obtencion").val();
            var orden       =   $("#n_orden").val();
            var colmena     =   $("#colmena_id").val();
            var fecundada   =   $("#fecundada").val();
            var estado      =   $("#online").val();
            var url         = "./ajax/ajax_reina.php?case=agregar_reina";
                url         += "&nombre="+nombre;
                url         += "&fecha="+fecha;
                url         += "&obtencion="+obtencion;
                url         += "&orden="+orden;
                url         += "&colmena="+colmena;
                url         += "&fecundada="+fecundada;
                url         += "&estado="+estado;
            $.ajax({
                type: "GET",
                url: url,
                success: function(datos){
                   var dato = datos.split(',');
                   if(dato[1] == 0){
                        //carga_reina();
                        limpiar();
                    }else{
                        alert(dato[2]);
                    }
                }
            });
        })
    })
    function carga_api(){
        $.ajax({
            type: "GET",
            url: "./ajax/ajax_apiario.php?case=lista_apiarios",
            success: function(datos){
                $("#lista_apiarios_div").html(datos);
            }
        });  
    }
    function carga_fam_api(id_apiario){
        $.ajax({
            type: "GET",
            url: "./ajax/ajax_familia.php?case=select_familias_apiario&id_apiario="+id_apiario,
            success: function(datos){
                $("#familias_apiario").html(datos);
            }
        });  
    }
    function limpiar(){
        $("#nombre_reina").val('');
        $("#f_ingreso").val('');
        $("#obtencion").val('');
        $("#n_orden").val('');
        $("#n_colmena").val('');
        var n_colmena    =   $("#n_colmena_div");
        var l_colmenas   =   $("#lista_colmenas");
        var l_apiarios   =   $("#lista_apiarios");
        n_colmena.hide();
        l_colmenas.hide();
        l_apiarios.hide();
    }
</script>