        <div class="row clearfix">

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    
                    <div class=" header  bor-cyan">
                        <h2>Numero Ganador</h2>
                        <div class=" align-right"> 
                            <a href="javascript:void(0);" class="js-search" data-close="true">
                                <i class="material-icons">search</i>
                            </a>
                        </div>
                    </div>
                    <div class="body ">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr class="align-center">
                                        <th>Ticket</th>
                                        <th>Número</th>
                                        <th>Animalito</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Hora de Jugada</th>
                                        <th>Total a pagar</th>
                                    </tr>
                                </thead>

                                <tbody class="align-center">
                                <?php foreach ($tickets as $ticket) : ?>
                                    <tr>
                                        <td><?= $ticket->numero_ticket; ?></td>
                                        <td><?= $ticket->numero; ?></td>
                                        <td><?= $ticket->animal; ?></td>
                                        <td><?= $ticket->fecha; ?></td>
                                        <td><?= $ticket->hora; ?></td>
                                        <td><?= $ticket->hora_jugada; ?></td>
                                        <td><?= number_format($ticket->costo*30,0,',','.'); ?> Bs.F.</td>
                                    </tr>                                    
                                <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>

        </div>