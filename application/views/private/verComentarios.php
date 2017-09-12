
<?php
$this->load->view('private/include/cabecera');
?>

<div class="col-md-10 col-md-offset-1" style="padding-top: 20px;margin-bottom: 100px">


    <div class="row">
        <?php if(isset($numViajes) && isset($numComentarios) && isset($detalleUsuario)){?>
            <div class="col-sm-5" style="border-style:solid; border-width:1px;border-color: #DDDDDD;">
                <h3>Actividad</h3>
                <div style="margin-top: 10px;height:50px;">
                    <span style="width: 100%;color: #727272"><?php echo $numViajes->totalCount?> viajes publicados</span>
                </div>
                <div style="height:50px;">
                    <span style="width: 25%;color: #727272"><?php echo $numComentarios->totalComentarios?> comentarios recibidos</span>
                </div>
                <div style="height:100px;">
                    <span style="width: 25%;color: #727272;display: inline-block;">Detalles: </span> </br>
                    <span style="width: 100%;color: #727272;display: inline-block;">
                       Tel: <?php echo  $detalleUsuario->telefono ?> </span></br> Correo: <?php echo  $detalleUsuario->correo ?>
                    </span>
                </div>
                <hr>
                <div>
                    <h3>Coche</h3>
                    <?php if(isset($detalleCoche->imageFoto) && $detalleCoche->imageFoto!="") {?>
                        <img style="border-radius: 30%;"
                             src="<?php echo base_url(); ?>assets/cocheFoto/<?php echo $detalleCoche->imageFoto ?> "
                             alt="Smiley face" height="50%" width="50%">
                    <?php }else{?>
                        <img style="border-radius: 30%;"
                             src="<?php echo base_url(); ?>assets/cocheFoto/car.png"
                             alt="Smiley face" height="50%" width="50%">

                    <?php }?>
                    <p><?php echo $detalleCoche->marca ?> <br> Categoria: <?php  echo $detalleCoche->categoria ?> <br>
                        Color: <?php echo $detalleCoche->color ?></p>
                </div>
                <hr>

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
                        if(count($comentarios) > 0) {
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
                                                style="color:#333333"><?php echo $comentario->nombre . $comentario->apellido ?></strong> <?php echo $comentario->comentario ?>
                                        </div>
                                    </div>
                                </li>
                                <hr>

                                <?php

                            endforeach;
                            echo "</ul>";

                               echo $paginacion;

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