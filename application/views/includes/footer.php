	<script>initTools();</script>
	<footer>
		<? if(!$this->uri->segment(1)) :?>
			<? if(!$this->session->userdata('userID')): ?>
				<a href="<?=base_url()?>index.php/join">Start a party</a>
			<? else: ?>
				<a href="<?=base_url()?>index.php/start">Start a new party</a>	
			<? endif; ?>
		<? endif; ?>

		<section class="sizer">
			<img src="<?=base_url()?>img/logo-blue.png" alt="">
			
			<hgroup>
				<h1>Learn More</h1>
				<h1>Navigate</h1>
				<h1>Connect</h1>
			</hgroup>

			<ul>
				<li>About Beer-Bucks</li>
				<li>Pricing</li>
				<li>FAQ</li>
				<li>Help</li>
				<li>Contact Us</li>
			</ul>

			<ul>
				<li><a href="<?= base_url(); ?>index.php/discover">Discover</a></li>
				<li><a href="<?= base_url(); ?>index.php/start">Start</a></li>
				<li><a href="<?= base_url(); ?>index.php/community">Community</a></li>
				<li><a href="<?= base_url(); ?>index.php/login">Login</a></li>
				<li><a href="<?= base_url(); ?>index.php/join">Sign Up</a></li>
			</ul>
			
			<ul>
				<li><a href="<?=base_url()?>">www.beer-bucks.com</a></li>
				<li><a href="https://www.facebook.com/TheBeerBucks" target="_blank">Facebook.com/TheBeerBucks</a></li>
				<li><a href="https://twitter.com/thebeerbucks" target="_blank">@thebeerbucks</a></li>
				<li><a href="http://beer-bucks.tumblr.com/" target="_blank">beer-bucks.tumblr.com</a></li>
			</ul>
		</section>
		
		<section>
			<ul class="sizer">
				<li>Terms of Use</li>
				<li><a href="<?= base_url(); ?>index.php/privacy_policy">Privacy Policy</a></li>
				<li>&copy; 2013 Beer-Bucks</li>
			</ul>
		</section>
	</footer>	
</body>
</html>