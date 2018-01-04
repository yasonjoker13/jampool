
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bor-green">
                            <h2>GANADORES</h2>
                        </div>

                        <div class="body">
                            <?= form_open('registros/insert'); ?>
                                <div class="row clearfix">
                                    
                                    <div class="col-md-6">
                                        <p>
                                            <b>Animalito</b>
                                        </p>
                                        <select name="animalito" class="form-control show-tick" data-live-search="true">
                                            <?php foreach ($animales as $row) : ?>
                                                <option value="<?= $row->numero; ?>:<?= $row->animal; ?>"><?= $row->numero; ?> - <?= $row->animal; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <b>Hora del Sorteo</b>
                                        </p>
                                        <select name="hora" class="form-control show-tick" data-live-search="true">
                                            <?php 
                                                foreach ($horas as $hora => $val) : ?>
                                                <?php if($time >= $hora) : ?>
                                                    <option value="<?= $val; ?>"><?= $val; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>

                                    <div class="col-md-12 align-center">
                                        <div class="msg msg-error"><?= $this->session->flashdata('mensaje'); ?></div>
                                    </div>

                                    <div class="align-center js-sweetalert">
                                        <button type="submit" class="btn bg-cyan waves-effect" data-type="success">Guardar</button>
                                        <button type="reset" class="btn bg-grey waves-effect" data-type="confirm">Terminar</button>
                                    </div>
                                </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>