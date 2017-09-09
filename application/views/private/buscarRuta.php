
<?php
$this->load->view('private/include/cabecera');
?>

<div class="col-md-8 col-md-offset-2" style="margin-bottom: 80px">
    <h3>Buscar Ruta</h3>
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
    }
    ?>
    <div class="panel-body">

        <div style="background-color:#F5F5DC;height:700px">
            <div style="margin:30px 0 0 70px" class="col-lg-10">
                <div>
                    <form  action="<?php echo site_url('private/buscarAnuncios')?>" name="myForm"  class="form-horizontal" method="get">

                        <div class="form-group">

                            <label for="origen">Salida</label>
                            <div class="input-group" style="width:60%">
                                <span class="input-group-addon">Text</span>
                                <input name="origen" type="text" class="form-control" id="origen" placeholder="Ejemplo: Elche" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                            </div>
                        </div>

                        <!--<div style="padding:10px;"><a href="#" onclick="anyadirPasos();"> + Añadir mas puntos de paso</a></div>-->
                        <div class="form-group">
                            <input type="submit" value="Buscar" class="btn btn-primary">
                        </div>
                    </form>
                </div>
                <div style="padding-top: 0">
                    <img style="padding-top:10px" src="<?php echo base_url();?>assets/img/mapa2.PNG" alt="Smiley face" height="100%" width="100%">
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$this->load->view('private/include/pie');
?>