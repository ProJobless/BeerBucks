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
			<? if(!$this->session->userdata('username')) echo '<li>Account<div></div></li>' ?>
			<li>Review<div></div></li>
			<li><a href="#">Need Help?</a></li>
		</ul>

		<section id="tabContent" class="sizer start">

 			<?php echo form_open("start/review"); ?>
				<section id="details">

					<p><? if(isset($error)) echo $error; ?></p>

					<h1>Party Location</h1> <hr>

					<div>
						<input type="text" name="location" placeholder="Orlando, FL" />
						<input type="text" name="address" placeholder="address" />
						<p>
							Exact party locations will be <strong>hidden</strong> to everyone who hasn’t donated to the party. Users who have not donated will only see the <strong>city and state</strong> of the party location.
 						</p>
					</div>

					<h1>Party Time</h1> <hr>

					<div>
						<input type="text" name="start" placeholder="Party Start Time" />
						<input type="text" name="end" placeholder="Party End Time" />
					</div>

					<h1>Funding Goal</h1> <hr>

					<div>
						<input type="text" name="goal" placeholder="$0.00" />
						<p>
							How much money are you looking to raise for your party? You can raise more than your goal, and we hope your extra funding will go towards your party. Remember that party attenders will have a chance to <strong>rate your party</strong>, and may leave you <strong>bad rep</strong>.
						</p>
					</div>
				</section>

				<div><button type="submit">Next Step</button></div>

			<?php echo form_close(); ?>	

			<aside>
				<h1>Quick Preview</h1>
				<h2>A quick example of how others will see your party.</h2>

				<article>
					<img src="<? echo base_url(); ?>img/stock-party-small.jpg" alt="" />
					<hgroup>
						<h2>Michael's 22nd birthday party</h2>
						<h3>Hosted by <i>JazyJeff</i></h3>
						<h4>Bacon ipsum dolor sitw efew amet fatback spare ribs flank ham. Tongue doner capicola jowl chicken strip steak ribeye short ribs tenderloin biltong turducken prosciutto cow.</h4>
						<h3>Orlando, FL</h3>
					</hgroup>
					<div><p>$ 100/100</p></div>
					<hgroup>
						<h5>23</h5> <h6>Attending</h6>
						<h5>10</h5> <h6>Days Till Party</h6>
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





