$(document).ready(function(){
    var parametros = "codigo_usuario="+$("#txt-codigo-usuario").val();
    console.log(parametros);

    $.ajax({
        url:"ajax/api.php?accion=obtener-lista-publicaciones",
        method:"GET",
        data: parametros,
        dataType:"json",
        success:function(respuesta){
            var publicacion = ""
            for(var i=0;i<respuesta.length;i++){
                publicacion += '<div class="card-header">'+
                '<div class="row">'+
                    '<div class="col-lg-2 col-2">'+
                        '<img src="'+respuesta[i].url_imagen_perfil+'" class="img-fluid rounded-circle">'+
                    '</div>'+
                    '<div class="col-lg-6 col-7">'+
                        '<p><strong>'+respuesta[i].nombre_usuario+' '+respuesta[i].apellido_usuario+'</strong><br>'+
                            ''+respuesta[i].titular+' <br>'+
                            ''+respuesta[i].fecha_publicacion+''+
                        '</p>'+
                    '</div>'+
                '</div>'+
            '</div>'+
            '<div class="card-body">'+
            respuesta[i].contenido_publicacion +
            '</div>'+
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
            '</div>'
            }
            $("#div-publicaciones").html(publicacion);
        },
        error:function(e){
            console.log(e);
        }

    });

})