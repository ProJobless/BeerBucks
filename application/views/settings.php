	<section id="settings" class="sizer">
		<aside>
			<article>
				<? if($this->session->userdata('profileImage')){ 
					echo '<img src="' . base_url() . 'uploads/profile/' . $this->session->userdata('profileImage') . '" width="220" height="210" />';
				}else{
					echo '<img src="" width="220" height="210" />';
				}?>
				
				<hgroup>
					<h2><i><? echo $this->session->userdata('username') ?></i></h2>
					<h3>Orlando, FL</h3>
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
			<ul>
				<li>Profile Settings</li>
				<li>Account Settings</li>
				<li>Services Settings</li>
				<li>Subscription Settings</li>
			</ul>
		</aside>
		<select>
			<h1>Name</h1> <hr>

			<?php echo form_error('name'); ?>

			<div>
				<input type="text" name="name" placeholder="name" value="<? if(!set_value('name')){
						if($this->session->userdata('name')) echo $this->session->userdata('name');
					}else{
						echo set_value('name');
					} ?>"/>
				<p>
					Choose a catchy name for your party. This is the first thing other users will see.
					You should try to make your name <strong>catchy and descriptive.</strong>
				</p>
				<p>Ex: Bobbies 21st birthday bash</p>
			</div>




		</select>
	</section>

