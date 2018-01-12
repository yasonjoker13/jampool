<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bor-cyan">
                <h2>NULOS</h2>
            </div>
            <div class="body">
                <div class="row">
                	<?= form_open('reportes/ticket-nulos'); ?>
	                    <div class="col-sm-5">
	                        <div class="form-group">
	                            <div class="form-line">
	                               <label for="">DESDE</label>
	                               <input type="text" name="desde" class="datepicker form-control" placeholder="<?= $desde; ?>" required>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-sm-5">
	                        <div class="form-group">
	                            <div class="form-line">
	                               <label for="">HASTA</label>
	                               <input type="text" name="hasta" class="datepicker form-control" placeholder="<?= $hasta; ?>" required>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="col-sm-2 align-center">
	                        <button type="submit" class="btn bg-cyan waves-effect m-t-15">BUSCAR</button>
	                    </div>
	                <?= form_close(); ?>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable ">
                        <thead>
                            <tr class="align-center">
                                <th>Ticket N.</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Hora de Juego</th>
                                <th>Total Cobrado</th>
                            </tr>
                        </thead>
                        <tbody class="align-center">
                        	<?php foreach ($ticket as $ticket) : ?>
	                            <tr>
	                                <td><?= $ticket->numero; ?></td>
	                                <td><?= $ticket->fecha; ?></td>
	                                <td><?= $ticket->hora; ?></td>
	                                <td>
                                        <?php $horas = $this->Reportes_model->getHorasTicket($ticket->numero); ?>
                                        <?php foreach ($horas as $hora) : ?>
                                            <span><?= '('.$hora->hora_jugada.')'; ?> </span>
                                        <?php endforeach; ?>
                                    </td>
	                                <td><?= number_format($ticket->costo_total,0,',','.'); ?> Bs.F.</td>
	                            </tr>
                        	<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>