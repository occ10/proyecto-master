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
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url();?>assets/img/ua.PNG">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/include/js/index.js"></script>

    <title>AppUa</title>

    <link href="<?php echo base_url();?>assets/include/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/perfil.css" rel="stylesheet">
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

        .header {
            padding: 1em;
            color: white;
            background-color:#5F9EA0;
            clear: left;
            text-align: center;
        }
    </style>
    <script type="text/javascript">
        function validateForm() {

            var x = document.forms["myForm"]["password1"].value;
            var y = document.forms["myForm"]["password2"].value;
            if (x != y) {
                alert("los campos de contraseña deben coindicidr");
                return false;
            }
        }


        $(function(){
            $(".correoElectronicoMessage").blur(function(event) {


                event.preventDefault();
                var correo = $(".correoElectronicoMessage").val();
                var pattern = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
                if (pattern.test(correo)) {


                var url = "<?php echo base_url(); ?>private/correo/" + correo;

                $.ajax(
                    {
                        type: "GET",
                        url: url,
                        async: false,
                        success: function (response) {

                            if (response == 'false') {
                                $("#messageCorreo").html("Ya hay un usuario con esta cuenta, introduzca  otra cuenta");
                                $('form input[id="boUsuario"]').prop("disabled", true);
                                return false;
                            } else {
                                $("#messageCorreo").html("");
                                $('form input[id="boUsuario"]').prop("disabled", false);
                                return true;
                            }


                        },
                        error: function (error) {
                            $("#messageCorreo").html(error);
                            $('form input[id="boUsuario"]').prop("disabled", true);
                        }
                    }
                );
            }else{
                    $("#messageCorreo").html("El formato del correo no es correcto");
                    $('form input[id="boUsuario"]').prop("disabled", true);
                    //return false;
            }
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
                    </ul>

                </div>

            </div>
        </nav>
    </div>
    <div class="row">