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
    <title>LinkedIn</title>
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


    <div class="container mt-5 mb-5" >
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-3" id="card-muro">
                   <div class="card-header">
                       <h4>Empleos Guardados</h4>
                    </div>
                    <div class="card-body">
                        <div class="card-body">
                        <div class="row" id="div-empleos-guardados">
                            
                            
                      </div>
                      
                    </div>
                    </div>
                </div>

                <div class="card" id="card-muro">
                   <div class="card-header text-left">
                       <h4 class="pt-2">Empresas que podrian interesarte</h4>
                    </div>
                    <div class="card-body">
                        <div class="row" id="div-empleos">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="footer p-4" id="footer-empleos">
        
        <div class="row">
            <div class="col-lg-5 offset-lg-1 mt-2" id="footer">
                <p><strong>General</strong></p>
                <a href="#" id="footer-a">Registrate |</a>
                <a href="#" id="footer-a">Centro de Ayuda |</a>
                <a href="#" id="footer-a">Acerca de |</a>
                <a href="#" id="footer-a">Prensa |</a>
                <a href="#" id="footer-a">Blog |</a>
                <a href="#" id="footer-a">Empleo |</a>
                <a href="#" id="footer-a">Desarrolladores</a>
                <br><br>
                <p><strong>Navegar por LinkedIn</strong></p>
                <a href="#" id="footer-a">Learning |</a>
                <a href="#" id="footer-a">Empleos |</a>
                <a href="#" id="footer-a">Sueldo |</a>
                <a href="#" id="footer-a">Móvil |</a>
                <a href="#" id="footer-a">ProFinder</a>
            </div>

            <div class="col-lg-4 mt-2 " id="footer">
                <p><strong>Business Solution</strong></p>
                <a href="#" id="footer-a">Talent |</a>
                <a href="#" id="footer-a">Marketing |</a>
                <a href="#" id="footer-a">Sales |</a>
                <a href="#" id="footer-a">Learning</a>
                <br><br>
                <p><strong>Directorios</strong></p>
                <a href="#" id="footer-a">Miembros |</a>
                <a href="#" id="footer-a">Empleos |</a>
                <a href="#" id="footer-a">Pulse |</a>
                <a href="#" id="footer-a">Temas |</a>
                <a href="#" id="footer-a">Empresas |</a>
                <a href="#" id="footer-a">Sueldos |</a>
                <a href="#" id="footer-a">Universidades |</a>
                <a href="#" id="footer-a">Cargos |</a>
                <a href="#" id="footer-a">Universidades |</a>
                <a href="#" id="footer-a">Cargos |</a>
                <a href="#" id="footer-a">Personas |</a>
                <a href="#" id="footer-a">Principales Empleos |</a>
            </div>
        </div>   
    </div>
    </div>
    
    <script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/bootstrap.js"></script>
   <script src="js/controlador.js"></script>
</body>
</html>