<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css" />
        <link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" type="text/css" href="css/pluton.css" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="css/pluton-ie7.css" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="css/jquery.cslider.css" />
        <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css" />
        <link rel="stylesheet" type="text/css" href="css/animate.css" />
        <!-- Fav and touch icons -->

        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch-icon-72.png">
        <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57.png">
        <link rel="shortcut icon" href="images/ico/favicon.ico">
    </head>
    <?php
        $full_name = $_SERVER['PHP_SELF'];
        $name_array = explode('/',$full_name);
        $count = count($name_array);
        $page_name = $name_array[$count-1];
    ?>

    <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand"><!-- This is website logo -->
                    <img src= images/cooltext143839989291002.png width="429" height="109"></a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                  </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                            <li class="<?php echo ($page_name=='index2.php')?'active':'';?>"><a href="index2.php">Inicio</a></li>
                            <li class="<?php echo ($page_name=='busqueda2.php')?'active':'';?>"><a href="busqueda2.php">Recintos</a></li>
                            <li class="<?php echo ($page_name=='Partido.php')?'active':'';?>"><a href="Partido.php">Jugar</a></li>
                            <li class="<?php echo ($page_name=='agendados.php')?'active':'';?>"><a href="agendados.php">Partidos</a></li>
                            <li class="<?php echo ($page_name=='comentario.php')?'active':'';?>"><a href="comentario.php">Comentarios</a></li>

                            <ul class="nav pull-right">
                                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog"></i> 
                                    <?php echo $_SESSION['sesion']; //nombre del registrado?> 
                                     <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <!-- <li><a href="javascript:;">Settings</a></li> -->
                                        <li><a href="perfilJugador.php">Mi Perfil</a></li>
                                        <hr></hr>
                                        <li><a href="nuevoGrupo.php">Crear grupo</a></li>
                                        <li><a href="grupos.php">Mis grupos</a></li>
                                        <hr></hr>
                                        <li><a href="notificarRecinto.php">Notificar recinto</a></li>
                                        <hr></hr>
                                        <li><a href="../../LOGICA/salirJugador.php">Cerrar Sesion</a></li>
                                        <li></li>
                                    </ul>
                                </li>
                            </ul>
                             <!--login jugador -->
                        </ul>
                    </div>
                    <!-- End main navigation -->
              </div>
            </div>
        </div>
</html>