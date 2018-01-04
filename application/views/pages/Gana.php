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
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable ">
                                <thead>
                                    <tr class="align-center">
                                        <th>Ticket</th>
                                        <th>Número</th>
                                        <th>Animalito</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Total a pagar</th>
                                    </tr>
                                </thead>

                                <tbody class="align-center">
                                <?php foreach ($tickets as $ticket) :
                                        $ticket_pagar = $ticket->costo_unitario*15;
                                        switch ($ticket->hora_jugada) {
                                            case '10:00:00': $ampm = 'AM'; break;
                                            case '11:00:00': $ampm = 'AM'; break;
                                            case '12:00:00': $ampm = 'PM'; break;
                                            case '01:00:00': $ampm = 'PM'; break;
                                            case '04:00:00': $ampm = 'PM'; break;
                                            case '05:00:00': $ampm = 'PM'; break;
                                            case '06:00:00': $ampm = 'PM'; break;
                                            case '07:00:00': $ampm = 'PM'; break;
                                        }
                                        $animal = explode(':', $ticket->animal_ganado);
                                    ?>
                                    <tr>
                                        <td><?= $ticket->numero; ?></td>
                                        <td><?= $animal[0]; ?></td>
                                        <td><?= $animal[1]; ?></td>
                                        <td><?= $ticket->fecha; ?></td>
                                        <td><?= $ticket->hora_jugada.' '.$ampm; ?></td>
                                        <td><?= number_format($ticket_pagar,2,',','.'); ?> Bs.F.</td>
                                    </tr>                                    
                                <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>

        </div>