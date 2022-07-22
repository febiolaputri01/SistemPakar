
<br><br><br>
  <div class="image-container set-full-height" style="background-image: url('assets/template/img/slide/slide1.png')">
	    <!--   Big container   -->

	    <div class="container">
	     
	        <div class="row ">
		        <div class="col-sm 12">
		            <!--      Wizard container        -->
		            <div class="wizard-container" >
		                <div class="card wizard-card" data-color="red" id="wizard">
		                    <form action="<?= base_url('execute') ?>" method="POST">
		                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        		Deteksi Dini Penyakit Infeksi Saluran Pernafasan Akut
		                        	</h3>
									<h5 style="	font: bold; color: 	red	;">Perhatikan pertanyaan dibawah dengan teliti, jawablah pertanyaan dibawah dengan benar sesuai dengan gejala yang anda alami.</h5>
		                    	</div>
								<div class="wizard-navigation" >
									<ul> <?php foreach ($pertanyaan as $pr) : ?>
																
																		 <li><a href="#detail-<?= $pr['id_pertanyaan']?>" data-toggle="tab"><?php
                                                                                $no = ++$start;
                                                                                echo $no;
                                                                                ?></a></li>
               
			                           
			                           <!--  <li><a href="#captain" data-toggle="tab">Room Type</a></li>
			                            <li><a href="#description" data-toggle="tab">Extra Details</a></li> -->
			                             <?php endforeach; ?>
			                        </ul>
								</div>

		                        <div class="tab-content">
		                        	<?php $no =1; foreach ($pertanyaan as $p ) { ?>
		                            <div class="tab-pane" id="detail-<?= $p['id_pertanyaan'] ?>">
		                            	<div class="row">
		                            		
			                            	<div class="col-sm-12">
			                            		<div class="text-center">
				                                	<h3 class="wizard-title" style="color: orangered;" > <b><?= $p['pertanyaan'] ?></b></h3> <br>	
				                                	 <input hidden class="form-check-input" name="pertanyaan<?= $no ?>" value="<?= $p['id_pertanyaan']?>">
                                           <input hidden class="form-check-input" name="idgejala<?= $no ?>" value="<?= $p['id_gejala_pertanyaan']?>">
				                                	</div>
			                            	</div>
			                           <?php if($p['id_pertanyaan'] ==1): ?>
																
																 <div class="radio" style="color: black;" >
			                            	<label>
																		<input  type="radio" name="jawaban1" value="1" >
																		<b  style="color: black; font-size: large;" >Iya saya merasakan gejala batuk berdahak selama 3 minggu</b>
																	</label>
																</div>
																<div class="radio" style="color: black;" >
			                            	<label>
																		<input  type="radio" name="jawaban1" value="0.8">
																		<b  style="color: black; font-size: large;" >Iya saya merasakan gejala batuk berdahak selama 2 minggu</b>
																	</label>
																</div>
																<div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban1" value="0.6">
																		<b  style="color: black; font-size: large;" >Iya saya merasakan gejala batuk berdahak selama 1 minggu</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban1" value="0">
																		<b  style="color: black; font-size: large;" >saya tidak merasakan gejala batuk berdahak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 2): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban2" value="1">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban2" value="0">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																	<?php elseif($p['id_pertanyaan']== 3): ?>
																<div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban3" value="0.4">
																		<b  style="color: black; font-size: large;" >Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban3" value="0">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																  
																		<?php elseif($p['id_pertanyaan']== 4): ?>
																			<div class="col-sm-4 " >
																		<div class="form-group">
																	    	<input type="text" name="jawaban4" placeholder="Masukkan suhu badan anda " class="form-control" />
																	  
																		</div>
																	</div>
															
																<?php elseif($p['id_pertanyaan']== 5): ?>
																 	<div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban5" value="1">
																		<b  style="color: black; font-size: large;" >saya mengalami demam selama 3 minggu</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban5" value="1">
																	<b style="color: black; font-size: large;"> Saya mengalami demam selama 2 minggu </b>
																	</label>
																</div>
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban5" value="1">
																	<b style="color: black; font-size: large;"> Saya mengalami demam selama 1 minggu</b>
																	</label>
																</div>
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban5" value="0">
																	<b style="color: black; font-size: large;"> saya tidak mengalami demam</b>
																	</label>
																</div>

																 
															<?php elseif($p['id_pertanyaan']== 6): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Iya, saya mengalami batuk berdarah selama 3 minggu bahkan lebih</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;"> Iya, saya mengalami batuk berdarah selama kurang dari 2 minggu  </b>
																	</label>
																</div>
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;"> Saya tidak mengalami batuk dengan disertai darah </b>
																	</label>
																</div>

															<?php elseif($p['id_pertanyaan']== 7): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" >Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;"> Tidak  </b>
																	</label>
																</div>
																
															<?php elseif($p['id_pertanyaan']== 8): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" >Saya merasa tenggorokan saya sangat terasa nyeri</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Saya merasa tenggorokan saya sedikit nyeri</b>
																	</label>
																</div>
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Saya tidak merasa nyeri tenggorokan</b>
																	</label>
																</div>
															<?php elseif($p['id_pertanyaan']== 9): ?>
																
																   <div class="col-sm-4 " >
																		<div class="form-group">
																	    	<input type="text" value="" placeholder="Masukkan Nilai RR " class="form-control" />
																		</div>
																	</div>

															<?php elseif($p['id_pertanyaan']== 10): ?>
																
																 <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>

															<?php elseif($p['id_pertanyaan']== 11): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" >iya, saya sangat merasa mual</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">iya, saya sedikit merasa mual</b>
																	</label>
																</div>
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">saya tidak mual</b>
																	</label>
																</div>
																 
															<?php elseif($p['id_pertanyaan']== 12): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
															<?php elseif($p['id_pertanyaan']== 13): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 14): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 15): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 16): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
															<?php elseif($p['id_pertanyaan']== 17): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 18): ?>
																 <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Saya sangat merasa sakit kepala</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;"> Saya agak merasa sakit kepala </b>
																	</label>
																</div>
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;"> Saya tidak merasa sakit kepala </b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 19): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
															<?php elseif($p['id_pertanyaan']== 20): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>

																<?php elseif($p['id_pertanyaan']== 21): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 22): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 23): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 24): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 25): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 26): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 27): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 28): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 29): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 30): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 31): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 32): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 33): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 34): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 35): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 36): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 37): ?>
															
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 38): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 39): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 40): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php elseif($p['id_pertanyaan']== 41): ?>
																
																  <div class="radio" style="color: black;" >
			                            	<label>
																		<input type="radio" name="jawaban" value="">
																		<b  style="color: black; font-size: large;" > Ya</b>
																	</label>
																</div> 
																<div class="radio" style="color: black;">
																	<label>
																		<input type="radio" name="jawaban" value="">
																	<b style="color: black; font-size: large;">Tidak</b>
																	</label>
																</div>
																<?php else: ?>
																  <div class="first-and-second-condition-false">Conditions are false</div>
																<?php endif; ?>





			                          
			             
									<!-- 
										
									<div class="radio">
										<label>
											<input type="radio" name="jawaban" value="">
											<?= $p['jawaban_5'] ?>
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="jawaban" value="">
											<?= $p['jawaban_6'] ?>
										</label>
									</div> -->
								
		                                	
		                            	</div>

		                            </div>
		                            	 <?php } ?>
		                            </div>
		                             
		                           <!--  <div class="tab-pane" id="captain">
		                                <h4 class="info-text">What type of room would you want? </h4>
		                                <div class="row">
		                                    <div class="col-sm-10 col-sm-offset-1">
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="This is good if you travel alone.">
		                                                <input type="radio" name="job" value="Design">
		                                                <div class="icon">
		                                                    <i class="material-icons">weekend</i>
		                                                </div>
		                                                <h6>Single</h6>
		                                            </div>
		                                        </div>
		                                        <div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Select this room if you're traveling with your family.">
		                                                <input type="radio" name="job" value="Code">
		                                                <div class="icon">
		                                                    <i class="material-icons">home</i>
		                                                </div>
		                                                <h6>Family</h6>
		                                            </div>
		                                        </div>
												<div class="col-sm-4">
		                                            <div class="choice" data-toggle="wizard-radio" rel="tooltip" title="Select this option if you are coming with your team.">
		                                                <input type="radio" name="job" value="Code">
		                                                <div class="icon">
		                                                    <i class="material-icons">business</i>
		                                                </div>
		                                                <h6>Business</h6>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div> -->
		                          <!--   <div class="tab-pane" id="description">
		                                <div class="row">
		                                    <h4 class="info-text"> Drop us a small description.</h4>
		                                    <div class="col-sm-6 col-sm-offset-1">
	                                    		<div class="form-group">
		                                            <label>Room description</label>
		                                            <textarea class="form-control" placeholder="" rows="6"></textarea>
		                                        </div>
		                                    </div>
		                                    <div class="col-sm-4">
		                                    	<div class="form-group">
		                                            <label class="control-label">Example</label>
		                                            <p class="description">"The room really nice name is recognized as being a really awesome room. We use it every sunday when we go fishing and we catch a lot. It has some kind of magic shield around it."</p>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div> -->
	                        	<div class="wizard-footer">
	                            	<div class="pull-right">
	                                    <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Next' />
	                                    <input type='button' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Finish' />
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
	   