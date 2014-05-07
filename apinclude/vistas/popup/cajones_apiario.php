<?php
$id = $_GET["id"];
//echo $id;
?>
<link rel="stylesheet" type="text/css" href="./css/vista_apiario.css" media="all"/>
<style>
    .sec_atenciones_hoy li{
        display: inline-block;
        border: 1px solid #E4E3D9;
    }
    .sec_atenciones_hoy li a{
        width: 100%;
        min-height: 50px;
        text-decoration: none;
        color: #595A5C;
    }
    .sec_atenciones_hoy ul li a:hover{
        background-color:#f3f3f3;
    }
    .sb_link{
        font-size: 15px;
    }
    .cajones_apiario{
        width: 1200px;
        left: 13%;
        width: 1000px;
    }
</style>
<input type="hidden" id="apiario_id" value="<?php echo $id ?>" />
<script>
    function carga_colmenas(){
        $.ajax({
            type: "GET",
            url: "./ajax/ajax_familia.php?case=fb_lista_sin_apiario",
            success: function(datos){
                $("#sortable_origen").html(datos);
                
                $(".sortable" ).draggable({revert: true,
                    revertDuration: 0});
                $(".lista").droppable({	
                    //lista de destino(los que se introducen a un apiario)
                    accept: ".sortable",
                    drop: function(ev, ui) {
                        var id_elemento = ui.draggable.attr("id");
                        var id_apiario = $("#apiario_id").val();
                        alert(id_apiario+'-'+id_elemento);
                        $(this).append($(ui.draggable));
                    }
                });
                $(".lista_").droppable({
                    // lista de origen (los que no tienen apiario)
                    accept: ".sortable",
                    drop: function(ev, ui) {
                        var id_elemento = ui.draggable.attr("id");
                        var id_apiario = $("#apiario_id").val();
                        alert(id_apiario+'-'+id_elemento);
                        $(this).append($(ui.draggable));
                    }
                });
            }
        }); 
    }
    function carga_colmenas_apiario(){
        var apiario = $("#apiario_id").val();
        $.ajax({
            type: "GET",
            url: "./ajax/ajax_familia.php?case=fb_lista_fam_apiario&apiario_id="+apiario,
            success: function(datos){
                $("#sortable").html(datos);  
                $(".sortable" ).draggable({revert: true,
                    revertDuration: 0});
                $(".lista").droppable({	
                    //lista de destino(los que se introducen a un apiario)
                    accept: ".sortable",
                    drop: function(ev, ui) {
                        var id_elemento = ui.draggable.attr("id");
                        var id_apiario = $("#apiario_id").val();
                        alert(id_apiario+'-'+id_elemento);
                        $(this).append($(ui.draggable));
                    }
                });
                $(".lista_").droppable({
                    // lista de origen (los que no tienen apiario)
                    accept: ".sortable",
                    drop: function(ev, ui) {
                        var id_elemento = ui.draggable.attr("id");
                        var id_apiario = $("#apiario_id").val();
                        alert(id_apiario+'-'+id_elemento);
                        $(this).append($(ui.draggable));
                    }
                });
            }
        }); 
    }
    $(document).ready(function() {
        carga_colmenas();
        carga_colmenas_apiario();
        $("a").live('click',function(){
            return false;
        });
    });
</script>

<div class="cajones_apiario">
    <div id="content" style="width: 1000px; text-align: left;">
        <section class="sec_atenciones_hoy" style="height: 550px; border: 1px solid #BEBEBE;">
            <div class="section_header"><span>Colmenas</span></div> 
            <div class="section_body_" id="lista_destino">
                <ul id="sortable" class="lista" style="height: 86%; width: 93%;">
                    
                </ul>
            </div>
        </section>
        <section class="sec_atenciones_ultimas" style="border: 1px solid #BEBEBE;">
            <div class="section_header"><span>Colmenas sin Apiario</span></div>   
            <div class="section_body" id="lista_origen">
                <ul class="lista_" id="sortable_origen" style="height: 510px; width: 100%;">

                </ul>
            </div>
        </section>
    </div>
</div>