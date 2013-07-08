	<section id="cta" class="profile">
		<div class="sizer">
			<h1>Community of awesome people</h1>
		</div>
	</section>

	<section id="profile" class="sizer">
		
		<? if(isset($message)): ?>
			<h1 class="error"><?=$message?></h1>			
		<?endif;?>

		<aside>
			<article>
				<? if($user[0]['profile_img']):?> 
					<img src="<?=base_url()?>uploads/profile/<?=$user[0]['profile_img']?>" width="220" height="210" />
				<? else: ?>	
					<img src="" width="220" height="210" />
				<? endif; ?>
				
				<hgroup>
					<h2><i><?=$user[0]['username']?></i></h2>
					<h3><?=$user[0]['location']?></h3>
					<h4><?=$user[0]['bio']?></h4>
				</hgroup>

				<ul>
					<li>FeedBack <span><?=$user[0]['feedback']?></span></li>
					<li>Views <span><?=$user[0]['views']?></span></li>
					<li>Comments <span><?=$user[0]['comments']?></span></li>
				</ul>
				
				<hgroup>
					<h5><?=$user[0]['contributions']?></h5> <h6>Contributions</h6>
					<h5><?=$user[0]['parties']?></h5> <h6>Hosted Parties</h6>
				</hgroup>
			</article>

			<? if(isset($friendCheck) && $this->session->userdata('userID')): ?>
				<?if(!$friendCheck):?>
					<a href="<?=base_url()?>index.php/community/addFriend/<?=$user[0]['user_id']?>"><button>Add Friend</button></a>
				<?else:?>
					<a class="remove" href="<?=base_url()?>index.php/community/removeFriend/<?=$user[0]['user_id']?>"><button>Remove Friend</button></a>
				<?endif;?>
			<?endif;?>

			<article>
				<h1>Badges</h1>
			</article>
		</aside>

		<section id="tabs">
			<ul>
				<a href="<?=base_url()?>index.php/user/<?=$user[0]['user_id']?>"><li>Activity</li></a>
				<a href="<?=base_url()?>index.php/user/parties/<?=$user[0]['user_id']?>"><li>Parties</li></a>
				<a href="<?=base_url()?>index.php/user/friends/<?=$user[0]['user_id']?>"><li>Friends</li></a>
				<a href="<?=base_url()?>index.php/user/comments/<?=$user[0]['user_id']?>"><li class="selected">Comments</li></a>
			</ul>

			<section id="tabContent" class="comments">

				<article>
					<?if($this->session->userdata('profileImage')):?>
						<img src="<?=base_url()?>uploads/profile/<?=$this->session->userdata('profileImage')?>" alt="" width="50" height="50" />
					<?else:?>
						<img src="" alt="" width="50" height="50" />
					<?endif;?>

					<?=form_open("/user/comment/$user2"); ?>
						<textarea name="comment" cols="30" rows="10"></textarea>
						<h2><span class="char">400</span>/400 characters left</h2>
						<button>Post Comment</button>
					<?=form_close();?>
				</article>

				<?if($comments[0]):?>
					<?foreach($comments as $comment): ?>

						<article>
							<?if($comment['profile_img']):?>
								<a href="<?=base_url()?>index.php/user/comments/<?=$comment['user_id']?>"><img src="<?=base_url()?>uploads/profile/<?=$comment['profile_img']?>" alt="" width="50" height="50" /></a>
							<?else:?>
								<a href="<?=base_url()?>index.php/user/comments/<?=$comment['user_id']?>"><img src="" alt="" width="65" height="65" /></a>
							<?endif;?>

							<div>
								<p><?=$comment['user_comment']?> <a href="<?=base_url()?>index.php/user/comments/<?=$comment['user_id']?>">-<?=$comment['username']?></a> <span>on <?=$comment['comment_date']?></span></p>
								
								<?if($comment['user_id'] == $this->session->userdata('userID')):?>
									<a href="<?=base_url()?>index.php/user/deleteComment/<?=$comment['user_comment_id']?>/<?=$user[0]['user_id']?>" class="delete">x</a>
								<?endif;?>
							</div>
						</article>
	
					<?endforeach;?>
					<div><button>See More Comments</button></div>
				<?endif;?>
			</section>
		</section>
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
	<script>initTabs(1);</script>
	<script>initSuccessError();</script>
	<script>initComments(1);</script>