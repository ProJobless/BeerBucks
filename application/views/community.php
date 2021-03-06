	<section id="cta" class="discover">
		<div class="sizer">
			<h1>Community of awesome people</h1>
		</div>
	</section>

	<section id="tabs" class="sizer">
		<nav>
			<a href="<?=base_url()?>index.php/community"><h1 class="selected">Featured</h1></a>
			<a href="<?=base_url()?>index.php/community/people"><h1>People</h1></a>
<!-- 			<a href="<?=base_url()?>index.php/community/photos"><h1>Photos</h1></a>
 -->		<?=form_open("community/search"); ?><input type="text" name="search" placeholder="Search for a friend by username or location"></input><button>Search</button><?=form_close(); ?>
		</nav>	

		<section id="community">
			<article id="tumblr">
				<h2>Tumblr Winners</h2> 
				<a href="">BigWillie</a> <span>&</span> <a href="">JazyJeff</a>
				<a href="#">See All</a>
				<img src="<? echo base_url(); ?>img/stock-tumblr-large.jpg" alt="">
			</article>

			<article id="hof">
				<h2>Hall of Fame</h2>
				<ul>
					<li>
						<img src="<? echo base_url(); ?>img/stock-topImage.jpg" alt="">
						<a href="#">BigWillie</a>
						<h3>33</h3>
					</li>
					<li>
						<img src="<? echo base_url(); ?>img/stock-topImage.jpg" alt="">
						<a href="#">BigWillie</a>
						<h3>33</h3>
					</li>
					<li>
						<img src="<? echo base_url(); ?>img/stock-topImage.jpg" alt="">
						<a href="#">BigWillie</a>
						<h3>33</h3>
					</li>
					<li>
						<img src="<? echo base_url(); ?>img/stock-topImage.jpg" alt="">
						<a href="#">BigWillie</a>
						<h3>33</h3>
					</li>
					<li>
						<img src="<? echo base_url(); ?>img/stock-topImage.jpg" alt="">
						<a href="#">BigWillie</a>
						<h3>33</h3>
					</li>
				</ul>
				<button>See More</button>
			</article>

			<article id="topImages">
				<h2>Top Images</h2>
				<a href="#">See All</a>
				<div id="leftArrow"></div>
				<ul>
					<li>
						<img src="<? echo base_url(); ?>img/stock-topImage.jpg" alt="">
						<a href="#">BigWillie</a>
						<h3>33</h3>
					</li>
					<li>
						<img src="<? echo base_url(); ?>img/stock-topImage.jpg" alt="">
						<a href="#">BigWillie</a>
						<h3>33</h3>
					</li>
					<li>
						<img src="<? echo base_url(); ?>img/stock-topImage.jpg" alt="">
						<a href="#">BigWillie</a>
						<h3>33</h3>
					</li>
					<li>
						<img src="<? echo base_url(); ?>img/stock-topImage.jpg" alt="">
						<a href="#">BigWillie</a>
						<h3>33</h3>
					</li>
				</ul>
				<div id="rightArrow"></div>
			</article>

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