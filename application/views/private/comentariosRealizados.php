<?php
$this->load->view('private/include/cabecera');
$this->load->view('private/include/menu');
?>

<div class="col-sm-8 text-left" style="margin-bottom: 80px">
    <h1>Comentario realizados</h1>
    <hr>

    <div class="panel-body" >
        <div style="background-color:#F5F5DC;height:500px">
            <div style="margin-left:100px" class="col-lg-8"  >


                <!------------->

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
                                    <div style="padding-left:10px;color:#333333">
                                        <strong><?php echo $comentario->nombre . $comentario->apellido ?></strong> <?php echo $comentario->comentario ?>
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


                <!------------->


            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('private/include/pie');
?>
