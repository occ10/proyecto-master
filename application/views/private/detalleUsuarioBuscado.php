
<?php
$this->load->view('private/include/cabecera');
?>

<div class="col-md-10 col-md-offset-1" style="padding-top: 20px;margin-bottom: 120px">


    <div class="row">
        <?php /*if(isset($numViajes) && isset($numComentarios) && isset($detalleUsuario))*/if(true){?>
        <div class="col-sm-5" style="border-style:solid; border-width:1px;border-color: #DDDDDD;">
            <h3>Actividad</h3>
            <div style="margin-top: 10px;height:50px;">
                <span style="width: 100%;color: #727272"><?php echo $numViajes->totalCount?> viajes publicados</span>
            </div>
            <div style="height:50px;">
                <span style="width: 25%;color: #727272"><?php echo $numComentarios->totalComentarios?> comentarios recibidos</span>
            </div>
            <div style="height:100px;width;50px">
                <span style="width: 25%;color: #727272;display: inline-block;">Detalles:</span></br>
                <span style="color: #727272;display: inline-block;width: 100%;">
                    Tel: <?php echo  $detalleUsuario->telefono ?> </span></br> Correo: <?php echo  $detalleUsuario->correo ?>
                    </span>
            </div>
           <?php  if(isset($detalleCoche->marca) && ($detalleCoche->color)){ ?>
            <hr>
            <div>
                <h3>Coche</h3>
                    <?php if(isset($detalleCoche->imageFoto) && $detalleCoche->imageFoto!="") {?>
                    <img style="border-radius: 30%;"
                         src="<?php echo base_url(); ?>assets/cocheFoto/<?php echo $detalleCoche->imageFoto ?> "
                         alt="Smiley face" height="50%" width="50%">
                <?php }else{ ?>

                        <img style="border-radius: 30%;"
                             src="<?php echo base_url(); ?>assets/cocheFoto/car.png"
                             alt="Smiley face" height="50%" width="50%">

                 <?php   } ?>
                    <p><?php if(isset($detalleCoche->marca)) echo $detalleCoche->marca ?> <br> Categoria: <?php  if(isset($detalleCoche->categoria)) echo $detalleCoche->categoria ?> <br>
                        Color: <?php if(isset($detalleCoche->color)) echo $detalleCoche->color ?></p>
            </div>
            <?php } ?>
            <hr>



            <?php

            if(isset($Exito)) {
                ?>
                <div class="alert alert-success">
                    <strong>Success!</strong> <?php echo $Exito; ?>.
                </div>
                <?php
            }else if(isset($Error)){
                ?>
                <div class="alert alert-danger">
                    <strong>Danger!</strong> <?php echo $Error; ?>.
                </div>
                <?php
            }
            if($detalleUsuario->correo != $correoUSuarioSesion){
            ?>
            <form  action="<?php echo site_url('private/comentarUsuario')?>" id="myFormComentario" name="myFormComentario"  class="form-horizontal" method="post" style="">
                <div><input type="hidden" name="usuarioComentado" id="usuariocomentado" value="<?php echo $detalleUsuario->correo ?>"></div>

                <div class="form-group" id="formComentario" >
                    <label for="comentario">Publicar opinion</label>
                    <div class="input-group">
                        <!--<span class="input-group-addon">Text</span>-->
                        <!--<input name="telefono" type="text" class="form-control" id="telefono" placeholder="Ejemplo: 698 756 321" required><span class="input-group-addon"><i style="color:red;" class="glyphicon glyphicon-asterisk"></i></span>-->
                        <textarea wrap="physical" name="comentario" id="comentario" rows="4" cols="50" placeholder="Un conductor muy agradable, viaje ameno. Recomendable." class="form-control" required></textarea>


                    </div>
                   <!-- <i id="messageTipoT" style="color:red"></i>-->
                </div>
                <div class="form-group">
                    <input type="submit" value="Publicar comentario" class="btn btn-primary" id="boPublicarComentario">
                </div>
            </form>
            <?php }  ?>
        </div>

        <div class="col-sm-7" style="padding:0;">
            <div class="flex-container" style="border-style: solid;border-color:#DDDDDD;border-width:1px">
                        <div style="width:50%">
                            <img style="border-radius: 50%;"
                                 src="<?php echo base_url(); ?>assets/userFoto/<?php if($detalleUsuario->foto=="") echo 'unkonwnfoto.png'; else  echo $detalleUsuario->foto ?> "
                                 alt="Smiley face" height="80%" width="80%">
                        </div>
                        <div style="width:50%">
                            <h2><?php echo $detalleUsuario->nombre . " " .  $detalleUsuario->apellido ?></h2>
                            <div style="font-size:200% "><?php echo $detalleUsuario->edad ?> años</div>
                        </div>
            </div>
            <div style="border-style: solid;border-color:#DDDDDD;border-width:1px;margin:30px 0 0 0">
                <div>
                       <h3>Opiniones</h3>
                    <?php
                    if($numComentarios->totalComentarios >0) {
                        echo "<ul>";
                        foreach ($comentarios as $comentario):
                            ?>
                            <li style="list-style-type: none; ">
                                <div style="color:#5E5E5E" class="flex-container">
                                    <div>
                                        <a href="<?php echo site_url('private/DetalleUsuarioPorCorreo/' . $comentario->usuarioComenta); ?> "><img
                                                    style="border-radius: 30%;"
                                                    src="<?php echo base_url(); ?>assets/userFoto/<?php if ($comentario->foto == "") echo 'unkonwnfoto.png'; else echo $comentario->foto ?> "
                                                    alt="Smiley face" height="60px" width="60px"></a></div>
                                    <div><strong
                                                style="color:#333333"><?php echo $comentario->nombre .  $comentario->apellido ?></strong> <?php echo $comentario->comentario ?>
                                    </div>
                                </div>
                            </li>
                            <hr>

                            <?php

                        endforeach;
                        echo "</ul>";
                        if($numComentarios->totalComentarios> 2) {?>
                        <h3><a href="<?php echo site_url("private/verComentarios/") . $detalleUsuario->correo?>">Ver todos los comentarios </a></h3>
                        <?php }
                    }else{
                    ?>

                            <div class="alert alert-info">
                                <strong>Info!</strong> No hay opiniones para este usuario.
                            </div>
                            <?php
                        }

                        ?>
                </div>

        </div>
        <?php
        ?>
    </div>
        <?php }else{ ?>
        <div class="col-sm-12">
            <div class="alert alert-info">
                <strong>Info!</strong><?php echo $Info ?>.
            </div>
        </div>
        <?php } ?>

</div>
</div>


<?php
$this->load->view('private/include/pie');
?>