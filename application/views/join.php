	<section id="cta" class="discover">
		<div class="sizer">
			<h1>Welcome to the party</h1>
		</div>

		<div class="divider"></div>
	</section>

	<section id="forms">
		<section class="sizer">
			<article>
				<h1>Login or sign up via social</h1>
				<div>
					<a href="#"><img src="<? echo base_url(); ?>img/facebook.jpg" alt=""></a>
					<a href="#"><img src="<? echo base_url(); ?>img/twitter.jpg" alt=""></a>
					<p>We <strong>promise</strong> we’ll never post anything without your permission.</p>
				</div>
			</article>

			<?php echo form_open("authentication/login"); ?>
				<h1>Login with an email</h1>
				<div>
					<p><? if(isset($error)) echo $error; ?></p>
					<h2>Email Adress</h2>
					<?php echo form_input('email'); ?>

					<h2>Password</h2>
					<?php echo form_password('password'); ?>

					<button type="submit">Login</button>
					<a href="#">Forgot your password?</a>
				</div>
			<?php echo form_close(); ?>

			<?php echo form_open("authentication/signup"); ?>
				<h1>Create an account</h1>
				<div>
					<p><? if(isset($joinError)) echo $joinError; ?></p>
					<h2>Username</h2>
					<?php echo form_input('username'); ?>

					<h2>Email</h2>
					<?php echo form_input('email'); ?>

					<h2>Password</h2>
					<?php echo form_password('password'); ?>

					<button type="submit">Sign Up</button>
				</div>
			<?php echo form_close(); ?>
		</section>
	</section>