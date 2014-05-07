<?php

require_once 'src/facebook.php'; //Esto llama a la carpeta con el parse que nos descargamos antes

$app_id     = '267986736557175'; // Sustituimos las X por el ID de nuestra aplicación
$app_secret = '54ce85abc99195b65b4c9fcc0f4a2530'; // Sustituimos las X por el Secret de nuestra aplicación
$token = 'CAADzu4Y8rHcBAA3GSGWBmt5hWhLXp6XQzif8Wy3snd7Kr1RKdacrYFHjqVEVzeROwKmxh44CRzExDZAlUx1ZBjCz765aCx6Uuf7EZAEZAh9O4tRTFZBP2KS5S86zXwt1ZANGQPxbBC6nKBKgLZAPlPVYrRCCVLSKsZBe5NokNiooUS0eQrlhv6Wjf3rdi1BWvgmd01Xv0fnwdwZDZD'; // ponemos nuestro token

$facebook = new Facebook(array(
    'appId' => $app_id,
    'secret' => $app_secret,
    'cookie' => false
));
$req =  array(
    'access_token' => $token,
    'message' => 'Mensaje de prueba con enlace',
    'name' => 'Tutorial de aplicación para facebook',
    'link' => 'http://el-internauta-de-leon.blogspot.com.es/2012/12/como-publicar-en-facebook-como-pagina.html',
    'description' => 'Tutorial de minipunk para aplicación en facebook');

$res = $facebook->api('/me/feed', 'POST', $req);

?>


