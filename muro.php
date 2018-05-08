<?php 
    session_start();
    if (!isset($_SESSION["usr"]) || !isset($_SESSION["psw"]))
        header("Location: index.html");
    include("class/class-conexion.php");
    $conexion = new Conexion();
     $sql = sprintf( 
        "SELECT codigo_usuario, codigo_genero, nombre_usuario, apellido_usuario, correo, contrasena, url_imagen_perfil, titular, educacion, logros FROM tbl_usuarios WHERE correo = '%s' and contrasena = '%s'",
        $_SESSION["usr"],
        $_SESSION["psw"]);
    //echo $sql;
    //exit;
    $resultado = $conexion->ejecutarConsulta($sql);
    $respuesta = array();
    if ($conexion->cantidadRegistros($resultado)<=0){
           header("Location: index.html");
    }

    $registro = $conexion->obtenerFila($resultado);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkedIn</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos-rafael.css">
    <link rel="stylesheet" href="css/estiloscss-matt.css">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
</head>

<body id="container-muro">
   
<nav class="navbar sticky-top ">
    
    <div>
        <div class="row no-gutters">
            <div class="col-lg-2 col-12 col-sm-12 col-md-4 navbar-brand text-center form-inline">
                <button class="btn btn-link">
                    <img src="img/logo-in.png" id="logo-muro" class="img-fluid">
                </button>
            </div>
            
                <div class="offset-lg-6 col-lg-3 col-12 col-sm-12 col-md-7 offset-md-0 form-inline text-center">
                    <div class="row">
                    <a href="muro.php" class="btn btn-link nav-item"><i class="fas fa-home fa-lg"></i><br><small>Inicio</small></a>
                    <a href="mi-red.php" class="btn btn-link nav-item"><i class="fas fa-users fa-lg"></i><br><small>Mi Red</small></a>
                    <a href="empleos.php" class="btn btn-link nav-item"><i class="fas fa-briefcase fa-lg"></i><br><small>Empleos</small></a>
                    <a href="mensajes.php" class="btn btn-link nav-item active"><i class="fas fa-envelope fa-lg"></i><br><small>Mensajes</small></a>
                    <div class="dropdown">
                  <a style="color: white;" class="dropdown-toggle-split btn btn-link nav-item active" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img style="width: 24px; height: 24px" src="<?php echo $registro["url_imagen_perfil"]?>" id="usuario-img" class="img-fluid">
                    <br>
                    <small>Yo</small>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right pr-2 pl-2" aria-labelledby="dropdownMenuButton">
                        <div class="card text-center">
                            <img src="<?php echo $registro["url_imagen_perfil"]?>" class="rounded-circle img-fluid">
                            <p><strong><?php echo $registro["nombre_usuario"]." ".$registro["apellido_usuario"]?></strong><br>
                            <?php echo $registro["titular"]?>
                            </p>
                        </div>
                    <a class="dropdown-item btn btn-link text-center" href="perfil.php" id="perfil-muro">Ver Perfil</a>
                    <a class="dropdown-item btn btn-link text-center" href="ajax/log-out.php" id="perfil-muro">Cerrar Sesion</a>
                  </div>
                </div>
            </div>
        </div>

        </div>
    </div>


