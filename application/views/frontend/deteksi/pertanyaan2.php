<br><br><br>
  <div class="image-container set-full-height" style="background-image: url('assets/template/img/slide/bcc.jpg')">
      <!--   Big container   -->
      <div class="container">
       
          <div class="row">
            <div class="col-sm 12">
                <!--      Wizard container        -->
                <div class="wizard-container" >
                    <div class="card wizard-card" data-color="red" id="wizardProfile">
                      
                        <form action="" method="">
                    <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

                          <div class="wizard-header">
                              <h2 class="wizard-title">
                                Deteksi Dini Penyakit Infeksi Saluran Pernafasan Akut
                              </h2>
                  <h3 style=" font: bold; color:  red ;">Perhatikan pertanyaan dibawah dengan teliti, jawablah pertanyaan dibawah dengan benar sesuai dengan gejala yang anda alami.</h3>
                          </div>
                
                <div class="wizard-navigation">
                  
                  <ul> 
                     <?php $coba2 = count(array_chunk($pertanyaan2, 3));
                  
                  ?>
                  <ul> <?php for($x=1;$x<$coba2;$x++){ ?>
                    <li>
                      <a href="#detail-<?= $x; ?>" data-toggle="tab">
                        <?php
                          $no = ++$start;
                         echo $no;
                        ?>
                      </a>
                    </li>
                                 
                                
                                   <?php }; ?>
                              </ul>
                </div>
                

                         <div class="tab-content">
                              <?php foreach ($pertanyaan2 as $p ) { ?>
                    <div class="tab-pane" id="detail-<?= $p['id_pertanyaan_grup2'] ?>">
                
                               
                                  <div class="row">
                                    <div class="col-sm-12">
                                          <h3 class="text pertanyaan_class_all" style="color: orangered;"><?php echo $p['pertanyaan'] ?></h3>
                                    </div>
                  <?php if($p['jawaban1_pertanyaan2'] != "") { ?>
                    <div class="radio" style="color: black;">
                    <label for="jawaban[<?= $p['id_pertanyaan2'] ?>]" >
                      <input type="radio" class="jawaban jawaban_<?= $p['id_pertanyaan2']; ?>" name="jawaban[<?= $p['id_pertanyaan2']; ?>]" value="1">
                   <b  style="color: black; font-size: large;" ><?= $p['nama1'] ?> </b> 
                    </label>
                  </div>
                  <?php } ?>
                  <?php if($p['jawaban2_pertanyaan2'] != "") { ?>
                  <div class="radio">
                    <label for="jawaban[<?= $p['id_pertanyaan2'] ?>]">
                      <input type="radio" class="jawaban jawaban_<?= $p['id_pertanyaan2']; ?>" name="jawaban[<?= $p['id_pertanyaan2']; ?>]" value="0.8">
                      <b  style="color: black; font-size: large;" ><?= $p['nama2'] ?></b>
                    </label>
                  </div>
                  <?php } ?>
                  <?php if($p['jawaban3_pertanyaan2'] != "") { ?>
                  <div class="radio">
                    <label for="jawaban[<?= $p['id_pertanyaan2'] ?>]">
                      <input type="radio" class="jawaban jawaban_<?= $p['id_pertanyaan2']; ?>" name="jawaban[<?= $p['id_pertanyaan2']; ?>]" value="0.6">
                     <b style="color: black; font-size: large;"> <?= $p['nama3'] ?> </b> 
                    </label>
                  </div>
                  <?php } ?>
                  <?php if($p['jawaban4_pertanyaan2'] != "") { ?>
                  <div class="radio">
                    <label for="jawaban[<?= $p['id_pertanyaan2'] ?>]">
                      <input type="radio" class="jawaban jawaban_<?= $p['id_pertanyaan2']; ?>" name="jawaban[<?= $p['id_pertanyaan2']; ?>]" value="0.4">
                     <b style="color: black; font-size: large;"><?= $p['nama4'] ?></b>
                    </label>
                  </div>
                  <?php } ?>
                
                  
                                  </div>
                 

                                </div>
                                   <?php } ?>
                                </div>
                                 
                              
                            <div class="wizard-footer">
                                <div class="pull-right">
                                      <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Next' />
                                     <a href="<?= base_url('pertanyaan3') ?>"> <input type='button' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Finish' /></a> 
                                  </div>
                                  <div class="pull-left">
                                      <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />

                  
                                  </div>
                                 <!--  <div class="clearfix"></div> -->
                            </div>
                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div> <!-- row -->
    </div> <!--  big container -->
</div>

<script src="<?= base_url() ?>assets_wizard/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script>
  // document.getElementById("detail").
  // addEventListener("click", tampilkan_nilai_p);

  $(document).ready(function(){
   // $('.pertanyaan_class_all').first().on('change', function () {
   //  console.log()
   // }) 

  

   // $('.jawaban_1').on('change', function(){
   //    if($(this).val() == 1){
   //      $('.jawaban_2').show('slow')
   //      $('.jawaban_3').show('slow')
   //    }else{
   //      $('.jawaban_2').hide('slow')   
   //      $('.jawaban_3').hide('slow')
   //    }
   //  })


    // $('.jawaban').on('change', function(){
      // console.log($(this).val())
    // })
  })
</script>
     