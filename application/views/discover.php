	<section id="cta" class="discover">
		<div class="sizer">
			<h1>Discover the best parties</h1>
		</div>
	</section>

	<section id="tabs">
		<ul class="sizer">
			<li class="selected">Featured</li>
			<li>Near You</li>
			<li>Upcoming</li>
			<li>Completed</li>
			<li><input type="text" placeholder="Search for a party by name, location, or host"></input><button>Search</button></li>
			<li><a href="#">Learn More</a></li>
		</ul>

		<section id="tabContent" class="sizer">
			
			<?php foreach ($parties as $party): ?>
				<article>
					<a href="<?=base_url()?>index.php/discover/party/<?=$party['party_id']?>">
						<img src="<?=base_url()?>uploads/party/<?=$party['party_img']?>" alt="" />
						<hgroup>
							<h2><?=$party['title']?></h2>
							<h3>Hosted by <i><?=$party['username']?></i></h3>
							<h4><?=$party['description']?></h4>
							<h3><?=$party['location']?></h3>
						</hgroup>
						<div><p>$ XXX/<?=$party['goal']?></p></div>
						<hgroup>
							<h5><?=$party['attending']?></h5> <h6>Attending</h6>
							<h5>XX</h5> <h6>Days Till Party</h6>
						</hgroup>
					</a>
				</article>
			<?php endforeach; ?>

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