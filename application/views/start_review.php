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
			<li>Party Details<div></div></li>
			<li class="selected">Review<div></div></li>
			<li><a href="#">Need Help?</a></li>
		</ul>

		<section id="tabContent" class="sizer start">

 			<?php echo form_open("start/finish"); ?>
				<section id="details">

					
				</section>

				<div><button type="submit" name="back" value="back">Go Back</button><button type="submit">Start Party</button></div>

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





