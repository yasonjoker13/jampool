        <div class="row clearfix">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>DATOS DEL TICKET</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover ">
                                
                                <tbody>
                                    <tr>
                                        <td><b>Emisor:</b> <?= $ticket->vendedor; ?></td> 
                                    </tr>
                                    <tr>
                                        <td><b>Nro:</b> <?= $ticket->numero; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Fecha:</b> <?= $ticket->fecha; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Hora:</b> <?= $ticket->hora; ?></td>
                                    </tr>
                                    <tr>
                                        <td><b>Horas de Jugada:</b>
                                            <?php foreach ($horas as $hora) : ?>
                                                <span <?php if($hora->status == 1){ echo 'class="badge bg-cyan"'; } ?>> - <?= $hora->hora_jugada; ?></span>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><b>Total:</b> <?= number_format($ticket->costo_total,2,',','.'); ?> Bs.F.</td>
                                    </tr>
                                    <?php 
                                        switch ($ticket->status) {
                                            case '0': $status = 'Activo'; break;
                                            case '1': $status = 'Ganado'; break;
                                            case '2': $status = 'Anulado'; break;
                                            case '3': $status = 'Ganado y Pagado'; break;
                                        }
                                    ?>
                                    <tr>
                                        <td><b>Estado:</b> <?= $status; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            
                        </div>
                        <div class="align-center">
                            <?php
                                $hora = explode(':', $ticket->hora);
                                $minutos = explode(' ', $hora[1]);
                                $resta = 60-$config->minutos;
                            ?>
                            <?php if($ticket->status == 0) : ?>
                                <?php if(mdate('%d-%m-%Y') == $ticket->fecha && mdate('%h') == $hora[0] && mdate('%i') <= $minutos[0]+$config->minutos) : ?>
                                    <?= anchor('ventas/anular/'.$ticket->numero, 'Anular', ['class' => 'btn bg-red waves-effect']); ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php if($ticket->status == 1) : ?>
                                <?= anchor('ventas/pagar/'.$ticket->numero, 'Pagar', ['class' => 'btn bg-green waves-effect']); ?>
                            <?php endif; ?>
                            <?= anchor('ventas/ticket', 'Salir', ['class' => 'btn bg-grey waves-effect']); ?>
                        </div>
                    </div>
                    
                </div>
            
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>ANIMALITOS JUGADOS</h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">

                            <table class="table table-bordered table-striped table-hover ">
                                <thead>
                                    <tr>
                                        <th>Número</th>
                                        <th>Animalito</th>
                                        <th>Monto</th>
                                        <th>Estado</th>
                                    </tr>
                                </thead>
            
                                <tbody>
                                    <?php
                                        foreach ($jugadas as $jugada) :
                                    ?>
                                        <tr <?php if($jugada->status == 1){ echo 'class="bg-cyan"'; $pagar = $jugada->costo*30; } ?>>
                                            <td><?= $jugada->numero; ?></td>
                                            <td><?= $jugada->animal; ?></td>
                                            <td><?= number_format($jugada->costo,0,',','.'); ?> Bs.F.</td>
                                            <?php
                                                switch ($jugada->status) {
                                                    case '0': $status = 'Activo'; break;
                                                    case '1': $status = 'Ganado'; break;
                                                }
                                            ?>
                                            <td class="align-center"><?= $status; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    <?php if($ticket->status == 1) : ?>
                                        <tr>
                                            <td colspan="2" class="align-right"><b>Total a Pagar:</b></td>
                                            <td colspan="2"><b><?php if(isset($pagar)){ echo number_format($pagar,0,',','.').' Bs.F.'; } ?></b></td>
                                        </tr> 
                                    <?php endif; ?>
                                </tbody>  
                            </table>

                            <div class="align-center">
                                <?php //echo anchor('ventas/emitir/'.$ticket->numero, '<button type="button" class="btn bg-cyan waves-effect" data-type="success">Emitir</button>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        </div>