		<div class="row clearfix">

			<?= validation_errors(); ?>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bor-cyan">
                        <h2>DATOS PERSONALES</h2>
                    </div>
                    <?= form_open('perfil'); ?>
	                    <div class="body">
	                        <div class="row">
	                            <div class="col-sm-4">
		                            <div class="form-group">
		                                <div class="form-line">
		                                    <input type="text" name="identificacion" value="<?= $usuario->identificacion; ?>" class="form-control" placeholder="Cedula Identidad" required="required" maxlength="8" onKeyPress="return numeros(event);"/>
		                                </div>
		                            </div>
	                          	</div>

	                        	<div class="col-sm-4">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input type="text" name="nombre" value="<?= $usuario->nombre; ?>" class="form-control" placeholder="Nombre" required="required" onKeyPress="return isNumber(event);"/>
	                                    </div>
	                                </div>
	                        	</div>

	                        	<div class="col-sm-4">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input type="text" name="apellido" value="<?= $usuario->apellido; ?>" class="form-control" placeholder="Apellido" required="required" onKeyPress="return isNumber(event);"/>
	                                    </div>
	                                </div>
	                        	</div>

	                        	<div class="col-sm-4 col-md-4">
	                                <div class="form-group">
	                                    <div class="form-line" >
	                                        <input type="text" name="nacimiento" value="<?= $usuario->fecha_nacimiento; ?>" class="datepicker form-control" placeholder="Fecha de Nacimiento" required="required">
	                                    </div>
	                                </div>
	                            </div>

	                        	<div class="col-sm-4 col-md-4">
	                                <div class="form-group">
	                                    <div class="form-line" id="form-email">
	                                        <input type="email" name="email" id="email" value="<?= $usuario->email; ?>" class="form-control" placeholder="E-Mail" required="required"/>
	                                    </div>
	                                </div>
		                        </div>
	                        	
	                        	<div class="col-sm-4 col-md-4">
	                                <div class="form-group">
	                                    <div class="form-line" id="form-telf">
	                                        <input type="text" name="telefono" id="telefono" value="<?= $usuario->telefono; ?>" class="form-control" placeholder="Teléfono" required="required" maxlength="20" onKeyPress="return isTelephone(event);"/>
	                                    </div>
	                                </div>
		                        </div>
	                        </div>
	                    </div>
	                        
	                    <div class="header">
	                        <h2>DATOS DEL USUARIO</h2>    
	                	</div>

	                	<div class="body">
	                		<div class="row">
		                    	 <div class="col-sm-4 col-md-4">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input type="text" name="username" value="<?= $usuario->username; ?>" class="form-control" placeholder="Usuario" required="required"/>
	                                    </div>
	                                </div>
		                        </div>
	                      
	                        	<div class="col-sm-4 col-md-4">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input type="password" name="password" value="<?= set_value('password'); ?>" class="form-control" placeholder="Contraseña" required="required"/>
	                                    </div>
	                                </div>
		                        </div>
	                        
	                        	<div class="col-sm-4 col-md-4">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input type="password" name="repassword" value="<?= set_value('repassword'); ?>" class="form-control" placeholder="Repetir Contraseña" required="required"/>
	                                    </div>
	                                </div>
		                        </div>
	                     	</div>
	                       
	                    	<div class="align-center">
	                            <button type="submit" class="btn bg-cyan waves-effect">Guardar</button>
	                            <button type="reset" class="btn bg-grey waves-effect">Cancelar</button>
	                        </div>

	                    </div>
	                <?= form_close(); ?>
                </div>
            </div>
		</div>