	<section id="cta" class="profile">
		<div class="sizer">
			<h1>Community of awesome people</h1>
		</div>
	</section>

	<section id="profile" class="sizer">
		
		<? if(isset($message)): ?>
			<h1 class="error"><?=$message?></h1>			
		<?endif;?>

		<aside>
			<article>
				<? if($user[0]['profile_img']):?> 
					<img src="<?=base_url()?>uploads/profile/<?=$user[0]['profile_img']?>" width="220" height="210" />
				<? else: ?>	
					<img src="" width="220" height="210" />
				<? endif; ?>
				
				<hgroup>
					<h2><i><?=$user[0]['username']?></i></h2>
					<h3><?=$user[0]['location']?></h3>
					<h4><?=$user[0]['bio']?></h4>
				</hgroup>

				<ul>
					<li>FeedBack <span><?=$user[0]['feedback']?></span></li>
					<li>Views <span><?=$user[0]['views']?></span></li>
					<li>Comments <span><?=$user[0]['comments']?></span></li>
				</ul>
				
				<hgroup>
					<h5><?=$user[0]['contributions']?></h5> <h6>Contributions</h6>
					<h5><?=$user[0]['parties']?></h5> <h6>Hosted Parties</h6>
				</hgroup>
			</article>

			<? if(isset($friendCheck)): ?>
				<?if (!$friendCheck): ?>
					<a href="<?=base_url()?>index.php/community/addFriend/<?=$user[0]['user_id']?>"><button>Add Friend</button></a>
				<?endif;?>
			<?endif;?>

			<article>
				<h1>Badges</h1>
			</article>
		</aside>

		<section id="tabs">
			<ul>
				<li>Activity</li>
				<li>Parties</li>
				<li class="selected">Friends</li>
				<li>Comments</li>
<!-- 				<li><input type="text" placeholder="Search for a friend"></input><button>Search</button></li>
 -->			</ul>

			<section id="tabContent" class="friends">

				<? if(isset($friends)): ?>
					<? foreach ($friends as $friend): ?>
		
						<article style="background: url(<?=base_url()?>img/stock-party-small.jpg);">
							<hgroup>
								<h2><i><?=$friend[0]['username']?></i></h2>
								<h3><?=$friend[0]['location']?></h3>
								<h4><?=$friend[0]['bio']?></h4>
							</hgroup>

							<ul>
								<li>FeedBack <span><?=$friend[0]['feedback']?></span></li>
								<li>Views <span><?=$friend[0]['views']?></span></li>
								<li>Comments <span><?=$friend[0]['comments']?></span></li>
							</ul>

							<hgroup>
								<h5><?=$friend[0]['contributions']?></h5> <h6>contributions</h6>
								<h5><?=$friend[0]['parties']?></h5> <h6>Hosted Parties</h6>
							</hgroup>
						</article>

					<? endforeach; ?>

					<div><button>See More</button></div>

				<?else:?>
					<h1>User has no friends added.</h1>
				<?endif;?>
				

			</section>
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