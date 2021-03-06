
$(document).ready(function(){

function campoRequerido(id){
    if(document.getElementById(id).value ==""){
        alert("Complete los campos vacion");
    }
}

function validar(){
	validarCampoVacio("txt-nombre");	
	validarCampoVacio("txt-apellido");	
	validarCampoVacio("txt-correo");	
}

function redireccion(){
    validarRedireccion("txt-correo");
    validarRedireccion("txt-contrasenia");
}


var validarCampoVacio = function(id){
	
	if (document.getElementById(id).value == ""){
		document.getElementById(id).classList.remove('is-valid');
		document.getElementById(id).classList.add('is-invalid');
	}
	else{
		document.getElementById(id).classList.remove('is-invalid');
		document.getElementById(id).classList.add('is-valid');
	}
};

var validarRedireccion = function(id){
    if (document.getElementById(id).value == ""){
        alert("El campo "+ id + " es necesario");
    }
    
    else{
        
    }
}

function validarContrasena(etiqueta){
	if (etiqueta.value.length<5) {
		etiqueta.classList.remove("is-valid");
		etiqueta.classList.add("is-invalid");
	}
	else{
		etiqueta.classList.remove("is-invalid");
		etiqueta.classList.add("is-valid");
	}
}

function validarEmail(email) {
    var patron = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if (patron.test(String(email.value).toLowerCase())){
    	email.classList.remove("is-invalid");
        email.classList.add("is-valid");
        return true;
    }
    else{
    	email.classList.remove("is-valid");
        email.classList.add("is-invalid");
        return false;
    }
}

var button = $("#btn-inicio-sesion").attr("disabled", true);

$("#txt-correo").change(function () {
    var valid = true;
    $.each($("#txt-correo"), function (index, value) {
        if(!$(value).val()){
           valid = false;
        }
    });
    if(valid){
        if($("#txt-correo").val().indexOf('@', 0) == -1 || $("#txt-correo").val().indexOf('.', 0) == -1) {
            return false;
        }

        else{
        $(button).attr("disabled", false);
        }
    } 
    else{
        $(button).attr("disabled", true);
    }
});

var button1 = $("#btn-registro").attr("disabled",true);
$("#txt-email").change(function () {
    var valid = true;
    $.each($("#txt-email"), function (index, value) {
        if(!$(value).val()){
           valid = false;
        }
    });
    if(valid){
        if($("#txt-email").val().indexOf('@', 0) == -1 || $("#txt-email").val().indexOf('.', 0) == -1) {
            return false;
        }

        else{
        $(button1).attr("disabled", false);
        }
    } 
    else{
        $(button1).attr("disabled", true);
    }
});

    $.ajax({
        url:"ajax/api.php?accion=obtener-lista-empleos",
        method: "get",
        dataType: "json",
        success:function(respuesta){
            for(var i=0; i<respuesta.length; i++){
                $("#div-empleos").append(
                    '<div class="col-lg-4 card-text border">'+
                    '<div class="row no-gutters">'+
                    '<div class="col-lg-6 pt-2">'+
                    '<img src="'+respuesta[i].url_imagen_empleo+'" class="img-fluid img-thumbnail">'+
                    '</div>'+
                    '<div class="col-lg-6 pl-2">'+
                    '<p class="pt-4">'+
                    '<strong>'+respuesta[i].nombre_empleo+'</strong>'+
                    '</p>'+
                    '</div>'+
                    '</div>'+
                    '<p class="text-justify pt-2">'+respuesta[i].descripcion_empleo+'</p>'+
                    '<div class="card-body text-center">'+
                    '<div class="list-group">'+
                    '<p>Numero de Telefono: '+respuesta[i].telefono_empleo+'</p>'+
                    '<p>Direccion: '+respuesta[i].direccion_empleo+'</p>'+
                    '<button type="button" class="btn btn-outline-primary" id="btn-guardar-empleo" onclick=guardarEmpleo('+respuesta[i].codigo_empleo+')>Guardar Empleo</button>'+
                    '</div>'+
                    '</div>'+
                    '</div>'
                );
            }
        },
        error:function(e){
            console.log(e);
        }
    });

    var parametros = "codigo_usuario=" + $("#txt-codigo-usuario").val();

    $.ajax({
        url: "ajax/api.php?accion=obtener-empleos-guardados",
        method:"get",
        data:parametros,
        dataType:"json",
        success:function(respuesta){
            for(var i=0;i<respuesta.length;i++){
                $("#div-empleos-guardados").append(
                '<div class="col-lg-4 card-text border">'+
                '<div class="row no-gutters">'+
                    '<div class="col-lg-6 pt-2">'+
                        '<img src="'+respuesta[i].url_imagen_empleo+'" class="img-fluid img-thumbnail">'+
                    '</div>'+
                    '<div class="col-lg-6 pl-2">'+
                        '<p class="pt-4">'+
                            '<strong>'+respuesta[i].nombre_empleo+'</strong>'+
                        '</p>'+
                    '</div>'+
                '</div>'+
                '<p class="text-justify pt-2">'+respuesta[i].descripcion_empleo+'</p>'+
                '<div class="card-body text-center">'+
                   '<div class="list-group">'+
                       '<p>Numero de Telefono: '+respuesta[i].telefono_empleo+'</p>'+
                       '<p>Direccion: '+respuesta[i].direccion_empleo+'</p>'+
                    '</div>'+
                '</div>'+
            '</div>');
            }
            
        },
        error:function(e){
            console.log(e);
        }
    });

    $.ajax({

    });
});

