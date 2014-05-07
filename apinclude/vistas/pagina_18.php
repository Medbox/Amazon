
<section class="sec_atenciones_hoy">
    <div class="section_header"><span>Agregar Apiario</span></div>   
    <div class="section_body">
        <section id="add_user">
            <div class="section ">
                <label> Nombre<small>Nombre del Apiario</small></label>   
                <div> 
                    <input type="text" name="nombre_apiario" id="nombre_apiario" class="large" required="required" autofocus="autofocus" onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>
            </div>
            <div class="section ">
                <label> Direccion<small>Direccion del Apiario</small></label>   
                <div> 
                    <input type="text" class="large" name="direccion_apiario" id="direccion_apiario" onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>
            </div>
            <div class="section">
                <label> Geolocalización<small>Indicar si es en Grados o en Latitud</small></label>   
                <div> 
                    <input type="checkbox" id="estado_geolocalizacion" name="online"   class="online"  value="1"   checked="checked" />
                </div>
            </div>
            <div id="latitud">
                <div class="section ">
                    <label> Latitud<small>Latitud de la geolocalizacion</small></label>   
                    <div> 
                        <input type="text" class="large" name="longitud_1" id="longitud_1">
                    </div>
                </div>
                <div class="section ">
                    <label> Longitud<small>Longitud de la geolocalizacion</small></label>   
                    <div> 
                        <input type="text" class="large" name="longitud_2" id="longitud_2">
                    </div>
                </div>
            </div>
            <div style="display: none;" id="grados">
                <div class="section">
                    <label> Grados<small>Indicar Grados</small></label>   
                    <div> 
                        <span>Sur</span>
                        <input type="text" class="large" name="grados_1" id="grados_1" style="width: 90px;">
                        <span>Oeste</span>
                        <input type="text" class="large" name="grados_2" id="grados_2" style="width: 90px;">
                    </div>
                </div>
                <div class="section ">
                    <label> Minutos<small>Indicar Minutos</small></label>   
                    <div> 
                        <span>Sur</span>
                        <input type="text" class="large" name="minutos_1" id="minutos_1" style="width: 90px;">
                        <span>Oeste</span>
                        <input type="text" class="large" name="minutos_2" id="minutos_2" style="width: 90px;">
                    </div>
                </div>
                <div class="section ">
                    <label> Segundos<small>Indicar Segundos</small></label>   
                    <div> 
                        <span>Sur</span>
                        <input type="text" class="large" name="segundos_1" id="segundos_1" style="width: 90px;">
                        <span>Oeste</span>
                        <input type="text" class="large" name="segundos_2" id="segundos_2" style="width: 90px;">
                    </div>
                </div>
            </div>
            <div class="section">
                <label> Estado<small>Si estara activa</small></label>   
                <div> 
                    <input type="checkbox" id="estado_apiario" name="online"   class="online"  value="1"   checked="checked" />
                </div>
            </div>  
            <div class="section last">
                <div style="margin-left: 5px">
                    <a class="bt download2 accent" id="agregar_apiario" href="#">Agregar Apiario</a>
                </div>
            </div>
        </section>

    </div>
</section>
<section class="sec_atenciones_ultimas" style="min-height: 440px;">
    <div class="section_header"><span>Apiarios</span></div>   
    <div class="section_body" id="lista_apiarios">
        
    </div>
</section>

<script>
    $(document).ready(function() {
        carga_api();
        $("a").live('click',function(){
            return false;
        });
        $("#estado_geolocalizacion").iphoneStyle({  //  Custom Label 
            checkedLabel: "Latitud",
            uncheckedLabel: "Grados ",
            labelWidth:'65px',
            onChange: function(){
                if($("#estado_geolocalizacion").val() == 1){
                    $("#estado_geolocalizacion").val("0");
                    $("#latitud").hide();
                    $("#grados").show();
                }else{
                    $("#estado_geolocalizacion").val("1");
                    $("#latitud").show();
                    $("#grados").hide();
                }
            }
        }); 
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
        $("#agregar_apiario").click(function(){
            var nombre      = $("#nombre_apiario").val();
            var direccion   = $("#direccion_apiario").val();
            var estado      = $("#estado_apiario").val();
            var t_medida    = $("#estado_geolocalizacion").val();
            
            if(t_medida == 0){
                var grado       = $("#grados_1").val();
                var minutos     = $("#minutos_1").val();
                var segundos    = $("#segundos_1").val();
                var grado2      = $("#grados_2").val();
                var minutos2    = $("#minutos_2").val();
                var segundos2   = $("#segundos_2").val();
                if(grado != '' && grado2 != '' && minutos != '' && minutos2 != '' && segundos != '' && segundos2 != ''){
                    var latitud     = (((parseInt(grado)+(parseInt(minutos)/60))+(parseInt(segundos)/3600))) * -1;
                    var longitud    = (((parseInt(grado2)+(parseInt(minutos2)/60))+(parseInt(segundos2)/3600))) * -1;
                }else{
                    var latitud     = '';
                    var longitud    = '';
                }
                
            }else{
                var latitud     = $("#longitud_1").val();
                var longitud    = $("#longitud_2").val();
            }
            if(nombre != '' && direccion != '' && latitud != '' && longitud != '' && estado != ''){
            var url         = "./ajax/ajax_apiario.php?case=agregar_apiario";
                url         += "&nombre="+nombre;
                url         += "&direccion="+direccion;
                url         += "&latitud="+latitud;
                url         += "&longitud="+longitud;
                url         += "&estado="+estado;
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(datos){
                       var dato = datos.split(',');
                       if(dato[1] == 0){
                            carga_api();
                            limpiar();
                        }else{
                            alert(dato[2]);
                        }
                    }
                });
            }else{
                alert("DEBE COMPLETAR TODOS LOS CAMPOS");
            }
        })        
    });
    function carga_api(){
        $.ajax({
            type: "GET",
            url: "./ajax/ajax_apiario.php?case=lista_apiarios",
            success: function(datos){
                $("#lista_apiarios").html(datos);
            }
        });  
    }
    function limpiar(){
        $("#nombre_apiario").val('');
        $("#direccion_apiario").val('');
        $("#longitud_1").val('');
        $("#longitud_2").val('');
        $("#grados_1").val('');
        $("#minutos_1").val('');
        $("#segundos_1").val('');
        $("#grados_2").val('');
        $("#minutos_2").val('');
        $("#segundos_2").val('');
    }
</script>