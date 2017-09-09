
<?php
$this->load->view('private/include/cabecera');
?>

<div class="col-md-8 col-md-offset-2" style="margin-bottom: 0px">
    <h3>Zona ocupada</h3>
    <hr>

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

        <div style="background-color:#F5F5DC;height:950px">
            <div style="margin-left:100px" class="col-lg-8">
                <?php  if(isset ($Info)) {?>
                    <div class="alert alert-info">
                        <strong>Info!</strong>  <?php echo $Info ?>.
                    </div>


                    <form  action="<?php echo site_url('desoccupyZoneParking')?>" name="myForm"  class="form-horizontal" method="GET">
                        <div class="form-group" >
                            <label for="codZonaOcupada">Zona ocupada</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
                                <input name="codZonaOcupada" type="text" class="form-control" id="codZonaOcupada"  value="<?php if (isset($espacioOcupado))echo  $espacioOcupado ?>" disabled><span class="input-group-addon"></span>
                            </div>
                        </div>

                        <input type="hidden" name="codeZoneParking" value=<?php if (isset($espacioOcupado))echo  $espacioOcupado?>>
                        <div class="form-group">
                            <input type="submit" value="Desocupar zona ocupada" class="btn btn-primary">
                        </div>
                    </form>

                <?php   } ?>
            </div>
            <div id="map" style="width: 100%; height: 600px;"></div>
        </div>
    </div>
</div>

<?php
$this->load->view('private/include/pie');
?>