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
                                <input type="checkbox" name="hora[]" value="<?= $value; ?>" id="md_radio_<?= $num; ?>" class="filled-in chk-col-cyan hora" <?php if(mdate('%H') >= $num){ echo 'disabled="disabled"'; } ?>/>
                                <label for="md_radio_<?= $num; ?>" class="label-hora"><?= $value; ?></label>
                            <?php endforeach; ?>
                        </div>

                        <div class="row m-lotto">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="numero" id="numero" class="form-control" placeholder="Número" autocomplete="off" onKeyPress="return numeros(event)" maxlength="2" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group ">
                                    <div class="form-line">
                                        <input type="text" name="monto" id="monto" class="form-control monto" placeholder="Monto" autocomplete="off" onKeyPress="return numeros(event)" maxlength="10" />
                                    </div>
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
                                        <th>Horas:</th>
                                        <td colspan="2" class="td-hora">
                                            <?php foreach ($horas as $num => $value) : ?>
                                                <span class="md_radio_<?= $num; ?>" style="display: none;"> - <?= $value; ?></span>
                                            <?php endforeach; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Número</th>
                                        <th>Animal</th>
                                        <th>Costo Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($animales as $animal) : ?>
                                        <tr class="tr-animales tr-<?= $animal->numero; ?>" style="display: none;">
                                            <td><?= $animal->numero; ?></td>
                                            <td><?= $animal->animal; ?></td>
                                            <td class="td-costo editable animal-<?= $animal->numero; ?>" id="mal_<?= $animal->numero; ?>"></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfooter>
                                    <tr>
                                        <th colspan="2" class="align-right">Sub-Total:</th>
                                        <th id="sub-total">0</th>
                                    </tr>
                                    <tr>
                                        <th colspan="2" class="align-right">Total: 
                                            <input type="hidden" name="costo_total" id="costo_total">
                                        </th>
                                        <th id="total">0</th>
                                    </tr>
                                </tfooter>
                            </table>

                            <div class="align-center">
                                <button type="submit" id="submit-play" class="btn bg-cyan waves-effect">Emitir</button>
                                <button type="reset"  id="reset-ani" class="btn bg-grey waves-effect reset">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>

            <?= anchor('ventas/imprimir', 'Imprimir'); ?>

            <div class="col-md-12 jsdemo-notification-button hidden">
                <button id="btn-animal" type="button" data-placement-from="top" data-text="Seleccione algún Animalito" data-placement-align="right" data-animate-enter="animated zoomInRight" data-animate-exit="animated zoomOutRight" data-color-name="bg-teal">FALTA ANIMAL</button>
                <button id="btn-hora" type="button" data-placement-from="top" data-text="Seleccione alguna Hora" data-placement-align="right" data-animate-enter="animated zoomInRight" data-animate-exit="animated zoomOutRight" data-color-name="bg-teal">FALTA HORA</button>
                <button id="btn-falta" type="button" data-placement-from="top" data-text="Falta ingresar Costo a un Animalito" data-placement-align="right" data-animate-enter="animated zoomInRight" data-animate-exit="animated zoomOutRight" data-color-name="bg-teal">FALTA</button>
                <button id="btn-cerrado" type="button" data-placement-from="top" data-text="Las ventas estan cerradas por hoy" data-placement-align="right" data-animate-enter="animated zoomInRight" data-animate-exit="animated zoomOutRight" data-color-name="bg-teal">CERRADO</button>
            </div>
        <?= form_close(); ?>
    </div>