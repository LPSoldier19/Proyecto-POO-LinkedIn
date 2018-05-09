$(document).ready(function(){
    var parametros = "codigo_usuario="+$("#txt-codigo-usuario").val();
    console.log(parametros);

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
                            '<input type="button" style="display: none;" class="form-control-file" id="like">'+
                        '</label>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="card-footer">'+
            '<div class="row no-gutters pb-3">'+
                '<div class="col-lg-1 col-1">'+
                    '<img src="img/usuario.png" class="img-fluid rounded-circle">'+
                '</div>'+
                '<div class="col-lg-9 col-9 ml-2">'+
                    '<input type="text" class="form-control" id="txt-comentario">'+
                '</div>'+
                '<div class="col-lg-1 col-1 mt-1">'+
                    '<label class="btn btn-default btn-file fas fa-paper-plane">'+
                        '<input type="button" style="display: none;" class="form-control-file" id="btn-enviar-comentario">'+
                    '</label>'+
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
                            '<button class="btn btn-outline-primary btn-sm mb-3">Conectar</button>'+
                            '</div>'+
                        '</div>');
            }
        },
        error:function(e){
            console.log(e);
        }

    });

})