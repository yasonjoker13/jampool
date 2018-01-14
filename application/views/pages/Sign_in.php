<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">JAMPOOL</a>
            <small>Admin </small>
        </div>
        <div class="card">
            <div class="body">
                <?= form_open('user_session/login'); ?>
                    <div class="msg">Iniciar Sesión como Administador</div>
                    <div class="msg msg-error"><?= $this->session->flashdata('mensaje'); ?></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Usuario" required autofocus autocomplete="off">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña" required autocomplete="off">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <button type="submit" name="login" class="btn btn-block bg-cyan waves-effect">Acceder</button>
                        </div>
                    </div>
                    <!--<div class="row m-t-20 m-b--5 align-center">
                        <?php // anchor('recover','Olvido Contraseña'); ?>
                    </div>-->
                <?= form_close(); ?>
            </div>
        </div>
    </div>
