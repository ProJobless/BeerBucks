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
				<a href="<?=base_url("index.php/edit_party/details/$partyID")?>" class="selected">Party Details</a>
				<a href="<?=base_url("index.php/edit_party/updates/$partyID")?>">Updates</a>
			</nav>
		</aside>

		<section id="settingsForms" class="partyEdit">

			<? if(isset($error) && !isset($upload_data)):?>
				<p class="error"><?=$error?></p>
			<? endif; ?>
			
			<? if(isset($upload_data)): ?>
				<p class="success">Your image was successfully uploaded.</p>
			<? endif; ?>
 			
 			<?=form_open_multipart("/edit_party/edit_details/$partyID");?>

				<h1>Party Location</h1> <hr>

				<?=form_error('partyLocation'); ?>
				<?=form_error('address'); ?>

				<div>
					<input type="text" name="partyLocation" placeholder="Orlando, FL" value="<?=$party[0]['party_location']?>" />
					<input type="text" name="address" placeholder="address" value="<?=$party[0]['address']?>" />
					<p>Exact party locations will be <strong>hidden</strong> to everyone who hasn’t donated to the party. Users who have not donated will only see the <strong>city and state</strong> of the party location.</p>
				</div>

				<h1>Party Time</h1> <hr>

				<?=form_error('start'); ?>
				<?=form_error('end'); ?>

				<div>
					<input type="text" name="start" placeholder="Party Start Time" value="<?=$party[0]['start']?>" />
					<input type="text" name="end" placeholder="Party End Time" value="<?=$party[0]['end']?>" />
				</div>

				<h1>Funding Goal</h1> <hr>

				<?=form_error('goal'); ?>

				<div>
					<input type="text" name="goal" placeholder="$0.00" value="$<?=$party[0]['goal']?>"/>
					<p>How much money are you looking to raise for your party? You can raise more than your goal, and we hope your extra funding will go towards your party. Remember that party attenders will have a chance to <strong>rate your party</strong>, and may leave you <strong>bad rep</strong>.</p>
				</div>

				<div><button type="submit">Submit Changes</button></div>

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
	<script>initDatePicker();</script>
	<script>initDollarSign();</script>