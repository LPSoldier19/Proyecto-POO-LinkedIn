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


$("#btn-enviar").click(function(){
    var parametros ="mensaje="+$("#txt-mensaje").val();

    alert(parametros);

    $.ajax({
        url: 'class/procesar.php',
        method:'POST',
		data:parametros,
        success: function(respuesta){
            $("#ul-chat").append(respuesta);
            $("#txt-mensaje").val('');
        }
    });
});

$("#btn-registro").click(function(){
    var parametros = "nombre=" + $("#txt-nombre").val() + "&" +
                     "apellido=" + $("#txt-apellido").val() + "&" + 
                     "correo=" + $("#txt-email").val() + "&" +
                     "contrasenia=" + $("#txt-contrasena").val();

    alert(parametros);
});

$("#btn-inicio-sesion").click(function(){
    var parametros = "correo=" + $("#txt-correo").val() + "&" +
                     "contrasenia=" + $("#txt-contrasenia").val();

    alert(parametros);
});

$("#btn-post").click(function(){
    var parametros = "post=" + $("#txta-publicar").val()

    alert(parametros);
});

$("#btn-guardar-modal").click(function(){
    var parametros = "nombre=" + $("#txt-nombre-modal").val() + "&" +
                     "apellido=" + $("#txt-apellido-modal").val() + "&" +
                     "titular=" + $("#txta-titular-modal").val() + "&" +
                     "educacion=" + $("#txt-educacion-modal").val() + "&" +
                     "pais=" + $("#slc-pais-modal").val() + "&" +
                     "sector=" + $("#slc-sector-modal").val();

    alert(parametros);
});

var button = $("#btn-inicio-sesion").attr("disabled", true);

$("#colorForm input.required").change(function () {
    var valid = true;
    $.each($("#colorForm input.required"), function (index, value) {
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
        $(button).click(function(){
            window.location.href='muro.html';
         });
        }
    } 
    else{
        $(button).attr("disabled", true);
    }
});

