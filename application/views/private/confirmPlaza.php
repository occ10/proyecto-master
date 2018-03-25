<?php
$this->load->view('public/include/cabecera');
?>

<div class="col-md-8 col-md-offset-2" style="">
    <h1>Informacion</h1>
    <!--<div class="alert alert-success">
        <strong>Success!</strong> Tu registro se realizo con exito.
    </div>-->
    <div class="panel-body">

        <?php if(isset($Error))
            echo '<div class="alert alert-info">' . $Error . '</div>';
        else
            echo '<div class="alert alert-success">La solicituda se ha confirmado conrrectamente, y asu vez le hemos enviado un correo al usuario solicitante.</div>';
        ?>

    </div>

</div>

<?php
$this->load->view('public/include/pie');
?>
