<style>
    .del_diag{
        cursor: pointer;
    }
</style>
<div id="datos_evolucion">

    <div class="cont_text_area">
        <span>EVOLUCIÓN CLINICA Y RESULTADO EXÁMENES MAS RELEVANTES</span>
        <textarea rows="4" id="evolucion_examenes"></textarea>
    </div>

    <div class="cont_text_area">
        <span>DIAGNOSTICO CIERRE</span><div class="btn_agregar_diagnostico" id="btn_agregar_diagnostico"><span id="prueba">AGREGAR</span></div>
        <input type="text" id="diag" class="inp_diagnostico"/>
        <table class="table_diag" id="tabla_diag_cierre">
        </table>
    </div>


    <div class="cont_text_area">
        <span>INDICACIONES MEDICAS</span><div class="btn_agregar_diagnostico" id="btn_agregar_indicaciones"><span id="prueba">AGREGAR</span></div>
        <input type="text" id="indicacion" class="inp_diagnostico"/>
        <table class="table_diag" id="tabla_indicaciones">
        </table>
    </div>

    <div class="bnt_guardar" id="btn_guardar_datos_cierre" style="margin-top: 40px;">
        GUARDAR
    </div>

</div>

<script>
    $(document).ready(function(e){
        carga_diagnosticos_cierre();
        carga_indicaciones();
    
        $("#btn_guardar_datos_cierre").click(function(){
            var evolucion = $("#evolucion_examenes").val();
            var fic_id = $("#fic_id").val();
            var cct_nro = $("#cct_nro").val();

            var url = "evolucion="+evolucion;
                url += "&fic_id="+fic_id;
                url += "&cct_nro="+cct_nro;

            $.ajax({
                url         :	"ajax/ajax_agregar_datos_cierre.php",
                type	    :	"GET",
                data	    :	url,
                dataType    :   "json",
                success	    :	function(data){
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
            var cie_id = $("#cie_id").val();
            var diagnostico = $("#diag").val();
        
            var url = "cie_id="+cie_id;
            url += "&diagnostico="+diagnostico;
        
            $.ajax({
                url         :	"ajax/ajax_agregar_diagnostico_cierre.php",
                type	:	"GET",
                data	:	url,
                dataType    :       "json",
                success	:	function(data){
                    console.log(data);
                    if(data.ERROR_ID == 0){
                        $("#diag").val("");
                        carga_diagnosticos_cierre();
                    }else{
                        alert(data.ERROR);
                    }
                }
            });
        });
    
        $("#btn_agregar_indicaciones").click(function(){
            var cie_id = $("#cie_id").val();
            var indicacion = $("#indicacion").val();
        
            var url = "cie_id="+cie_id;
                url += "&indicacion="+indicacion;
        
            $.ajax({
                url         :	"ajax/ajax_agregar_indicaciones.php",
                type	:	"GET",
                data	:	url,
                dataType    :       "json",
                success	:	function(data){
                    console.log(data);
                    if(data.ERROR_ID == 0){
                        $("#indicacion").val("");
                        carga_indicaciones();
                    }else{
                        alert(data.ERROR);
                    }
                }
            });
        });
    
        $("#tabla_diag_cierre").on('click','.del_diag',function(){
            var id = this.id;
            $.ajax({
                url         :	"ajax/ajax_eliminar_diagnostico.php",
                type        :	"GET",
                data        :	"id="+id+"&origen=3",
                success	:	function(data){
                    console.log(data);
                    carga_diagnosticos_cierre();
                }
            });
        });
    });
    function carga_diagnosticos_cierre(){
    
        var cie_id = $("#cie_id").val();

        $.ajax({
            url         :	"ajax/ajax_diagnostico_cierre.php",
            type        :	"GET",
            data        :	"cie_id="+cie_id,
            success	:	function(data){
                $("#tabla_diag_cierre").html(data);
            }
        });
    }
    function carga_indicaciones(){
    
        var cie_id = $("#cie_id").val();

        $.ajax({
            url         :	"ajax/ajax_indicaciones.php",
            type        :	"GET",
            data        :	"cie_id="+cie_id,
            success	:	function(data){
                $("#tabla_indicaciones").html(data);
            }
        });
    }
</script>