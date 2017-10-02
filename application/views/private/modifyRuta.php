
<?php
$this->load->view('private/include/cabecera');
?>

<div class="col-md-8 col-md-offset-2"  style="margin-bottom: 80px">
    <h3>Actualizar Ruta</h3>
    <hr>

    <div class="panel-body">
        <div class="row" style="background-color:#F5F5DC;height:680px">
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
                    <strong>Danger!</strong> Ha habido algun error en la actualizacion de los datos.
                </div>
                <?php
            }
            else{
            ?>
            <div style="margin-left:100px;padding-top:60px" class="col-lg-8">


                <form  action="<?php echo site_url('private/updateRuta')?>" name="myForm"  class="form-horizontal" method="post">

                    <input name="matricula" type="hidden"  id="matricula"  value="<?php if (isset($coche))echo  $coche->matricula ?>" >
                   <!-- <div class="form-group">
                        <label for="modelo">Coche:</label>
                        <!--<select class="form-control" name="matricula" id="matricula">
                            <?php
                            //if (isset($coches)){
                                //foreach($coches as $coche):
                                    ?>
                                    <option value='<?php //echo  $coche->matricula ?>'>  <?php //echo  $coche->matricula ?> </option>
                                    <?php
                               // endforeach;
                           // }?>
                        </select>
                        <div class="input-group">
                            <span class="input-group-addon">Text</span>
                            <input name="matricula" type="text" class="form-control" id="matricula"  disabled value="<?php if (isset($coche))echo  $coche->matricula ?>" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                        </div>
                    </div>-->
                    <div>
                        <input type="hidden" name="id" value="<?php  if (isset($ruta)) echo $ruta->id ?>">
                    </div>
                    <div class="form-group">

                        <label for="origen">Salida</label>
                        <div class="input-group">
                            <span class="input-group-addon">Text</span>
                            <input name="origen" type="text" class="form-control" id="origen" placeholder="Ejemplo: Elche" value="<?php if (isset($ruta))echo  $ruta->origen ?>" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                        </div>
                    </div>
                   <!-- <div class="form-group">
                        <label for="destino">Destino</label>
                        <div class="input-group">
                            <span class="input-group-addon">Text</span>
                            <input name="destino" type="text" class="form-control" id="destino" placeholder="Ejemplo: Alicante" value="<?php if (isset($ruta))echo  $ruta->destino ?>" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                        </div>
                    </div>-->
                    <div class="form-group" >
                        <label for="precio">Precio</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-eur"></i></span>
                            <input name="precio" type="text" class="form-control" id="precio" placeholder="Ejemplo: 3" value="<?php if (isset($ruta))echo  $ruta->precio ?>" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>
                        </div>
                    </div>

                    <div class="form-group" >
                        <label for="plaza">Plazas disponibles</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i>N</i></span>
                            <input name="plaza" type="number" name="quantity" min="1" max="4" class="form-control" id="plaza" placeholder="Ejemplo: 3" value="<?php if (isset($ruta))echo  $ruta->plazas ?>" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>

                        </div>
                    </div>
                    <div class="form-group" >
                        <label for="plaza">Plazas ocupadas</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i>N</i></span>
                            <input name="plazaOcupadas" type="number" name="quantity" min="1" max=<?php if(isset ($ruta)) echo $ruta->plazas;?>  class="form-control" id="plazaOcupadas" placeholder="Ejemplo: 3" value="<?php if (isset($ruta))echo  $ruta->plazasOcupadas ?>" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>

                        </div>
                    </div>
                    <div class="form-group" >
                        <div class="input-group">
                            <label for="detalle">Detalles</label>
                            <textarea name="detalle"  class="form-control" id="detalle" placeholder="Ejemplo: Voy a La universidad de Alicante todos los dias, salgo de Torrevieja, tengo clases solo por las mañanas" rows="6" cols="50"><?php if (isset($ruta))echo  $ruta->detalles ?></textarea>
                        </div>
                    </div>
                    <!--<div style="padding:10px;"><a href="#" onclick="anyadirPasos();"> + Añadir mas puntos de paso</a></div>-->
                    <div class="form-group">
                        <input type="submit" value="Actualizar" class="btn btn-primary">
                    </div>
                </form>


            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php
$this->load->view('private/include/pie');
?>