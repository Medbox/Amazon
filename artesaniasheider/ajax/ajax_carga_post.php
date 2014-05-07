<?php
require_once("../clases/beans/beans_categorias.php");
require_once("../clases/beans/beans_post.php");
$obj_ctg	=	new beans_categorias();
$obj_pos    =   new beans_post();
$arr_ctg	=	$obj_ctg->listarCategorias();



	$menu = $_GET["id"];
    if(isset($menu)){
                    if($menu != 'add'){
                        $cat_id = $menu;
                        $arr_pos    =   $obj_pos->listarPostCategoria($cat_id);
                        if(isset($arr_pos) && is_array($arr_pos)){
                            foreach($arr_pos as $pos){
                                    $POS_ID		=	$pos['pos_id'];
                                    $POS_TIT	=	$pos['pos_titulo'];
                                    $POS_URL	=	$pos['fot_url'];

                                    echo "<div class='post' id='".$POS_ID."'>
                                            <div class='post_img'><img src='".$POS_URL."' style='height:220px; width:220px;'/></div>
                                            <div class='post_txt'>".$POS_TIT."</div>
                                      </div>";

                                    }
                            }			
                    }else{
                        include 'subir.php';
                    }
                    	
		}
?>