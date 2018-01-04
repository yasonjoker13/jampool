<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a href="javascript:void(0);">JAMPOOL<b></b></a>
            <small>Admin</small>
        </div>
        <div class="card">
            <div class="body">
                <?= form_open('user_session/register'); ?>
                    <div class="msg">Registrar Usuario</div>
                    <div class="msg msg-error"><?= $this->session->flashdata('mensaje'); ?></div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons" >person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" name="username" id="username" class="form-control" placeholder="Nombre Usuario" required autofocus autocomplete="off">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" name="email" id="email" class="form-control" placeholder="Correo Electrónico" required autocomplete="off">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" name="password" id="password" class="form-control" minlength="6" placeholder="Contraseña" required autocomplete="off">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" name="confirm" id="confirm" class="form-control" minlength="6" placeholder="Confirmar Contraseña" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" value="yes" class="filled-in chk-col-cyan">
                        <label for="terms">Acepto todas las Condiciones <a href="javascript:void(0);"></a>.</label>
                    </div>

                    <button class="btn btn-block btn-lg bg-cyan waves-effect" type="submit">Registrar</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <?= anchor('login','Iniciar Sesión'); ?>
                    </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>