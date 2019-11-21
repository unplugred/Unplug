<?php
$title = "useless flower";
$description = "a game.";
$color = "#ffffff";
$card = "summary_large_image";
$icontype = "x-icon";
$icon = "/useless-flower/favicon.ico";
$ogimage = "/useless-flower/cover.png";
$css = false;
include $_SERVER['DOCUMENT_ROOT'].'/access/header.php'; ?>
		<style>
			canvas {
				position: absolute;
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

			#full {
				background-image: url("full.png");
				background-position: left;
			}

			#empty{
				width: 5px;
				background-image: url("full.png");
				background-position: right;
			}

			#progress {
				display: flex;
				width: 141px;
				height: 7px;
				padding: 147px;
				background-image: url(box.png);
				background-repeat: no-repeat;
				background-position: center center;
			}

			#gameContainer {
				width: 100%;
				height: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
				background-image: url("bg.png") !important;
				background-repeat: repeat;
			}
		</style>
		<script src="UnityProgress.js"></script>
		<script src="<?php echo $assets ?>/UnityLoader.js"></script>
		<script>
			var unityInstance = UnityLoader.instantiate("gameContainer", "Build/uselessflower.json", {onProgress: UnityProgress});
		</script>
	</head>
	<body><div id="gameContainer"></div>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>
