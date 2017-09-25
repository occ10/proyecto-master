<?php
$this->load->view('private/include/passHeader');

?>

    <div class="col-md-8 col-md-offset-2" style="">
        <h1>Gestión de la clave</h1>
        <hr>
        <h4>Nota: campos con <i style="color:red">*</i> son obligatrios</h4>
        <div class="panel-body" >
            <div style="background-color:#F5F5DC;height:300px">
                <div style="margin-left:100px;padding-top: 60px" class="col-lg-8"  >
                    <?php
                    if(isset($Exito)) {
                        ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> <?php echo $Exito ?>.
                        </div>
                        <?php
                    }else if(isset($Error)){
                        ?>
                        <div class="alert alert-danger">
                            <strong>Danger!</strong> <?php echo $Error ?>.
                        </div>
                        <?php
                    }else{
                    ?>
                    <form  action="<?php echo site_url('private/recoverUpdatePassword/' .  $correo  )?>" name="myForm"  class="form-horizontal" method="post">

                        <div class="form-group">
                            <label for="modelo">Nueva contraseña:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input class="form-control passNew" type="password" name="password4" id="password4" placeholder="Contraseña nueva" value="<?php  //echo $this->session->userdata('user')->contraseña ?>" required> <span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                            </div>
                            <i id="newRecoverPassword" class="newPasswordAdd" style="color:red"></i>
                        </div>

                        <div class="form-group">
                            <label for="modelo">Confirma nueva contraseña:</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input class="form-control passNew" type="password" name="password5" id="password5" placeholder="Confirmar nueva ontraseña" value="<?php  //echo $this->session->userdata('user')->contraseña ?>" required> <span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                            </div>
                            <i id="confRecoverNewPassword" class="newPasswordAdd" style="color:red"></i>
                        </div>

                        <div class="form-group">
                            <i id="boRecoverPass" class="newPasswordAdd" style="color:red"></i>
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" value="Submit" class="btn btn-primary boUsuarioX" id="boUpdateRecoverPass">
                            </div>
                        </div>

                    </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
<?php
$this->load->view('private/include/pie');
?>