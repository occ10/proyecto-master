
<?php
$this->load->view('private/include/cabecera');
?>

<div class="col-md-8 col-md-offset-2" style="margin-bottom: 80px">
    <h3>Buscar Usuario</h3>
    <hr>
    <h4>Nota: campos con <i style="color:red">*</i> son obligatrios</h4>
    <?php
    if(isset($Exito)) {
        ?>
        <div class="alert alert-success">
            <strong>Success!</strong> Los datos se han insertado correctamente.
        </div>
        <?php
    }else if(isset($Error)){
        ?>
        <div class="alert alert-danger">
            <strong>Danger!</strong> Ha habido algun error en la insercion de los errores.
        </div>
        <?php
        //private/buscarDetalleUsuario
    }
    ?>
    <div class="panel-body">

        <div style="background-color:#F5F5DC;height:500px">
            <h3 style="padding:30px 0 0 40px">Elige opcion de busqueda</h3>
            <div style="margin:30px 0 0 70px" class="col-lg-10">

                <div>

                    <!--<div class="form-group">
                        <label for="tipoBusqueda">Buscar por:</label>
                        <select class="form-control" name="tipoBusqueda" id="tipoBusqueda" style="width:60%">
                            <option value="nombre">Nombre</option>
                            <option value="telefono">Telefono</option>
                            <option value="origen">Origen</option>


                        </select>
                    </div>-->

                    <form  action="<?php echo site_url('private/buscarUsuariosPorNombre')?>" id="myFormSearchUserName" name="myFormSearchUserName"  class="form-horizontal" method="GET">

                        <!--<div><input type="hidden" name="tipoHidden" id="tipoHidden" value="nombre"></div>-->
                        <div class="form-group" id="formNombre">

                            <label for="nombre">Buscar usuario por nombre</label>
                            <div class="input-group" style="width:60%">
                                <span class="input-group-addon">Text</span>
                                <input name="usuarioNombre" type="text" class="form-control" id="usuarioNombre" placeholder="Ejemplo: Miguel" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                            </div>
                            <i id="messageTipoN" style="color:red"></i>
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Buscar por nombre" class="btn btn-primary" id="boBuscarUsuarioN">
                        </div>
                    </form>

                    <div></div>
                    <form  action="<?php echo site_url('private/buscarDetalleUsuario')?>" id="myFormSearchUserTele" name="myFormSearchUserTele"  class="form-horizontal" method="GET">

                       <!-- <div><input type="hidden" name="tipoHidden" id="tipoHidden" value="nombre"></div>-->

                        <div class="form-group" id="formTelefono" >
                             <label for="telefono">Buscar usuario por telefono</label>
                             <div class="input-group" style="width:60%">
                                 <span class="input-group-addon">Text</span>
                                 <input name="telefono" type="text" class="form-control" id="telefono" placeholder="Ejemplo: 698 756 321" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                             </div>
                            <i id="messageTipoT" style="color:red"></i>
                         </div>
                        <div class="form-group">
                            <input type="submit" value="Buscar por telefono" class="btn btn-primary" id="boBuscarUsuarioT">
                        </div>
                    </form>

                    <div></div>
                    <form  action="<?php echo site_url('private/buscarUsuariosPorOrigen')?>" id="myFormSearchUserOrigen" name="myFormSearchUserOrigen"  class="form-horizontal" method="GET">

                        <!--<div><input type="hidden" name="tipoHidden" id="tipoHidden" value="nombre"></div>-->


                         <div class="form-group" id="formOrigen">

                             <label for="origen">Buscar usuario por origen</label>
                             <div class="input-group" style="width:60%">
                                 <span class="input-group-addon">Text</span>
                                 <input name="origenUsuario" type="text" class="form-control" id="origenUsuario" placeholder="Ejemplo: Elche" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                             </div>
                             <i id="messageTipoO" style="color:red"></i>
                         </div>
                        <div class="form-group">
                            <input type="submit" value="Buscar por origen" class="btn btn-primary" id="boBuscarUsuarioO">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
$this->load->view('private/include/pie');
?>