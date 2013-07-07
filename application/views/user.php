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

			<? if(isset($friendCheck) && $this->session->userdata('userID')): ?>
				<?if(!$friendCheck):?>
					<a href="<?=base_url()?>index.php/community/addFriend/<?=$user[0]['user_id']?>"><button>Add Friend</button></a>
				<?else:?>
					<a class="remove" href="<?=base_url()?>index.php/community/removeFriend/<?=$user[0]['user_id']?>"><button>Remove Friend</button></a>
				<?endif;?>
			<?endif;?>
	
			<article>
				<h1>Badges</h1>
			</article>
		</aside>

		<section id="tabs">
			<ul>
				<a href="<?=base_url()?>index.php/user/<?=$user[0]['user_id']?>"><li class="selected">Activity</li></a>
				<a href="<?=base_url()?>index.php/user/parties/<?=$user[0]['user_id']?>"><li>Parties</li></a>
				<a href="<?=base_url()?>index.php/user/friends/<?=$user[0]['user_id']?>"><li>Friends</li></a>
				<a href="<?=base_url()?>index.php/user/comments/<?=$user[0]['user_id']?>"><li>Comments</li></a>
			</ul>

			<section id="tabContent" class="activity">

				<?if($activity['activity']):?>
					<?foreach($activity['activity'] as $a): ?>
						<? if($a['type'] == 'party'):?>
							<article>
								<?if($a['party_img']):?>
									<a href="<?=base_url()?>index.php/party/<?=$a['party_id']?>"><img src="<?=base_url()?>uploads/party/<?=$a['party_img']?>" alt="" width="65" height="65" /></a>
								<?else:?>
									<a href="<?=base_url()?>index.php/party/<?=$a['party_id']?>"><img src="" alt="" width="65" height="65" /></a>
								<?endif;?>

								<div>
									<p><?=$user[0]['username']?> started a new party <a href="<?=base_url()?>index.php/party/<?=$a['party_id']?>"><?=$a['title']?></a> <span><?=$a['date']?></span></p>
								</div>
							</article>
						<?elseif($a['type'] == 'friend'):?>
							<article>
								<?if($a['profile_img']):?>
									<a href="<?=base_url()?>index.php/user/<?=$a['user_id']?>"><img src="<?=base_url()?>uploads/profile/<?=$a['profile_img']?>" alt="" width="65" height="65" /></a>
								<?else:?>
									<a href="<?=base_url()?>index.php/user/<?=$a['user_id']?>"><img src="" alt="" width="65" height="65" /></a>
								<?endif;?>

								<div>
									<p><?=$user[0]['username']?> and <a href="<?=base_url()?>index.php/user/<?=$a['user_id']?>"><?=$a['username']?> </a> are now friends. <span><?=$a['date']?></span></p>
								</div>
							</article>
						<?endif;?>
					<?endforeach;?>
				<?else:?>
					<h1><?=$user[0]['username']?> has no recent activity</h1>
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
	<script>initTabs();</script>
	<script>initSuccessError();</script>