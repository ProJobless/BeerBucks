	<section id="cta" class="discover">
		<div class="sizer">
			<h1>Community of awesome people</h1>
		</div>
	</section>

	<section id="tabs" class="sizer">
		<ul>
			<a href="<?=base_url()?>index.php/community"><li>Featured</li></a>
			<a href="<?=base_url()?>index.php/community/people"><li class="selected">People</li></a>
			<a href="<?=base_url()?>index.php/community/photos"><li>Photos</li></a>
			<li><input type="text" placeholder="Search for your friends"></input><button>Search</button></li>
			<li class="more"><a href="#">Learn More</a></li>
		</ul>	

		<section id="people">

			<? if(isset($users)): ?>
				<? foreach ($users as $user): ?>

					<a href="<?=base_url()?>index.php/community/user/<?=$user['user_id']?>">

						<?if($user['profile_img']):?>
							<article style="background: url(<?=base_url()?>uploads/profile/<?=$user['profile_img']?>);">
						<?else:?>
							<article style="background: url(<?=base_url()?>img/stock-party-small.jpg);">
						<?endif;?>


							<hgroup>
								<h2><i><?=$user['username']?></i></h2>
								<h3><?=$user['location']?></h3>
								<h4><?=$user['bio']?></h4>
							</hgroup>

							<ul>
								<li>FeedBack <span><?=$user['feedback']?></span></li>
								<li>Views <span><?=$user['views']?></span></li>
								<li>Comments <span><?=$user['comments']?></span></li>
							</ul>

							<hgroup>
								<h5><?=$user['contributions']?></h5> <h6>contributions</h6>
								<h5><?=$user['parties']?></h5> <h6>Hosted Parties</h6>
							</hgroup>
						</article>
					</a>

				<? endforeach; ?>

				<div><button>See More</button></div>

			<?endif;?>

		</section>
	</section>

	<!-- Libs -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<? echo base_url(); ?>js/libs/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="<? echo base_url(); ?>js/libs/modernizr-2.6.2.min.js"></script>
	<script src="<? echo base_url(); ?>js/libs/jquery-ui-1.10.3.custom.js"></script>

    <!-- Scripts -->
	<script src="<? echo base_url(); ?>js/main.js"></script>

	<!-- Inits -->
	<script>initScroller();</script>