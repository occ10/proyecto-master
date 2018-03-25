<?php
$this->load->view('public/include/cabecera');
?>

    <div class="col-md-8 col-md-offset-2" style="">
        <h1>Informacion</h1>
        <?php if (isset($message)){?>
            <div class="alert alert-success">
                <strong>Success!</strong> Tu registro se realizo con exito.
            </div>
            <div class="panel-body">
                Estimado/a <?php  if (isset($message)) echo $message->nombre;?>:
                Hemos recibido una solicitud para crear una cuenta en nuestra aplicacion web, usando su dirección de correo electrónico.
                Ya tiene una cuenta en UAAPP con esta dirección de correo electrónico.
                <span style="color:#0000FF">Solo falta confirmar tu solicitud en tu correo, para poder utilizar la aplicacion</span>
            </div>
        <?php }else if (isset($error)){

            echo "<div class=\"alert alert-warning\">" . $error . "</div>";
        }else{
            echo "<div class=\"alert alert-info\">" . $info . "</div>";
        }
            ?>
    </div>

<?php
$this->load->view('public/include/pie');
?>

