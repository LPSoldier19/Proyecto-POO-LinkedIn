<?php
    include ("../class/class-conexion.php");
    include ("../class/class-usuarios.php");
    include ("../class/class-empleo.php");
    include ("../class/class-publicaciones.php");
    include ("../class/class-chat.php");
    include ("../class/class-comentarios.php");
    include ("../class/class-mensajes.php");

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

        case "obtener-lista-usuarios":
        $u = new Usuario($_GET["codigo_usuario"],null,null,null,null,null,null,null,null,null);
        echo $u->listaUsuarios($conexion);
        break;

        case "guardar-empleos":
        $e = new Empleo($_POST["codigo_empleo"],null,null,null,null,null);
        echo $e->guardarEmpleo($conexion,$_POST["codigo_usuario"]);
        break;

        case "obtener-empleos-guardados":
        $e = new Empleo(null,null,null,null,null,null);
        echo $e->obtenerListaEmpleosGuardados($conexion, $_GET["codigo_usuario"]);
        break;

        case "guardar-usuario":
        $u = new Usuario($_POST["codigo_usuario_guardar"],null,null,null,null,null,null,null,null,null);
        echo $u->guardarUsuario($conexion,$_POST["codigo_usuario"]);
        break;

        case "obtener-usuarios-guardados":
        $u = new Usuario(null,null,null,null,null,null,null,null,null,null);
        echo $u->obtenerListaUsuariosGuardados($conexion,$_GET["codigo_usuario"]);
        break;


        case "insertar-comentario":
        $com = new Comentario(null,$_POST["codigo_usuario"],$_POST["codigo_publicacion"],null,$_POST["comentario"]);
        echo $com->insertarComentario($conexion);
        break;

        case "obtener-lista-comentarios":
        $com = new Comentario(null,$_GET["codigo_usuario"],$_GET["codigo_publicacion"],null,null);
        echo $com->visualizarComentarios($conexion);
        break;

        case "obtener-lista-chats":
        $c = new Chat(null,null,$_GET["codigo_usuario"]);
        echo $c->listaChat($conexion);
        break;

        case "insertar-mensaje":
        $m = new Mensaje(null,$_POST["codigo_usuario"],$_POST["contenido_mensaje"],null);
        echo $m->insertarMensaje($conexion);
        break;

    }


?>