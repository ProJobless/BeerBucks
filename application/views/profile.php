	<section id="cta" class="profile">
		<div class="sizer">
			<h1>Community of awesome people</h1>
		</div>
	</section>

	<? if(isset($success)): ?>
		<p class="success sizer"><?=$success?></p>			
	<?endif;?>

	<? if(isset($error)):?>
		<p class="error sizer"><?=$error?></p>
	<? endif; ?>

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
					<li>Feedback <span><?=$this->session->userdata('feedback')?></span></li>
					<li>Views <span><?=$this->session->userdata('views')?></span></li>
					<li>Comments <span><?=$this->session->userdata('comments')?></span></li>
				</ul>
				
				<hgroup>
					<h5><?=$this->session->userdata('contributions')?></h5> <h6>Contributions</h6>
					<h5><?=$this->session->userdata('parties')?></h5> <h6>Hosted Parties</h6>
				</hgroup>
			</article>

			<article>
				<h1>Badges</h1>
				<?if($badges):?>
					<?foreach($badges as $b): ?>
						<img src="<?=base_url()?>img/<?=$b['badge_img']?>" />
					<?endforeach;?>
				<?endif;?>
			</article>
		</aside>

		<section id="tabs">
			<nav>
				<a href="<?=base_url()?>index.php/profile/activity"><h1 class="selected">Activity</h1></a>
				<a href="<?=base_url()?>index.php/profile/parties"><h1>Parties</h1></a>
				<a href="<?=base_url()?>index.php/profile/friends"><h1>Friends</h1></a>
				<a href="<?=base_url()?>index.php/profile/comments"><h1>Comments</h1></a>
				<a href="<?=base_url()?>index.php/profile/alerts"><h1>Alerts</h1></a>
			</nav>

			<section id="tabContent" class="activity">

				<?if($activity):?>
					<?foreach($activity as $a): ?>
						<? if($a['party_id']):?>
							<article>
								<?if($a['party_img']):?>
									<a href="<?=base_url()?>index.php/party/<?=$a['party_id']?>"><img src="<?=base_url()?>uploads/party/<?=$a['party_img']?>" alt="" width="65" height="65" /></a>
								<?else:?>
									<a href="<?=base_url()?>index.php/party/<?=$a['party_id']?>"><img src="" alt="" width="65" height="65" /></a>
								<?endif;?>

								<div>
									<p>You started a new party <a href="<?=base_url()?>index.php/party/<?=$a['party_id']?>"><?=$a['title']?></a> <span><?=$a['date_created']?></span></p>
								</div>
							</article>
						<?elseif($a['friendship_id']):?>
							<article>
								<?if($a['profile_img']):?>
									<a href="<?=base_url()?>index.php/user/<?=$a['user_id']?>"><img src="<?=base_url()?>uploads/profile/<?=$a['profile_img']?>" alt="" width="65" height="65" /></a>
								<?else:?>
									<a href="<?=base_url()?>index.php/user/<?=$a['user_id']?>"><img src="" alt="" width="65" height="65" /></a>
								<?endif;?>

								<div>
									<p>You and <a href="<?=base_url()?>index.php/user/<?=$a['user_id']?>"><?=$a['username']?> </a> are now friends. <span><?=$a['date_created']?></span></p>
								</div>
							</article>
						<?endif;?>
					<?endforeach;?>
				<?else:?>
					<h1>You have no recent activity</h1>
				<?endif;?>
				<div class="pagination"><?=$links?></div>
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
	<script>initTabs();</script>
	<script>initSuccessError();</script>
	<script>initPagination();</script>