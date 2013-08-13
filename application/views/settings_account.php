	<? if(isset($success)): ?>
		<p class="success sizer"><?=$success?></p>			
	<?endif;?>

	<? if(isset($error) && !isset($upload_data)):?>
		<p class="error sizer"><?=$error?></p>
	<? endif; ?>

	<section id="settings" class="sizer">
		<aside>
			<article>
				<? if($this->session->userdata('profileImage')):?> 
					<img src="<?=base_url()?>uploads/profile/<?=$this->session->userdata('profileImage')?>" width="220" height="210" />
				<? else: ?>
					<img src="" width="220" height="210" />
				<? endif; ?>
				
				<hgroup>
					<h2><i><?= $this->session->userdata('username') ?></i></h2>
					<h3><?= $this->session->userdata('location') ?></h3>
					<h4><?= $this->session->userdata('bio') ?></h4>
				</hgroup>
			</article>

			<nav id="settingsNav">
				<a href="<?=base_url()?>index.php/settings">Profile Settings</a>
				<a href="<?=base_url()?>index.php/settings/account" class="selected">Account Settings</a>
				<!-- <a href="<?=base_url()?>index.php/settings/services">Services Settings</a>
				<a href="<?=base_url()?>index.php/settings/subscription">Subscription Settings</a> -->
			</nav>
		</aside>

		<section id="settingsForms">
 			
 			<?=form_open_multipart('/settings/editAccount');?>

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

				<div class="bottom"><button type="submit">Submit Changes</button></div>

				<input type="hidden" name="accountToken" class="accountToken" style="display:none;" value="<? if(isset($recipient[0])) echo 'false'; else echo set_value('accountToken'); ?>" />

			<?=form_close(); ?>	

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
	<script>initSuccessError();</script>
	<script>initAutoComplete();</script>
	<script>initStripeRecipient();</script>
	<script>initSettings();</script>