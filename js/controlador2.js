$(document).ready(function(){
    var parametros = "codigo_usuario="+$("#txt-codigo-usuario").val();

    $.ajax({
        url:"ajax/api.php?accion=obtener-lista-publicaciones",
        method:"GET",
        data: parametros,
        dataType:"json",
        success:function(respuesta){
            for(var i=0;i<respuesta.length;i++){
                $("#div-publicaciones").append(
                '<div class="card" id="div-publicacion-'+respuesta[i].codigo_publicacion+'">'+    
                '<div class="card-header">'+
                '<div class="row">'+
                    '<div class="col-lg-2 col-2">'+
                        '<img src="'+respuesta[i].url_imagen_perfil+'" class="img-fluid rounded-circle">'+
                    '</div>'+
                    '<div class="col-lg-10 col-7">'+
                        '<p><strong>'+respuesta[i].nombre_usuario+' '+respuesta[i].apellido_usuario+'</strong><br>'+
                            ''+respuesta[i].titular+' <br>'+
                            ''+respuesta[i].fecha_publicacion+'<br>'+
                            ''+respuesta[i].ubicacion+''+
                        '</p>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="card-body">'+ respuesta[i].contenido_publicacion +'</div>'+
            '<div class="card-header">'+
            ''+respuesta[i].numero_likes+' recomendaciones'+
            '</div>'+
            '<div class="card-content border-top">'+
                '<div class="row no-gutters">'+
                    '<div class="col-lg-1 col-1" id="boton-input-text">'+
                        '<label class="btn btn-default btn-file fas fa-thumbs-up " id="like-logo">'+
                            '<button type="button" style="display: none;" class="form-control-file" id="like"></button>'+
                        '</label>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="card-footer">'+
            '<div class="row no-gutters pb-3">'+
                '<div class="col-lg-10 col-9 ml-3">'+
                    '<input type="text" class="form-control" id="txt-comentario-publicacion-'+respuesta[i].codigo_publicacion+'">'+
                '</div>'+
                '<div class="col-lg-1 col-1 mt-1 ml-2">'+
                    '<button type="button" class="form-control-file btn btn-link" id="btn-enviar-comentario" onclick="enviarComentario('+respuesta[i].codigo_publicacion+')"><i class="fas fa-paper-plane" style="color:black;"></i> </button>'+
                '</div>'+
                '<div id="div-comentarios"><input type="text" class="d-none" value="'+respuesta[i].codigo_publicacion+'" id="txt-codigo-publicacion"></div>'+
            '</div>'+
        '</div>'+
        '</div> <br>')
            }
        },
        error:function(e){
            console.log(e);
        }

    });


    $.ajax({
        url: "ajax/api.php?accion=obtener-lista-usuarios",
        method: "get",
        data: parametros,
        dataType: "json",
        success:function(respuesta){
            for(var i=0;i<respuesta.length;i++){
                $("#card-usuarios-red").append(
                    '<div class="col-lg-4 col-6 card-body border text-center">'+
                            '<img src="'+respuesta[i].url_imagen_perfil+'" class="img-fluid rounded-circle pt-2 pb-3">'+
                            '<h6><strong>'+respuesta[i].nombre_usuario+' '+respuesta[i].apellido_usuario+'</strong></h6>'+
                            '<p>'+respuesta[i].titular+'<br>'+
                            '<i class="fas fa-university fa-lg"></i> '+respuesta[i].educacion+'</p>'+
                            '<div class="card-body">'+
                            '<button class="btn btn-outline-primary btn-sm mb-3" id="btn-conectar" onclick=guardarUsuario('+respuesta[i].codigo_usuario+')>Conectar</button>'+
                            '</div>'+
                        '</div>');
            }
        },
        error:function(e){
            console.log(e);
        }

    });
   
    $.ajax({
        url: "ajax/api.php?accion=obtener-usuarios-guardados",
        method:"get",
        data:parametros,
        dataType:"json",
        success:function(respuesta){
            for(var i=0;i<respuesta.length;i++){
                $("#div-usuarios-guardados").append(
                    '<div class="col-lg-4 col-6 card-body border text-center">'+
                            '<img src="'+respuesta[i].url_imagen_perfil+'" class="img-fluid rounded-circle pt-2 pb-3">'+
                            '<h6><strong>'+respuesta[i].nombre_usuario+' '+respuesta[i].apellido_usuario+'</strong></h6>'+
                            '<p>'+respuesta[i].titular+'<br>'+
                            '<i class="fas fa-university fa-lg"></i> '+respuesta[i].educacion+'</p>'+
                    '</div>');
            }
        },
        error:function(e){
            console.log(e);
        }
    });

    $.ajax({
        url: "ajax/api.php?accion=obtener-lista-chat",
        method:"get",
        data:parametros,
        dataType:"json",
        success:function(respuesta){
            for(var i=0;i<respuesta.length;i++){
                $("#div-chat").append(
                    '<button class="col-lg-12 col-6 card-body border text-center mt-2" onclick=cambiarChat('+respuesta[i].codigo_usuario_amigo+')>'+
                            '<div class="row">'+
                            '<div class="col-lg-4">'+
                            '<img src="'+respuesta[i].url_imagen_perfil+'" class="img-fluid rounded-circle">'+
                            '</div>'+
                            '<div class="col-lg-6 mt-2">'+
                            '<h6 clas=""><strong>'+respuesta[i].nombre_usuario+' '+respuesta[i].apellido_usuario+'</strong></h6>'+
                            '<input class="d-none" type="text" id="txt-codigo-usuario-amigo-'+respuesta[i].codigo_usuario_amigo+'" value="'+respuesta[i].codigo_usuario_amigo+'">'+
                            '</div>'+
                            '</div>'+
                    '</button>');
            }
        },
        error:function(e){
            console.log(e);
        }
    });

    var parametrosCom = "codigo_usuario=" + $("#txt-codigo-usuario").val() + "codigo_publicacion=" + $("#txt-codigo-publicacion").val();

        $.ajax({
            url:"ajax/api.php?accion=obtener-lista-comentarios",
            method:"get",
            data: parametrosCom,
            dataType: "json",
            success:function(respuesta){
                for(var i=0;i<respuesta.length;i++){
                    $("#div-comentarios").append(
                        '<div class="row no-gutters mt-3" id="div-comentario">'+
                        '<div class="col-lg-1 col-1">'+
                        '<img src="'+respuesta[i].url_imagen_perfil+'" class="img-fluid rounded-circle">'+
                        '</div>'+
                        '<div class="col-lg-10 col-9 ml-3">'+
                        '<h6><strong>'+respuesta[i].nombre_usuario+' '+respuesta[i].apellido_usuario+'</stron></h6>'+
                        '<p class="mt-2">'+respuesta[i].contenido_comentario+
                        '<br>'+'<small>'+respuesta[i].fecha_comentario+'</small>'+
                        '</p>'+
                        '</div>'+
                        '</div>'
                    )
                }
                console.log(respuesta);
            },
            error:function(e){
                console.log(e);
            }
        });
    

    

});

