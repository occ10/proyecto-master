<?php
$this->load->view('public/include/cabecera');
?>

<div class="col-md-8 col-md-offset-2" style="margin-bottom: 80px">
    <h1>Introduzca tu correo</h1>
    <hr>
    <h4>Nota: campos con <i style="color:red">*</i> son obligatrios</h4>
    <div class="panel-body">
        <div style="background-color:#F5F5DC;height:350px;">
            <div class="col-lg-8" style="margin-left:100px;padding-top: 140px">
                <?php
                if(isset($Error)) {
                    ?>
                    <div class="alert alert-danger">
                        <strong>Info!</strong> <?php echo  $Error ?>
                    </div>
                    <?php
                }
                ?>
                <form   action="<?php echo site_url('public/updatePass')?>" name="myForm" class="form-horizontal" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                            <input type="text" name="correo" class="form-control" id="correoElectronico" placeholder="Correo Electronico" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Send" class="btn btn-primary boUsuarioX">
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>

<?php
$this->load->view('public/include/pie');
?>
