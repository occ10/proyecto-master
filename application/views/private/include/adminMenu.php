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
                <a href="javascript:;" data-toggle="collapse" data-target="#usuarios"><i class="fa fa-file-movie-o"></i> Usuarios <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="usuarios" class="collapse">
                    <li>
                        <a href="<?php echo site_url('private/listadoUsuarios')?>">Gestión</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#coches"><i class="fa fa-user"></i> Coches <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="coches" class="collapse">
                    <li>
                        <a href="<?php echo site_url('private/listadoCoches')?>">Gestión</a>
                        <?php //echo anchor('participante/indexPrivada', 'Listado' , 'title="Listado de participantes"'); ?>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#ruta"><i class="fa fa-film"></i><i class="fa fa-user"></i> Ruta <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="ruta" class="collapse">
                    <li>
                        <a href="<?php echo site_url('private/listadoRutas')?>">Gestión</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#parking"><i class="fa fa-film"></i><i class="fa fa-user"></i> Parking <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="parking" class="collapse">
                    <li>
                        <a href="<?php echo site_url('private/listadoAparcamiento')?>">Gestión</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#zona"><i class="fa fa-film"></i><i class="fa fa-user"></i> Zona <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="zona" class="collapse">
                    <li>
                        <a href="<?php echo site_url('private/listadoZona')?>">Gestión</a>
                    </li>
                </ul>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#comentario"><i class="fa fa-film"></i> <i class="fa fa-trophy"></i> Comentarios <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="comentario" class="collapse">
                    <li>
                        <a href="<?php echo site_url('private/listadoComentario')?>">Gestión</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#historialParking"><i class="fa fa-film"></i> <i class="fa fa-trophy"></i> Historial Parking <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="historialParking" class="collapse">
                    <li>
                        <a href="<?php echo site_url('private/listadoHistorialParking')?>">Gestión</a>
                    </li>

                </ul>
            </li>

            <li>
                <a href="javascript:;" data-toggle="collapse" data-target="#rutasPublicadas"><i class="fa fa-film"></i> <i class="fa fa-trophy"></i> Rutas Publicadas <i class="fa fa-fw fa-caret-down"></i></a>
                <ul id="rutasPublicadas" class="collapse">
                    <li>
                        <a href="<?php echo site_url('private/listadoRutasPublicadas')?>">Gestión</a>
                    </li>

                </ul>
            </li>
        </ul>
    </div>
    <!-- /.navbar-collapse -->
</nav>