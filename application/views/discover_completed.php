	<section id="cta" class="discover">
		<div class="sizer">
			<h1>Discover the best parties</h1>
		</div>
	</section>

	<section id="tabs" class="sizer">
		<ul>
			<a href="<?=base_url()?>index.php/discover"><li>Featured</li></a>
			<a href="<?=base_url()?>index.php/discover/nearYou"><li>Near You</li></a>
			<a href="<?=base_url()?>index.php/discover/upcoming"><li>Upcoming</li></a>
			<a href="<?=base_url()?>index.php/discover/completed"><li class="selected">Completed</li></a>
			<li><input type="text" placeholder="Search for a party by name, location, or host"></input><button>Search</button></li>
			<li class="more"><a href="#">Learn More</a></li>
		</ul>

		<section id="tabContent">
			
			<? foreach ($parties as $party): ?>

				<article class="party">

					<a href="<?=base_url()?>index.php/party/attending/<?=$party['party_id']?>">
						<img src="<?=base_url()?>uploads/party/<?=$party['party_img']?>" alt=""  width="220" height="210"/>
					</a>
				
					<hgroup>
						<h2><a href="<?=base_url()?>index.php/party/attending/<?=$party['party_id']?>"><?=$party['title']?></a></h2>
						<h3>Hosted by <i><a href="<?=base_url()?>index.php/user/activity/<?=$party['user_id']?>"><?=$party['username']?></a></i></h3>
						<h4><?=$party['description']?></h4>
						<h3><?=$party['party_location']?></h3>
					</hgroup>

					<div><p>$ XXX/<?=$party['goal']?></p></div>

					<hgroup>
						<h5><?=$party['attending']?></h5> <h6>Attending</h6>
						<?if($party['days'] > 1):?>
							<h5><?=$party['days']?></h5> <h6>Days Since Party</h6>
						<?elseif($party['days'] == 1):?>
							<h5><?=$party['days']?></h5> <h6>Day Since Party</h6>
						<?elseif($party['hours'] > 1):?>
							<h5><?=$party['hours']?></h5> <h6>Hours Since Party</h6>
						<?elseif($party['hours'] == 1):?>
							<h5><?=$party['hours']?></h5> <h6>Hour Since Party</h6>
						<?elseif($party['minutes'] > 1):?>
							<h5><?=$party['minutes']?></h5> <h6>Minutes Since Party</h6>
						<?elseif($party['minutes'] = 1):?>
							<h5><?=$party['minutes']?></h5> <h6>Minute Since Party</h6>
						<?elseif($party['seconds'] > 1):?>
							<h5><?=$party['seconds']?></h5> <h6>Seconds Since Party</h6>
						<?elseif($party['seconds'] = 1):?>
							<h5><?=$party['seconds']?></h5> <h6>Second Since Party</h6>
						<?endif;?>
					</hgroup>
				
				</article>
			<? endforeach; ?>

			<div><button>See More</button></div>
		</section>
	</section>

	<!-- Libs -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="<? echo base_url(); ?>js/libs/jquery-1.9.1.min.js"><\/script>')</script>
	<script src="<? echo base_url(); ?>js/libs/modernizr-2.6.2.min.js"></script>
	<script src="<? echo base_url(); ?>js/libs/jquery-ui-1.10.3.custom.js"></script>

    <!-- Scripts -->
	<script src="<? echo base_url(); ?>js/main.js"></script>

	<!-- Inits -->
	<script>initScroller();</script>
	<script>initTabs();</script>