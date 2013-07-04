	<section id="cta" class="party">
		<div class="sizer">
			<h1>Discover the best parties</h1>
		</div>
	</section>

	<section id="party" class="sizer">
		<article id="partyImg">
			<h1><?=$party[0]['title']?></h1>
			<img src="<?=base_url()?>uploads/party/<?=$party[0]['party_img']?>" width="720" height="450" alt="" />
		</article>

		<section id="tabs">
			<ul>
				<a href="<?=base_url()?>index.php/party/attending/<?=$partyID?>"><li>Attending</li></a>
				<a href="<?=base_url()?>index.php/party/comments/<?=$partyID?>"><li>Comments</li></a>
				<a href="<?=base_url()?>index.php/party/updates/<?=$partyID?>"><li class="selected">Updates</li></a>
			</ul>

			<section id="tabContent" class="updates">
				
				<?if($updates[0]):?>
					<?foreach($updates as $update): ?>

						<article>
							<?if($party[0]['party_img']):?>
								<img src="<?=base_url()?>uploads/party/<?=$party[0]['party_img']?>" alt="" width="65" height="65" />
							<?else:?>
								<img src="" alt="" width="65" height="65" />
							<?endif;?>

							<div>
								<p><span><?=$update['update_title']?></span><span><?=$update['update_date']?></span><?=$update['update']?></p>
								
								<?if($party[0]['user_id'] == $this->session->userdata('userID')):?>
									<a href="<?=base_url()?>index.php/party/deleteUpdate/<?=$update['update_id']?>/<?=$partyID?>" class="delete">x</a>
								<?endif;?>
							</div>
						</article>
					<?endforeach;?>
				<?else:?>
					<h1>No Updates</h1>	
				<?endif;?>
			
			</section>
		</section>

		<aside>

			<article class="partyInfo">
				<h1>Party Info</h1>
				
				<hgroup>
					<h2>$300</h2>
					<h4>raised out of</h4>
					<h3>$<?=$party[0]['goal']?></h3>
				</hgroup>

				<div></div>

				<p><?=$party[0]['description']?></p>

				<h3><?=$party[0]['party_location']?></h3>

				<ul class="time">
					<li><h2><?=$party[0]['days']?></h2><h3>Days</h3></li>
					<li><h2><?=$party[0]['hours']?></h2><h3>Hours</h3></li>
					<li><h2><?=$party[0]['minutes']?></h2><h3>Mins</h3></li>
					<li><h2><?=$party[0]['seconds']?></h2><h3>Secs</h3></li>
				</ul>

				<?if($party[0]['user_id'] == $this->session->userdata('userID')):?>
					<a href="<?=base_url()?>index.php/edit_party/information/<?=$partyID?>" class="button">Party Settings</a>
				<?else:?>
					<button>Pitch In</button>
				<?endif;?>

				<p>After pitching in, check here to see where the party is.</p>
			</article>

			<article class="partyHost">
				<h1>Party Host</h1>

				<?if($party[0]['profile_img']):?>
					<img src="<?=base_url()?>uploads/profile/<?=$party[0]['profile_img']?>" width="220" height="210" />
				<?else:?>
					<img src="" alt="" width="220" height="210"/>
				<?endif;?>
				
				<hgroup>
					<h2><i><a href="<?=base_url()?>index.php/user/activity/<?=$party[0]['user_id']?>"><?=$party[0]['username']?></a></i></h2>
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

    <!-- Scripts -->
	<script src="<?=base_url()?>js/main.js"></script>

	<!-- Inits -->
	<script>initScroller();</script>
	<script>initTimeKeeper();</script>