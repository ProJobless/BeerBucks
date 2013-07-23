	<section id="cta" class="discover">
		<div class="sizer">
			<h1>Discover the best parties</h1>
		</div>
	</section>

	<section id="tabs" class="sizer">
		<nav>
			<a href="<?=base_url()?>index.php/discover/featured"><h1>Featured</h1></a>
			<a href="<?=base_url()?>index.php/discover/nearYou"><h1>Near You</h1></a>
			<a href="<?=base_url()?>index.php/discover/upcoming"><h1>Upcoming</h1></a>
			<a href="<?=base_url()?>index.php/discover/completed"><h1>Completed</h1></a>
			<?=form_open("discover/search"); ?><input type="text" name="search" placeholder="Search for a party by name or location"></input><button>Search</button><?=form_close(); ?>
		</nav>

		<section id="tabContent">

			<?if(isset($parties[0])):?>
			
				<? foreach ($parties as $party): ?>

					<article class="party">

						<a href="<?=base_url()?>index.php/party/<?=$party['party_id']?>">
							<img src="<?=base_url()?>uploads/party/<?=$party['party_img']?>" alt=""  width="220" height="210"/>
						</a>
					
						<hgroup>
							<h2><a href="<?=base_url()?>index.php/party/<?=$party['party_id']?>"><?=$party['title']?></a></h2>
							<h3>Hosted by <i><a href="<?=base_url()?>index.php/user/<?=$party['user_id']?>"><?=$party['username']?></a></i></h3>
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
				<h1>There was no parties found.</h1>
			<?endif;?>

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
	<script>initBars();</script>