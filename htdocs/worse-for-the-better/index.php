<?php
$title = "worse for the better";
$description = "a game.";
$color = "#808080";
$card = "summary_large_image";
$icontype = "x-icon";
$icon = "/worse-for-the-better/favicon.ico";
$ogimage = "/worse-for-the-better/cover.png";
$css = false;
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<link rel="stylesheet" href="style.css">
		<script src="UnityProgress.js"></script>
		<script src="/assets/UnityLoader.js"></script>
		<script>
			var unityInstance = UnityLoader.instantiate("gameContainer", "Build/worseforthebetter.json", {onProgress: UnityProgress});
		</script>
	</head>
	<body><div id="gameContainer"></div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>