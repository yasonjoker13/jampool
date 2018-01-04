    <div class="row clearfix">
        <?= form_open('ventas/insert'); ?>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">

                    <div class="header bor-cyan">
                        <h2>DATOS DEL TICKET</h2>
                    </div>

                    <div class="body">

                        <div>
                            <?php foreach ($horas as $num => $value) : ?>
                                <input type="radio" name="hora" value="<?= $value; ?>" id="md_radio_<?= $num; ?>" class="filled-in chk-col-cyan hora" <?php if(mdate('%H') >= $num){ echo 'disabled="disabled"'; } ?>/>
                                <label for="md_radio_<?= $num; ?>" class="label-hora"><?= $value; ?></label>
                            <?php endforeach; ?>
                        </div>

                        <div class="m-lotto">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="monto" id="monto" class="form-control" required="required" placeholder="Monto" autocomplete="off" onKeyPress="return numeros(event)"/>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="card">
                        <div class="header bor-cyan">
                            <h2>ANIMALES</h2>
                        </div>
                        <div class="body cart-lotto">
                            <?php foreach ($animales as $animal) : ?>
                                <div class="col-md-4 col-sm-4 col-xs-6 check-ani" num="<?= $animal->numero; ?>" ani="<?= $animal->animal; ?>">
                                    <input name="animales[]" type="checkbox" class="input-checkbox-animalito" id="animal_<?= $animal->numero; ?>" value="<?= $animal->numero.':'.$animal->animal; ?>" data-num="<?= $animal->numero; ?>" data-animal="<?= $animal->animal; ?>" />
                                    <label for="animal_<?= $animal->numero; ?>" class="label-animal" nume="<?= $animal->numero; ?>">
                                        <img class="img-responsive radio-animalito" src="<?= base_url('assets/images/lotto/'.$animal->numero.'.png'); ?>">
                                    </label>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

            </div>
            
            
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header bor-green">
                        <h2>TICKET N: <?= $ticket; ?></h2>
                        <input type="hidden" name="ticket" value="<?= $ticket; ?>">
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            
                            <table id="mainTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Hora</th>
                                            <th>Número</th>
                                            <th>Animal</th>
                                            <th>Costo Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($animales as $animal) : ?>
                                            <tr class="tr-animales tr-<?= $animal->numero; ?>" style="display: none;">
                                                <td class="td-hora"></td>
                                                <td><?= $animal->numero; ?></td>
                                                <td><?= $animal->animal; ?></td>
                                                <td class="td-costo editable animal-<?= $animal->numero; ?>" id="mal_<?= $animal->numero; ?>"></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfooter>
                                        <tr>
                                            <th colspan="3" class="align-right">Total: 
                                                <input type="hidden" name="costo_total" id="costo_total">
                                            </th>
                                            <th id="total">0</th>
                                        </tr>
                                    </tfooter>
                                </table>

                            <div class="align-center js-sweetalert">
                                <button type="submit" class="btn bg-cyan waves-effect" data-type="success">Emitir</button>
                                <button type="reset" class="btn bg-grey waves-effect reset" id="reset-ani" data-type="confirm">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>
        <?= form_close(); ?>
    </div>