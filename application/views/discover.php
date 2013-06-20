	<section id="cta" class="discover">
		<div class="sizer">
			<h1>Discover the best parties</h1>
		</div>
	</section>

	<section id="tabs" class="sizer">
		<ul>
			<a href="#"><li class="selected">Featured</li></a>
			<a href="#"><li>Near You</li></a>
			<a href="#"><li>Upcoming</li></a>
			<a href="#"><li>Completed</li></a>
			<li><input type="text" placeholder="Search for a party by name, location, or host"></input><button>Search</button></li>
			<li class="more"><a href="#">Learn More</a></li>
		</ul>

		<section id="tabContent">
			
			<? foreach ($parties as $party): ?>
				<article class="party">
					<a href="<?=base_url()?>index.php/discover/party/<?=$party['party_id']?>">
						<img src="<?=base_url()?>uploads/party/<?=$party['party_img']?>" alt="" />
					</a>
						<hgroup>
							<h2><a href="<?=base_url()?>index.php/discover/party/<?=$party['party_id']?>"><?=$party['title']?></a></h2>
							<h3>Hosted by <i><a href="<?=base_url()?>index.php/community/user/<?=$party['user_id']?>"><?=$party['username']?></a></i></h3>
							<h4><?=$party['description']?></h4>
							<h3><?=$party['party_location']?></h3>
						</hgroup>
						<div><p>$ XXX/<?=$party['goal']?></p></div>
						<hgroup>
							<h5><?=$party['attending']?></h5> <h6>Attending</h6>
							<h5>XX</h5> <h6>Days Till Party</h6>
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