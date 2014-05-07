<?php
session_start();
if(isset($_SESSION['name'])){
    $existingText = file_get_contents("chat.html");
    $text = $_POST['text'];
    unlink("chat.html");
    $fp = fopen("chat.html", 'c');
    fwrite($fp, "\r<div class='msgln'><b>".$_SESSION['name']."</b>: ".stripslashes(htmlspecialchars($text))."<br></div>".$existingText);
    fclose($fp);
}
?>