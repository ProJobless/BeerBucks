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
			</article>
		</aside>

		<section id="tabs">
			<ul>
				<a href="<?=base_url()?>index.php/profile/activity"><li>Activity</li></a>
				<a href="<?=base_url()?>index.php/profile/parties"><li>Parties</li></a>
				<a href="<?=base_url()?>index.php/profile/friends"><li>Friends</li></a>
				<a href="<?=base_url()?>index.php/profile/comments"><li>Comments</li></a>
				<a href="<?=base_url()?>index.php/alerts"><li  class="selected">Alerts</li></a>
			</ul>

			<section id="tabContent" class="request">
	
				<? if(isset($friendReqs[0])): ?>
					<? foreach ($friendReqs as $req): ?>

						<article>
							<a href="<?=base_url()?>index.php/user/activity/<?=$req['user_id']?>"><img src="<?=base_url()?>uploads/profile/<?=$req['profile_img']?>" alt=""></a>
							<h1><a href="<?=base_url()?>index.php/user/activity/<?=$req['user_id']?>"><?=$req['username']?></a></h1>
							<p>Wants to be your friend.</p>
							<a href="<?=base_url()?>index.php/profile/acceptFriend/<?=$req['friendship_id']?>"><button>accept</button></a>
							<a href="<?=base_url()?>index.php/profile/declineFriend/<?=$req['friendship_id']?>"><button>decline</button></a>
						</article>

					<? endforeach; ?>

				<?else:?>
					<h1>You have no new alerts</h1>
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