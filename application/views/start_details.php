	<section id="cta" class="discover">
		<div class="sizer">
			<h1>Start an awesome party</h1>
		</div>
	</section>

	<? if(isset($error) && !isset($upload_data)): ?>
		<p class="error sizer"><?=$error?></p>
	<? endif; ?>

	<section id="tabs" class="sizer wizard">
		<ul>
			<li><h1>Guidelines</h1></li>
			<li><h1>Basic Information</h1></li>
			<li class="selected"><h1>Party Details</h1></li>
			<li><h1>Account</h1></li>
			<li><h1>Review</h1></li>
			<li><a href="#">Need Help?</a></li>
		</ul>

		<section id="tabContent" class="start">

 			<?=form_open("/start/account"); ?>
				<section id="details">

					<h1>Party Location</h1> <hr>

					<?=form_error('partyLocation'); ?>
					<?=form_error('address'); ?>

					<div>
						<input type="text" name="partyLocation" placeholder="Orlando, FL" value="<? if(!set_value('partyLocation')){
								if($this->session->userdata('partyLocation')) echo $this->session->userdata('partyLocation');
							}else{
								echo set_value('partyLocation');
							} ?>"/>

						<input type="text" name="address" placeholder="address" value="<? if(!set_value('address')){
								if($this->session->userdata('address')) echo $this->session->userdata('address');
							}else{
								echo set_value('address');
							} ?>"/>

						<p>
							Exact party locations will be <strong>hidden</strong> to everyone who hasn’t donated to the party. Users who have not donated will only see the <strong>city and state</strong> of the party location.
 						</p>
					</div>

					<input type="hidden" name="partyLat" class="partyLat" value="<? if(!set_value('partyLat')){
								if($this->session->userdata('partyLat')) echo $this->session->userdata('partyLat');
							}else{
								echo set_value('partyLat');
							} ?>">


					<input type="hidden" name="partyLng" class="partyLng" value="<? if(!set_value('partyLng')){
								if($this->session->userdata('partyLng')) echo $this->session->userdata('partyLng');
							}else{
								echo set_value('partyLng');
							} ?>">

					<h1>Party Time</h1> <hr>

					<?=form_error('start'); ?>
					<?=form_error('end'); ?>

					<div>
						<input class="startTime" type="text" name="start" placeholder="Party Start Time" value="<? if(!set_value('start')){
								if($this->session->userdata('start')) echo $this->session->userdata('start');
							}else{
								echo set_value('start');
							} ?>"/>
						<input class="end" type="text" name="end" placeholder="Party End Time" value="<? if(!set_value('end')){
								if($this->session->userdata('end')) echo $this->session->userdata('end');
							}else{
								echo set_value('end');
							} ?>"/>
					</div>

					<h1>Funding Goal</h1> <hr>

					<?=form_error('goal'); ?>

					<div>
						<input type="text" name="goal" placeholder="$0" value="<? if(!set_value('goal')){
								if($this->session->userdata('goal')) echo $this->session->userdata('goal');
							}else{
								echo set_value('goal');
							} ?>"/>
						<p>
							How much money are you looking to raise for your party? You can raise more than your goal, and we hope your extra funding will go towards your party. Remember that party attenders will have a chance to <strong>rate your party</strong>, and may leave you <strong>bad rep</strong>.
						</p>
					</div>
				</section>

				<div><button type="submit" name="back" value="back">Go Back</button><button type="submit">Next Step</button></div>

			<?=form_close(); ?>	

			<aside>
				<h1>Quick Preview</h1>
				<h2>A quick example of how others will see your party.</h2>

				<article class="party">
					<img src="<? if($this->session->userdata('img_name')) echo base_url() . 'uploads/party/' . $this->session->userdata('img_name'); ?>" alt="" width="220" height="210"/>
					<hgroup>
						<h2 class="title"> 
							<? if(!set_value('title')):?>
								<?if($this->session->userdata('title')) echo $this->session->userdata('title');?>
							<? elseif(set_value('title')):?>
								<?=set_value('title')?>
							<? endif; ?>
						</h2>

						<h3>Hosted by <i> <?=$this->session->userdata('username')?> </i></h3>

						<h4 class="description">
							<? if(!set_value('description')):?>
								<?if($this->session->userdata('description')) echo $this->session->userdata('description');?>
							<? elseif(set_value('description')):?>
								<?=set_value('description')?>
							<? endif; ?>
						</h4>

						<h3 class="partyLocation"></h3>
					</hgroup>

					<div class="bar" data-raised=""><span>$0/<?if($this->session->userdata('goal')) echo $this->session->userdata('goal'); else echo '0';?></span></div>

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
	<script>initDatePicker();</script>
	<script>initDollarSign();</script>
	<script>initSuccessError();</script>