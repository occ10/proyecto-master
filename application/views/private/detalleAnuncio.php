
<?php
$this->load->view('private/include/cabecera');
?>

<div class="col-md-10 col-md-offset-1" style="padding-top: 20px">
    <h3><?php echo $detalleUsuario->origen ?> --> Universidad de Alicante</h3>

        <div class="row" style="height:880px">
            <div class="col-sm-8" style="border-style:solid; border-width:1px;border-color: #DDDDDD;height:100%;background-color:#F5F5DC">
                <div style="margin-top: 10px;height:50px;background-color:#FFFFFF">

                 <span style="width: 25%;color: #727272;display: inline-block;">Salida:</span>
                    <span style="width: 25%;color: #727272;display: inline-block;"><?php echo $detalleUsuario->origen ?></span>

                </div>
                <div style="height:50px;background-color:#FFFFFF">
                    <span style="width: 25%;color: #727272;display: inline-block;">Fecha Publicacion</span>
                    <span style="width: 25%;color: #727272;display: inline-block;">
                       <?php echo  $detalleUsuario->fechaPublicacion ?>
                    </span>
                </div>
                <div style="height:100px;background-color:#FFFFFF">
                    <span style="width: 25%;color: #727272;display: inline-block;">Detalles:</span>
                    <span style="width: 100%;color: #727272;display: inline-block;">
                       <?php echo  $detalleUsuario->detalles ?>
                    </span>
                </div>
                <div id="map-canvas" style="width: 100%; height: 560px"></div>
            </div>
            <div class="col-sm-4" style="padding:0">
                <div style="border-style: solid;border-color:#DDDDDD;border-width:1px">
                    <div style="height:50px;border-width:1px;width:100%;border-bottom-style: solid;border-color:#DDDDDD;padding-top: 10px">

                        <span style="width: 25%;color: #727272;display: inline-block;;padding-left: 10px">Precio</span>
                        <span style="width: 25%;color: #727272;display: inline-block;float:right;font-size:20px;"><?php echo $detalleUsuario->precio ?> <i>€</i></span>

                    </div>
                    <div style="height:50px;;padding-top: 10px">
                        <span style="width: 25%;color: #727272;display: inline-block;padding-left: 10px">Plazas</span>
                        <span style="width: 50%;color: #727272;display: inline-block;float:right">
                           <?php echo ($detalleUsuario->plazas-$detalleUsuario->plazasOcupadas)?> disponibles
                        </span>
                    </div>
                    <!--  boton reservar sitio-->
                    <div style="height:50px;;padding-top: 10px">
                        <form  action="<?php echo site_url('private/reservarPlaza')?>" id="myFormReserva" name="myFormReserva"   method="get">
                            <div><input type="hidden" name="usuarioCorreo" id="usuariocomentado" value="<?php echo $detalleUsuario->correo ?>"></div>
                            <div><input type="hidden" name="rutaId" id="rutaId" value="<?php echo $detalleUsuario->id ?>"></div>
                            <div><input type="hidden" name="cocheMatricula" id="cocheMatricula" value="<?php echo $detalleUsuario->matricula ?>"></div>

                            <div class="form-group" style="text-align: center;">
                                <input type="submit" value="Reservar plaza" class="btn btn-primary" id="boReservarPlaza" style="width:80%">
                            </div>
                        </form>
                    </div>
                </div>
                <div style="border-style: solid;border-color:#DDDDDD;border-width:1px;margin:30px 0 0 0">

                      <h3 style="background-color:#F9F9F9;margin-top:0;border-bottom-style: solid;border-width:1px;border-color:#DDDDDD;">Conductor</h3>
                    <div>

                          <div class="flex-container">
                            <div style="width:50%">
                                <img style="border-radius: 50%;"
                                     src="<?php echo base_url(); ?>assets/userFoto/<?php if($detalleUsuario->foto == "") echo 'unkonwnfoto.png'; else echo $detalleUsuario->foto ?> "
                                     alt="Smiley face" height="90px" width="90px">
                            </div>
                              <div>
                                 <h4><?php echo $detalleUsuario->nombre . " " .  $detalleUsuario->apellido ?></h4>
                                  <div><?php echo $detalleUsuario->edad ?> años</div>
                              </div>

                          </div>
                    </div>
                    <hr>
                    <div>
                        <h3>Coche</h3>
                        <div style="">
                            <img style="border-radius: 50%;"
                                 src="<?php echo base_url(); ?>assets/cocheFoto/<?php if ($detalleUsuario->imageFoto == "") echo 'car.png'; else echo $detalleUsuario->imageFoto ?> "
                                 alt="Smiley face" height="90px" width="90px"></div>
                        <div style="display: -webkit-flex; /* Safari */">
                            <p><?php echo $detalleUsuario->marca ?> <br> Categoria: <?php echo $detalleUsuario->categoria ?> <br>
                                Color: <?php echo $detalleUsuario->color ?></p>

                        </div>
                    </div>
                    <hr>
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
                                                    alt="Smiley face" height="40px" width="40px"></a></div>
                                    <div><strong
                                                style="color:#333333"><?php echo $comentario->nombre . $comentario->apellido ?></strong> <?php echo $comentario->comentario ?>
                                    </div>
                                </div>
                            </li>


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


                    <hr>
                    <h3>Actividades</h3>

                    <div style=""><a href="<?php  echo site_url('private/DetalleUsuarioPorCorreo/' . $detalleUsuario->correo) ?>"><strong>Ver Perfil</strong></a></div>
                </div>

            </div>
        <?php


        ?>


         </div>

    </div>



<?php
$this->load->view('private/include/pieRuta');
?>