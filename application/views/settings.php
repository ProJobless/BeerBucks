	<? if(isset($success)): ?>
		<p class="success sizer"><?=$success?></p>			
	<?endif;?>

	<? if(isset($error) && !isset($upload_data)):?>
		<p class="error sizer"><?=$error?></p>
	<? endif; ?>

	<section id="settings" class="sizer">
		<aside>
			<article>
				<? if($this->session->userdata('profileImage')):?> 
					<img src="<?=base_url()?>uploads/profile/<?=$this->session->userdata('profileImage')?>" width="220" height="210" />
				<? else: ?>
					<img src="" width="220" height="210" />
				<? endif; ?>
				
				<hgroup>
					<h2><i><?= $this->session->userdata('username') ?></i></h2>
					<h3><?= $this->session->userdata('location') ?></h3>
					<h4><?= $this->session->userdata('bio') ?></h4>
				</hgroup>
			</article>

			<nav id="settingsNav">
				<a href="#" class="selected">Profile Settings</a>
				<a href="#">Account Settings</a>
				<a href="#">Services Settings</a>
				<a href="#">Subscription Settings</a>
			</nav>
		</aside>

		<section id="settingsForms">
 			
 			<?=form_open_multipart('/settings/profile');?>

				<h1>Username</h1> <hr />

				<?=form_error('username'); ?>

				<div>
					<input type="text" name="username" placeholder="username" value="<? if(!set_value('username')){
							if($this->session->userdata('username')) echo $this->session->userdata('username');
						}else{
							echo set_value('username');
						} ?>"/>
				</div>

				<h1>Biography</h1> <hr />

				<?=form_error('bio'); ?>

				<div>
					<textarea name="bio" placeholder="bio"><? if(!set_value('bio')){if($this->session->userdata('bio')) echo $this->session->userdata('bio');}else if(set_value('bio')){echo set_value('bio');}?></textarea>
					<p>
						Sum up yourself in 145 characters. This short description about yourself will be the
						first impression that potential party donators will see.

					</p>
				</div>

				<h1>Location</h1> <hr />

				<?=form_error('location'); ?>

				<div>
					<input type="text" name="location" placeholder="Orlando, FL" value="<? if(!set_value('location')){
							if($this->session->userdata('location')) echo $this->session->userdata('location');
						}else{
							echo set_value('location');
						} ?>"/>
				</div>

				<h1>Time Zone</h1> <hr />

				<?=form_error('timezone'); ?>

				<div>
					<span class="styled" name="timezone">
						<select name="timezone">
					        <option <? if(set_value('timezone') == '-6' || $this->session->userdata('timezone') == '-6') echo 'selected'?> value="-6">Eastern</option>
					        <option <? if(set_value('timezone') == '-7' || $this->session->userdata('timezone') == '-7') echo 'selected'?> value="-7">Central</option>
					        <option <? if(set_value('timezone') == '-8' || $this->session->userdata('timezone') == '-8') echo 'selected'?> value="-8">Mountain</option>
					        <option <? if(set_value('timezone') == '-9' || $this->session->userdata('timezone') == '-9') echo 'selected'?> value="-9">Pacific</option>
					    </select>
					</span>
				</div>

				<h1>Profile Image</h1> <hr />
			
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

			<?=form_close(); ?>	

		</section>
	</section>

	<!-- Libs -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?=base_url()?>js/libs/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="<?=base_url()?>js/libs/modernizr-2.6.2.min.js"></script>
	<script src="<?=base_url()?>js/libs/jquery-ui-1.10.3.custom.js"></script>

    <!-- Scripts -->
	<script src="<?=base_url()?>js/main.js"></script>

	<!-- Inits -->
	<script>initUpload();</script>
	<script>initSuccessError();</script>
	<script>initAutoComplete();</script>