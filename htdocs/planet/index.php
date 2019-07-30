<!DOCTYPE html>
<html lang="en-us">
	<head>
		<meta charset="utf-8">
		<title>planet</title>

<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/tracking.php'; ?>

		<meta name="theme-color" content="#ffffff">
		<link rel="icon" type="image/x-icon" href="favicon.ico">
		<link rel="shortcut icon" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/planet/favicon.ico">
		<link rel="apple-touch-icon-precomposed" href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/apple-touch-icon.png">

		<meta name="keywords" content="ari,hanan,arihanan,red,redflux,red#3510,planet">
		<meta name="dcterms.rightsHolder" content="Ari Hanan">

		<meta property="og:site_name" content="red"/>
		<meta name="twitter:site" content="red">
		<meta property="og:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>" />
		<meta name="twitter:url" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>">
		<meta property="og:type" content="article"/>
		<meta name="twitter:card" content="summary_large_image">
		<meta property="og:title" content="planet"/>
		<meta name="twitter:title" content="planet">
		<meta property="og:description" content="yes.">
		<meta name="twitter:description" content="yes.">
		<meta name="description" content="yes.">
		<meta property="og:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/planet/cover.png">
		<meta name="twitter:image" content="https://<?php echo $_SERVER['HTTP_HOST'] ?>/planet/cover.png">

		<link rel=StyleSheet href="/assets/unity.css" type="text/css" media=screen>
		<script src="/assets/UnityLoader.js"></script>
		<script>var gameInstance = UnityLoader.instantiate("gameContainer", "Build/planet.json");</script>

		<style>
			#gameContainer
			{
				width: 100vw;
				height: 100vw;
				max-width: 100vh;
				max-height: 100vh;
			}

			body
			{
				display: flex;
				justify-content: center;
				align-items: center;
				background-color: black;
			}
		</style>
	</head>
	<body><div id="gameContainer"></div></body>
</html>