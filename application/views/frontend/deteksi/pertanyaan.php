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
                <h4 style=" font: bold; color:  navy   ;">
                  <b> Perhatikan pertanyaan dibawah dengan teliti, jawablah pertanyaan dibawah dengan benar sesuai dengan tingkat keyakinan yang anda alami. </b>
                </h4>
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
                      <h3 class="text pertanyaan_class_all"> <b> <?= $data['pertanyaan'] ?> </b></h3>
                    </div>
                    <div class="radio" style="color: black;">
                      <?php if (isset($data['id_pertanyaan'])) { ?>
                      <?php for ($i = 1; $i <= 4; $i++) { ?>
                      <?php
                              $this->db->where('id_pertanyaan', $data['id_pertanyaan']);
                              $this->db->where('grup_pertanyaan', $num + 1);
                              $this->db->where('id_deteksi_pasien', $_SESSION['pasien']);
                              $dataJawaban = $this->db->get('tb_jawaban')->row_array();
                              ?>
                      <label class="col-sm-12">
                        <!-- jika pertanyaan == 2   -->
                        <?php if ($num == 1) { ?>
                        <?php if (isset($dataJawaban['jawaban']) && $dataJawaban['jawaban'] == $data['jawaban_' . (string) $i]) : ?>
                        <input type="radio" name="jawaban[<?= $data['id_pertanyaan'] ?>]" value="<?= $data['jawaban_' . (string) $i] ?>" class="jawaban" id="<?= $data['id_pertanyaan'] ?>" checked="checked">
                        <b style="color: black; font-size: large;"><?= $data['nama' . (string) $i] ?></b>
                        <?php else : ?>
                        <input type="radio" name="jawaban[<?= $data['id_pertanyaan'] ?>]" value="<?= $data['jawaban_' . (string) $i] ?>" class="jawaban" id="<?= $data['id_pertanyaan'] ?>">
                        <b style="color: black; font-size: large;"><?= $data['nama' . (string) $i] ?></b>
                        <?php endif ?>
                        <?php } else { ?>
                        <!-- jika pertanyaan 1 dan 3 -->
                        <?php if (isset($dataJawaban['jawaban']) && $dataJawaban['jawaban'] == $bobot_pertanyaan_1[$i - 1]) : ?>
                        <input type="radio" name="jawaban[<?= $data['id_pertanyaan'] ?>]" value="<?= $bobot_pertanyaan_1[$i - 1] ?>" class="jawaban" id="<?= $data['id_pertanyaan'] ?>" checked="checked">
                        <b style="color: black; font-size: large;"><?= $data['jawaban_' . (string) $i] ?></b>
                        <?php else : ?>
                        <input type="radio" name="jawaban[<?= $data['id_pertanyaan'] ?>]" value="<?= $bobot_pertanyaan_1[$i - 1] ?>" class="jawaban" id="<?= $data['id_pertanyaan'] ?>">
                        <b style="color: black; font-size: large;"><?= $data['jawaban_' . (string) $i] ?></b>
                        <?php endif ?>
                        <?php } ?>
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
                  <?php if ($num >= 0 && $num < 3) { ?>
                  <?php if ($num == 2) { ?>

                  <button type='button' class='btn btn-finish btn-fill btn-danger btn-wd data-finish' name='finish'>Selesai</button>
                  <?php } else { ?>
                  <button type='button' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish'>Selanjutnya</button>
                  <?php } ?>
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

    id = <?= $_SESSION['pasien'] ?>;
    var url = `<?= base_url('pertanyaan') ?>/<?= (string) $num + 2 ?>`;
    $('.btn-finish').on('click', function() {
      if (!$(this).hasClass('data-finish')) {
        window.location.href = url;
      }
    })
    var url_back = `<?= base_url('pertanyaan') ?>/<?= (string) $num  ?>`;
    $('.back-page').on('click', function() {
      window.location.href = url_back;
    })

    grup_pertanyaan = <?= $num; ?>;

    $('.jawaban').on('change', function() {
      $.post("<?= base_url('simpan_jawaban') ?>", {
          'id_pasien': id,
          'id_pertanyaan': $(this).attr('id'),
          'id_jawaban': $(this).val(),
          'grup_pertanyaan': grup_pertanyaan + 1
        },
        function(data, textStatus, jqXHR) {
          console.log(data)
        },
        "JSON"
      );
    })

    function allStorage() {

      var values = [],
        keys = Object.keys(localStorage),
        i = keys.length;

      while (i--) {
        values.push({
          i: localStorage.getItem(keys[i])
        });
      }

      return values;
    }


    $('.data-finish').on('click', function() {
      urlcf = "<?= base_url() ?>";

      $.ajax({
        type: "post",
        url: urlcf + "evidencegejala",
        data: {
          id_pasien: id
        },
        dataType: "JSON",
        success: function(response) {
          console.log('oke')
        }
      });

      window.location.href = urlcf + 'hasil';
    });


  })
</script>