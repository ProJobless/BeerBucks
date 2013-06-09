	<footer>

<? 
	if($this->uri->segment(1) != 'settings' && $this->uri->segment(1) != 'start'){
		if(!$this->session->userdata('userID')){ 
			echo '<a href="' . base_url() . 'index.php/join">Join the Beer-Bucks Community</a>';
		}else{
			echo '<a href="' . base_url() . 'index.php/start">Start a new party</a>';
		}
	} 
?>

		<section class="sizer">
			<img src="<? echo base_url(); ?>img/logo-blue.png" alt="">
			
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
				<li>Discover</li>
				<li>Start</li>
				<li>Communit</li>
				<li>Login</li>
				<li>Sign Up</li>
			</ul>
			
			<ul>
				<li>www.beer-bucks.com</li>
				<li>Facebook.com/TheBeerBucks</li>
				<li>@Beer-Bucks</li>
				<li>beer-bucks.tumblr.com</li>
			</ul>
		</section>
		
		<section>
			<ul class="sizer">
				<li>Terms of Use</li>
				<li>Privacy Policy</li>
				<li>&copy; 2013 Beer-Bucks</li>
			</ul>
		</section>
	</footer>	
</body>
</html>