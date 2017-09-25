<?php
$this->load->view('public/include/cabecera');
?>

<div class="col-md-8 col-md-offset-2" style="">
    <h1>Informacion</h1>
    <!--<div class="alert alert-success">
        <strong>Success!</strong> Tu registro se realizo con exito.
    </div>-->
    <div class="panel-body">
        <?php if(isset($nombre)){?>
        Estimado/a <?php   echo $nombre;?>:
        Hemos recibido una solicitud para actualizar su contraseña.
        Usando su dirección de correo electrónico, le hemos enviado un correo para poder realizar la actualizacion.
        <span style="color:#0000FF">Solo falta ir a tu correo, ver el contenido y hacer click sobre el enlace
            y seguir los pasos para poder llevar acabo la actualizacion</span>
        <?php } else{?>

            <div class="alert alert-danger">
                <strong>Error!</strong> <?php echo $Error?>.
            </div>
        <?php } ?>
    </div>

</div>

<?php
$this->load->view('public/include/pie');
?>

