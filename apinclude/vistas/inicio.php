<?php
$arrMenu = array(array("MEN_ID" => "1",
        "MEN_NAME" => "INICIO",
        "MEN_PARENT" => "0",
        "MEN_TEXTO" => "Inicio",
        "MEN_LINK" => "vistas/pagina_1.php",
        "MEN_ORDEN" => "1",
        "MEN_HIJO" => "0",
        "MEN_ID_MOS" => "inicio"),
    array("MEN_ID" => "2",
        "MEN_NAME" => "USUARIOS",
        "MEN_PARENT" => "0",
        "MEN_TEXTO" => "Usuarios",
        "MEN_LINK" => "vistas/pagina_2.php",
        "MEN_ORDEN" => "2",
        "MEN_HIJO" => "1",
        "MEN_ID_MOS" => "usu"),
    array("MEN_ID" => "3",
        "MEN_NAME" => "AGREGAR_USUARIOS",
        "MEN_PARENT" => "2",
        "MEN_TEXTO" => "Agregar Usuarios",
        "MEN_LINK" => "vistas/pagina_3.php",
        "MEN_ORDEN" => "2",
        "MEN_HIJO" => "2",
        "MEN_ID_MOS" => "add_usu"),
    array("MEN_ID" => "4",
        "MEN_NAME" => "BUSCAR_USUARIOS",
        "MEN_PARENT" => "2",
        "MEN_TEXTO" => "Buscar Usuarios",
        "MEN_LINK" => "vistas/pagina_4.php",
        "MEN_ORDEN" => "2",
        "MEN_HIJO" => "2",
        "MEN_ID_MOS" => "bus_usu"),
    array("MEN_ID" => "5",
        "MEN_NAME" => "COSECHAS",
        "MEN_PARENT" => "0",
        "MEN_TEXTO" => "Cosechas",
        "MEN_LINK" => "vistas/pagina_5.php",
        "MEN_ORDEN" => "3",
        "MEN_HIJO" => "1",
        "MEN_ID_MOS" => "cos"),
    array("MEN_ID" => "6",
        "MEN_NAME" => "AGREGAR_COSECHAS",
        "MEN_PARENT" => "5",
        "MEN_TEXTO" => "Agregar Cosechas",
        "MEN_LINK" => "vistas/pagina_6.php",
        "MEN_ORDEN" => "3",
        "MEN_HIJO" => "2",
        "MEN_ID_MOS" => "add_cos"),
    array("MEN_ID" => "7",
        "MEN_NAME" => "BUSCAR_COSECHAS",
        "MEN_PARENT" => "5",
        "MEN_TEXTO" => "Buscar Cosechas",
        "MEN_LINK" => "vistas/pagina_7.php",
        "MEN_ORDEN" => "3",
        "MEN_HIJO" => "2",
        "MEN_ID_MOS" => "bus_cos"),
    array("MEN_ID" => "8",
        "MEN_NAME" => "PRODUCTOS",
        "MEN_PARENT" => "0",
        "MEN_TEXTO" => "Productos",
        "MEN_LINK" => "vistas/pagina_8.php",
        "MEN_ORDEN" => "4",
        "MEN_HIJO" => "1",
        "MEN_ID_MOS" => "pro"),
    array("MEN_ID" => "9",
        "MEN_NAME" => "AGREGAR_PRODUCTOS",
        "MEN_PARENT" => "8",
        "MEN_TEXTO" => "Agregar Productos",
        "MEN_LINK" => "vistas/pagina_9.php",
        "MEN_ORDEN" => "4",
        "MEN_HIJO" => "2",
        "MEN_ID_MOS" => "add_pro"),
    array("MEN_ID" => "10",
        "MEN_NAME" => "BUSCAR_PRODUCTOS",
        "MEN_PARENT" => "8",
        "MEN_TEXTO" => "Buscar Productos",
        "MEN_LINK" => "vistas/pagina_10.php",
        "MEN_ORDEN" => "4",
        "MEN_HIJO" => "2",
        "MEN_ID_MOS" => "bus_pro"),
    array("MEN_ID" => "11",
        "MEN_NAME" => "REINAS",
        "MEN_PARENT" => "0",
        "MEN_TEXTO" => "Reinas",
        "MEN_LINK" => "vistas/pagina_11.php",
        "MEN_ORDEN" => "5",
        "MEN_HIJO" => "1",
        "MEN_ID_MOS" => "rei"),
    array("MEN_ID" => "12",
        "MEN_NAME" => "AGREGAR_REINAS",
        "MEN_PARENT" => "11",
        "MEN_TEXTO" => "Agregar Reina",
        "MEN_LINK" => "vistas/pagina_12.php",
        "MEN_ORDEN" => "5",
        "MEN_HIJO" => "2",
        "MEN_ID_MOS" => "add_rei"),
    array("MEN_ID" => "13",
        "MEN_NAME" => "BUSCAR_REINAS",
        "MEN_PARENT" => "11",
        "MEN_TEXTO" => "Buscar Reina",
        "MEN_LINK" => "vistas/pagina_13.php",
        "MEN_ORDEN" => "5",
        "MEN_HIJO" => "2",
        "MEN_ID_MOS" => "bus_rei"),
    array("MEN_ID" => "14",
        "MEN_NAME" => "COLMENA",
        "MEN_PARENT" => "0",
        "MEN_TEXTO" => "Colmena",
        "MEN_LINK" => "vistas/pagina_14.php",
        "MEN_ORDEN" => "6",
        "MEN_HIJO" => "1",
        "MEN_ID_MOS" => "fam"),
    array("MEN_ID" => "15",
        "MEN_NAME" => "AGREGAR_COLMENA",
        "MEN_PARENT" => "14",
        "MEN_TEXTO" => "Agregar Colmena",
        "MEN_LINK" => "vistas/pagina_15.php",
        "MEN_ORDEN" => "6",
        "MEN_HIJO" => "2",
        "MEN_ID_MOS" => "add_fam"),
    array("MEN_ID" => "16",
        "MEN_NAME" => "BUSCAR_COLMENA",
        "MEN_PARENT" => "14",
        "MEN_TEXTO" => "Buscar Colmena",
        "MEN_LINK" => "vistas/pagina_16.php",
        "MEN_ORDEN" => "6",
        "MEN_HIJO" => "2",
        "MEN_ID_MOS" => "bus_fam"),
    array("MEN_ID" => "17",
        "MEN_NAME" => "APIARIO",
        "MEN_PARENT" => "0",
        "MEN_TEXTO" => "Apiario",
        "MEN_LINK" => "vistas/pagina_17.php",
        "MEN_ORDEN" => "7",
        "MEN_HIJO" => "1",
        "MEN_ID_MOS" => "api"),
    array("MEN_ID" => "18",
        "MEN_NAME" => "AGREGAR APIARIO",
        "MEN_PARENT" => "17",
        "MEN_TEXTO" => "Agregar Apiario",
        "MEN_LINK" => "vistas/pagina_18.php",
        "MEN_ORDEN" => "7",
        "MEN_HIJO" => "2",
        "MEN_ID_MOS" => "add_api"),
    array("MEN_ID" => "22",
        "MEN_NAME" => "LISTAR APIARIO",
        "MEN_PARENT" => "17",
        "MEN_TEXTO" => "Listar Apiario",
        "MEN_LINK" => "vistas/pagina_21.php",
        "MEN_ORDEN" => "7",
        "MEN_HIJO" => "2",
        "MEN_ID_MOS" => "lis_api"),
    array("MEN_ID" => "20",
        "MEN_NAME" => "INFORMES",
        "MEN_PARENT" => "0",
        "MEN_TEXTO" => "Informes",
        "MEN_LINK" => "vistas/pagina_20.php",
        "MEN_ORDEN" => "8",
        "MEN_HIJO" => "0",
        "MEN_ID_MOS" => "inf"),
    array("MEN_ID" => "21",
        "MEN_NAME" => "SALIR",
        "MEN_PARENT" => "0",
        "MEN_TEXTO" => "Salir",
        "MEN_LINK" => "#",
        "MEN_ORDEN" => "9",
        "MEN_HIJO" => "0",
        "MEN_ID_MOS" => "salir"));