function guardarUsuario(id){
    var parametros = "codigo_usuario=" + $("#txt-codigo-usuario").val() + "&" +
    "codigo_usuario_guardar=" + id;
    $.ajax({
    url: "ajax/api.php?accion=guardar-usuario",
    method: "POST",
    data: parametros,
    dataType:"json",
    success:function(respuesta){
    alert("Se ha conectado con el usuario exitosamente");
    location.reload();
    console.log(respuesta);
    },
    error: function(e){
    console.log(e);
    }
    });

    $.ajax({
        url: "ajax/api.php?accion=guardar-usuario-contrario",
        method: "POST",
        data: parametros,
        dataType:"json",
        success:function(respuesta){
        console.log(respuesta);
        },
        error: function(e){
        console.log(e);
        }
        });
}

function enviarComentario(id){
    
    var x = document.getElementById('txt-comentario-publicacion-'+id).value;
    
    var parametros = "comentario=" + x + "&" +
                     "codigo_usuario=" +  $("#txt-codigo-usuario").val() + "&" +
                     "codigo_publicacion=" + id;
    
    console.log(parametros);


    if(document.getElementById('txt-comentario-publicacion-'+id).value==""){
        alert("No ha escrito ningun comentario");
    }
    else{
    $.ajax({
        url: "ajax/api.php?accion=insertar-comentario",
        method: "post",
        data: parametros,
        dataType: "json",
        success:function(respuesta){
            console.log(respuesta);
            alert("Se ha añadido el comentario");
        },
        error:function(e){
            console.log(e);
        }
    });
    }
}

function cambiarChat(id){
    var x = document.getElementById('txt-codigo-usuario-amigo-'+id).value;

    var parametros = "codigo_usuario_amigo=" + x + "&" + "codigo_usuario=" + $("#txt-codigo-usuario").val();

    alert(parametros);

    $.ajax({
        url: "ajax/api.php?accion=obtener-lista-mensajes",
        method: "GET",
        data: parametros,
        dataType: "json",
        success:function(respuesta){
            for(var i=0;i<respuesta.length;i++){
                $("#div-chat").html(
                '<header class="card-header mb-5" style="background-color:#2B3E4A;" >'+
                '<div class="row">'+
                    '<div class="col-lg-1 col-1 mr-3 d-lg-none">'+
                        '<button class="btn btn-link" style="color:white;" id="msj-regresar"><i class="fas fa-arrow-circle-left fa-lg"></i></button>'+
                    '</div>'+
                    '<div class="col-lg-6 col-6 ">'+
                        '<h5 style="color:white;">'+respuesta[i].nombre_usuario+' '+respuesta[i].apellido_usuario+'</h5>'+
                    '</div>'+
                '</div>'+
            '</header>'+
            '<div id="scrollbar" style="">'+
            '<ul id="ul-chat" class="mt-4 ml-5">'+
            '<li style="width:100%">'+
                 '<div class="msj macro">'+
                    '<div class="text text-l">'+
                            '<p>'+respuesta[i].contenido_mensaje+'</p>'+
                            '<p><small>'+respuesta[i].fecha_mensaje+'</small></p>'+
                    '</div>'+
                    '<div class="avatar"> <img class="rounded-circle" style="width:100%;" src="'+respuesta[i].url_imagen_perfil+'" /></div>'+
                '</div>'+
            '</li>'+
         '</ul>'+
        '</div>');
            }
            console.log(respuesta);

        },
        error:function(e){
            console.log(e);
        }
    });
}



