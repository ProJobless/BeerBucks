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
			<li class="selected"><h1>Guidelines</h1></li>
			<li><h1>Basic Information</h1></li>
			<li><h1>Party Details</h1></li>
			<li><h1>Account</h1></li>
			<li><h1>Review</h1></li>
			<li><a href="#">Need Help?</a></li>
		</ul>

		<section id="tabContent" class="start">

 			<?=form_open("/start/basic"); ?>
				<section id="guidelines">

					<h1>Beer-Bucks Guidelines</h1> <hr />
					<div>
						<p>Something important should probably go here, but I don't really know what.</p>
					</div>

					<h1>Beer-Bucks Guidelines</h1> <hr />
					<div>
						<p>Something important should probably go here, but I don't really know what.</p>
					</div>

					<h1>Beer-Bucks Guidelines</h1> <hr />
					<div>
						<p>Something important should probably go here, but I don't really know what.</p>
						<?=form_checkbox('terms_of_use'); ?>
					</div>
				</section>
				<div><button type="submit">Next Step</button></div>

			<?=form_close(); ?>	

			<aside>
				<h1>Quick Preview</h1>
				<h2>A quick example of how others will see your party.</h2>

				<article class="party">
					<img src="<? if($this->session->userdata('img_name')) echo base_url() . 'uploads/party/' . $this->session->userdata('img_name'); ?>" alt="" width="220" height="210"/>
					<hgroup>
						<h2> 
							<? if(!set_value('title')):?>
								<?if($this->session->userdata('title')) echo $this->session->userdata('title');?>
							<? elseif(set_value('title')):?>
								<?=set_value('title')?>
							<? endif; ?>
						</h2>

						<h3>Hosted by <i> <?=$this->session->userdata('username')?> </i></h3>

						<h4>
							<? if(!set_value('description')):?>
								<?if($this->session->userdata('description')) echo $this->session->userdata('description');?>
							<? elseif(set_value('description')):?>
								<?=set_value('description')?>
							<? endif; ?>
						</h4>

						<h3>Orlando, FL</h3>
					</hgroup>

					<div><p>
							<? if(!set_value('goal')):?>
								<?if($this->session->userdata('goal')) echo '$ 0/' . ltrim($this->session->userdata('goal') , '$');?>
							<? elseif(set_value('goal')):?>
								<?='$ 0/' . ltrim(set_value('goal') , '$')?>
							<? endif; ?>
						</p>
					</div>

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
	<script>initSuccessError();</script>