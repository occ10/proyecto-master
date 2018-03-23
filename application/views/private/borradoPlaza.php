<?php
$this->load->view('public/include/cabecera');
?>

<div class="col-md-8 col-md-offset-2" style="">
    <h1>Informacion</h1>
    <!--<div class="alert alert-success">
        <strong>Success!</strong> Tu registro se realizo con exito.
    </div>-->
    <div class="panel-body">

        <?php if(isset($boradoReserva) and $boradoReserva == true )
            echo 'La operacion se ha realizado correctamente.';
        else
            echo 'El usuario ya no forma parte de la ruta.'
        ?>

    </div>

</div>

<?php
$this->load->view('public/include/pie');
?>
