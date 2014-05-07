<style>
    .section{
        background-color: #EEE;
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
    <div class="section_header"><span>Buscar Reina</span></div>   
    <div class="section_body">
        <span id="buscar_usuarios_cont">
            <div class="section " style="border-bottom: 1px solid #BEBDBD; padding-top: 10px;">
                <label style="float: none; margin-right: 10px;"> Nombre de la Colmena</label>
                <input type="text" name="nombre_colmena" id="nombre_colmena" class="medium" autofocus="autofocus" style="font-size: 1.2em; max-width:20%;">
                <div style="margin-left: 10%;display: inline-block;padding: 0px;">
                    <a class="bt download2 accent" id="" href="#" style="width: 90%">Buscar</a>
                </div>
            </div>
            <div id="lista_resultados">
                
            </div>
        </span>
    </div>
</section>
<script>
    $(document).ready(function() {
        carga_reina();
    } );
    function carga_reina(){
        $.ajax({
            type: "GET",
            url: "./ajax/ajax_reina.php?case=listar_reinas_busqueda",
            success: function(datos){
                $("#lista_resultados").html(datos);
                $("#lista_resultados a").click(function(){
                    var id = $(this).attr("id");
                    $.facebox(function() {
                        $.get('vistas/popup/modifica_reina.php?id='+id, function(html) {
                            $.facebox(html);
                        });
                    });
                    return false;
                });
            }
        });  
    }
</script>