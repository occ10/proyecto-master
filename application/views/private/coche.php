<?php
$this->load->view('private/include/cabecera');
$this->load->view('private/include/menu');
?>

<div class="col-sm-8 text-left" style="margin-bottom: 80px">
    <h1>Información sobre tu coche</h1>
    <hr>
    <?php
    if(isset($result1) && $result1 == false){
        ?>

    <h4>Nota: campos con <i style="color:red">*</i> son obligatrios</h4>
<?php }?>
    <div class="panel-body">
        <div style="background-color:#F5F5DC;height:600px;width:600px">

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
                        <strong>Danger!</strong> <?echo $Error  ?>.
                    </div>
                    <?php
                }else if(isset($errorCar)){
                    ?>
                    <div class="alert alert-danger">
                        <?php
                        //foreach ($errorCoche as $error):
                        echo  $errorCar;
                        // endforeach;
                        ?>
                    </div>
                    <?php
                }else if(isset($result3)) {
                    ?>
                    <div class="alert alert-success">
                        <strong>Success!</strong> El coche se ha borrado correctamente.
                    </div>
                    <?php


                }else{
           ?>
            <div style="margin-left:150px" class="col-lg-6" >
                <?php
                if(!isset($result1)){

                ?>

                <?php echo form_open_multipart('insertCar',array('id' => 'formelement'));?>


               <!-- <form  action="<?php //echo site_url('insertCar')?>" name="myForm"  class="form-horizontal" method="post">-->
                    <div class="form-group">
                        <label for="marca">Matricula:</label>
                        <div class="input-group">

                            <span class="input-group-addon">Text</span>
                            <input type="text" name="matricula" class="form-control" id="matricula" placeholder="Ejemplo: 2316BKK" required>
                            <span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>

                        </div>
                        <i id="message" style="color:red"></i>
                    </div>
                    <div class="form-group">
                        <label for="marca">Marca:</label>
                        <select class="form-control" name="marca" id="marca">
                            <option value="A15">A15</option>
                            <option value="AUDI">AUDI</option>
                            <option value="CHEVROLET">CHEVROLET</option>
                            <option value="CITROEN">CITROEN</option>
                            <option value="DACIA">DACIA</option>
                            <option value="DAEWOO">DAEWOO</option>
                            <option value="DAIHATSU">DAIHATSU</option>
                            <option value="FIAT">FIAT</option>
                            <option value="FORD">FORD</option>
                            <option value="GOLF">GOLF</option>
                            <option value="HONDA">HONDA</option>
                            <option value="IVECO">IVECO</option>
                            <option value="JEEP">JEEP</option>
                            <option value="KIA">KIA</option>
                            <option value="LANCIA">LANCIA</option>
                            <option value="LAND ROVER">LAND ROVER</option>
                            <option value="MAZDA">MAZDA</option>
                            <option value="MERCEDES">MERCEDES</option>
                            <option value="MITSIBUSHI">MITSIBUSHI</option>
                            <option value="NISSAN">NISSAN</option>
                            <option value="OPEL">OPEL</option>
                            <option value="PEUGOET">PEUGOET</option>
                            <option value="RENAULT">RENAULT</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="modelo">Modelo:</label>
                        <select class="form-control" name="modelo" id="modelo">
                            <option>10</option>
                            <option>11</option>
                            <option>14</option>
                            <option>18</option>
                            <option>19</option>
                            <option>21</option>
                            <option>25</option>
                            <option>30</option>
                            <option>40</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="color">Color:</label>
                        <select class="form-control" name="color" id="color">
                            <option>BLANCO</option>
                            <option>NEGRO</option>
                            <option>AMARILLO</option>
                            <option>VERDA</option>
                            <option>ROJO</option>
                            <option>AZUL</option>
                            <option>GRIS</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria:</label>
                        <select class="form-control" name="categoria" id="categoria">
                            <option>TURISMO</option>
                            <option>4X4</option>
                            <option>FAMILIAR</option>
                            <option>MONOVOLUMEN</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="acientos">Acientos:</label>
                        <select class="form-control" name="acientos" id="acientos">
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                        </select>
                    </div>
                <div class="form-group">
                    <label for="acientos">Foto coche:</label>
                    <input type="file" name="fotofile" size="20" class="btn btn-primary"/>

                </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" value="Submit" class="btn btn-primary" id="boCoche">
                            </div>
                        </div>

                </form>
                <?php }else{

                   /* if(isset($result3)) {
                        ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> El coche se ha borrado correctamente.
                        </div>
                        <?php
                    }else{*/
                    ?>

                    <div style="padding-top:40px;">
                        <img style="border-radius: 50%;"
                             src="<?php echo base_url(); ?>assets/cocheFoto/<?php if ($result2->imageFoto == "") echo 'car.png'; else echo $result2->imageFoto ?> "
                             alt="Smiley face" height="90px" width="90px"></div>
                    <div style="display: -webkit-flex; /* Safari */">
                        <p><?php echo $result2->marca ?> <br> Categoria: <?php echo $result2->categoria ?> <br>
                            Color: <?php echo $result2->color ?></p>

                    </div>
                    <div class="alert alert-info">
                        <a href="<?php echo site_url('private/cambiarFotoCoche/' . $result2->matricula) ?>" style="cursor:pointer">Cambiar foto</a>
                    </div>
                    <div class="alert alert-info">
                        <a href="<?php echo site_url('private/borrarCoche/' . $result2->matricula) . '/' . $correo ?>" style="cursor:pointer">Eleminar coche</a>
                    </div>
                    <?php //}
                } ?>
            </div>
                    <?php  }?>
        </div>
    </div>
</div>
        <?php
        $this->load->view('private/include/pie');
        ?>
