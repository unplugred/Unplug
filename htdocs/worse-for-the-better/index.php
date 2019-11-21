<?php
$title = "worse for the better";
$description = "a game.";
$color = "#808080";
$card = "summary_large_image";
$icontype = "x-icon";
$icon = "/worse-for-the-better/favicon.ico";
$ogimage = "/worse-for-the-better/cover.png";
$css = false;
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			canvas {
				position: absolute;
			}

			#gameContainer {
				width: 100%;
				height: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
				background-image: url("bg.png") !important;
				background-position: center center !important;
				background-repeat: no-repeat !important;
			}

			body {
				width: 100%;
				height: 100%;
				margin: 0;
				overflow: hidden;
			}

			html {
				width: 100%;
				height: 100%;
				margin: 0;
			}

			#full
			{
				background-color: #3C3C3C;
			}

			#progress
			{
				background-color: #808080;
				display: flex;
			    width: 351px;
				height: 10px;
				border: 5px #3C3C3C solid;
				border-radius: 50px;
			}
		</style>
		<script src="UnityProgress.js"></script>
		<script src="<?php echo $assets ?>/UnityLoader.js"></script>
		<script>
			var unityInstance = UnityLoader.instantiate("gameContainer", "Build/worseforthebetter.json", {onProgress: UnityProgress});
		</script>
	</head>
	<body><div id="gameContainer"></div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>