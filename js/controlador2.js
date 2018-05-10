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
                '<div class="card">'+    
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
                '<div class="col-lg-1 col-1">'+
                    '<img src="img/usuario.png" class="img-fluid rounded-circle">'+
                '</div>'+
                '<div class="col-lg-9 col-9 ml-3">'+
                    '<input type="text" class="form-control" id="txt-comentario-publicacion-'+respuesta[i].codigo_publicacion+'">'+
                '</div>'+
                '<div class="col-lg-1 col-1 mt-1 ml-2">'+
                    '<button type="button" class="form-control-file btn btn-link" id="btn-enviar-comentario" onclick="enviarComentario('+respuesta[i].codigo_publicacion+')"><i class="fas fa-paper-plane" style="color:black;"></i> </button>'+
                '</div>'+
            '</div>'+
        '</div>'+
        '</div> <br>')
            }
            ;
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
        url:"ajax/api.php?accion=obtener-lista-chats",
        method: "get",
        data: parametros,
        dataType: "json",
        success:function(respuesta){
            for(var i=0;i<respuesta.length;i++){
                $("#div-chat").append(
                '<div id="div-chat-usuario-"'+respuesta[i].codigo_usuario_amigo+'>'+
                '<button class="row btn btn-toolbar mt-4 border pt-2 pb-2 no-gutters pr-5" id="contacto-chat">'+
                '<div class="col-lg-6 col-4 col-md-4">'+
                    '<img src="'+respuesta[i].url_imagen_perfil+'" class="img-fluid rounded-circle">'+
                '</div>'+
                '<div class="col-lg-3 col-4 col-md-4 pl-2 pr-5 mr-md-4">'+
                  ' <p><strong>'+respuesta[i].nombre_usuario+' '+respuesta[i].apellido_usuario+'/strong><br>'+
                '</div>'+
            '</button>'+
            '</div>');
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
    alert("Se ha guardado el empleo exitosamente");
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

$("body").on("click","#like",function(event){
     
    alert("Probando asignación");
     
});