</nav>

    <div class="container mt-5" >
        <div class="row">
            <div class="col-lg-3 offset-lg-0 mb-5 d-none d-lg-block">
                <div class="card" id="card-muro">
                    <img src="img/fondo-card.svg" class="img-fluid pt-0" >
                   <div class="card-header text-center">
                        <img src="<?php echo $registro["url_imagen_perfil"]?>" class="img-fluid"  id="img-usuario-perfil">
                        <p id="Bienvenida"><strong>Te damos la bienvenida,<br> <?php echo $registro["nombre_usuario"]." ".$registro["apellido_usuario"]?></strong></p>
                   </div>
                   <div class="card-subtitle text-center pt-4">
                      <h6><a href="mi-red.html">Numero</a></h6>
                      <p>Contacto
                        <br>
                        <strong>Amplia tu Red</strong>
                      </p>
                   </div>
                </div>
            </div>

            <div class="col-lg-6 col-12 offset-lg-0">
                <div class="card mb-4" id="card-muro">
                    <div class="card-header">
                        <textarea class="form-control" id="txta-publicar" cols="30" rows="2" 
                        placeholder="Comparte un artículo, foto, vídeo o idea"></textarea>
                    </div>
                    
                    
                    <div class="card-footer">
                        <div class="row no-gutters">
                            <div class="col-lg-1 col-1 pt-2 mt-1" id="boton-input-escribir">
                                <i class="fas fa-edit"></i>
                            </div>
                            <div class="col-lg-7">
                                <input type="text" class="form-control" id="txt-ubicacion" disabled>
                            </div>
                            <div class="col-lg-1" >
                                <button type="button" class="btn btn-link btn" id="btn-ubicacion">
                                    <i class="fas fa-map-marker-alt" id="boton-input-escribir"></i>
                                </button>
                            </div>
                            <div class="col-lg-1">
                                <input type="text" class="form-control" id="latlng" disabled style="display:none;">
                            </div>
                            <div class="col-lg-1 col-2 offset-0">
                                <button type="button" class="btn btn-primary" id="btn-post">Publicar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-5" id="card-muro">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-2 col-2">
                                <img src="img/goku.png" class="img-fluid rounded-circle"> 
                            </div>
                            <div class="col-lg-6 col-7">
                                <p><strong>Goku</strong><br>
                                    Guerrero del 7º Universo <br>
                                    1 hora
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    Al final he logrado alcanzar el nivel perfecto de la doctrina egoista, espero que Jiren tenga la capacidad de hacerme frente
                    ante esta nueva y poderosa transformacion.
                    </div>
                    <div class="card-header">
                    # recomendaciones
                    </div>
                    <div class="card-content border-top">
                        <div class="row no-gutters">
                            <div class="col-lg-1 col-1" id="boton-input-text">
                                <label class="btn btn-default btn-file fas fa-thumbs-up " id="like-logo">
                                    <input type="button" style="display: none;" class="form-control-file" id="like">
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row no-gutters pb-3">
                            <div class="col-lg-1 col-1">
                                <img src="img/usuario.png" class="img-fluid rounded-circle">
                            </div>
                            <div class="col-lg-9 col-9 ml-2">
                                <input type="text" class="form-control">
                            </div>
                            <div class="col-lg-1 col-1 mt-1">
                                <label class="btn btn-default btn-file fas fa-paper-plane">
                                    <input type="button" style="display: none;" class="form-control-file" id="btn-enviar-comentario">
                                </label>
                            </div>
                        </div>
                        <div class="row no-gutters pb-3">
                            <div class="col-lg-1 col-1 mr-2">
                                <img src="img/vegeta.jpg" class="img-fluid rounded-circle">
                            </div>
                            <div class="col-lg-10 col-9 text-justify">
                                <p><strong>Vegeta:</strong> Valio la pena darte la ultima pequeña cantidad de energia que tenia, aprovechalo, el Universo 7 debe ganar el gran torneo del poder. Recuerda que deje en tus manos todas las promesas que hice antes y durante el torneo.
                                </p>
                                Hace 1 Hora
                            </div>
                        </div>
                        <div class="row no-gutters pb-3">
                            <div class="col-lg-1 col-1 mr-2">
                                <img src="img/jiren.png" class="img-fluid rounded-circle">
                            </div>
                            <div class="col-lg-10 col-9 text-justify">
                                <p><strong>Jiren:</strong> Tu poder comparado con el mio, es muy inferior y te lo demostrare, no dudes que hare que el Universo 11 sea el vencedor del gran torneo del poder y reclamar el deseo.
                                </p>
                                Hace 50 minutos
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="col-lg-3 d-none d-lg-block">
                <div class="card" id="card-muro">
                <div class="card-body">
                <a href="empleos.html">
                    <img src="img/blanco-linkedin.jpg" alt="Advertise on LinkedIn" class="img-fluid">
                </a>
                </div>
                <div class="card-body" id="map-container">
                    <section id="map"></section>
                </div>
                    <div class="card-footer">
                        <div class="row no-gutters">
                            <div class="col-lg-3">
                                <p style="font-size: 20px;">&copy; &middot;</p>
                            </div>
                            <div class="col-lg-6">
                                <img src="img/logo-form.png" class="img-fluid"> 
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>  
        </div>
    </div>
    
    <script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/bootstrap.js"></script>
   <script src="js/controlador.js"></script>
   <script src="js/muro.js"></script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBa8T6nCrETXo0P-IzV-d4eVLjN5UBk5oM&signed_in=true" async defer>
   <script src="js/javascript-rafa.js"></script>

</body>
</html>