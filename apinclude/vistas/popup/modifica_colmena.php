<?php
$id = $_GET["id"];
?>
<style>
    .tooltip {
        border-bottom: 1px dotted #0077AA;
        cursor: help;
    }

    .tooltip::after {
        background: rgba(0, 0, 0, 0.8);
        border-radius: 8px 8px 8px 0px;
        box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);
        color: #FFF;
        content: attr(data-tooltip); /* The main part of the code, determining the content of the pop-up prompt */
        margin-top: -24px;
        opacity: 0; /* Our element is transparent... */
        padding: 3px 7px;
        position: absolute;
        visibility: hidden; /* ...and hidden. */

        transition: all 0.4s ease-in-out; /* To add some smoothness */
    }

    .tooltip:hover::after {
        opacity: 1; /* Make it visible */
        visibility: visible;
    }
    .section{
        background-color: #ffffff;
    }

    .check label{
        margin-left: 0px;
    }
    .modifica_colmena label{
        line-height: 14px;
    }
    .modifica_colmena{
        width: 1200px;
        left: 13%;
        width: 1000px;
    }
    .new_input {
        width: 100%;
        max-width: 92%;
        font-size: 2em;
        color: #333;
        outline: none;
        padding-left: 5px;
        padding-right: 5px;
    }
    #obs{
        text-align: left;
    }
