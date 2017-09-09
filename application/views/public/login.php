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
    <div class="header">
        <h1>City Gallery</h1>
    </div>

    <div class="col-md-8 col-md-offset-3">
        <h1>Identificate</h1>
        <?php
           if(isset($Error)) {
               ?>
               <div class="alert alert-danger">
                   <strong>Info!</strong> Los datos son incorrectos.
               </div>
               <?php
           }
        ?>

        <div class="panel-body">
            <div class="row">
                <div class="col-lg-8">
                    <!--onsubmit="return validateForm()"-->
                    <form   action="<?php echo site_url('loginUser')?>" name="myForm" class="form-horizontal" method="post">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input type="text" name="correo" class="form-control" id="correoElectronico" placeholder="Correo Electronico" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input class="form-control" name="contraseña" type="password" id="password1" placeholder="Contraseña" required>
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input class="form-control" type="text" id="password2" placeholder="Repetir Contraseña" required>
                            </div>
                        </div>	-->
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox"> Remember me
                                </label>
                            </div>
                        </div>
                        <div> <a href="./recuperacionClave.html">¿Has olvidado los datos de la cuenta?</a></div>
                        <div class="form-group">
                            <input type="submit" value="Login" class="btn btn-primary">
                        </div>
                    </form>
                </div>
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
