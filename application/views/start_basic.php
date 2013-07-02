	<section id="cta" class="discover">
		<div class="sizer">
			<h1>Start an awesome party</h1>
		</div>
	</section>


	<section id="tabs" class="sizer wizard">
		<ul>
			<li><h1>Guidelines</h1></li>
			<li class="selected"><h1>Basic Information</h1></li>
			<li><h1>Party Details</h1></li>
			<li><h1>Review</h1></li>
			<li><a href="#">Need Help?</a></li>
		</ul>

		<section id="tabContent" class="start">

			<? if(isset($error) && !isset($upload_data)): ?>
				<p class="error"><?=$error?></p>
			<? endif; ?>
			
			<? if(isset($upload_data)): ?> 
				<p class="success">Your image was successfully uploaded.</p>
			<? endif; ?>
 			
 			<?=form_open_multipart('/start/details');?>
				<section id="basic">

					<h1>Party Title</h1> <hr />

					<?=form_error('title'); ?>

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

					<h1>Party Description</h1> <hr />

					<?=form_error('description'); ?>

					<div>
						<textarea name="description" placeholder="description"><? if(!set_value('description')){if($this->session->userdata('description')) echo $this->session->userdata('description');}else if(set_value('description')){echo set_value('description');}?></textarea>
						<p>
							Sum up your party in 200 characters. Try to describe what you plan kind of party
							it is, if there is a theme, what you plan on doing, and what you will spend the 
							money on. (drinks, food, games, ect.)
						</p>
					</div>

					<h1>Party Image</h1> <hr />
				
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
        	<?=form_close(); ?>	

			<aside>
				<h1>Quick Preview</h1>
				<h2>A quick example of how others will see your party.</h2>

				<article class="party">
					<img src="<? if($this->session->userdata('img_name')) echo base_url() . 'uploads/party/' . $this->session->userdata('img_name'); ?>" alt="" width="220" height="210"/>
					<hgroup>
						<h2> 
							<? if(!set_value('title')):?>
								<?if($this->session->userdata('title')) echo $this->session->userdata('title');?>
							<? elseif(set_value('title')):?>
								<?=set_value('title')?>
							<? endif; ?>
						</h2>

						<h3>Hosted by <i> <?=$this->session->userdata('username')?> </i></h3>

						<h4>
							<? if(!set_value('description')):?>
								<?if($this->session->userdata('description')) echo $this->session->userdata('description');?>
							<? elseif(set_value('description')):?>
								<?=set_value('description')?>
							<? endif; ?>
						</h4>

						<h3>Orlando, FL</h3>
					</hgroup>

					<div><p>
							<? if(!set_value('goal')):?>
								<?if($this->session->userdata('goal')) echo '$ 0/' . ltrim($this->session->userdata('goal') , '$');?>
							<? elseif(set_value('goal')):?>
								<?='$ 0/' . ltrim(set_value('goal') , '$')?>
							<? endif; ?>
						</p>
					</div>

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
	<script>window.jQuery || document.write('<script src="<?=base_url()?>js/libs/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="<?=base_url()?>js/libs/modernizr-2.6.2.min.js"></script>
	<script src="<?=base_url()?>js/libs/jquery-ui-1.10.3.custom.js"></script>

	<!-- Plugins -->
	<script src="<?=base_url()?>js/plugins/jquery-ui-timepicker-addon.js"></script>

    <!-- Scripts -->
	<script src="<?=base_url()?>js/main.js"></script>

	<!-- Inits -->
	<script>initScroller();</script>
	<script>initWizardOfOz();</script>
	<script>initUpload();</script>