$("#btn-enviar").click(function(){
    var parametros ="contenido_mensaje="+$("#txt-mensaje").val() + "&" + "codigo_usuario=" + $("#txt-codigo-usuario").val();

    alert(parametros);

    if($("#txt-mensaje").val()==""){
        alert("No se puede enviar un mensaje vacio");
    }
    else{
    $.ajax({
        url: 'ajax/api.php?accion=insertar-mensaje',
        method:'POST',
        data: parametros,
        dataType: "json",
        success: function(respuesta){
            alert("Mensaje enviado exitosamente");
            $("#txt-mensaje").val('');
        },
        error: function(e){
            console.log(e);
        }
    });
    }
});

$("#btn-registro").click(function(){
    
    var parametros = "nombre=" + $("#txt-nombre").val() + "&" +
                     "apellido=" + $("#txt-apellido").val() + "&" + 
                     "correo=" + $("#txt-email").val() + "&" +
                     "genero=" + $("input:radio[name=rbt-genero]:checked").val() + "&" +
                     "contrasenia=" + $("#txt-contrasena").val();

    console.log(parametros);

    if($("#txt-nombre").val()=="" || $("#txt-apellido").val()=="" || $("#txt-email").val()=="" || $("#txt-contrasena").val()=="" || $("input:radio[name=rbt-genero]:checked").val()==""){
        alert("Hacen falta campos por llenar");
        location.reload();
    }
    else{
        $.ajax({
            url: "ajax/api.php?accion=insertar-usuario",
            method: "POST",
            data: parametros,
            dataType: "json",
            success:function(respuesta){
                alert("Se ha registrado el usuario");
                $("#txt-nombre").val("");
                $("#txt-apellido").val("");
                $("#txt-email").val("");
                $("input:radio[name=rbt-genero]").val("");
                $("#txt-contrasena").val("");

            },
            error:function(e){
                console.log(e);
            }
        });
    }
    
});

$("#btn-inicio-sesion").click(function(){
    var parametros = "correo="+$("#txt-correo").val()+"&contrasenia="+$("#txt-contrasenia").val();
    console.log(parametros);
    $.ajax({
        url:"ajax/log-in.php",
        method:"POST",
        data: parametros,
        dataType:"json",
        success:function(respuesta){
            console.log(respuesta);
            function redireccionarPagina(){
            if (respuesta.codigoResultado==0)
                window.location.href = "muro.php";
                $("#txt-correo").val("");
                $("#txt-contrasenia").val("");
            }
            $("#btn-inicio-sesion").attr("disabled", true);
            window.setTimeout( redireccionarPagina, 5000);
        },
        error:function(e){
            console.log(e);
        }
    });
});


$("#btn-post").click(function(){
    var parametros = "codUsr=" + $("#txt-codigo-usuario").val() + "&" +
                     "publicacion=" + $("#txta-publicar").val() + "&" +
                     "ubicacion=" + $("#txt-ubicacion").val();

    alert(parametros);
    if($("#txta-publicar").val()==""){
        alert("Hace falta contenido en la publicacion")
    }
    else{
        $.ajax({
            url:"ajax/api.php?accion=insertar-publicacion",
            method:"POST",
            data: parametros,
            dataType:"json",
            success:function(respuesta){
                console.log(respuesta);
                location.reload();
            },
            error:function(e){
                console.log(e);
            }
        });
    }
    
});

$("#btn-guardar-modal").click(function(){
    var parametros = "codigo_usuario=" + $("#txt-codigo-usuario").val() + "&" +
                     "url_imagen_perfil=" + $("#slc-imagen-perfil option:selected").val() + "&" +
                     "titular=" + $("#txta-titular-modal").val() + "&" +
                     "educacion=" + $("#txt-educacion-modal").val() + "&" +
                     "logro=" + $("#txt-logro-modal").val();

    console.log(parametros);

    $.ajax({
        url:"ajax/api.php?accion=actualizar-usuario",
        method: "post",
        data: parametros,
        dataType: "json",
        success:function(respuesta){
            alert("Se ha actualizado la informacion del usuario");
            location.reload();
        },
        error:function(e){
            console.log(e);
        }
    });

   
});

function guardarEmpleo(id){
    var parametros = "codigo_usuario=" + $("#txt-codigo-usuario").val() + "&" +
    "codigo_empleo=" + id;
    $.ajax({
    url: "ajax/api.php?accion=guardar-empleos",
    method: "POST",
    data: parametros,
    dataType:"json",
    success:function(respuesta){
    alert("Se ha guardado el empleo exitosamente");
    location.reload();
    },
    error: function(e){
    console.log(e);
    }
    });
}





