<div>
galeria
<?php
require_once("clases/beans/beans_comentario.php");

$item		=	$_GET['item'];
var_dump($item);
$obj_com	=	new beans_comentario();
$arr_com	=	$obj_com->listarComentarioPostId($item);

var_dump($arr_com);

?>
</div>
<div>comentarios</div>