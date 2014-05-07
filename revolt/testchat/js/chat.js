var nick = "",
    length = 0,
    clientmsg = "";
$(document).ready(function(){
    
	//CARGAR CHAT CADA 0.5 SEGUNDOS
	setInterval (loadLog, 500);
	
	$('<audio id="audio"><source src="sonidos/sonido_notificacion.wav" type="audio/wav">, <source src="sonidos/sonido_notificacion.ogg" type="audio/ogg">, <source src="sonidos/sonido_notificacion.mp3" type="audio/mpeg"></audio>').appendTo("body");
    $('<div id="loginform"><form action="" method="post" id="nick"><p id="cerrar">X</p><p>Ingresa tu nick para continuar:</p><input type="text" name="name" id="name" class="inputext" placeholder="Ingrese nick..." autocomplete="off"><input type="submit" name="enter" id="enter" class="input" value="Entrar"></form></div>').appendTo("body");
    $('<div id="minichat">Intranet Chat<img src="images/mensaje.png"></div>').appendTo("body");
    
	
    $("#nick").submit(function(event){
        event.preventDefault();
        nick = $("#name").val();
        $("#name").val("");
        $.post("log.php", {name: nick});
        loadLog();
        $("#loginform").fadeOut("slow");
    });
    $('#chatbox,.text').click(function(){
        if(nick===""){
            $('#loginform').fadeIn("slow");
            $('#name').focus();
        }
        else {
            $.ajax({
                url: "log.php",
                data: 'consu=true',
                type: 'POST',
                success: function(html){
                    name=html;
                }
            });
            if(name===""){
                $('#loginform').fadeIn("slow");
                $('#name').focus();
            }
        }
    });
    $("#message").submit(function(){
        if (clientmsg !== $("#sendchat").val()) {
            clientmsg = $("#sendchat").val();
            $("#sendchat").val("");
            $.post("post.php", {text: clientmsg});
            $("#chatbox").slimScroll({ start: 'bottom' });
            return false;
        } else {
            $('<span class="spam">Sin Spamear eh!</span>').appendTo("#chat").fadeOut(2500);
            return false;
        }
    });
    
    $("#exit").click(function(){
        if (nick!=='') {
            var exit = confirm("Abandonar sala de chat?");
            if(exit===true){
                nick="";
                $.ajax({
                    url: "log.php",
                    data: 'logout=true',
                    type: 'GET',
                    success: function(html){		
                        $("#chatbox").html(html);				
                        $("#chatbox").slimScroll({ start: 'bottom' });
                    }
                });
            }
        }
    });
    $("#min").click(function(){
        $("#chat").css("display","none");
        $("#minichat").css("display","inherit");
        $("#loginform").css("display","none");
    });
    $("#minichat").click(function(){
        $("#minichat").css("display","none");
        $("#minichat img").css("display","none");
        $("#chat").css("display","inherit");
    });
    $("#cerrar").click(function(){
        $("#loginform").fadeOut();
    });
    $('#chatbox').slimScroll({
        height: '230px',
        size: '10px',
        position: 'right',
        color: '#fff',
        alwaysVisible: true,
        railVisible: true,
        railColor: 'rgba(160,11,15,1)',
        railOpacity: 1,
        allowPageScroll: false,
        wheelStep: 1,
        start: 'bottom'
    });

});

//-----------------------------------
// 			END READY
//-----------------------------------


function loadLog(){		
        $.ajax({
            url: "chat.html",
            cache: false,
            success: function(html){	
                $("#chatbox").html(html);
                $("#chatbox").slimScroll({ start: 'bottom' });
                if (length<html.length){
                    length=html.length;
                    $("#minichat img").stop().css("display","inherit").animate({width:"4.5%"},200).animate({width:"5%"},200);
                    $('#audio')[0].play();
                }
            }
        });
    }
