<?php
$this->load->view('private/include/cabecera');
$this->load->view('private/include/menu');
?>

<div class="col-sm-8 text-left" style="margin-bottom: 80px">
    <h1>Foto de perfil</h1>
    <hr>
    <p>Añade una foto para tu perfil. A los demás usuarios les tranquilizará saber con quién van a viajar, y a ti te será más fácil encontrar un viaje. Las fotos os ayudarán a reconoceros en el punto de encuentro.</p>
    <?php
    if(isset($Exito)) {
        ?>
        <div class="alert alert-success">
            <strong>Success!</strong> Los datos se han insertado correctamente.
        </div>
        <?php
    }else if(isset($Error)){
        ?>
        <div class="alert alert-danger">
            <strong>Danger!</strong> Ha habido algun error en la actualizacion de los errores.
        </div>
        <?php
    }
    ?>
    <div class="panel-body">
        <div style="background-color:#F5F5DC;height:500px;width:540px">
            <div style="margin-left:150px" class="col-lg-6" >
                <?php
                if (isset($foto) and $foto!="") {
                    ?>
                    <div>
                      <img style="padding-top:100px" src="<?php echo base_url();?>assets/userFoto/<?php echo  $foto ?>" alt="Smiley face" height="100%" width="100%">
                    </div>
                    <br/>
                    <div class="alert alert-info">
                        <a href="<?php echo site_url('private/borrarFoto') ?>" style="cursor:pointer">Quieres eleminar esta foto</a>
                    </div>
                    <?php
                } else{
                    ?>
                    <img style="padding-top:100px" src="<?php echo base_url();?>assets/img/foto.jpg" alt="Smiley face" height="100%" width="100%"> ';

                    <div class="form-group">
                        <label for="marca">Upload:</label>
                        <div class="input-group">
                            <?php
                            if (isset($error))
                                echo $error;
                            ?>
                            <?php echo form_open_multipart('foto/do_upload');?>

                            <input type="file" name="userfile" size="20" class="btn btn-primary"/>

                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </div>

                    </form>
                <?php
                }
                ?>


            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('private/include/pie');
?>
