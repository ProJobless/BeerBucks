	<section id="cta" class="discover">
		<div class="sizer">
			<h1>Start an awesome party</h1>
		</div>

		<div class="divider"></div>
	</section>

	<section id="tabs" class="wizard">
		<ul class="sizer">
			<li>Guidelines<div></div></li>
			<li>Basic Information<div></div></li>
			<li class="selected">Party Details<div></div></li>
			<li>Review<div></div></li>
			<li><a href="#">Need Help?</a></li>
		</ul>

		<section id="tabContent" class="sizer start">

 			<?php echo form_open("start/review"); ?>
				<section id="details">

					<h1>Party Location</h1> <hr>

					<?php echo form_error('location'); ?>
					<?php echo form_error('address'); ?>

					<div>
						<input type="text" name="location" placeholder="Orlando, FL" value="<? if(!set_value('location')){
								if($this->session->userdata('location')) echo $this->session->userdata('location');
							}else{
								echo set_value('location');
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

					<h1>Party Time</h1> <hr>

					<?php echo form_error('start'); ?>
					<?php echo form_error('end'); ?>

					<div>
						<input type="text" name="start" placeholder="Party Start Time" value="<? if(!set_value('start')){
								if($this->session->userdata('start')) echo $this->session->userdata('start');
							}else{
								echo set_value('start');
							} ?>"/>
						<input type="text" name="end" placeholder="Party End Time" value="<? if(!set_value('end')){
								if($this->session->userdata('end')) echo $this->session->userdata('end');
							}else{
								echo set_value('end');
							} ?>"/>
					</div>

					<h1>Funding Goal</h1> <hr>

					<?php echo form_error('goal'); ?>

					<div>
						<input type="text" name="goal" placeholder="$0.00" value="<? if(!set_value('goal')){
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
	<script>initDatePicker();</script>
	<script>initDollarSign();</script>





