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
        //return  false;
    }
    $('#preloader').fadeIn();	  
}
function unloading() {  
    $('#preloader').fadeOut('fast',function(){
        $('#overlay').fadeOut();
    });
}

function ocultarLoader(){
    $('#overlay,#preloader').fadeOut('fast');
}
function mostrarLoader(){
    $('#overlay,#preloader').fadeIn('fast');
}
