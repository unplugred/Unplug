<!DOCTYPE html>
<html lang="en-us">
	<head>
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-52381925-3"></script>
		<script>
			window.dataLayer = window.dataLayer || [];
			function gtag(){dataLayer.push(arguments);}
			gtag('js', new Date());

			gtag('config', 'UA-52381925-3');
		</script>

		<meta name="theme-color" content="#ffffff">
		<link rel="icon" type="image/x-icon" href="favicon.ico">
		<link rel="shortcut icon" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/useless-flower/favicon.ico">
		<link rel="apple-touch-icon-precomposed" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/apple-touch-icon.png">
		<title>useless flower</title>

		<meta charset="utf-8">
		<meta name="keywords" content="ari,hanan,arihanan,red,redflux,red#3510,useless,flower,uselessflower">
		<meta name="dcterms.rightsHolder" content="Ari Hanan">

		<meta property="og:site_name" content="red"/>
		<meta name="twitter:site" content="red">
		<meta property="og:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>" />
		<meta name="twitter:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>">
		<meta property="og:type" content="article"/>
		<meta name="twitter:card" content="summary_large_image">
		<meta property="og:title" content="useless flower"/>
		<meta name="twitter:title" content="useless flower">
		<meta property="og:description" content="a game.">
		<meta name="twitter:description" content="a game.">
		<meta name="description" content="a game.">
		<meta property="og:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/useless-flower/cover.png">
		<meta name="twitter:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/useless-flower/cover.png">

		<link rel=StyleSheet href="index.css" type="text/css" media=screen>
		<meta charset="utf-8">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>useless flower</title>
		
		<script src="Build/UnityLoader.js"></script>
		<script>var gameInstance = UnityLoader.instantiate("gameContainer", "Build/uselessflower.json");</script>
	</head>
	<body>
		<div id="gameContainer"></div>
	</body>
</html>