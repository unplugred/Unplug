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
		<title>Petscop 2D Counter</title>

		<meta charset="utf-8">
		<meta name="keywords" content="Petscop">

		<meta property="og:site_name" content="red">
		<meta name="twitter:site" content="red">
		<meta property="og:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>">
		<meta name="twitter:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>">
		<meta property="og:type" content="article">
		<meta name="twitter:card" content="summary">
		<meta property="og:title" content="Petscop 2D Counter">
		<meta name="twitter:title" content="Petscop 2D Counter">
		<meta property="og:description" content="Days since last Petscop episode">
		<meta name="twitter:description" content="Days since last Petscop episode">
		<meta name="description" content="Days since last Petscop episode">
		<meta property="og:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/h.gif">
		<meta name="twitter:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/h.gif">
		
		<link rel=StyleSheet href="/assets/unplug.css" type="text/css" media=screen>
		
		<style>
			body{
				display: flex;
			}
		
			#wrap{
				background-image: url("/assets/thisjobempty.png");
				width: 507px;
				height: 416px;
				margin: auto;
			}
			
			#text {
				margin: 40% 4%;
				text-align: center;
				width: 34%;
				height: 0;
				line-height: 0;
				color: black;
				font-size: 50pt;
			}
		</style>
	</head>
	<body>
		<div id="wrap">
			<p id="text">19</p>
		</div>
		<script type="text/javascript">
			var timer = document.getElementById("text");			
			var interval = setInterval(updato, 60000);
			var days = 198;
			var now = new Date();
			updato();
			
			function updato() {
				var current = now.getMonth()*30 + now.getDate();
				timer.innerHTML = current - days;
			}
		</script>
	</body>
</html>