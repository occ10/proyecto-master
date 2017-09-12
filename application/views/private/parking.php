
<?php
$this->load->view('private/include/cabecera');
?>

<div class="col-md-8 col-md-offset-2" style="margin-bottom: 0px">
    <h3>Buscar Parking</h3>
    <hr>
    <h4>Elige parking</h4>

    <div class="panel-body">

        <div style="background-color:#F5F5DC;height:900px">
            <div style="margin-left:100px" class="col-lg-8">
                <?php
                if(isset($Info)){
                    ?>
                    <div class="alert alert-info">
                        <strong>Info!</strong> <?php echo $Info ?>
                    </div>
                    <?php
                }
                ?>
                <form  action="<?php echo site_url('findZoneParking')?>" name="myForm"  class="form-horizontal" method="GET">
                    <div class="form-group">
                        <label for="codParking">Elige parking:</label>
                        <select class="form-control" name="codParking" id="codParking">
                            <?php
                            if (isset($corrdenates)){
                                foreach($corrdenates as $result):
                                    ?>
                                    <option value='<?php echo  $result->codigo ?>'> parking <?php echo  $result->id ?> </option>
                                    <?php
                                endforeach;
                            }?>
                        </select>
                    </div>
                    <!--<div class="form-group">

                        <label for="origen">Salida</label>
                        <div class="input-group">
                            <span class="input-group-addon">Text</span>
                            <input name="origen" type="text" class="form-control" id="origen" placeholder="Ejemplo: Elche" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                        </div>
                    </div>
                    <div class="form-group">
                         <label for="destino">Destino</label>
                         <div class="input-group">
                             <span class="input-group-addon">Text</span>
                             <input name="destino" type="text" class="form-control" id="destino" placeholder="Ejemplo: Alicante" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                         </div>
                     </div>-->
                    <!--<div class="form-group" >
                        <label for="precio">Precio</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-eur"></i></span>
                            <input name="precio" type="text" class="form-control" id="precio" placeholder="Ejemplo: 3" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                        </div>
                    </div>

                    <div class="form-group" >
                        <label for="plaza">Plazas disponibles</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i>N</i></span>
                            <input name="plaza" type="number"  min="1" max="4" class="form-control" id="plaza" placeholder="Ejemplo: 3" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>

                        </div>
                    </div>
                    <div class="form-group" >
                        <div class="input-group">
                            <label for="detalle">Detalles</label>
                            <textarea name="detalle" class="form-control" id="detalle" placeholder="Ejemplo: Voy a La universidad de Alicante todos los dias, salgo de Torrevieja, tengo clases solo por las mañanas" rows="6" cols="50"></textarea>
                        </div>
                    </div>-->
                    <!--<div style="padding:10px;"><a href="#" onclick="anyadirPasos();"> + Añadir mas puntos de paso</a></div>-->
                    <div class="form-group">
                        <input type="submit" value="Buscar aparcamiento" class="btn btn-primary">
                    </div>
                </form>

                <?php  if(isset ($Resultado)) {?>
                <form  action="<?php echo site_url('findZoneParking')?>" name="myForm"  class="form-horizontal" method="post">
                    <div class="form-group">
                        <label for="codParking">Elige Zona para aparcar y actualizar para indicar como zona ocupada:</label>
                        <select class="form-control" name="codParking" id="codParking">
                            <?php

                                foreach($Resultado as $result):
                                    ?>
                                    <option value='<?php echo  $result->id?>'><?php echo  'Z ' . $result->id ?> </option>
                                    <?php
                                endforeach;
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Actualizar Zona como ocupada" class="btn btn-primary">
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