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
		<style>
			canvas {
				position: absolute;
			}

			#gameContainer {
				width: 100vw;
				height: 100vw;
				max-width: 100vh;
				max-height: 100vh;
				display: flex;
				justify-content: center;
				align-items: center;
			}

			body {
				width: 100vw;
				height: 100vh;
				margin: 0;
				overflow: hidden;
				display: flex;
				justify-content: center;
				align-items: center;
				background-color: black;
			}

			html {
				width: 100vw;
				height: 100vh;
				margin: 0;
			}

			#full {
				background-color: black;
			}

			#progress
			{
				display: flex;
				width: 130px;
				height: 15px;
				border: 8px black solid;
				border-radius: 50px;
			}
		</style>
		<script src="UnityProgress.js"></script>
		<script src="<?php echo $assets ?>/UnityLoader.js"></script>
		<script>
			var unityInstance = UnityLoader.instantiate("gameContainer", "Build/planet.json", {onProgress: UnityProgress});
		</script>
	</head>
	<body><div id="gameContainer"></div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>