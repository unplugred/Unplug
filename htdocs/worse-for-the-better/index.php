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
				background-position: center center !important;
				background-repeat: no-repeat !important;
			}

			.loading {
				background-image: url("bg.png") !important;
			}

			body {
				width: 100%;
				height: 100%;
				margin: 0;
				overflow: hidden;
				background-color: #808080;
			}

			html {
				width: 100%;
				height: 100%;
				margin: 0;
			}

			#play {
				width: 0;
				height: 0;
				border-style: solid;
				border-width: 35px 0 35px 60.6px;
				border-color: transparent transparent transparent #3C3C3C;
				transition: .2s;
			}

			#play:hover {
				border-width: 40px 0 40px 69.3px;
			}
		</style>
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
				var unityInstance = UnityLoader.instantiate("gameContainer", "Build/worseforthebetter.json", {onProgress: UnityProgress});
			}
		</script>
<?php include $_SERVER['DOCUMENT_ROOT'].'/access/footer.php'; ?>