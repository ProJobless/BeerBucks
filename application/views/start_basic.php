	<section id="cta" class="discover">
		<div class="sizer">
			<h1>Start an awesome party</h1>
		</div>

		<div class="divider"></div>
	</section>


	<section id="tabs" class="wizard">
		<ul class="sizer">
			<li>Guidelines<div></div></li>
			<li class="selected">Basic Information<div></div></li>
			<li>Party Details<div></div></li>
			<li>Review<div></div></li>
			<li><a href="#">Need Help?</a></li>
		</ul>

		<section id="tabContent" class="sizer start">

			<?php if(isset($error) && !isset($upload_data) ) echo '<p class="error">' . $error . '</p>' ?>
			
			<? if(isset($upload_data)) echo '<p class="success">Your image was successfully uploaded.</p>'; ?>
 			
 			<?php echo form_open_multipart('/start/do_upload');?>
				<section id="basic">

					<h1>Party Title</h1> <hr>

					<?php echo form_error('title'); ?>

					<div>
						<input type="text" name="title" placeholder="title" value="<? if(!set_value('title')){
								if($this->session->userdata('title')) echo $this->session->userdata('title');
							}else{
								echo set_value('title');
							} ?>"/>
						<p>
							Choose a catchy title for your party. This is the first thing other users will see.
							You should try to make your title <strong>catchy and descriptive.</strong>
						</p>
						<p>Ex: Bobbies 21st birthday bash</p>
					</div>

					<h1>Party Description</h1> <hr>

					<?php echo form_error('description'); ?>

					<div>
						<textarea name="description" placeholder="description"><? if(!set_value('description')){if($this->session->userdata('description')) echo $this->session->userdata('description');}else if(set_value('description')){echo set_value('description');}?></textarea>
						<p>
							Sum up your party in 200 characters. Try to describe what you plan kind of party
							it is, if there is a theme, what you plan on doing, and what you will spend the 
							money on. (drinks, food, games, ect.)
						</p>
					</div>

					<h1>Party Image</h1> <hr>
				
					<div>
						<p class="upload">
							This is a perfect time to show a picture from a previous party you’ve thrown. Alternatively you could use a picture of yourself and show off your beautiful smile.
						</p>
					</div>
				</section>

				<div><button type="submit" name="back" value="back">Go Back</button><button type="submit">Next Step</button></div>

			
				<label class="filebutton">
                	Select an image
                	<span><input id="uploadButton"type="file" name="userfile" size="20" /></span>
            	</label>
            	<label class="filebutton" style="display: none;">
               		Upload Image
               		<span><input id="uploadSubmit" type="submit" name="upload" value="upload" /></span>
            	</label>
        	<?php echo form_close(); ?>	

			<aside>
				<h1>Quick Preview</h1>
				<h2>A quick example of how others will see your party.</h2>

				<article>
					<img src="<? if($this->session->userdata('img_name')) echo base_url() . 'uploads/party/' . $this->session->userdata('img_name'); ?>" alt="" width="220" height="210"/>
					<hgroup>
						<h2> <? if(!set_value('title')){if($this->session->userdata('title')) echo $this->session->userdata('title');}else if(set_value('title')){echo set_value('title');}?> </h2>
						<h3>Hosted by <i> <? echo $this->session->userdata('username'); ?> </i></h3>
						<h4><? if(!set_value('description')){if($this->session->userdata('description')) echo $this->session->userdata('description');}else if(set_value('description')){echo set_value('description');}?></h4>
						<h3>Orlando, FL</h3>
					</hgroup>
					<div><p>$ 0/<? if(!set_value('goal')){if($this->session->userdata('goal')) echo ltrim($this->session->userdata('goal') , '$');}else if(set_value('goal')){echo ltrim(set_value('goal') , '$');}?></p></div>
					<hgroup>
						<h5>0</h5> <h6>Attending</h6>
						<h5>0</h5> <h6>Days Till Party</h6>
					</hgroup>
				</article>
			</aside>
		</section>
	</section>

	<!-- Libs -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<? echo base_url(); ?>js/libs/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="<? echo base_url(); ?>js/libs/modernizr-2.6.2.min.js"></script>
	<script src="<? echo base_url(); ?>js/libs/jquery-ui-1.10.3.custom.js"></script>

	<!-- Plugins -->
	<script src="<? echo base_url(); ?>js/plugins/jquery-ui-timepicker-addon.js"></script>

    <!-- Scripts -->
	<script src="<? echo base_url(); ?>js/main.js"></script>

	<!-- Inits -->
	<script>initScroller();</script>
	<script>initWizardOfOz();</script>
	<script>initUpload();</script>