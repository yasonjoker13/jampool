        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bor-cyan">
                        <h2>RESUMEN DIARIO</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                        
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable ">
                                <thead>
                                    <tr class="align-center">
                                        <th>Ticket</th>
                                        <th>Hora</th>
                                        <th>Hora Jugada</th>
                                        <th>Total Cobrado</th>
                                        <th>Estatus</th>
                                    </tr>
                                </thead>

                                <tbody class="align-center">
                                    <?php foreach ($reportes as $reporte) : ?>
                                        <tr>
                                            <td><?= $reporte->numero; ?></td>
                                            <td><?= $reporte->hora; ?></td>
                                            <td><?= $reporte->hora_jugada; ?></td>
                                            <td><?= number_format($reporte->costo_total,0,',','.'); ?> Bs.F.</td>
                                            <?php 
                                                switch ($reporte->status) {
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