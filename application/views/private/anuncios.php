
<?php
$this->load->view('private/include/cabecera');
?>

<div class="col-md-10 col-md-offset-1" style="margin-bottom: 80px">
    <h2><?php echo  $total ?> viajes disponibles de <?php echo $origen?> a la universidad de  alicante</h2>

        <?php

        if (isset($rutas) and count($rutas)> 0){
        echo "<ul>";
        foreach ($rutas as $ruta):
            ?>


            <li id="li-anuncio" style="border-bottom-style: groove; padding-bottom:10px ;padding-top: 10px;height:150px;">
                <a href="<?php echo site_url('private/anuncioUsuario/' . $ruta->correo . '/'.  $ruta->id)?>">
                    <div class="row" style="height:150px;">

                        <div class="col-md-4" style="border-right-style:groove;height:80%">
                            <div class="row">
                                <div class="col-md-7"><img style="border-radius: 50%;"
                                                           src="<?php echo base_url(); ?>assets/userFoto/<?php echo $ruta->foto ?> "
                                                           alt="Smiley face" height="80%" width="80%"></div>
                                <div class="col-md-5" style="color:#000000"><h4><?php echo $ruta->nombre . " " . $ruta->apellido ?>
                                    </h4><?php echo $ruta->edad ?> años
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4" style="color:#C4C9CB"><h4><?php echo $ruta->origen ?> -> Universidad de Alicante</h4></div>
                        <div class="col-md-4"><h4><?php echo $ruta->precio ?> € </h4> por plaza
                            <br/> <?php echo($ruta->plazas - $ruta->plazasOcupadas) ?> plazas disponibles
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