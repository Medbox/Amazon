<style>
    .del_diag{
        cursor: pointer;
    }
</style>
<div id="datos_evolucion">
    <div class="cont_text_area">
        <span>DIAGNOSTICO DE INGRESO SALA</span><div class="btn_agregar_diagnostico" id="btn_agregar_diagnostico"><span id="prueba">AGREGAR</span></div>
        <input type="text" id="diag" class="inp_diagnostico"/>
        <table class="table_diag" id="tabla_diag_evolucion">
        </table>
    </div>
    
    <div class="cont_text_area">
        <span>EVOLUCIÓN</span>
        <textarea rows="4" id="evolucion"></textarea>
    </div>
    
</div>

<script>
$(document).ready(function(e){
    carga_diagnosticos_evolucion();
    
    $("#btn_agregar_diagnostico").click(function(){
        var atn_id = $("#atn_id").val();
        var diagnostico = $("#diag").val();
        
        var url = "atn_id="+atn_id;
            url += "&diagnostico="+diagnostico;
        
        $.ajax({
            url         :	"ajax/ajax_agregar_diagnostico_evolucion.php",
            type	:	"GET",
            data	:	url,
            dataType    :       "json",
            success	:	function(data){
                console.log(data);
                if(data.ERROR_ID == 0){
                    $("#diag").val("");
                    carga_diagnosticos_evolucion();
                }else{
                    alert(data.ERROR);
                }
            }
        });
    });
    
    $("#tabla_diag_evolucion").on('click','.del_diag',function(){
        var id = this.id;
        $.ajax({
            url         :	"ajax/ajax_eliminar_diagnostico.php",
            type        :	"GET",
            data        :	"id="+id+"&origen=2",
            success	:	function(data){
                console.log(data);
                carga_diagnosticos_evolucion()();
            }
        });
    });
});
function carga_diagnosticos_evolucion(){
    
    var atn_id = $("#atn_id").val();

    $.ajax({
        url         :	"ajax/ajax_diagnostico_evolucion.php",
        type        :	"GET",
        data        :	"atn_id="+atn_id,
        success	:	function(data){
            $("#tabla_diag_evolucion").html(data);
        }
    });
}
</script>