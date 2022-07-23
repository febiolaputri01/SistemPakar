<br><br><br>
<style>
  .pertanyaan_class_all {
    color: orangered;
  }
</style>
<div class="image-container set-full-height" style="background-image: url('assets/template/img/slide/bcc.jpg')">
  <div class="container">
    <div class="row">
      <div class="col-sm 12">
        <div class="wizard-container">
          <div class="card wizard-card" data-color="red" id="wizardProfile">
            <form action="" method="">
              <div class="wizard-header">

                <br>
                <br>
                <h2 class="wizard-title">
                  Deteksi Dini Penyakit Infeksi Saluran Pernafasan Akut
                </h2>
                <h3 style=" font: bold; color:  red ;">
                  Perhatikan pertanyaan dibawah dengan teliti, jawablah pertanyaan dibawah dengan benar sesuai dengan gejala yang anda alami.
                </h3>
              </div>

              <?php $arr_devide = array_chunk($pertanyaan[$num], 4); ?>

              <!-- ############# NAVIGATION ########### -->
              <div class="wizard-navigation">
                <ul>
                  <?php foreach ($arr_devide as $key => $nav) { ?>
                  <li><a href="#detail-<?= $key + 1 ?>" data-toggle="tab"><?= $key + 1 ?></a></li>
                  <?php } ?>
                </ul>
              </div>


              <!-- ############# CONTENT ########### -->
              <div class="tab-content part_<?= $num + 1 ?>">
                <?php foreach ($arr_devide as $key => $devide) { ?>
                <div class="tab-pane" id="detail-<?= $key + 1 ?>">
                  <?php foreach ($devide as $k => $data) { ?>
                  <div class="row">
                    <div class="col-sm-12">
                      <h3 class="text pertanyaan_class_all"><?= $data['pertanyaan'] ?></h3>
                    </div>
                    <div class="radio" style="color: black;">
                      <?php if (isset($data['id_pertanyaan'])) { ?>
                      <?php for ($i = 1; $i <= 4; $i++) { ?>
                      <label class="col-sm-12">
                        <input type="radio" name="jawaban[<?= $data['id_pertanyaan'] ?>]" value="1">
                        <b style="color: black; font-size: large;"><?= $data['jawaban_' . (string) $i] ?></b>
                      </label>
                      <?php } ?>
                      <?php } ?>
                    </div>
                  </div>
                  <?php } ?>
                </div>
                <?php } ?>
              </div>

              <div class="wizard-footer">

                <div class="pull-right">
                  <button type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next'>Selanjutnya</button>
                  <?php if ($num >= 0 && $num <= 3) { ?>
                  <button type='button' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish'>Selanjutnya</button>
                  <?php } ?>
                </div>
                <div class="pull-left">

                  <button type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous'>Kembali</button>

                </div>
                <br><br>
                <?php if ($num != 0) { ?>
                <button type='button' class='btn btn-fill btn-default btn-wd col-sm-12 back-page' style="float: left;">Kembali Ke Halaman Sebelumnya</button>
                <?php } ?>

              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="<?= base_url() ?>assets_wizard/js/jquery-2.2.4.min.js" type="text/javascript"></script>
<script>
  $(document).ready(function() {
    var url = `<?= base_url('pertanyaan') ?>/<?= (string) $num + 2 ?>`;
    $('.btn-finish').on('click', function() {
      window.location.href = url;
    })
    var url_back = `<?= base_url('pertanyaan') ?>/<?= (string) $num  ?>`;
    $('.back-page').on('click', function() {
      window.location.href = url_back;
    })
  })
</script>