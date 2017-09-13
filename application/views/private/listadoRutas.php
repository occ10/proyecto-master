
<?php
$this->load->view('private/include/cabecera');
?>

<div class="col-md-10 col-md-offset-1" style="margin-bottom: 80px">
    <h2>Rutas publicadas</h2>


        <?php

        if (isset($rutas) and count($rutas)> 0){
            foreach ($rutas as $ruta):
                ?>
    <table class="table table-striped" style="width:90%">
        <thead>
        <tr>
            <th>Origen</th>
            <th>Plazas</th>
            <!--   <th>Plazas ocupadas</th>
               <th>Precio</th>
               <th>Detalles</th>-->
        </tr>
        </thead>
        <tbody>
                <tr>
                    <td><?php echo $ruta->origen ?> </td>
                    <td><?php echo $ruta->plazas ?> </td>
                    <!--   <td><?php //echo  $ruta->plazasOcupadas
                    ?> </td>
                    <td><?php //echo  $ruta->precio
                    ?> </td>
                    <td><?php //echo  $ruta->detalles
                    ?> </td>-->
                    <td><a href="<?php echo site_url('private/modifyRuta/' . $ruta->id) ?>" class="btn btn-info"
                           role="button">Actualizar</a></td>
                    <td><a href="<?php echo site_url('private/detalleRuta/' . $ruta->id) ?>" class="btn btn-info"
                           role="button">Ver Detalles</a></td>
                    <td><a href="<?php echo site_url('private/borrarRuta/' . $ruta->id) ?>" class="btn btn-info"
                           role="button">Eleminar</a></td>
                </tr>
                <?php
            endforeach;
        }else{ ?>

            <div class="alert alert-info">
                <strong>Info!</strong> No tienes viajes publicados.
            </div>
            <?php
        }
        ?>

        </tbody>
    </table>
</div>


<?php
$this->load->view('private/include/pie');
?>