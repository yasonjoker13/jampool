        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bor-cyan">
                        <h2>TICKETS</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable ">
                                <thead >
                                    <tr class="align-center">
                                        <th>Nro</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Hora de Juego</th>
                                        <th>Total Pagado</th>
                                        <th>Estados</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>

                                <tbody class="align-center">
                                    <?php foreach ($tickets as $ticket) : ?>
                                        <tr>
                                            <td><?= $ticket->numero; ?></td>
                                            <td><?= $ticket->fecha; ?></td>
                                            <td><?= $ticket->hora; ?></td>
                                            <td><?= $ticket->hora_jugada; ?></td>
                                            <td><?= number_format($ticket->costo_total,0,',','.'); ?> Bs.F.</td>
                                            <?php 
                                                switch ($ticket->status) {
                                                    case '0': $status = 'Activo'; break;
                                                    case '1': $status = 'Ganado'; break;
                                                    case '2': $status = 'Anulado'; break;
                                                    case '3': $status = 'Pagado'; break;
                                                }
                                            ?>
                                            <td><?=$status; ?></td>
                                            <td class="align-center">
                                                <?= anchor('ventas/detalles-ticket/'.$ticket->numero, '<button type="button" class="btn btn-default waves-effect"><i class="material-icons">menu</i><span>Detalles</span></button>'); ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                           
                        </div>
                    </div>
                </div>

            </div>

        </div>