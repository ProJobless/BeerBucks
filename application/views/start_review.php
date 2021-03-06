	<section id="cta" class="discover">
		<div class="sizer">
			<h1>Start an awesome party</h1>
		</div>
	</section>

	<section id="tabs" class="sizer wizard">
		<ul>
			<li><h1>Guidelines</h1></li>
			<li><h1>Basic Information</h1></li>
			<li><h1>Party Details</h1></li>
			<li><h1>Account</h1></li>
			<li class="selected"><h1>Review</h1></li>
			<li><a href="#">Need Help?</a></li>
		</ul>

		<section id="tabContent" class="start review">

 			<?=form_open("/start/finish"); ?>
				<section id="review">

					<article id="partyImg">
						<h1><?=$this->session->userdata('title')?></h1>
						<img src="<?=base_url()?>uploads/party/<?=$this->session->userdata('img_name')?>" width="698" height="436" alt="" />
					</article>
					
					<article class="beforeSubmit">
						<h1>Before you submit</h1>
						<article>
							<h2>1</h2>
							<p>Double check your party to make sure you have the correct information.</p>
						</article>
						<article>
							<h2>2</h2>
							<p>Make sure you’ve explained how you plan to spend the funds.</p>
						</article>
						<article>
							<h2>3</h2>
							<p>Check out other parties for insperation on how to run a good campaign.</p>
						</article>
					</article>

					<article class="beforeSubmit afterSubmit">
						<h1>After you submit</h1>
						<article>
							<h2>1</h2>
							<p>Share your party campaign with your friends via social media.</p>
						</article>
						<article>
							<h2>2</h2>
							<p>Update your profile information to help attract people to your parties.</p>
						</article>
						<article>
							<h2>3</h2>
							<p>Prepare for your party however you prepare for parties.</p>
						</article>
					</article>

				</section>

				<div><button type="submit" name="back" value="back">Go Back</button><button type="submit">Start Party</button></div>

			<?=form_close(); ?>	

			<aside>

				<article class="partyInfo">
					<h1>Party Info</h1>
					
					<hgroup>
						<h2>$0</h2>
						<h4>raised out of</h4>
						<h3><?=$this->session->userdata('goal')?></h3>
					</hgroup>

					<div></div>

					<p><?=$this->session->userdata('description')?></p>

					<h3><?=$this->session->userdata('partyLocation')?></h3>

					<ul>
						<li><h2>X</h2><h3>Days</h3></li>
						<li><h2>X</h2><h3>Hours</h3></li>
						<li><h2>X</h2><h3>Mins</h3></li>
						<li><h2>X</h2><h3>Secs</h3></li>
					</ul>

					<button>Pitch In</button>

					<p>After pitching in, check here to see where the party is.</p>
				</article>

				<article class="partyHost">
					<h1>Party Host</h1>

					<? if($this->session->userdata('profileImage')):?> 
						<img src="<?=base_url()?>uploads/profile/<?=$this->session->userdata('profileImage')?>" width="220" height="210" />
					<? else: ?>	
						<img src="" width="220" height="210" />
					<? endif; ?>
					
					<hgroup>
						<h2><i><?=$this->session->userdata('username')?></i></h2>
						<h3><?=$this->session->userdata('location')?></h3>
						<h4><?=$this->session->userdata('bio')?></h4>
					</hgroup>

					<ul>
						<li>FeedBack <span><?=$this->session->userdata('feedback')?></span></li>
						<li>Views <span><?=$this->session->userdata('views')?></span></li>
						<li>Comments <span><?=$this->session->userdata('comments')?></span></li>
					</ul>
					
					<hgroup>
						<h5><?=$this->session->userdata('contributions')?></h5> <h6>Contributions</h6>
						<h5><?=$this->session->userdata('parties')?></h5> <h6>Hosted Parties</h6>
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