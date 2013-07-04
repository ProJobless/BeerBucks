	<? if(isset($success)): ?>
		<p class="success sizer"><?=$success?></p>			
	<?endif;?>

	<? if(isset($error) && !isset($upload_data)):?>
		<p class="error sizer"><?=$error?></p>
	<? endif; ?>

	<section id="settings" class="sizer">
		<aside>
			<article class="party">

				<img src="<?=base_url()?>uploads/party/<?=$party[0]['party_img']?>" alt="" width="220" height="210"/>
			
				<hgroup>
					<h2><?=$party[0]['title']?></h2>
					<h3>Hosted by <i><?=$party[0]['username']?></i></h3>
					<h4><?=$party[0]['description']?></h4>
					<h3><?=$party[0]['party_location']?></h3>
				</hgroup>

				<div><p>$ XXX/<?=$party[0]['goal']?></p></div>

				<hgroup>
					<h5><?=$party[0]['attending']?></h5> <h6>Attending</h6>
					<?if($party[0]['days'] > 1):?>
						<h5><?=$party[0]['days']?></h5> <h6>Days Till Party</h6>
					<?elseif($party[0]['days'] == 1):?>
						<h5><?=$party[0]['days']?></h5> <h6>Day Till Party</h6>
					<?elseif($party[0]['hours'] > 1):?>
						<h5><?=$party[0]['hours']?></h5> <h6>Hours Till Party</h6>
					<?elseif($party[0]['hours'] == 1):?>
						<h5><?=$party[0]['hours']?></h5> <h6>Hour Till Party</h6>
					<?elseif($party[0]['minutes'] > 1):?>
						<h5><?=$party[0]['minutes']?></h5> <h6>Minutes Till Party</h6>
					<?elseif($party[0]['minutes'] = 1):?>
						<h5><?=$party[0]['minutes']?></h5> <h6>Minute Till Party</h6>
					<?elseif($party[0]['seconds'] > 1):?>
						<h5><?=$party[0]['seconds']?></h5> <h6>Seconds Till Party</h6>
					<?elseif($party[0]['seconds'] = 1):?>
						<h5><?=$party[0]['seconds']?></h5> <h6>Second Till Party</h6>
					<?endif;?>
				</hgroup>
			
			</article>

			<nav id="settingsNav">
				<a href="<?=base_url("index.php/edit_party/information/$partyID")?>"  class="selected">Basic Information</a>
				<a href="<?=base_url("index.php/edit_party/details/$partyID")?>">Party Details</a>
				<a href="<?=base_url("index.php/edit_party/updates/$partyID")?>">Updates</a>
			</nav>
		</aside>

		<section id="settingsForms" class="partyEdit">
 			
 			<?=form_open_multipart("/edit_party/edit_information/$partyID");?>

				<h1>Party Title</h1> <hr />

				<?=form_error('title'); ?>

				<div>
					<input type="text" name="title" placeholder="party Title" value="<?=$party[0]['title']?>"/>
					<p>
						Choose a catchy title for your party. This is the first thing other users will see. You should try to make your title catchy and descriptive.
					</p>
					<p>Ex: Bobbies 21st birthday bash</p>
				</div>

				<h1>Party Description</h1> <hr />

				<?=form_error('description'); ?>

				<div>
					<textarea name="description" placeholder="description"><?=$party[0]['description']?></textarea>
					<p>
						Sum up your party in 200 characters. Try to describe what you plan kind of party it is, if there is a theme, what you plan on doing, and what you will spend the money on. (drinks, food, games, ect.)
					</p>
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