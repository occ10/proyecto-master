<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<?php
$this->load->view('private/include/adminCabecera');
?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Aparcamientos <small>Gestión de aparcamientos</small>
                </h1>
            </div>
        </div>
        <div class="row">
            <?php echo $output; ?>
        </div>
    </div>
    <!-- /.row -->
</div>




<?php
$this->load->view('private/include/adminPie');
?>
