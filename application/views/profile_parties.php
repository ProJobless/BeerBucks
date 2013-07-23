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
				<a href="<?=base_url()?>index.php/profile/activity"><h1>Activity</h1></a>
				<a href="<?=base_url()?>index.php/profile/parties"><h1 class="selected">Parties</h1></a>
				<a href="<?=base_url()?>index.php/profile/friends"><h1>Friends</h1></a>
				<a href="<?=base_url()?>index.php/profile/comments"><h1>Comments</h1></a>
				<a href="<?=base_url()?>index.php/profile/alerts"><h1>Alerts</h1></a>
			</nav>

			<section id="tabContent" class="parties">

				<?if(isset($parties[0])):?>
					<? foreach ($parties as $party): ?>

						<article class="party">

							<a href="<?=base_url()?>index.php/party/<?=$party['party_id']?>">
								<img src="<?=base_url()?>uploads/party/<?=$party['party_img']?>" alt="" />
							</a>
						
							<hgroup>
								<h2><a href="<?=base_url()?>index.php/party/<?=$party['party_id']?>"><?=$party['title']?></a></h2>
								<h3>Hosted by <i><?=$party['username']?></i></h3>
								<h4><?=$party['description']?></h4>
								<h3><?=$party['party_location']?></h3>
							</hgroup>

							<div class="bar" data-raised="<?=$party['0']?>"><span>$ <?=floor($party['1'])?>/<?=$party['goal']?></span></div>

							<hgroup>
								<h5><?= count($party['2'])?></h5> <h6>Attending</h6>

								<?if($party['days'] > 1):?>
									<h5><?=$party['days']?></h5> <h6>Days Till Party</h6>
								<?elseif($party['days'] == 1):?>
									<h5><?=$party['days']?></h5> <h6>Day Till Party</h6>
								<?elseif($party['hours'] > 1):?>
									<h5><?=$party['hours']?></h5> <h6>Hours Till Party</h6>
								<?elseif($party['hours'] == 1):?>
									<h5><?=$party['hours']?></h5> <h6>Hour Till Party</h6>
								<?elseif($party['minutes'] > 1):?>
									<h5><?=$party['minutes']?></h5> <h6>Minutes Till Party</h6>
								<?elseif($party['minutes'] = 1):?>
									<h5><?=$party['minutes']?></h5> <h6>Minute Till Party</h6>
								<?elseif($party['seconds'] > 1):?>
									<h5><?=$party['seconds']?></h5> <h6>Seconds Till Party</h6>
								<?elseif($party['seconds'] = 1):?>
									<h5><?=$party['seconds']?></h5> <h6>Second Till Party</h6>
								<?endif;?>
							</hgroup>
						
						</article>
					<? endforeach; ?>
					<?else:?>
					<h1><a href="<?=base_url('index.php/start')?>">Start your first party</a></h1>
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
	<script>initPagination();</script>
	<script>initBars();</script>