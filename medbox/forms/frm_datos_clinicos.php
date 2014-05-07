<style>
    .del_diag{
        cursor: pointer;
    }
</style>
<div id="datos_clinicos">
    <div class="cont_text_area">
        <span>ANTECEDENTES</span>
        <textarea rows="4" id="antecedentes"></textarea>
    </div>
    <div class="cont_text_area">
        <span>MOTIVO DE CONSULTA</span>
        <textarea rows="4" id="motivo_consulta"></textarea>
    </div>
    <div class="cont_text_area">
        <span>DIAGNOSTICO DE INGRESO</span><div class="btn_agregar_diagnostico" id="btn_agregar_diagnostico"><span id="prueba">AGREGAR</span></div>
        <input type="text" id="diag" class="inp_diagnostico"/>
        <table class="table_diag" id="tabla_diag">
        </table>
    </div>
    
    
    <div class="bnt_guardar" id="btn_guardar_datos_clinicos" style="margin-top: 40px;">
            GUARDAR
    </div>
    
    
</div>
<script>
$(document).ready(function(e){
    carga_diagnosticos_datos_clinicos();
    $("#btn_guardar_datos_clinicos").click(function(){
        var cct_nro = $("#nro_cct").val();
        var antecedentes = $("#antecedentes").val();
        var motivo_consulta = $("#motivo_consulta").val();
        var pac_id = $("#pac_id").val();
        
        var url = "cct_nro="+cct_nro;
            url += "&antecedentes="+antecedentes;
            url += "&motivo_consulta="+motivo_consulta;
            url += "&pac_id="+pac_id;
        
        $.ajax({
            url         :	"ajax/ajax_agregar_datos_clinicos.php",
            type	:	"GET",
            data	:	url,
            dataType    :       "json",
            success	:	function(data){
                console.log(data);
                if(data.ERROR_ID == 0){
                    alert("OK");
                }else{
                    alert(data.ERROR);
                }
            }
        });
        
    });
    
    $("#btn_agregar_diagnostico").click(function(){
        var fic_id = $("#fic_id").val();
        var diagnostico = $("#diag").val();
        
        var url = "fic_id="+fic_id;
            url += "&diagnostico="+diagnostico;
        
        $.ajax({
            url         :	"ajax/ajax_agregar_diagnostico_datos_clinicos.php",
            type	:	"GET",
            data	:	url,
            dataType    :       "json",
            success	:	function(data){
                console.log(data);
                if(data.ERROR_ID == 0){
                    $("#diag").val("");
                    carga_diagnosticos_datos_clinicos();
                }else{
                    alert(data.ERROR);
                }
            }
        });
    });
    
    $("#tabla_diag").on('click','.del_diag',function(){
        var id = this.id;
        $.ajax({
            url         :	"ajax/ajax_eliminar_diagnostico.php",
            type        :	"GET",
            data        :	"id="+id+"&origen=1",
            success	:	function(data){
                console.log(data);
                carga_diagnosticos_datos_clinicos();
            }
        });
    });
});
function carga_diagnosticos_datos_clinicos(){
    
    var fic_id = $("#fic_id").val();

    $.ajax({
        url         :	"ajax/ajax_diagnostico_datos_clinicos.php",
        type        :	"GET",
        data        :	"fic_id="+fic_id,
        success	:	function(data){
            $("#tabla_diag").html(data);
        }
    });
}
</script>