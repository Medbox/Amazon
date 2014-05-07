
<html>
    <head>

        <meta charset="utf-8" />
        <title>Sistema de Gestión, Control y Trazabilidad Apicola</title>
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="css/zice.style.css" rel="stylesheet" type="text/css" />
        <link href="css/icon.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="css/tipsy.css" media="all"/>
        <style type="text/css">
            html {
                background-image: none;
            }
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
        </style>
    </head>
    <body >

        <div id="alertMessage" class="error"></div>
        <div id="successLogin"></div>
        <div class="text_success"><img src="images/loader_green.gif"  alt="apinclude" /><span>Cargando..</span></div>

        <div id="login" >
            <div class="ribbon"></div>
            <div class="inner">
                <div  class="logo" ><img src="images/logo/logo_login.png" alt="apinclude" /></div>
                <div class="userbox"></div>
                <div class="formLogin">
                    <form name="formLogin"  id="formLogin" action="#">
                        <div class="tip">
                            <input name="username" type="text"  id="username_id"  title="Rut Usuario" required="required" autofocus="autofocus"/>
                        </div>
                        <div class="tip">
                            <input name="password" type="password" id="password"   title="Contraseña"  />
                        </div>
                        <div style="padding:20px 0px 0px 0px ;">
                            <div style="float:right;padding:2px 0px ;">
                                <div> 
                                    <ul class="uibutton-group">
                                        <li><a class="uibutton normal" href="#"  id="but_login" >Acceder</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
            <div class="clear"></div>
            <div class="shadow"></div>
        </div>

        <div class="clear"></div>
        <div id="versionBar" >
            <div class="copyright" > &copy; Copyright 2012  All Rights Reserved <span class="tip"><a  href="#" title="Apinclude" >Apinclude</a> </span> </div>
        </div>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery-jrumble.js"></script>
        <script type="text/javascript" src="js/jquery.ui.min.js"></script>     
        <script type="text/javascript" src="js/jquery.tipsy.js"></script>
        <script type="text/javascript" src="js/iphone.check.js"></script>
        <script type="text/javascript" src="js/login.js"></script>
        <script type="text/javascript"	src="js/jquery.Rut.js"></script>
        <script type="text/javascript"	src="js/jquery.Rut.min.js"></script>
        <script type="text/javascript" src="js/utilidades.js"></script>
        <script>
            $(document).ready(function() {
                $('#username_id').Rut({
                    on_success:function(){
                        showSuccess("RUT CORRECTO",500);  
                        return true;
                    },
                    on_error: function(){
                        showError("RUT INCORRECTO",900);
                        $('.inner').jrumble({
                            x: 4,
                            y: 0,
                            rotation: 0
                        });	
                        $('.inner').trigger('startRumble');
                        setTimeout('$(".inner").trigger("stopRumble")',500);
                        setTimeout('hideTop()',5000);
                        $('#username_id').val("");
                        $('#username_id').focus();
                        return false;
                    }
                });
            });
            
        </script>
    </body>
</html>