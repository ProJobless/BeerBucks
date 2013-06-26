	<? 
		// echo '<pre>';
		// print_r($activity);
		// echo '<pre>'; 
	?>

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
				<a href="<?=base_url()?>index.php/profile/activity"><li class="selected">Activity</li></a>
				<a href="<?=base_url()?>index.php/profile/parties"><li>Parties</li></a>
				<a href="<?=base_url()?>index.php/profile/friends"><li>Friends</li></a>
				<a href="<?=base_url()?>index.php/profile/comments"><li>Comments</li></a>
				<a href="<?=base_url()?>index.php/alerts"><li>Alerts</li></a>
			</ul>

			<section id="tabContent" class="activity">

				<?if($activity['activity'][0]):?>
					<?foreach($activity['activity'] as $a): ?>

						<? if($a['type'] == 'party'):?>
							<article>
								<?if($a['party_img']):?>
									<a href="<?=base_url()?>index.php/party/attending/<?=$a['party_id']?>"><img src="<?=base_url()?>uploads/party/<?=$a['party_img']?>" alt="" width="65" height="65" /></a>
								<?else:?>
									<a href="<?=base_url()?>index.php/party/attending/<?=$a['party_id']?>"><img src="" alt="" width="65" height="65" /></a>
								<?endif;?>

								<div>
									<p>You started a new party <a href="<?=base_url()?>index.php/party/attending/<?=$a['party_id']?>"><?=$a['title']?></a> <span><?=$a['date']?></span></p>
								</div>
							</article>

						<?elseif($a['type'] == 'friend'):?>
							<article>
								<?if($a['profile_img']):?>
									<a href="<?=base_url()?>index.php/user/activity/<?=$a['user_id']?>"><img src="<?=base_url()?>uploads/profile/<?=$a['profile_img']?>" alt="" width="65" height="65" /></a>
								<?else:?>
									<a href="<?=base_url()?>index.php/user/activity/<?=$a['user_id']?>"><img src="" alt="" width="65" height="65" /></a>
								<?endif;?>

								<div>
									<p>You and <a href="<?=base_url()?>index.php/user/activity/<?=$a['user_id']?>"><?=$a['username']?> </a> are now friends. <span><?=$a['date']?></span></p>
								</div>
							</article>






						<?endif;?>
					

					<?endforeach;?>
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