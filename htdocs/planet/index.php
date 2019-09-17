<?php
$title = "Planet";
$description = "yes.";
$color = "#ffffff";
$card = "summary_large_image";
$icontype = "x-icon";
$icon = "/planet/favicon.ico";
$ogimage = "/planet/cover.png";
$css = false;
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<link rel="StyleSheet" href="style.css">
		<script src="UnityProgress.js"></script>
		<script src="<?php echo $assets ?>/UnityLoader.js"></script>
		<script>
			var unityInstance = UnityLoader.instantiate("gameContainer", "Build/planet.json", {onProgress: UnityProgress});
		</script>
	</head>
	<body><div id="gameContainer"></div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>