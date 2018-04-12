$( "#contacto-chat" ).click(function() {
    $("#msj-contactos").addClass('d-none d-lg-block');
    $("#msj-chat").removeClass('d-none d-lg-block');
});

$( "#msj-regresar" ).click(function() {
    $("#msj-contactos").removeClass('d-none d-lg-block');
    $("#msj-chat").addClass('d-none d-lg-block');
});