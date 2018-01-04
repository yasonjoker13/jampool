<?php 
    //Notify header
    $user_notify = $this->Notify_model->notifyUsers()->result();
    $num_user_notify = $this->Notify_model->notifyUsers()->num_rows();
    $new_users = $this->Notify_model->notifyNewUser()->result();
    $animal_notify = $this->Notify_model->notifyAnimal()->result();
    $ticket_notify = $this->Notify_model->notifyTicket()->result();
    $num_notify = $this->Notify_model->numNotify();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>..: Jampool</title>
    <!-- Favicon-->
    <?= link_tag('assets/images/ico.ico', 'icon', 'image/x-icon'); ?>
    <!-- Google Fonts -->
    <?= link_tag('https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext'); ?>
    <?= link_tag('https://fonts.googleapis.com/icon?family=Material+Icons'); ?>
    <?= $this->resources->css(); ?>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-cyan">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Cargado...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="BUSCAR...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <?= anchor('', 'JAMPOOL', ['class' => 'navbar-brand']); ?>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                    <!-- #END# Call Search -->
                    <?php $priv = $this->Session_model->priv_user(); ?>
                    <!-- Notifications -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">notifications</i>
                            <span class="label-count"><?= $num_notify; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">NOTIFICACIONES</li>
                            <li class="body">
                                <ul class="menu">
                                    <?php if($priv->rol == 1): ?>
                                        <?php foreach ($new_users as $new_user) : ?>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <div class="icon-circle bg-light-green">
                                                        <i class="material-icons">person_add</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4>Nuevo usuario: <i><?= $new_user->username ?></i></h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> <?= $new_user->hora; ?>
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                        <?php foreach ($animal_notify as $animal) : ?>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <div class="icon-circle bg-cyan">
                                                        <i class="material-icons">add_shopping_cart</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4><?= $animal->numero.' ('.$animal->animalito.')'; ?></h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> <?= $animal->hora; ?>
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                        <?php foreach ($ticket_notify as $ticket) : ?>
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <div class="icon-circle bg-orange">
                                                        <i class="material-icons">cached</i>
                                                    </div>
                                                    <div class="menu-info">
                                                        <h4>Ganador: <?= $ticket->numero; ?></h4>
                                                        <p>
                                                            <i class="material-icons">access_time</i> <?= $ticket->hora_jugada; ?>
                                                        </p>
                                                    </div>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">Ver Todas las Notificaciones</a>
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Notifications -->
                <?php if($priv->rol == 1): ?>
                    <!-- Tasks -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">flag</i>
                            <span class="label-count"><?= $num_user_notify; ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">VENTAS: <?= mdate('%d-%m-%Y'); ?></li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <?php
                                        foreach ($user_notify as $user) :
                                            $porcentaje = $user->cantidad*100/50;
                                    ?>
                                        <li>
                                            <a href="javascript:void(0);">
                                                <h4>
                                                    <?= $user->username; ?>
                                                    <small><?= $user->cantidad.'/50 ('.$porcentaje.'%)'; ?></small>
                                                </h4>
                                                <div class="progress">
                                                    <div class="progress-bar bg-cyan" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="<?= 'width: '.$porcentaje.'%'; ?>">
                                                    </div>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="javascript:void(0);">Ver todas las ventas</a>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
