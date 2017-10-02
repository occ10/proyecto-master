
<?php
$this->load->view('private/include/cabecera');
?>

<div class="col-md-10 col-md-offset-1" style="margin-bottom: 100px">
    <h2><?php echo  $total ?> usuarios disponibles de <?php echo $origen?></h2>

    <?php

    if (isset($usuarios) and count($usuarios)> 0){
        echo "<ul>";
        foreach ($usuarios as $usuario):
            ?>


            <li id="li-anuncio" style="border-bottom-style: groove; padding-bottom:10px ;padding-top: 10px;height:150px;">
                <a href="<?php echo site_url('private/DetalleUsuarioPorCorreo/' . $usuario->correo)?>">
                    <div class="row" style="height:150px;">

                        <div class="col-md-6" style="border-right-style:groove;height:80%">
                            <div class="row">
                                <div class="col-md-7"><img style="border-radius: 50%;"
                                                           src="<?php echo base_url(); ?>assets/userFoto/<?php if($usuario->foto=="") echo 'unkonwnfoto.png'; else  echo $usuario->foto ?> "

                                                           alt="Smiley face" height="100px" width="100px"></div>
                                <div class="col-md-5" style="color:#000000"><h4><?php echo $usuario->nombre . " " . $usuario->apellido ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6" style="">
                            <h4>Origen: <?php echo $origen ?></h4>
                            <h4>Edad: <?php echo $usuario->edad ?> años</h4>
                            <h4>Telefono:<?php echo $usuario->telefono ?>
                            <h4>Correo electronico: <?php echo $usuario->correo ?> </h4>

                        </div>

                    </div>
                </a>
            </li>
            <?php


        endforeach;
        ?>
        <div class="text-center" style="width:100%";>
            <div style=" display: inline-block;">
                <!--  aqui viene el numero de filtros por cada paginacion-->
            </div>
            <div   style=" display: inline-block;">
                <!--<a href="-->
                <?php
                echo $paginacion;

                ?>

            </div>

        </div>
        <?php

    }else{ ?>

        <div class="alert alert-info">
            <strong>Info!</strong> No hay resultados para esta busqueda.
        </div>
        <?php
    }
    ?>


</div>


<?php
$this->load->view('private/include/pie');
?>