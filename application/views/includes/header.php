<!DOCTYPE HTML>

<html lang="en">

<head>
	<title>Beer-Bucks</title>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="author" content="Kolby Sisk">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/normalize.css" media="screen" /> 
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css//ui/jquery-ui-1.10.3.custom.css" media="screen" /> 
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/main.css" media="screen" /> 

	<?php echo link_tag("favicon.ico", "shortcut icon", "image/ico");?>

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<script>
		var base = "<?=base_url()?>"
	</script>
</head>	

<body>
	<header>
		<div class="sizer">

			<a href="<?=base_url()?>"><img src="<?= base_url(); ?>/img/logo-purple.png" alt=""></a>

			<nav>
				<a href="<?= base_url(); ?>index.php/discover" <? if($view == "discover") echo 'class="active"'?> >
					<h1>Discover</h1>
					<h2>Parties Near You</h2>
				</a>
				<a href="<?= base_url(); ?>index.php/start" <? if($view == "start") echo 'class="active"'?> >
					<h1>Start</h1>
					<h2>A Party</h2>
				</a>
				<a href="<?= base_url(); ?>index.php/community" <? if($view == "community") echo 'class="active"'?> >
					<h1>Community</h1>
					<h2>Of Awesome People</h2>
				</a>
			</nav>

			<div id="tools">
				<? if($this->session->userdata('userID')): ?>
					<div id="toolBox">

						<p><?=$this->session->userdata('username')?></p> 

						<? if($this->session->userdata('profileImage')): ?>
							<img src="<?=base_url()?>uploads/profile/<?=$this->session->userdata('profileImage')?>" width="30" height="30" />
						<? else: ?>	
							<img src="" width="30" height="30" />
						<? endif; ?>

						<ul>
							<li><a href="<?=base_url()?>index.php/profile">Profile</a></li>
							<li><a href="<?=base_url()?>index.php/settings">Settings</a></li>
							<li><a href="<?=base_url()?>index.php/profile">Your Parties</a></li>
							<li><a href="<?=base_url()?>index.php/logout">Logout</a></li>
						</ul>

					</div>
				<? else: ?>
					<a class="button" href="<?=base_url()?>index.php/login">Login</a>
					<a class="button" href="<?=base_url()?>index.php/join">Join</a> 
				<? endif; ?>
			</div>
		</div>
	</header>
