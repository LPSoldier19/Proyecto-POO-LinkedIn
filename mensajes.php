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
					    <a class="dropdown-item btn btn-link text-center" href="index.html" id="perfil-muro">Cerrar Sesion</a>
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
                                   <button class="btn btn-link" style="color: #0084bf;"><i class="fas fa-edit fa-lg"></i></button>
                                </div>
                            </div>
                            <div class="row card-header-tabs border-bottom">
                                <div class="col-lg-9 col-9">
                                    <input type="text" class="form-control-plaintext" placeholder="Buscar Mensajes">
                                </div>
                                <div class="col-lg-1 col-1 offset-1">
                                   <button class="btn btn-light rounded-circle"><i class="fas fa-list-alt"></i></button>
                                </div>
                            </div>
                            <button class="row btn btn-toolbar mt-4 border pt-2 pb-2 no-gutters pr-5" id="contacto-chat">
                                <div class="col-lg-6 col-4 col-md-4">
                                    <img src="img/freezer.jpg" class="img-fluid rounded-circle">
                                </div>
                                <div class="col-lg-3 col-4 col-md-4 pl-2 pr-5 mr-md-4">
                                   <p><strong>Freezer</strong><br>
                                    <i class="fas fa-camera-retro"></i>Imagen</p>
                                </div>
                            </button>
                            <button class="row btn btn-toolbar mt-4 border pt-2 pb-2 no-gutters pr-5">
                                <div class="col-lg-6 col-4 col-md-4">
                                    <img src="img/jiren.png" class="img-fluid rounded-circle">
                                </div>
                                <div class="col-lg-3 col-2 pl-2">
                                   <p><strong>Jiren</strong><br>
                                    ...</p>
                                </div>
                            </button>
                            <button class="row btn btn-toolbar mt-4 border pt-2 pb-2 no-gutters pr-5" id="contacto-chat">
                                <div class="col-lg-6 col-4 col-md-4">
                                    <img src="img/vegeta.jpg" class="img-fluid rounded-circle">
                                </div>
                                <div class="col-lg-3 col-4 col-md-4 pl-2 pl-md-3 pr-5 mr-md-4">
                                   <p><strong>Vegeta</strong><br>
                                    Insecto!!
                                   </p>
                                </div>
                            </button>
                            <button class="row btn btn-toolbar mt-4 border pt-2 pb-2 no-gutters">
                                <div class="col-lg-5 col-4">
                                    <img src="img/A18.png" class="img-fluid rounded-circle">
                                </div>
                                <div class="col-lg-4 col-1 pl-2">
                                   <p><strong>Androide 18</strong><br>
                                   Todo queda...</p>
                                </div>
                            </button>
                            <button class="row btn btn-toolbar mt-4 border pt-2 pb-2 no-gutters">
                                <div class="col-lg-5 col-4">
                                    <img src="img/Toppo.jpg" class="img-fluid rounded-circle">
                                </div>
                                <div class="col-lg-4 col-1 pl-2">
                                   <p><strong>Toppo</strong><br>
                                   Todo queda...</p>
                                </div>
                            </button>
                    </div>
                    <div class="col-lg-8 col-12 frame d-none d-lg-block" id="msj-chat">
                        <header class="card-header mb-5" style="background-color:#2B3E4A;" >
                            <div class="row">
                                <div class="col-lg-1 col-1 mr-3 d-lg-none">
                                    <button class="btn btn-link" style="color:white;" id="msj-regresar"><i class="fas fa-arrow-circle-left fa-lg"></i></button>
                                </div>
                                <div class="col-lg-6 col-6 ">
                                    <h5 style="color:white;">Freezer</h5>
                                    <div id="animacion">
                                    <i class="fas fa-circle"></i> <strong>Activo ahora</strong>
                                    </div>
                                   
                                </div>
                            </div>
                        </header>
                        <div id="scrollbar" style="">
                        <ul id="ul-chat" class="mt-4 ">
                        <li style="width:100%">
                             <div class="msj-rta macro">
                             
                                <div class="text text-l">
                                        <p>Freezer ya deja de matar gente inocente!!!!</p>
                                        <p><small>date</small></p>
                                </div>
                                <div class="avatar"> <img class="rounded-circle" style="width:100%;" src="img/goku.png" /> </div>
                            </div>
                        </li>


                                <li style="width:100%;">
                                    <div class="msj macro">
                                        <div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="rounded-circle" style="width:100%;" src="img/freezer.jpg" /></div>                               
                                        <div class="text text-r">
                                            <p>Yo matare a quien se me de la gana, y un inferior Sayayin como tu, no me vendra a dar ordenes a mi, el Emperador del Mal </p>
                                            <img src="img/krilin-levitando.jpg" height="50%" width="50%">
                                            <p><small>date</small></p>
                                        </div>
                                    
                              </li>

                               <li style="width:100%">
                                    <div class="msj-rta macro">
                                        <div class="text text-l">
                                            <p>
                                                <img src="img/ya-basta-freezer.jpg" height="50%" width="50%">
                                            </p>
                                            <p><small>date</small></p>
                                        </div>
                                        <div class="avatar"><img class="rounded-circle" style="width:100%;" src="img/goku.png" /></div>
                                    </div>
                                </li>
                                

                                <li style="width:100%;">
                                    <div class="msj macro">
                                        <div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="rounded-circle" style="width:100%;" src="img/freezer.jpg" /></div>  
                                        <div class="text text-r">
                                            <p> Goooookuuuuu AHHHHHGG! <br>
                                                 <img src="img/krilin-explotado.jpg" height="50%" width="50%">
                                            </p>
                                            <p><small>date</small></p>
                                        </div>
                                                                 
                              </li>

                               <li style="width:100%">
                                    <div class="msj-rta macro">
                                        <div class="text text-l">
                                            <p> AHHHHHHH! como te atreviste a matar a krilin <br>
                                                <img src="img/goku-transformandose.jpg" height="50%" width="50%"></p>
                                                <p><small>date</small></p>
                                            </div>
                                        <div class="avatar"><img class="rounded-circle" style="width:100%;" src="img/goku.png" /></div>
                                        </div>
                                </li>


                               <li style="width:100%">
                                    <div class="msj-rta macro">
                                        <div class="text text-l">
                                            <p> Ahora si, preparate, pues vengare la vida de todas las personas que has matado <br>
                                                <img src="img/goku-transformado.jpg" height="50%" width="50%"></p>
                                                <p><small>date</small></p>
                                            </div>
                                        <div class="avatar"><img class="rounded-circle" style="width:100%;" src="img/goku.png" /></div>
                                        </div>
                                </li>
                                

                                <li style="width:100%;">
                                    <div class="msj macro">
                                        <div class="avatar" style="padding:0px 0px 0px 10px !important"><img class="rounded-circle" style="width:100%;" src="img/freezer.jpg" /></div>
                                        <div class="text text-r">
                                            <p>
                                            <img src="img/vamonos-alv-wey.jpg" height="50%" width="50%">
                                            </p>
                                            <p><small>date</small></p>
                                        </div>
                                </li>


                     </ul>
                    </div>
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

</body>
</html>