            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">trending_up</i>
                        </div>
                        <div class="content">
                            <div class="text">VENTAS</div>
                            <div class="number count-to" data-from="0" data-to="<?= $cant_ticket; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">GANADOS</div>
                            <div class="number count-to" data-from="0" data-to="<?= $cant_ganados; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">NULOS</div>
                            <div class="number count-to" data-from="0" data-to="<?= $cant_anulados; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">USUARIOS</div>
                            <div class="number count-to" data-from="0" data-to="<?= $total_usuarios; ?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <div class="row clearfix">
                <!-- Browser Usage -->
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>VENTAS</h2>
                        </div>
                        <div class="body">
                            <div>  Desde <b><?= $fecha_inicial->fecha; ?></b> al <b><?= $fecha_final->fecha; ?></b></div>
                            <h3> <?= number_format($ventas_total->costo_total,2,',','.'); ?> Bs.F.</h3>
                            <div class="m-t-30"><b>COMISIÓN</b></div>
                            <?php $comision = $ventas_total->costo_total*8/100; ?>
                            <h3> <?= number_format($comision,2,',','.'); ?> Bs.F.</h3>
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>TICKETS PREMIADOS</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Nro</th>
                                            <th>Animal</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                    <?php foreach ($ticket_premiado as $animales) : ?>
                                        <tr>
                                            <td><?= $animales->numero; ?></td>
                                            <td><?= $animales->animalito; ?></td>
                                            <td><?= $animales->fecha; ?></td>
                                            <td><?= $animales->hora; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>ULTIMOS GANADOS</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Ticket N.</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>A pagar</th>
                                        </tr>
                                    </thead>
                                   
                                    <tbody>
                                        <?php foreach ($ticket_ganado as $ganados) : ?>
                                            <tr>
                                                <td><?= $ganados->numero_ticket; ?></td>
                                                <td><?= $ganados->fecha; ?></td>
                                                <td><?= $ganados->hora_jugada; ?></td>
                                                <?php $costo_pagar = $ganados->costo*30; ?>
                                                <td><?= number_format($costo_pagar,0,',','.'); ?> Bs.F.</td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>ULTIMOS ANULADOS</h2>
                          
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Ticket Nro.</th>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                            
                                    <tbody>
                                        <?php foreach ($ticket_anulado as $anulado) : ?>
                                            <tr>
                                                <td><?= $anulado->numero; ?></td>
                                                <td><?= $anulado->fecha; ?></td>
                                                <td><?= $anulado->hora; ?></td>
                                                <td><?= number_format($anulado->costo_total,0,',','.'); ?> Bs.F.</td>
                                            </tr>
                                        <?php endforeach; ?>                            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>