<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo site_url('private')?>">AppUA Admin</a>
    </div>
    <!-- Top Menu Items -->
    <ul class="nav navbar-right top-nav">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?=$this->session->userdata('user')->nombre?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
                <li>
                    <a href="<?php echo   site_url('/')  ?> "><i class="fa fa-fw fa-film"></i> Vista pública</a>
                </li>
                <li>
                    <a href="<?php echo   site_url('cerrarSesion')  ?> "><i class="fa fa-fw fa-power-off"></i> Salir</a>
                </li>
            </ul>
        </li>
    </ul>
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li class="active">
                <a href="<?php echo site_url('private')?>"><i class="fa fa-fw fa-dashboard"></i> Inicio</a>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#usuarios"> Usuarios <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="usuarios" class="collapse">
                    <li>
                        <a href="<?php echo site_url('private/listadoUsuarios')?>">Gestión</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#coches">Coches <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="coches" class="collapse">
                    <li>
                        <a href="<?php echo site_url('private/listadoCoches')?>">Gestión</a>
                        <?php //echo anchor('participante/indexPrivada', 'Listado' , 'title="Listado de participantes"'); ?>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#ruta"> Ruta <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="ruta" class="collapse">
                    <li>
                        <a href="<?php echo site_url('private/listadoRuta')?>">Gestión</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#parking"> Parking <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="parking" class="collapse">
                    <li>
                        <a href="<?php echo site_url('private/listadoAparcamiento')?>">Gestión</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#zona"> Zona <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="zona" class="collapse">
                    <li>
                        <a href="<?php echo site_url('private/listadoZona')?>">Gestión</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#comentario"> Comentarios <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="comentario" class="collapse">
                    <li>
                        <a href="<?php echo site_url('private/listadoComentario')?>">Gestión</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#historialParking"> Historial Parking <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="historialParking" class="collapse">
                    <li>
                        <a href="<?php echo site_url('private/listadoAparcaCoche')?>">Gestión</a>
                    </li>

                </ul>
            </li>

            <!--<li>
                <a href="javascript:;" data-toggle="collapse" data-target="#rutasRealizadas"> Rutas Realizadas <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="rutasRealizadas" class="collapse">
                    <li>
                        <a href="<?php ///echo site_url('private/listadoRutaRealizada')?>">Gestión</a>
                    </li>

                </ul>
            </li>-->
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>