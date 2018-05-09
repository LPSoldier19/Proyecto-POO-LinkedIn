<?php
    include ("../class/class-conexion.php");
    include ("../class/class-usuarios.php");
    include ("../class/class-empleo.php");
    include ("../class/class-publicaciones.php");

    $conexion = new Conexion();

    switch ($_GET["accion"]){
        case "insertar-usuario":
        $u = new Usuario(null,$_POST['genero'],$_POST['nombre'],$_POST['apellido'],$_POST['correo'],$_POST['contrasenia'],null,null,null,null);
        echo $u->insertarUsuario($conexion);
        break;

        case "obtener-lista-empleos":
        $e = new Empleo(null,null,null,null,null,null);
        echo $e->obtenerListaEmpleos($conexion);
        break;

        case "insertar-publicacion":
        $p = new Publicacion(null,$_POST["codUsr"],$_POST["publicacion"],null,null,$_POST["ubicacion"]);
        echo $p->insertarPublicacion($conexion);
        break;

        case "actualizar-usuario":
        $u = new Usuario($_POST["codigo_usuario"],null,null,null,null,null,$_POST["url_imagen_perfil"],$_POST["titular"],$_POST["educacion"],$_POST["logro"]);
        echo $u->actualizarInfoUsuario($conexion);
        break;

        case "obtener-lista-publicaciones":
        $p = new Publicacion(null,$_GET["codigo_usuario"],null,null,null,null);
        echo $p->visualizarPublicaciones($conexion);
        break;
    }


?>