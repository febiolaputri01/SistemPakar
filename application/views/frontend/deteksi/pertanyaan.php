 <section id="featured-services" class="featured-services">
<div class="container">

<div class="row">
                <div class="col-sm col-sm-offset-2">

                    <!--      Wizard container        -->
                    <div class="wizard-container">

                        <div class="card wizard-card" data-color="orange" id="wizardProfile">
                            <form method="POST" action="<?= base_url('execute') ?>">
                           <!--  <input type="hidden" name="<?= $this->security->get_csrf_token_name() ?>" value="<?= $this->security->get_csrf_hash() ?>" style="display: none;"> -->
                            <?php foreach ($penyakit as $pen) : ?>
                                <input type="hidden" name="pen[]" id="pen[]" value=<?= $pen['id_penyakit'] ?>>
                            <?php endforeach; ?>

                                <div class="wizard-header text-center">
                                    <h3 class="wizard-title">Daftar Pertanyaan</h3>
                                    <p class="category">isilah pertanyaan tersebut dengan benar, untuk mendapatkan hasil deteksi yang sesuai</p>
                                </div>

                                <div class="wizard-navigation">
                                    <div class="progress-with-circle">
                                         <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
                                    </div>
                                    <ul>
                                        <?php foreach ($random as $rn) : ?>
                                        <input type="hidden" name="jumlah" id="jumlah" value="<?= $jumlah ?>">
										<input type="hidden" name="jumlah_tanya" id="jumlah_tanya" value="6">
                                        <input type="hidden" name="jum" id="jum" value="<?= $penjumlah ?>">
                                        <input type="hidden" name="konsulid[]" id="konsulid[]" value="<?= $rn['id_deteksi_pasien'] ?>">
                                        <input type="hidden" name="tanya[]" id="tanya[]" value="<?= $rn['random_pertanyaan'] ?>">
                                        
                                        <li>
                                            <a href="#detail-<?= $rn['random_id'] ?>" class="step-trigger" role="tab" data-toggle="tab">
                                                <div class="icon-circle"><i></i><?php
                                                                                $no = ++$start;
                                                                                echo $no;
                                                                                ?>
                                                </div>
                                                 
                                            </a>
                                        </li>
                                        <!-- <?php if ($no < 10) : ?>
                                            <div class="line"></div>
                                        <?php endif; ?> -->
                                    <?php endforeach; ?>
                                       
                                    </ul>
                                </div>
                                <div class="tab-content">
                                     <?php $no=1;  foreach ($random as $rn) : ?>
                                    <div class="tab-pane" id="detail-<?= $rn['random_id'] ?>">

                                          <div class="form-group">
                                                    <h5 class="text-center"><b><?= $rn['random_pertanyaan'] ?></b></h5>
                                                    <input hidden class="form-check-input" name="pertanyaan<?= $no ?>" value="<?= $rn['random_id_pertanyaan']?>">
                                                    <input hidden class="form-check-input" name="idgejala<?= $no ?>" value="<?= $rn['id_gejala_pertanyaan']?>">
                                                    <div class="row">
                                            <?php 
                                            $cfuser = [1, 0.8, 0.6, 0.4, 0.2, 0];
                                            for ($i=1; $i <= 6 ; $i++) { ?>
                                               
                                         <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="idtanya<?=$no?>" id="pilihan[<?= $rn['random_id_pertanyaan'] ?>]" value="<?=$cfuser[($i-1)]?>" >
                                            <label for="pilihan[<?= $rn['random_id'] ?>]"><?= $rn['jawaban_'.$i] ?></label>
                                         </div>
                                         <?php } ?>

                                        </div>
                                         </div>
                                    </div>
                                    <?php $no++; endforeach; ?>
                           
            
                                </div>
                        <div class="wizard-footer">
                            <div class="row">
                                <div class="col">
                                        <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next' value='Next' />
                                        <input type='submit' class='btn btn-finish btn-fill btn-warning btn-wd' name='finish' value='Finish' />
                                </div>
                                <div class="col">
                                        <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' /s>
                                </div>
                            </div>
                        </div>
                            </form>
                        </div>
                    </div> <!-- wizard container -->
                </div>
            </div><!-- end row -->
            </div>
        </section>
