		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                     
                    <div class="header bor-cyan">
                        <h2>POR DEFECTO</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable ">
                                <thead>
                                    <tr class="align-center">
                                        <th>Limite</th>
                                        <th>Comision</th>
                                        <th>Minutos para anular</th>
                                        <th>Estatus</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>

                                <tbody class="align-center">
                                	<?php foreach ($config as $config) : ?>
	                                    <tr>
	                                        <td><?= number_format($config->limite,0,',','.').' Bs.F.'; ?></td>
	                                        <td><?= $config->comision.'%'; ?></td>
	                                        <td><?= $config->minutos.' min'; ?></td>
	                                        <td>
	                                            <div class="demo-switch">
	                                                <div class="switch">
    	                                                DESACTIVADO
                                                        <label>
    	                                                    <input type="checkbox" id="lever-<?= $config->id_configuracion; ?>" <?php if($config->status == 1){ echo 'checked="checked"'; } ?>>
    	                                                    <span class="lever lever-defecto" id="<?= $config->id_configuracion; ?>"></span>
                                                        </label>
    	                                                ACTIVO
	                                                 </div>
	                                            </div>
	                                        </td>
	                                        <td>
	                                            <?= anchor('configuracion/editar/'.$config->id_configuracion, '<button type="button" class="btn btn-default waves-effect"><i class="material-icons">edit</i><span>Editar</span></button>'); ?>
	                                        </td>
	                                    </tr>
                                	<?php endforeach; ?>
                                </tbody>
                            </table>
    
                        </div>
                        <?php if($num < 1) : ?>
                            <div class="align-center ">
                            	<?= anchor('configuracion/agregar', 'Agregar Configuración', ['class' => 'btn bg-cyan waves-effect']); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
		</div>