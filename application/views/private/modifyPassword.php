<?php
$this->load->view('private/include/cabecera');
$this->load->view('private/include/menu');
?>

<div class="col-sm-8 text-left" style="margin-bottom: 80px">
    <h1>Gestión de la clave</h1>
    <hr>
    <h4>Nota: campos con <i style="color:red">*</i> son obligatrios</h4>
    <div class="panel-body" >
        <div style="background-color:#F5F5DC;height:500px">
            <div style="margin-left:100px" class="col-lg-8"  >
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
                }
                ?>
                <form  action="<?php echo site_url('private/modifyPassword')?>" name="myForm"  class="form-horizontal" method="post">

                    <div class="form-group">
                                <label for="modelo">Contraseña actual:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input class="form-control" type="password" name="password1" id="password1" placeholder="Contraseña actual" value="<?php  //echo $this->session->userdata('user')->contraseña ?>" required> <span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                                </div>
                            </div>

                    <div class="form-group">
                        <label for="modelo">Nueva contraseña:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input class="form-control" type="password" name="password2" id="password2" placeholder="Contraseña nueva" value="<?php  //echo $this->session->userdata('user')->contraseña ?>" required> <span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="modelo">Confirma nueva contraseña:</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input class="form-control" type="password" name="password3" id="password3" placeholder="Confirmar nueva ontraseña" value="<?php  //echo $this->session->userdata('user')->contraseña ?>" required> <span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('private/include/pie');
?>
