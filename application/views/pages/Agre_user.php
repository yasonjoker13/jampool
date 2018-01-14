		<div class="row clearfix">

			<?= validation_errors(); ?>

			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bor-cyan">
                        <h2>DATOS DE USUARIOS</h2>
                    </div>
                    <?= form_open('configuracion/agregar-usuario'); ?>
	                    <div class="body">
	                        <div class="row">
	                            <div class="col-sm-4 col-md-4">
		                            <div class="form-group">
		                                <div class="form-line">
		                                    <input type="text" name="identificacion" value="<?= set_value('identificacion'); ?>" class="form-control" placeholder="Cedula Identidad" required="required" maxlength="8" onKeyPress="return numeros(event);"/>
		                                </div>
		                            </div>
	                            </div>

		                        <div class="col-sm-4 col-md-4">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input type="text" name="nombre" value="<?= set_value('nombre'); ?>" class="form-control" placeholder="Nombre" required="required" onKeyPress="return isNumber(event);"/>
	                                    </div>
	                                </div>
		                        </div>

		                        <div class="col-sm-4 col-md-4">
	                                <div class="form-group">
	                                    <div class="form-line">
	                                        <input type="text" name="apellido" value="<?= set_value('apellido'); ?>" class="form-control" placeholder="Apellido" required="required" onKeyPress="return isNumber(event);"/>
	                                    </div>
	                                </div>
		                        </div>

	                        </div>
	                        
	                        <div class="row">
	                            <div class="col-sm-4 col-md-4">
	                                <div class="form-group">
	                                    <div class="form-line" >
	                                        <input type="text" name="nacimiento" value="<?= set_value('nacimiento'); ?>" class="datepicker form-control" placeholder="Fecha de Nacimiento" required="required">
	                                    </div>
	                                </div>
	                            </div>

		                        <div class="col-sm-4 col-md-4">
	                                <div class="form-group">
	                                    <div class="form-line" id="form-email">
	                                        <input type="email" name="email" id="email" value="<?= set_value('email'); ?>" class="form-control" placeholder="E-Mail" required="required"/>
	                                    </div>
	                                </div>
		                        </div>

		                        <div class="col-sm-4 col-md-4">
	                                <div class="form-group">
	                                    <div class="form-line" id="form-telf">
	                                        <input type="text" name="telefono" id="telefono" value="<?= set_value('telefono'); ?>" class="form-control" placeholder="Teléfono" required="required" maxlength="20" onKeyPress="return isTelephone(event);"/>
	                                    </div>
	                                </div>
		                        </div>  
	                        </div>
	                        
	                        <div class="row">
	                            <div class="header">
	                                <h2>DATOS DE SESIÓN</h2>    
	                        	</div>

	                        	<div class="body">
		                        	<div class="row">
				                        <div class="col-sm-4 col-md-4">
			                                <div class="form-group">
			                                    <div class="form-line">
			                                        <input type="text" name="username" value="<?= set_value('username'); ?>" class="form-control" placeholder="Usuario" required="required"/>
			                                    </div>
			                                </div>
				                        </div>
				                        <div class="col-sm-4 col-md-4">
			                                <select name="rol" class="form-control show-tick" required="required">
			                                    <option value="">Rol</option>
			                                    <option value="1" <?= set_select('rol','1'); ?>>Administrador</option>
			                                    <option value="2" <?= set_select('rol','2'); ?>>Consultor</option>
			                                </select>
				                        </div>
				                        <div class="col-sm-4 col-md-4">
			                                <div class="form-group">
			                                    <div class="form-line">
			                                        <input type="password" name="password" value="<?= set_value('password'); ?>" class="form-control" placeholder="Contraseña" required="required"/>
			                                    </div>
			                                </div>
				                        </div>
				                    </div>

				                    <div class="row">
				                        <div class="col-sm-4 col-md-4">
			                                <div class="form-group">
			                                    <div class="form-line">
			                                        <input type="password" name="repassword" value="<?= set_value('repassword'); ?>" class="form-control" placeholder="Repetir Contraseña" required="required"/>
			                                    </div>
			                                </div>
				                        </div>

				                        <div class="col-md-4"></div>

				                        <div class="col-sm-4 col-md-4">
				                            <div class="form-group">
				                                <div class="form-line">
				                                    <input type="text" name="ticketera" value="<?= set_value('ticketera'); ?>" class="form-control" placeholder="Ticketera" required="required"/>
				                                </div>
				                            </div>
				                        </div>
				                    </div>
				                    
		                        </div>
		                    </div>

	                    	<div class="align-center js-sweetalert">
	                             <button type="submit" id="submit-user" class="btn bg-cyan waves-effect" data-type="success">Guardar</button>
	                             <button type="reset" class="btn bg-grey waves-effect" data-type="confirm">Cancelar</button>
	                        </div> 
	                        
	                    </div>
	                <?= form_close(); ?>
                </div>
            </div>
		</div>