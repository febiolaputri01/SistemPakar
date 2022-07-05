 
    <section class="content-header">
      <h1>
        Aturan
      </h1>
     
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12 col-xs-6">

<div class="box">
  <div class="box-header">
    <div class="col-md-2" style="padding: 0;">      
    </div>

      <div class="box-body">
    <table id="example1" class="table table-bordered table-hover">

      <thead>
        <tr>
          <th>No</th>
          <th>Aturan</th>
        </tr>
         </thead>
         
      <?php
      
      $no = 1;
      $query_penyakit = $this->db->get('tb_penyakit')->result();
      foreach ($query_penyakit    as $p ) {
      ?>
      <tr>
        <td><?php echo $no++ ?></td>
        <td>
           <?php
             $query_aturan = $this->db
                          ->join('tb_gejala', 'tb_gejala.id_gejala=tb_evidence.evidence_gejala_id')
                          ->where('evidence_penyakit_id', $p->id_penyakit)
                          ->order_by('tb_evidence.evidence_gejala_id', 'ASC')
                          ->get('tb_evidence')
                          ->result();
              $i= 1;
             foreach ($query_aturan as $row) {
               if($i == 1){
                 
                echo " <b>IF</b> ".$row->nama_gejala; 
                echo "<br>";
                
              }else{
                
                echo " <b>AND</b> ".$row->nama_gejala;
                echo "<br>";
                
               } $i++; 
             } ?>
           <b>THEN <span class="text-info"><?php echo strtoupper($p->nama_penyakit) # strtoupper->biar tulisan nya huruf kapital ?></span></b>
        </td>
      </tr>
    <?php } ?>
     
      <tbody id="data-hp">

      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>



  


