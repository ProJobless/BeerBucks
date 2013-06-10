	<? $removeButton = true; ?>
	<section id="settings" class="sizer">
		<aside>
			<article>
				<? if($this->session->userdata('profileImage')){ 
					echo '<img src="' . base_url() . 'uploads/profile/' . $this->session->userdata('profileImage') . '" width="220" height="210" />';
				}else{
					echo '<img src="" width="220" height="210" />';
				}?>
				
				<hgroup>
					<h2><i><? echo $this->session->userdata('username') ?></i></h2>
					<h3><? echo $this->session->userdata('location') ?></h3>
					<h4><? echo $this->session->userdata('bio') ?></h4>
				</hgroup>
				<!-- <ul>
					<li>FeedBack <span>0</span></li>
					<li>Views <span>0</span></li>
					<li>Comments <span>0</span></li>
				</ul>
				<hgroup>
					<h5>0</h5> <h6>contributors</h6>
					<h5>0</h5> <h6>Hosted Parties</h6>
				</hgroup> -->
			</article>

			<ul id="settingsNav">
				<li class="selected">Profile Settings</li>
				<li>Account Settings</li>
				<li>Services Settings</li>
				<li>Subscription Settings</li>
			</ul>
		</aside>

		<section id="settingsForms">

			<?php if(isset($error) && !isset($upload_data) ) echo '<p class="error">' . $error . '</p>' ?>
			
			<? if(isset($upload_data)) echo '<p class="success">Your image was successfully uploaded.</p>'; ?>
 			
 			<?php echo form_open_multipart('/settings/do_upload');?>

				<h1>Username</h1> <hr>

				<?php echo form_error('username'); ?>

				<div>
					<input type="text" name="username" placeholder="username" value="<? if(!set_value('username')){
							if($this->session->userdata('username')) echo $this->session->userdata('username');
						}else{
							echo set_value('username');
						} ?>"/>
				</div>

				<h1>Biography</h1> <hr>

				<?php echo form_error('bio'); ?>

				<div>
					<textarea name="bio" placeholder="bio"><? if(!set_value('bio')){if($this->session->userdata('bio')) echo $this->session->userdata('bio');}else if(set_value('bio')){echo set_value('bio');}?></textarea>
					<p>
						Sum up yourself in 145 characters. This short description about yourself will be the
						first impression that potential party donators will see.

					</p>
				</div>

				<h1>Location</h1> <hr>

				<?php echo form_error('location'); ?>

				<div>
					<input type="text" name="location" placeholder="Orlando, FL" value="<? if(!set_value('location')){
							if($this->session->userdata('location')) echo $this->session->userdata('location');
						}else{
							echo set_value('location');
						} ?>"/>
				</div>

				<h1>Time Zone</h1> <hr>

				<?php echo form_error('timezone'); ?>

				<div>
					<input type="text" name="timezone" placeholder="timezone" value="<? if(!set_value('timezone')){
							if($this->session->userdata('timezone')) echo $this->session->userdata('timezone');
						}else{
							echo set_value('timezone');
						} ?>"/>
				</div>

				<h1>Profile Image</h1> <hr>
			
				<div>
					<p class="upload">
						This is a perfect time to show a picture from a previous party you’ve thrown. Alternatively you could use a picture of yourself and show off your beautiful smile.
					</p>
				</div>

				<div><button type="submit">Submit Changes</button></div>

				<label class="filebutton">
                	Select an image
                	<span><input id="uploadButton"type="file" name="userfile" size="20" /></span>
            	</label>
            	<label class="filebutton" style="display: none;">
               		Upload Image
               		<span><input id="uploadSubmit" type="submit" name="upload" value="upload" /></span>
            	</label>

			<?php echo form_close(); ?>	

		</section>
	</section>

	<!-- Libs -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<? echo base_url(); ?>js/libs/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="<? echo base_url(); ?>js/libs/modernizr-2.6.2.min.js"></script>
	<script src="<? echo base_url(); ?>js/libs/jquery-ui-1.10.3.custom.js"></script>

    <!-- Scripts -->
	<script src="<? echo base_url(); ?>js/main.js"></script>

	<!-- Inits -->
	<script>initUpload();</script>