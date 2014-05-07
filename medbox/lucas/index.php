<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>.: Lucas :.</title>
</head>
<body>

<style>
body{
	background-image:url(img/mc.jpg);
	background-position:center 0;
	background-size:100%;
	}
#wrap{
	width:900px;
	position:absolute;
	top:0;
	bottom:0;
	left:50%;
	margin-left:-450px;
	}
h1{
	color:#093;
	text-align:center;
	}
.cuadrado{
	width:500px;
	height:300px;
	background-color:#FFF;
	float:left;
	display:none;
	}
.blocked{
	width:500px;
	height:300px;
	background-color:#FFF;
	float:right;
	}
.titulo{
	background-color:#9C3;
	}
</style>

<div id="wrap">




<h1 class="titulo">Bienvenido</h1>

Escribe tu nombre:

<input type="text" id="nombre">

<button>lol xd</button>

<div style="clear:left; font-style:40px;"></div>

	<div class="cuadrado">
    	<h4>Casitas de Minecraft</h4>
        <br>
    	<a href="https://mega.co.nz/#!5AshxJwb!RCBcLz31_rtRNncwC8I8wUtustsWMUWFWx4V7T8c_9o" target="_blank">
        Casita 1
        </a>
    </div>
    
    <div class="blocked">
    	<h4>Personas No Admitidas</h4>
        <ul>
        	<li>Kmiliz</li>
        </ul>
    </div>




</div>

<script src="../js/jquery-1.9.1.min.js"></script>
<script>
$(document).ready(function(e) {
 
 $("button").click(function(){
	 
	 var nombre	=	($("#nombre").val()).toLowerCase();
	 
	 
	 if(nombre == ""){
		 alert("no tengo tiempo de bromas !");
		 $(".cuadrado").fadeOut();
		 }
	else{
		
		if(nombre == "kmiliz"){
			alert("NO ESTAS ADMITIDA KMILIZ!!  :3");
			$(".cuadrado").fadeOut();
			}
		else{
			alert("Hola "+nombre+" :D");
			$(".cuadrado").fadeIn();
			}
		}
		
	 });
 
});
</script>
</body>
</html>
