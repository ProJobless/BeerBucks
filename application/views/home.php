	<? //Gets users ip and uses ipinfodb api to return location, stores info into a cookie.

	$this->load->helper('cookie');

    include('application/libraries/ip2locationlite.class.php');

	if(!get_cookie("geolocation")){
		$ipLite = new ip2location_lite;
		$visitorGeolocation = $ipLite->getCity($_SERVER['REMOTE_ADDR']);

		if ($visitorGeolocation['statusCode'] == 'OK') {
			$data = base64_encode(serialize($visitorGeolocation));
			setcookie("geolocation", $data, time()+3600*24*7); 
		}
	}

	if(get_cookie("geolocation"))$visitorGeolocation = unserialize(base64_decode($_COOKIE["geolocation"]));
	
	?>

	<section id="cta">
		<div class="sizer">
			<article>
				<h1>Welcome to the Party!</h1>
				<p>Beer-Bucks is a social website for people who like to party. At Beer-Bucks you can raise money to fund a party, find and donate to local parties, or make new friends in our community of awesome people.</p>
			</article>
			<a href="<? echo base_url(); ?>index.php/join">Join The Party</a>
		</div>

		<div class="divider"></div>
	</section>

	<section id="partiesNear" class="sizer">
		<h1>Parties near <? if(isset($visitorGeolocation)) echo $visitorGeolocation['cityName'] ?></h1>
		<article>
			<img src="<? echo base_url(); ?>img/stock-party-small.jpg" alt="" />
			<hgroup>
				<h2>Michael's 22nd birthday party</h2>
				<h3>Hosted by <i>JazyJeff</i></h3>
				<h4>Bacon ipsum dolor sitw efew amet fatback spare ribs flank ham. Tongue doner capicola jowl chicken strip steak ribeye short ribs tenderloin biltong turducken prosciutto cow.</h4>
				<h3>Orlando, FL</h3>
			</hgroup>
			<div><p>$ 100/100</p></div>
			<hgroup>
				<h5>23</h5> <h6>Attending</h6>
				<h5>10</h5> <h6>Days Till Party</h6>
			</hgroup>
		</article>

		<article>
			<img src="<? echo base_url(); ?>img/stock-party-small.jpg" alt="" />
			<hgroup>
				<h2>Michael's 22nd birthday party</h2>
				<h3>Hosted by <i>JazyJeff</i></h3>
				<h4>Bacon ipsum dolor sitw efew amet fatback spare ribs flank ham. Tongue doner capicola jowl chicken strip steak ribeye short ribs tenderloin biltong turducken prosciutto cow.</h4>
				<h3>Orlando, FL</h3>
			</hgroup>
			<div><p>$ 100/100</p></div>
			<hgroup>
				<h5>23</h5> <h6>Attending</h6>
				<h5>10</h5> <h6>Days Till Party</h6>
			</hgroup>
		</article>

		<article>
			<img src="<? echo base_url(); ?>img/stock-party-small.jpg" alt="" />
			<hgroup>
				<h2>Michael's 22nd birthday party</h2>
				<h3>Hosted by <i>JazyJeff</i></h3>
				<h4>Bacon ipsum dolor sitw efew amet fatback spare ribs flank ham. Tongue doner capicola jowl chicken strip steak ribeye short ribs tenderloin biltong turducken prosciutto cow.</h4>
				<h3>Orlando, FL</h3>
			</hgroup>
			<div><p>$ 100/100</p></div>
			<hgroup>
				<h5>23</h5> <h6>Attending</h6>
				<h5>10</h5> <h6>Days Till Party</h6>
			</hgroup>
		</article>

		<article>
			<img src="<? echo base_url(); ?>img/stock-party-small.jpg" alt="" />
			<hgroup>
				<h2>Michael's 22nd birthday party</h2>
				<h3>Hosted by <i>JazyJeff</i></h3>
				<h4>Bacon ipsum dolor sitw efew amet fatback spare ribs flank ham. Tongue doner capicola jowl chicken strip steak ribeye short ribs tenderloin biltong turducken prosciutto cow.</h4>
				<h3>Orlando, FL</h3>
			</hgroup>
			<div><p>$ 100/100</p></div>
			<hgroup>
				<h5>23</h5> <h6>Attending</h6>
				<h5>10</h5> <h6>Days Till Party</h6>
			</hgroup>
		</article>
		<div class="divider"></div>
	</section>

	<section id="partiesUpcoming">
		<div class="sizer">
			<h1>Upcoming Parties</h1>
			<article>
				<img src="<? echo base_url(); ?>img/stock-party-small.jpg" alt="" />
				<hgroup>
					<h2>Michael's 22nd birthday party</h2>
					<h3>Hosted by <i>JazyJeff</i></h3>
					<h4>Bacon ipsum dolor sitw efew amet fatback spare ribs flank ham. Tongue doner capicola jowl chicken strip steak ribeye short ribs tenderloin biltong turducken prosciutto cow.</h4>
					<h3>Orlando, FL</h3>
				</hgroup>
				<div><p>$ 100/100</p></div>
				<hgroup>
					<h5>23</h5> <h6>Attending</h6>
					<h5>10</h5> <h6>Days Till Party</h6>
				</hgroup>
			</article>

			<article>
				<img src="<? echo base_url(); ?>img/stock-party-small.jpg" alt="" />
				<hgroup>
					<h2>Michael's 22nd birthday party</h2>
					<h3>Hosted by <i>JazyJeff</i></h3>
					<h4>Bacon ipsum dolor sitw efew amet fatback spare ribs flank ham. Tongue doner capicola jowl chicken strip steak ribeye short ribs tenderloin biltong turducken prosciutto cow.</h4>
					<h3>Orlando, FL</h3>
				</hgroup>
				<div><p>$ 100/100</p></div>
				<hgroup>
					<h5>23</h5> <h6>Attending</h6>
					<h5>10</h5> <h6>Days Till Party</h6>
				</hgroup>
			</article>

			<article>
				<img src="<? echo base_url(); ?>img/stock-party-small.jpg" alt="" />
				<hgroup>
					<h2>Michael's 22nd birthday party</h2>
					<h3>Hosted by <i>JazyJeff</i></h3>
					<h4>Bacon ipsum dolor sitw efew amet fatback spare ribs flank ham. Tongue doner capicola jowl chicken strip steak ribeye short ribs tenderloin biltong turducken prosciutto cow.</h4>
					<h3>Orlando, FL</h3>
				</hgroup>
				<div><p>$ 100/100</p></div>
				<hgroup>
					<h5>23</h5> <h6>Attending</h6>
					<h5>10</h5> <h6>Days Till Party</h6>
				</hgroup>
			</article>

			<article>
				<img src="<? echo base_url(); ?>img/stock-party-small.jpg" alt="" />
				<hgroup>
					<h2>Michael's 22nd birthday party</h2>
					<h3>Hosted by <i>JazyJeff</i></h3>
					<h4>Bacon ipsum dolor sitw efew amet fatback spare ribs flank ham. Tongue doner capicola jowl chicken strip steak ribeye short ribs tenderloin biltong turducken prosciutto cow.</h4>
					<h3>Orlando, FL</h3>
				</hgroup>
				<div><p>$ 100/100</p></div>
				<hgroup>
					<h5>20302</h5> <h6>Attending</h6>
					<h5>365</h5> <h6>Days Till Party</h6>
				</hgroup>
			</article>
		</div>

		<div class="divider"></div>
	</section>
	
	<section id="community" class="sizer">
		<h1>Beer-Bucks Community</h1>
		<article id="tumblr">
			<h2>Tumblr Winners</h2> 
			<a href="">BigWillie</a> <span>&</span> <a href="">JazyJeff</a>
			<a href="#">See All</a>
			<img src="<? echo base_url(); ?>img/stock-tumblr-large.jpg" alt="">
		</article>

		<article id="tweets">
			<h2>Tweets</h2>
			<h3>@Beer-Bucks</h3>
			<ul>
				<li>
					<img src="" alt="">
					<p>about 8 hours ago "No one looks back on their life and...”</p>
				</li>
				<li>
					<img src="" alt="">
					<p>about 8 hours ago "No one looks back on their life and...”</p>
				</li>
				<li>
					<img src="" alt="">
					<p>about 8 hours ago "No one looks back on their life and...”</p>
				</li>
				<li>
					<img src="" alt="">
					<p>about 8 hours ago "No one looks back on their life and...”</p>
				</li>
				<li>
					<img src="" alt="">
					<p>about 8 hours ago "No one looks back on their life and...”</p>
				</li>
				<li>
					<img src="" alt="">
					<p>about 8 hours ago "No one looks back on their life and...”</p>
				</li>
				<li>
					<img src="" alt="">
					<p>about 8 hours ago "No one looks back on their life and...”</p>
				</li>
				<li>
					<img src="" alt="">
					<p>about 8 hours ago "No one looks back on their life and...”</p>
				</li>
			</ul>
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
