<div id="alertMessage" class="error"></div>
<section class="sec_atenciones_hoy" id="add_usu">
    <div class="section_header"><span>Agregar Usuario</span></div>   
    <div class="section_body">
        <section id="add_user">
            <div class="section ">
                <label> Rut<small>Rut del Usuario</small></label>   
                <div> 
                    <input type="text" name="username" id="username_rut" class="medium" required="required" autofocus="autofocus">
                </div>
            </div>
            <div class="section ">
                <label> Nombres<small>Nombre Completo</small></label>   
                <div> 
                    <input type="text" class="large" name="f_required" id="nombres" onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>
            </div>
            <div class="section ">
                <label> Apellido Paterno<small>Apellido Paterno</small></label>   
                <div> 
                    <input type="text" class="large" name="f_required" id="f_required_apellidoPat" onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>
            </div>
            <div class="section ">
                <label> Apellido Materno<small>Apellido Materno</small></label>   
                <div> 
                    <input type="text" class="large" name="f_required" id="f_required_apellidoMat" onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>
            </div>
            <div class="section ">
                <label>Estado Usuario<small>Si estara activo el usuario</small></label>   
                <div> 
                    <input type="checkbox" id="online" name="online"   class="online"  value="1"   checked="checked" />
                </div>
            </div>
            <div class="section">
                <label>Tipo de Usuario <small>Pefil de permisos para el sistema</small></label>   
                <div>
                    <select id="rol" class="style-select"><option value="1">SUPERADMINISTRADOR</option><option value="2">ADMINISTRADOR</option><option value="3">APICULTOR</option></select>   
                </div>
            </div>
            <div class="section">
                <label> Direccion<small>Ciudad, Dirección</small></label>   
                <div> 
                    <input type="text" class="large" name="e_required" id="direccion" onkeyup="javascript:this.value=this.value.toUpperCase();">
                </div>
            </div>                    
            <div class="section last">
                <label> Contraseña<small>Clave secreta de acceso al sistema</small></label>   
                <div> 
                    <input type="password"  class="large" name="password" id="password">
                </div>
            </div>
            <div class="section last">
                <div style="margin-left: 5px">
                    <a class="bt download2 accent" id="btn_agregar_usu" href="#" style="">Agregar Usuario</a>
                </div>
            </div>
        </section>

    </div>
</section>
<section class="sec_atenciones_ultimas">
    <div class="section_header"><span>Ver Usuario</span></div>   
    <div class="section_body" id="seccion_list_usu">

    </div>
</section>

<script>
    $(document).ready(function() {
        carga_usu();
        $("a").live('click',function(){
            return false;
        });
        $('#username_rut').Rut({
            format_on: 'keyup',
            on_success:function(){
                showSuccess("RUT CORRECTO",500);  
                $('#nombres').focus();
            },
            on_error: function(){
                $('#username_rut').val("");
                $('#username_rut').focus();
                showError("RUT INCORRECTO",900);
                $('.inner').jrumble({
                    x: 4,
                    y: 0,
                    rotation: 0
                });	
                $('.inner').trigger('startRumble');
                setTimeout('$(".inner").trigger("stopRumble")',500);
                setTimeout('hideTop()',5000);
            }        
        });
        $(".online").iphoneStyle({  //  Custom Label 
            checkedLabel: "Activo",
            uncheckedLabel: "Desactivo ",
            labelWidth:'65px',
            onChange: function(){
                if($(".online").val() == 1){
                    $(".online").val("0"); 
                }else{
                    $(".online").val("1"); 
                }
            }
        });
        $("#btn_agregar_usu").click(function(){
            var rut             = $("#username_rut").val();
            var nombre          = $("#nombres").val();
            var apellido_pat    = $("#f_required_apellidoPat").val();
            var apellido_mat    = $("#f_required_apellidoMat").val();
            var estado          = $("#online").val();
            var tipo_usu        = $("#rol").val();
            var direccion       = $("#direccion").val();
            var clave           = $("#password").val();
            
            if(rut != '' && nombre != '' && apellido_pat != '' && apellido_mat != '' && estado != '' && tipo_usu != '' && clave != ''){
                var url             = "./ajax/ajax_usuarios.php?case=agregar_usuario";
                url             += "&rut="+rut;
                url             += "&nombres="+nombre;
                url             += "&apellidoPat="+apellido_pat;
                url             += "&apellidoMat="+apellido_mat;
                url             += "&estado="+estado;
                url             += "&tipo_usuario="+tipo_usu;
                url             += "&direccion="+direccion;
                url             += "&clave="+clave;
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(datos){
                        var dato = datos.split(',');
                        if(dato[1] == 0){
                            carga_usu();
                            limpiar();
                        }else{
                            alert(dato[2]);
                        }
                        
                    }
                });
            }else{
                alert("DEBE COMPLETAR TODOS LOS CAMPOS");
            }
             
        });
              
    });
    function limpiar(){
        $("#username_rut").val('');
        $("#nombres").val('');
        $("#f_required_apellidoPat").val('');
        $("#f_required_apellidoMat").val('');
        $("#rol").find("option[value='1']").attr("selected","selected"); 
        $("#direccion").val('');
        $("#password").val('');
    }
    function carga_usu(){
        $.ajax({
            type: "GET",
            url: "./ajax/ajax_usuarios.php?case=listar_usuarios",
            success: function(datos){
                $("#seccion_list_usu").html(datos);
            }
        });  
    }
</script>