$(document).ready(function () {	
    $('#login').show().animate({
        opacity: 1
    }, 2000);
    $('.logo').show().animate({
        opacity: 1,
        top: '40%'
    }, 800,function(){			
        $('.logo').show().delay(1200).animate({
            opacity: 1,
            top: '8%'
        }, 300,function(){
            $('.formLogin').animate({
                opacity: 1,
                left: '0'
            }, 300);
            $('.userbox').animate({
                opacity: 0
            }, 200).hide();
        });		

    })	
    $(".on_off_checkbox").iphoneStyle();
    $('.tip a ').tipsy({
        gravity: 'sw'
    });
    $('.tip input').tipsy({
        trigger: 'focus', 
        gravity: 'w'
    });
});	
$('.userload').click(function(e){
    $('.formLogin').animate({
        opacity: 1,
        left: '0'
    }, 300);			    
    $('.userbox').animate({
        opacity: 0
    }, 200,function(){
        $('.userbox').hide();				
    });
});
	    
$('#but_login').click(function(e){

    var rut = $("#username_id").val();
    var clave = $("#password").val();
    if(document.formLogin.username.value == "" || document.formLogin.password.value == "")
    {
        showError("Por favor Ingrese RUT / CONTRASEÑA",100);
        $('.inner').jrumble({
            x: 4,
            y: 0,
            rotation: 0
        });	
        $('.inner').trigger('startRumble');
        setTimeout('$(".inner").trigger("stopRumble")',500);
        setTimeout('hideTop()',5000);
        $('#username_id').val("");
        $('#password').val("");
        $('#username_id').focus();
        return false;
    }
    $.ajax({
        type: "GET",
        url: "./ajax/login.php?rut="+rut+"&clave="+clave,
        success: function(datos){
            //alert(datos);
            var bien = datos.split("|");
            if(bien[1] == "bien"){
                nombre = "datos";
                hideTop();
                loading('Checking',1);		
                setTimeout( "unloading()", 2000 );
                setTimeout( "Login()", 2500 );
                return true;
            }else{
                showError("Por favor Ingrese RUT y CONTRASEÑA Correcto", 100);
                $('.inner').jrumble({
                    x: 4,
                    y: 0,
                    rotation: 0
                });	
                $('.inner').trigger('startRumble');
                setTimeout('$(".inner").trigger("stopRumble")',500);
                setTimeout('hideTop()',5000);
                $('#username_id').val("");
                $('#password').val("");
                $('#username_id').focus();
                return false;
            }
        }
    });
    
});	

		
																 
function Login(){
	
    $("#login").animate({
        opacity: 1,
        top: '49%'
    }, 200,function(){
        $('.userbox').show().animate({
            opacity: 1
        }, 500);
        $("#login").animate({
            opacity: 0,
            top: '60%'
        }, 500,function(){
            $(this).fadeOut(200,function(){
                $(".text_success").slideDown();
                $("#successLogin").animate({
                    opacity: 1,
                    height: "200px"
                },500);   			     
            });							  
        })	
    })	
    setTimeout( "window.location.href='?o=inicio'", 3000 );
}


	
$('#alertMessage').click(function(){
    hideTop();
});

function showError(str, delay){
    $('#alertMessage').removeClass('success info warning').addClass('error').html(str).stop(true,true).show().animate({
        opacity: 1,
        right: '10'
    }, 200,function(){
        $(this).delay(delay).animate({
            opacity: 0,
            right: '-20'
        }, 200,function(){
            $(this).hide();
        });																														   																											
    });	
	
}

function showSuccess(str, delay){
    $('#alertMessage').removeClass('error info warning').addClass('success').html(str).stop(true,true).show().animate({
        opacity: 1,
        right: '10'
    }, 300,function(){
        $(this).delay(delay).animate({
            opacity: 0,
            right: '-20'
        }, 200,function(){
            $(this).hide();
        });																														   																											
    });
	
}

function hideTop(){
    $('#alertMessage').animate({
        opacity: 0,
        right: '-20'
    }, 500,function(){
        $(this).hide();
    });	
}	
function loading(name,overlay) {  
    $('body').append('<div id="overlay"></div><div id="preloader">'+name+'..</div>');
    if(overlay==1){
        $('#overlay').css('opacity',0.1).fadeIn(function(){
            $('#preloader').fadeIn();
        });
        return  false;
    }
    $('#preloader').fadeIn();	  
}
function unloading() {  
    $('#preloader').fadeOut('fast',function(){
        $('#overlay').fadeOut();
    });
}
