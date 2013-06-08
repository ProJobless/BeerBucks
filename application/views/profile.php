	<section id="cta" class="profile">
		<div class="sizer">
			<h1>Community of awesome people</h1>
		</div>

		<div class="divider"></div>
	</section>

	<section id="profile" class="sizer">
	
		<aside>
			<article>
				<? if($this->session->userdata('profileImage')){ 
					echo '<img src="' . base_url() . 'uploads/profile/' . $this->session->userdata('profileImage') . '" width="220" height="210" />';
				}else{
					echo '<img src="" width="220" height="210" />';
				}?>
				
				<hgroup>
					<h2><i><? echo $this->session->userdata('username') ?></i></h2>
					<h3><? echo $this->session->userdata('location') ?></h3>
					<h4><? echo $this->session->userdata('bio') ?></h4>
				</hgroup>
				<ul>
					<li>FeedBack <span>0</span></li>
					<li>Views <span>0</span></li>
					<li>Comments <span>0</span></li>
				</ul>
				<hgroup>
					<h5>0</h5> <h6>contributors</h6>
					<h5>0</h5> <h6>Hosted Parties</h6>
				</hgroup>
			</article>

			<article>
				<h1>Badges</h1>
			</article>
		</aside>

		<section id="tabs">
			<ul>
				<li>Activity</li>
				<li>Parties</li>
				<li class="selected">Friends</li>
				<li><input type="text" placeholder="Search for a friend"></input><button>Search</button></li>
			</ul>

			<section id="tabContent" class="friends">

				<article style="background: url( <? echo base_url(); ?>img/stock-party-small.jpg);">
					<hgroup>
						<h2><i>2JazzyJeff</i></h2>
						<h3>Orlando, FL</h3>
						<h4>User's bio will go here blah blfjna ljnadjksn  zeld  music siis cool drin km dm coolaide.</h4>
					</hgroup>

					<ul>
						<li>FeedBack <span>22</span></li>
						<li>Views <span>22</span></li>
						<li>Comments <span>22</span></li>
					</ul>

					<hgroup>
						<h5>0</h5> <h6>contributors</h6>
						<h5>0</h5> <h6>Hosted Parties</h6>
					</hgroup>
				</article>

				<article style="background: url( <? echo base_url(); ?>img/stock-party-small.jpg);">
					<hgroup>
						<h2><i>2JazzyJeff</i></h2>
						<h3>Orlando, FL</h3>
						<h4>User's bio will go here blah blfjna ljnadjksn  zeld  music siis cool drin km dm coolaide.</h4>
					</hgroup>

					<ul>
						<li>FeedBack <span>22</span></li>
						<li>Views <span>22</span></li>
						<li>Comments <span>22</span></li>
					</ul>

					<hgroup>
						<h5>0</h5> <h6>contributors</h6>
						<h5>0</h5> <h6>Hosted Parties</h6>
					</hgroup>
				</article>

				<article style="background: url( <? echo base_url(); ?>img/stock-party-small.jpg);">
					<hgroup>
						<h2><i>2JazzyJeff</i></h2>
						<h3>Orlando, FL</h3>
						<h4>User's bio will go here blah blfjna ljnadjksn  zeld  music siis cool drin km dm coolaide.</h4>
					</hgroup>

					<ul>
						<li>FeedBack <span>22</span></li>
						<li>Views <span>22</span></li>
						<li>Comments <span>22</span></li>
					</ul>

					<hgroup>
						<h5>0</h5> <h6>contributors</h6>
						<h5>0</h5> <h6>Hosted Parties</h6>
					</hgroup>
				</article>

				<article style="background: url( <? echo base_url(); ?>img/stock-party-small.jpg);">
					<hgroup>
						<h2><i>2JazzyJeff</i></h2>
						<h3>Orlando, FL</h3>
						<h4>User's bio will go here blah blfjna ljnadjksn  zeld  music siis cool drin km dm coolaide.</h4>
					</hgroup>

					<ul>
						<li>FeedBack <span>22</span></li>
						<li>Views <span>22</span></li>
						<li>Comments <span>22</span></li>
					</ul>

					<hgroup>
						<h5>0</h5> <h6>contributors</h6>
						<h5>0</h5> <h6>Hosted Parties</h6>
					</hgroup>
				</article>

				<article style="background: url( <? echo base_url(); ?>img/stock-party-small.jpg);">
					<hgroup>
						<h2><i>2JazzyJeff</i></h2>
						<h3>Orlando, FL</h3>
						<h4>User's bio will go here blah blfjna ljnadjksn  zeld  music siis cool drin km dm coolaide.</h4>
					</hgroup>

					<ul>
						<li>FeedBack <span>22</span></li>
						<li>Views <span>22</span></li>
						<li>Comments <span>22</span></li>
					</ul>

					<hgroup>
						<h5>0</h5> <h6>contributors</h6>
						<h5>0</h5> <h6>Hosted Parties</h6>
					</hgroup>
				</article>

				<article style="background: url( <? echo base_url(); ?>img/stock-party-small.jpg);">
					<hgroup>
						<h2><i>2JazzyJeff</i></h2>
						<h3>Orlando, FL</h3>
						<h4>User's bio will go here blah blfjna ljnadjksn  zeld  music siis cool drin km dm coolaide.</h4>
					</hgroup>

					<ul>
						<li>FeedBack <span>22</span></li>
						<li>Views <span>22</span></li>
						<li>Comments <span>22</span></li>
					</ul>

					<hgroup>
						<h5>0</h5> <h6>contributors</h6>
						<h5>0</h5> <h6>Hosted Parties</h6>
					</hgroup>
				</article>

				<div><button>See More</button></div>
			</section>
		</section>

	</section>