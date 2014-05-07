<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta content="text/html; charset=utf-8" http-equiv="content-type">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Chat REvolt Games</title>
        <link rel="stylesheet" href="css/estilo.css" type="text/css">
        <script type="text/javascript" src="js/jquery.js"></script><!--No es necesario si ya tienes cualquier librer�a de jquery inclu�da-->
        <script type="text/javascript" src="js/jquery.slimscroll.min.js"></script>
        <script type="text/javascript" src="js/chat.js"></script>
    </head>
    <body>
        <!-- INICIO
            ac� comienza el c�digo del chat a copiar
            debe ir en el <body>, fuera de cualquier otro <div> u contenedor
            Est� pensado para ir en un archivo php con sesi�n iniciada-->
        <div id="chat">
           <div class="title" id="min">
               <span>Intranet Chat</span>
               <div id="exit"><img src="images/minimiza.png"></div>
           </div>
           <div id="chatbox"></div>
           <div class="text">
               <form id="message" name="message" action="">
                   <input type="text" id="sendchat" value="" placeholder="Ingrese texto..." required autocomplete="off">
               </form>
           </div>
       </div>
        <?php
        if(isset($_SESSION['name'])){
            print("<script type='text/javascript'>nick='".$_SESSION['name']."';</script>");
        }
        ?>
        <!--final del c�digo del chat a copiar
            FIN-->
    </body>
</html>