?>

<html>
    <head>
        <meta charset="utf-8" />
        <title>Sistema de Gestión, Control y Trazabilidad Apicola</title>
        <link rel="stylesheet" type="text/css" href="css/cabecera.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="css/index.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="css/contenido.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="css/menu.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="css/ui.jqgrid.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="css/jquery-ui-custom.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="css/facebox.css" media="all"/>
        <link rel="stylesheet" type="text/css" href="css/tabla_cosecha.css" media="all"/>
        <link rel="shortcut icon" href="images/logo/apinclude.ico" />



        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery-ui.min.js"></script>
        <script type="text/javascript" src="js/jquery.history.js"></script>
        <script type="text/javascript" src="js/iphone.check.js"></script>
        <script type="text/javascript" src="js/utilidades.js"></script>


        <script type="text/javascript" src="js/flot.js"></script>
        <script type="text/javascript" src="js/flot.pie.min.js"></script>
        <script type="text/javascript" src="js/flot.resize.min.js"></script>
        <script type="text/javascript" src="js/jquery.cookie.js"></script>

        <script type="text/javascript" src="js/graphtable.js"></script>
        <script type="text/javascript" src="js/facebox.js"></script>
        <script type="text/javascript" src="js/maps.js"></script>
        <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false&amp;language=es"></script>-->
        <script type="text/javascript" src="js/map.js"></script>
        <script type="text/javascript" src="js/jquery.Rut.js"></script>
        <script type="text/javascript" src="js/jquery.Rut.min.js"></script>


    </head>
    <body>
    
        <style>
            #ui-datepicker-div{display: none;}
            #versionBar {
                background-color:#212121;
                position:fixed;
                width:100%;
                height:35px;
                bottom:0;
                left:0;
                text-align:center;
                line-height:35px;
            }
            .copyright{
                text-align:center; font-size:10px; color:#CCC;
            }
            .copyright a{
                color:#A31F1A; text-decoration:none
            }  
            #overlay {
                width:100%;
                height:100%;
                position:fixed;
                top:0;
                left:0;
                background-color:#000;
                opacity:0.3;
                z-index:1000;
            }
            #preloader {
                background: #000000 url(../images/loadder/preloader.gif) no-repeat 12px 10px;
                font-size: 11px;
                height: 20px;
                left: 50%;
                line-height: 20px;
                margin: -20px 0 0 -45px;
                padding: 10px;
                position: fixed;
                text-align: left;
                text-indent: 36px;
                top: 50%;
                width: 90px;
                z-index: 1209;
                opacity:0.8;
                filter:alpha(opacity=90);
                -moz-border-radius: 8px;
                -webkit-border-radius: 8px;
                border-radius: 8px;
                color: #FFF;
                text-shadow:none;
            }
        </style>
        <div id="overlay"></div><div id="preloader">Cargando...</div>
        <header id="header">
            <div class="site-top">
                <div class="site-block clearfix">
                    <div class="logo">
                        <a href="index.php#inicio" class="logo"><img src="images/logo/logo-apinclude3.png" alt="Apinclude" style="width: 145px; padding-right: 17px; height: 34px; padding-top: 5px;"></a>
                        <!--<div class="text">Apinclude</div>-->
                    </div>
                    <?php
                    
                    $menu = "<ul class='top-menu menu clearfix' id='menu' style='float:left;'>";
                    foreach ($arrMenu as $val) {
                        if ($val["MEN_HIJO"] == 0) {
                            $menu .= "<li><div class='tapa'><a id=" . $val["MEN_ID_MOS"] . " rel='' href='" . $val["MEN_LINK"] . "' class=''>" . $val["MEN_TEXTO"] . "</a></div>";
                            $menu .= "</li>";
                        } elseif ($val["MEN_HIJO"] == 1) {
                            $menu .= "<li class='dropdown'><div class='tapa'><a id=" . $val["MEN_ID_MOS"] . " rel='' href='" . $val["MEN_LINK"] . "' class=''>" . $val["MEN_TEXTO"] . "</a></div>";

                            $menu .= "<ul class='menu submenu'>";
                            foreach ($arrMenu as $val2) {
                                if ($val2["MEN_PARENT"] == $val["MEN_ID"]) {
                                    $menu .= "<li><a id=" . $val2["MEN_ID_MOS"] . " rel='' class='' href='" . $val2["MEN_LINK"] . "'>" . $val2["MEN_TEXTO"] . "</a></li>";
                                }
                            }
                            $menu .= "</ul>";
                            $menu .= "<span class=\"nip\"><br></span>";
                            $menu .= "</li>";
                        }
                    }
                    $menu .= "</ul>";
                    echo $menu;
                    ?>
                    <ul id="admin-bar">
                        <li>
                            <div id="msg">
                                <div id="texto_rec">
                                    <img src="images/alarma.png" style="width: 24px; height: 24px; padding-top: 10px;"/>
                                </div>
                                <div id="img_rec">

                                    <div id="foto_globo"><img src="images/cont_num.png"/><span>3</span></div>
                                </div>
                            </div>
                            <ul id="drop-down">
                                <li>
                                    <div class="encabezado">
                                        <span>Recordatorios</span>
                                    </div>
                                    <div class="recordatorio">
                                        <img src="images/alarma.png" style="width: 24px; height: 24px;"/>
                                        <span class="rec">Recordatorio 1</span><br />
                                        <span>10:00</span>
                                    </div>
                                    <div class="recordatorio">
                                        <img src="images/alarma.png" style="width: 24px; height: 24px;"/>
                                        <span class="rec">Revisar apiario 2</span><br />
                                        <span>11:00</span>
                                    </div>
                                    <div class="recordatorio">
                                        <img src="images/alarma.png" style="width: 24px; height: 24px;"/>
                                        <span class="rec">Aun no se que colocar 3</span><br />
                                        <span>12:00</span>
                                    </div>
                                    <div class="final">

                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div><!--// site-block -->
            </div>

        </div>
    </header>
    <div id="wrapper">

        <div id="content">

        </div>
        <div class="corte"></div>
    </div>
    <div id="versionBar">
        <div class="copyright"> © Copyright 2012  All Rights Reserved <span class="tip"><a href="#" original-title="Apinclude">Apinclude</a> </span> </div>
    </div>

    <script>
    
        $(document).ready(function() {  
            ocultarLoader();
            $('.dropdown').hover(function() {
                $(this).find('.submenu').slideToggle('fast'); 
            });
            var jash = window.location.hash;
            if(jash.length > 1){
                var split_ = jash.split("#");
                if(split_[2] != undefined){
                    //ver_men3(split_[2]);
                    var g = '#';
                    var url = $(''+g+split_[2]+'').attr('href');
                }else{
                    $('a').removeClass('active');
                    $("a").removeAttr('rel');
                    ver_men(split_[1]);
                    var url = $('a[rel="active"]').attr('href');
                }
                if(url != '#'){
                    loadContent();   
                    function loadContent() { 
                        //loading('Cargando',1);
                        $('#content').load(url,'',showNewContent());
                    }
                    function showNewContent() {
                        //setTimeout( "unloading()", 2000 );
                        $('#content').fadeIn('fast');
                    }
                }  
            }
            window.onpopstate = function()
            {
                $("a").removeClass('active');
                $('a').removeClass('active');
                $("a").removeAttr('rel');
                var jash = window.location.hash;
                if(jash.length > 1){
                    var split_ = jash.split("#");
                    ver_men2(split_[1]);
                    ver_men4(split_[2]);
                    if(split_[2] != undefined){
                        var g = '#';
                        var url = $(''+g+split_[2]+'').attr('href');
                    }else{
                            
                        var url = $('a[rel="active"]').attr('href');
                    }
                    if(url != '#'){
                        mostrarLoader();
                        loadContent();
                        ocultarLoader();
                        function loadContent() {
                            //loading('Cargando',1);
                            $('#content').load(url,'',showNewContent());
                        }
                        function showNewContent() {
                            //setTimeout( "unloading()", 2000 );
                            $('#content').fadeIn('fast');
                        }
                    }else{
                            
                    } 
                }
            }
                
            $('.tapa > a').click(function(){
                $('a').removeClass('active');
                $("a").removeAttr('rel');
                var men = $(this).attr('id');
                var toLoad = $(this).attr('href');
                if(toLoad != '#'){
                    mostrarLoader();
                    loadContent();
                    $('a').removeClass('active');
                    ver_men(men);
                    ocultarLoader();    
                    function loadContent() {
                        //loading('Cargando',1);
                        $('#content').load(toLoad,'',showNewContent());
                    }
                    function showNewContent() {
                        //setTimeout( "unloading()", 2000 );
                        $('#content').fadeIn('fast');
                    }
                    return false;

                }else{
                        
                }

            });
            $('.submenu li a').click(function(){
                var men = $(this).attr('id');
                var toLoad = $(this).attr('href');
                if(toLoad != '#'){
                    mostrarLoader();
                    loadContent();
                    $('a').removeClass('active');
                    //ver_men1(jash_);
                    ver_men3(men);
                    ocultarLoader();
                    function loadContent() {
                        //loading('Cargando',1);
                        $('#content').load(toLoad,'',showNewContent());
                    }
                    function showNewContent() {
                        //setTimeout( "unloading()", 2000 );
                        $('#content').fadeIn('fast');
                    }
                    return false;

                }else{
                        
                }

            });
            $("#salir").click(function(){
                salir();
            })
        });
        function salir(){
            $.ajax({
                type: "GET",
                url: "./ajax/end_login.php",
                success: function(){
                    window.location.href='index.php'
                }
            });
        }   
        function ver_men(men){
            switch(men){
                case "inicio":
                    $("#inicio").addClass("active");
                    $("#inicio").attr("rel","active");
                    history.pushState(men, "1", "#inicio");
                    break;
                case "usu":
                    $("#usu").addClass("active");
                    $("#usu").attr("rel","active");
                    history.pushState(men, "2", "#usu");
                    break;
                case "cos":
                    $("#cos").addClass("active");
                    $("#cos").attr("rel","active");
                    history.pushState(men, "3", "#cos");
                    break;
                case "pro":
                    $("#pro").addClass("active");
                    $("#pro").attr("rel","active");
                    history.pushState(men, "4", "#pro");
                    break;
                case "rei":
                    $("#rei").addClass("active");
                    $("#rei").attr("rel","active");
                    history.pushState(men, "5", "#rei");
                    break;
                case "fam":
                    $("#fam").addClass("active");
                    $("#fam").attr("rel","active");
                    history.pushState(men, "6", "#fam");
                    break;
                case "api":
                    $("#api").addClass("active");
                    $("#api").attr("rel","active");
                    history.pushState(men, "7", "#api");
                    break;
                case "inf":
                    $("#inf").addClass("active");
                    $("#inf").attr("rel","active");
                    history.pushState(men, "8", "#inf");
                    break;
                default:
                        
                    break;
            }
        }
        function ver_men2(men){
            switch(men){
                case "inicio":
                    $("#inicio").addClass("active");
                    $("#inicio").attr("rel","active");
                    return true;
                    break;
                case "usu":
                    $("#usu").addClass("active");
                    $("#usu").attr("rel","active");
                    break;
                case "cos":
                    $("#cos").addClass("active");
                    $("#cos").attr("rel","active");
                    break;
                case "pro":
                    $("#pro").addClass("active");
                    $("#pro").attr("rel","active");
                    break;
                case "rei":
                    $("#rei").addClass("active");
                    $("#rei").attr("rel","active");
                    break;
                case "fam":
                    $("#fam").addClass("active");
                    $("#fam").attr("rel","active");
                    break;
                case "api":
                    $("#api").addClass("active");
                    $("#api").attr("rel","active");
                    break;
                case "inf":
                    $("#inf").addClass("active");
                    $("#inf").attr("rel","active");
                    break;
                default:
                    break;
            }
        }
        function ver_men3(men){            
            switch(men){
                case "add_usu":
                    $("#add_usu").addClass("active");
                    $("#add_usu").attr("rel","active");
                    $("#usu").addClass("active");
                    $("#usu").attr("rel","active");
                    history.pushState(men, "1", "#usu#add_usu");
                    break;
                case "bus_usu":
                    $("#usu").addClass("active");
                    $("#usu").attr("rel","active");
                    $("#bus_usu").addClass("active");
                    $("#bus_usu").attr("rel","active");
                    history.replaceState(men, "2", "#usu#bus_usu");
                    break;
                case "add_cos":
                    $("#cos").addClass("active");
                    $("#cos").attr("rel","active");
                    $("#add_cos").addClass("active");
                    $("#add_cos").attr("rel","active");
                    history.pushState(men, "3", "#cos#add_cos");
                    break;
                case "bus_cos":
                    $("#cos").addClass("active");
                    $("#cos").attr("rel","active");
                    $("#bus_cos").addClass("active");
                    $("#bus_cos").attr("rel","active");
                    history.pushState(men, "4", "#cos#bus_cos");
                    break;
                case "add_pro":
                    $("#pro").addClass("active");
                    $("#pro").attr("rel","active");
                    $("#add_pro").addClass("active");
                    $("#add_pro").attr("rel","active");
                    history.pushState(men, "5", "#pro#add_pro");
                    break;
                case "bus_pro":
                    $("#pro").addClass("active");
                    $("#pro").attr("rel","active");
                    $("#bus_pro").addClass("active");
                    $("#bus_pro").attr("rel","active");
                    history.pushState(men, "6", "#pro#bus_pro");
                    break;
                case "add_rei":
                    $("#rei").addClass("active");
                    $("#rei").attr("rel","active");
                    $("#add_rei").addClass("active");
                    $("#add_rei").attr("rel","active");
                    history.pushState(men, "7", "#rei#add_rei");
                    break;
                case "bus_rei":
                    $("#rei").addClass("active");
                    $("#rei").attr("rel","active");
                    $("#bus_rei").addClass("active");
                    $("#bus_rei").attr("rel","active");
                    history.pushState(men, "8", "#rei#bus_rei");
                    break;
                case "add_fam":
                    $("#fam").addClass("active");
                    $("#fam").attr("rel","active");
                    $("#add_fam").addClass("active");
                    $("#add_fam").attr("rel","active");
                    history.pushState(men, "7", "#fam#add_fam");
                    break;
                case "bus_fam":
                    $("#fam").addClass("active");
                    $("#fam").attr("rel","active");
                    $("#bus_fam").addClass("active");
                    $("#bus_fam").attr("rel","active");
                    history.pushState(men, "8", "#fam#bus_fam");
                    break;
                case "add_api":
                    $("#api").addClass("active");
                    $("#api").attr("rel","active");
                    $("#add_api").addClass("active");
                    $("#add_api").attr("rel","active");
                    history.pushState(men, "7", "#api#add_api");
                    break;
                case "lis_api":
                    $("#api").addClass("active");
                    $("#api").attr("rel","active");
                    $("#lis_api").addClass("active");
                    $("#lis_api").attr("rel","active");
                    history.pushState(men, "8", "#api#lis_api");
                    break;
                default:
                    break;
            }
        }
        function ver_men4(men){
            switch(men){
                case "add_usu":
                    $("#usu").addClass("active");
                    $("#usu").attr("rel","active");
                    $("#add_usu").addClass("active");
                    $("#add_usu").attr("rel","active");
                    break;
                case "bus_usu":
                    $("#usu").addClass("active");
                    $("#usu").attr("rel","active");
                    $("#bus_usu").addClass("active");
                    $("#bus_usu").attr("rel","active");
                    break;
                case "add_cos":
                    $("#cos").addClass("active");
                    $("#cos").attr("rel","active");
                    $("#add_cos").addClass("active");
                    $("#add_cos").attr("rel","active");
                    break;
                case "bus_cos":
                    $("#cos").addClass("active");
                    $("#cos").attr("rel","active");
                    $("#bus_cos").addClass("active");
                    $("#bus_cos").attr("rel","active");
                    break;
                case "add_pro":
                    $("#pro").addClass("active");
                    $("#pro").attr("rel","active");
                    $("#add_pro").addClass("active");
                    $("#add_pro").attr("rel","active");
                    break;
                case "bus_pro":
                    $("#pro").addClass("active");
                    $("#pro").attr("rel","active");
                    $("#bus_pro").addClass("active");
                    $("#bus_pro").attr("rel","active");
                    break;
                case "add_rei":
                    $("#rei").addClass("active");
                    $("#rei").attr("rel","active");
                    $("#add_rei").addClass("active");
                    $("#add_rei").attr("rel","active");
                    break;
                case "bus_rei":
                    $("#rei").addClass("active");
                    $("#rei").attr("rel","active");
                    $("#bus_rei").addClass("active");
                    $("#bus_rei").attr("rel","active");
                    break;
                case "add_fam":
                    $("#fam").addClass("active");
                    $("#fam").attr("rel","active");
                    $("#add_fam").addClass("active");
                    $("#add_fam").attr("rel","active");
                    break;
                case "bus_fam":
                    $("#fam").addClass("active");
                    $("#fam").attr("rel","active");
                    $("#bus_fam").addClass("active");
                    $("#bus_fam").attr("rel","active");
                    break;
                case "add_api":
                    $("#api").addClass("active");
                    $("#api").attr("rel","active");
                    $("#add_api").addClass("active");
                    $("#add_api").attr("rel","active");
                    break;
                case "lis_api":
                    $("#api").addClass("active");
                    $("#api").attr("rel","active");
                    $("#lis_api").addClass("active");
                    $("#lis_api").attr("rel","active");
                    break;
                default:
                    break;
            }
        }
    </script>
</body>
</html>