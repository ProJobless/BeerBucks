	<section id="cta" class="party">
		<div class="sizer">
			<h1>Discover the best parties</h1>
		</div>
	</section>

	<? if(isset($success)): ?>
		<p class="success sizer"><?=$success?></p>			
	<?endif;?>

	<? if(isset($error)):?>
		<p class="error sizer"><?=$error?></p>
	<? endif; ?>

	<section id="party" class="sizer">
		<article id="partyImg">
			<h1><?=$party[0]['title']?></h1>
			<img src="<?=base_url()?>uploads/party/<?=$party[0]['party_img']?>" width="720" height="450" alt="" />
		</article>

		<section id="tabs">
			<nav>
				<a href="<?=base_url()?>index.php/party/attending/<?=$partyID?>"><h1>Attending</h1></a>
				<a href="<?=base_url()?>index.php/party/comments/<?=$partyID?>"><h1 class="selected">Comments</h1></a>
				<a href="<?=base_url()?>index.php/party/updates/<?=$partyID?>"><h1>Updates</h1></a>
			</nav>

			<section id="tabContent" class="comments">

				<article>
					<?if($this->session->userdata('profileImage')):?>
						<img src="<?=base_url()?>uploads/profile/<?=$this->session->userdata('profileImage')?>" alt="" width="50" height="50" />
					<?else:?>
						<img src="" alt="" width="50" height="50" />
					<?endif;?>

					<?=form_open("/party/comment/$partyID"); ?>
						<textarea name="comment" cols="30" rows="10"></textarea>
						<h2><span class="char">400</span>/400 characters left</h2>
						<button>Post Comment</button>
					<?=form_close();?>
				</article>
				
				<?if($comments[0]):?>
					<?foreach($comments as $comment): ?>

						<article class="comment">
							<?if($comment['profile_img']):?>
								<a href="<?=base_url()?>index.php/user/comments/<?=$comment['user_id']?>"><img src="<?=base_url()?>uploads/profile/<?=$comment['profile_img']?>" alt="" width="65" height="65" /></a>
							<?else:?>
								<a href="<?=base_url()?>index.php/user/comments/<?=$comment['user_id']?>"><img src="" alt="" width="65" height="65" /></a>
							<?endif;?>

							<div>
								<p><?=$comment['party_comment']?> <a href="<?=base_url()?>index.php/user/comments/<?=$comment['user_id']?>">-<?=$comment['username']?></a> <span>on <?=$comment['comment_date']?></span></p>
									
								<?if($comment['user_id'] == $this->session->userdata('userID')):?>
									<a href="<?=base_url()?>index.php/party/deleteComment/<?=$comment['party_comment_id']?>/<?=$partyID?>" class="delete"></a>
								<?else:?>
									<a href="<?=base_url()?>index.php/party/reportComment/<?=$comment['party_comment_id']?>/<?=$partyID?>" class="report"></a>
								<?endif;?>
							</div>
						</article>

					<?endforeach;?>
				<?endif;?>

				<div class="pagination"><?=$links?></div>

			</section>
		</section>

		<aside>

			<article class="partyInfo">
				<h1>Party Info</h1>
				
				<hgroup>
					<h2>$<?=$totalDonated?></h2>
					<h4>raised out of</h4>
					<h3>$<?=$party[0]['goal']?></h3>
				</hgroup>

				<div class="bar" data-raised="<?=$percent?>"><span></span></div>

				<p><?=$party[0]['description']?></p>

				<h3><?=$party[0]['party_location']?></h3>

				<?if(!isset($party[0]['expirationCheck'])):?>
					<ul class="time">
						<li><h2><?=$party[0]['days']?></h2><h3>Days</h3></li>
						<li><h2><?=$party[0]['hours']?></h2><h3>Hours</h3></li>
						<li><h2><?=$party[0]['minutes']?></h2><h3>Mins</h3></li>
						<li><h2><?=$party[0]['seconds']?></h2><h3>Secs</h3></li>
					</ul>

					<?if($party[0]['user_id'] == $this->session->userdata('userID')):?>
						<a href="<?=base_url()?>index.php/edit_party/information/<?=$partyID?>" class="button">Party Settings</a>
					<?else:?>
						<?=form_open("/striper"); ?>
							<input style="display:none;" name="party_id" value="<?=end($this->uri->segments)?>" />
							<input type="text" name="amount" id="amount" placeholder="$0.00"/>
							<button id="stripeButton">Pitch In</button>
						<?=form_close(); ?>
					<?endif;?>
				<?else:?>
					<p class="over">Campaign is over.</p>
				<?endif;?>
				
			</article>

			<article class="partyHost">
				<h1>Party Host</h1>

				<?if($party[0]['profile_img']):?>
					<img src="<?=base_url()?>uploads/profile/<?=$party[0]['profile_img']?>" width="220" height="210" />
				<?else:?>
					<img src="" alt="" width="220" height="210"/>
				<?endif;?>
				
				<hgroup>
					<h2><i><a href="<?=base_url()?>index.php/user/<?=$party[0]['user_id']?>"><?=$party[0]['username']?></a></i></h2>
					<h3><?=$party[0]['location']?></h3>
					<h4><?=$party[0]['bio']?></h4>
				</hgroup>

				<ul>
					<li>FeedBack <span><?=$party[0]['feedback']?></span></li>
					<li>Views <span><?=$party[0]['views']?></span></li>
					<li>Comments <span><?=$party[0]['comments']?></span></li>
				</ul>

				<hgroup>
					<h5><?=$party[0]['contributions']?></h5> <h6>Contributions</h6>
					<h5><?=$party[0]['parties']?></h5> <h6>Hosted Parties</h6>
				</hgroup>
			</article>

		</aside>

	</section>

	<!-- Libs -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<?=base_url()?>js/libs/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="<?=base_url()?>js/libs/modernizr-2.6.2.min.js"></script>
	<script src="<?=base_url()?>js/libs/jquery-ui-1.10.3.custom.js"></script>
	<script src="https://checkout.stripe.com/v2/checkout.js"></script>

    <!-- Scripts -->
	<script src="<?=base_url()?>js/main.js"></script>

	<!-- Inits -->
	<script>
		initScroller();
		initTimeKeeper();
		initTabs(1);
		initSuccessError();
		initPagination(1);
		initComments(1);
		initStripe();
		initBars();
	</script>