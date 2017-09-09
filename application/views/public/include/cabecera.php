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

    <title>Simple Sidebar - Start Bootstrap Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url();?>assets/include/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/register.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/login.css" rel="stylesheet">
    <style>

        .header {
            padding: 1em;
            color: white;
            background-color:#5F9EA0;
            clear: left;
            text-align: center;*/
        }
    </style>
    <script>
        function validateForm() {

            var x = document.forms["myForm"]["password1"].value;
            var y = document.forms["myForm"]["password2"].value;
            if (x != y) {
                alert("los campos de contraseña deben coindicidr");
                return false;
            }
        }

    </script>
</head>
<body>
<div class="center">
    <header>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">

                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo site_url('private/home')?> "> Home</a></li>
                        <li><a href= " <?php echo site_url('modifyPerfil') ?>">Editar perfil</a></li>
                        <li><a href="<?php echo site_url('private/listadoRutas') ?> ">Viajes publicados</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li> <a style='color:#fcfcfc;background: #337AB7; border-radius: 25px;height:35px;padding-top:6px;margin-top:8px;margin-right:20px' href="<?php echo site_url('publicarRuta')?> ">  <i class='glyphicon glyphicon-random'></i>&nbsp;&nbsp;&nbsp;&nbsp;Publicar una ruta </a></li>
                        <li>
                            <button style="margin-top:8px;" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"> Bienvenido  <?php echo $this->session->userdata('user')->nombre ?>
                                <span class="caret"></span></button>
                            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                                <li><a href= " <?php echo site_url('modifyPerfil') ?>">Editar perfil</a></li>
                                <li><a href='#'>CSS</a></li>
                                <li><a href="<?php echo site_url('private/listadoRutas') ?> ">Viajes publicados</a></li>
                                <li><a href= " <?php echo site_url('cerrarSesion') ?>">Cerrar cesion</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>

            </div>
        </nav>
    </header>
    <div class="col-md-8 col-md-offset-3">