<?php
    include_once '../clases/beans/beans_usuarios.php';
    $obj_usu = new beans_usuarios();
    $arr = $obj_usu->listar_usuarios(2);
    echo '<pre>';
    //print_r($arr);echo "\n"; 
    echo '</pre>';
    
    
?>
<script>
    $(document).ready(function() {
        $("table.chart-pie").each(function() {
        var colors = [];
        $("table.chart-pie thead th:not(:first)").each(function() {
            colors.push($(this).css("color"));
        });
        $(this).graphTable({
            series: 'columns',
            position: 'replace',
            width : '100%',
            height: '325px',
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
    });		


</script>
<section class="sec_atenciones_hoy">
    <div class="section_header"><span>Graficos</span></div>   
    <div class="section_body">
        <div class="oneTwo">
            <table class="chart-pie" id="tabla"style="width : 100%;">
                <thead>
                    <tr>
                        <th></th>
                        <th style="color : #aed741;">Product Review</th>
                        <th style="color : #bedd17;">Webboard</th>
                        <th style="color : #c3e171;">Article</th>
                        <th style="color : #85b501;">Other</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th></th>
                        <td>75</td>
                        <td>10</td>
                        <td>9</td>
                        <td>34</td>
                    </tr>
                </tbody>
            </table>
            <div class="chart-pie-shadow"></div>
            <div class="chart_title"><span>Pages is popular  in your web</span></div>
        </div>
    </div>
</section>
<section class="sec_atenciones_ultimas" style="min-height: 375px;">
    <div class="section_header"><span>Izquierda</span></div>   
    <div class="section_body">

    </div>
</section>