<?php
$this->load->view('private/include/cabecera');
$this->load->view('private/include/menu');
?>

        <div class="col-sm-8 text-left" style="margin-bottom: 80px">
            <h1>Información personal</h1>
            <hr>
            <h4>Nota: campos con <i style="color:red">*</i> son obligatrios</h4>
            <?php
            if(isset($Exito)) {
                ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> Los datos se han actualizado correctamente.
                </div>
                <?php
            }else if(isset($Error)){
            ?>
                <div class="alert alert-danger">
                    <strong>Danger!</strong> Ha habido algun error en la actualizacion de los errores.
                </div>
            <?php
            }
            ?>
            <div class="panel-body" >
                <div style="background-color:#F5F5DC;height:500px">
                    <div style="margin-left:100px" class="col-lg-8"  >
                        <form  action="<?php echo site_url('updateUser')?>" name="myForm"  class="form-horizontal" method="post">
                            <div class="form-group">
                                <label for="modelo">Nombre:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" name="nombre" class="form-control" id="inputNombre" placeholder="Nombre"   value="<?php  echo $this->session->userdata('user')->nombre ?>" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="modelo">Apellido:</label>
                                <div class="input-group">
                                    <span class="input-group-addon">Text</span>
                                    <input type="text" name="apellido" class="form-control" id="Apellido" placeholder=" Apellido" value="<?php  echo $this->session->userdata('user')->apellido ?>" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="modelo">Correo electrónico:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="text" name="correo" class="form-control" id="correoElectronico" placeholder="Correo Electronico" value="<?php  echo $this->session->userdata('user')->correo ?>"required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="modelo">Teléfono:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                    <input type="tel" name="telefono" class="form-control telUser" id="telefono" placeholder="Telefono" value="<?php  echo $this->session->userdata('user')->telefono ?>" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                                </div>
                                <i class="messageR" id="messageReg" style="color:red"></i>
                            </div>
                            <div class="form-group">
                                <label for="fechaNacimiento">Edad:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input class="form-control" type="number" min="18" max="75" name="bday" value="<?php  echo $this->session->userdata('user')->edad?>"  required><span class="input-group-addon" value="20" required><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                                </div>
                            </div>
                            <!--<div class="form-group">
                                <label for="modelo">Contraseña:</label>
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input class="form-control" type="password" name="password" id="password1" placeholder="Contraseña" value="<?php  //echo $this->session->userdata('user')->contraseña ?>" >span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                                </div>
                            </div>-->
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
