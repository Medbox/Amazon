<?php
session_start();

//--------------------------------------------------------------------------
//PARECIERA QUE ESTO CONSULTA POR EL SESSION[name] Y SIMPLEMENTE LO IMPRIME
//--------------------------------------------------------------------------
if(isset($_POST['consu'])){
    
	if(isset($_SESSION['name'])){
        print($_SESSION['name']);
    }
    else print("");
}
//--------------------------------------------------------------------------


if(isset($_POST['name'])){
    if($_POST['name'] != ""){
            $_SESSION['name'] = stripslashes(htmlspecialchars($_POST['name']));
    }
}


//--------------------------------------------------------------------------
//			LOGOUT
//--------------------------------------------------------------------------
if(isset($_GET['logout'])){	
    $existingText = file_get_contents("chat.html");
    unlink("chat.html");
    $fp = fopen("chat.html", 'c');
    fwrite($fp, $existingText."<br><div class='msgln'><i>Usuario ". $_SESSION['name'] ." ha dejado el chat.</i></div>");
    fclose($fp);
    session_destroy();
}
//--------------------------------------------------------------------------


?>