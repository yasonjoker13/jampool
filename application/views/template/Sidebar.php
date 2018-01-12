    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= base_url('assets/images/user.png'); ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('jampool_user'); ?></div>
                    <div class="email"><?= $this->session->userdata('jampool_email'); ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="javascript:void(0);"><i class="material-icons">person</i>Perfil</a></li>
                            <li role="seperator" class="divider"></li>
                            <li>
                                <?= anchor('user_session/logout', '<i class="material-icons">input</i>Salir'); ?>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <?php
                $uri = $this->uri->segment(1);
                $uri_2 = $this->uri->segment(2);
                $priv = $this->Session_model->priv_user();
            ?>
            <!-- Menu -->
            <div class="menu">
                <ul class="list">

                    <li <?php if($uri == ''){ echo 'class="active"'; } ?>>
                        <?= anchor('', '<i class="material-icons">home</i><span>INICIO</span>') ?>
                    </li>
            
                    <li <?php if($uri == 'ventas'){ echo 'class="active"'; } ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">attach_money</i>
                            <span>VENTAS</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <?= anchor('ventas/reportes', '<i class="material-icons">add_circle_outline</i><span>Reportes</span>'); ?>
                            </li>
                            <li>
                                <?= anchor('ventas/ticket', '<i class="material-icons">receipt</i><span>Ticket</span>'); ?>
                            </li>
                            <li>
                                <?= anchor('ventas/ganador', '<i class="material-icons">local_atm</i><span>Ganador</span>'); ?>
                            </li>
                            <li>
                                <?= anchor('ventas/ventas/'.mdate('%Y'), '<i class="material-icons">attach_money</i><span>Ventas</span>'); ?>
                            </li>
                        </ul>
                    </li>
            
                <?php if($priv->rol == 1): ?>
                    <li <?php if($uri == 'registros'){ echo 'class="active"'; } ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">attach_money</i>
                            <span>REGISTROS</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <?= anchor('registros/sorteo', '<i class="material-icons">add_circle_outline</i><span>Sorteo</span>'); ?>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>

                    <li <?php if($uri == 'reportes'){ echo 'class="active"'; } ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">content_copy</i>
                            <span>REPORTES</span>
                        </a>
                        <ul class="ml-menu">
                            <li <?php if($uri_2 == 'resumen-diario' or $uri_2 == 'resumen-por-fecha'){ echo 'class="active"'; } ?>>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">add_circle_outline</i>
                                    <span>Resumen</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <?= anchor('reportes/resumen-diario', '<span>Resumen Diario</span>'); ?>
                                    </li>
                                    <li>
                                        <?= anchor('reportes/resumen-por-fecha', '<span>Resumen por Fecha</span>'); ?>
                                    </li>
                                </ul>
                            </li>
                        <?php if($priv->rol == 1): ?>
                            <li <?php if($uri_2 == 'usuarios-diaros' or $uri_2 == 'usuarios-por-fecha'){ echo 'class="active"'; } ?>>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">add_circle_outline</i>
                                    <span>Resumen de Usuarios</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <?= anchor('reportes/usuarios-diaros', '<span>Resumen Diario</span>'); ?>
                                    </li>
                                    <li>
                                        <?= anchor('reportes/usuarios-por-fecha', '<span>Resumen por Fecha</span>'); ?>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                            <li <?php if($uri_2 == 'ticket-nulos' or $uri_2 == 'ticket-ganados' or $uri_2 == 'ticket-pagados'){ echo 'class="active"'; } ?>>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <i class="material-icons">add_circle_outline</i>
                                    <span>Tickets Emitidos</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <?= anchor('reportes/ticket-nulos/', '<span>Nulos</span>'); ?>
                                    </li>
                                    <li>
                                        <?= anchor('reportes/ticket-ganados', '<span>Ganados</span>'); ?>
                                    </li>
                                    <li>
                                        <?= anchor('reportes/ticket-pagados', '<span>Pagados</span>'); ?>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                <?php if($priv->rol == 1): ?>
                    <li <?php if($uri == 'configuracion'){ echo 'class="active"'; } ?>>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">settings</i>
                            <span>CONFIGURACIÓN</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <?= anchor('configuracion/defecto', '<i class="material-icons">phonelink_setup</i><span>Por defecto</span>'); ?>
                            </li>
                            <li>
                                <?= anchor('configuracion/users', '<i class="material-icons">people</i><span>Usuarios del Sistema</span>'); ?>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2017 <?= anchor('', 'Jampool'); ?>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.1.1.18
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2><?php echo $title; ?></h2>
            </div>