<!DOCTYPE html>
<html lang="en-us">
	<head>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/tracking.php'; ?>

		<meta name="theme-color" content="#000000">
		<link rel="icon" type="image/x-icon" href="favicon.ico">
		<link rel="shortcut icon" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/hyperaction/favicon.ico">
		<link rel="apple-touch-icon-precomposed" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/apple-touch-icon.png">
		<title>Hyperaction</title>

		<meta charset="utf-8">
		<meta name="keywords" content="ari,hanan,arihanan,red,redflux,red#3510,hyperaction,hyper,action">
		<meta name="dcterms.rightsHolder" content="Ari Hanan">

		<meta property="og:site_name" content="red"/>
		<meta name="twitter:site" content="red">
		<meta property="og:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>" />
		<meta name="twitter:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>">
		<meta property="og:type" content="article"/>
		<meta name="twitter:card" content="summary_large_image">
		<meta property="og:title" content="Hyperaction"/>
		<meta name="twitter:title" content="Hyperaction">
		<meta property="og:description" content="a game.">
		<meta name="twitter:description" content="a game.">
		<meta name="description" content="a game.">
		<meta property="og:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/hyperaction/cover.png">
		<meta name="twitter:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/hyperaction/cover.png">

		<link rel=StyleSheet href="/assets/unity.css" type="text/css" media=screen>
		<script src="/assets/UnityLoader.js"></script>
		<script>var gameInstance = UnityLoader.instantiate("gameContainer", "Build/hyperaction.json");</script>
	</head>
	<body><div id="gameContainer"></div></body>
</html>