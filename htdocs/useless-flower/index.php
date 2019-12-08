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

			#gameContainer {
				width: 100%;
				height: 100%;
				display: flex;
				justify-content: center;
				align-items: center;
				background-image: url("play.png"), url("bg.png");
				background-repeat: no-repeat, repeat;
				background-position: center center, left top;
			}

			#play {
				width: 200px;
				height: 57px;
			}

			.loading {
				background-image: url("loading.gif"), url("play.png"), url("bg.png") !important;
				background-repeat: no-repeat, no-repeat, repeat !important;
				background-position: center center, center center, left top !important;
			}
		</style>
		<link rel="prefetch" href="loading.gif" />
	</head>
	<body>
		<div id="gameContainer"><a id="play" href="javascript:void(0)" onclick="play()"></a></div>
		<script src="<?php echo assets ?>/UnityProgress.js"></script>
		<script src="<?php echo assets ?>/UnityLoader.js"></script>
		<script>
			function play()
			{
				document.getElementById("play").style.display = "none";
				document.getElementById("gameContainer").className = "loading";
				var unityInstance = UnityLoader.instantiate("gameContainer", "Build/uselessflower.json", {onProgress: UnityProgress});
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>