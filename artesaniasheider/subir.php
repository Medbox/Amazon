<?php 
    require_once 'clases/beans/beans_categorias.php';
    
    $obj_cat = new beans_categorias();
    $arr = $obj_cat->listarCategorias();
    


    $timestamp = time();

?>
<style>
    .formulario{
        width: 100%;
        height: 45px;
        float: left;
    }
    .titulo{
        width: 170px;
        float: left;
        line-height: 36px;
        color: #757575;
    }
    .input input{
        width: 300px;
        height: 30px;
        font-size: 20px;
        color: #919191;
        float: left;
    }
    .select{
        width: 305px;
        height: 30px;
        font-size: 16px;
        color: #919191;
        float: left;
    }
    .btn_agregar{
        width: 140px;
        height: 30px;
        padding: 2px 0px 2px 20px;
        background-color: #7BA849;
        line-height: 30px;
        margin-top: 10px;
        margin-bottom: 10px;
        color: #fff;
        cursor: pointer;
        
        float: left;
    }
    .contenedor{
        position: absolute;
        top: 60px;
        left: 60px;
        right: 60px;
        background-color: #fff;
    }
    .head{
        position: absolute;
        top:0;
        left: 0;
        right: 0;
        background-color: #FFF1A8;
        height: 40px;
        padding-left: 20px;
    }
    .head span{
        font-size: 20px;
        line-height: 40px;
        color: #858585;
    }
    
    .body{
        padding-left: 20px;
        padding-top:50px;
    }
    
    .span_foto{
        width: 170px;
        float: left;
        line-height: 36px;
        color: #757575;
    }
    .input_foto{
        width: 305px;
        font-size: 16px;
        color: #919191;
        float: left;
    }
    
</style>
<link rel="stylesheet" type="text/css" href="/css/uploadify.css"/>
<div class="contenedor">
    <div class="head">
        <span>AGREGAR NUEVO POST</span>
    </div>
    <div class="body">
        <div class="formulario">
            <div class="titulo"><span>TITULO</span></div>
            <div class="input"><input type="text" id="titulo"/></div>
        </div>
        <div class="formulario">
            <div class="titulo"><span>DESCRIPCION</span></div>
            <div class="input"><input type="text" id="descripcion"/></div>
        </div>
        
        <div class="formulario">
            <div class="titulo"><span>CATEGORIA</span></div>
            <select class="select" id="categoria">
                <option value=""> -- SELECCIONE CATEGORIA --</option>
                <?php
                if(is_array($arr)){
                    foreach($arr as $cat){
                            $CAT_ID	    =	$cat['cat_id'];
                            $CAT_DES	=	utf8_encode($cat['cat_denominacion']);
                            echo "<option value='".$CAT_ID."'>".$CAT_DES."</option>";
                            }
                    }
                ?>
            </select>
        </div>
        
        <div class="formulario">
            <div id="agragar_post" class="btn_agregar"><span>AGREGAR POST</span></div>
        </div>
        
        
        
        <input type="hidden" id="post_id"/>
        
        <form style="width: 100%; float: left;">
        		<div class="span_foto"><span >FOTO PORTADA</span></div>
                <div class="input_foto"><input id="foto_portada" name="foto_portada" type="file"/></div>
        </form>
        
        <form style="width: 100%;  float: left;">
        		<div class="span_foto"><span>MAS FOTOS</span></div>
                <div class="input_foto"><input id="mas_fotos" name="mas_fotos" type="file" multiple="true"/></div>
        </form>
    </div>
    
    
</div>






<script src="js/jquery-1.9.1.js"></script>
<script src="/js/jquery.uploadify.js" type="text/javascript"></script>
<script src="socket.io/lib/socket.io.js"></script>
<script>
$(document).ready(function() {
    
    
    
     /************PRUEBAS***********************/ 
     
     
     
    $('#foto_portada').uploadify({
            onSelect : function(){
                    if($("#post_id").val() == ''){
                       alert("Debe ingresar un Post");
                       $("#foto_portada").uploadify("cancel");
                    }
            },
            'multi'         : false,
            'formData'      : {
    			'timestamp' : '<?php echo $timestamp;?>',
    			'token'     : '<?php echo md5('unique_salt' . $timestamp);?>' 
    		},
    		'swf'           : 'uploadify.swf',
    		'uploader'      : 'ajax/ajax_agregar_caratula.php',
            'method'        : 'post',
            'width'         : '160',
            'onUploadStart' : function(file)
            {
                var post_id = $("#post_id").val() + "";
                var formData = {'post_id' : post_id}
                $('#foto_portada').uploadify("settings", "formData", formData);
            },
            'onUploadSuccess' : function(file, data, response) 
            {    
                if (response == "false")
                {
                    response = "error";
                }
                if(response == "true")
                {
                    response = "bien"
                }
                
                if(data == 'OK'){
                }else{
                    $("#foto_portada").uploadify("cancel");
                    alert(data);
                }
            }
    });
    $('#mas_fotos').uploadify({
            onSelect : function(){
                        if($("#post_id").val() == ''){
                           alert("Debe ingresar un Post");
                           $("#mas_fotos").uploadify("cancel");
                        }
                },
                'formData'      : {
        			'timestamp' : '<?php echo $timestamp;?>',
        			'token'     : '<?php echo md5('unique_salt' . $timestamp);?>' 
        		},
        		'swf'           : 'uploadify.swf',
    		'uploader'      : 'ajax/ajax_agregar_mas_fotos.php',
                'method'        : 'post',
                'width'         : '160',
                'onUploadStart' : function(file)
                {
                    var post_id = $("#post_id").val() + "";
                    var formData = {'post_id' : post_id}
                    $('#mas_fotos').uploadify("settings", "formData", formData);
                },
                'onUploadSuccess' : function(file, data, response) 
                {    
                    if (response == "false")
                    {
                        response = "error";
                    }
                    if(response == "true")
                    {
                        response = "bien"
                    }
                    
                    if(data == 'OK'){
                    }else{
                        $("#mas_fotos").uploadify("cancel");
                        alert(data);
                    }
                }
	});
	$("#agragar_post").click(function(){
            var titulo = $("#titulo").val();
            var descri = $("#descripcion").val();
            var categ  = $("#categoria").val();
            
            
            var form_url = "titulo="+titulo
                         +"&descri="+descri
                         +"&catego="+categ;
            $.ajax({
        	  url		:	"ajax/ajax_agregar_post.php",
        	  type		:	"GET",
        	  data		:	form_url,
        	  success	:	function(data){
        				  	var result	=	data.split('|');
                                                    var OK          =       result[0];
                                                    var id          =       result[1];
        					if(OK == "OK"){
                                $("#post_id").val(id);
        						alert("OK");
        						}
        					else{
        						alert(data);
        						}
        				  }
        	  });
            
        });
        
});


function limpiar(){
    $("#titulo").val() = '';
    $("#descripcion").val() = '';
    $("#categoria").val() = '';
    
}
</script>