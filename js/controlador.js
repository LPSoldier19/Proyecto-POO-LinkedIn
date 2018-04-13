$("#btn-enviar").click(function(){
    var parametros ="mensaje="+$("#txt-mensaje").val()

    console.log(parametros);

    $.ajax({
        url: 'class/procesar.php',
        method:'POST',
		data:parametros,
        success: function(respuesta){
            $("#ul-chat").append(respuesta);
        }
    });
});