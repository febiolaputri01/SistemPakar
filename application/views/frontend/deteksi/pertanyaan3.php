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
                  <?php 
                    $coba = count(array_chunk($pertanyaan3, 3));
                  
                  ?>
                  <ul> <?php for($x=1;$x<$coba;$x++){ ?>
                    <li>
                      <a href="#detail-<?= $x; ?>" data-toggle="tab">
                        <?php
                          $no = ++$start;
                         echo $no;
                        ?>
                      </a>
                    </li>
                                 
                                 <!--  <li><a href="#captain" data-toggle="tab">Room Type</a></li>
                                  <li><a href="#description" data-toggle="tab">Extra Details</a></li> -->
                                   <?php }; ?>
                              </ul>
                </div>
                

                            <div class="tab-content">
                              <?php foreach ($pertanyaan3 as $p ) { ?>
                    <div class="tab-pane" id="detail-<?= $p['id_pertanyaan_grup'] ?>">
                    <?php
                    $id = $p['id_pertanyaan_grup'];
                    
                    $query = "SELECT * FROM  `tb_pertanyaan3`  WHERE `tb_pertanyaan3`.`id_pertanyaan_grup` = $id";
                    $query2 = $this->db->query($query)->result_array();
                    
                  ?>
                                <?php foreach ($query2 as $b ) { ?>
                                  <div class="row">
                                    <div class="col-sm-12">
                                          <h3 class="text pertanyaan_class_all" style="color: orangered;"><?php echo $b['pertanyaan'] ?></h3>
                                    </div>
                  <?php if($b['jawaban_1_pertanyaan_3'] != "") { ?>
                    <div class="radio" style="color: black;">
                    <label>
                      <input type="radio" class="jawaban jawaban_<?= $b['id_pertanyaan3']; ?>" name="jawaban[<?= $b['id_pertanyaan3']; ?>]" value="1">
                     <b  style="color: black; font-size: large;" ><?= $b['jawaban_1_pertanyaan_3'] ?> </b> 
                    </label>
                  </div>
                  <?php } ?>
                  <?php if($b['jawaban_2_pertanyaan3'] != "") { ?>
                  <div class="radio">
                    <label>
                      <input type="radio" class="jawaban jawaban_<?= $b['id_pertanyaan3']; ?>" name="jawaban[<?= $b['id_pertanyaan3']; ?>]" value="0.8">
                      <b  style="color: black; font-size: large;" ><?= $b['jawaban_2_pertanyaan3'] ?></b>
                    </label>
                  </div>
                  <?php } ?>
                  <?php if($b['jawaban_3_pertanyaan3'] != "") { ?>
                  <div class="radio">
                    <label>
                      <input type="radio" class="jawaban jawaban_<?= $b['id_pertanyaan3']; ?>" name="jawaban[<?= $b['id_pertanyaan3']; ?>]" value="0.6">
                     <b style="color: black; font-size: large;"> <?= $b['jawaban_3_pertanyaan3'] ?> </b> 
                    </label>
                  </div>
                  <?php } ?>
                  <?php if($b['jawaban_4_pertanyaan3'] != "") { ?>
                  <div class="radio">
                    <label>
                      <input type="radio" class="jawaban jawaban_<?= $b['id_pertanyaan3']; ?>" name="jawaban[<?= $b['id_pertanyaan3']; ?>]" value="0.4">
                     <b style="color: black; font-size: large;"><?= $b['jawaban_4_pertanyaan3'] ?></b>
                    </label>
                  </div>
                  <?php } ?>
                
                  
                                  </div>
                    <?php } ?>

                                </div>
                                   <?php } ?>
                                </div>
                                 
                              
                            <div class="wizard-footer">
                                <div class="pull-right">
                                      <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Selanjutnya' />
                                     <a href="<?= base_url('pertanyaan2') ?>"> <input type='button' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='selanjutnya' /></a> 
                                  </div>
                                  <div class="pull-left">
                                      <input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='kembali' />

                  
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
     