<?php

require_once("../clases/beans/beans_post.php");
require_once '../src/facebook.php';


$app_id     = '267986736557175'; // Sustituimos las X por el ID de nuestra aplicación
$app_secret = '54ce85abc99195b65b4c9fcc0f4a2530'; // Sustituimos las X por el Secret de nuestra aplicación
//$token = 'CAADzu4Y8rHcBAFtnNjhtDcYwzNVfoFM4Hn20KXL1O0Mc3tZCPyOKzQwB6rZA9vktIrZBkpJSrPzrauNSSIoooCvDoNDZAkiSCZCXvNMp0mRrFCjl8ZBgMBtjpe3u0cq5z680mJ2cM0zcG7DtMQXugQcPUEtm9GFHgZD'; // ponemos nuestro token
$token = 'CAADzu4Y8rHcBAP6m6gHnJ3TrdGMXaH0FcvEZABJkt79JUDlbvlVuPvXIxE4s4JIdTIbbhPx0qvAscyXImMyAGn7e2gWaZCjq55VRZAvHInjcdLUWOdBxlZBmqPwfL1Kyk6BCD4DZCgBrQmK2WtKcA';
$facebook = new Facebook(array(
    'appId' => $app_id,
    'secret' => $app_secret,
    'cookie' => true
));



$titulo		=	$_GET["titulo"];
$descri		=	$_GET["descri"];
$catego		=	$_GET["catego"];

$obj_pos	=	new beans_post();

$sql_con	=	$obj_pos->agregarPost('1', $titulo, $descri, $catego);

if(is_numeric($sql_con['out_id'])){
    $url = "http://artesaniasheider.com/?mn=".$catego."#".$sql_con['out_id'];
    $req =  array(
        'access_token' => $token,
        'message' => $descri,
        'name' => $titulo,
        'link' => $url,
        'description' => $descri);

    $res = $facebook->api('/me/feed', 'POST', $req);
    
    
    echo 'OK|'.$sql_con['out_id'];
    
}else{
    var_dump($sql_con);
}



?>