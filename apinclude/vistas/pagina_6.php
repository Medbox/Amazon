<script>
    function carga_grafico(url_des,id_tabla,div_contenedor){
        $.ajax({
            type: "GET",
            url: url_des,
            success: function(datos){
                $('#'+div_contenedor).html(datos);
                $("#"+id_tabla).each(function() {
                    var colors = [];
                    $("#"+id_tabla+" thead th:not(:first)").each(function() {
                        colors.push($(this).css("color"));
                    });
                    $("#"+id_tabla).graphTable({
                        series: 'columns',
                        position: 'replace',
                        width : '100%',
                        height: '220px',
                        colors: colors
                    }, {
                        series: {
                            pie: { 
                                show: true,
                                innerRadius: 0.5,
                                radius: 1,
                                tilt: 1,
                                label: {
                                    show: true,
                                    radius: 1,
                                    formatter: function(label, series){
                                        return '<div id="tooltipPie"><b>'+label+'</b> : '+Math.round(series.percent)+'%</div>';
                                    },
                                    background: {
                                        opacity: 0
                                    }
                                }
                            }
                        },
                        legend: {
                            show: false
                        },
                        grid: {
                            hoverable: false,
                            autoHighlight: true
                        }
                    });
                });
            }
        });
    }
    $(document).ready(function() {
        carga_grafico("./ajax/ajax_cosecha.php?case=lista_apiario_kilos",'tabla_api_kilos','cosecha_anos');
        carga_grafico("./ajax/ajax_cosecha.php?case=lista_kilos_anos",'tabla','tabla_anos');
    });		


</script>
<style>
    .sec_atenciones_ultimas{
        min-height: 280px;
        font-size: 11px;
    }
</style>
<section class="sec_atenciones_hoy">
    <div class="section_header"><span>Agregar Cosecha</span></div>   
    <div class="section_body">
        <section id="add_user">
            <div class="section ">
                <label> Fecha<small>Fecha de la cosecha</small></label>   
                <div> 
                    <input type="text" class="large" name="f_required" id="fecha" style="width: 125px;">
                </div>
            </div>
            <div class="section ">
                <label> Kilos<small>Kilos totales obtenidos</small></label>   
                <div> 
                    <input type="text" class="large" name="f_required" id="kilos" style="width: 75px;">
                </div>
            </div>
            <div class="section ">
                <label> Floracion<small>Tipo de Floracion</small></label>   
                <div> 
                    <select id="t_floracion" class="style-select">
                        <option value="1">MONO-FLORAL</option>
                        <option value="2">MULTI-FLORAL</option>
                    </select>  
                </div>
            </div>
            <div class="section " id="flor_demonimacion">
                <label> Flor<small>Flor de la Cosecha</small></label>   
                <div> 
                    <input type="text" class="large" name="flor" id="flor">
                </div>
            </div>
            <div class="section " id="certificado">
                <label>Numero Certificado<small>Numero certificado de la miel</small></label>   
                <div> 
                    <input type="text" class="large" name="f_required" id="n_certificado" onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>
            </div>
            <div class="section">
                <label>Apiario<small>Apiario que se cosecha</small></label>   
                <div>
                    <select id="apiario" class="style-select">
                    </select>   
                </div>
            </div>
            <div class="section ">
                <label>Estado Cosecha<small>Si esta finalizada o en proceso de acreditacion</small></label>   
                <div> 
                    <input type="checkbox" id="online" name="online"   class="online"  value="1"   checked="checked" />
                </div>
            </div>
            <div class="section last">
                <div style="margin-left: 5px">
                    <a class="bt download2 accent" id="agregar_cosecha" href="#">Agregar Cosecha</a>
                </div>
            </div>
        </section>

    </div>
</section>


<section class="sec_atenciones_ultimas">
    <div class="section_header"><span>Grafica Cosechas por Año</span></div>   
    <div class="section_body">
        <div class="oneTwo" id="tabla_anos">
            
            <div class="chart-pie-shadow"></div>
        </div>
    </div>
</section>
<section class="sec_atenciones_ultimas">
    <div class="section_header"><span>Grafica Cosechas Año <?php echo date('Y'); ?></span></div>   
    <div class="section_body">
        <div class="oneTwo" id="cosecha_anos">
            
            
        </div>
    </div>
