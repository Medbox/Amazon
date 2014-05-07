<?php
require_once("class/Class.Game.php");
require_once("class/Class.Ficha.php");

$obj_game		=	new Game();
$arr_games		=	$obj_game->list_all();
$fun_id			=	$_SESSION['fun_id'];

$obj_ficha		=	new Ficha();
$arr_ficha		=	$obj_ficha->list_ficha(2,$fun_id);//1 ficha_id, 2 fun_id, 3 todos


?>

<div id="fi_left">


    <br><br>
    <input type="hidden" id="hi_fun_id" value="<?php echo $fun_id; ?>">
    
    <table align="center">
    	<tr><td colspan="2">Ingreso Nueva Ficha</td></tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr><td>Nombre del Programa</td><td><input type="text" id="ipt_nombre_programa" value=""></td></tr>
        <tr><td>Conductor</td><td><input type="text" id="ipt_conductor" value=""></td></tr>
        <tr><td>Bloque Contenido</td><td><input type="text" id="ipt_bloque_contenido" value=""></td></tr>
        <tr><td>Numero Programa</td><td><input type="text" id="ipt_numero_programa" value=""></td></tr>
        <tr><td>Juego</td><td><input type="text" id="ipt_juego" value=""><a href="#" id="mas_juegos">ADD</a></td></tr>
        <tr><td colspan="2"><input type="text" id="ipt_numero_programa" value="" style="width: 100%;"></td></tr>
        <tr><td>Linea Editorial</td><td><textarea rows="5" id="ipt_editorial"></textarea></td></tr>
        <tr><td>Programa</td><td><textarea rows="5" id="ipt_programa"></textarea></td></tr>
        <tr><td colspan="2">&nbsp;</td></tr>
        <tr><td colspan="2"><button id="btn_crear_ficha">Crear Ficha</button></td></tr>
    </table>

</div>

<div id="fi_right" style="overflow-y:scroll;">
<?php
echo "<pre>";
print_r($arr_ficha);
echo "</pre>";
?>
</div>