<!DOCTYPE html>
<html>
	<head>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-52381925-3"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-52381925-3');
		</script>
		
		<meta name="theme-color" content="#000000">
		<link rel="icon" type="image/png" href="/assets/shortcut-icon.png">
		<link rel="shortcut icon" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/shortcut-icon.png">
		<link rel="apple-touch-icon-precomposed" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/apple-touch-icon.png">
		<title>rooms</title>

		<meta charset="utf-8">
		<meta name="keywords" content="ari,hanan,arihanan,red,redflux,red#3510,rooms">
		<meta name="dcterms.rightsHolder" content="Ari Hanan">

		<meta property="og:site_name" content="red"/>
		<meta name="twitter:site" content="red">
		<meta property="og:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>" />
		<meta name="twitter:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>">
		<meta property="og:type" content="article"/>
		<meta name="twitter:card" content="summary_large_image">
		<meta property="og:title" content="rooms"/>
		<meta name="twitter:title" content="rooms">
		<meta property="og:description" content="a game.">
		<meta name="twitter:description" content="a game.">
		<meta name="description" content="a game.">
		<meta property="og:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/rooms/cover.png">
		<meta name="twitter:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/rooms/cover.png">

		<style>
			body, html{
				margin: 0;
				padding: 0;
				border: none;
				width: 100vw;
				height: 100vh;
				overflow-y: hidden;
				overflow-x: hidden;
				background-color: black;
			}

			#bg {
				background-image: url("/assets/rooms/background.png");
				background-size: cover;
				background-position: bottom center;
				margin-top: 50vh;
				height: 50vh;
				width: 100vw;
				position: absolute;
			}
			
			a {
				display: block;
				margin-left: calc(50vw - 334px);
				position: absolute;
				z-index: 100;
				margin-top: calc(-200px + 25vh);
			}
			
			img{
				width: 668px;
				max-width: calc(100vw - 20px);
			}
			
			@media only screen and (max-width: 688px) {
				a {
					margin-left: 0;
					margin-top: calc(-28vw + 25vh);
					padding: 10px;
				}
			}
			
			#fade{
				position: absolute;
				width: 100vw;
				height: 100vh;
				background-color: black;
				opacity: 0;
				animation-name: screen-fade;
				animation-duration: 10s;
				z-index: 5000;
				pointer-events: none;
			}
			
			@keyframes screen-fade {
				from {opacity: 1;}
				to {opacity: 0;}
			}
		</style>
	</head>
	<body>
		<div id="fade"></div>
		<a href="https://unplugred.itch.io/rooms"><img src="/assets/rooms/logo.png"/></a>
		<div id="bg"></div>
		<audio autoplay loop type="audio/mpeg" src="/assets/rooms/roomtone.mp3"/>
		</audio>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>