</section>
<section class="sec_atenciones_hoy">
    <div class="section_header"><span>Lista Cosecha <?php echo date('Y'); ?></span></div>   
    <div class="section_body">
        <section id="add_user" class="tabla_cosecha">
            <table id="tabla_cosecha">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Apiario</th>
                        <th>Kilos Cosecha</th>
                        <th>N Certificado</th>
                        <th>Floracion</th>
                        <th>Estado Cosecha</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </section>

    </div>
</section>
<script>
    $(document).ready(function() {
        carga_cos();
        $("a").live('click',function(){
            return false;
        });
        $("#fecha").datepicker();
        $(".online").iphoneStyle({ 
            checkedLabel: "Finalizada",
            uncheckedLabel: "Proceso ",
            labelWidth:'72px',
            onChange: function(){
                if($(".online").val() == 1){
                    $(".online").val("2"); 
                }else{
                    $(".online").val("1"); 
                }
            }
        }); 
        $("#t_floracion").change(function(){
            var t_floracion = $("#t_floracion").val();
            if(t_floracion == 1){
                $("#flor_demonimacion").show('fast');
                $("#certificado").show('fast');
            }else{
                $("#flor_demonimacion").hide('fast');
                $("#certificado").hide('fast');
                $("#flor").val('');
                $("#n_certificado").val('');
            }
        })
        $.ajax({
            type: "GET",
            url: "./ajax/ajax_apiario.php?case=select_apiario",
            success: function(datos){
                $("#apiario").html(datos);
            }
        });
        
        $("#agregar_cosecha").click(function(){
            var fecha           =   $("#fecha").val();
            var kilos           =   $("#kilos").val();
            var n_certificado   =   $("#n_certificado").val();
            var apiario         =   $("#apiario").val();
            var estado          =   $("#online").val();
            var t_floracion     =   $("#t_floracion").val();
            var floracion       =   $("#flor").val();
            if(fecha != '' && kilos != '' && apiario != '' && estado != ''){
                if(t_floracion == 1){
                    if(floracion == '' || n_certificado == ''){
                    alert("DEBE COMPLETAR FLOR DE LA COSECHA");
                }else{
                   var  url         = "./ajax/ajax_cosecha.php?case=agregar_cosecha";
                        url             += "&fecha="+fecha;
                        url             += "&kilos="+kilos;
                        url             += "&n_certificado="+n_certificado;
                        url             += "&apiario="+apiario;
                        url             += "&estado="+estado;
                        url             += "&t_floracion="+t_floracion;
                        url             += "&floracion="+floracion;
                        
                    $.ajax({
                        type: "GET",
                        url: url,
                        success: function(datos){
                            var dato = datos.split(',');
                            if(dato[1] == 0){
                                carga_cos();
                                carga_grafico("./ajax/ajax_cosecha.php?case=lista_apiario_kilos",'tabla_api_kilos','cosecha_anos');
                                carga_grafico("./ajax/ajax_cosecha.php?case=lista_kilos_anos",'tabla','tabla_anos');
                                limpiar();
                            }else{
                                alert(dato[2]);
                            }
                            
                        }
                    }); 
                }
                }else{
                   var  url         = "./ajax/ajax_cosecha.php?case=agregar_cosecha";
                        url             += "&fecha="+fecha;
                        url             += "&kilos="+kilos;
                        url             += "&n_certificado="+n_certificado;
                        url             += "&apiario="+apiario;
                        url             += "&estado="+estado;
                        url             += "&t_floracion="+t_floracion;
                        url             += "&floracion="+floracion;
                        
                    $.ajax({
                        type: "GET",
                        url: url,
                        success: function(datos){
                            var dato = datos.split(',');
                            if(dato[1] == 0){
                                carga_cos();
                                carga_grafico("./ajax/ajax_cosecha.php?case=lista_apiario_kilos",'tabla_api_kilos','cosecha_anos');
                                carga_grafico("./ajax/ajax_cosecha.php?case=lista_kilos_anos",'tabla','tabla_anos');
                                limpiar();
                            }else{
                                alert(dato[2]);
                            }
                            
                        }
                    }); 
                }
                
            }else{
                alert("DEBE COMPLETAR TODOS LOS CAMPOS");
            }
        })
                
    });
    function limpiar(){
        $("#fecha").val('');
        $("#kilos").val('');
        $("#n_certificado").val('');
        $("#flor").val('');
    }
    function carga_cos(){
        $.ajax({
            type: "GET",
            url: "./ajax/ajax_cosecha.php?case=listar_cosechas",
            success: function(datos){
                $("#tabla_cosecha tbody").html(datos);
            }
        });
    }
    
</script>