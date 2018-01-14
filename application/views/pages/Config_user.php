		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bor-cyan">
                        <h2>USUARIOS</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable ">
                                <thead>
                                    <tr>
                                        <th>C. Identidad</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Username</th>
                                        <th>Rol</th>
                                        <th>Tickera</th>
                                        <th>Estatus</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody class="align-center">
                                	<?php foreach ($usuarios as $usuario) : ?>
	                                    <tr>
	                                        <td><?= number_format($usuario->identificacion,0,',','.'); ?></td>
	                                        <td><?= $usuario->nombre; ?></td>
	                                        <td><?= $usuario->apellido; ?></td>
	                                        <td><?= $usuario->username; ?></td>
	                                        <?php
	                                        	switch ($usuario->rol) {
	                                        		case '1': $rol = 'Administrador'; break;
	                                        		case '2': $rol = 'Consultor'; break;
	                                        	}
	                                        ?>
	                                        <td><?= $rol; ?></td>
	                                        <td><?= $usuario->ticketera; ?></td>
	                                        <td>
	                                            <div class="demo-switch">
	                                                <div class="switch">
		                                                DESACTIVADO
	                                                 	<label>
		                                                    <input type="checkbox" id="lever-<?= $usuario->id_usuario; ?>" <?php if($usuario->status == 1){ echo 'checked="checked"'; } ?>>
		                                                    <span class="lever lever-user" id="<?= $usuario->id_usuario; ?>"></span>
	                                                    </label>
		                                                ACTIVO
	                                                 </div>
	                                            </div>
	                                        </td>
	                                        <td>
	                                            <i class="material-icons">COG</i>
	                                        </td>
	                                    </tr>
                                	<?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>

                        <div class="align-center">
                        	<?= anchor('configuracion/agregar-usuario', 'Agregar Usuario', ['class' => 'btn bg-cyan waves-effect']); ?>
                         </div>

                    </div>
                </div>

            </div>
		</div>