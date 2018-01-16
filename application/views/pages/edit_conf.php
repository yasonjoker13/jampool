		<div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bor-cyan">
                        <h2>NUEVA CONFIGURACIÓN</h2>
                    </div>
                    <div class="body">
                    	<?= form_open('configuracion/update'); ?>
	                        <div class="row">
	                            
	                            <div class="col-sm-4">
		                            <div class="form-group">
		                                <div class=" form-line">
		                                    <input type="text" name="limite" class="form-control" value="<?= $config->limite; ?>" placeholder="Limite de Venta" required="required" maxlength="10" onKeyPress="return numeros(event)"/>
		                                </div>
		                            </div>
	                            </div>

		                        <div class="col-sm-4">
	                                <div class="form-group">
	                                    <div class=" form-line">
	                                        <input type="text" name="comision" class=" form-control" value="<?= $config->comision; ?>" placeholder="Comision" required="required" maxlength="3" onKeyPress="return numeros(event)"/>
	                                    </div>
	                                </div>
		                        </div>
	                        	<div class="col-sm-4">
	                                <div class="form-group">
	                                    <div class=" form-line">
	                                        <input type="text" name="minutos" class=" form-control" value="<?= $config->minutos; ?>" placeholder="Minutos para anular" required="required" maxlength="2" onKeyPress="return numeros(event)"/>
	                                    </div>
	                                </div>
	                        	</div>

	                        </div>
	                        
	                        <div class="align-center js-sweetalert">
	                        	<input type="hidden" name="id_configuracion" value="<?= $config->id_configuracion; ?>">
	                            <button type="submit" class="btn bg-cyan waves-effect" data-type="success">Guardar</button>
	                            <button type="reset" class="btn bg-grey waves-effect" data-type="confirm">Cancelar</button>
	                         </div>
                        <?= form_close(); ?>
                    </div>

                </div>
            </div>
		</div>