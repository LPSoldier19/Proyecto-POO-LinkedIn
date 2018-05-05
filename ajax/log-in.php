<?php
    session_start();
    include("../class/class-conexion.php");
    $conexion = new Conexion();
    $sql = sprintf( 
        "SELECT codigo_usuario, correo, contrasena FROM tbl_usuarios WHERE correo = '%s' and contrasena = sha1('%s')",
        $_POST["correo"],
        $_POST["contrasenia"]
    );
    //echo $sql;
    //exit;
    $resultado = $conexion->ejecutarConsulta($sql);
    $respuesta = array();
    if ($conexion->cantidadRegistros($resultado)>0){
        $respuesta = $conexion->obtenerFila($resultado);
        $respuesta["codigoResultado"] = 0;
        $respuesta["mensajeResultado"] = "El usuario si existe";
        $_SESSION["usr"] = $respuesta["correo"];
        $_SESSION["psw"] = $respuesta["contrasena"];
    }else {
        $respuesta["codigoResultado"] = 1;
        $respuesta["mensajeResultado"] = "El usuario no existe";
        session_destroy();
    }
    echo json_encode($respuesta);
?>