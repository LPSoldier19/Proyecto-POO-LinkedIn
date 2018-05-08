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
            <div class="col-lg-3 offset-lg-0 col-8 offset-2 mb-5 d-none d-lg-block">
                <div class="card pt-5" id="card-muro">
                   <div class="card-body text-center pt-4 pb-5">
                      <h3><a href="#" id="numero-mi-red">Numero</a></h3>
                      <h6>Contactos</h6>
                   </div>
                </div>
            </div>

            <div class="col-lg-6 offset-lg-0 col-12 ">
                <div class="card mb-3" id="card-muro">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-8">
                                <h4>Contactos</h4>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mb-5" id="card-muro">
                   <div class="card-header">
                        <h5>Gente que podrias conocer</h5>
                   </div>
                      <div class="row card-body" id="card-usuarios-red">
                        <div class="col-lg-4 col-6 card-body border text-center">
                            <img src="img/goku.png" class="img-fluid rounded-circle pt-2 pb-3">
                            <h6><strong>Goku</strong></h6>
                            <p>Guerreo mas poderoso del Universo 7<br>
                            <i class="fas fa-university fa-lg"></i> Escuela del Supremo Kaiosama
                            </p>
                            <div class="card-body">  
                            <a href="#" class="btn btn-outline-primary btn-sm mb-3">Conectar</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6 card-body border text-center">
                            <img src="img/toppo.jpg" class="img-fluid rounded-circle pt-2 pb-3">
                            <h6><strong>Toppo</strong></h6>
                            <p>Dios de la Destruccion del Universo 11<br>
                            <i class="fas fa-university fa-lg"></i> Aprendiz de Vermoud
                            </p>  
                            <div class="card-body">  
                            <a href="#" class="btn btn-outline-primary btn-sm mb-3">Conectar</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6 card-body border text-center">
                            <img src="img/vegeta.jpg" class="img-fluid rounded-circle pt-2 pb-3">
                            <h6><strong>Vegeta</strong></h6>
                            <p>Principe de los Sayayins<br>
                            <i class="fas fa-university fa-lg"></i> Autodidacta 
                            </p>  
                            <div class="card-body">  
                            <a href="#" class="btn btn-outline-primary btn-sm mb-3">Conectar</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6 card-body border text-center">
                            <img src="img/jiren.png" class="img-fluid rounded-circle pt-2 pb-4">
                            <h6><strong>Jiren</strong></h6>
                            <p>Guerreo mas poderoso del Universo 11<br></p>
                            <p><i class="fas fa-university fa-lg"></i> Escuela de formacion de guerreros 
                            </p>  
                            <div class="card-body">  
                            <a href="#" class="btn btn-outline-primary btn-sm mb-3">Conectar</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6 card-body border text-center">
                            <img src="img/freezer.jpg" class="img-fluid rounded-circle pt-2 pb-4">
                            <h6><strong>Freezer</strong></h6>
                            <p>Villano mas odiado del Universo 7</p>
                            <p><i class="fas fa-university fa-lg"></i> Autodidacta
                            </p>  
                            <div class="card-body">  
                            <a href="#" class="btn btn-outline-primary btn-sm mb-3">Conectar</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-6 card-body border text-center">
                            <img src="img/A18.png" class="img-fluid rounded-circle pt-2 pb-4 mb-1">
                            <h6><strong>Androide No. 18</strong></h6>
                            <p>Androide convertida en humana gracias a las Esferas del Dragon</p>
                            <p><i class="fas fa-university fa-lg"></i> Creacion del Doctor Gero   </p>                         
                          
                           <div class="card-body">  
                            <a href="#" class="btn btn-outline-primary btn-sm mb-3">Conectar</a>
                            </div>
                        </div>
                      </div>
                  </div>

            </div>

            <div class="col-lg-3 d-none d-lg-block">
                <div class="card" id="card-muro">
                    <div class="card-body text-center">
                        <a href="empleos.html">
                            <img src="img/blanco-linkedin.jpg" alt="Advertise on LinkedIn" class="img-fluid">
                        </a>
                    </div>
                    <div class="card-footer"></div>
                </div>
            </div>  
        </div>
    </div>
    
    <script src="js/jquery-3.3.1.min.js"></script>
   <script src="js/bootstrap.js"></script>
</body>
</html>