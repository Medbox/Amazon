<?php
session_start();
if(isset($_SESSION['fun_nom'])){    
	$existingText	=	file_get_contents("chat.html");
    $mensaje		=	$_POST['mensaje'];
    unlink("chat.html");
    $fp = fopen("chat.html", 'c');
    fwrite($fp, "\r<div class='msgln'><b>".$_SESSION['fun_nom']."</b>: ".stripslashes(htmlspecialchars($mensaje))."<br></div>".$existingText);
    fclose($fp);
}
?>