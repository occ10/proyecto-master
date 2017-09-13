<?php
$this->load->view('private/include/cabecera');
$this->load->view('private/include/menu');
?>

<div class="col-sm-8 text-left" style="margin-bottom: 80px">
    <h1>Cambiar foto del coche</h1>
    <hr>

    <div class="panel-body">
        <div style="background-color:#F5F5DC;height:500px;width:540px">
            <div style="margin-left:150px" class="col-lg-6" >
                <?php
                if(isset($Exito)) {
                    ?>
                    <div class="alert alert-success">
                        <strong>Success!</strong> <?php echo $Exito ?>.
                    </div>
                    <?php
                }else if(isset($Error)){
                    ?>
                    <div class="alert alert-danger">
                        <strong>Danger!</strong> <?php echo $Error ?>
                    </div>
                    <?php
                }
                ?>
                    <img style="padding-top:100px" src="<?php echo base_url();?>assets/img/foto.jpg" alt="Smiley face" height="100%" width="100%"> ';

                    <div class="form-group">
                        <label for="marca">Upload:</label>
                        <div class="input-group">
                            <?php
                            if (isset($error))
                                echo $error;
                            ?>
                            <?php echo form_open_multipart('coche/do_uploadFoto');?>

                            <input type="file" name="cochefile" size="20" class="btn btn-primary"/>
                            <input type="hidden" name="matirculaCoche" value="<?php echo $matricula  ?>"/>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" value="Submit" class="btn btn-primary">
                        </div>
                    </div>

                    </form>



            </div>
        </div>
    </div>
</div>
<?php
$this->load->view('private/include/pie');
?>
