	<section id="cta" class="discover">
		<div class="sizer">
			<h1>Welcome to the party</h1>
		</div>
	</section>

	<section id="forms">
		<section class="sizer">
			<article>
				<h1>Login or sign up via social</h1>
				<div>
					<p><? if(isset($facebookError)) echo $facebookError; ?></p>
					<a href="<?=base_url()?>index.php/authentication/facebook"><img src="<?=base_url()?>img/facebook.jpg" alt=""></a>
					<a href="<?=base_url()?>index.php/twitter/auth"><img src="<?=base_url()?>img/twitter.jpg" alt=""></a>
					<p>We <strong>promise</strong> we’ll never post anything without your permission.</p>
				</div>
			</article>

			<?=form_open("/authentication/login"); ?>
				<h1>Login with an email</h1>
				<div>
					<p><? if(isset($error)) echo $error; ?></p>
					<h2>Email Adress</h2>
					<?=form_input('email'); ?>

					<h2>Password</h2>
					<?=form_password('password'); ?>

					<button type="submit">Login</button>
					<a href="#">Forgot your password?</a>
				</div>
			<?=form_close(); ?>

			<?=form_open("/authentication/signup"); ?>
				<h1>Create an account</h1>
				<div>
					<p><? if(isset($joinError)) echo $joinError; ?></p>
					<h2>Username</h2>
					<?=form_input('username'); ?>

					<h2>Email</h2>
					<?=form_input('email'); ?>

					<h2>Password</h2>
					<?=form_password('password'); ?>

					<button type="submit">Sign Up</button>
				</div>
			<?=form_close(); ?>
		</section>
	</section>

	<!-- Libs -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?=base_url()?>js/libs/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="<?=base_url()?>js/libs/modernizr-2.6.2.min.js"></script>
	<script src="<?=base_url()?>js/libs/jquery-ui-1.10.3.custom.js"></script>

    <!-- Scripts -->
	<script src="<?=base_url()?>js/main.js"></script>

	<!-- Inits -->
	<script>initScroller();</script>