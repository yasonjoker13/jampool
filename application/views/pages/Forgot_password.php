<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a href="javascript:void(0);">JAMPOOL</b></a>
            <small>Admin</small>
        </div>
        <div class="card">
            <div class="body">
                <form id="forgot_password" method="POST">
                    <div class="msg">
                       Ingrese su Email para recuperar su contraseña
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus autocomplete="off">
                        </div>
                    </div>

                    <button class="btn btn-block btn-lg bg-cyan waves-effect" type="submit">Reestablecer Contraseña</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <?= anchor('login','Iniciar Sesión'); ?>
                    </div>
                </form>
            </div>
        </div>
    </div>