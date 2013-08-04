	<section id="cta">
		<div class="sizer">
			<article>
				<h1>Welcome to the party!</h1>
				<p>Beer-Bucks is a social website for people who like to party. At Beer-Bucks you can raise money to fund a party, find and donate to local parties, or make new friends in our community of awesome people.</p>
			</article>
			<a href="<?=base_url()?>index.php/join">Join The Party</a>
		</div>
	</section>

	<section id="partiesNear" class="sizer">

		<?if(isset($featured[0])):?>
			<h1>Featured parties</h1>
			<?$key = 0?>
			<? foreach($featured as $f): ?>
				<? $key++; if($key == 5) break ?>
				<article class="party">

					<a href="<?=base_url()?>index.php/party/<?=$f['party_id']?>">
						<img src="<?=base_url()?>uploads/party/<?=$f['party_img']?>" alt=""  width="220" height="210"/>
					</a>
				
					<hgroup>
						<h2><a href="<?=base_url()?>index.php/party/<?=$f['party_id']?>"><?=$f['title']?></a></h2>
						<h3>Hosted by <i><a href="<?=base_url()?>index.php/user/<?=$f['user_id']?>"><?=$f['username']?></a></i></h3>
						<h4><?=$f['description']?></h4>
						<h3><?=$f['party_location']?></h3>
					</hgroup>

					<div class="bar" data-raised="<?=$f['0']?>"><span>$ <?=floor($f['1'])?>/<?=$f['goal']?></span></div>

					<hgroup>
						<h5><?= count($f['2'])?></h5> <h6>Attending</h6>
						
						<?if($f['days'] > 1):?>
							<h5><?=$f['days']?></h5> <h6>Days Till Party</h6>
						<?elseif($f['days'] == 1):?>
							<h5><?=$f['days']?></h5> <h6>Day Till Party</h6>
						<?elseif($f['hours'] > 1):?>
							<h5><?=$f['hours']?></h5> <h6>Hours Till Party</h6>
						<?elseif($f['hours'] == 1):?>
							<h5><?=$f['hours']?></h5> <h6>Hour Till Party</h6>
						<?elseif($f['minutes'] > 1):?>
							<h5><?=$f['minutes']?></h5> <h6>Minutes Till Party</h6>
						<?elseif($f['minutes'] = 1):?>
							<h5><?=$f['minutes']?></h5> <h6>Minute Till Party</h6>
						<?elseif($f['seconds'] > 1):?>
							<h5><?=$f['seconds']?></h5> <h6>Seconds Till Party</h6>
						<?elseif($f['seconds'] = 1):?>
							<h5><?=$f['seconds']?></h5> <h6>Second Till Party</h6>
						<?endif;?>
					</hgroup>
				
				</article>
			<? endforeach; ?>
		
		<?endif;?>

	</section>

	<section id="partiesUpcoming">
		<div class="sizer">
			<?if(isset($featured[0])):?>

				<h1>Upcoming Parties</h1>

				<? foreach($featured as $k=>$f): ?>

					<? if($k < 4) continue; ?>

					<article class="party">

						<a href="<?=base_url()?>index.php/party/<?=$f['party_id']?>">
							<img src="<?=base_url()?>uploads/party/<?=$f['party_img']?>" alt=""  width="220" height="210"/>
						</a>
					
						<hgroup>
							<h2><a href="<?=base_url()?>index.php/party/<?=$f['party_id']?>"><?=$f['title']?></a></h2>
							<h3>Hosted by <i><a href="<?=base_url()?>index.php/user/<?=$f['user_id']?>"><?=$f['username']?></a></i></h3>
							<h4><?=$f['description']?></h4>
							<h3><?=$f['party_location']?></h3>
						</hgroup>

						<div class="bar" data-raised="<?=$f['0']?>"><span>$ <?=floor($f['1'])?>/<?=$f['goal']?></span></div>

						<hgroup>
							<h5><?= count($f['2'])?></h5> <h6>Attending</h6>
							
							<?if($f['days'] > 1):?>
								<h5><?=$f['days']?></h5> <h6>Days Till Party</h6>
							<?elseif($f['days'] == 1):?>
								<h5><?=$f['days']?></h5> <h6>Day Till Party</h6>
							<?elseif($f['hours'] > 1):?>
								<h5><?=$f['hours']?></h5> <h6>Hours Till Party</h6>
							<?elseif($f['hours'] == 1):?>
								<h5><?=$f['hours']?></h5> <h6>Hour Till Party</h6>
							<?elseif($f['minutes'] > 1):?>
								<h5><?=$f['minutes']?></h5> <h6>Minutes Till Party</h6>
							<?elseif($f['minutes'] = 1):?>
								<h5><?=$f['minutes']?></h5> <h6>Minute Till Party</h6>
							<?elseif($f['seconds'] > 1):?>
								<h5><?=$f['seconds']?></h5> <h6>Seconds Till Party</h6>
							<?elseif($f['seconds'] = 1):?>
								<h5><?=$f['seconds']?></h5> <h6>Second Till Party</h6>
							<?endif;?>
						</hgroup>
					
					</article>
				<? endforeach; ?>
			
			<?endif;?>
		</div>
	</section>
	
	<section id="community" class="sizer">
		<h1>Beer-Bucks Community</h1>
		<article id="tumblr">
			<h2>Tumblr Winners</h2> 
			<a href="#">BigWillie</a> <span> &amp; </span> <a href="">JazyJeff</a>
			<a href="#">See All</a>
			<img src="<?=base_url()?>img/stock-tumblr-large.jpg" alt="">
		</article>

		<article id="tweets">
			<h2>Tweets</h2>
			<h3>@thebeerbucks</h3>
			<ul>
			<? foreach ($tweets as $tweet): ?>
				<li>
					<p><?=$tweet['text']?> <a href="http://twitter.com/<?=$tweet['name']?>">@<?=$tweet['name']?></a></p>
				</li>
			<? endforeach; ?>
			</ul>
		</article>

		<article id="topImages">
			<h2>Top Images</h2>
			<a href="#">See All</a>
			<div id="leftArrow"></div>
			<ul>
				<li>
					<img src="<?=base_url()?>img/stock-topImage.jpg" alt="">
					<a href="#">BigWillie</a>
					<h3>33</h3>
				</li>
				<li>
					<img src="<?=base_url()?>img/stock-topImage.jpg" alt="">
					<a href="#">BigWillie</a>
					<h3>33</h3>
				</li>
				<li>
					<img src="<?=base_url()?>img/stock-topImage.jpg" alt="">
					<a href="#">BigWillie</a>
					<h3>33</h3>
				</li>
				<li>
					<img src="<?=base_url()?>img/stock-topImage.jpg" alt="">
					<a href="#">BigWillie</a>
					<h3>33</h3>
				</li>
			</ul>
			<div id="rightArrow"></div>
		</article>
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
	<script>initBars();</script>