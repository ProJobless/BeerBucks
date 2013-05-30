	<section id="cta" class="discover">
		<div class="sizer">
			<h1>Start an awesome party</h1>
		</div>

		<div class="divider"></div>
	</section>

	<section id="tabs" class="wizard">
		<ul class="sizer">
			<li class="selected">Guidelines<div></div></li>
			<li>Basic Information<div></div></li>
			<li>Party Details<div></div></li>
			<? if(!$this->session->userdata('username')) echo '<li>Account<div></div></li>' ?>
			<li>Review<div></div></li>
			<li><a href="#">Need Help?</a></li>
		</ul>

		<section id="tabContent" class="sizer start">

 			<?php echo form_open("start/basic"); ?>
				<section id="guidelines">

					<p><? if(isset($error)) echo $error; ?></p>

					<h1>Beer-Bucks Guidelines</h1> <hr>
					<div>
						<p>Something important should probably go here, but I don't really know what.</p>
					</div>

					<h1>Beer-Bucks Guidelines</h1> <hr>
					<div>
						<p>Something important should probably go here, but I don't really know what.</p>
					</div>

					<h1>Beer-Bucks Guidelines</h1> <hr>
					<div>
						<p>Something important should probably go here, but I don't really know what.</p>
						<?php echo form_checkbox('terms_of_use'); ?>
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