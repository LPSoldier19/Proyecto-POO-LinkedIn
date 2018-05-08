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
        $p = new Publicacion(null,null,$_POST['post'],null,null,$_POST['ubicacion']);
        echo $p->insertarPublicacion($conexion);
        break;
    }


?>