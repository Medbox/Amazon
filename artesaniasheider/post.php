<head>
    <meta property="fb:admins" content="1295118667,100001406147080"/>
</head>
<script src='http://connect.facebook.net/es_LA/all.js#xfbml=1&appId=267986736557175'></script>

<script>FB.XFBML.parse();</script>
<script src="js/jquery.rotate.js"></script>
<script src="js/script.js"></script>
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<style>

/********************************************************/
/*					INCLUDE POST						*/
/********************************************************/

.ver_post_galeria{
	position:absolute;
	width:600px;
	height:600px;
	/*background-color:#412e41;*/
	}
.ver_post_comentarios{
	position:absolute;
	margin-left:600px;
	padding-left:5px;
	width:395px;
	height:600px;
	background-color:#fff;
	}
.ver_post_cerrar{
	}

      
</style>
<?php

require_once("clases/beans/beans_post.php");
require_once("clases/beans/beans_fotos.php");
include("analyticstracking.php");

$obj_post = new beans_post();
$obj_fot  = new beans_fotos();

if(isset($_GET['post_id']) && $_GET['post_id'] > 0){
	
	$post_id	=	$_GET['post_id'];
        $cat_id		=	$_GET['cat_id'];
	
	$arr_post	=	$obj_post->listarPostId($post_id);
        $arr_fot        =       $obj_fot->listarFoto($post_id);
	
        
        echo "<div class='ver_post_galeria'>";
	
        echo "<div id='slideShowContainer'>";
	
        echo "<div id='slideShow'>";

        echo "<ul>";
        foreach($arr_fot as $var => $val){
            echo "<li><img src='".$val['fot_url']."' width='100%' height='100%' alt='Fish' class='foto'/></li>";
        }        
        echo "</ul>";

        echo "</div>";

        echo "<a id='previousLink' href='#'>&raquo;</a>";
        echo "<a id='nextLink' href='#'>&laquo;</a>";

        echo "</div>";
        
        
	echo "</div>";
	?>
    <div class="ver_post_comentarios">
    <div class="ver_post_cerrar">x</div>
	<fb:comments href='artesaniasheider.com/?mn=<?php echo $cat_id.'#'.$post_id; ?>' num_posts='10' width='390'></fb:comments>
    </div>
    <script type="text/javascript">
    </script>
<?php
}

?>