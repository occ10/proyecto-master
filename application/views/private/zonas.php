
<?php
$this->load->view('private/include/cabecera');
?>

<div class="col-md-8 col-md-offset-2" style="margin-bottom: 0px">
    <h3>Buscar Parking</h3>
    <hr>

    <div class="panel-body">

        <div style="background-color:#F5F5DC;height:950px">
            <div style="margin-left:100px;padding-top:60px" class="col-lg-8">
                <?php  if(isset ($Resultado) && !empty($Resultado)) {?>
                    <form  action="<?php echo site_url('occupyZoneParking')?>" name="myForm"  class="form-horizontal" method="GET">
                        <div class="form-group">
                            <label for="codZone">Elige Zona para aparcar y actualizar para indicar como zona ocupada:</label>
                            <select class="form-control" name="codZone" id="codZone">
                                <?php

                                foreach($Resultado as $result):
                                    ?>
                                    <option value='<?php echo  $result->id?>'><?php echo  'Z ' . $result->id ?> </option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <input type="hidden" name="codeParking" value=<?php echo $code?>>
                        <div class="form-group">
                            <input type="submit" value="Actualizar Zona como ocupada" class="btn btn-primary">
                        </div>
                    </form>

                <?php   }else{ ?>

                    <div class="alert alert-info">
                        <strong>Info!</strong> De momento todos las zonas del parking solicitado estan ocupadas, vuelve a la pagina anterior y busca en otro parking.
                    </div>

                <?php } ?>
            </div>
            <div id="map" style="width: 100%; height: 600px;"></div>
        </div>
    </div>
</div>

<?php
$this->load->view('private/include/pie');
?>