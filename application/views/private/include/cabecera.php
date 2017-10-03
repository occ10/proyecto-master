<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/include/js/index.js"></script>

    <title>AppUa</title>

    <link href="<?php echo base_url();?>assets/include/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/perfil.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>assets/img/ua.PNG">
    <!--<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">-->

    <?php
    if(isset($css_files) && isset($js_files)):
    foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />

    <?php endforeach;
    foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    <?php else: ?>
        <!-- jQuery -->


        <script src="<?php echo base_url();?>assets/include/js/jquery-3.2.1.min.js"></script>
    <?php endif;?>
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


        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }


        }
        ul {
            list-style-type: none;
        }

        .paginacion{
            background-color: 	#F5F5F5;
            padding: 20px 0 0 0;
            margin: auto;
            width: 500px;
            height:80px;
            text-align: center;
            margin-top:40px;
            padding-top: 30px;


        }
        .paginacion a{
            text-decoration: none;
            padding: 0;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            margin:0;
            width:80%;

        }
        .paginacion a:hover{
            background-color:#333333;
            color: #C0C0C0;

        }
        .pagination a:hover:not(.active) {
            background-color: #ddd;
            border-radius: 5px;
        }
        .pagination a.active {
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
        }
        .actual{
            color: #FFFFFF;
            padding: 4px;
        }
        .flex-container {
            display: -webkit-flex;
            display: flex;
            width: 100%;
            height: 100%;
           /* background-color: lightgrey;*/
        }

    </style>
    <script type="text/javascript">
        $(function(){
            $( "#matricula" ).blur(function(event)
            {

                event.preventDefault();
                var matricula= $("#matricula").val();
                var url= "<?php echo base_url(); ?>private/matricula/"+matricula;
               //alert(url)
               $.ajax(
                    {
                        type:"GET",
                        url: url,
                        success:function(response)
                        {

                            if(response=='false') {
                                $("#message").html("Ya hay un coche con esta matricula, introduzca matricula correcta");
                                $('form input[id="boCoche"]').prop("disabled", true);
                            }else{
                                $("#message").html("");
                                $('form input[id="boCoche"]').prop("disabled", false);
                            }


                        },
                        error: function(error)
                        {
                            $("#message").html(error);
                        }
                    }
                );
            });
        });





    </script>

</head>
<body>
<div class="center">
    <div>

            <nav class="navbar navbar-inverse">
                <div class="container-fluid">

                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="<?php echo site_url('private/home')?> "> Home</a></li>
                            <li><a href= " <?php echo site_url('modifyPerfil') ?>">Editar perfil</a></li>
                            <li><a href="<?php echo site_url('private/listadoRutas') ?> ">Viajes publicados</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">

                                <li> <a style='color:#fcfcfc;background: #337AB7; border-radius: 25px;height:35px;padding-top:6px;margin-top:8px;margin-right:20px' href="<?php echo site_url('buscarRuta')?> ">  <i class='glyphicon glyphicon-search'></i>&nbsp;&nbsp;&nbsp;&nbsp;Buscar anuncio </a></li>
                                <li> <a style='color:#fcfcfc;background: #337AB7; border-radius: 25px;height:35px;padding-top:6px;margin-top:8px;margin-right:20px' href="<?php echo site_url('publicarRuta')?> ">  <i class='glyphicon glyphicon-road'></i>&nbsp;&nbsp;&nbsp;&nbsp;Publicar anuncio </a></li>
                            <li> <a style='color:#fcfcfc;background: #337AB7; border-radius: 25px;height:35px;padding-top:6px;margin-top:8px;margin-right:20px' href="<?php echo site_url('buscarParking') ?>" > <i class='glyphicon glyphicon-random'></i>&nbsp;&nbsp;&nbsp;&nbsp;Buscar parking </a></li>

                            <li>
                                    <button style="margin-top:8px;" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> Bienvenido  <?php echo $this->session->userdata('user')->nombre ?>
                                        <span class="caret"></span></button>
                                    <ul class="dropdown-menu" role="menu1" aria-labelledby="menu1">
                                        <li><a href= " <?php echo site_url('modifyPerfil') ?>">Editar perfil</a></li>
                                        <li><a href='<?php echo site_url('private') ?>'>Admin</a></li>
                                        <li><a href="<?php echo site_url('private/listadoRutas') ?> ">Viajes publicados</a></li>
                                        <li><a href="<?php echo site_url('private/perfilUsuarioBuscado') ?> ">Buscar usuario</a></li>
                                        <li><a href= " <?php echo site_url('cerrarSesion') ?>">Cerrar cesion</a></li>
                                    </ul>
                                </li>
                        </ul>

                    </div>

                </div>
            </nav>
    </div>
    <div class="row">
