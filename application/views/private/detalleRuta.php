
<?php
$this->load->view('private/include/cabecera');
?>

<div class="container">
    <h2>Rutas publicadas</h2>

    <table class="table table-striped" style="width:90%">
        <thead>
        <tr>
            <th>Origen</th>
            <th>Plazas</th>
            <th>Plazas ocupadas</th>
            <th>Precio</th>
            <th>Detalles</th>
        </tr>
        </thead>
        <tbody>
        <?php

        if (isset($ruta)){
                ?>
                <tr>
                    <td><?php echo  $ruta->origen ?> </td>
                    <td><?php echo  $ruta->plazas ?> </td>
                    <td><?php echo  $ruta->plazasOcupadas ?> </td>
                    <td><?php echo  $ruta->precio ?> </td>
                    <td><?php echo  $ruta->detalles ?> </td>
                </tr>
                <?php
        }?>

        </tbody>
    </table>
</div>


<?php
$this->load->view('private/include/pie');
?>