<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="<?php echo base_url();?>assets/include/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
    <link href="<?php echo base_url();?>assets/css/plantilla.css" rel="stylesheet" type="text/css" media="all" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>assets/img/ua.PNG">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        /*.row.content {height: 450px}*/

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        .footer {
            height: 80px; /* .push must be the same height as .footer */

            width:100%;
            margin-top:10px;
            background-color:#D3D3D3;

        }
        .radio{
            /*border: 2px solid #a1a1a1;*/
            /*padding: 10px 40px;*/
            background: #dddddd;
            border-radius: 25px;
            height: 10px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }

        }
        #map {
            height: 50%;
            width:50%;
        }
    </style>




</head>
<body>

<div class="center">

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">

            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#">Quien somos</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <?php
                    if (!$this->session->userdata('user')){
                   ?>
                    <li><a href="<?php echo site_url('registro') ?>"><span class="glyphicon glyphicon-registration-mark"></span> Register</a></li>
                    <li><a href="<?php echo site_url('login') ?>""><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                   <?php
                    }
                    else {
                        //echo $hola;
                        echo "<li> <a style='color:#fcfcfc;background: #337AB7; border-radius: 25px;height:35px;padding-top:6px;margin-top:8px;margin-right:20px' href='" . site_url('buscarRuta') . "' > <i class='glyphicon glyphicon-search'></i>&nbsp;&nbsp;&nbsp;&nbsp;Buscar anuncio </a></li>";
                        echo "<li> <a style='color:#fcfcfc;background: #337AB7; border-radius: 25px;height:35px;padding-top:6px;margin-top:8px;margin-right:20px' href='" . site_url('publicarRuta') . "' > <i class='glyphicon glyphicon-road'></i>&nbsp;&nbsp;&nbsp;&nbsp;Publicar anuncio </a></li>";

                        //if (!$this->session->userdata('user')){
                        /*$boleano = $this->session->flashdata('public');
                        if ($boleano == true) {
                            echo "<li> <a style='color:#fcfcfc;background: #337AB7; border-radius: 25px;height:35px;padding-top:6px;margin-top:8px;margin-right:20px' href='" . site_url('publicarRuta') . "' > <i class='glyphicon glyphicon-random'></i>&nbsp;&nbsp;&nbsp;&nbsp;Publicar anuncio </a></li>";
                        }*/
                        echo "<li> <a style='color:#fcfcfc;background: #337AB7; border-radius: 25px;height:35px;padding-top:6px;margin-top:8px;margin-right:20px' href='" . site_url('buscarParking') . "' > <i class='glyphicon glyphicon-random'></i>&nbsp;&nbsp;&nbsp;&nbsp;Buscar parking </a></li>";
                        ?>

                    <li>
                           <button style="margin-top:8px;" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> Bienvenido  <?php echo $this->session->userdata('user')->nombre ?>
                              <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                              <li><a href= " <?php echo site_url('modifyPerfil') ?>">Editar perfil</a></li>
                                <li><a href='<?php echo site_url('private') ?>'>Admin</a></li>
                              <li><a href="<?php echo site_url('private/listadoRutas') ?> ">Viajes publicados</a></li>
                                <li><a href="<?php echo site_url('private/perfilUsuarioBuscado') ?> ">Buscar usuario</a></li>
                                <li><a href= " <?php echo site_url('cerrarSesion') ?>">Cerrar cesion</a></li>
                            </ul>
                          </li>
                  <?php
                    }
                    ?>
                </ul>

            </div>

        </div>
    </nav>

    <div class="container-fluid text-center" >
        <div class="row content">

            <!--<div class="col-sm-2 sidenav">
              <p><a href="#">Link</a></p>
              <p><a href="#">Link</a></p>
              <p><a href="#">Link</a></p>
            </div>-->
            <div class="col-sm-12 text-left">
                <h1>Bienvenido a la universidad de Alicante</h1>
                <div> <img src="<?php echo base_url();?>assets/img/ua3.jpg" alt="Smiley face" height="240px" width="100%"></div>
                <div style="background-color:#F5F5DC">
                    <h2>Cómo funciona?</h2>
                    <div class="olli">
                        <ol >
                            <li class="lli">
                                <h3>¿Vas a la universidad?</h3>
                                <p>Encuentras usuarios que van a la universidad de Alicante.</p>
                            </li>
                            <li class="lli">
                                <h3>Confirmas la reserva</h3>
                                <p>Los usuarios reservan las plazas libres online.</p>
                            </li>
                            <li class="lli">
                                <h3>¡A viajar!</h3>
                                <p>Compartes coche y dejas una opinión a tus compañeros.</p>
                            </li>

                        </ol>
                    </div>

                    <div class="olli">
                        <ol >
                            <li class="lli">
                                <h3>¿Buscas aparcamiento?</h3>
                                <p>Encuentras hueco en los aparcamientos de la ua.</p>
                            </li>

                            <li class="lli">
                                <h3>Confirmas el aparcamiento</h3>
                                <p>Los usuarios reservan las plazas libres online.</p>
                            </li>
                            <li class="lli">
                                <h3>¡Aparcar!</h3>
                                <p>una vez sales de tu aparcamiento, ha de indicar que el espacio esta libre.</p>
                            </li>
                        </ol>
                    </div>

                </div>


                <div class="container-fluid">

                    <div class="row">

                        <div class="col-sm-4">
                            <h2>Compartir coche con Usuarios de la universidad</h2>
                            <img src="<?php echo base_url();?>assets/img/ua5.jpg" alt="Smiley face" height="200px" width="100%">
                            <p class="text-muted" style="font-size:large;padding:10px;">Los usuarios que pretenden buscar alguien con un coche que a su vez necesita gente para ir o venir, mediante la uaapp, se puede buscar quien se
                                ofrece a llevar gente en su coche, el precio es muy justo, no se puede ganar mas de lo que se pueda</p>
                        </div>
                        <div class="col-sm-4">
                            <h2>Ver parkings de la universidad</h2>
                            <a href="<?php echo site_url('public/mapa') ?>">
                                  <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5998.817894524047!2d-0.5136190900668747!3d38.38389198751182!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x506e11c403138428!2sUniversidad+de+Alicante!5e1!3m2!1ses!2ses!4v1503742046403" width="400" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>-->
                                <img style="padding-top:10px" src="<?php echo base_url();?>assets/img/ua.PNG" alt="Smiley face" height="100%" width="100%">
                            </a>
                            <!--<div id="map"></div>-->

                        </div>
                        <div class="col-sm-4">
                            <h2>Buscar parking en la universidad sin perder mucho tiempo</h2>
                            <img src="<?php echo base_url();?>assets/img/ua6.jpg" alt="Smiley face" height="200px" width="100%">
                            <p class="text-muted" style="font-size:large;padding:10px;">Ahora ya no se pierde mucho tiempo para buscar aparcamiento en la ua,
                                solo por ser usuario de la uaapp, se sabe las zonas que estan libres, y asi segun el aparcamiento donde quiera el usuario
                                aparcar, lo consulta, y le sale el resultado, de los huecos libres</p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="container-fluid footer text-justify">
        <p>Uaapp es una app que pretende ayudar a la comunidad universitaria a compartir coche y buscar aparcamientos de la ua. Uaapp conecta usuarios registrados
            que parten del mismo lugar o se encuentran en la misma ruta por donde pasa el propietario del coche, asi como encontrar un aparcameinto, sin perder mucho tiempo.
        </p>
    </div>
</div>

</body>
</html>

