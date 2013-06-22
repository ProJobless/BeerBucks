	<section id="cta" class="profile">
		<div class="sizer">
			<h1>Community of awesome people</h1>
		</div>
	</section>

	<section id="profile" class="sizer">
		<aside>
			<article>
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
					<li>FeedBack <span>0</span></li>
					<li>Views <span>0</span></li>
					<li>Comments <span>0</span></li>
				</ul>
				
				<hgroup>
					<h5>0</h5> <h6>Contributions</h6>
					<h5>0</h5> <h6>Hosted Parties</h6>
				</hgroup>
			</article>

			<article>
				<h1>Badges</h1>
			</article>
		</aside>

		<section id="tabs">
			<ul>
				<a href="<?=base_url()?>index.php/profile"><li>Activity</li>
				<a href="<?=base_url()?>index.php/profile/parties"><li>Parties</li>
				<a href="<?=base_url()?>index.php/profile/friends"><li class="selected">Friends</li>
				<a href="<?=base_url()?>index.php/profile/comments"><li>Comments</li>
				<a href="<?=base_url()?>index.php/alerts"><li>Alerts</li></a>
			</ul>

			<section id="tabContent" class="friends">

				<? if(isset($friends[0])): ?>
					<? foreach ($friends as $friend): ?>

						<a href="<?=base_url()?>index.php/community/user/<?=$friend[0]['user_id']?>">
							<article style="background: url(<?=base_url()?>uploads/profile/<?=$friend[0]['profile_img']?>);">
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
						</a>

					<? endforeach; ?>

					<div><button>See More</button></div>

				<?else:?>
					<h1>Browse the community to find friends.</h1>
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