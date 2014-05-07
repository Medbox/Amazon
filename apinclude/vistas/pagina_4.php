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
    <div class="section_header"><span>Buscar Usuario</span></div>   
    <div class="section_body">
        <span id="buscar_usuarios_cont">
            <div class="section " style="border-bottom: 1px solid #BEBDBD; padding-top: 10px;">
                <table id="tabla_bus">
                    <tr>
                        <td><label style="float: none; margin-right: 10px;"> Rut</label></td>
                        <td><input type="text" name="username" id="username_rut" class="medium" autofocus="autofocus" style="font-size: 1.2em; max-width:100%;width: 100%;"></td>
                        <td><label style="float: none; margin-right: 10px;"> Apellido P</label></td>
                        <td><input type="text" class="medium" name="f_required" id="apellido_p" onkeyup="javascript:this.value=this.value.toUpperCase();" style="font-size: 1.2em; max-width:100%;width: 100%;"></td>
                        <td><label style="float: none; margin-right: 10px;"> Apellido M</label></td>
                        <td><input type="text" class="medium" name="f_required" id="apellido_m" onkeyup="javascript:this.value=this.value.toUpperCase();" style="font-size: 1.2em; max-width:100%; width: 100%;"></td>
                        <td style="width: 15%;">
                            <div style="margin-left: 5px">
                                <a class="bt download2 accent" id="buscar_usuario" href="#">Buscar</a>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
            <div id="cont_bus">
                
            </div>
        </span>
    </div>
</section>
<script>
    $(document).ready(function() {
        $("a").live('click',function(){
            return false;
        });
        $('#username_rut').Rut({
            format_on: 'keyup',
            on_success:function(){
                showSuccess("RUT CORRECTO",500);
            },
            on_error: function(){
                $('#username_rut').val("");
                $('#username_rut').focus();
                showError("RUT INCORRECTO",900);
                $('.inner').jrumble({
                    x: 4,
                    y: 0,
                    rotation: 0
                });	
                $('.inner').trigger('startRumble');
                setTimeout('$(".inner").trigger("stopRumble")',500);
                setTimeout('hideTop()',5000);
            }        
        });
        $(".slp_box_container a").live('click',function(){
            var id = $(this).attr("id");
            $.facebox(function() {
                $.get('vistas/popup/prueba.php?id='+id, function(html) {
                    $.facebox(html);
                });
            });
            return false;
        });
        $('.medium').keypress(function(e){
            if(e.which == 13){
                var rut = $("#username_rut").val();
                var apellidoP = $("#apellido_p").val();
                var apellidoM = $("#apellido_m").val();
                carga_usu_bus(rut,apellidoP,apellidoM);
            }
        
        });
        $("#buscar_usuario").click(function(){
            var rut = $("#username_rut").val();
            var apellidoP = $("#apellido_p").val();
            var apellidoM = $("#apellido_m").val();
            carga_usu_bus(rut,apellidoP,apellidoM);
        })
    } );
    function carga_usu_bus(rut,apellidoP,apellidoM){
        $.ajax({
            type: "GET",
            url: "./ajax/ajax_usuarios.php?case=listar_usuarios_buscar&rut="+rut+"&apellidoP="+apellidoP+"&apellidoM="+apellidoM,
            success: function(datos){
                $("#cont_bus").html(datos);
            }
        });  
    }
</script>