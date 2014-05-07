<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta property="fb:admins" content="1295118667,100001406147080"/>
        <title>.: Artesanias Heider :.</title>

        <link rel="stylesheet"	type="text/css" 	href="css/fonts.css" >
        <link rel="stylesheet"	type="text/css" 	href="css/loader.css" >

        <link rel="image_src"	type="image/png"	href="img/logo.png" />
        <link rel="icon" 		type="image/png"	href="img/logo_icon.png">

        <style>
            html, body{
                margin:0;
                padding:0;
                background-color:#94668a;
                font-family:OpenSansLight, Arial;
                background-image:url(img/bg.png);
                background-position:center;
                background-attachment:fixed;
            }
            #wrap{
                position:absolute;
                width:1000px;
                height:auto;
                left:50%;
                margin-left:-500px;
                top:0px;
                bottom:0px;
            }
            aside{
                position:absolute;
                width:250px;
                left:0px;
                top:0px;
                bottom:0px;
                background-color:#1f2428;
            }
            section{
                position:absolute;
                width:auto;
                left:250px;
                right:0px;
                top:0px;
                bottom:0px;
                padding:10px 0px 30px 10px;
                background-color:#f5f5f5;
                overflow-y:scroll;
            }
            #logo{
                height:125px;
                background-color:#1b1f22;
                background-image:url(img/logoweb.png);
            }
            menu{
                margin:0;
                padding:0;
                position:absolute;
                width:250px;
                background-color:#1f2428;
                top:125px;
                bottom:0px;
            }
            .menu_title{
                color:#FFF;
                font-family:OpenSansRegular, Arial;
                font-size:1em;
                margin-top:20px;
                margin-bottom:15px;
            }
            .menu_title > span{
                margin-left:30px;
            }
            .menu_item{
                display:block;
                text-decoration:none;
                color:#aab8b9;
                font-size:0.9em;
                height:28px;
                line-height:28px;
            }
            .menu_item:hover{
                background-color:#32383d;
            }
            .menu_item > span{
                margin-left:50px;
            }
            .menu_item_selected{
                display:block;
                text-decoration:none;
                color:#ffffff;
                font-size:0.9em;
                height:28px;
                line-height:28px;
                background-color:#32383d;
            }
            .menu_item_selected > span{
                margin-left:50px;
            }

            /********************************************************/
            /*					SECCION POST						*/
            /********************************************************/

            .post{
                width:220px;
                height:270px;
                float:left;
                margin:15px 0px 0px 15px;
                background-color:#FFF;
                border-radius:3px;
            }
            .post_img{
                width:220px;
                height:220px;
                background-color:#FC6;
                border-radius:3px;
            }
            .post_img > img{
                -webkit-clip-path: rectangle(0px, 0px, 220px, 220px, 3px, 3px);
            }
            .post_txt{
                color:#333;
                width: 206px;
                /*background-color:#F63;*/
                font-family:OpenSansRegular, Arial;
                height: 36px;
                font-size: 0.8em;
                margin-left: 7px;
                margin-top: 7px;
            }



        </style>
        <link rel="stylesheet"	type="text/css" 	href="css/adaptative.css" >
        <link rel="stylesheet"	type="text/css" 	href="css/modal.css" >

    </head>
    <body>

        <?php
        require_once("clases/beans/beans_categorias.php");
        require_once("clases/beans/beans_post.php");
        $obj_ctg = new beans_categorias();
        $obj_pos = new beans_post();
        $arr_ctg = $obj_ctg->listarCategorias();


        $menu = isset($_GET['mn']) ? $_GET['mn'] : "";
        ?>

        <div id="loader">
            <div class="loader_msg">
                <div class="loader_img"><img src="img/cargando.gif" width="16" height="16"  alt=""/></div>
                <div class="loader_txt">Cargando...</div>
            </div>
        </div>

        <div id="overlay">
            <div id="modal" class="modal_hidden"><!--900 600--></div>
        </div>


        <input type="hidden" id="cat_id" value="<?php echo $menu; ?>" />

        <div id="wrap">
            <aside>
                <div id="logo"></div>
                <menu>
                    <div class="menu_title"><span>Categorias</span></div>
