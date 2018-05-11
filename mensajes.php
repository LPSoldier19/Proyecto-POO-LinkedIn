<?php 
    session_start();
    if (!isset($_SESSION["usr"]) || !isset($_SESSION["psw"]))
        header("Location: index.html");
    include("class/class-conexion.php");
    $conexion = new Conexion();
     $sql = sprintf( 
        "SELECT codigo_usuario, codigo_genero, nombre_usuario, apellido_usuario, correo, contrasena, url_imagen_perfil, titular, educacion, logros FROM tbl_usuarios WHERE correo = '%s' and contrasena = '%s' and codigo_usuario = %s",
        $_SESSION["usr"],
        $_SESSION["psw"],
        $_SESSION["codUsr"]);
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
    <title>Mensajes</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estilos-rafael.css">
    <link rel="stylesheet" href="css/estiloscss-matt.css">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
</head>

<body id="container-muro">
    <span class="d-none">
    <input type="text" value="<?php echo $_SESSION["codUsr"]?>" id="txt-codigo-usuario">
    </span>
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
    
    <div class="container mt-5 mb-5">   
        <div class="row">
            <div class="col-lg-9 col-10 col-md-8 offset-md-2 offset-1 offset-lg-0 card" >
                <div class="row">
                    <div class="col-lg-4 col-12 col-md-12 card-header" id="msj-contactos">
                            <div class="row border-bottom">
                                <div class="col-lg-6 col-8 mt-2">
                                    <h6><strong>Mensajes</strong></h6>
                                </div>
                                <div class="offset-lg-3 col-lg-2 col-2 offset-2 mb-2">
                                   <i class="fas fa-edit fa-lg mt-2" style="color: #0084bf;"></i>
                                </div>
                            </div>
                            <div class="row" id="div-chat">
                            
                            </div>
                            
                    </div>
                    <div class="col-lg-8 col-12 frame d-none d-lg-block" id="msj-chat">
                    
                            <div class="mb-1 row no-gutters pb-2">
                                <div class="col-lg-11 col-10 pl-2">                        
                                    <div class="bottom" style="background:whitesmoke !important">
                                        <input class="form-control pt-2" placeholder="Type a message" id="txt-mensaje"/>
                                    </div> 
                                </div>
                                <div class="col-lg-1 col-2">
                                    <button type="submit" class="btn btn-outline-primary" id="btn-enviar"><i class="fas fa-paper-plane "> </i></button>   
                                </div>
                                         
                            </div>
                    </div>       
                </div>
            </div>
        
            <!---->
         <!-- aqui termina el chat -->
        <!-- aqui comienza el negro blanco xd -->
             <div class="col-lg-3 col-md-4 d-none d-lg-block">
                <div class="card" id="card-muro">
                    <div class="card-body text-center">
                        <a href="empleos.html">
                            <img src="img/blanco-linkedin.jpg" alt="Advertise on LinkedIn" class="img-fluid">
                        </a>
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
   <script src="js/javascript-rafa.js"></script>
   <script src="js/controlador.js"></script>
   <script src="js/controlador2.js"></script>
   

</body>
</html>