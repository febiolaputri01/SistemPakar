
<br><br><br>
  <div class="image-container set-full-height" style="background-image: url('assets/template/img/slide/slide1.png')">
	    <!--   Big container   -->
	    <div class="container">
	     
	        <div class="row">
		        <div class="col-sm-8 col-sm-offset-2">
		            <!--      Wizard container        -->
		            <div class="wizard-container" >
		                <div class="card wizard-card" data-color="red" id="wizard">
		                    <form action="" method="">
		                <!--        You can switch " data-color="blue" "  with one of the next bright colors: "green", "orange", "red", "purple"             -->

		                    	<div class="wizard-header">
		                        	<h3 class="wizard-title">
		                        		Deteksi Dini Penyakit Infeksi Saluran Pernafasan Akut
		                        	</h3>
									<h5>Perhatikan pertanyaan dibawah dengan teliti, jawablah pertanyaan dibawah dengan benar sesuai dengan gejala yang anda alami.</h5>
		                    	</div>
								<div class="wizard-navigation">
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
			                            		
				                                	<h4 class="info-text"><?php echo $p['pertanyaan'] ?></h4>
				                                	
			                            	</div>
			                            	<div class="radio">
										<label>
											<input type="radio" name="optionsRadios">
											<?= $p['jawaban_1'] ?>
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios">
											<?= $p['jawaban_2'] ?>
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios">
											<?= $p['jawaban_3'] ?>
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios">
											<h5 ><b><?= $p['jawaban_4'] ?></b></h5>
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios">
											<?= $p['jawaban_5'] ?>
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" name="optionsRadios">
											<?= $p['jawaban_6'] ?>
										</label>
									</div>
								
		                                	
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
	   