<?php
$title = "Hyperaction";
$tags = "hyper,action";
$description = "a game.";
$card = "summary_large_image";
$icontype = "x-icon";
$icon = "/hyperaction/favicon.ico";
$ogimage = "/hyperaction/cover.png";
$css = false;
include $_SERVER['DOCUMENT_ROOT'].'/assets/header.php'; ?>
		<link rel="StyleSheet" href="style.css">
		<script src="UnityProgress.js"></script>
		<script src="/assets/UnityLoader.js"></script>
		<script>
			var unityInstance = UnityLoader.instantiate("gameContainer", "Build/hyperaction.json", {onProgress: UnityProgress});
		</script>
	</head>
	<body><div id="gameContainer"></div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/assets/footer.php'; ?>