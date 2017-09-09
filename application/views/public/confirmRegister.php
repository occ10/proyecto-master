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
    <script src="<?php echo base_url();?>assets/include/js/jquery-3.2.1.min.js"></script>
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
            $("#correoElectronico").blur(function(event)
            {

                event.preventDefault();
                var correo= $("#correoElectronico").val();
                var url= "<?php echo base_url(); ?>private/correo/"+correo;

                $.ajax(
                    {
                        type:"GET",
                        url: url,
                        success:function(response)
                        {

                            if(response=='false') {
                                $("#messageCorreo").html("Ya hay un usuario con esta cuenta, introduzca  otra cuenta");
                                $('form input[id="boUsuario"]').prop("disabled", true);
                            }else{
                                $("#messageCorreo").html("");
                                $('form input[id="boUsuario"]').prop("disabled", false);
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
    <div class="header">
        <h1>City Gallery</h1>
    </div>

    <div class="col-md-8 col-md-offset-2" style="">
        <h1>Informacion</h1>
        <div class="alert alert-success">
            <strong>Success!</strong> Tu registro se realizo con exito.
        </div>
        <div class="panel-body">
            Estimado/a <?php  if (isset($message)) echo $message->nombre;?>:
            Hemos recibido una solicitud para crear una cuenta en nuestra aplicacion web, usando su dirección de correo electrónico.
            Ya tiene una cuenta en UAAPP con esta dirección de correo electrónico.
            <span style="color:#0000FF">Solo falta confirmar tu solicitud en tu correo, para poder utilizar la aplicacion</span>
        </div>

    </div>
    <div class="footer">
        <p>Posted by: Hege Refsnes</p>
        <p>Contact information: <a href="mailto:someone@example.com">someone@example.com</a>.</p>
    </div>
</div>
</body>

</html>
