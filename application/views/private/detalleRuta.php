
<?php
$this->load->view('private/include/cabecera');
?>

<div class="container">
    <h2>Detalles anuncio</h2>
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

       // if (isset($ruta)){
                ?>
                <tr>
                    <td><?php echo  $ruta->origen ?> </td>
                    <td><?php echo  $ruta->plazas ?> </td>
                    <td><?php echo  $ruta->plazasOcupadas ?> </td>
                    <td><?php echo  $ruta->precio ?> </td>
                    <td><?php echo  $ruta->detalles ?> </td>
                </tr>
                <?php
        ?>

        </tbody>
    </table>
    <div><h3>Elegir ocupante para eleminar</h3>
        <?php if (isset($usuarios) and count($usuarios) > 0){?>
        <form  action="<?php echo site_url('private/borrarRutaCompartida')?>" id="myFormOcupante" name="myFormOcupante"   method="get">
            <input type="hidden" name="rutaId" id="rutaId" value="<?php echo $ruta->id ?>">
            <select class="custom-select" name="usuarioCorreo" id="usuarioCorreo">
                <?php foreach ($usuarios as $usuario):   ?>
                   <?php echo  "<option value='$usuario->correo'>$usuario->nombre</option>" ?>
                <?php
                    endforeach;
                ?>
            </select>
            <div class="form-group" style="margin-top:20px">
                <input type="submit" value="Borrar ocupante" class="btn btn-primary" id="boBorrarOcupante" >
            </div>
        </form>
        <?php }else {
            echo "<div> No tienes ocupantes</div>";

        }

            ?>
    </div>
</div>


<?php
$this->load->view('private/include/pie');
?>