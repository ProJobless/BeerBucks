	<section id="cta" class="discover">
		<div class="sizer">
			<h1>Start an awesome party</h1>
		</div>
	</section>

	<? if(isset($error) && !isset($upload_data)): ?>
		<p class="error sizer"><?=$error?></p>
	<? endif; ?>
	
	<? if(isset($upload_data)): ?> 
		<p class="success sizer">Your image was successfully uploaded.</p>
	<? endif; ?>

	<section id="tabs" class="sizer wizard">
		<ul>
			<li><h1>Guidelines</h1></li>
			<li><h1>Basic Information</h1></li>
			<li><h1>Party Details</h1></li>
			<li class="selected"><h1>Account</h1></li>
			<li><h1>Review</h1></li>
			<li><a href="#">Need Help?</a></li>
		</ul>

		<section id="tabContent" class="start">
 			
 			<?=form_open_multipart('/start/review');?>
				<section id="account">

					<h1>Full Name</h1> <hr>

					<?=form_error('name'); ?>

					<div>
						<input type="text" name="name" placeholder="John Smith" value="<? if(isset($recipient[0])) echo $recipient[0]['name']; else echo set_value('name'); ?>" />

						<p>Your full legal name.</p>
					</div>


					<h1>Bank Account</h1> <hr>

					<?=form_error('accountToken'); ?>

					<div>
						<?if(!isset($recipient[0])):?>
							<button id="stripeButton">Add Bank Account</button>
						<?else:?>
							<h2 class="account">Account: <?=$recipient[0]['account']?><span>(Last 4 digits)</span></h2><a href="#" class="editAccount">Replace existing account</a>
						<?endif;?>

						<p class="accountHint">All your bank information is handled securely by Stripe. Your information never touches Beer-Buck's servers. For more information see <a href="https://support.stripe.com/topics/security-and-fraud-prevention" target="_blank">Stripe support.</a></p>
					</div>

					<h1>Email address</h1> <hr>

					<?=form_error('email'); ?>

					<div>
						<input type="text" name="email" placeholder="email@exaple.com" value="<? if(isset($recipient[0])) echo $recipient[0]['email']; else echo set_value('email'); ?>" />
					</div>

				</section>

				<div><button type="submit" name="back" value="back">Go Back</button><button type="submit">Next Step</button></div>

				<input type="hidden" name="accountToken" class="accountToken" style="display:none;" value="<? if(isset($recipient[0])) echo 'false'; else echo set_value('accountToken'); ?>" />
        	
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

					<div><p class="goal">
							<? if(!set_value('goal')):?>
								<?if($this->session->userdata('goal')) echo '$ 0/' . ltrim($this->session->userdata('goal') , '$');?>
							<? elseif(set_value('goal')):?>
								<?='$ 0/' . ltrim(set_value('goal') , '$')?>
							<? endif; ?>
						</p>
					</div>
				</article>
			</aside>
		</section>
	</section>

	<div id="stripeModal">
		<header>   
			<div class="info">
				<h1>Beer-Bucks</h1>
			</div>

			<a class="close"></a>
		</header>

		<form>
			<label for="routingNumber">Routing number</label>
			<input type="text" id="routingNumber" value="111000025"/>

			<label for="accountNumber">Account number</label>
			<input type="text" id="accountNumber" value="000123456789"/>
		</form>

		<section>
			<button type="submit" class="blue submit"><span>Submit</span></button>
		</section>
	</div>

	<!-- Libs -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?=base_url()?>js/libs/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="<?=base_url()?>js/libs/modernizr-2.6.2.min.js"></script>
	<script src="<?=base_url()?>js/libs/jquery-ui-1.10.3.custom.js"></script>
	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <!-- Scripts -->
	<script src="<?=base_url()?>js/main.js"></script>

	<!-- Inits -->
	<script>initScroller();</script>
	<script>initWizardOfOz();</script>
	<script>initUpload();</script>
	<script>initSuccessError();</script>
	<script>initStripeRecipient();</script>