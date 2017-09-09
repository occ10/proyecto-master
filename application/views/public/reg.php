<?php
$this->load->view('public/include/cabecera');
?>

<div class="col-md-8 col-md-offset-2" style="margin-bottom: 80px">
    <h1>Registrarte</h1>
    <hr>
    <h4>Nota: campos con <i style="color:red">*</i> son obligatrios</h4>
    <div class="panel-body">
        <div style="background-color:#F5F5DC;height:600px;">
        <div class="col-lg-8" style="margin-left:100px;padding-top: 20px">
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
                        <input type="text" name="telefonoReg" class="form-control" id="telefonoReg" placeholder="Telefono"><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                    </div>
                    <i id="messageReg" style="color:red"></i>
                </div>
                <div class="form-group">
                    <label for="bday">Edad:</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input class="form-control" type="number" name="bday"   id="bday" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                    </div>
                </div>
                <div class="form-group" id="detalleRegistro" >
                    <label for="detalles">Descripcion...</label>
                    <div class="input-group">
                        <textarea  name="detalles" id="detalles" rows="4" cols="50" placeholder="En pocas palabras... Vivo en torrevieja y trabajo en Valencia, me tengo que desplazar casi todos los dias de un a sitio a otro." class="form-control" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input class="form-control" type="password" name="password" id="password1" placeholder="Contraseña" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" value="Regisrar" class="btn btn-primary" id="boUsuarioReg">
                    </div>
                </div>

            </form>
        </div>
    </div>
    </div>

</div>

<?php
$this->load->view('public/include/pie');
?>