	<section id="cta" class="discover">
		<div class="sizer">
			<h1>Start an awesome party</h1>
		</div>

		<div class="divider"></div>
	</section>

	<section id="tabs" class="wizard">
		<ul class="sizer">
			<li>Guidelines<div></div></li>
			<li class="selected">Basic Information<div></div></li>
			<li>Party Details<div></div></li>
			<? if(!$this->session->userdata('username')) echo '<li>Account<div></div></li>' ?>
			<li>Review<div></div></li>
			<li><a href="#">Need Help?</a></li>
		</ul>

		<section id="tabContent" class="sizer start">

 			<?php echo form_open("start/details"); ?>
				<section id="basic">

					<p><? if(isset($error)) echo $error; ?></p>

					<h1>Party Title</h1> <hr>

					<div>
						<?php echo form_input('title'); ?>
						<p>
							Choose a catchy title for your party. This is the first thing other users will see.
							You should try to make your title <strong>catchy and descriptive.</strong>
						</p>
						<p>Ex: Bobbies 21st birthday bash</p>
					</div>

					<h1>Party Description</h1> <hr>

					<div>
						<?php echo form_textarea('description'); ?>
						<p>
							Sum up your party in 145 characters. Try to describe what you plan kind of party
							it is, if there is a theme, what you plan on doing, and what you will spend the 
							money on. (drinks, food, games, ect.)
						</p>
					</div>

					<h1>Party Image</h1> <hr>

					<div>
						<p>
							This is a perfect time to show a picture from a previous party you’ve thrown. Alternatively you could use a picture of yourself and show off your beautiful smile.
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