<?php
if (isset($arr_ctg) && is_array($arr_ctg)) {
    foreach ($arr_ctg as $ctg) {
        $CAT_ID = $ctg['cat_id'];
        $CAT_DEN = $ctg['cat_denominacion'];

        $CAT_MN = $menu == $CAT_ID ? "menu_item_selected" : "menu_item";

        echo "<a class='" . $CAT_MN . "' href='?mn=" . $CAT_ID . "' id='" . $CAT_ID . "'><span>" . $CAT_DEN . "</span></a>";
    }
}
?>     
                    <div class="menu_title"><span>Administracion</span></div>
                    <?php
                    $class = $menu == 'add' ? "menu_item_selected" : "menu_item";
                    echo "<a class='" . $class . "' href='?mn=add'><span>Agregar Post</span></a>";
                    ?>

                </menu>

            </aside>

            <section id="cont_post">

<?php
if (isset($menu)) {
    if ($menu != 'add') {
        $cat_id = $menu;
        $arr_pos = $obj_pos->listarPostCategoria($cat_id);
        if (isset($arr_pos) && is_array($arr_pos)) {
            foreach ($arr_pos as $pos) {
                $POS_ID = $pos['pos_id'];
                $POS_TIT = $pos['pos_titulo'];
                $POS_URL = $pos['fot_url'];

                echo "<div class='post' id='" . $POS_ID . "'>
                                            <div class='post_img'><img src='" . $POS_URL . "' style='height:220px; width:220px;'/></div>
                                            <div class='post_txt'>" . $POS_TIT . " [" . $POS_ID . "]</div>
                                      </div>";
            }
        }
    } else {
        include 'subir.php';
    }
}
?>

            </section>
        </div>

        <script src="js/jquery-1.9.1.js"></script>
        <script src="js/jquery.uploadify.js" type="text/javascript"></script>
        <script src='http://connect.facebook.net/es_LA/all.js#xfbml=1&appId=267986736557175'></script>



        <script>

            $(document).ready(function(e) {
    
    
    
    
                var p = window.location.hash;
    
                if(p.length > 1){
                    var split_ = p.split("#");
                    ver_post(split_[1]);
                }
    
    
    
                $("#loader").fadeOut("fast");

                $(".menu_item").click(function(){
                    $("#loader").fadeIn("fast");
                });
	
                $("section").on("click",".post",function(){
                    ver_post(this.id);
                    FB.XFBML.parse();
                });
                $("#overlay:not(#modal)").click(function(e){
                    var cat_id = $("#cat_id").val();
                    if($(e.target).is('#modal,.ver_post_galeria,.ver_post_comentarios,#slideShowContainer,#slideShow,.foto,.con_li')){
                        e.preventDefault();
                    }
                    else{
                        $("#overlay").fadeOut("fast");
                        $("#modal").removeClass("modal_active").addClass("modal_hidden").html("");
						
                        var url = window.location.hash;
                        var p   = url.split("#");
                        history.replaceState(p[1], p[1], '?mn='+cat_id);		
                    }

                });
		
            });

            function ver_post(post_id){
                var cat_id = $("#cat_id").val();
                $("#overlay").fadeIn("fast");
                $("#modal").load("post.php?post_id="+post_id+"&cat_id="+cat_id).removeClass("modal_hidden").addClass("modal_active");
                var p = window.location.hash;
                if(p.length < 1){
                    history.pushState(post_id, post_id, "#"+post_id);
                }
    
            }
            /*function refresh_post(id_post){
                $("#overlay").fadeIn("fast");
                $("#modal").load("item.php?item="+id_post).removeClass("modal_hidden").addClass("modal_active");
                }*/

        </script>

    </body>
</html>