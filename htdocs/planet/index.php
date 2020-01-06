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
				background-color: white;
				background-position: center center !important;
				background-repeat: no-repeat !important;
			}

			.loading {
				background-image: url("<?php echo assets ?>/planet/loading.gif") !important;
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

			#play {
				width: 134px;
				height: 60px;
			}
		</style>
		<link rel="prefetch" href="<?php echo assets ?>/planet/loading.gif" />
	</head>
	<body>
		<div id="gameContainer"><a id="play" href="javascript:void(0)" onclick="play()"></a></div>
		<script src="<?php echo assets ?>/UnityLoader.js"></script>
		<script>
			document.getElementById("play").style.backgroundImage = "url(\"<?php echo assets ?>/planet/start.gif?" + Math.random() + "\")";

			function UnityProgress(unityInstance, progress){}
			function play()
			{
				document.getElementById("play").style.display = "none";
				document.getElementById("gameContainer").className = "loading";
				var unityInstance = UnityLoader.instantiate("gameContainer", "Build/planet.json", {onProgress: UnityProgress});
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>