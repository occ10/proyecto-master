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

    <div class="col-md-8 col-md-offset-3" >
        <h1>Registrarte</h1>
        <h4>Nota: campos con <i style="color:red">*</i> son obligatrios</h4>
        <div class="panel-body">
                <div class="col-lg-8">
                    <!--onsubmit="return validateForm()"-->
                    <form  action="<?php echo site_url('registroUser')?>" name="myForm"  class="form-horizontal" method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input type="text" name="nombre" class="form-control" id="inputNombre" placeholder="Nombre"   required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon">Text</span>
                                <input type="text" name="apellido" class="form-control" id="Apellido" placeholder=" Apellido" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input type="text" name="correo" class="form-control" id="correoElectronico" placeholder="Correo Electronico" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                            </div>
                            <i id="messageCorreo" style="color:red"></i>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Telefono"><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="bday">Edad:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                <input class="form-control" type="number" name="bday"   id="bday" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                            </div>
                        </div>
                        <!--<div class="form-group" id="detalleRegistro" >
                            <label for="detalle">Descripcion...</label>
                            <div class="input-group">
                                <textarea wrap="physical" name="detalle" id="detalle" rows="4" cols="50" placeholder="En pocas palabras... Vivo en torrevieja y trabajo en Valencia, me tengo que desplazar casi todos los dias de un a sitio a otro." class="form-control" required></textarea>
                            </div>
                        </div>-->
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input class="form-control" type="password" name="password" id="password1" placeholder="Contraseña" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                            </div>
                        </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <input type="submit" value="Regisrar" class="btn btn-primary" id="boUsuario">
                                </div>
                            </div>

                    </form>
                </div>
            </div>

    </div>
    <div class="footer">
        <p>Posted by: Hege Refsnes</p>
        <p>Contact information: <a href="mailto:someone@example.com">someone@example.com</a>.</p>
    </div>
</div>
</body>

</html>
