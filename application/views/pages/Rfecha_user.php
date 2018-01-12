<div class="row clearfix">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header bor-cyan">
                <h2>RESUMEN DE USUARIOS POR FECHA</h2>
            </div>
            <div class="body">
                <div class="row">
                	<?= form_open('reportes/usuarios-por-fecha'); ?>
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
                                <th>Vendedor</th>
                                <th>Ticket N.</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Hora de Juego</th>
                                <th>Total Cobrado</th>
                                <th>Estatus</th>
                            </tr>
                        </thead>
                        <tbody class="align-center">
                        	<?php foreach ($ticket as $ticket) : ?>
	                            <tr>
                                    <?php $user = $this->Reportes_model->getUser($ticket->vendedor); ?>
                                    <td><?= $user->nombre; ?></td>
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
	                                <?php $jugada = $this->Reportes_model->getJugadaGanada($ticket->numero); ?>
	                                <?php 
                                        switch ($ticket->status) {
                                            case '0': $status = 'Activo'; break;
                                            case '1': $status = 'Ganado'; break;
                                            case '2': $status = 'Anulado'; break;
                                            case '3': $status = 'Pagado'; break;
                                        }
                                    ?>
                                    <td><?=$status; ?></td>
	                            </tr>
                        	<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>