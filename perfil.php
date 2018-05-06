<?php 
    session_start();
    if (!isset($_SESSION["usr"]) || !isset($_SESSION["psw"]))
        header("Location: index.html");
    include("class/class-conexion.php");
    $conexion = new Conexion();
     $sql = sprintf( 
        "SELECT codigo_usuario, correo, contrasena FROM tbl_usuarios WHERE correo = '%s' and contrasena = '%s'",
        $_SESSION["usr"],
        $_SESSION["psw"]);
    //echo $sql;
    //exit;
    $resultado = $conexion->ejecutarConsulta($sql);
    $respuesta = array();
    if ($conexion->cantidadRegistros($resultado)<=0){
           header("Location: index.html");
    }
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
                    <img style="width: 24px; height: 24px" src="img/usuario.png" id="usuario-img" class="img-fluid">
                    <br>
                    <small>Yo</small>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right pr-2 pl-2" aria-labelledby="dropdownMenuButton">
                        <div class="card text-center">
                            <img src="img/usuario.png" class="rounded-circle img-fluid">
                            <p><strong>Usuario</strong><br>
                            Estudiante en Universidad Nacional Autonoma de Honduras(UNAH)
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
            <div class="col-lg-8">
                <div class="card mb-5" id="card-muro">
                    <img src="img/fondo-card.svg" class="img-fluid pt-0">
                    <div class="card-header text-center">
                        <div class="row">
                            <div class="offset-lg-11 col-lg-1 col-1 offset-10">
                                <a class="btn btn-link rounded-circle" href="#modal-perfil" data-toggle="modal" style="color: #0084bf;"><i class="fas fa-pencil-alt fa-lg"></i></a >
                            </div>
                            <div class="modal fade" id="modal-perfil" tabindex="5" role="application" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Editar perfil</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="img/fondo-card.svg" class="img-fluid pt-0">
                                        <img src="img/usuario.png" class="img-fluid rounded-circle"><br>
                                            
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <label class="float-left">Nombre: <span style="color: #0084bf;">*</span></label>
                                                <input type="text" class="form-control mt-2" placeholder="Nombre" id="txt-nombre-modal">
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="float-left">Apellido: <span style="color: #0084bf;">*</span></label>
                                                <input type="text" class="form-control mt-2" placeholder="Apellido" id="txt-apellido-modal">
                                            </div>
                                            <div class="col-lg-12">
                                                <label class="float-left mt-2">Imagen de Perfil:</label>
                                                <select class="form-control mt-2" name="" id="">
                                                    <option value="img/img-perfil/usuario1.jpg">Imagen 1</option>
                                                    <option value="img/img-perfil/usuario2.jpg">Imagen 2</option>
                                                    <option value="img/img-perfil/usuario3.jpg">Imagen 3</option>
                                                    <option value="img/img-perfil/usuario4.jpg">Imagen 4</option>
                                                    <option value="img/img-perfil/usuario5.jpg">Imagen 5</option>
                                                    <option value="img/img-perfil/usuario6.jpg">Imagen 6</option>
                                                    <option value="img/img-perfil/usuario7.jpg">Imagen 7</option>
                                                    <option value="img/img-perfil/usuario8.jpg">Imagen 8</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-12">
                                                <label class="float-left mt-2">Titular: <span style="color: #0084bf;">*</span></label>
                                                <textarea class="form-control" id="txta-titular-modal" cols="30" rows="2" 
                                                placeholder="Titular" ></textarea>
                                            </div>
                                            <div class="col-lg-12">
                                                <label class="float-left mt-2">Educacion: <span style="color: #0084bf;">*</span></label>
                                                <input type="text" class="form-control mt-2" placeholder="Añade tu nivel de Educacion" id="txt-educacion-modal">
                                            </div>
                        
                                            <div class="col-lg-12">
                                                <label class="float-left mt-2">Logro: <span style="color: #0084bf;">*</span></label>
                                                <input type="text" class="form-control mt-2" placeholder="Añade el ultimo logro que has realizado a nivel educativo o laboral" id="txt-logro-modal">
                                            </div>                                                     
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" id="btn-guardar-modal">Guardar</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <img src="img/usuario.png" class="img-fluid rounded-circle">
                        <h4 class="pt-2">Usuario</h4>
                        <h5>Estudiante en Universidad Nacional Autonoma de Honduras(UNAH)</h5>
                        <h6>Universidad Nacional Autónoma de Honduras (UNAH)</h6>
                        <h6>País <i class="fas fa-circle" style="font-size: 40%;"></i> Numero de Contactos <i class="fas fa-users" style="font-size: 100%;"></i></h6>
                   </div>
                </div>


                <div class="card mb-5" id="card-muro">
                    <div class="card-header">
                        <h4>Eduación</h4>
                   </div>
                </div>

                <div class="card mb-5" id="card-muro">
                    <div class="card-header">
                        <h4>Logros</h4>
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