</style>
<div class="modifica_colmena">
    <div id="content_">
        <section class="sec_atenciones_hoy">
            <div class="section_header"><span>Modificar Colmena</span></div>   
            <div class="section_body">
                <section id="add_user" style="margin-left: 0px; margin-top: 0px;">
                    <div class="section ">
                        <label> Nombre<small>Nombre de la Colmena</small></label>   
                        <div> 
                            <input type="text" name="nombre_colmena" id="nombre_colmena" class="large" required="required" autofocus="autofocus">
                        </div>
                    </div>
                    <div class="section ">
                        <label> Tipo Colmena<small>Tipo de Colmena</small></label>   
                        <div> 
                            <select id="tipo_colmena" class="style-select">
                                <option value="1">NORMAL</option>
                                <option value="2">NUCLEO</option>
                            </select>   
                        </div>
                    </div>
                    <div class="section ">
                        <label> Origen<small>Origen de la Colmena</small></label>   
                        <div> 
                            <select id="origen_colmena" class="style-select">
                                <option value="1">NUCLEO COMPRADO</option>
                                <option value="2">PAQUETE COMPRADO</option>
                                <option value="3">ENJAMBRE </option>
                                <option value="4">DE OTRA COLMENA</option>
                            </select> 
                        </div>
                    </div>
                    <div class="section " style="display: none;" id="n_colmena_div">
                        <label> Numero Colmena<small>Numero de la Colmena</small></label>   
                        <div> 
                            <input type="text" class="large" name="n_colmena" id="n_colmena" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>
                    </div>
                    <div class="section ">
                        <label> Apiario<small>Apiario de Origen</small></label>   
                        <div> 
                            <select id="list_apiario" class="style-select">
                                <option value="1">APIARIO 1</option>
                                <option value="2">APIARIO 2</option>
                                <option value="3">APIARIO 3</option>
                            </select> 
                        </div>
                    </div>
                    <div class="section ">
                        <label>Reina<small>Reina Asignda</small></label>   
                        <div> 
                            <select id="list_apiario" class="style-select">
                                <option value="1">REINA 1</option>
                                <option value="2">REINA 2</option>
                                <option value="3">REINA 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="section ">
                        <label> Alza<small>Numero de Alzas</small></label>   
                        <div> 
                            <input type="text" class="medium" name="alza" id="alza" style="width: 15%;">
                        </div>
                    </div>
                    <div class="section">
                        <label> Estado<small>Estado de la Colmena</small></label>   
                        <div class="check"> 
                            <input type="checkbox" id="online" name="online"   class="online"  value="1"   checked="checked" />
                        </div>
                    </div>  
                    <div class="section last">
                        <div style="margin-left: 5px" >
                            <a class="btn_agegar_usuario" id="btn_agregar_apiario" href="#">Agregar Apiario</a>
                        </div>
                    </div>
                </section>

            </div>
        </section>

        <section class="sec_atenciones_ultimas" id="add_reina" style="min-height: 200px;">
            <div class="section_header"><span>Agregar Visita</span></div>
            <div class="section_body" >
                <div class="section ">
                    <label style="margin-left: 5px"> Fecha<small>Fecha Visita</small></label>   
                    <div> 
                        <input type="text" class="new_input" name="fecha_visita" id="fecha_visita">
                    </div>
                </div>
                <div class="section ">
                    <label style="margin-left: 5px"> T.P.<small>Tamaño Poblacion</small></label>   
                    <div> 
                        <input type="text" class="new_input" name="tp" id="tp">
                    </div>
                </div>
                <div class="section ">
                    <label style="margin-left: 5px"> M.M.<small>Marcos con Miel</small></label>   
                    <div> 
                        <input type="text" class="new_input" name="mm" id="mm">
                    </div>
                </div>
                <div class="section ">
                    <label style="margin-left: 5px"> M.L.<small>Marco con Larba</small></label>   
                    <div> 
                        <input type="text" class="new_input" name="ml" id="ml">
                    </div>
                </div>
                <div class="section ">
                    <label style="margin-left: 5px"> M.S.<small>Marco Sellados</small></label>   
                    <div> 
                        <input type="text" class="new_input" name="ms" id="ms">
                    </div>
                </div>
                <div class="section">
                    <label style="margin-left: 5px"> Observaciones<small>Trabajo Realizado</small></label>   
                    <div> 
                        <textarea id="observaciones" name="observaciones" class="new_input"> </textarea>
                   </div>
                </div>
                <div class="section last">
                    <div style="margin-left: 5px">
                        <a class="btn_agegar_usuario" id="btn_agregar_reina" href="#">Agregar</a>
                    </div>
                </div>
            </div>
        </section>


        <section class="sec_atenciones_hoy" style="width: 98%;">
            <div class="section_header"><span>Lista Visitas</span></div>   
            <div class="section_body">
                <section id="add_user" class="tabla_cosecha">
                    <table id="tabla_cosecha">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>T.P.</th>
                                <th>M.M.</th>
                                <th>M.L.</th>
                                <th>M.S.</th>
                                <th>Observaciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>09/03/2012</td>
                                <td>8</td>
                                <td>3</td>
                                <td>4</td>
                                <td>4</td>
                                <td id="obs">OBSERVACIONES DE PRUEBA 1 ESTO AUN PUEDE SER NUCHO MAS LARGO DE LO QUE ESTOY ESCRIBIENDO AHORA.. ESTO PUEDE SER UN TEXTO MUY GRABDE</td>
                            </tr>
                            <tr>
                                <td>09/03/2012</td>
                                <td>8</td>
                                <td>3</td>
                                <td>4</td>
                                <td></td>
                                <td id="obs">OBSERVACIONES DE PRUEBA 2</td>
                            </tr>
                            <tr>
                                <td>09/03/2012</td>
                                <td>8</td>
                                <td>3</td>
                                <td>4</td>
                                <td>1</td>
                                <td id="obs">OBSERVACIONES DE PRUEBA 3</td>
                            </tr>
                        </tbody>
                    </table>
                </section>

            </div>
        </section>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#fecha_visita").datepicker();
        $("a").click(function(){
            return false;
        });
        $(".online").iphoneStyle({  //  Custom Label 
            checkedLabel: "Activo",
            uncheckedLabel: "Desactivo ",
            labelWidth:'65px',
            onChange: function(){
                if($(".online").val() == 1){
                    $(".online").val("2"); 
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
                    $("#fecundada").val("2"); 
                }else{
                    $("#fecundada").val("1"); 
                }
            }
        });
        
         
               
    });
</script>