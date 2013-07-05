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
				<a href="<?=base_url("index.php/edit_party/information/$partyID")?>">Basic Information</a>
				<a href="<?=base_url("index.php/edit_party/details/$partyID")?>">Party Details</a>
				<a href="<?=base_url("index.php/edit_party/updates/$partyID")?>" class="selected">Updates</a>
			</nav>
		</aside>

		<section id="settingsForms" class="partyEdit">
 			
 			<?=form_open_multipart("/edit_party/update/$partyID");?>

				<h1>Update Title</h1> <hr />

				<?=form_error('updateTitle'); ?>

				<div>
					<input type="text" name="updateTitle" value="<? if(!isset($success)) echo set_value('updateTitle')?>" />
					<p>A short title describing your update.</p>
				</div>

				<h1>Update</h1> <hr />

				<?=form_error('update'); ?>

				<div>
					<textarea name="update"><? if(!isset($success)) echo set_value('update')?></textarea>
					<p>Updates are used to inform your party attendees about any <strong>changes</strong> that may occur during the planning of the party. Remember, anytime you update your party information or details it will <strong>automatically</strong> be shared as an update to your party attendees.</p>
				</div>

				<div><button type="submit">Submit Update</button></div>

			<?=form_close(); ?>	

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
	<script>initSettings();</script>
	<script>initSuccessError();</script>