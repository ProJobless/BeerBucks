<!DOCTYPE HTML>

<html lang="en">

<head>
	<title>Beer-Bucks</title>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="author" content="Kolby Sisk">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="<? echo base_url(); ?>css/normalize.css" media="screen" /> 
	<link rel="stylesheet" type="text/css" href="<? echo base_url(); ?>css/main.css" media="screen" /> 

	<?php echo link_tag("favicon.ico", "shortcut icon", "image/ico");?>

	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<script>
		var base = "<?php echo base_url(); ?>"
	</script>
</head>	
<body>
	<header>
		<div class="sizer">
			<a href="<? echo base_url(); ?>">
				<h1 id="logo">Beer Bucks</h1>
			</a>
			<nav>
				<a href="<? echo base_url(); ?>index.php/discover" <? if($view == "discover") echo 'class="active"'?> >
					<h1>Discover</h1>
					<h2>Parties Near You</h2>
				</a>
				<a href="<? echo base_url(); ?>index.php/start" <? if($view == "start") echo 'class="active"'?> >
					<h1>Start</h1>
					<h2>A Party</h2>
				</a>
				<a href="<? echo base_url(); ?>index.php/community" <? if($view == "community") echo 'class="active"'?> >
					<h1>Community</h1>
					<h2>Of Awesome People</h2>
				</a>
			</nav>
			<div id="tools">
				<? if($this->session->userdata('username')) echo '<a href="' . base_url() . 'index.php/logout">' . $this->session->userdata('username') . '</a>';
				else echo'<a href="' . base_url() . 'index.php/join">Join</a><a href="' . base_url() . 'index.php/login">Login</a>'; ?>
			</div>
		</div>
	</header>
