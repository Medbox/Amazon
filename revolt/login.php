<?php
session_start();
session_destroy();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>.: Revolt :.</title>
<link href="css/fonts.css" rel="stylesheet" type="text/css">
<link href="css/login.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="login_box">
	<div id="login_header">"Welcome... to the real world"</div>
    <div id="login_body">
    	<div id="login_logo"></div>
        <input id="login_user" type="text" placeholder="- Username -">
        <input id="login_pass" type="password" placeholder="- Password -">
    </div>
    <div id="login_footer">
    	<div id="login_submit">INGRESAR</div>
    </div>
</div>
<script type="text/javascript" src="plugins/jquery-ui/jquery-1.9.1.js"></script>
<script>
$(document).ready(function(e){
	
	
	$("#login_user,#login_pass").keyup(function(e){
		if(e.keyCode == 13){
			login_request();
			$("#login_submit").css({"background-color":"#2d3c63"});
			setInterval(function(){
					$("#login_submit").css({"background-color":"#405a9c"});
					},500);
			}
		});
		
	$("#login_submit").click(function(){
		login_request();
		});
    
});

function login_request(){
	var user	=	$("#login_user").val();
	var pass	=	$("#login_pass").val();
	if(user != "" && pass != ""){		
		$.ajax({
				url		:	"ajax/ajax_login_request.php",
				type	:	"POST",
				data	:	"user="+user+"&pass="+pass,
				success	:	function(data){
							console.log(data);
							if(data == "OK"){
								window.location.href = "index.php";
								}
							else{
								alert(data);
								}
							}
				});		
		}
	else{
		return false;
		}
	}

</script>
</body>
</html>