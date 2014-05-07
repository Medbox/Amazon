<style>
    .section{
        background-color: #fff;
    }
    label{
        height: 35px;
        line-height: 29px;
        float: none;
        margin-left: 15px;
    }
    .avatar_lista{
        float: left;
        padding-top: 5px;
        padding-left: 5px;
    }
</style>
<section class="sec_atenciones_hoy" style="width: 98%;min-height: 552px;">
    <div class="section_header"><span>Buscar Colmena</span></div>   
    <div class="section_body">
        <span id="buscar_usuarios_cont">
            <div class="section " style="border-bottom: 1px solid #BEBDBD; padding-top: 10px;">
                <table id="tabla_bus">
                    <tr>
                        <td><label style="float: none; margin-right: 10px;"> Nombre</label></td>
                        <td><input type="text" name="nombre_colmena" id="nombre_colmena" class="medium" autofocus="autofocus" style="font-size: 1.2em; max-width:100%;width: 100%;"></td>
                        <td><label style="float: none; margin-right: 10px;"> Tipo Colmena</label></td>
                        <td><select id="tipo_colmena" class="style-select" style="font-size: 1.2em; max-width:100%;width: 100%;">
                                <option value="1">NORMAL</option>
                                <option value="2">NUCLEO</option>
                            </select> </td>
                        <td style="width: 15%;">
                            <div style="margin-left: 5px">
                                <a class="bt download2 accent" id="busca_familia" href="#">Buscar</a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="lista_resultados">
                
            </div>
        </span>
    </div>
</section>
<script>
    $(document).ready(function() {
        $("a").live('click',function(){
            return false;
        });
        $(".slp_box_container a").live('click',function(){
            var id = $(this).attr("id");
            $.facebox(function() {
                $.get('vistas/popup/modifica_colmena.php?id='+id, function(html) {
                    $.facebox(html);
                });
            });
            return false;
        });
        $("#busca_familia").click(function(){
            var nombre  = $("#nombre_colmena").val();
            var tipo    = $("#tipo_colmena").val();
            carga_fam_bus(nombre, tipo);
        });
        
    } );
    function carga_fam_bus(nombre,tipo){
        $.ajax({
            type: "GET",
            url: "./ajax/ajax_familia.php?case=fb_lista_familia_busqueda&nombre="+nombre+"&tipo="+tipo,
            success: function(datos){
                $("#lista_resultados").html(datos);
            }
        });  
    }
</script>