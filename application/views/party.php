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
				<a href="<?=base_url()?>index.php/party/attending/<?=$partyID?>"><li class="selected">Attending</li></a>
				<a href="<?=base_url()?>index.php/party/comments/<?=$partyID?>"><li>Comments</li></a>
				<a href="<?=base_url()?>index.php/party/updates/<?=$partyID?>"><li>Updates</li></a>
				<li class="more"><input type="text" placeholder="Search for a friend"></input><button>Search</button></li>
			</ul>

			<section id="tabContent" class="friends">

				<article style="background: url(<?=base_url()?>img/stock-party-small.jpg);">
					<hgroup>
						<h2><i>JazzyJeff</i></h2>
						<h3>Orlando, FL</h3>
						<h4>User's bio will go here blah blfjna ljnadjksn  zeld  music siis cool drin km dm coolaide.</h4>
					</hgroup>

					<ul>
						<li>FeedBack <span>22</span></li>
						<li>Views <span>22</span></li>
						<li>Comments <span>22</span></li>
					</ul>

					<hgroup>
						<h5>0</h5> <h6>Contributions</h6>
						<h5>0</h5> <h6>Hosted Parties</h6>
					</hgroup>
				</article>

				<article style="background: url(<?=base_url()?>img/stock-party-small.jpg);">
					<hgroup>
						<h2><i>JazzyJeff</i></h2>
						<h3>Orlando, FL</h3>
						<h4>User's bio will go here blah blfjna ljnadjksn  zeld  music siis cool drin km dm coolaide.</h4>
					</hgroup>

					<ul>
						<li>FeedBack <span>22</span></li>
						<li>Views <span>22</span></li>
						<li>Comments <span>22</span></li>
					</ul>

					<hgroup>
						<h5>0</h5> <h6>Contributions</h6>
						<h5>0</h5> <h6>Hosted Parties</h6>
					</hgroup>
				</article>

				<article style="background: url(<?=base_url()?>img/stock-party-small.jpg);">
					<hgroup>
						<h2><i>JazzyJeff</i></h2>
						<h3>Orlando, FL</h3>
						<h4>User's bio will go here blah blfjna ljnadjksn  zeld  music siis cool drin km dm coolaide.</h4>
					</hgroup>

					<ul>
						<li>FeedBack <span>22</span></li>
						<li>Views <span>22</span></li>
						<li>Comments <span>22</span></li>
					</ul>

					<hgroup>
						<h5>0</h5> <h6>Contributions</h6>
						<h5>0</h5> <h6>Hosted Parties</h6>
					</hgroup>
				</article>

				<article style="background: url(<?=base_url()?>img/stock-party-small.jpg);">
					<hgroup>
						<h2><i>JazzyJeff</i></h2>
						<h3>Orlando, FL</h3>
						<h4>User's bio will go here blah blfjna ljnadjksn  zeld  music siis cool drin km dm coolaide.</h4>
					</hgroup>

					<ul>
						<li>FeedBack <span>22</span></li>
						<li>Views <span>22</span></li>
						<li>Comments <span>22</span></li>
					</ul>

					<hgroup>
						<h5>0</h5> <h6>Contributions</h6>
						<h5>0</h5> <h6>Hosted Parties</h6>
					</hgroup>
				</article>

				<article style="background: url(<?=base_url()?>img/stock-party-small.jpg);">
					<hgroup>
						<h2><i>JazzyJeff</i></h2>
						<h3>Orlando, FL</h3>
						<h4>User's bio will go here blah blfjna ljnadjksn  zeld  music siis cool drin km dm coolaide.</h4>
					</hgroup>

					<ul>
						<li>FeedBack <span>22</span></li>
						<li>Views <span>22</span></li>
						<li>Comments <span>22</span></li>
					</ul>

					<hgroup>
						<h5>0</h5> <h6>Contributions</h6>
						<h5>0</h5> <h6>Hosted Parties</h6>
					</hgroup>
				</article>

				<article style="background: url(<?=base_url()?>img/stock-party-small.jpg);">
					<hgroup>
						<h2><i>JazzyJeff</i></h2>
						<h3>Orlando, FL</h3>
						<h4>User's bio will go here blah blfjna ljnadjksn  zeld  music siis cool drin km dm coolaide.</h4>
					</hgroup>

					<ul>
						<li>FeedBack <span>22</span></li>
						<li>Views <span>22</span></li>
						<li>Comments <span>22</span></li>
					</ul>

					<hgroup>
						<h5>0</h5> <h6>Contributions</h6>
						<h5>0</h5> <h6>Hosted Parties</h6>
					</hgroup>
				</article>

				<div><button>See More</button></div>
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

				<button>Pitch In</button>

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