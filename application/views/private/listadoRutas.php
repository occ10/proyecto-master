
<?php
$this->load->view('private/include/cabecera');
?>

<div class="col-md-10 col-md-offset-1" style="margin-bottom: 80px">
    <h2>Rutas publicadas</h2>


    <?php
    if(isset($Exito)) {
        ?>
        <div class="alert alert-success">
            <strong>Success!</strong> Los datos se han borrado correctamente.
        </div>
        <?php
    }else if(isset($Error)){
        ?>
        <div class="alert alert-danger">
            <strong>Danger!</strong> Ha habido algun error en el borrado de los datos.
        </div>
        <?php
    }
    else if (isset($rutas) and count($rutas)> 0){
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

        <?php

        //if (isset($rutas) and count($rutas)> 0){
            foreach ($rutas as $ruta):
                ?>
                <tr>
                    <td><?php echo $ruta->origen ?> </td>
                    <td><?php echo $ruta->plazas ?> </td>
                    <!--   <td><?php //echo  $ruta->plazasOcupadas
                    ?> </td>
                    <td><?php //echo  $ruta->precio
                    ?> </td>
                    <td><?php //echo  $ruta->detalles
                    ?> </td>-->
                    <?php
                    if($ruta->opcion == '0'){
                        ?>
                    <td><a href="<?php echo site_url('private/modifyRuta/' . $ruta->id) ?>" class="btn btn-info"
                           role="button">Actualizar</a></td>
                    <?php }else{

                        ?>
                        <td></td>
                        <?php
                    } ?>
                    <td><a href="<?php echo site_url('private/detalleRuta/' . $ruta->id) ?>" class="btn btn-info"
                           role="button">Ver Detalles</a></td>
                    <td><a href="<?php echo site_url('private/borrarRuta/' . $ruta->id) ?>" class="btn btn-info"
                           role="button">Eleminar</a></td>
                </tr>
                <?php
            endforeach;

          ?>

        </tbody>
    </table>
        <div class="text-center" style="width:100%">

            <div   style="paddint-top:40px">
                <!--<a href="-->
                <?php
                echo $paginacion;

                ?>

            </div>

        </div>
        <?php
        }else{ ?>

            <div class="alert alert-info">
                <strong>Info!</strong> No tienes viajes publicados.
            </div>
            <?php
        }
        ?>
</div>


<?php
$this->load->view('private/include/pie');
?>